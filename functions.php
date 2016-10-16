<?php
/**
 * stock_market WP functions and definitions
 *
 * @package stock_market
 */
?>
<?php

define( 'STOCK_MARKET_DIR', trailingslashit( get_template_directory() ) );
define( 'STOCK_MARKET_URI', trailingslashit( get_template_directory_uri() ) );

### THEME DEFAULTS ###
require STOCK_MARKET_DIR . 'customize/theme-defaults.php';


### SETUP ###

if ( ! function_exists( 'stock_market_wp_setup' ) ) :
function stock_market_wp_setup() {

    global $stock_market_wp_defaults;
    
    #make theme available for translation. Translations can be filed in the /languages/ directory
    load_theme_textdomain( 'stock_market', STOCK_MARKET_DIR . 'languages' );

    #add default posts and comments RSS feed links to head
    add_theme_support( 'automatic-feed-links' );

    #let WordPress manage the document title
    add_theme_support( 'title-tag' );

    #support for post thumbnails on posts and pages
    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 300, 250, true );
    add_image_size( 'stock_market-post-thumbnail-recent', 350, 220, true );

    #navigation menus
    register_nav_menus( array(
        'header'    =>  __( 'Header Menu', 'stock_market' ),
        'footer'    =>  __( 'Footer Menu', 'stock_market' ),
    ) );
    
    #custom header support
    $args = array(
        'flex-width'    => true,
        'width'         => 1920,
        'flex-height'    => true,
        'height'        => 600,
        'default-image' => $stock_market_wp_defaults['stock_market_wp_custom_header'],
    );
    add_theme_support( 'custom-header', $args );
    
    #custom logo support
    add_theme_support( 'custom-logo', array('height' => 45, 'width' => 165,'flex-height' => true,'flex-width'  => true ) );
    
    #page excerpts
    add_post_type_support('page', 'excerpt');
    
}
endif;
add_action( 'after_setup_theme', 'stock_market_wp_setup' );


### AFTER SETUP ###

function stock_market_wp_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'stock_market_wp_content_width', 1200 );
}
add_action( 'after_setup_theme', 'stock_market_wp_content_width', 0 );



### FILTERS ###

function stock_market_wp_move_comment_field_to_bottom( $fields ) {
    $comment_field = $fields['comment'];
    unset( $fields['comment'] );
    $fields['comment'] = $comment_field;
    return $fields;
}
add_filter( 'comment_form_fields', 'stock_market_wp_move_comment_field_to_bottom' );

function stock_market_wp_excerpt_length( $length ) {
	return 65;
}
add_filter( 'excerpt_length', 'stock_market_wp_excerpt_length', 999 );


### STYLES AND SCRIPTS ###

function stock_market_wp_scripts() {
    
    /** CSS **/
    
    #bootstrap, fontawesome, bootstrapsocial
    wp_register_style('bootstrap', STOCK_MARKET_URI . 'assets/css/bootstrap.min.css' );
    wp_register_style('font-awesome', STOCK_MARKET_URI . 'assets/css/font-awesome.min.css' );
    wp_register_style('bootstrap-social', STOCK_MARKET_URI .'assets/css/bootstrap-social.css' );
    
    #animate.css
    wp_enqueue_style('animate-css', STOCK_MARKET_URI . 'assets/css/animate.css');

    #default stylesheet
    $deps = array('bootstrap', 'font-awesome', 'bootstrap-social');
    wp_enqueue_style('stock_market-wp-style', get_stylesheet_uri(), $deps );
        
    #color scheme
    $stock_market_wp_color_stylesheet = stock_market_wp_get_option('stock_market_wp_color_stylesheet');
    wp_enqueue_style('stock_market-wp-color', get_stylesheet_directory_uri() . '/color-schemes/' . strtolower($stock_market_wp_color_stylesheet) . '.css');
    
    // Load html5shiv.js
	wp_enqueue_script( 'stock_market-html5', STOCK_MARKET_URI . 'assets/js/html5shiv.js', array('stock_market-wp-style'), '3.7.0' );
	wp_script_add_data( 'stock_market-html5', 'conditional', 'lt IE 9' );
    // Load respond.min.js
	wp_enqueue_script( 'stock_market-respond', STOCK_MARKET_URI . 'assets/js/respond.min.js', array('stock_market-wp-style'), '1.3.0' );
	wp_script_add_data( 'stock_market-html5', 'conditional', 'lt IE 9' );
    
    /** Javascript **/
    
    #bootstrap
    wp_enqueue_script('bootstrap', STOCK_MARKET_URI . 'assets/js/bootstrap.min.js', array('jquery'), '', true );
    wp_enqueue_script('jquery-smartmenus', STOCK_MARKET_URI . 'assets/js/jquery.smartmenus.min.js', array('jquery'), '', true );
    wp_enqueue_script('jquery-smartmenus-bootstrap', STOCK_MARKET_URI . 'assets/js/jquery.smartmenus.bootstrap.min.js', array('jquery'), '', true );
        
    #animation
    $stock_market_wp_animations = stock_market_wp_get_option('stock_market_wp_animations');
    if($stock_market_wp_animations == 'Y') {
        wp_enqueue_script('wow', STOCK_MARKET_URI . '/assets/js/wow.min.js', array('jquery'), '', true );
        wp_enqueue_script('stock_market-wp-themejs-anim', STOCK_MARKET_URI . 'assets/js/stock_market-wp-anim.js', array('jquery'), '', true );
    }
    
    #parallax
    wp_enqueue_script('parallax', STOCK_MARKET_URI . 'assets/js/parallax.min.js', array('jquery'), '', true );
    
    #theme javascript
    wp_enqueue_script('stock_market-wp-themejs', STOCK_MARKET_URI . 'assets/js/stock_market-wp.js', array('jquery'), '', true );
    
    #comments
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
    
}
add_action( 'wp_enqueue_scripts', 'stock_market_wp_scripts' );


