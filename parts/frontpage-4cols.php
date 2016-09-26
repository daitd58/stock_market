<?php
/**
 * The template part for displaying the 4 featured columns on the front page (static)
 *
 * @package stock_market
 */
?>

<?php 
global $stock_market_wp_curr_bg, $stock_market_wp_prev_bg; 

$stock_market_wp_frontpage_4cols = stock_market_wp_get_option('stock_market_wp_frontpage_4cols'); 
if($stock_market_wp_frontpage_4cols == 'Y') { 
if($stock_market_wp_prev_bg == 'bg-white' || $stock_market_wp_prev_bg = 'bg-primary') $stock_market_wp_curr_bg = 'bg-grey-light'; else $stock_market_wp_curr_bg = 'bg-white';  
$stock_market_wp_prev_bg = $stock_market_wp_curr_bg;
?>

<?php
for($i=1;$i<=4;$i++) { 
    $pages[] = stock_market_wp_get_option('stock_market_wp_frontpage_4_cols_' . $i);
} 
for($i=1;$i<=4;$i++) { 
    $icons[] = stock_market_wp_get_option('stock_market_wp_frontpage_4_cols_'.$i.'_icon'); 
}

$stock_market_wp_frontpage_4_cols_heading = stock_market_wp_get_option('stock_market_wp_frontpage_4_cols_heading'); 
$stock_market_wp_frontpage_4_cols_text = stock_market_wp_get_option('stock_market_wp_frontpage_4_cols_text'); 
$stock_market_wp_frontpage_4_cols_read_more = stock_market_wp_get_option('stock_market_wp_frontpage_4_cols_read_more');

$stock_market_wp_frontpage_4cols_n = stock_market_wp_get_option('stock_market_wp_frontpage_4cols_n'); 
if($stock_market_wp_frontpage_4cols_n == '') $stock_market_wp_frontpage_4cols_n = 4;
if($stock_market_wp_frontpage_4cols_n <= 0 || $stock_market_wp_frontpage_4cols_n > 4) $stock_market_wp_frontpage_4cols_n = 4;

$stock_market_wp_frontpage_4_cols_section_id = stock_market_wp_get_option('stock_market_wp_frontpage_4_cols_section_id'); 

?>
<!-- ========== Four Columns ========== -->
<div class="section <?php echo esc_attr($stock_market_wp_curr_bg) ?> frontpage-4cols" id="<?php echo esc_attr($stock_market_wp_frontpage_4_cols_section_id) ?>">
    <div class="container">
        <?php if($stock_market_wp_frontpage_4_cols_heading) { ?><h2 class="wow zoomIn block-title"><?php echo esc_html($stock_market_wp_frontpage_4_cols_heading); ?></h2><?php } ?>
        <?php if($stock_market_wp_frontpage_4_cols_text) { ?><div class="wow zoomIn text-center description"><?php echo wp_kses_post($stock_market_wp_frontpage_4_cols_text) ?></div><?php } ?>
        <div class="row cols">
            <?php for($i=0;$i<$stock_market_wp_frontpage_4cols_n;$i++) { ?>
            <?php 
            if($stock_market_wp_frontpage_4cols_n == 1)   $class = "col-md-12";
            if($stock_market_wp_frontpage_4cols_n == 2)   $class = "col-md-6 col-sm-6";
            if($stock_market_wp_frontpage_4cols_n == 3)   $class = "col-md-4 col-sm-4";
            if($stock_market_wp_frontpage_4cols_n == 4)   $class = "col-md-3 col-sm-6";
            ?>
            <?php $col_page = get_post($pages[$i]); 
            $temp = $post; $post = get_post( $col_page->ID ); setup_postdata( $post ); ?>
            <div class="<?php echo $class ?>">
                <div class="content-icon wow fadeInUp">
                    <a class="icon" href="<?php the_permalink(); ?>">
                        <i class="fa <?php echo esc_attr($icons[$i]) ?>"></i>
                    </a>
                    <h4 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                    <div class="body">
                        <p><?php the_excerpt(); ?></p>
                    </div>
                    <?php if($stock_market_wp_frontpage_4_cols_read_more != '') { ?>
                    <div class="foot">
                        <a href="<?php the_permalink(); ?>" class="btn btn-inverse"><?php echo esc_html($stock_market_wp_frontpage_4_cols_read_more); ?></a>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <?php } wp_reset_postdata(); $post = $temp; ?>
        </div>
    </div>
</div> 
<!-- ========== /Four Columns ========== -->
<?php } ?>
