<hr />
<div class="row">
    <div class="col-md-12">
        <blockquote class="blockquote-blue">
            <p>
                <strong>Student Promotion Notes</strong>
            </p>
            <p>
                Promoting student from the present class to the next class will create an enrollment of that student to
                the next session. Make sure to select correct class options from the select menu before promoting.If you don't want
                to promote a student to the next class, please select that option. That will not promote the student to the next class
                but it will create an enrollment to the next session but in the same class.
            </p>
        </blockquote>
    </div>
</div>
<?php echo form_open(base_url() . 'index.php?admin/student_promotion/promote');?>
<div class="row">
<?php 
    $running_year_array             = explode ( "-" , $running_year ); 
    $next_year_first_index          = $running_year_array[1];
    $next_year_second_index         = $running_year_array[1]+1;
    $next_year                      = $next_year_first_index. "-" .$next_year_second_index;
?>
	<div class="form-group">
        <div class="col-sm-3" style="margin-top: 15px;">
        <label class="control-label" style="margin-bottom: 5px;"><?php echo get_phrase('current_session');?></label>
            <select name="running_year" class="form-control selectboxit">
            <option value="<?php echo $running_year;?>">
            	<?php echo $running_year;?>
            </option>
            </select>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-3">
        <label class="control-label" style="margin-bottom: 5px;"><?php echo get_phrase('promote_to_session');?></label>
            <select name="promotion_year" class="form-control selectboxit" id="promotion_year">
            <option value="<?php echo $next_year;?>">
            	<?php echo $next_year;?>
            </option>
            </select>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-3">
        <label class="control-label" style="margin-bottom: 5px;"><?php echo get_phrase('promotion_from_class');?></label>
            <select name="promotion_from_class_id" id="from_class_id" class="form-control selectboxit"
                >
                <option value=""><?php echo get_phrase('select');?></option>
                <?php
                    $classes = $this->db->get('class')->result_array();
                    foreach($classes as $row):
                ?>
                <option value="<?php echo $row['class_id'];?>"><?php echo $row['name'];?></option>
                <?php endforeach;?>
            </select>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-3">
        <label class="control-label" style="margin-bottom: 5px;"><?php echo get_phrase('promotion_to_class');?></label>
            <select name="promotion_to_class_id" id="to_class_id" class="form-control selectboxit">
                <option value=""><?php echo get_phrase('select');?></option>
                <?php foreach($classes as $row):?>
                <option value="<?php echo $row['class_id'];?>"><?php echo $row['name'];?></option>
                <?php endforeach;?>
            </select>
        </div>
    </div>

    <center>
        <button class="btn btn-info" type="button" style="margin:10px;" onclick="get_students_to_promote('<?php echo $running_year;?>')">
            <?php echo get_phrase('manage_promotion');?></button>
    </center>

</div>

<div id="students_for_promotion_holder"></div>

<?php echo form_close();?>

<script type="text/javascript">
    
    function get_students_to_promote(running_year)
    {
        from_class_id   = $("#from_class_id").val();
        to_class_id     = $("#to_class_id").val();
        promotion_year  = $("#promotion_year").val();
        
        if (from_class_id == "" || to_class_id == "") {
            toastr.error("<?php echo get_phrase('select_class_for_promotion_to_and_from');?>")
            return false;
        }
        $.ajax({
            url: '<?php echo base_url();?>index.php?admin/get_students_to_promote/' + from_class_id + '/' + to_class_id + '/' + running_year + '/' + promotion_year,
            success: function(response)
            {
                jQuery('#students_for_promotion_holder').html(response);
            }
        });
        return false;
    }

</script>