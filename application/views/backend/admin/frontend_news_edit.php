<a href="#"
  class="btn btn-info">
  <i class="entypo-left-thin"></i> &nbsp; <?php echo get_phrase('news_list'); ?>
</a>
<form class="form-horizontal form-groups" id="jq-submit" method="post"
  action="<?php echo base_url();?>index.php?admin/frontend_news/add_news"
    enctype="multipart/form-data"
  style="margin-top: 20px;">
  <div class="form-group">
    <label class="col-sm-3 control-label"><?php echo get_phrase('news_title'); ?></label>
    <div class="col-sm-7">
      <input type="text" class="form-control" name="title" placeholder="<?php echo get_phrase('news_title');?>" required>
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-3 control-label"><?php echo get_phrase('description'); ?></label>
    <div class="col-sm-7">
      <textarea class="form-control wysihtml5" data-stylesheet-url="assets/css/wysihtml5-color.css"
       id="sample_wysiwyg"></textarea>
      <input type="hidden" name="description" id="description">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-3 control-label"><?php echo get_phrase('date'); ?></label>
    <div class="col-sm-4">
      <div class="input-group">
        <input type="text" class="form-control datepicker" data-format="mm/d/yyyy" name="date"
          value="<?php echo date('m/d/Y');?>">
        <div class="input-group-addon">
          <a href="#"><i class="entypo-calendar"></i></a>
        </div>
      </div>
    </div>
  </div>
  <div class="form-group">
    <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('news_image');?></label>
    <div class="col-sm-7">
      <div class="fileinput fileinput-new" data-provides="fileinput">
        <div class="fileinput-new thumbnail" style="width: 300px; height: 150px;" data-trigger="fileinput">
          <img src="" alt="...">
        </div>
        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
        <div>
          <span class="btn btn-white btn-file">
            <span class="fileinput-new"><?php echo get_phrase('select_image'); ?></span>
            <span class="fileinput-exists"><?php echo get_phrase('change'); ?></span>
            <input type="file" name="news_image" accept="image/*">
          </span>
          <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput"><?php echo get_phrase('remove'); ?></a>
        </div>
      </div>
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-3 control-label"></label>
    <div class="col-sm-7">
      <button type="button" class="btn btn-success" id="submit_button">
        <i class="entypo-check"></i> &nbsp; <?php echo get_phrase('update_news'); ?>
      </button>
    </div>
  </div>
</form>
