<?php


//1. Prijungti stiliu x 
//2. Prijungti Javascript dokumenteli x
//3. Customizeryje susikurti savo nustatyma: Copyright text x
//4. Sukurti nustatyma kuris p tago spalva padaro tokia kokia mes norime


//uz stiliaus prijungima tiek uz skripto pajungima
function bit_tema_enqueue() {
    wp_enqueue_style( 'bit-tema-style', get_template_directory_uri() . "/assets/css/style.css" );
    wp_enqueue_script('bit-tema-script', get_template_directory_uri() . "/assets/js/script.js" );
    wp_add_inline_style( 'bit-tema-style', bit_tema_generate_css() );
}

add_action("wp_enqueue_scripts", "bit_tema_enqueue");


function bit_tema_customizer_section($wp_customize) {
    $wp_customize->add_section('bit_tema_settings', array(
        'title' => __('Footer settings', 'bit-tema'),
        'priority' => 101
    ));


    // Copyright
    $wp_customize->add_setting('bit_tema_copyright',array(
        'default'=> '',
        'sanitize_callback' => ''
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'bit_tema_copyright', array(
        'label' => 'Copyright text',
        'description' => 'Enter copyright text here',
        'section' => 'bit_tema_settings',
        'type' => 'text',
        'priority'=> 10
    )));

    //Show menu
    $wp_customize->add_setting('bit_tema_show_menu', array(
        'default' => true,
        'sanitize_callback' => ''
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'bit_tema_show_menu', array(
        'label' => 'Show menu',
        'description' => 'Menu visibility settings',
        'section' => 'bit_tema_settings',
        'type' => 'checkbox',
        'priority'=> 10
    )));

    //P tag color select
    $wp_customize->add_setting('bit_tema_color_select', array(
        'default' => '#000000',
        'sanitize_callback' => ''
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'bit_tema_color_select', array(
        'label' => 'P tag color',
        'description' => 'Choose footer P tag color',
        'section' => 'bit_tema_settings',
        'priority'=> 10
    )));

    // Footer background color
    $wp_customize->add_setting('bit_tema_footer_background', array(
        'default' => '#ffffff',
        'sanitize_callback' => ''
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'bit_tema_footer_background', array(
        'label' => 'Footer background',
        'description' => 'Choose footer background color',
        'section' => 'bit_tema_settings',
        'priority'=> 10
    )));

}

add_action("customize_register", 'bit_tema_customizer_section' );

function bit_tema_generate_css() {
    $css = '';
    $color = get_theme_mod('bit_tema_color_select');
    $background_color = get_theme_mod('bit_tema_footer_background');

    $css .= ".footer p { color:".$color." }";
    $css .= ".footer {background-color:".$background_color."}";
    return $css;

}


function atvaizduok() {
    echo "<meta description='Labas'>";
}

// add_action('wp_head', 'atvaizduok');

function labas() {
    echo "<h1>Labas</h1>";
}

//  add_action("wp_footer", 'labas');

register_nav_menus( array( 
    'menu-1' => __('Primary Header Menu', 'bit-tema'), //vietos pavadinimas atvaizdavimui
    'menu-2' => __('Secondary Footer Menu', 'bit-tema'),
));