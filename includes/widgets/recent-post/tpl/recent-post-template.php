<?php
/**
 * Created by PhpStorm.
 * User: Thaibm
 * Date: 10/14/2016
 * Time: 21:08
 */
?>
<div class="recent-post-widget">
	<div class="row">
		<?php
		$amount = isset($instance['quantity']) ? $instance['quantity'] : 5;
		query_posts( array( 'orderby' => 'date', 'posts_per_page' => $amount ) );
		
		if ( have_posts() ) : while ( have_posts() ) : the_post();
			?>
			<div class="post">
				<div class="post-thumbnail col-md-4 col-sm-5">
					<div class="post-title-mobile-screen">
						<a href="<?php the_permalink() ?>"><?php the_title() ?></a>
					</div>
					<a href="<?php the_permalink() ?>">
						<?php if ( has_post_thumbnail() ) : $img = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' ); ?>
							<img src="<?php echo sow_esc_url( $img[0] ) ?>">
						<?php else : ?>
							<img
								src="<?php echo get_template_directory_uri() . '/assets/img/image-default.png' ?>">
						<?php endif; ?>
					</a>
				</div>
				<div class="post-content col-md-8 col-sm-7">
					<div class="post-title">
						<a href="<?php the_permalink() ?>"><?php the_title() ?></a>
					</div>
					<div class="post-info">
						<b><?php _e('Ngày đăng: ', 'stock_market'); ?></b>
						<?php echo get_the_date("d/m/Y"); ?>
					</div>
					<p class="content">
						<?php echo substr( get_the_excerpt(), 0, 250 ); ?> ...
					</p>
					<div class="continue">
						<a href="<?php the_permalink() ?>">Đọc thêm</a>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
		<?php endwhile;
//			wp_reset_postdata();
			wp_reset_query();?>
		<?php endif; ?>
		<div class="show-blog"><a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>">>><?php echo esc_html__('Xem toàn bộ', 'stock_market'); ?><<</a></div>
	</div>
</div>