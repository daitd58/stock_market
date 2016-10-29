<div class="investment-detail">
	<ul class="inv-list-item">
		<?php
		$joined_text = '';
		// Ensure that the repeater is available and not empty.
		if ( ! empty( $instance['investment'] ) ) {
			$repeater_items = $instance['investment'];
			foreach ( $repeater_items as $index => $repeater_item ) {
				$src_image = wp_get_attachment_image_src( $repeater_item['featured_image'] );
				$src_file  = wp_get_attachment_url( $repeater_item['file'] );
				?>
				<li class="inv-item col-md-3 col-sm-4 col-xs-12">
					<div class="inner-item">
						<a href="<?php echo $src_file; ?>" class="wrap-link" target="_blank">
							<div class="wrap-img">
								<img src="<?php if($src_image[0]){echo $src_image[0];}else{echo get_template_directory_uri() . '/assets/img/image-default.png'; } ?>" alt="">
							</div>
							<div class="wrap-content">
								<h3 class="title"><?php echo $repeater_item['title']; ?></h3>
							</div>
						</a>
						<div class="item-bottom">
							<p class="short-description"><?php echo $repeater_item['description']; ?></p>
							<a href="<?php echo $src_file; ?>" class="btn-view-detail" target="_blank">Xem chi tiết</a>
						</div>
					</div>
				</li>
				<?php
			}
		}
		return array(
			'joined_text' => ! empty( $joined_text ) ? $joined_text : 'A default string'
		);
		?>
	</ul>
</div>
