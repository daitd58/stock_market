<?php $content = isset($instance['content']) ? $instance['content'] : "Our Stock Market Website"; ?>

<div class="stock-market-footer-info">
    <div class="stock-market-logo">
        <?php get_template_part('parts/header', 'logo'); ?>
    </div>
    <div class="clearfix"></div>
    <div class="content">
        <?php echo __($content, "stock-market"); ?>
    </div>
    
</div>
