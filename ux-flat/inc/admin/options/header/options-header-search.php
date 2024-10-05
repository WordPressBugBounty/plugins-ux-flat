<?php
Flatsome_Option::add_field( '', array(
	'type'     => 'custom',
	'settings' => 'custom_uxfheadersearch',
	'section'  => 'header_search',
	'default'  => '<div class="options-title-divider">UXF Options</div>',
));

Flatsome_Option::add_field( 'option',  array(
  'type'        => 'textarea',
  'settings'     => 'search_typing',
  'transport' => 'postMessage',
  'label'       => __( 'Search multiple', 'flatsome-admin' ),
  'description'       => __( 'Change the search multiple field placeholder.', 'flatsome-admin' ),
  'section'     => 'header_search',
  'placeholder' => 'Search...',
));