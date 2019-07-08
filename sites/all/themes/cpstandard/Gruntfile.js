module.exports = function(grunt) {

    // Theme path
    $themepath = 'sites/all/themes/cpstandard';

    // Configuration
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),

        // Compass
        compass: {
            options: {
                bundleExec: true,
                relativeAssets: true,
                httpPath: $themepath,
                cssDir: 'css',
                sassDir: 'sass',
                imagesDir: 'images',
                javascriptsDir: 'js',
                assetCacheBuster: 'none',
                require: [
                    'breakpoint',
                    'sass-globbing',
                    'susy',
                    'toolkit',
                ]
            },

            // Development
            dev: {
                options: {
                    environment: 'development',
                    outputStyle: 'expanded',
                    force: true,
                    noLineComments: true,
                }
            }
        },

        // Autoprefixer
        autoprefixer: {
            options: {
                browsers: ['last 2 versions', 'IE 8', 'IE 9']
            },
            no_dest: {
                src: 'css/*.css'
            }
        },

        // CSS Minification
        // cssmin: {
        //     options: {
        //         shorthandCompacting: false,
        //         roundingPrecision: -1
        //     },
        //     target: {
        //         files: {
        //             'css/pardot.css': ['css/pardot.css']
        //         }
        //     }
        // },

        // SVG Sprites
        "svg-sprites": {

            // Social icons
            "social": {
                options: {
                    spriteElementPath: "images/icons/social/svg",
                    spritePath: "images/sprites",
                    cssPath: "sass/",
                    cssSuffix: "scss",
                    cssPrefix: "_sprite",
                    cssPngPrefix: ".no-svg",
                    prefix: "icon",
                    unit: 20
                }
            }
        },

        // PNG Sprites
        sprite: {

            // Support icons
            support: {
                src: 'images/icons/support/*.png',
                dest: 'images/sprites/support.png',
                destCss: 'sass/_sprite-support-sprite-png.scss',
                padding: 20
            }
        },

        // Minimize SVGs
        svgmin: {
            options: {
                plugins: [
                    { removeViewBox: false },
                    { removeUselessStrokeAndFill: false }
                ]
            },
            all: {                                        // Target
                files: [{                                 // Dictionary of files
                    expand: true,                         // Enable dynamic expansion.
                    cwd: 'images/',                       // Src matches are relative to this path.
                    src: ['**/*.svg'],                    // Actual pattern(s) to match.
                    dest: 'images/',                      // Destination path prefix.
                    ext: '.svg'                           // Dest filepaths will have this extension.
                }]
            }
        },

        // Image optimization
        imageoptim: {
          myTask: {
            options: {
              jpegMini: false,
              imageAlpha: true,
              quitAfter: true
            },
            src: ['images']
          }
        },

        // Watch
        watch: {

            // Live Reload
            options: {
                livereload: true,
            },

            // CSS
            css: {
                files: [
                    '**/*.scss',
                ],
                tasks: ['compass:dev', 'autoprefixer'/*, 'cssmin'*/],
                options: {
                    spawn: false,
                },
            },

            // Javascript
            scripts: {
                files: ['js/*.js'],
                options: {
                    spawn: false,
                },
            },
        }

    });

    // Load Tasks
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-compass');
    grunt.loadNpmTasks('grunt-autoprefixer');
    // grunt.loadNpmTasks('grunt-contrib-cssmin');
    grunt.loadNpmTasks('grunt-svgmin');
    grunt.loadNpmTasks('grunt-dr-svg-sprites');
    grunt.loadNpmTasks('grunt-spritesmith');
    grunt.loadNpmTasks('grunt-imageoptim');

    // Task - All
    grunt.registerTask('default', [
        'compass:dev',
        'autoprefixer',
        // 'cssmin',
        'svg-sprites',
        'sprite',
        'svgmin',
        'imageoptim'
    ]);

    // Task - Compile CSS
    grunt.registerTask('css', [
        'compass:dev',
        'autoprefixer' /*,
        'cssmin' */
    ]);

    // Task - Images
    grunt.registerTask('images', [
        'svg-sprites',
        'sprite',
        'svgmin',
        'imageoptim'
    ]);

};
