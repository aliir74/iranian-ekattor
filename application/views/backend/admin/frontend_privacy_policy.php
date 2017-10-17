<div class="row">
  <div class="col-md-10 col-md-offset-1">
    <h3><?php echo get_phrase('privacy_policy'); ?></h3>
    <hr />
    <form class="form-horizontal form-groups" method="post" id="jq-submit"
      action="<?php echo base_url();?>index.php?admin/frontend_settings/update_privacy_policy">
      <div class="form-group">
    	   <textarea class="form-control wysihtml5" data-stylesheet-url="assets/css/wysihtml5-color.css"
           id="sample_wysiwyg"><?php echo $this->frontend_model->get_frontend_general_settings('privacy_policy'); ?></textarea>
        <input type="hidden" name="privacy_policy" id="privacy_policy">
    	</div>
      <div class="form-group">
        <button type="button" class="btn btn-success"
          id="submit_button">
          <i class="entypo-check"></i> &nbsp; <?php echo get_phrase('save'); ?>
        </button>
      </div>
    </form>
  </div>
</div>

<script type="text/javascript">

  $('#submit_button').on('click', function() {
    var value = $('#sample_wysiwyg').val();
    $('#privacy_policy').val(value);
    $('#jq-submit').submit();
  });

</script>
