<?php

/**
 * Simplify the syntax for rendering of partials.
 */
function _partial($partial_name, $options = array()) {
  return theme('partial__' . $partial_name, $options  );
}


/**
 * Just define any partial bellow, this is merged in cpstandard_theme() with any other
 * theme function defined.
 */
function cpstandard_define_partials() {
  return array(
    'partial__header_collaborative_projects' => array(
      'template' => 'templates/partials/partial--header',
    ),
    'partial__footer_copyright' => array(
      'template' => 'templates/partials/partial--footer-copyright',
    ),
  );
}
