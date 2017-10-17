<ul class="nav nav-tabs bordered">
	<li class="active">
		<a href="#tab1" data-toggle="tab">
			<span class="visible-xs"><i class="entypo-home"></i></span>
			<span class="hidden-xs"><?php echo get_phrase('gallery_list'); ?></span>
		</a>
	</li>
	<li class="">
		<a href="#tab2" data-toggle="tab">
			<span class="visible-xs"><i class="entypo-plus"></i></span>
			<span class="hidden-xs"><?php echo get_phrase('add_gallery'); ?></span>
		</a>
	</li>
</ul>

<div class="tab-content">
	<div class="tab-pane active" id="tab1" style="margin-top: 20px;">
		<table class="table table-bordered datatable" id="table_export">
			<thead>
				<tr>
					<th><div>#</div></th>
					<th><div><?php echo get_phrase('gallery_title');?></div></th>
          <th><div><?php echo get_phrase('date');?></div></th>
					<th><div><?php echo get_phrase('options');?></div></th>
				</tr>
			</thead>
				<tbody>
					<?php
						$count = 1;
						$galleries = $this->frontend_model->get_gallaries();
						foreach ($galleries as $row):
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
										<li>
												<a href="<?php echo base_url();?>index.php?admin/frontend_pages/gallery_image/<?php echo $row['frontend_gallery_id'];?>">
													<i class="entypo-eye"></i>
														<?php echo get_phrase('view_gallery');?>
											</a>
										</li>
										<li class="divider"></li>
											<!-- EDITING LINK -->
											<li>
													<a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/frontend_gallery_edit/<?php echo $row['frontend_gallery_id'];?>');">
														<i class="entypo-pencil"></i>
															<?php echo get_phrase('edit');?>
												</a>
											</li>

												<!-- DELETION LINK -->
												<!-- <li>
													<a href="#" onclick="confirm_modal('<?php //echo base_url();?>index.php?admin/frontend_gallery/delete/<?php //echo $row['frontend_gallery_id'];?>');">
														<i class="entypo-trash"></i>
															<?php //echo get_phrase('delete');?>
													</a>
												</li> -->
										</ul>
								</div>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
		</table>
	</div>
	<div class="tab-pane" id="tab2">
    <form class="form-horizontal form-groups" method="post"
			action="<?php echo base_url();?>index.php?admin/frontend_gallery/add_gallery"
      style="margin-top: 20px;" enctype="multipart/form-data">
      <div class="form-group">
				<label class="col-sm-3 control-label"><?php echo get_phrase('title'); ?></label>
				<div class="col-sm-7">
					<input type="text" class="form-control" name="title" placeholder="<?php echo get_phrase('gallery_title');?>" required>
				</div>
			</div>
      <div class="form-group">
				<label class="col-sm-3 control-label"><?php echo get_phrase('description'); ?></label>
				<div class="col-sm-7">
					<textarea name="description" rows="5" class="form-control"></textarea>
				</div>
			</div>
      <div class="form-group">
				<label class="col-sm-3 control-label"><?php echo get_phrase('date'); ?></label>
				<div class="col-sm-4">
					<div class="input-group">
						<input type="text" class="form-control datepicker" data-format="mm/d/yyyy" name="date_added"
              value="<?php echo date('m/d/Y');?>">
						<div class="input-group-addon">
							<a href="#"><i class="entypo-calendar"></i></a>
						</div>
					</div>
				</div>
			</div>
      <div class="form-group">
        <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('cover_image');?></label>
        <div class="col-sm-7">
          <div class="fileinput fileinput-new" data-provides="fileinput">
            <div class="fileinput-new thumbnail" style="width: 300px; height: 150px;" data-trigger="fileinput">
              <img src="uploads/placeholder.png" alt="...">
            </div>
            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
            <div>
              <span class="btn btn-white btn-file">
                <span class="fileinput-new"><?php echo get_phrase('select_image'); ?></span>
                <span class="fileinput-exists"><?php echo get_phrase('change'); ?></span>
                <input type="file" name="cover_image" accept="image/*">
              </span>
              <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput"><?php echo get_phrase('remove'); ?></a>
            </div>
          </div>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label"><?php echo get_phrase('show_on_website'); ?></label>
        <div class="col-sm-4">
          <select class="form-control selectboxit" name="show_on_website">
            <option value="0"><?php echo get_phrase('no'); ?></option>
            <option value="1"><?php echo get_phrase('yes'); ?></option>
          </select>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label"></label>
        <div class="col-sm-7">
          <button type="submit" class="btn btn-success">
            <i class="entypo-check"></i> &nbsp; <?php echo get_phrase('save'); ?>
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

	});

</script>
