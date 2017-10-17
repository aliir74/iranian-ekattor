<style>
  .exam_chart {
    width       : 100%;
    height      : 265px;
    font-size   : 11px;
  }
</style>

<?php
  $student_info = $this->db->get_where('student', array('student_id' => $student_id))->result_array();
  foreach ($student_info as $row):
    $enroll_info = $this->db->get_where('enroll', array(
      'student_id' => $row['student_id'], 'year' => $running_year
    ));
    $class_id = $enroll_info->row()->class_id;
    $exams = $this->crud_model->get_exams();
?>
<div class="profile-env">
	<header class="row">
		<div class="col-md-3">
			<center>
        <a href="#">
  				<img src="<?php echo $this->crud_model->get_image_url('student', $student_id) ;?>" class="img-circle"
          style="width: 60%;" />
  			</a>
        <br>
        <h3>
          <?php echo $row['name']; ?>
        </h3>
        <br>
        <span>
          <?php
            $class_name = $this->db->get_where('class', array(
              'class_id' => $enroll_info->row()->class_id
            ))->row()->name;
            $section_name = $this->db->get_where('section', array(
              'section_id' => $enroll_info->row()->section_id
            ))->row()->name;
          ?>
          <a href="<?php echo base_url();?>index.php?teacher/student_information/<?php echo $enroll_info->row()->class_id; ?>">
            <?php echo get_phrase('class').' - '.$class_name.' | '. get_phrase('section').' - '.$section_name; ?>
          </a>
        </span>
      </center>
		</div>
    <div class="col-md-9">

		<ul class="nav nav-tabs">
			<li class="active"><a href="#tab1" data-toggle="tab" class="btn btn-default">
					<span class="visible-xs"><i class="entypo-home"></i></span>
					<span class="hidden-xs"><?php echo get_phrase('basic_info'); ?></span>
				</a>
			</li>
			<li class="">
				<a href="#tab2" data-toggle="tab" class="btn btn-default">
					<span class="visible-xs"><i class="entypo-user"></i></span>
					<span class="hidden-xs"><?php echo get_phrase('parent_info'); ?></span>
				</a>
			</li>
			<li class="">
				<a href="#tab3" data-toggle="tab" class="btn btn-default">
					<span class="visible-xs"><i class="entypo-mail"></i></span>
					<span class="hidden-xs"><?php echo get_phrase('exam_marks'); ?></span>
				</a>
			</li>
			<!-- <li class="">
				<a href="#tab4" data-toggle="tab" class="btn btn-default">
					<span class="visible-xs"><i class="entypo-cog"></i></span>
					<span class="hidden-xs"><?php //echo get_phrase('attendance'); ?></span>
				</a>
			</li> -->
      <li class="">
				<a href="#tab5" data-toggle="tab" class="btn btn-default">
					<span class="visible-xs"><i class="entypo-cog"></i></span>
					<span class="hidden-xs"><?php echo get_phrase('payments'); ?></span>
				</a>
			</li>
		</ul>

		<div class="tab-content">
			<div class="tab-pane active" id="tab1">
        <?php
          $basic_info_titles = ['name','parent', 'class', 'section', 'email', 'phone', 'address', 'gender', 'birthday', 'transport', 'dormitory'];
          $basic_info_values = [$row['name'], $row['parent_id'] == NULL ? '' : $this->db->get_where('parent', array('parent_id' => $row['parent_id']))->row()->name,
          $class_name, $section_name, $row['email'], $row['phone'] == NULL ? '' : $row['phone'], $row['address'] == NULL ? '' : $row['address'], $row['sex'] == NULL ? '' : $row['sex'], $row['birthday'],
          $row['transport_id'] == NULL ? '' : $this->db->get_where('transport', array('transport_id' => $row['transport_id']))->row()->route_name,
          $row['dormitory_id'] == NULL ? '' : $this->db->get_where('dormitory', array('dormitory_id' => $row['dormitory_id']))->row()->name];
        ?>
        <table class="table table-bordered" style="margin-top: 20px;">
          <tbody>
          <?php for ($i=0; $i < count($basic_info_titles) ; $i++) { ?>
            <tr>
              <td width="30%">
                <strong><?php echo get_phrase($basic_info_titles[$i]); ?></strong>
              </td>
              <td><?php echo $basic_info_values[$i]; ?></td>
            </tr>
          <?php } ?>
          </tbody>
        </table>
			</div>
			<div class="tab-pane" id="tab2">
        <?php if ($row['parent_id'] == NULL) { ?>
          <div style="margin-top: 20px;">
            <center>
              <?php echo get_phrase('parent_information_is_not_available'); ?>
            </center>
          </div>
        <?php } else {
            $parent_info = $this->db->get_where('parent', array('parent_id' => $row['parent_id']))->result_array();
            $parent_info_titles = ['name', 'email', 'phone', 'address', 'profession'];
            foreach ($parent_info as $info) {
              $parent_info_values = [$info['name'], $info['email'], $info['phone'] == NULL ? '' : $info['phone'],
              $info['address'] == NULL ? '' : $info['address'], $info['profession'] == NULL ? '' : $info['profession']];
            }
          ?>
          <table class="table table-bordered" style="margin-top: 20px;">
            <tbody>
              <?php for ($i=0; $i < count($parent_info_titles); $i++) { ?>
                <tr>
                  <td width="30%"><strong><?php echo get_phrase($parent_info_titles[$i]); ?></strong></td>
                  <td><?php echo $parent_info_values[$i]; ?></td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        <?php } ?>
			</div>
			<div class="tab-pane" id="tab3">
				<?php foreach ($exams as $row2) { ?>
          <div class="tile-stats tile-white-gray" style="margin-top: 20px;">
      			<h3><?php echo $row2['name']; ?></h3>
      		</div>
          <table class="table table-bordered">
              <thead>
               <tr>
                   <td style="text-align: center;"><?php echo get_phrase('subject'); ?></td>
                   <td style="text-align: center;"><?php echo get_phrase('obtained_mark'); ?></td>
                   <td style="text-align: center;"><?php echo get_phrase('highest_mark'); ?></td>
                   <td style="text-align: center;"><?php echo get_phrase('grade'); ?></td>
                   <td style="text-align: center;"><?php echo get_phrase('comment'); ?></td>
               </tr>
           </thead>
           <tbody>
               <?php
                   $total_marks = 0;
                   $total_grade_point = 0;
                   $subjects = $this->db->get_where('subject' , array(
                       'class_id' => $class_id , 'year' => $running_year
                   ))->result_array();
                   foreach ($subjects as $row3):
               ?>
                   <tr>
                       <td style="text-align: center;"><?php echo $row3['name'];?></td>
                       <td style="text-align: center;">
                           <?php
                               $obtained_mark_query = $this->db->get_where('mark' , array(
                                           'subject_id' => $row3['subject_id'],
                                               'exam_id' => $row2['exam_id'],
                                                   'class_id' => $class_id,
                                                       'student_id' => $student_id ,
                                                           'year' => $running_year));
                               if ( $obtained_mark_query->num_rows() > 0) {
                                   $marks = $obtained_mark_query->result_array();
                                   foreach ($marks as $row4) {
                                       echo $row4['mark_obtained'];
                                       $total_marks += $row4['mark_obtained'];
                                   }
                               }
                           ?>
                       </td>
                       <td style="text-align: center;">
                           <?php

                           $highest_mark = $this->crud_model->get_highest_marks( $row2['exam_id'] , $class_id , $row3['subject_id'] );
                           echo $highest_mark;
                           ?>
                       </td>
                       <td style="text-align: center;">
                           <?php
                               if($obtained_mark_query->num_rows() > 0) {
                                   if ($row4['mark_obtained'] >= 0 || $row4['mark_obtained'] != '') {
                                       $grade = $this->crud_model->get_grade($row4['mark_obtained']);
                                       echo $grade['name'];
                                       $total_grade_point += $grade['grade_point'];
                                   }
                               }
                           ?>
                       </td>
                       <td style="text-align: center;">
                           <?php if($obtained_mark_query->num_rows() > 0)
                                   echo $row4['comment'];
                           ?>
                       </td>
                   </tr>
               <?php endforeach;?>
           </tbody>
          </table>

          <hr />

          <?php echo get_phrase('total_marks');?> : <?php echo $total_marks;?>
          <br>
          <?php echo get_phrase('average_grade_point');?> :
               <?php
                   $this->db->where('class_id' , $class_id);
                   $this->db->where('year' , $running_year);
                   $this->db->from('subject');
                   $number_of_subjects = $this->db->count_all_results();
                   echo ($total_grade_point / $number_of_subjects);
               ?>

           <br> <br>
           <a href="<?php echo base_url();?>index.php?teacher/student_marksheet_print_view/<?php echo $student_id;?>/<?php echo $row2['exam_id'];?>"
               class="btn btn-primary" target="_blank">
               <?php echo get_phrase('print_marksheet');?>
           </a>
           <hr />
        <?php } ?>
			</div>
			<!-- <div class="tab-pane" id="tab4">
				attendance
			</div> -->
			<div class="tab-pane" id="tab5">
				<?php
          $payments = $this->db->get_where('payment', array(
            'student_id' => $row['student_id'], 'year' => $running_year
          ))->result_array();
         ?>
         <table class="table table-bordered" style="margin-top: 20px;">
           <thead>
             <tr>
               <th>#</th>
               <th><?php echo get_phrase('title'); ?></th>
               <th><?php echo get_phrase('amount'); ?></th>
               <th><?php echo get_phrase('date'); ?></th>
               <th><?php echo get_phrase('options'); ?></th>
             </tr>
           </thead>
           <tbody>
             <?php
                $count = 1;
                foreach ($payments as $payment):
              ?>
                <tr>
                  <td><?php echo $count++; ?></td>
                  <td><?php echo $payment['title']; ?></td>
                  <td><?php echo $payment['amount']; ?></td>
                  <td><?php echo date('d M Y', $payment['timestamp']); ?></td>
                  <td>
                    <a href="#" class="btn btn-default"
                      onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_view_invoice/<?php echo $payment['invoice_id'];?>')">
                      <?php echo get_phrase('view_invoice'); ?>
                    </a>
                  </td>
                </tr>
            <?php endforeach; ?>
           </tbody>
         </table>
			</div>
		</div>

		<br>

	</div>
	</header>
</div>
<?php endforeach; ?>
