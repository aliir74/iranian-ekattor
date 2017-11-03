<?php $class_info = $this->db->get('class')->result_array(); ?>
<div class="row">
    <div class="col-md-12">

        <div class="panel panel-primary" data-collapsed="0">

            <div class="panel-heading">
                <div class="panel-title">
                    <?php echo get_phrase('add_study_material'); ?>
                </div>
            </div>

            <div class="panel-body">

                <?php echo form_open(base_url() . 'index.php?teacher/study_material/create', array('class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data')); ?>

                <div class="form-group" style="display: none;">
                    <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('date'); ?></label>

                    <div class="col-sm-5">
                        <input type="text" name="timestamp" class="form-control datepicker" data-format="D, dd MM yyyy"
                               placeholder="<?php echo get_phrase('select_date'); ?>" value="<?php echo date('m/d/Y'); ?>" required>
                    </div>
                </div>


                <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('title'); ?></label>

                    <div class="col-sm-5">
                        <input type="text" name="title" class="form-control" id="field-1" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="field-ta" class="col-sm-3 control-label"><?php echo get_phrase('description'); ?></label>

                    <div class="col-sm-9">
                        <textarea name="description" class="form-control wysihtml5" id="field-ta" data-stylesheet-url="assets/css/wysihtml5-color.css" required></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label for="field-ta" class="col-sm-3 control-label"><?php echo get_phrase('class'); ?></label>

                    <div class="col-sm-5">
                        <select name="class_id" class="form-control selectboxit" id="class_id" onchange="return get_class_subject(this.value)" required="">
                        <option value=""><?php echo get_phrase('select_class'); ?></option>
                            <?php foreach ($class_info as $row) { ?>
                                <option value="<?php echo $row['class_id']; ?>"><?php echo $row['name']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('subject'); ?></label>
                    <div class="col-sm-5">
                        <select name="subject_id" class="form-control" id="subject_selector_holder" required="required">
                            <option value="" disabled="true"><?php echo get_phrase('select_class_first'); ?></option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('file'); ?></label>

                    <div class="col-sm-5">

                        <input type="file" name="file_name" class="form-control file2 inline btn btn-primary" data-label="<i class='glyphicon glyphicon-file'></i> Browse" />

                    </div>
                </div>

                <div class="form-group">
                    <label for="field-ta" class="col-sm-3 control-label"><?php echo get_phrase('file_type'); ?></label>

                    <div class="col-sm-5">
                        <select name="file_type" class="form-control selectboxit">
                            <option value=""><?php echo get_phrase('select_file_type'); ?></option>
                            <option value="image"><?php echo get_phrase('image'); ?></option>
                            <option value="doc"><?php echo get_phrase('doc'); ?></option>
                            <option value="pdf"><?php echo get_phrase('pdf'); ?></option>
                            <option value="excel"><?php echo get_phrase('excel'); ?></option>
                            <option value="other"><?php echo get_phrase('other'); ?></option>
                        </select>
                    </div>
                </div>

                <div class="col-sm-3 control-label col-sm-offset-2">
                    <button type="submit" id = "submit" class="btn btn-success"><?php echo get_phrase('upload'); ?></button>
                </div>
                </form>

            </div>

        </div>

    </div>
</div>

<script type="text/javascript">

    function get_class_subject(class_id) {
        if (class_id !== '') {

        $.ajax({
            url: '<?php echo base_url(); ?>index.php?teacher/get_class_subject/' + class_id,
            success: function (response)
            {
                jQuery('#subject_selector_holder').html(response);
            }
        });
}
    }

</script>
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