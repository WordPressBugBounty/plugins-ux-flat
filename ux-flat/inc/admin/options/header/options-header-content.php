<?php
if (UXFPro()) {
    Flatsome_Option::add_field( 'option',  array(
        'type'        => 'code',
        'settings'    => 'cache_header',
        'label'       => __( 'Cache Header', 'ux-flat' ),
        'description'  => __( 'Add Any HTML', 'ux-flat' ),
		'choices'     => [
			'language' => 'html',
		],
        'section'     => 'header_content',
    ));
}