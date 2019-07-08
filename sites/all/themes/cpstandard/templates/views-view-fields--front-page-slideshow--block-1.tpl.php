<?php

/**
 * @file
 * Default simple view template to all the fields as a row.
 *
 * - $view: The view in use.
 * - $fields: an array of $field objects. Each one contains:
 *   - $field->content: The output of the field.
 *   - $field->raw: The raw data for the field, if it exists. This is NOT output safe.
 *   - $field->class: The safe class id to use.
 *   - $field->handler: The Views field handler object controlling this field. Do not use
 *     var_export to dump this object, as it can't handle the recursion.
 *   - $field->inline: Whether or not the field should be inline.
 *   - $field->inline_html: either div or span based on the above flag.
 *   - $field->wrapper_prefix: A complete wrapper containing the inline_html to use.
 *   - $field->wrapper_suffix: The closing tag for the wrapper.
 *   - $field->separator: an optional separator that may appear before a field.
 *   - $field->label: The wrap label text to use.
 *   - $field->label_html: The full HTML of the label to use including
 *     configured element type.
 * - $row: The raw result object from the query, with all data it fetched.
 *
 * @ingroup views_templates
 */
?>

<?php

  // Link.
  $link = isset($fields['field_front_page_slide_link']->content)
    ? $fields['field_front_page_slide_link']->content
    : '';

  // YouTube ID.
  $youTubeID = isset($fields['field_front_page_slide_youtube']->content)
    ? $fields['field_front_page_slide_youtube']->content
    : '';

  // Body.
  $body = isset($fields['body']->content)
    ? '<h3 class="secondary">' .$fields['body']->content . '</h3>'
    : '';

  // Image.
  $image = isset($fields['field_front_page_slide_image']->content)
    ? $fields['field_front_page_slide_image']->content
    : '';

  // Output.
  if ($image) {
    if ($youTubeID) {
      print l($image . $body, 'https://www.youtube.com/embed/' . $youTubeID . '?rel=0&width=560&height=315&autoplay=1&iframe=true', array('html' => TRUE, 'attributes' => array('class' => 'colorbox-load')));
    }
    else if ($link) {
      print l($image . $body, $link, array('html' => TRUE));
    }
    else {
      print $image . $body;
    }
  }
?>
