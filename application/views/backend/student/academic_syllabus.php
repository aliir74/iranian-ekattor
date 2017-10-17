<hr />

<div class="row">
	<table class="table table-bordered responsive">
		<thead>
			<tr>
				<th>#</th>
				<th><?php echo get_phrase('title');?></th>
				<th><?php echo get_phrase('description');?></th>
                                <th><?php echo get_phrase('subject');?></th>
				<th><?php echo get_phrase('uploader');?></th>
				<th><?php echo get_phrase('date');?></th>
				<th><?php echo get_phrase('file');?></th>
				<th></th>
			</tr>
		</thead>
		<tbody>

		<?php
			$count    = 1;
			$class_id = $this->db->get_where('enroll' , array(
				'student_id' => $student_id , 'year' => $running_year
			))->row()->class_id;
			$syllabus = $this->db->get_where('academic_syllabus' , array(
				'class_id' => $class_id , 'year' => $running_year
			))->result_array();
			foreach ($syllabus as $row):
		?>
			<tr>
				<td><?php echo $count++;?></td>
				<td><?php echo $row['title'];?></td>
				<td><?php echo $row['description'];?></td>
                                <td>
					<?php 
						echo $this->db->get_where('subject' , array(
							'subject_id'=> $row['subject_id']
						))->row()->name;
					?>
				</td>
				<td>
					<?php 
						echo $this->db->get_where($row['uploader_type'] , array(
							$row['uploader_type'].'_id' => $row['uploader_id']
						))->row()->name;
					?>
				</td>
				<td><?php echo date("d/m/Y" , $row['timestamp']);?></td>
				<td>
					<?php echo substr($row['file_name'], 0, 20);?><?php if(strlen($row['file_name']) > 20) echo '...';?>
				</td>
				<td align="center">
					<a class="btn btn-default btn-xs"
						href="<?php echo base_url();?>index.php?student/download_academic_syllabus/<?php echo $row['academic_syllabus_code'];?>">
						<i class="entypo-download"></i> <?php echo get_phrase('download');?>
					</a>
				</td>
			</tr>
		<?php endforeach;?>
			
		</tbody>
	</table>

</div>