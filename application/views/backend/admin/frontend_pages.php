<hr>
<div class="row">
  <div class="col-md-2">
    <a href="<?php echo base_url();?>index.php?admin/noticeboard/"
      class="btn btn-default btn-block">
      <?php echo get_phrase('noticeboard'); ?>
    </a>
    <a href="<?php echo base_url();?>index.php?admin/frontend_pages/events"
      class="btn btn-<?php echo $page_content == 'frontend_events' ? 'primary' : 'default'; ?> btn-block">
      <?php echo get_phrase('events'); ?>
    </a>
    <a href="<?php echo base_url();?>index.php?admin/teacher"
      class="btn btn-default btn-block">
      <?php echo get_phrase('teachers'); ?>
    </a>
    <a href="<?php echo base_url();?>index.php?admin/frontend_pages/gallery"
      class="btn btn-<?php echo ($page_content == 'frontend_gallery' || $page_content == 'frontend_gallery_image') ? 'primary' : 'default'; ?> btn-block">
      <?php echo get_phrase('gallery'); ?>
    </a>
    <a href="<?php echo base_url();?>index.php?admin/frontend_pages/about_us"
      class="btn btn-<?php echo $page_content == 'frontend_about_us' ? 'primary' : 'default'; ?> btn-block">
      <?php echo get_phrase('about_us'); ?>
    </a>
    <a href="<?php echo base_url();?>index.php?admin/frontend_pages/terms_conditions"
      class="btn btn-<?php echo $page_content == 'frontend_terms_conditions' ? 'primary' : 'default'; ?> btn-block">
      <?php echo get_phrase('terms_&_conditions'); ?>
    </a>
    <a href="<?php echo base_url();?>index.php?admin/frontend_pages/privacy_policy"
      class="btn btn-<?php echo $page_content == 'frontend_privacy_policy' ? 'primary' : 'default'; ?> btn-block">
      <?php echo get_phrase('privacy_policy'); ?>
    </a>
    <a href="<?php echo base_url();?>index.php?admin/frontend_pages/homepage_slider"
      class="btn btn-<?php echo $page_content == 'frontend_slider' ? 'primary' : 'default'; ?> btn-block">
      <?php echo get_phrase('homepage_slider'); ?>
    </a>
    <a href="<?php echo base_url();?>index.php?admin/frontend_pages/general"
      class="btn btn-<?php echo $page_content == 'frontend_general_settings' ? 'primary' : 'default'; ?> btn-block">
      <?php echo get_phrase('general_settings'); ?>
    </a>
  </div>
  <div class="col-md-10">
    <?php include $page_content.'.php'; ?>
  </div>
</div>
