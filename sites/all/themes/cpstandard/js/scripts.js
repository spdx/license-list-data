/**
 * @file
 * A JavaScript file for the theme.
 *
 * In order for this JavaScript to be loaded on pages, see the instructions in
 * the README.txt next to this file.
 */

// JavaScript should be made compatible with libraries other than jQuery by
// wrapping it with an "anonymous closure". See:
// - http://www.adequatelygood.com/2010/3/JavaScript-Module-Pattern-In-Depth
(function($, window, document, undefined) {

  /**
   * Creates a link back to the top of the page.
   * A link appears when the user has scrolled sufficiently
   * which returns them back to the top of the page.
   */
  jQuery.fn.topLink = function(settings) {
    settings = jQuery.extend({
      min: 1,
      fadeSpeed: 200
    }, settings);
    return this.each(function() {
      // Listen for scroll.
      var el = $(this);
      // In case the user forgot.
      el.hide();
      $(window).scroll(function() {
        if ($(window).scrollTop() >= settings.min) {
          el.fadeIn(settings.fadeSpeed);
        } else {
          el.fadeOut(settings.fadeSpeed);
        }
      });
    });
  };

  /**
   * Enables a number of theme features.
   * Sets up the top link, some vertical nav stuff, sectional sites stuff, etc.
   */
  Drupal.behaviors.enabler = {
    attach: function() {

      // Set the link.
      $('#top-page-link a').topLink({
        min: 400,
        fadeSpeed: 500
      });

      // Smoothscroll.
      $('#top-page-link a').click(function(e) {
        console.log(topLink);
        e.preventDefault();
        $('html, body').animate({
          scrollTop: 0
        }, 'slow');
      });
    }
  };

  // LF Sites toggle.
  Drupal.behaviors.LFSitesToggle = {
    attach: function(context, settings) {
      var $LFSitesToggle = $('#lf-header a.sites', context);
      $LFSitesToggle.click(function(e) {
        $(this, context).parent().toggleClass('reveal', context);
        // $('#lf-header ul.sub-menu', context).toggleClass('reveal', context);
        e.preventDefault();
      });
    }
  };

})(jQuery, this, this.document);
