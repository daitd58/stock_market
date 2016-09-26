<?php
/**
 * Customizer functionality
 *
 * @package stock_market
 */
?>
<?php

/**
 * Adds the individual sections, settings, and controls to the theme customizer
 */
function stock_market_wp_customize_register( $wp_customize ) {

    global $stock_market_wp_defaults;
    
    
    /*** stock_market_wp_general_settings_section ***/
    
    $wp_customize->add_section( 'stock_market_wp_general_settings_section' , array( 'title' => __( 'General Setup', 'stock_market' ), 'priority' => 3, 'description' => 'Please note: In order to set up the home page as shown in the <a href="http://www.lyrathemes.com/preview/?theme=stock_market" target="_blank">official demo on our website</a> (one page front page with sections), you will need to set up your front page to use a static page instead of showing your latest blog posts. You can change this from `Settings > Reading` or `Appearance > Customize > Static Front Page`', ) );

    $wp_customize->add_setting( 'stock_market_wp_enable_demo', array( 'default' => $stock_market_wp_defaults['stock_market_wp_enable_demo'], 'sanitize_callback' => 'stock_market_wp_sanitize_radio_yn' ) );
    $wp_customize->add_control( 'stock_market_wp_enable_demo', array( 
                                    'label' => __( 'Enable Demo?', 'stock_market' ), 
                                    'section' => 'stock_market_wp_general_settings_section',
                                    'settings' => 'stock_market_wp_enable_demo', 
                                    'type' => 'radio', 
                                    'choices' => array('Y'=>__('Yes', 'stock_market'), 'N'=>__('No', 'stock_market')),
                                    'description' => __('When the theme is first installed, the demo mode would be turned OFF. Turn it on to view a demo one page home page. This demo home page will display some sample/example content to show you how the website can be possibly set up. When you are comfortable with the theme options, you should turned this off.', 'stock_market') ) );
    $wp_customize->add_setting( 'stock_market_wp_animations', array( 'default' => $stock_market_wp_defaults['stock_market_wp_animations'], 'sanitize_callback' => 'stock_market_wp_sanitize_radio_yn' ) );
    $wp_customize->add_control( 'stock_market_wp_animations', array( 
                                    'label' => __( 'Enable Animations?', 'stock_market' ), 
                                    'section' => 'stock_market_wp_general_settings_section',
                                    'settings' => 'stock_market_wp_animations', 
                                    'type' => 'radio', 
                                    'choices' => array('Y'=>__('Yes', 'stock_market'), 'N'=>__('No', 'stock_market')),
                                    'description' => __('By default, animations are enabled.', 'stock_market') ) );
    $wp_customize->add_setting( 'stock_market_hide_footer_widgets', array( 'default' => $stock_market_wp_defaults['stock_market_hide_footer_widgets'], 'sanitize_callback' => 'stock_market_wp_sanitize_radio_yn' ) );
    $wp_customize->add_control( 'stock_market_hide_footer_widgets', array( 
                                    'label' => __( 'Hide Footer Widgets?', 'stock_market' ), 
                                    'section' => 'stock_market_wp_general_settings_section',
                                    'settings' => 'stock_market_hide_footer_widgets', 
                                    'type' => 'radio', 
                                    'choices' => array('Y'=>__('Yes', 'stock_market'), 'N'=>__('No', 'stock_market')),
                                    'description' => __('Footer widgets (the section/columns right above the footer copyright area) can be removed by setting this option to `Yes`.', 'stock_market') ) );
    /*** stock_market_wp_logo_section ***/
    
    //$wp_customize->add_section( 'stock_market_wp_logo_section' , array( 'title' => __( 'Logo Options', 'stock_market' ), 'priority' => 35, 'description' => '', ) );

    $wp_customize->add_setting( 'stock_market_wp_show_logo_image', array( 'default' => $stock_market_wp_defaults['stock_market_wp_show_logo_image'], 'sanitize_callback' => 'stock_market_wp_sanitize_radio_yn' ) );
    $wp_customize->add_control( 'stock_market_wp_show_logo_image', array( 
                                    'label' => __( 'Show Image Logo?', 'stock_market' ), 
                                    'section' => 'title_tagline',
                                    'settings' => 'stock_market_wp_show_logo_image', 
                                    'type' => 'radio', 
                                    'choices' => array('Y'=>__('Yes', 'stock_market'), 'N'=>__('No', 'stock_market')),
                                    'description' => __('Choose whether to display the logo image set up under `Site Identity`.', 'stock_market') ) );

    $wp_customize->add_setting( 'stock_market_wp_logo_text', array( 'default' => $stock_market_wp_defaults['stock_market_wp_logo_text'], 'sanitize_callback' => 'stock_market_wp_sanitize_text' ) );
    $wp_customize->add_control( 'stock_market_wp_logo_text', array( 
                                    'label' => __('Text Logo', 'stock_market'), 
                                    'section' => 'title_tagline',
                                    'type' => 'text', 
                                    'description' => __('Displayed when `Show Image Logo?` is `No` or if there is no logo image uploaded.', 'stock_market') ));
    
    
    /*** stock_market_wp_colors_section ***/
    
    //$wp_customize->add_section( 'stock_market_wp_colors_section' , array( 'title' => __( 'Colors', 'stock_market' ), 'priority' => 40, 'description' => '', ) );

    $wp_customize->add_setting( 'stock_market_wp_color_stylesheet', array( 'default' => $stock_market_wp_defaults['stock_market_wp_color_stylesheet'], 'sanitize_callback' => 'stock_market_wp_sanitize_radio_colors' ) );
    $wp_customize->add_control( 'stock_market_wp_color_stylesheet', array( 
                                    'label' => __( 'Select Color Scheme', 'stock_market' ), 
                                    'section' => 'colors',
                                    'settings' => 'stock_market_wp_color_stylesheet', 'type' => 'radio', 
                                    'choices' => array('Orange'=>__('Orange (Default)', 'stock_market'), 'Blue'=>__('Blue', 'stock_market'), 'Green'=>__('Green', 'stock_market')),
                                    'description' => __('Choose a color scheme. Default color scheme is Orange.', 'stock_market') ) );
                                    
    /*** stock_market_wp_blog_feed_section ***/
    
    $wp_customize->add_section( 'stock_market_wp_blog_feed_section' , array( 'title' => __( 'Blog Feed', 'stock_market' ), 'priority' => 60, 'description' => '', ) );

    $wp_customize->add_setting( 'stock_market_wp_blog_feed_meta', array( 'default' => $stock_market_wp_defaults['stock_market_wp_blog_feed_meta'], 'sanitize_callback' => 'stock_market_wp_sanitize_radio_yn' ) );
    $wp_customize->add_control( 'stock_market_wp_blog_feed_meta', array( 
                                    'label' => __( 'Show Meta Information?', 'stock_market' ), 
                                    'section' => 'stock_market_wp_blog_feed_section',
                                    'settings' => 'stock_market_wp_blog_feed_meta', 
                                    'type' => 'radio', 
                                    'choices' => array('Y'=>__('Yes', 'stock_market'), 'N'=>__('No', 'stock_market')),
                                    'description' => __('Choose whether you want to show the date, author, and category for each post in the blog feed. Shown by default.', 'stock_market') ) );
    
    $wp_customize->add_setting( 'stock_market_wp_blog_feed_meta_date', array( 'default' => $stock_market_wp_defaults['stock_market_wp_blog_feed_meta_date'], 'sanitize_callback' => 'stock_market_wp_sanitize_radio_yn' ) );
    $wp_customize->add_control( 'stock_market_wp_blog_feed_meta_date', array( 
                                    'label' => __( 'Show Date?', 'stock_market' ), 
                                    'section' => 'stock_market_wp_blog_feed_section',
                                    'settings' => 'stock_market_wp_blog_feed_meta_date', 
                                    'type' => 'radio', 
                                    'choices' => array('Y'=>__('Yes', 'stock_market'), 'N'=>__('No', 'stock_market')),
                                    'description' => __('Choose whether you want to show the date for each post in the blog feed. Shown by default.', 'stock_market') ) );
                                    
    $wp_customize->add_setting( 'stock_market_wp_blog_feed_meta_category', array( 'default' => $stock_market_wp_defaults['stock_market_wp_blog_feed_meta_category'], 'sanitize_callback' => 'stock_market_wp_sanitize_radio_yn' ) );
    $wp_customize->add_control( 'stock_market_wp_blog_feed_meta_category', array( 
                                    'label' => __( 'Show Category?', 'stock_market' ), 
                                    'section' => 'stock_market_wp_blog_feed_section',
                                    'settings' => 'stock_market_wp_blog_feed_meta_category', 
                                    'type' => 'radio', 
                                    'choices' => array('Y'=>__('Yes', 'stock_market'), 'N'=>__('No', 'stock_market')),
                                    'description' => __('Choose whether you want to show the category for each post in the blog feed. Shown by default.', 'stock_market') ) );
                                    
    $wp_customize->add_setting( 'stock_market_wp_blog_feed_meta_author', array( 'default' => $stock_market_wp_defaults['stock_market_wp_blog_feed_meta_author'], 'sanitize_callback' => 'stock_market_wp_sanitize_radio_yn' ) );
    $wp_customize->add_control( 'stock_market_wp_blog_feed_meta_author', array( 
                                    'label' => __( 'Show Author?', 'stock_market' ), 
                                    'section' => 'stock_market_wp_blog_feed_section',
                                    'settings' => 'stock_market_wp_blog_feed_meta_author', 
                                    'type' => 'radio', 
                                    'choices' => array('Y'=>__('Yes', 'stock_market'), 'N'=>__('No', 'stock_market')),
                                    'description' => __('Choose whether you want to show the author for each post in the blog feed. Hidden by default.', 'stock_market') ) );
    
    $wp_customize->add_setting( 'stock_market_wp_blog_feed_display', array( 'default' => $stock_market_wp_defaults['stock_market_wp_blog_feed_display'], 'sanitize_callback' => 'stock_market_wp_sanitize_radio_blog_feed_display' ) );
    $wp_customize->add_control( 'stock_market_wp_blog_feed_display', array( 
                                    'label' => __( 'Select Post Display Format', 'stock_market' ), 
                                    'section' => 'stock_market_wp_blog_feed_section',
                                    'settings' => 'stock_market_wp_blog_feed_display', 
                                    'type' => 'radio', 
                                    'choices' => array(
                                        'Small Image Left, Excerpt Right'=>__('Small Image Left, Excerpt Right', 'stock_market'), 
                                        'Large Image Top, Full Content Below'=>__('Large Image Top, Full Content Below', 'stock_market'), 
                                        'No Image, Excerpt'=>__('No Image, Excerpt', 'stock_market')
                                        ),
                                    'description' => __('Choose how you want to display each post in the blog feed. `Small Image Left, Excerpt Right` by default.', 'stock_market') ) );
                                    
    $wp_customize->add_setting( 'stock_market_wp_blog_feed_buttons', array( 'default' => $stock_market_wp_defaults['stock_market_wp_blog_feed_buttons'], 'sanitize_callback' => 'stock_market_wp_sanitize_radio_yn' ) );
    $wp_customize->add_control( 'stock_market_wp_blog_feed_buttons', array( 
                                    'label' => __( 'Show Post Buttons?', 'stock_market' ), 
                                    'section' => 'stock_market_wp_blog_feed_section',
                                    'settings' => 'stock_market_wp_blog_feed_buttons', 
                                    'type' => 'radio', 
                                    'choices' => array('Y'=>__('Yes', 'stock_market'), 'N'=>__('No', 'stock_market')),
                                    'description' => __('Select No to hide the `Read More`, `Comments` buttons for posts. Shown by default.', 'stock_market') ) );

    $wp_customize->add_setting( 'stock_market_wp_blog_feed_banner', array( 'default' => $stock_market_wp_defaults['stock_market_wp_blog_feed_banner'], 'sanitize_callback' => 'stock_market_wp_sanitize_radio_banner' ) );
    $wp_customize->add_control( 'stock_market_wp_blog_feed_banner', array( 
                                    'label' => __( 'Blog Feed Banner', 'stock_market' ), 
                                    'section' => 'stock_market_wp_blog_feed_section',
                                    'settings' => 'stock_market_wp_blog_feed_banner', 
                                    'type' => 'radio', 
                                    'choices' => array('Custom Header'=>__('Custom Header', 'stock_market'), 'None'=>__('None', 'stock_market')),
                                    'description' => __('The Custom Header can be set from the `Header Image` section. Custom Header is shown as the banner by default.', 'stock_market') ) );
    $wp_customize->add_setting( 'stock_market_wp_blog_feed_animations', array( 'default' => $stock_market_wp_defaults['stock_market_wp_blog_feed_animations'], 'sanitize_callback' => 'stock_market_wp_sanitize_radio_yn' ) );
    $wp_customize->add_control( 'stock_market_wp_blog_feed_animations', array( 
                                    'label' => __( 'Enable Animations?', 'stock_market' ), 
                                    'section' => 'stock_market_wp_blog_feed_section',
                                    'settings' => 'stock_market_wp_blog_feed_animations', 
                                    'type' => 'radio', 
                                    'choices' => array('Y'=>__('Yes', 'stock_market'), 'N'=>__('No', 'stock_market')),
                                    'description' => __('Whether or not to enable animations for the blog page. Requires that the animations be turned on in the `General Setup` section. By default, animations are enabled.', 'stock_market') ) );
    
    
    /*** stock_market_wp_post_section ***/
    
    $wp_customize->add_section( 'stock_market_wp_post_section' , array( 'title' => __( 'Blog Post', 'stock_market' ), 'priority' => 65, 'description' => '', ) );

    $wp_customize->add_setting( 'stock_market_wp_post_meta', array( 'default' => $stock_market_wp_defaults['stock_market_wp_post_meta'], 'sanitize_callback' => 'stock_market_wp_sanitize_radio_yn' ) );
    $wp_customize->add_control( 'stock_market_wp_post_meta', array( 
                                    'label' => __( 'Show Meta Information?', 'stock_market' ), 
                                    'section' => 'stock_market_wp_post_section',
                                    'settings' => 'stock_market_wp_post_meta', 
                                    'type' => 'radio', 
                                    'choices' => array('Y'=>__('Yes', 'stock_market'), 'N'=>__('No', 'stock_market')),
                                    'description' => __('Choose whether you want to show the date, author, and category on the posts page. Shown by default.', 'stock_market') ) );
    
    $wp_customize->add_setting( 'stock_market_wp_post_meta_date', array( 'default' => $stock_market_wp_defaults['stock_market_wp_post_meta_date'], 'sanitize_callback' => 'stock_market_wp_sanitize_radio_yn' ) );
    $wp_customize->add_control( 'stock_market_wp_post_meta_date', array( 
                                    'label' => __( 'Show Date?', 'stock_market' ), 
                                    'section' => 'stock_market_wp_post_section',
                                    'settings' => 'stock_market_wp_post_meta_date', 
                                    'type' => 'radio', 
                                    'choices' => array('Y'=>__('Yes', 'stock_market'), 'N'=>__('No', 'stock_market')),
                                    'description' => __('Choose whether you want to show the date on the post page. Shown by default.', 'stock_market') ) );
                                    
    $wp_customize->add_setting( 'stock_market_wp_post_meta_category', array( 'default' => $stock_market_wp_defaults['stock_market_wp_post_meta_category'], 'sanitize_callback' => 'stock_market_wp_sanitize_radio_yn' ) );
    $wp_customize->add_control( 'stock_market_wp_post_meta_category', array( 
                                    'label' => __( 'Show Category?', 'stock_market' ), 
                                    'section' => 'stock_market_wp_post_section',
                                    'settings' => 'stock_market_wp_post_meta_category', 
                                    'type' => 'radio', 
                                    'choices' => array('Y'=>__('Yes', 'stock_market'), 'N'=>__('No', 'stock_market')),
                                    'description' => __('Choose whether you want to show the category on the post page. Shown by default.', 'stock_market') ) );
                                    
    $wp_customize->add_setting( 'stock_market_wp_post_meta_author', array( 'default' => $stock_market_wp_defaults['stock_market_wp_post_meta_author'], 'sanitize_callback' => 'stock_market_wp_sanitize_radio_yn' ) );
    $wp_customize->add_control( 'stock_market_wp_post_meta_author', array( 
                                    'label' => __( 'Show Author?', 'stock_market' ), 
                                    'section' => 'stock_market_wp_post_section',
                                    'settings' => 'stock_market_wp_post_meta_author', 
                                    'type' => 'radio', 
                                    'choices' => array('Y'=>__('Yes', 'stock_market'), 'N'=>__('No', 'stock_market')),
                                    'description' => __('Choose whether you want to show the author on the post page. Hidden by default.', 'stock_market') ) );
                                    
    $wp_customize->add_setting( 'stock_market_wp_post_tags', array( 'default' => $stock_market_wp_defaults['stock_market_wp_post_tags'], 'sanitize_callback' => 'stock_market_wp_sanitize_radio_yn' ) );
    $wp_customize->add_control( 'stock_market_wp_post_tags', array( 
                                    'label' => __( 'Show Tags?', 'stock_market' ), 
                                    'section' => 'stock_market_wp_post_section',
                                    'settings' => 'stock_market_wp_post_tags', 
                                    'type' => 'radio', 
                                    'choices' => array('Y'=>__('Yes', 'stock_market'), 'N'=>__('No', 'stock_market')),
                                    'description' => __('Choose whether you want to show the tags on the post page. Hidden by default.', 'stock_market') ) );
    
    $wp_customize->add_setting( 'stock_market_wp_post_banner', array( 'default' => $stock_market_wp_defaults['stock_market_wp_post_banner'], 'sanitize_callback' => 'stock_market_wp_sanitize_radio_banner' ) );
    $wp_customize->add_control( 'stock_market_wp_post_banner', array( 
                                    'label' => __( 'Post Page Banner', 'stock_market' ), 
                                    'section' => 'stock_market_wp_post_section',
                                    'settings' => 'stock_market_wp_post_banner', 
                                    'type' => 'radio', 
                                    'choices' => array('Custom Header'=>__('Custom Header', 'stock_market'), 'Featured Image'=>__('Featured Image', 'stock_market'), 'None'=>__('None', 'stock_market')),
                                    'description' => __('The Custom Header can be set from the `Header Image` section. Custom Header is shown as the banner by default.', 'stock_market') ) );
    
    $wp_customize->add_setting( 'stock_market_wp_post_sidebar', array( 'default' => $stock_market_wp_defaults['stock_market_wp_post_sidebar'], 'sanitize_callback' => 'stock_market_wp_sanitize_radio_yn' ) );
    $wp_customize->add_control( 'stock_market_wp_post_sidebar', array( 
                                    'label' => __( 'Show Sidebar?', 'stock_market' ), 
                                    'section' => 'stock_market_wp_post_section',
                                    'settings' => 'stock_market_wp_post_sidebar', 
                                    'type' => 'radio', 
                                    'choices' => array('Y'=>__('Yes', 'stock_market'), 'N'=>__('No', 'stock_market')),
                                    'description' => __('Sidebar is shown by default.', 'stock_market') ) );
                                    
    $wp_customize->add_setting( 'stock_market_wp_post_featured_image', array( 'default' => $stock_market_wp_defaults['stock_market_wp_post_featured_image'], 'sanitize_callback' => 'stock_market_wp_sanitize_radio_yn' ) );
    $wp_customize->add_control( 'stock_market_wp_post_featured_image', array( 
                                    'label' => __( 'Show Featured Image?', 'stock_market' ), 
                                    'section' => 'stock_market_wp_post_section',
                                    'settings' => 'stock_market_wp_post_featured_image', 
                                    'type' => 'radio', 
                                    'choices' => array('Y'=>__('Yes', 'stock_market'), 'N'=>__('No', 'stock_market')),
                                    'description' => __('Whether to show the featured image at the beginning of the post.', 'stock_market') ) );

    /*** stock_market_wp_page_section ***/
    
    $wp_customize->add_section( 'stock_market_wp_page_section' , array( 'title' => __( 'Pages', 'stock_market' ), 'priority' => 70, 'description' => '', ) );

    $wp_customize->add_setting( 'stock_market_wp_page_banner', array( 'default' => $stock_market_wp_defaults['stock_market_wp_page_banner'], 'sanitize_callback' => 'stock_market_wp_sanitize_radio_banner' ) );
    $wp_customize->add_control( 'stock_market_wp_page_banner', array( 
                                    'label' => __( 'Post Page Banner', 'stock_market' ), 
                                    'section' => 'stock_market_wp_page_section',
                                    'settings' => 'stock_market_wp_page_banner', 
                                    'type' => 'radio', 
                                    'choices' => array('Custom Header'=>__('Custom Header', 'stock_market'), 'Featured Image'=>__('Featured Image', 'stock_market'), 'None'=>__('None', 'stock_market')),
                                    'description' => __('The Custom Header can be set from the `Header Image` section. Custom Header is shown as the banner by default.', 'stock_market') ) );
    
    $wp_customize->add_setting( 'stock_market_wp_page_sidebar', array( 'default' => $stock_market_wp_defaults['stock_market_wp_page_sidebar'], 'sanitize_callback' => 'stock_market_wp_sanitize_radio_yn' ) );
    $wp_customize->add_control( 'stock_market_wp_page_sidebar', array( 
                                    'label' => __( 'Show Sidebar?', 'stock_market' ), 
                                    'section' => 'stock_market_wp_page_section',
                                    'settings' => 'stock_market_wp_page_sidebar', 
                                    'type' => 'radio', 
                                    'choices' => array('Y'=>__('Yes', 'stock_market'), 'N'=>__('No', 'stock_market')),
                                    'description' => __('Sidebar is shown by default.', 'stock_market') ) );
                                                                        
    /*** stock_market_advanced_section ***/
    
    $wp_customize->add_section( 'stock_market_wp_advanced_section' , array( 'title' => __( 'Advanced Settings', 'stock_market' ), 'priority' => 80, 'description' => '', ) );

    $wp_customize->add_setting( 'stock_market_wp_custom_css', array( 'default' => $stock_market_wp_defaults['stock_market_wp_custom_css'], 'sanitize_callback' => 'wp_filter_nohtml_kses' ) );
    $wp_customize->add_control( 'stock_market_wp_custom_css', array( 
                                    'label' => __( 'Custom CSS', 'stock_market' ), 
                                    'section' => 'stock_market_wp_advanced_section',
                                    'settings' => 'stock_market_wp_custom_css', 
                                    'type' => 'textarea', 
                                    'description' => __('Custom CSS code.', 'stock_market') ) );

    /*** stock_market_wp_footer_section ***/
    
    $wp_customize->add_section( 'stock_market_wp_footer_section' , array( 'title' => __( 'Footer Settings', 'stock_market' ), 'priority' => 75, 'description' => '', ) );
    
    $wp_customize->add_setting( 'stock_market_wp_footer_copyright_message', array( 'default' => $stock_market_wp_defaults['stock_market_wp_footer_copyright_message'], 'sanitize_callback' => 'stock_market_wp_sanitize_html' ) );
    $wp_customize->add_control( 'stock_market_wp_footer_copyright_message', array( 
                                    'label' => __('Footer Copyright', 'stock_market'), 
                                    'section' => 'stock_market_wp_footer_section',
                                    'type' => 'textarea', 
                                    'description' => __('Displayed as the copyright notice at the bottom of the page. Accepts HTML.', 'stock_market') ));
    
    //$wp_customize->remove_section('colors');
    //$wp_customize->remove_section('background_image');
    $wp_customize->remove_control('header_textcolor');
    $wp_customize->get_section('colors')->title = __( 'Custom Colors', 'stock_market' );
}
add_action( 'customize_register', 'stock_market_wp_customize_register' );



