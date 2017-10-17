<?php
	$query = $this->db->get_where('section' , array('class_id' => $class_id));
	if($query->num_rows() > 0):
		$sections = $query->result_array();
?>

<div class="form-group">
    <label class="col-sm-3 control-label"><?php echo get_phrase('section');?></label>
    <div class="col-sm-5">
        <select name="section_id" class="form-control selectboxit" style="width:100%;">
        <?php
        	foreach($sections as $row):
        ?>
    	<option value="<?php echo $row['section_id'];?>"><?php echo $row['name'];?></option>
    	<?php endforeach;?>
        </select>
    </div>
</div>
	
<?php endif;?>

<div class="form-group">
    <label class="col-sm-3 control-label"><?php echo get_phrase('subject');?></label>
    <div class="col-sm-5">
        <select name="subject_id" class="form-control selectboxit" style="width:100%;">
        <?php
        	$subjects = $this->db->get_where('subject' , array('class_id' => $class_id))->result_array();
        	foreach($subjects as $row):
        ?>
    	<option value="<?php echo $row['subject_id'];?>"><?php echo $row['name'];?></option>
    	<?php endforeach;?>
        </select>
    </div>
</div>


<script type="text/javascript">
    $(document).ready(function() {
        if($.isFunction($.fn.selectBoxIt))
        {
            $("select.selectboxit").each(function(i, el)
            {
                var $this = $(el),
                    opts = {
                        showFirstOption: attrDefault($this, 'first-option', true),
                        'native': attrDefault($this, 'native', false),
                        defaultText: attrDefault($this, 'text', ''),
                    };
                    
                $this.addClass('visible');
                $this.selectBoxIt(opts);
            });
        }
    });
    
</script>