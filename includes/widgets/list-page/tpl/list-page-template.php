<div class="list-page">
    <?php
    $children = wp_list_pages('title_li=&child_of='.get_the_ID().'&echo=0');
    if ($children) { ?>
        <ul>
            <?php echo $children; ?>
        </ul>
    <?php } ?>
</div>
