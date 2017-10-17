<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title" >
                    <i class="entypo-plus-circled"></i>
                    <?php echo get_phrase('add_question_paper');?>
                </div>
            </div>

            <div class="panel-body">
                
                <?php echo form_open(base_url() . 'index.php?teacher/question_paper/create' , array('class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data'));?>
    
                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('title');?></label>
                        
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="title" data-validate="required" data-message-required="<?php echo get_phrase('value_required');?>" value="" autofocus>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo get_phrase('class'); ?></label>
                        <div class="col-sm-6">
                            <select name="class_id" id = 'class_id' class="form-control selectboxit" required>
                                <option value=""><?php echo get_phrase('select_a_class'); ?></option>
                                <?php 
                                $classes = $this->db->get('class')->result_array();
                                foreach ($classes as $row) { ?>
                                    <option value="<?php echo $row['class_id']; ?>">
                                        <?php echo $row['name'];?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo get_phrase('exam'); ?></label>
                        <div class="col-sm-6">
                            <select name="exam_id" class="form-control" required>
                                <option value=""><?php echo get_phrase('select_an_exam'); ?></option>
                                <?php 
                                $exams = $this->db->get('exam')->result_array();
                                foreach ($exams as $row) { ?>
                                    <option value="<?php echo $row['exam_id']; ?>">
                                        <?php echo $row['name'];?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('question_paper');?></label>
                        
                        <div class="col-sm-9">
                            <textarea class="form-control wysihtml5" data-stylesheet-url="assets/css/wysihtml5-color.css" name="question_paper" required></textarea>
                        </div> 
                    </div>
                    
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-5">
                            <button type="submit" id = "submit" class="btn btn-info"><?php echo get_phrase('submit');?></button>
                        </div>
                    </div>

                <?php echo form_close();?>

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
















