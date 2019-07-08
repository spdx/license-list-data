<?php

// Form override for theme settings
function cpstandard_form_system_theme_settings_alter(&$form, $form_state) {
  $form['options_settings'] = array(
    '#type' => 'fieldset',
    '#title' => t('Theme Specific Settings'),
    '#collapsible' => FALSE,
    '#collapsed' => FALSE
  );

  // Project type.
  $form['options_settings']['cpstandard_project_type'] = array(
    '#type' => 'select',
    '#title' => t('Project type'),
    '#default_value' => theme_get_setting('cpstandard_project_type'),
    '#options' => array(
      'collab' => t('Collaborative Project'),
      'workgroup' => t('Workgroup'),
    ),
  );

  // Zen tabs.
  $form['options_settings']['cpstandard_tabs'] = array(
    '#type' => 'checkbox',
    '#title' => t('Use the ZEN tabs'),
    '#description' => t('Check this if you wish to replace the default tabs by the ZEN tabs'),
    '#default_value' => theme_get_setting('cpstandard_tabs'),
  );

  // Breadcrumbs.
  $form['options_settings']['cpstandard_breadcrumb'] = array(
    '#type' => 'fieldset',
    '#title' => t('Breadcrumb settings'),
    '#attributes' => array('id' => 'cpstandard-breadcrumb'),
  );
  $form['options_settings']['cpstandard_breadcrumb']['cpstandard_breadcrumb'] = array(
    '#type' => 'select',
    '#title' => t('Display breadcrumb'),
    '#default_value' => theme_get_setting('cpstandard_breadcrumb'),
    '#options' => array(
      'yes' => t('Yes'),
      'admin' => t('Only in admin section'),
      'no' => t('No'),
    ),
  );
  $form['options_settings']['cpstandard_breadcrumb']['cpstandard_breadcrumb_separator'] = array(
    '#type' => 'textfield',
    '#title' => t('Breadcrumb separator'),
    '#description' => t('Text only. Don’t forget to include spaces.'),
    '#default_value' => theme_get_setting('cpstandard_breadcrumb_separator'),
    '#size' => 5,
    '#maxlength' => 10,
    '#prefix' => '<div id="div-cpstandard-breadcrumb-collapse">', // jquery hook to show/hide optional widgets
  );
  $form['options_settings']['cpstandard_breadcrumb']['cpstandard_breadcrumb_home'] = array(
    '#type' => 'checkbox',
    '#title' => t('Show home page link in breadcrumb'),
    '#default_value' => theme_get_setting('cpstandard_breadcrumb_home'),
  );
  $form['options_settings']['cpstandard_breadcrumb']['cpstandard_breadcrumb_trailing'] = array(
    '#type' => 'checkbox',
    '#title' => t('Append a separator to the end of the breadcrumb'),
    '#default_value' => theme_get_setting('cpstandard_breadcrumb_trailing'),
    '#description' => t('Useful when the breadcrumb is placed just before the title.'),
  );
  $form['options_settings']['cpstandard_breadcrumb']['cpstandard_breadcrumb_title'] = array(
    '#type' => 'checkbox',
    '#title' => t('Append the content title to the end of the breadcrumb'),
    '#default_value' => theme_get_setting('cpstandard_breadcrumb_title'),
    '#description' => t('Useful when the breadcrumb is not placed just before the title.'),
    '#suffix' => '</div>', // #div-cpstandard-breadcrumb-collapse
  );

  // IE specific settings.
  $form['options_settings']['cpstandard_ie'] = array(
    '#type' => 'fieldset',
    '#title' => t('Internet Explorer Stylesheets'),
    '#attributes' => array('id' => 'cpstandard-ie'),
  );
  $form['options_settings']['cpstandard_ie']['cpstandard_ie_enabled'] = array(
    '#type' => 'checkbox',
    '#title' => t('Enable Internet Explorer stylesheets in theme'),
    '#default_value' => theme_get_setting('cpstandard_ie_enabled'),
    '#description' => t('If you check this box you can choose which IE stylesheets in theme get rendered on display.'),
  );
  $form['options_settings']['cpstandard_ie']['cpstandard_ie_enabled_css'] = array(
    '#type' => 'fieldset',
    '#title' => t('Check which IE versions you want to enable additional .css stylesheets for.'),
    '#states' => array(
      'visible' => array(
        ':input[name="cpstandard_ie_enabled"]' => array('checked' => TRUE),
      ),
    ),
  );
  $form['options_settings']['cpstandard_ie']['cpstandard_ie_enabled_css']['cpstandard_ie_enabled_versions'] = array(
    '#type' => 'checkboxes',
    '#options' => array(
      'ie8' => t('Internet Explorer 8'),
      'ie9' => t('Internet Explorer 9'),
      'ie10' => t('Internet Explorer 10'),
    ),
    '#default_value' => theme_get_setting('cpstandard_ie_enabled_versions'),
  );
  $form['options_settings']['clear_registry'] = array(
    '#type' => 'checkbox',
    '#title' => t('Rebuild theme registry on every page.'),
    '#description' =>t('During theme development, it can be very useful to continuously <a href="!link">rebuild the theme registry</a>. WARNING: this is a huge performance penalty and must be turned off on production websites.', array('!link' => 'http://drupal.org/node/173880#theme-registry')),
    '#default_value' => theme_get_setting('clear_registry'),
  );
}