/*** Sanitize ***/

function stock_market_wp_sanitize_html( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}

function stock_market_wp_sanitize_text( $input ) {
    return sanitize_text_field( $input );
}

function stock_market_wp_sanitize_radio_yn( $input ) {
    $valid = array(
        'Y' => 'Yes',
        'N' => 'No'
    );
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return 'Y';
    }
}

function stock_market_wp_sanitize_radio_frontpage_banner( $input ) {
    $valid = array(
        'Full Screen' => 'Full Screen',
        'Banner' => 'Banner'
    );
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return 'Banner';
    }
}

function stock_market_wp_sanitize_radio_colors( $input ) {
    $valid = array(
        'Green' => 'Green',
        'Orange' => 'Orange',
        'Blue' => 'Blue'
    );
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return 'Orange';
    }
}
function stock_market_wp_sanitize_radio_blog_feed_display( $input ) {
    $valid = array(
        'Small Image Left, Excerpt Right'=>'Small Image Left, Excerpt Right', 
        'Large Image Top, Full Content Below'=>'Large Image Top, Full Content Below', 
        'No Image, Excerpt'=>'No Image, Excerpt'
    );
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return 'Small Image Left, Excerpt Right';
    }
}
function stock_market_wp_sanitize_radio_banner( $input ) {
    $valid = array(
        'Image Banner'=>'Image Banner', 
        'Full Screen Image'=>'Full Screen Image',
        'Custom Header' => 'Custom Header',
        'None' => 'None',
        'Featured Image' => 'Featured Image'
    );
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return 'None';
    }
    
}
function stock_market_wp_sanitize_number( $input ) {
    $input = (int)$input;
    $input = absint($input);
    if(is_int($input))
        return $input;
    else
        return '0';
} 
function stock_market_wp_sanitize_page($input) {
    $input = (int)$input;
    $input = absint($input);
    if(is_int($input))
        return $input;
    else
        return '0';
} 
function stock_market_wp_sanitize_url($input) {
    return esc_url_raw($input);
}    
function stock_market_wp_sanitize_html_class($input) {
    return sanitize_html_class($input);
}
?>