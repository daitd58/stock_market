<?php get_header(); ?>
<?php get_template_part('parts/banner'); ?>
<div id="blog-posts" class="container">
    <?php
    if ( have_posts() ) :
        while ( have_posts() ) : the_post();
            get_template_part( 'parts/content', 'none' );
        endwhile;
        echo '<nav class="paginate-link">' . paginate_links( array(
                'base'      => str_replace( 99, '%#%', esc_url( get_pagenum_link( 99 ) ) ),
                'format'    => '?paged=%#%',
                'mid_size'  => 2,
                'prev_text' => '<i class="fa fa-angle-left" aria-hidden="true"></i>',
                'next_text' => '<i class="fa fa-angle-right" aria-hidden="true"></i>',
                'current'   => max( 1, get_query_var( 'paged' ) ),
                'total'     => $wp_query->max_num_pages
            ) ) . '</nav>';
    else :
        get_template_part( 'template-parts/content', 'none' );
    endif;
    ?>
</div>
<?php get_footer(); ?>
