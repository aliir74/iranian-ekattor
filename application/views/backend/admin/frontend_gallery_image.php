<div class="row">
  <h4>
    <?php echo $this->db->get_where('frontend_gallery', array('frontend_gallery_id' => $gallery_id))->row()->title; ?>
  </h4>
</div>
<hr />
<div class="row">
  <form class="form-horizontal form-groups" method="post" enctype="multipart/form-data"
    action="<?php echo base_url();?>index.php?admin/frontend_gallery/upload_images/<?php echo $gallery_id;?>">
    <div class="form-group">
      <label class="col-sm-3 control-label"><?php echo get_phrase('select_images'); ?></label>
      <div class="col-sm-5">
        <input type="file" class="form-control file2 inline btn btn-primary" name="gallery_images[]"
          multiple data-label="<i class='glyphicon glyphicon-circle-arrow-up'></i> &nbsp;Browse Files"
          accept="image/*" />
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-3 control-label"></label>
      <div class="col-sm-5">
        <button type="submit" class="btn btn-info">
          <i class="entypo-check"></i> &nbsp; <?php echo get_phrase('upload_selected_images'); ?>
        </button>
      </div>
    </div>
  </form>
</div>
<hr />
<div class="row">
  <?php
    $images = $this->frontend_model->get_gallery_images($gallery_id);
    foreach ($images as $row) {
  ?>
    <div class="col-md-3" style="margin-top: 25px;">
  		<a href="#">
  			<img src="uploads/frontend/gallery_images/<?php echo $row['image'];?>" class="img-responsive">
  		</a>
      <br>
      <a href="#" class="btn btn-danger"
        onclick="confirm_modal('<?php echo base_url();?>index.php?admin/frontend_gallery/delete_image/<?php echo $row['frontend_gallery_image_id'];?>/<?php echo $row['frontend_gallery_id'];?>');">
        <i class="entypo-trash"></i>
      </a>
  	</div>
  <?php } ?>
</div>
