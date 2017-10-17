<ul class="nav nav-tabs bordered">
	<li class="active">
		<a href="#tab1" data-toggle="tab">
			<span class="visible-xs"><i class="entypo-home"></i></span>
			<span class="hidden-xs"><?php echo get_phrase('news_list'); ?></span>
		</a>
	</li>
	<li class="">
		<a href="#tab2" data-toggle="tab">
			<span class="visible-xs"><i class="entypo-plus"></i></span>
			<span class="hidden-xs"><?php echo get_phrase('add_news'); ?></span>
		</a>
	</li>
</ul>

<div class="tab-content">
	<div class="tab-pane active" id="tab1" style="margin-top: 20px;">
		<table class="table table-bordered datatable" id="table_export">
			<thead>
				<tr>
					<th><div>#</div></th>
					<th><div><?php echo get_phrase('news_title');?></div></th>
					<th><div><?php echo get_phrase('date_added');?></div></th>
					<th><div><?php echo get_phrase('options');?></div></th>
				</tr>
			</thead>
				<tbody>
					<?php
						$count = 1;
						$news = $this->frontend_model->get_news();
						foreach ($news as $row):
					?>
						<tr>
							<td><?php echo $count++; ?></td>
							<td><?php echo $row['title']; ?></td>
							<td><?php echo date('d M Y', $row['date_added']); ?></td>
							<td>
								<div class="btn-group">
									<button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
										Action <span class="caret"></span>
									</button>
									<ul class="dropdown-menu dropdown-default pull-right" role="menu">
												<!-- EDITING LINK -->
												<li>
														<a href="<?php echo base_url();?>index.php?admin/frontend_pages/news_edit/<?php echo $row['frontend_news_id'];?>">
															<i class="entypo-pencil"></i>
																<?php echo get_phrase('edit');?>
													</a>
												</li>
												<li class="divider"></li>
												<!-- DELETION LINK -->
												<li>
													<a href="#" onclick="confirm_modal('<?php echo base_url();?>index.php?admin/frontend_news/delete/<?php echo $row['frontend_news_id'];?>');">
														<i class="entypo-trash"></i>
															<?php echo get_phrase('delete');?>
													</a>
												</li>
										</ul>
								</div>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
		</table>
	</div>
	<div class="tab-pane" id="tab2">
    <form class="form-horizontal form-groups" id="jq-submit" method="post"
			action="<?php echo base_url();?>index.php?admin/frontend_news/add_news"
				enctype="multipart/form-data"
      style="margin-top: 20px;">
      <div class="form-group">
				<label class="col-sm-3 control-label"><?php echo get_phrase('news_title'); ?></label>
				<div class="col-sm-7">
					<input type="text" class="form-control" name="title" placeholder="<?php echo get_phrase('news_title');?>" required>
				</div>
			</div>
      <div class="form-group">
        <label class="col-sm-3 control-label"><?php echo get_phrase('description'); ?></label>
    		<div class="col-sm-7">
    		  <textarea class="form-control wysihtml5" data-stylesheet-url="assets/css/wysihtml5-color.css"
					 id="sample_wysiwyg"></textarea>
					<input type="hidden" name="description" id="description">
    		</div>
    	</div>
      <div class="form-group">
				<label class="col-sm-3 control-label"><?php echo get_phrase('date'); ?></label>
				<div class="col-sm-4">
					<div class="input-group">
						<input type="text" class="form-control datepicker" data-format="mm/d/yyyy" name="date"
              value="<?php echo date('m/d/Y');?>">
						<div class="input-group-addon">
							<a href="#"><i class="entypo-calendar"></i></a>
						</div>
					</div>
				</div>
			</div>
      <div class="form-group">
        <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('news_image');?></label>
        <div class="col-sm-7">
          <div class="fileinput fileinput-new" data-provides="fileinput">
            <div class="fileinput-new thumbnail" style="width: 300px; height: 150px;" data-trigger="fileinput">
              <img src="" alt="...">
            </div>
            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
            <div>
              <span class="btn btn-white btn-file">
                <span class="fileinput-new"><?php echo get_phrase('select_image'); ?></span>
                <span class="fileinput-exists"><?php echo get_phrase('change'); ?></span>
                <input type="file" name="news_image" accept="image/*">
              </span>
              <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput"><?php echo get_phrase('remove'); ?></a>
            </div>
          </div>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label"></label>
        <div class="col-sm-7">
          <button type="button" class="btn btn-success" id="submit_button">
            <i class="entypo-check"></i> &nbsp; <?php echo get_phrase('save_news'); ?>
          </button>
        </div>
      </div>
    </form>
	</div>
</div>

<script type="text/javascript">

	jQuery(document).ready(function($) {

		var datatable = $("#table_export").dataTable();
		$(".dataTables_wrapper select").select2({
			minimumResultsForSearch: -1
		});

		  $('#submit_button').on('click', function() {
		    var value = $('#sample_wysiwyg').val();
		    $('#description').val(value);
		    $('#jq-submit').submit();
		  });

	});

</script>
