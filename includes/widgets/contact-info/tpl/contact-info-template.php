<?php

$heading = $instance ['heading'];
$contact_phone = $instance ['contact_info']['phone'];
$contact_email = $instance ['contact_info']['email'];

?>
<div class="stock-market-contact-info">
    <h3 class="heading"><?php echo $heading ?></h3>
    <div class="contact-info">
        <?php if($contact_phone): ?>
        <div class="phone">
            <i class="fa fa-phone"></i>
            <?php echo $contact_phone ?>
        </div>
        <?php endif; ?>

        <?php if($contact_email): ?>
        <div class="email">
            <i class="fa fa-envelope"></i>
            <?php echo $contact_email ?>
        </div>
        <?php endif; ?>
    </div>
</div>