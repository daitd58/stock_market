<?php
### DEFAULTS ###

$stock_market_wp_defaults['stock_market_wp_upgrade_to_pro'] = '';
$stock_market_wp_defaults['stock_market_wp_info'] = '';

#stock_market_wp_general_settings_section
$stock_market_wp_defaults['stock_market_wp_enable_demo'] = 'N';
$stock_market_wp_defaults['stock_market_wp_animations'] = 'Y';
$stock_market_wp_defaults['stock_market_hide_footer_widgets'] = 'N';

#stock_market_wp_logo_section
$stock_market_wp_defaults['stock_market_wp_show_logo_image'] = 'N';
$stock_market_wp_defaults['stock_market_wp_logo_image'] = '';
$stock_market_wp_defaults['stock_market_wp_logo_text'] = get_bloginfo('name');;

#stock_market_wp_colors_section
$stock_market_wp_defaults['stock_market_wp_color_stylesheet'] = 'Orange';

#stock_market_wp_frontpage_section
$stock_market_wp_defaults['stock_market_wp_frontpage_banner'] = 'Image Banner';
$stock_market_wp_defaults['stock_market_wp_frontpage_content'] = 'Y';
$stock_market_wp_defaults['stock_market_wp_frontpage_cta_dark'] = 'Y';
$stock_market_wp_defaults['stock_market_wp_frontpage_cta_dark2'] = 'Y';
$stock_market_wp_defaults['stock_market_wp_frontpage_4cols'] = 'Y';
$stock_market_wp_defaults['stock_market_wp_frontpage_open1'] = 'Y';
$stock_market_wp_defaults['stock_market_wp_frontpage_latest_posts'] = 'Y';

#stock_market_wp_frontpage_positions_section
$stock_market_wp_defaults['stock_market_wp_frontpage_position_content'] = 10;
$stock_market_wp_defaults['stock_market_wp_frontpage_position_cta_dark'] = 20;
$stock_market_wp_defaults['stock_market_wp_frontpage_position_4cols'] = 30;
$stock_market_wp_defaults['stock_market_wp_frontpage_position_latest_posts'] = 40;
$stock_market_wp_defaults['stock_market_wp_frontpage_position_cta_dark2'] = 45;
$stock_market_wp_defaults['stock_market_wp_frontpage_position_open1'] = 50;

#stock_market_wp_frontpage_banner_section
$stock_market_wp_defaults['stock_market_wp_frontpage_banner_image'] = esc_url(STOCK_MARKET_URI) . 'sample/images/header.jpg';
$stock_market_wp_defaults['stock_market_wp_frontpage_banner_heading'] = get_bloginfo('name');
$stock_market_wp_defaults['stock_market_wp_frontpage_banner_text'] = get_bloginfo('description');

#stock_market_wp_frontpage_4_cols_section
$stock_market_wp_defaults['stock_market_wp_frontpage_4cols_n'] = 4;
$stock_market_wp_defaults['stock_market_wp_frontpage_4_cols_heading'] = __('Featured Pages', 'stock_market');
$stock_market_wp_defaults['stock_market_wp_frontpage_4_cols_read_more'] = __('READ MORE', 'stock_market');
$stock_market_wp_defaults['stock_market_wp_frontpage_4_cols_text'] = __('You can select each of these pages from the Appearance > Customize section. The page excerpt is displayed here on the front page and you can select which icons to display for each.', 'stock_market');
$stock_market_wp_defaults['stock_market_wp_frontpage_4_cols_1_icon'] = 'fa-desktop';
$stock_market_wp_defaults['stock_market_wp_frontpage_4_cols_1'] = stock_market_wp_rand_page();
$stock_market_wp_defaults['stock_market_wp_frontpage_4_cols_2_icon'] = 'fa-comments';
$stock_market_wp_defaults['stock_market_wp_frontpage_4_cols_2'] = stock_market_wp_rand_page();
$stock_market_wp_defaults['stock_market_wp_frontpage_4_cols_3_icon'] = 'fa-cogs';
$stock_market_wp_defaults['stock_market_wp_frontpage_4_cols_3'] = stock_market_wp_rand_page();
$stock_market_wp_defaults['stock_market_wp_frontpage_4_cols_4_icon'] = 'fa-camera';
$stock_market_wp_defaults['stock_market_wp_frontpage_4_cols_4'] = stock_market_wp_rand_page();
$stock_market_wp_defaults['stock_market_wp_frontpage_4_cols_section_id'] = '4cols';

