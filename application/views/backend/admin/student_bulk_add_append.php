<div class="row">

	<div class="col-md-2">
		<div class="form-group">
			<input type="text" name="name[]" id="name_<?php echo $total;?>" class="form-control"
				placeholder="<?php echo get_phrase('name');?>">
		</div>
	</div>

	<div class="col-md-2">
		<div class="form_group">
			<select name="parent_id[]" id="parent_id_<?php echo $total;?>" class="form-control selectboxit">
				<option value=""><?php echo get_phrase('parent');?></option>
				<?php
					$parents = $this->db->get('parent')->result_array();
					foreach($parents as $row):
				?>
				<option value="<?php echo $row['parent_id'];?>"><?php echo $row['name'];?></option>
				<?php endforeach;?>
			</select>
		</div>
	</div>

	<div class="col-md-2">
		<div class="form-group">
			<input type="email" name="email[]" id="email_<?php echo $total;?>" class="form-control"
				placeholder="<?php echo get_phrase('email');?>">
		</div>
	</div>

	<div class="col-md-2">
		<div class="form-group">
			<input type="password" name="password[]" id="password_<?php echo $total;?>" class="form-control"
				placeholder="<?php echo get_phrase('password');?>">
		</div>
	</div>

	<div class="col-md-2">
		<div class="form-group">
			<input type="text" name="phone[]" id="phone_<?php echo $total;?>" class="form-control"
				placeholder="<?php echo get_phrase('phone');?>">
		</div>
	</div>

	<div class="col-md-1">
		<div class="form-group">
			<input type="text" name="roll[]" id="roll_<?php echo $total;?>" class="form-control"
				placeholder="<?php echo get_phrase('roll');?>">
		</div>
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