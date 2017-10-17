<?php
  $info = $this->db->get_where('frontend_events', array('frontend_events_id' => $param2))->result_array();
  foreach ($info as $row):
?>
<form class="form-horizontal form-groups" method="post"
  action="<?php echo base_url();?>index.php?admin/frontend_events/edit_event/<?php echo $row['frontend_events_id'];?>"
  style="margin-top: 20px;">
  <div class="form-group">
    <label class="col-sm-3 control-label"><?php echo get_phrase('title'); ?></label>
    <div class="col-sm-7">
      <input type="text" class="form-control" name="title" placeholder="<?php echo get_phrase('event_title');?>"
        value="<?php echo $row['title'];?>" required>
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-3 control-label"><?php echo get_phrase('date'); ?></label>
    <div class="col-sm-4">
      <div class="input-group">
        <input type="text" class="form-control datepicker" data-format="mm/d/yyyy" name="timestamp"
          value="<?php echo date('m/d/Y', $row['timestamp']);?>">
        <div class="input-group-addon">
          <a href="#"><i class="entypo-calendar"></i></a>
        </div>
      </div>
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-3 control-label"><?php echo get_phrase('status'); ?></label>
    <div class="col-sm-4">
      <select class="form-control selectboxit" name="status">
        <option value="0" <?php if ($row['status'] == 0) echo 'selected';?>><?php echo get_phrase('inactive'); ?></option>
        <option value="1" <?php if ($row['status'] == 1) echo 'selected';?>><?php echo get_phrase('active'); ?></option>
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
