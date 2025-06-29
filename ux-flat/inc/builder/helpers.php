<?php

function uxf_builder_template( $path ) {
  ob_start();
  include UXF_DIR . '/inc/builder/shortcodes/templates/' . $path;
  return ob_get_clean();
}

function flatsome_uxf_builder_thumbnail( $name ) {
  return UXF_URL . 'inc/builder/shortcodes/thumbnails/' . $name . '.svg';
}