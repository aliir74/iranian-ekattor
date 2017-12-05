<hr />
<?php
  $info = $this->db->get_where('noticeboard', array(
    'notice_id' => $notice_id
  ))->result_array();
  foreach ($info as $row):
?>
<div class="row">
  <div class="box-content">
      <?php echo form_open(base_url() . 'index.php?admin/noticeboard/do_update/'.$row['notice_id'], array(
        'class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data',
          'target' => '_top')); ?>
      <div class="form-group">
          <label class="col-sm-3 control-label"><?php echo get_phrase('title'); ?></label>
          <div class="col-sm-5">
              <input type="text" class="form-control" name="notice_title"
                value="<?php echo $row['notice_title'];?>" required />
          </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label"><?php echo get_phrase('notice'); ?></label>
        <div class="col-sm-5">
          <textarea class="form-control" rows="5" name="notice"><?php echo $row['notice'];?></textarea>
        </div>
      </div>
      <div class="form-group">
          <label class="col-sm-3 control-label"><?php echo get_phrase('date'); ?></label>
          <div class="col-sm-5">
              <input type="text" class="datepicker form-control" name="create_timestamp"
                value="<?php echo date('m/d/Y', $row['create_timestamp']);?>" required />
          </div>
      </div>

      <div class="form-group">
        <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('image');?></label>
        <div class="col-sm-7">
          <div class="fileinput fileinput-new" data-provides="fileinput">
            <div class="fileinput-new thumbnail" style="width: 300px; height: 150px;" data-trigger="fileinput">
              <img src="uploads/frontend/noticeboard/<?php echo $row['image'];?>" alt="...">
            </div>
            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
            <div>
              <span class="btn btn-white btn-file">
                <span class="fileinput-new"><?php echo get_phrase('select_image'); ?></span>
                <span class="fileinput-exists"><?php echo get_phrase('change'); ?></span>
                <input type="file" name="image" accept="image/*">
              </span>
              <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput"><?php echo get_phrase('remove'); ?></a>
            </div>
          </div>
        </div>
      </div>

      <div class="form-group">
        <label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('show_on_website');?></label>
        <div class="col-sm-4">
          <select name="show_on_website" class="form-control selectboxit">
              <option value="1" <?php if ($row['show_on_website'] == 1) echo 'selected';?>><?php echo get_phrase('yes');?></option>
              <option value="0" <?php if ($row['show_on_website'] == 0) echo 'selected';?>><?php echo get_phrase('no');?></option>
          </select>
        </div>
      </div>

      <div class="form-group">
          <label class="col-sm-3 control-label"><?php echo get_phrase('send_sms_to_all'); ?></label>
          <div class="col-sm-4">
              <select class="form-control selectboxit" name="check_sms">
                  <option value="1"><?php echo get_phrase('yes'); ?></option>
                  <option value="2"><?php echo get_phrase('no'); ?></option>
              </select>
              <br>
              <span class="badge badge-primary">
                  <?php
                  if ($active_sms_service == 'kavenegar')
                      echo 'Kavenegar ' . get_phrase('activated');
                  if ($active_sms_service == 'clickatell')
                      echo 'Clickatell ' . get_phrase('activated');
                  if ($active_sms_service == 'twilio')
                      echo 'Twilio ' . get_phrase('activated');
                  if ($active_sms_service == '' || $active_sms_service == 'disabled')
                      echo get_phrase('sms_service_not_activated');
                  ?>
              </span>
          </div>
      </div>

      <div class="form-group">
          <div class="col-sm-offset-3 col-sm-5">
              <button type="submit" id="submit_button" class="btn btn-info"><?php echo get_phrase('update'); ?></button>
          </div>
      </div>
      </form>
  </div>
</div>
<?php endforeach; ?>
