<hr />

<?php echo form_open(base_url() . 'index.php?teacher/attendance_selector/');?>
<div class="row">

	<div class="col-md-3 col-md-offset-2">
		<div class="form-group">
		<label class="control-label" style="margin-bottom: 5px;"><?php echo get_phrase('date');?></label>
			<input type="text" class="form-control datepicker" name="timestamp" data-format="dd-mm-yyyy"
				value="<?php echo date("d-m-Y" , $timestamp);?>"/>
		</div>
	</div>

	<?php
		$query = $this->db->get_where('section' , array('class_id' => $class_id));
		if($query->num_rows() > 0):
			$sections = $query->result_array();
	?>

	<div class="col-md-3">
		<div class="form-group">
		<label class="control-label" style="margin-bottom: 5px;"><?php echo get_phrase('section');?></label>
			<select class="form-control selectboxit" name="section_id">
				<?php foreach($sections as $row):?>
					<option value="<?php echo $row['section_id'];?>"
						<?php if($section_id == $row['section_id']) echo 'selected';?>><?php echo $row['name'];?></option>
				<?php endforeach;?>
			</select>
		</div>
	</div>
	<?php endif;?>
	<input type="hidden" name="class_id" value="<?php echo $class_id;?>">
	<input type="hidden" name="year" value="<?php echo $running_year;?>">

	<div class="col-md-3" style="margin-top: 20px;">
		<button type="submit" class="btn btn-info"><?php echo get_phrase('manage_attendance');?></button>
	</div>

</div>
<?php echo form_close();?>






<hr />
<div class="row" style="text-align: center;">
	<div class="col-sm-4"></div>
	<div class="col-sm-4">
		<div class="tile-stats tile-gray">
			<div class="icon"><i class="entypo-chart-area"></i></div>

			<h3 style="color: #696969;"><?php echo get_phrase('attendance_for_class');?> <?php echo $this->db->get_where('class' , array('class_id' => $class_id))->row()->name;?></h3>
			<h4 style="color: #696969;">
				<?php echo get_phrase('section');?> <?php echo $this->db->get_where('section' , array('section_id' => $section_id))->row()->name;?>
			</h4>
			<h4 style="color: #696969;">
				<?php echo date("d M Y" , $timestamp);?>
			</h4>
		</div>
	</div>
	<div class="col-sm-4"></div>
</div>

<center>
    <a class="btn btn-default" onclick="mark_all_present()">
        <i class="entypo-check"></i> <?php echo get_phrase('mark_all_present'); ?>
    </a>
    <a class="btn btn-default"  onclick="mark_all_absent()">
        <i class="entypo-cancel"></i> <?php echo get_phrase('mark_all_absent'); ?>
    </a>
</center>
<br>

<div class="row">

	<div class="col-md-2"></div>

	<div class="col-md-8">

	<?php echo form_open(base_url() . 'index.php?teacher/attendance_update/'.$class_id.'/'.$section_id.'/'.$timestamp);?>
		<div id="attendance_update">
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>#</th>
						<th><?php echo get_phrase('roll');?></th>
						<th><?php echo get_phrase('name');?></th>
						<th><?php echo get_phrase('status');?></th>
					</tr>
				</thead>
				<tbody>
				<?php
					$count = 1;
                    $select_id = 0;
					if($section_id != ''){
						$attendance_of_students = $this->db->get_where('attendance' , array(
							'class_id' => $class_id, 'section_id' => $section_id , 'year' => $running_year,'timestamp'=>$timestamp
						))->result_array();
					}
					foreach($attendance_of_students as $row):
				?>
					<tr>
						<td><?php echo $count++;?></td>
						<td>
							<?php echo $this->db->get_where('enroll', array('student_id'=>$row['student_id']))->row()->roll;?>
						</td>
						<td>
							<?php echo $this->db->get_where('student' , array('student_id' => $row['student_id']))->row()->name;?>
						</td>
						<td>
							<select class="form-control" name="status_<?php echo $row['attendance_id'];?>" id="status_<?php echo $select_id; ?>">
								<option value="0" <?php if($row['status'] == 0) echo 'selected';?>><?php echo get_phrase('undefined');?></option>
								<option value="1" <?php if($row['status'] == 1) echo 'selected';?>><?php echo get_phrase('present');?></option>
								<option value="2" <?php if($row['status'] == 2) echo 'selected';?>><?php echo get_phrase('absent');?></option>
							</select>
						</td>
					</tr>
				<?php
                $select_id++;
                endforeach; ?>
				</tbody>
			</table>
		</div>

		<center>
			<button type="submit" class="btn btn-success" id="submit_button">
				<i class="entypo-thumbs-up"></i> <?php echo get_phrase('save_changes');?>
			</button>
		</center>
		<?php echo form_close();?>

	</div>

</div>


<script type="text/javascript">

    function mark_all_present() {
        var count = <?php echo count($attendance_of_students); ?>;

        for(var i = 0; i < count; i++)
            $('#status_' + i).val("1");
    }

    function mark_all_absent() {
        var count = <?php echo count($attendance_of_students); ?>;

        for(var i = 0; i < count; i++)
            $('#status_' + i).val("2");
    }

</script>
