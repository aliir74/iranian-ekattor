<?php
$edit_data		=	$this->db->get_where('teacher' , array('teacher_id' => $param2) )->result_array();
foreach ( $edit_data as $row):
	$links_json = $row['social_links'];
	$links = json_decode($links_json);
?>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary" data-collapsed="0">
        	<div class="panel-heading">
            	<div class="panel-title" >
            		<i class="entypo-plus-circled"></i>
					<?php echo get_phrase('edit_teacher');?>
            	</div>
            </div>
			<div class="panel-body">
                    <?php echo form_open(base_url() . 'index.php?admin/teacher/do_update/'.$row['teacher_id'] , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top', 'enctype' => 'multipart/form-data'));?>

                                <div class="form-group">
                                <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('photo');?></label>

                                <div class="col-sm-5">
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <div class="fileinput-new thumbnail" style="width: 100px; height: 100px;" data-trigger="fileinput">
                                            <img src="<?php echo $this->crud_model->get_image_url('teacher' , $row['teacher_id']);?>" alt="...">
                                        </div>
                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
                                        <div>
                                            <span class="btn btn-white btn-file">
                                                <span class="fileinput-new">Select image</span>
                                                <span class="fileinput-exists">Change</span>
                                                <input type="file" name="userfile" accept="image/*">
                                            </span>
                                            <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo get_phrase('name');?></label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="name" value="<?php echo $row['name'];?>" data-validate="required"/>
                                </div>
                            </div>
														<div class="form-group">
															<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('designation');?></label>
															<div class="col-sm-5">
																<input type="text" class="form-control" name="designation"
																	value="<?php echo $row['designation'] == null ? '' : $row['designation'];?>" >
															</div>
														</div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo get_phrase('birthday');?></label>
                                <div class="col-sm-5">
                                    <input type="text" class="datepicker form-control" name="birthday" value="<?php echo $row['birthday'];?>"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo get_phrase('sex');?></label>
                                <div class="col-sm-5">
                                    <select name="sex" class="form-control selectboxit">
                                    	<option value="male" <?php if($row['sex'] == 'male')echo 'selected';?>><?php echo get_phrase('male');?></option>
                                    	<option value="female" <?php if($row['sex'] == 'female')echo 'selected';?>><?php echo get_phrase('female');?></option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo get_phrase('address');?></label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="address" value="<?php echo $row['address'];?>"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo get_phrase('phone');?></label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="phone" value="<?php echo $row['phone'];?>"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo get_phrase('email');?></label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="email" value="<?php echo $row['email'];?>" data-validate="required"/>
                                </div>
                            </div>

														<div class="form-group">
															<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('social_links');?></label>
															<div class="col-sm-8">
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
															</div>
														</div>

														<div class="form-group">
															<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('show_on_website');?></label>
															<div class="col-sm-5">
																<select name="show_on_website" class="form-control selectboxit">
									                  <option value="1" <?php if ($row['show_on_website'] == 1) echo 'selected';?>><?php echo get_phrase('yes');?></option>
									                  <option value="0" <?php if ($row['show_on_website'] == 0) echo 'selected';?>><?php echo get_phrase('no');?></option>
									              </select>
															</div>
														</div>


                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-5">
                                <button type="submit" class="btn btn-info"><?php echo get_phrase('edit_teacher');?></button>
                            </div>
                        </div>
                <?php echo form_close();?>
            </div>
        </div>
    </div>
</div>

<?php
endforeach;
?>
