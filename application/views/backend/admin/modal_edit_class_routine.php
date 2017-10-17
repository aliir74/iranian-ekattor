<?php 
$edit_data		=	$this->db->get_where('class_routine' , array('class_routine_id' => $param2) )->result_array();
?>
<div class="tab-pane box active" id="edit" style="padding: 5px">
    <div class="box-content">
        <?php foreach($edit_data as $row):?>
        <?php echo form_open(base_url() . 'index.php?admin/class_routine/do_update/'.$row['class_routine_id'] , array('class' => 'form-horizontal validatable','target'=>'_top'));?>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('class');?></label>
                    <div class="col-sm-5">
                        <select id="class_id" name="class_id" class="form-control selectboxit" onchange="section_subject_select(this.value , <?php echo $param2;?>)">
                            <?php 
                            $classes = $this->db->get('class')->result_array();
                            foreach($classes as $row2):
                            ?>
                                <option value="<?php echo $row2['class_id'];?>" <?php if($row['class_id']==$row2['class_id'])echo 'selected';?>>
                                    <?php echo $row2['name'];?></option>
                            <?php
                            endforeach;
                            ?>
                        </select>
                    </div>
                </div>
                <div id="section_subject_edit_holder"></div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('day');?></label>
                    <div class="col-sm-5">
                        <select name="day" class="form-control selectboxit">
                            <option value="saturday" 	<?php if($row['day']=='saturday')echo 'selected="selected"';?>>saturday</option>
                            <option value="sunday" 		<?php if($row['day']=='sunday')echo 'selected="selected"';?>>sunday</option>
                            <option value="monday" 		<?php if($row['day']=='monday')echo 'selected="selected"';?>>monday</option>
                            <option value="tuesday" 	<?php if($row['day']=='tuesday')echo 'selected="selected"';?>>tuesday</option>
                            <option value="wednesday" 	<?php if($row['day']=='wednesday')echo 'selected="selected"';?>>wednesday</option>
                            <option value="thursday" 	<?php if($row['day']=='thursday')echo 'selected="selected"';?>>thursday</option>
                            <option value="friday" 		<?php if($row['day']=='friday')echo 'selected="selected"';?>>friday</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('starting_time');?></label>
                    <div class="col-sm-9">
                        <?php 
                            if($row['time_start'] < 13)
                            {
                                $time_start		=	$row['time_start'];
                                $time_start_min =   $row['time_start_min'];
                                $starting_ampm	=	1;
                            }
                            else if($row['time_start'] > 12)
                            {
                                $time_start		=	$row['time_start'] - 12;
                                $time_start_min =   $row['time_start_min'];
                                $starting_ampm	=	2;
                            }
                            
                        ?>
                        <div class="col-md-3">
                            <select name="time_start" class="form-control" required>
                            <option value=""><?php echo get_phrase('hour');?></option>
                                <?php for($i = 0; $i <= 12 ; $i++):?>
                                    <option value="<?php echo $i;?>" <?php if($i ==$time_start)echo 'selected="selected"';?>>
                                        <?php echo $i;?></option>
                                <?php endfor;?>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <select name="time_start_min" class="form-control" required>
                            <option value=""><?php echo get_phrase('minutes');?></option>
                                <?php for($i = 0; $i <= 11 ; $i++):?>
                                    <option value="<?php echo $i * 5;?>" <?php if (($i * 5) == $time_start_min) echo 'selected';?>><?php echo $i * 5;?></option>
                                <?php endfor;?>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <select name="starting_ampm" class="form-control selectboxit">
                                <option value="1" <?php if($starting_ampm	==	'1')echo 'selected="selected"';?>>am</option>
                                <option value="2" <?php if($starting_ampm	==	'2')echo 'selected="selected"';?>>pm</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('ending_time');?></label>
                    <div class="col-sm-9">
                        
                        
                        <?php 
                            if($row['time_end'] < 13)
                            {
                                $time_end		=	$row['time_end'];
                                $time_end_min   =   $row['time_end_min'];
                                $ending_ampm	=	1;
                            }
                            else if($row['time_end'] > 12)
                            {
                                $time_end		=	$row['time_end'] - 12;
                                $time_end_min   =   $row['time_end_min'];
                                $ending_ampm	=	2;
                            }
                            
                        ?>
                        <div class="col-md-3">
                            <select name="time_end" class="form-control" required>
                            <option value=""><?php echo get_phrase('hour');?></option>
                                <?php for($i = 0; $i <= 12 ; $i++):?>
                                    <option value="<?php echo $i;?>" <?php if($i ==$time_end)echo 'selected="selected"';?>>
                                        <?php echo $i;?></option>
                                <?php endfor;?>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <select name="time_end_min" class="form-control" required>
                            <option value=""><?php echo get_phrase('minutes');?></option>
                                <?php for($i = 0; $i <= 11 ; $i++):?>
                                    <option value="<?php echo $i * 5;?>" <?php if (($i * 5) == $time_end_min) echo 'selected';?>><?php echo $i * 5;?></option>
                                <?php endfor;?>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <select name="ending_ampm" class="form-control selectboxit">
                                <option value="1" <?php if($ending_ampm	==	'1')echo 'selected="selected"';?>>am</option>
                                <option value="2" <?php if($ending_ampm	==	'2')echo 'selected="selected"';?>>pm</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-offset-3 col-sm-5">
                      <button type="submit" class="btn btn-info"><?php echo get_phrase('edit_class_routine');?></button>
                  </div>
                </div>
        </form>
        <?php endforeach;?>
    </div>
</div>

<script type="text/javascript">
    function section_subject_select(class_id , class_routine_id) {
        $.ajax({
            url: '<?php echo base_url();?>index.php?admin/section_subject_edit/' + class_id + '/' + class_routine_id ,
            success: function(response)
            {
                jQuery('#section_subject_edit_holder').html(response);
            }
        });
    }
</script>

<script type="text/javascript">
    $(document).ready(function() {
        var class_id = $('#class_id').val();
        var class_routine_id = '<?php echo $param2;?>';
        section_subject_select(class_id,class_routine_id);
        
    }); 
</script>