#stock_market_wp_frontpage_open1_section
$stock_market_wp_defaults['stock_market_wp_frontpage_open1_heading'] = __('Content Heading', 'stock_market');
$stock_market_wp_defaults['stock_market_wp_frontpage_open1_content'] = stock_market_wp_rand_page();
$stock_market_wp_defaults['stock_market_wp_frontpage_open1_section_id'] = 'open';

#stock_market_wp_frontpage_cta_dark_section
$stock_market_wp_defaults['stock_market_wp_frontpage_cta_dark_content'] = stock_market_wp_rand_page();
$stock_market_wp_defaults['stock_market_wp_frontpage_cta_dark_parallax'] = 'Y';
#parallax background
$stock_market_wp_defaults['stock_market_wp_parallax_bg'] = esc_url(STOCK_MARKET_URI) . 'sample/images/cta-parallax-bg.png';
$stock_market_wp_defaults['stock_market_wp_frontpage_cta_dark_bg_image'] = $stock_market_wp_defaults['stock_market_wp_parallax_bg'];
$stock_market_wp_defaults['stock_market_wp_frontpage_cta_dark_section_id'] = 'cta';

#stock_market_wp_frontpage_cta_dark2_section
$stock_market_wp_defaults['stock_market_wp_frontpage_cta_dark2_content'] = stock_market_wp_rand_page();
$stock_market_wp_defaults['stock_market_wp_frontpage_cta_dark2_parallax'] = 'Y';
#parallax background
$stock_market_wp_defaults['stock_market_wp_parallax_bg2'] = esc_url(STOCK_MARKET_URI) . 'sample/images/cta-parallax-bg2.png';
$stock_market_wp_defaults['stock_market_wp_frontpage_cta_dark2_bg_image'] = $stock_market_wp_defaults['stock_market_wp_parallax_bg2'];
$stock_market_wp_defaults['stock_market_wp_frontpage_cta_dark2_section_id'] = 'cta2';


#stock_market_wp_frontpage_latest_posts_section
$stock_market_wp_defaults['stock_market_wp_frontpage_latest_posts_n'] = 3;
$stock_market_wp_defaults['stock_market_wp_frontpage_latest_posts_heading'] = __('Latest Posts', 'stock_market');
$stock_market_wp_defaults['stock_market_wp_frontpage_latest_posts_section_id'] = 'latest';

#stock_market_wp_blog_feed_section
$stock_market_wp_defaults['stock_market_wp_blog_feed_meta'] = 'Y';
$stock_market_wp_defaults['stock_market_wp_blog_feed_meta_date'] = 'Y';
$stock_market_wp_defaults['stock_market_wp_blog_feed_meta_category'] = 'Y';
$stock_market_wp_defaults['stock_market_wp_blog_feed_meta_author'] = 'N';
$stock_market_wp_defaults['stock_market_wp_blog_feed_display'] = 'Small Image Left, Excerpt Right'; //'Large Image Top, Full Content Below'; //'Small Image Left, Excerpt Right';
$stock_market_wp_defaults['stock_market_wp_blog_feed_buttons'] = 'Y';
$stock_market_wp_defaults['stock_market_wp_blog_feed_banner'] = 'Custom Header';
$stock_market_wp_defaults['stock_market_wp_blog_feed_animations'] = 'Y';

#stock_market_wp_post_section
$stock_market_wp_defaults['stock_market_wp_post_meta'] = 'Y';
$stock_market_wp_defaults['stock_market_wp_post_meta_date'] = 'Y';
$stock_market_wp_defaults['stock_market_wp_post_meta_category'] = 'Y';
$stock_market_wp_defaults['stock_market_wp_post_meta_author'] = 'Y';
$stock_market_wp_defaults['stock_market_wp_post_tags'] = 'Y';
$stock_market_wp_defaults['stock_market_wp_post_banner'] = 'Custom Header';
$stock_market_wp_defaults['stock_market_wp_post_sidebar'] = 'Y';
$stock_market_wp_defaults['stock_market_wp_post_featured_image'] = 'Y';

