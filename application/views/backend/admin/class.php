<hr />
<div class="row">
	<div class="col-md-12">
    
    	<!------CONTROL TABS START------>
		<ul class="nav nav-tabs bordered">
			<li class="active">
            	<a href="#list" data-toggle="tab"><i class="entypo-menu"></i> 
					<?php echo get_phrase('class_list');?>
                    	</a></li>
			<li>
            	<a href="#add" data-toggle="tab"><i class="entypo-plus-circled"></i>
					<?php echo get_phrase('add_class');?>
                    	</a></li>
		</ul>
    	<!------CONTROL TABS END------>
        
		<div class="tab-content">
        <br>
            <!----TABLE LISTING STARTS-->
            <div class="tab-pane box active" id="list">
				
                <table class="table table-bordered datatable" id="table_export">
                	<thead>
                		<tr>
                    		<th><div>#</div></th>
                    		<th><div><?php echo get_phrase('class_name');?></div></th>
                            <th><div><?php echo "ID";?></div></th>
                    		<th><div><?php echo get_phrase('numeric_name');?></div></th>
                    		<th><div><?php echo get_phrase('teacher');?></div></th>
                    		<th><div><?php echo get_phrase('options');?></div></th>
						</tr>
					</thead>
                    <tbody>
                    	<?php $count = 1;foreach($classes as $row):?>
                        <tr>
                            <td><?php echo $count++;?></td>
							<td><?php echo $row['name'];?></td>
                            <td><?php echo $row['class_id'];?></td>
							<td><?php echo $row['name_numeric'];?></td>
							<td>
                                <?php
                                    if($row['teacher_id'] != '' || $row['teacher_id'] != 0) 
                                        echo $this->crud_model->get_type_name_by_id('teacher',$row['teacher_id']);
                                ?>
                            </td>
							<td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                                    Action <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu dropdown-default pull-right" role="menu">
                                    
                                    <!-- EDITING LINK -->
                                    <li>
                                        <a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_edit_class/<?php echo $row['class_id'];?>');">
                                            <i class="entypo-pencil"></i>
                                                <?php echo get_phrase('edit');?>
                                            </a>
                                                    </li>
                                    <li class="divider"></li>
                                    
                                    <!-- DELETION LINK -->
                                    <li>
                                        <a href="#" onclick="confirm_modal('<?php echo base_url();?>index.php?admin/classes/delete/<?php echo $row['class_id'];?>');">
                                            <i class="entypo-trash"></i>
                                                <?php echo get_phrase('delete');?>
                                            </a>
                                                    </li>
                                </ul>
                            </div>
        					</td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
			</div>
            <!----TABLE LISTING ENDS--->
            
            
			<!----CREATION FORM STARTS---->
			<div class="tab-pane box" id="add" style="padding: 5px">
                <div class="box-content">
                	<?php echo form_open(base_url() . 'index.php?admin/classes/create' , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
                        <div class="padded">
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo get_phrase('name');?></label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="name" data-validate="required" data-message-required="<?php echo get_phrase('value_required');?>"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo get_phrase('name_numeric');?></label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="name_numeric"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo get_phrase('teacher');?></label>
                                <div class="col-sm-5">
                                    <select name="teacher_id" class="form-control select2" style="width:100%;" data-validate="required" data-message-required="<?php echo get_phrase('value_required');?>">
                                        <option value=""><?php echo get_phrase('select_teacher');?></option>
                                    	<?php 
										$teachers = $this->db->get('teacher')->result_array();
										foreach($teachers as $row):
										?>
                                    	<option value="<?php echo $row['teacher_id'];?>"><?php echo $row['name'];?></option>
                                        <?php
										endforeach;
										?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                              <div class="col-sm-offset-3 col-sm-5">
                                  <button type="submit" class="btn btn-info"><?php echo get_phrase('add_class');?></button>
                              </div>
							</div>
                    </form>                
                </div>                
			</div>
			<!----CREATION FORM ENDS-->
		</div>
	</div>
</div>
<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6" style="padding: 15px; text-align: center">
        <button type="button" class="btn btn-primary" name="generate_csv" id="generate_csv"><?php echo "گرفتن اطلاعات دانش آموزان"; ?></button>
    </div>
    <div class="col-md-3"></div>
</div>
<?php echo form_open(base_url() . 'index.php?admin/add_students_to_research_class_using_csv/import' ,
    array('class' => 'form-inline validate', 'style' => 'text-align:center;',  'enctype' => 'multipart/form-data'));?>
<div class="row">
    <div class="col-md-3">
    </div>
    <div class="col-md-6">
        <div class="form_group">
            <label class="control-label" style="margin-bottom: 5px;"><?php echo get_phrase('class');?></label>
            <select name="class_id" id="class_id" class="form-control selectboxit" required
                    onchange="get_sections(this.value)"  data-validate="required"  data-message-required="<?php echo get_phrase('value_required');?>">
                <option value=""><?php echo get_phrase('select_class');?></option>
                <?php
                $classes = $this->db->get('class')->result_array();
                foreach($classes as $row):
                    ?>
                    <option value="<?php echo $row['class_id'];?>"><?php echo $row['name'];?></option>
                <?php endforeach;?>
            </select>
        </div>
    </div>
    <!--<div id="section_holder" class="col-md-3">
        <label class="control-label" style="margin-bottom: 5px;"><?php /*echo get_phrase('section');*/?></label>
        <select name="section_id" id="section_id" class="form-control selectboxit">
            <option value=""><?php /*echo get_phrase('select_class_first');*/?></option>
        </select>
    </div>-->
    <div class="col-md-3"></div>
</div>
<br>
<div class="row">
    <div class="col-md-12">
        <div class="col-md-offset-4 col-md-4" style="padding-bottom:15px;">
            <input type="file" name="userfile" class="form-control file2 inline btn btn-info" data-label="<i class='entypo-tag'></i> Select CSV File"
                   data-validate="required" data-message-required="<?php echo get_phrase('required'); ?>"
                   accept="text/csv, .csv" />
        </div>
        <div class="col-md-offset-4 col-md-4">
            <button type="submit" class="btn btn-success" name="import_csv" id="import_csv"><?php echo get_phrase('import_CSV'); ?></button>
        </div>

        <a href="" download="students_information.csv" style="display: none;" id = "bulk">Download</a>
    </div>
</div>
<br>
<?php echo form_close();?>

<div class="row">
    <div class="col-md-12" style="padding: 10px; background-color: #B3E5FC; color: #424242;">
        <p style="font-weight: 700; font-size: 15px;">
            <?php echo "لطفا مطابق دستورالعمل زیر دانش آموزان را به کلاس‌های پژوهشی اضافه کنید!"; ?>
        </p>
        <ol>
            <li style="padding: 5px;"><?php echo "ابتدا با زدن روی دکمه‌ی اطلاعات دانش آموزان، اطلاعات تمام دانش آموزان سال تحصیلی فعلی رو دانلود کنید."; ?></li>
            <li style="padding: 5px;"><?php echo "فایل csv دقیقا مشابه فایل اطلاعات دانش آموزان درست کنید که اطلاعات دانش آموزانی که فقط اطلاعات دانش آموزانی که قرار است به کلاس پژوهشی اضافه شوند در آن باشد."; ?></li>
            <li style="padding: 5px;"><?php echo "فایل خود را select کرده و سپس دکمه‌ی import را بزنید.";?></li>
        </ol>
        <p style="color: #FF5722; font-weight: 500;">
            ***<?php echo "دقت کنید که فایل خود را کاملا مطابق ستون‌های فایل اطلاعات دانش آموزان بسازید!"; ?>
        </p>
    </div>
</div>


<!-----  DATA TABLE EXPORT CONFIGURATIONS ---->                      
<script type="text/javascript">

	jQuery(document).ready(function($)
	{
		

		var datatable = $("#table_export").dataTable();
		
		$(".dataTables_wrapper select").select2({
			minimumResultsForSearch: -1
		});
	});
		
</script>

<script type="text/javascript">
    $("#generate_csv").click(function(){
        $.ajax({
            url: '<?php echo base_url();?>index.php?admin/generate_all_student_information_csv/',
            success: function(response) {
                toastr.success("<?php echo get_phrase('file_generated'); ?>");
                $("#bulk").attr('href', response);
                jQuery('#bulk')[0].click();
                //document.location = response;
            }
        });
    });
</script>
