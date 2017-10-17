<?php
$edit_data		=	$this->db->get_where('invoice' , array('invoice_id' => $param2) )->result_array();
?>

<div class="tab-pane box active" id="edit" style="padding: 5px">
    <div class="box-content">
        <?php foreach($edit_data as $row):?>
        <?php echo form_open(base_url() . 'index.php?admin/invoice/do_update/'.$row['invoice_id'], array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('student');?></label>
                    <div class="col-sm-6">
                        <select name="student_id" class="form-control select2" required>
                        <option value=""><?php echo get_phrase('select_class'); ?></option>
                            <?php
                            //$this->db->order_by('class_id','asc');
                            $students = $this->db->get('student')->result_array();
                            foreach($students as $row2):
                            ?>
                                <option value="<?php echo $row2['student_id'];?>"
                                    <?php if($row['student_id']==$row2['student_id'])echo 'selected';?>>
                                    <?php
                                        echo $this->crud_model->get_type_name_by_id('student' , $row2['student_id']);
                                        $class_id = $this->db->get_where('enroll' , array(
                                            'student_id' => $row2['student_id'],
                                                'year' => $this->db->get_where('settings', array('type' => 'running_year'))->row()->description
                                        ))->row()->class_id;
                                    ?> -
                                     <?php echo $this->crud_model->get_class_name($class_id);?>
                                </option>
                            <?php
                            endforeach;
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('title');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="title" value="<?php echo $row['title'];?>" required/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('description');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="description" value="<?php echo $row['description'];?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('total_amount');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="amount" value="<?php echo $row['amount'];?>" required/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('date');?></label>
                    <div class="col-sm-5">
                        <input type="text" class="datepicker form-control" name="date"
                            value="<?php echo date('m/d/Y', $row['creation_timestamp']);?>"/>
                    </div>

                </div>
                <div class="form-group">
                  <div class="col-sm-offset-3 col-sm-5">
                      <button type="submit" class="btn btn-info"><?php echo get_phrase('edit_invoice');?></button>
                  </div>
                </div>
        </form>
        <?php endforeach;?>
    </div>
</div>
