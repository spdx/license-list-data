<?php
/**
 * @file
 * Returns the HTML for the basic html structure of a single Drupal page.
 *
 * Complete documentation for this file is available online.
 * @see https://drupal.org/node/1728208
 */
?><!DOCTYPE html>
<!--[if IEMobile 7]><html class="no-js iem7" <?php print $html_attributes; ?>><![endif]-->
<!--[if lte IE 6]><html class="no-js lt-ie10 lt-ie9 lt-ie8 lt-ie7" <?php print $html_attributes; ?>><![endif]-->
<!--[if (IE 7)&(!IEMobile)]><html class="no-js lt-ie10 lt-ie9 lt-ie8" <?php print $html_attributes; ?>><![endif]-->
<!--[if IE 8]><html class="no-mqs no-js lt-ie10 lt-ie9" <?php print $html_attributes; ?>><![endif]-->
<!--[if IE 9]><html class="no-mqs no-js lt-ie10" <?php print $html_attributes; ?>><![endif]-->
<!--[if (gt IE 9)|(gt IEMobile 7)]><!--><html class="no-js"<?php print $html_attributes . $rdf_namespaces; ?>><!--<![endif]-->

<head>
  <?php print $head; ?>
  <title><?php print $head_title; ?></title>
  <meta name="HandheldFriendly" content="True">
  <meta name="apple-mobile-web-app-capable" content="yes" />
  <meta name="viewport" content="minimum-scale=1.0, width=device-width, maximum-scale=2" />
  <meta http-equiv="cleartype" content="on">
  <?php print $styles; ?>
  <?php print $scripts; ?>

  <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
  <!-- GOOGLE FONTS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,400italic,300,300italic,100italic,100,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
</head>
<body class="<?php print $classes; ?>" <?php print $attributes; ?>>

  <div id="skip">
    <a href="#main-menu"><?php print t('Jump to Navigation'); ?></a>
  </div>
  <?php print $page_top; ?>
  <?php print $page; ?>
  <?php print $page_bottom; ?>

  <div id="top-page-link">
    <a href="#"><i class="fa fa-arrow-circle-up"></i><span><?php print t('top of page'); ?></span></a>
  </div>

</body>
</html>

