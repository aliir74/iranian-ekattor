<div class="row">
  <div class="col-md-10 col-md-offset-1">
    <h3><?php echo get_phrase('about_us'); ?></h3>
    <hr />
    <form class="form-horizontal form-groups" method="post" id="jq-submit"
      action="<?php echo base_url();?>index.php?admin/frontend_settings/update_about_us"
        enctype="multipart/form-data">
      <div class="form-group">
    	   <textarea class="form-control wysihtml5" data-stylesheet-url="assets/css/wysihtml5-color.css"
           id="sample_wysiwyg"><?php echo $this->frontend_model->get_frontend_general_settings('about_us'); ?></textarea>
      <input type="hidden" name="about_us" id="about_us">
    	</div>
      <div class="form-group">
        <label for="field-1" class="col-sm-2 control-label"><?php echo get_phrase('banner_image');?></label>
        <div class="col-sm-7">
          <div class="fileinput fileinput-new" data-provides="fileinput">
            <div class="fileinput-new thumbnail" style="width: 300px; height: 200px;" data-trigger="fileinput">
              <?php $image = $this->frontend_model->get_frontend_general_settings('about_us_image'); ?>
              <img src="<?php echo base_url();?>uploads/frontend/<?php echo $image;?>" alt="...">
            </div>
            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 300px; max-height: 200px"></div>
            <div>
              <span class="btn btn-white btn-file">
                <span class="fileinput-new"><?php echo get_phrase('select_image'); ?></span>
                <span class="fileinput-exists"><?php echo get_phrase('change'); ?></span>
                <input type="file" name="about_us_image" accept="image/*">
              </span>
              <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput"><?php echo get_phrase('remove'); ?></a>
            </div>
          </div>
        </div>
      </div>
      <div class="form-group">
        <button type="button" class="btn btn-success" id="submit_button">
          <i class="entypo-check"></i> &nbsp; <?php echo get_phrase('save'); ?>
        </button>
      </div>
    </form>
  </div>
</div>

<script type="text/javascript">

  $('#submit_button').on('click', function() {
    var value = $('#sample_wysiwyg').val();
    $('#about_us').val(value);
    $('#jq-submit').submit();
  });

</script>
