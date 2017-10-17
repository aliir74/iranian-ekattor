<hr />
<div class="row" style="text-align: center;">
	<div class="col-sm-4"></div>
	<div class="col-sm-4">
		<div class="tile-stats tile-gray">
			<div class="icon"><i class="entypo-users"></i></div>
			
			<h3 style="color: #696969;"><?php echo get_phrase('students_of_class');?> <?php echo $this->db->get_where('class' , array('class_id' => $class_id_from))->row()->name;?></h3>
		</div>
	</div>
	<div class="col-sm-4"></div>
</div>
<div class="row">
	<div class="col-md-12">
		<table class="table table-bordered">
			<thead align="center">
				<tr>
					<td align="center"><?php echo get_phrase('name');?></td >
					<td align="center"><?php echo get_phrase('section');?></td >
					<td align="center"><?php echo get_phrase('roll');?></td >
					<td align="center"><?php echo get_phrase('info');?></td >
					<td align="center"><?php echo get_phrase('options');?></td >
				</tr>
			</thead>
			<tbody>
			<?php 
				$students = $this->db->get_where('enroll' , array(
					'class_id' => $class_id_from , 'year' => $running_year
				))->result_array();
				foreach($students as $row):
					$query = $this->db->get_where('enroll' , array(
						'student_id' => $row['student_id'],
							'year' => $promotion_year
						));
			?>
				<tr>
					
					<td align="center">
						<?php echo $this->db->get_where('student' , array('student_id' => $row['student_id']))->row()->name;?>
					</td>
					<td align="center">
						<?php if($row['section_id'] != '' && $row['section_id'] != 0)
								echo $this->db->get_where('section' , array('section_id' => $row['section_id']))->row()->name;
						?>
					</td>
					<td align="center"><?php echo $row['roll'];?></td>
					<td align="center">
					<button type="button" class="btn btn-default"
						onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/student_promotion_performance/<?php echo $row['student_id'];?>/<?php echo $class_id_from;?>');">
						<i class="entypo-eye"></i> <?php echo get_phrase('view_academic_performance');?>
					</button>	
					</td>
					<td>
						<?php if($query->num_rows() < 1):?>
							<select class="form-control selectboxit" name="promotion_status_<?php echo $row['student_id'];?>" style="width: 40px;" id="promotion_status">
								<option value="<?php echo $class_id_to;?>">
									<?php echo get_phrase('enroll_to_class') ." - ". $this->crud_model->get_class_name($class_id_to);?>
								</option>
								<option value="<?php echo $class_id_from;?>">
									<?php echo get_phrase('enroll_to_class') ." - ". $this->crud_model->get_class_name($class_id_from);?>
							</select>
						<?php endif;?>
						<?php if($query->num_rows() > 0):?>
							<button class="btn btn-success">
								<i class="entypo-check"></i> <?php echo get_phrase('student_already_enrolled');?>
							</button>
						<?php endif;?>
					</td>
				</tr>
			<?php endforeach;?>
			</tbody>
		</table>
	</div>
</div>
<br>
<div class="row">
	<center>
		<button type="submit" class="btn btn-success">
			<i class="entypo-check"></i> <?php echo get_phrase('promote_slelected_students');?>
		</button>
	</center>
</div>

<script type="text/javascript">

	$(document).ready(function() {
        if($.isFunction($.fn.selectBoxIt))
		{
			$("select.selectboxit").each(function(i, el)
			{
				var $this = $(el),
					opts = {
						showFirstOption: attrDefault($this, 'first-option', true),
						'native': attrDefault($this, 'native', false),
						defaultText: attrDefault($this, 'text', ''),
					};
					
				$this.addClass('visible');
				$this.selectBoxIt(opts);
			});
		}
    });
</script>