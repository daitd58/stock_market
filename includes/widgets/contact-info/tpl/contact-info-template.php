<?php
$heading = isset($instance['heading']) ? $instance['heading'] : "Contact Info";
$contact_phone = isset($instance['contact_info']['phone']) ? $instance['contact_info']['phone'] : "+84xxxx";
$contact_email = isset($instance['contact_info']['email']) ? $instance['contact_info']['email'] : "abc@gmail.com";
$contact_time = isset($instance['contact_info']['time']) ? $instance['contact_info']['time'] : "Everyday";
$facebook = isset($instance['social_info']['facebook']) ? $instance['social_info']['facebook'] : "facebook.com";
$twitter = isset($instance['social_info']['twitter']) ? $instance['social_info']['twitter'] : "twitter.com";
$gg_plus = isset($instance['social_info']['gg_plus']) ? $instance['social_info']['gg_plus'] : "plus.google.com";
?>

<div class="stock-market-contact-info">
    <div class="heading"><?php echo $heading ?></div>
    <div class="contact-info">
        <div class="phone">
            <i class="fa fa-phone"></i>
            <?php echo $contact_phone ?>
        </div>
        <div class="email">
            <i class="fa fa-envelope"></i>
            <?php echo $contact_email ?>
        </div>
        <div class="working-time">
            <i class="fa fa-clock-o"></i>
            <?php echo $contact_time ?>
        </div>
    </div>
    <div class="social-info">

        <a class="link-facebook" href="<?php echo $facebook ?>">
            <i class="fa fa-facebook"></i>
        </a>

        <a class="link-twitter" href="<?php echo $twitter ?>">
            <i class="fa fa-twitter"></i>
        </a>


        <a class="link-google-plus" href="<?php echo $gg_plus ?>">
            <i class="fa fa-google-plus"></i>
        </a>

    </div>
</div>