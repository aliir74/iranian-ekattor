<?php
  $slider_images_json = $this->db->get_where('frontend_general_settings', array(
    'type' => 'slider_images'
  ))->row()->description;
  $slider_images = json_decode($slider_images_json);
?>
<div class="row">
  <div class="col-md-10 col-md-offset-1">
    <h3><?php echo get_phrase('homepage_slider_settings'); ?></h3>
    <hr />
    <form class="form-horizontal form-groups" method="post"
      action="<?php echo base_url();?>index.php?admin/frontend_settings/update_slider_images"
        enctype="multipart/form-data">
      <?php for ($i=0; $i<3; $i++): ?>
      <strong><?php echo get_phrase('slider_image').' - ' . ($i+1); ?></strong>
      <div class="row" style="margin-top: 20px;">
        <div class="col-md-7">
          <div class="form-group">
    				<label class="col-sm-3 control-label"><?php echo get_phrase('title'); ?></label>
    				<div class="col-sm-9">
    					<input type="text" class="form-control" name="title_<?php echo $i;?>" placeholder="<?php echo get_phrase('title');?>"
                value="<?php echo $slider_images[$i]->title;?>" required>
    				</div>
    			</div>
          <div class="form-group">
    				<label class="col-sm-3 control-label"><?php echo get_phrase('description'); ?></label>
    				<div class="col-sm-9">
    					<textarea name="description_<?php echo $i;?>" rows="5" class="form-control" required><?php echo $slider_images[$i]->description;?></textarea>
    				</div>
    			</div>
        </div>
        <div class="col-md-5">
          <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('slider_image');?></label>
            <div class="col-sm-9">
              <div class="fileinput fileinput-new" data-provides="fileinput">
                <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;" data-trigger="fileinput">
                  <img src="<?php echo base_url();?>uploads/frontend/slider/<?php echo $slider_images[$i]->image;?>" alt="...">
                </div>
                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
                <div>
                  <span class="btn btn-white btn-file">
                    <span class="fileinput-new"><?php echo get_phrase('select_image'); ?></span>
                    <span class="fileinput-exists"><?php echo get_phrase('change'); ?></span>
                    <input type="file" name="slider_image_<?php echo $i;?>" accept="image/*">
                  </span>
                  <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput"><?php echo get_phrase('remove'); ?></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <hr>
    <?php endfor; ?>
      <button type="submit" class="btn btn-success">
        <i class="entypo-check"></i> &nbsp; <?php echo get_phrase('save'); ?>
      </button>
    </form>
  </div>
</div>
