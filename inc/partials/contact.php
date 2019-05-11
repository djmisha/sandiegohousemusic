<?php
$id = get_sub_field('id');
$heading = get_sub_field('heading');
$content = get_sub_field('content');
$background = get_sub_field('background');
$text = get_sub_field('text');
?>

<section class="flexible-contact" id="<?php echo $id; ?>">
  <div class="contact-content">
   <h2><?php echo $heading; ?></h2>
   <?php echo $text; ?>
 </div>
 <a href="<?php bloginfo('template_directory'); ?>/patient-information-resources/internet-consultation-next-steps/">
  <div class="virtual-consulation sidebar-button">
    <i class="fas fa-user-tie"></i>
    <i class="far fa-comment-alt"></i>
    Virtual Consultation
  </div>
</a>
</section>

