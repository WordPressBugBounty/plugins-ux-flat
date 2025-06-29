<?php
if (UXFPro()) {
    Flatsome_Option::add_field( '', array(
        'type'     => 'custom',
        'settings' => 'header_sticky_uxfp',
        'section'  => 'header_sticky',
        'default'  => '<div class="options-title-divider" style="background: #00a0d2;">UX Flat</div>',
    ));
    Flatsome_Option::add_field( 'option', array(
        'type'     => 'checkbox',
        'settings' => 'uxf_toptitle',
        'label'    => __( 'Top Bar - Title sticky on Scroll ', 'ux-flat' ),
        'section'  => 'header_sticky',
        'active_callback' => array(
            array(
                'setting'  => 'topbar_sticky',
                'operator' => '===',
                'value'    => true,
            ),
        ),
        'default'  => 0,
    ));
    Flatsome_Option::add_field( 'option', array(
        'type'      => 'select',
        'settings' => 'uxf_header_disable',
        'label'    => __( 'Show sticky when scrolling down', 'ux-flat' ),
        'section'  => 'header_sticky',
        'default'  => '',
        'choices'  => array(
            ''  => __('Default'),
            'top' => 'Top Bar',
            'main' => 'Header Main',
            'bottom' => 'Header Bottom',
        ),
    ));
}