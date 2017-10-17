<hr />
<div class="row">
	<?php echo form_open(base_url() . 'index.php?admin/exam_marks_sms/send_sms');?>

		<div class="col-md-3">
            <div class="form-group">
            <label class="control-label"><?php echo get_phrase('exam');?></label>
                <select name="exam_id" class="form-control selectboxit">
            	<?php 
            		$exams = $this->db->get_where('exam' , array('year' => $running_year))->result_array();
            		foreach ($exams as $row):
            	?>
                	<option value="<?php echo $row['exam_id'];?>"><?php echo $row['name'];?></option>
                <?php endforeach;?>
                </select>
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
            <label class="control-label"><?php echo get_phrase('class');?></label>
                <select name="class_id" class="form-control selectboxit">
                <?php 
                	$classes = $this->db->get('class')->result_array();
                	foreach ($classes as $row):
                ?>
                	<option value="<?php echo $row['class_id'];?>"><?php echo $row['name'];?></option>
                <?php endforeach;?>
                </select>
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
            <label class="control-label"><?php echo get_phrase('receiver');?></label>
                <select name="receiver" class="form-control selectboxit" id="receiver">
                	<option value=""><?php echo get_phrase('select_receiver');?></option>
                	<option value="student"><?php echo get_phrase('students');?></option>
                	<option value="parent"><?php echo get_phrase('parents');?></option>
                </select>
            </div>
        </div>
        
          <div class="col-md-3" style="margin-top: 20px;">
              <button type="submit" class="btn btn-primary"><?php echo get_phrase('send_marks');?> via SMS</button>
          </div>

	<?php echo form_close();?>
</div>


<script type="text/javascript">

    $( "form" ).submit(function( event ) {

        var receiver = $('#receiver').val();
        if(receiver == ''){
            toastr.error('<?php echo get_phrase('please_select_receiver');?>');
            event.preventDefault();
        } else {
            return true;
        }  
      
    });
</script>