#stock_market_wp_page_section
$stock_market_wp_defaults['stock_market_wp_page_banner'] = 'Custom Header';
$stock_market_wp_defaults['stock_market_wp_page_sidebar'] = 'N';

#stock_market_advanced_section
$stock_market_wp_defaults['stock_market_wp_google_analytics'] = '';
$stock_market_wp_defaults['stock_market_wp_custom_css'] = '';

#stock_market_wp_footer_section
$stock_market_wp_defaults['stock_market_wp_footer_credit_message'] = __('All rights reserved.', 'stock_market');
$stock_market_wp_defaults['stock_market_wp_footer_copyright_message'] = get_bloginfo('name') . ' ' . date("Y") .'. ';


/*** default/example images ***/
#header
$stock_market_wp_defaults['stock_market_wp_custom_header'] = esc_url(STOCK_MARKET_URI) . 'sample/images/header.jpg';
#featured images
$stock_market_wp_defaults['stock_market_wp_featured_image'][] = esc_url(STOCK_MARKET_URI) . 'sample/images/featured-image-1.jpg';
$stock_market_wp_defaults['stock_market_wp_featured_image'][] = esc_url(STOCK_MARKET_URI) . 'sample/images/featured-image-2.jpg';
$stock_market_wp_defaults['stock_market_wp_featured_image'][] = esc_url(STOCK_MARKET_URI) . 'sample/images/featured-image-3.jpg';
$stock_market_wp_defaults['stock_market_wp_featured_image'][] = esc_url(STOCK_MARKET_URI) . 'sample/images/featured-image-4.jpg';
$stock_market_wp_defaults['stock_market_wp_featured_image'][] = esc_url(STOCK_MARKET_URI) . 'sample/images/featured-image-5.jpg';
$stock_market_wp_defaults['stock_market_wp_featured_image'][] = esc_url(STOCK_MARKET_URI) . 'sample/images/featured-image-6.jpg';
$stock_market_wp_defaults['stock_market_wp_featured_image'][] = esc_url(STOCK_MARKET_URI) . 'sample/images/featured-image-7.jpg';
$stock_market_wp_defaults['stock_market_wp_featured_image'][] = esc_url(STOCK_MARKET_URI) . 'sample/images/featured-image-8.jpg';
$stock_market_wp_defaults['stock_market_wp_featured_image'][] = esc_url(STOCK_MARKET_URI) . 'sample/images/featured-image-9.jpg';
$stock_market_wp_defaults['stock_market_wp_featured_image'][] = esc_url(STOCK_MARKET_URI) . 'sample/images/featured-image-10.jpg';
#stock_market-post-thumbnail-recent
$stock_market_wp_defaults['stock_market_wp_recent_post_image'][] = esc_url(STOCK_MARKET_URI) . 'sample/images/recent-news-1.jpg';
$stock_market_wp_defaults['stock_market_wp_recent_post_image'][] = esc_url(STOCK_MARKET_URI) . 'sample/images/recent-news-2.jpg';
$stock_market_wp_defaults['stock_market_wp_recent_post_image'][] = esc_url(STOCK_MARKET_URI) . 'sample/images/recent-news-3.jpg';
#stock_market_wp_full_image
$stock_market_wp_defaults['stock_market_wp_full_image'][] = esc_url(STOCK_MARKET_URI) . 'sample/images/full-1.jpg';
$stock_market_wp_defaults['stock_market_wp_full_image'][] = esc_url(STOCK_MARKET_URI) . 'sample/images/full-2.jpg';
$stock_market_wp_defaults['stock_market_wp_full_image'][] = esc_url(STOCK_MARKET_URI) . 'sample/images/full-3.jpg';
$stock_market_wp_defaults['stock_market_wp_full_image'][] = esc_url(STOCK_MARKET_URI) . 'sample/images/full-4.jpg';
$stock_market_wp_defaults['stock_market_wp_full_image'][] = esc_url(STOCK_MARKET_URI) . 'sample/images/full-5.jpg';

?>