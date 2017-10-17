<div class="row">
  <div class="col-md-12">
    <form class="form-horizontal form-groups" method="post"
      action="<?php echo base_url();?>index.php?admin/frontend_settings/update_general_settings"
        enctype="multipart/form-data">
      <div class="form-group">
				<label class="col-sm-3 control-label"><?php echo get_phrase('school_title'); ?></label>
				<div class="col-sm-7">
					<input type="text" class="form-control" name="school_title" placeholder=""
            value="<?php echo $this->frontend_model->get_frontend_general_settings('school_title');?>" required>
				</div>
			</div>
      <div class="form-group">
				<label class="col-sm-3 control-label"><?php echo get_phrase('school_email'); ?></label>
				<div class="col-sm-7">
					<input type="email" class="form-control" name="email" placeholder=""
            value="<?php echo $this->frontend_model->get_frontend_general_settings('email');?>">
				</div>
			</div>
      <div class="form-group">
				<label class="col-sm-3 control-label"><?php echo get_phrase('phone'); ?></label>
				<div class="col-sm-7">
					<input type="text" class="form-control" name="phone" placeholder=""
            value="<?php echo $this->frontend_model->get_frontend_general_settings('phone');?>">
				</div>
			</div>
      <div class="form-group">
				<label class="col-sm-3 control-label"><?php echo get_phrase('fax'); ?></label>
				<div class="col-sm-7">
					<input type="text" class="form-control" name="fax" placeholder=""
            value="<?php echo $this->frontend_model->get_frontend_general_settings('fax');?>">
				</div>
			</div>
      <div class="form-group">
				<label class="col-sm-3 control-label"><?php echo get_phrase('copyright_text'); ?></label>
				<div class="col-sm-7">
					<input type="text" class="form-control" name="copyright_text" placeholder=""
            value="<?php echo $this->frontend_model->get_frontend_general_settings('copyright_text');?>">
				</div>
			</div>
      <div class="form-group">
				<label class="col-sm-3 control-label"><?php echo get_phrase('address'); ?></label>
				<div class="col-sm-7">
					<input type="text" class="form-control" name="address" placeholder=""
            value="<?php echo $this->frontend_model->get_frontend_general_settings('address');?>">
				</div>
			</div>
      <div class="form-group">
				<label class="col-sm-3 control-label"><?php echo get_phrase('geo_code'); ?></label>
				<div class="col-sm-7">
					<input type="text" class="form-control" name="school_location" placeholder="latitude, longitude"
            value="<?php echo $this->frontend_model->get_frontend_general_settings('school_location');?>">
				</div>
			</div>
      <div class="form-group">
				<label class="col-sm-3 control-label"><?php echo get_phrase('recaptcha_site_key'); ?></label>
				<div class="col-sm-7">
					<input type="text" class="form-control" name="recaptcha_site_key" placeholder="<?php echo get_phrase('recaptcha_site_key');?>"
            value="<?php echo $this->frontend_model->get_frontend_general_settings('recaptcha_site_key');?>">
          <span>Go to <a href="https://www.google.com/recaptcha/admin" target="_blank">Recaptcha Admin panel</a> to generate your site key</span>
				</div>
			</div>
      <!-- getting the social links -->
      <?php
        $social_links_json = $this->frontend_model->get_frontend_general_settings('social_links');
        $links = json_decode($social_links_json);
      ?>
      <!-- getting the social links -->
      <div class="form-group">
				<label class="col-sm-3 control-label"><?php echo get_phrase('social_links'); ?></label>
				<div class="col-sm-7">
          <div class="input-group">
						<input type="text" class="form-control" name="facebook" placeholder=""
              value="<?php echo $links[0]->facebook;?>">
						<div class="input-group-addon">
							<a href="#"><i class="entypo-facebook"></i></a>
						</div>
					</div>
          <br>
          <div class="input-group">
						<input type="text" class="form-control" name="twitter" placeholder=""
              value="<?php echo $links[0]->twitter;?>">
						<div class="input-group-addon">
							<a href="#"><i class="entypo-twitter"></i></a>
						</div>
					</div>
          <br>
          <div class="input-group">
						<input type="text" class="form-control" name="linkedin" placeholder=""
              value="<?php echo $links[0]->linkedin;?>">
						<div class="input-group-addon">
							<a href="#"><i class="entypo-linkedin"></i></a>
						</div>
					</div>
          <br>
          <div class="input-group">
						<input type="text" class="form-control" name="google" placeholder=""
              value="<?php echo $links[0]->google;?>">
						<div class="input-group-addon">
							<a href="#"><i class="fa fa-google-plus"></i></a>
						</div>
					</div>
          <br>
          <div class="input-group">
						<input type="text" class="form-control" name="youtube" placeholder=""
              value="<?php echo $links[0]->youtube;?>">
						<div class="input-group-addon">
							<a href="#"><i class="fa fa-youtube"></i></a>
						</div>
					</div>
          <br>
          <div class="input-group">
						<input type="text" class="form-control" name="instagram" placeholder=""
              value="<?php echo $links[0]->instagram;?>">
						<div class="input-group-addon">
							<a href="#"><i class="fa fa-instagram"></i></a>
						</div>
					</div>
				</div>
			</div>
      <div class="form-group">
				<label class="col-sm-3 control-label"><?php echo get_phrase('homepage_note_title'); ?></label>
				<div class="col-sm-7">
					<input type="text" class="form-control" name="homepage_note_title" placeholder=""
            value="<?php echo $this->frontend_model->get_frontend_general_settings('homepage_note_title');?>">
				</div>
			</div>
      <div class="form-group">
				<label class="col-sm-3 control-label"><?php echo get_phrase('homepage_note_description'); ?></label>
				<div class="col-sm-7">
					<textarea class="form-control" name="homepage_note_description" rows="5"><?php echo $this->frontend_model->get_frontend_general_settings('homepage_note_description');?></textarea>
				</div>
			</div>
      <div class="form-group">
        <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('header_logo');?></label>
        <div class="col-sm-7">
          <div class="fileinput fileinput-new" data-provides="fileinput">
            <div class="fileinput-new thumbnail" style="width: 150px; height: 150px;" data-trigger="fileinput">
              <?php $image = $this->frontend_model->get_frontend_general_settings('header_logo'); ?>
              <img src="<?php echo base_url();?>uploads/frontend/<?php echo $image;?>" alt="...">
            </div>
            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
            <div>
              <span class="btn btn-white btn-file">
                <span class="fileinput-new"><?php echo get_phrase('select_image'); ?></span>
                <span class="fileinput-exists"><?php echo get_phrase('change'); ?></span>
                <input type="file" name="header_logo" accept="image/*">
              </span>
              <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput"><?php echo get_phrase('remove'); ?></a>
            </div>
          </div>
        </div>
      </div>
      <div class="form-group">
        <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('footer_logo');?></label>
        <div class="col-sm-7">
          <div class="fileinput fileinput-new" data-provides="fileinput">
            <div class="fileinput-new thumbnail" style="width: 150px; height: 150px;" data-trigger="fileinput">
              <?php $image = $this->frontend_model->get_frontend_general_settings('footer_logo'); ?>
              <img src="<?php echo base_url();?>uploads/frontend/<?php echo $image;?>" alt="...">
            </div>
            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
            <div>
              <span class="btn btn-white btn-file">
                <span class="fileinput-new"><?php echo get_phrase('select_image'); ?></span>
                <span class="fileinput-exists"><?php echo get_phrase('change'); ?></span>
                <input type="file" name="footer_logo" accept="image/*">
              </span>
              <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput"><?php echo get_phrase('remove'); ?></a>
            </div>
          </div>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label"></label>
        <div class="col-sm-7">
          <button type="submit" class="btn btn-success">
            <i class="entypo-check"></i> &nbsp; <?php echo get_phrase('save'); ?>
          </button>
        </div>
      </div>
    </form>
  </div>
</div>
