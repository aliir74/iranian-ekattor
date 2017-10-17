<div class="row">
  <div class="col-md-10 col-md-offset-1">
    <h3><?php echo get_phrase('terms_&_conditions'); ?></h3>
    <hr />
    <form class="form-horizontal form-groups" method="post" id="jq-submit"
      action="<?php echo base_url();?>index.php?admin/frontend_settings/update_terms_conditions">
      <div class="form-group">
    	   <textarea class="form-control wysihtml5" data-stylesheet-url="assets/css/wysihtml5-color.css"
           id="sample_wysiwyg"><?php echo $this->frontend_model->get_frontend_general_settings('terms_conditions'); ?></textarea>
          <input type="hidden" name="terms_conditions" id="terms_conditions">
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
    $('#terms_conditions').val(value);
    $('#jq-submit').submit();
  });

</script>