### CUSTOM CSS ###

function stock_market_wp_custom_css() {
    $stock_market_wp_custom_css = stock_market_wp_get_option('stock_market_wp_custom_css'); 
	echo '<!-- Custom CSS -->';
    $output="<style>" . stripslashes($stock_market_wp_custom_css) . "</style>";
    echo $output;
    echo '<!-- /Custom CSS -->';
}
add_action('wp_head','stock_market_wp_custom_css');


### CUSTOMIZER STYLES ("Upgrade to Pro") ###

function stock_market_wp_custom_customize_enqueue() {
    wp_enqueue_style( 'customizer-css', STOCK_MARKET_URI . 'customize/style.css' );
}
add_action( 'customize_controls_enqueue_scripts', 'stock_market_wp_custom_customize_enqueue' );


### WIDGETS ###

function stock_market_wp_widgets_init() {
    register_sidebar( array(
		'name'          => __( 'Footer Col 1', 'stock_market' ),
		'id'            => 'footer_1',
		'description'   => __( 'Add widgets here to appear in the first column of the footer.', 'stock_market' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
    register_sidebar( array(
		'name'          => __( 'Footer Col 2', 'stock_market' ),
		'id'            => 'footer_2',
		'description'   => __( 'Add widgets here to appear in the second column of the footer.', 'stock_market' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

}
add_action( 'widgets_init', 'stock_market_wp_widgets_init' );


### INCLUDES ###

#bootstrap nav walker
require STOCK_MARKET_DIR . 'includes/wp_bootstrap_navwalker.php';
#customizer
require STOCK_MARKET_DIR . 'customize/customizer.php';


### FUNCTIONS ###


#stock_market_wp_title
if ( ! function_exists( 'stock_market_wp_title' ) ) :
function stock_market_wp_title() {
    $title = '';
    if( is_home() && get_option('page_for_posts') ) {
        $title = get_page( get_option('page_for_posts') )->post_title;
    }
    else if ( is_page() ) {
        $title = get_the_title(); if($title == '') $title = __("Page ID: ", 'stock_market') . get_the_ID();
    }
    else if ( is_single() ){
        $title = get_the_title(); if($title == '') $title = __("Post ID: ", 'stock_market') . get_the_ID();
    }
    else if ( is_category() ) {
        $title = single_cat_title('', false);
    }
    else if ( is_tag() ) {
        $title = single_tag_title(__('Tag: ', 'stock_market'), false);
    }
    else if ( is_author() ) {
        $title = __('Author: ', 'stock_market') . '<span>' . get_the_author() . '</span>';
    }
    else if ( is_day() ) {
        $title = __('Day: ', 'stock_market') . '<span>' . get_the_date() . '</span>';
    }
    else if ( is_month() ) {
        $title = __('Month: ', 'stock_market') . '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'stock_market' ) )  . '</span>';
    }
    else if ( is_year() ) {
        $title = __('Year: ', 'stock_market') . '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'stock_market' ) )  . '</span>';
    }
    else if ( is_404() ) {
        $title = __('Not Found!', 'stock_market');
    }
    else if ( is_search() ) {
        $title = __('Search Results: ', 'stock_market') . get_search_query();
    }
    else {
        $title = __( 'Archives', 'stock_market' );
    }
    
    return $title;
} 
endif;


#stock_market_wp_get_col_class
if ( ! function_exists( 'stock_market_wp_get_col_class' ) ) :
function stock_market_wp_get_col_class($n){
    switch($n){
        case 1: return 'col-md-12'; break;
        case 2: return 'col-md-6'; break;
        case 3: return 'col-md-4'; break;
        case 4: return 'col-md-3'; break;
    }
}
endif;


#stock_market_wp_get_option
if ( ! function_exists( 'stock_market_wp_get_option' ) ) :
function stock_market_wp_get_option($key){
    global $stock_market_wp_defaults;
    if (array_key_exists($key, $stock_market_wp_defaults)) 
        $value = get_theme_mod($key, $stock_market_wp_defaults[$key]); 
    else
        $value = get_theme_mod($key);
    return $value;
}
endif;

### EXAMPLE/DEFAULTs CONTENT ###

#stock_market_wp_rand_page
function stock_market_wp_rand_page() {
    $pages = get_pages();
    if(!empty($pages)) {    
        shuffle($pages);
        return $pages[0]->ID; 
    } else {
        return false;
    }
} 

#stock_market_wp_random_thumbnail
function stock_market_wp_random_thumbnail($size='default'){
    global $stock_market_wp_defaults;
    if($size == 'stock_market-post-thumbnail-recent')
        $images = $stock_market_wp_defaults['stock_market_wp_recent_post_image'];
    else if($size == 'full')
        $images = $stock_market_wp_defaults['stock_market_wp_full_image'];
    else 
        $images = $stock_market_wp_defaults['stock_market_wp_featured_image'];
    $rand_key = array_rand($images, 1);
    echo esc_url($images[$rand_key]);
}

#stock_market_wp_sequential_thumbnail
function stock_market_wp_sequential_thumbnail($size, $n){
    global $stock_market_wp_defaults;
    if($size == 'stock_market-post-thumbnail-recent')
        $images = $stock_market_wp_defaults['stock_market_wp_recent_post_image'];
    else 
        $images = $stock_market_wp_defaults['stock_market_wp_featured_image'];
    echo esc_url($images[$n]); 
}

#stock_market_wp_example_nav_header
function stock_market_wp_example_nav_header(){
    $args = array('parent'=>0);
    $pages = get_pages($args);
    
    echo '<div class="navbar-collapse collapse"><ul class="nav navbar-nav navbar-right menu-header">';
    
    $stock_market_wp_enable_demo = stock_market_wp_get_option('stock_market_wp_enable_demo');
    if(get_option('show_on_front') == 'page' || $stock_market_wp_enable_demo == 'Y') {
        
        #one page items    
        $stock_market_wp_frontpage_position_content = stock_market_wp_get_option('stock_market_wp_frontpage_position_content'); 
        $stock_market_wp_frontpage_position_4cols = stock_market_wp_get_option('stock_market_wp_frontpage_position_4cols'); 
        $stock_market_wp_frontpage_position_cta_dark = stock_market_wp_get_option('stock_market_wp_frontpage_position_cta_dark'); 
        $stock_market_wp_frontpage_position_cta_dark2 = stock_market_wp_get_option('stock_market_wp_frontpage_position_cta_dark2'); 
        $stock_market_wp_frontpage_position_open1 = stock_market_wp_get_option('stock_market_wp_frontpage_position_open1'); 
        $stock_market_wp_frontpage_position_latest_posts = stock_market_wp_get_option('stock_market_wp_frontpage_position_latest_posts'); 
        $arr[$stock_market_wp_frontpage_position_content] = 'content';
        $arr[$stock_market_wp_frontpage_position_4cols] = '4cols';
        $arr[$stock_market_wp_frontpage_position_cta_dark] = 'cta_dark';
        $arr[$stock_market_wp_frontpage_position_cta_dark2] = 'cta_dark2';
        $arr[$stock_market_wp_frontpage_position_open1] = 'open1';
        $arr[$stock_market_wp_frontpage_position_latest_posts] = 'latest_posts';
        
        ksort($arr);
        foreach($arr as $k=>$v){
            
            if($v == 'content') {   echo '<li class="page-scroll"><a href="#welcome">' . __('Welcome', 'stock_market') . '</a></li>'; }
            
            if($v == '4cols')   {   $stock_market_wp_frontpage_4_cols_section_id = stock_market_wp_get_option('stock_market_wp_frontpage_4_cols_section_id'); 
                                    $stock_market_wp_frontpage_4_cols_heading = stock_market_wp_get_option('stock_market_wp_frontpage_4_cols_heading');
                                    echo '<li class="page-scroll"><a href="#'.esc_attr($stock_market_wp_frontpage_4_cols_section_id).'">' . esc_html($stock_market_wp_frontpage_4_cols_heading) . '</a></li>'; }
            
            if($v == 'cta_dark'){   $stock_market_wp_frontpage_cta_dark_section_id = stock_market_wp_get_option('stock_market_wp_frontpage_cta_dark_section_id');  
                                    echo '<li class="page-scroll"><a href="#'.esc_attr($stock_market_wp_frontpage_cta_dark_section_id).'">' . esc_html($stock_market_wp_frontpage_cta_dark_section_id) . '</a></li>'; }
                                    
            if($v == 'cta_dark2'){   $stock_market_wp_frontpage_cta_dark2_section_id = stock_market_wp_get_option('stock_market_wp_frontpage_cta_dark2_section_id');  
                                    echo '<li class="page-scroll"><a href="#'.esc_attr($stock_market_wp_frontpage_cta_dark2_section_id).'">' . esc_html($stock_market_wp_frontpage_cta_dark2_section_id) . '</a></li>'; }
                                    
            if($v == 'latest_posts') {  $stock_market_wp_frontpage_latest_posts_section_id = stock_market_wp_get_option('stock_market_wp_frontpage_latest_posts_section_id');  
                                    $stock_market_wp_frontpage_latest_posts_heading = stock_market_wp_get_option('stock_market_wp_frontpage_latest_posts_heading');
                                    echo '<li class="page-scroll"><a href="#'.esc_attr($stock_market_wp_frontpage_latest_posts_section_id).'">' . esc_html($stock_market_wp_frontpage_latest_posts_heading) . '</a></li>'; }
                                    
            if($v == 'open1')   {   $stock_market_wp_frontpage_open1_section_id = stock_market_wp_get_option('stock_market_wp_frontpage_open1_section_id'); 
                                    $stock_market_wp_frontpage_open1_heading = stock_market_wp_get_option('stock_market_wp_frontpage_open1_heading');
                                    echo '<li class="page-scroll"><a href="#'.esc_attr($stock_market_wp_frontpage_open1_section_id).'">' . esc_html($stock_market_wp_frontpage_open1_heading) . '</a></li>'; }
        }
    }
    
    #all top level pages
    foreach($pages as $page) 
        echo '<li><a href="'.get_permalink($page->ID).'">'.esc_html($page->post_title).'</a></li>';
    echo '</ul>';
    echo '</div>';
}

#stock_market_wp_example_nav_footer
function stock_market_wp_example_nav_footer(){
    $args = array('parent'=>0);
    $pages = get_pages($args);
    echo '<ul id="menu-footer" class="nav-foot">';
    foreach($pages as $page) 
        echo '<li><a href="'.get_permalink($page->ID).'">'.esc_html($page->post_title).'</a></li>';
    echo '</ul>';
}

#stock_market_wp_example_frontpage_content
function stock_market_wp_example_frontpage_content(){
    $random_page_id = stock_market_wp_rand_page();
    $random_page = get_post( $random_page_id ); 
    echo '<h2 class="block-title wow zoomIn">' . esc_html($random_page->post_title) . '</h2>';
    echo '<div class="wow fadeInUp">'. $random_page->post_content .'</div>';
}

#stock_market_wp_example_sidebar_footer
function stock_market_wp_example_sidebar_footer(){
    echo '<div class="footer-widgets bg-grey-light-3">';
    echo '<div class="container">';
    echo '<div class="row">';
    echo '<div class="col-md-6 col-xs-6 footer-widget footer-widget-col-1">';
    the_widget('WP_Widget_Pages', 'title=' . __('Pages', 'stock_market') , 'before_title=<h3 class="widget-title">&after_title=</h3>&before_widget=<div class="widget">&after_widget=</div>');
    echo '</div>';
    echo '<div class="col-md-6 col-xs-6 footer-widget footer-widget-col-2">';
    the_widget('WP_Widget_Recent_Posts', 'title=' . __('Recent Posts', 'stock_market') , 'before_title=<h3 class="widget-title">&after_title=</h3>&before_widget=<div class="widget">&after_widget=</div>');
    echo '</div>';
    echo '</div></div></div>';
}

#stock_market_wp_example_sidebar
function stock_market_wp_example_sidebar(){
    echo '<div class="sidebar-widgets" >';
    the_widget('WP_Widget_Search');
    the_widget('WP_Widget_Pages', 'title=' . __('Pages', 'stock_market') , 'before_title=<h3 class="widget-title">&after_title=</h3>&before_widget=<div class="widget">&after_widget=</div>');
    the_widget('WP_Widget_Recent_Posts', 'title=' . __('Recent Posts', 'stock_market') , 'before_title=<h3 class="widget-title">&after_title=</h3>&before_widget=<div class="widget">&after_widget=</div>');
    echo '</div>';
}

require STOCK_MARKET_DIR . "includes/custom-function.php";