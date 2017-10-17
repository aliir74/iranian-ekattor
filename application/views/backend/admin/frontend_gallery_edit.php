<?php
  $info = $this->db->get_where('frontend_gallery', array('frontend_gallery_id' => $param2))->result_array();
  foreach ($info as $row):
?>
<form class="form-horizontal form-groups" method="post"
  action="<?php echo base_url();?>index.php?admin/frontend_gallery/edit_gallery/<?php echo $row['frontend_gallery_id'];?>"
  style="margin-top: 20px;" enctype="multipart/form-data">
  <div class="form-group">
    <label class="col-sm-3 control-label"><?php echo get_phrase('title'); ?></label>
    <div class="col-sm-8">
      <input type="text" class="form-control" name="title" placeholder="<?php echo get_phrase('gallery_title');?>"
        value="<?php echo $row['title'];?>"  required>
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-3 control-label"><?php echo get_phrase('description'); ?></label>
    <div class="col-sm-8">
      <textarea name="description" rows="5" class="form-control"><?php echo $row['description'];?></textarea>
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-3 control-label"><?php echo get_phrase('date'); ?></label>
    <div class="col-sm-5">
      <div class="input-group">
        <input type="text" class="form-control datepicker" data-format="mm/d/yyyy" name="date_added"
          value="<?php echo date('m/d/Y', $row['date_added']);?>">
        <div class="input-group-addon">
          <a href="#"><i class="entypo-calendar"></i></a>
        </div>
      </div>
    </div>
  </div>
  <div class="form-group">
    <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('cover_image');?></label>
    <div class="col-sm-7">
      <div class="fileinput fileinput-new" data-provides="fileinput">
        <div class="fileinput-new thumbnail" style="width: 300px; height: 150px;" data-trigger="fileinput">
          <img src="uploads/frontend/gallery_cover/<?php echo $row['image'];?>" alt="...">
        </div>
        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
        <div>
          <span class="btn btn-white btn-file">
            <span class="fileinput-new"><?php echo get_phrase('select_image'); ?></span>
            <span class="fileinput-exists"><?php echo get_phrase('change'); ?></span>
            <input type="file" name="cover_image" accept="image/*">
          </span>
          <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput"><?php echo get_phrase('remove'); ?></a>
        </div>
      </div>
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-3 control-label"><?php echo get_phrase('show_on_website'); ?></label>
    <div class="col-sm-5">
      <select class="form-control selectboxit" name="show_on_website">
        <option value="0" <?php if ($row['show_on_website'] == 0) echo 'selected';?>><?php echo get_phrase('no'); ?></option>
        <option value="1" <?php if ($row['show_on_website'] == 1) echo 'selected';?>><?php echo get_phrase('yes'); ?></option>
      </select>
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-3 control-label"></label>
    <div class="col-sm-7">
      <button type="submit" class="btn btn-success">
        <i class="entypo-check"></i> &nbsp; <?php echo get_phrase('update'); ?>
      </button>
    </div>
  </div>
</form>
<?php endforeach; ?>
