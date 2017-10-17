<hr />
<div class="row">
	<div class="col-md-12">

    	<!------CONTROL TABS START------>
		<ul class="nav nav-tabs bordered">
			<li class="active">
            	<a href="#list" data-toggle="tab"><i class="entypo-menu"></i>
					<?php echo get_phrase('book_list');?>
            	</a>
            </li>
			<li>
            	<a href="#add" data-toggle="tab"><i class="entypo-plus-circled"></i>
					<?php echo get_phrase('add_book');?>
            	</a>
            </li>
		</ul>
    	<!------CONTROL TABS END------>


		<div class="tab-content">
        <br>
            <!----TABLE LISTING STARTS-->
            <div class="tab-pane box active" id="list">

                <table cellpadding="0" cellspacing="0" border="0" class="table table-bordered datatable" id="table_export">
                	<thead>
                		<tr>
                    		<th><div>#</div></th>
                    		<th><div><?php echo get_phrase('book_name');?></div></th>
                    		<th><div><?php echo get_phrase('author');?></div></th>
                    		<th><div><?php echo get_phrase('description');?></div></th>
                    		<th><div><?php echo get_phrase('price');?></div></th>
                    		<th><div><?php echo get_phrase('class');?></div></th>
                            <th><div><?php echo get_phrase('total_copies');?></div></th>
                            <th><div><?php echo get_phrase('issued_copies');?></div></th>
                    		<!--<th><div><?php echo get_phrase('status');?></div></th>-->
                    		<th><div><?php echo get_phrase('options');?></div></th>
						</tr>
					</thead>
                    <tbody>
                    	<?php $count = 1;
                        foreach($books as $row):?>
                        <tr>
                            <td><?php echo $count++;?></td>
														<td><?php echo $row['name'];?></td>
														<td><?php echo $row['author'];?></td>
														<td><?php echo $row['description'];?></td>
														<td><?php echo $row['price'];?></td>
														<td><?php echo $this->crud_model->get_type_name_by_id('class',$row['class_id']);?></td>
                            <td><?php echo $row['total_copies'];?></td>
                            <td><?php echo $row['issued_copies'];?></td>
							<!--<td><span class="label label-<?php if($row['status']=='available')echo 'success';else echo 'danger';?>"><?php echo $row['status'];?></span></td>-->
							<td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                                    Action <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu dropdown-default pull-right" role="menu">

                                    <li>
                                        <a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/book_edit/<?php echo $row['book_id'];?>');">
                                            <i class="entypo-pencil"></i>
                                            <?php echo get_phrase('edit');?>
                                        </a>
                                    </li>
                                    <li class="divider"></li>

                                    <li>
                                        <a href="#" onclick="confirm_modal('<?php echo base_url();?>index.php?librarian/book/delete/<?php echo $row['book_id'];?>');">
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

                    <?php echo form_open(base_url() . 'index.php?librarian/book/create' , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>

                                                   <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo get_phrase('name');?></label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="name"
                                        data-validate="required" data-message-required="<?php echo get_phrase('value_required');?>"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo get_phrase('author');?></label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="author"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo get_phrase('description');?></label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="description"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo get_phrase('price');?></label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="price"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo get_phrase('class');?></label>
                                <div class="col-sm-5">
                                    <select name="class_id" id = "class_id" class="form-control selectboxit" style="width:100%;">
                                    <option value=""><?php echo get_phrase('select_class'); ?></option>
                                        <?php
                                        $classes = $this->db->get('class')->result_array();
                                        foreach($classes as $row):
                                        ?>
                                            <option value="<?php echo $row['class_id'];?>"><?php echo $row['name'];?></option>
                                        <?php
                                        endforeach;
                                        ?>
                                    </select>
                                </div>
                            </div>
                                <div class="form-group">
                              <div class="col-sm-offset-3 col-sm-5">
                                  <button type="submit" id = "submit" class="btn btn-info"><?php echo get_phrase('add_book');?></button>
                              </div>
                                </div>
                    </form>
                </div>
            </div>
					</div>
				</div>
				</div>
            <script type = 'text/javascript'>
                var class_id = '';
                jQuery(document).ready(function($) {
                    $("#submit").attr('disabled', 'disabled');
                });

                function check_validation(){
                    if(class_id !== ''){
                        $('#submit').removeAttr('disabled');
                    }
                    else{
                        $("#submit").attr('disabled', 'disabled');
                    }
                }
                $('#class_id').change(function(){
                    class_id = $('#class_id').val();
                    check_validation();
                });
            </script>
