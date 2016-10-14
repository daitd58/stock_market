<?php
/**
 * The front page template file.
 * 
 * @package stock_market
 */
?>
<?php get_header(); ?>

<!-- ========== Content Starts ========== -->
    <div class="section blog-feed bg-white">
        <div class="container">
            <div class="row">
            
                <div class="col-md-12 blog-feed-column">
                
                    <!-- Loop -->
                    <?php 
                    if ( have_posts() ) { 
                        while ( have_posts() ) : the_post();
                            the_content();
                        endwhile;
                    } 
                    else { ?>
                    <div class="no-results"><p><?php _e('No posts found.', 'stock_market'); ?></p></div>
                    <?php } ?>
                    
                </div>
                
            </div> 
        </div> 
    </div> 
    <!-- ========== /Content Ends ========== -->

<?php get_sidebar('footer'); ?>
<?php get_footer(); ?>