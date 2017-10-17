<ul class="nav nav-tabs bordered">
	<li class="active">
		<a href="#tab1" data-toggle="tab">
			<span class="visible-xs"><i class="entypo-home"></i></span>
			<span class="hidden-xs"><?php echo get_phrase('event_list'); ?></span>
		</a>
	</li>
	<li class="">
		<a href="#tab2" data-toggle="tab">
			<span class="visible-xs"><i class="entypo-plus"></i></span>
			<span class="hidden-xs"><?php echo get_phrase('add_event'); ?></span>
		</a>
	</li>
</ul>

<div class="tab-content">
	<div class="tab-pane active" id="tab1" style="margin-top: 20px;">
		<table class="table table-bordered datatable" id="table_export">
			<thead>
				<tr>
					<th><div>#</div></th>
					<th><div><?php echo get_phrase('event_title');?></div></th>
          <th><div><?php echo get_phrase('date');?></div></th>
          <th><div><?php echo get_phrase('status');?></div></th>
					<th><div><?php echo get_phrase('options');?></div></th>
				</tr>
			</thead>
				<tbody>
					<?php
						$count = 1;
						$events = $this->frontend_model->get_events();
						foreach ($events as $row):
					?>
						<tr>
							<td><?php echo $count++; ?></td>
							<td><?php echo $row['title']; ?></td>
							<td><?php echo date('d M Y', $row['timestamp']); ?></td>
              <td align="center";>
                <?php if ($row['status'] == 1) { ?>
                  <i class="fa fa-circle" style="color: green;"></i>
                <?php } else { ?>
                  <i class="fa fa-circle" style="color: red;"></i>
                <?php } ?>
              </td>
							<td>
								<div class="btn-group">
									<button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
										Action <span class="caret"></span>
									</button>
									<ul class="dropdown-menu dropdown-default pull-right" role="menu">
											<!-- EDITING LINK -->
											<li>
													<a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/frontend_events_edit/<?php echo $row['frontend_events_id'];?>');">
														<i class="entypo-pencil"></i>
															<?php echo get_phrase('edit');?>
												</a>
											</li>
												<li class="divider"></li>
												<!-- DELETION LINK -->
												<li>
													<a href="#" onclick="confirm_modal('<?php echo base_url();?>index.php?admin/frontend_events/delete/<?php echo $row['frontend_events_id'];?>');">
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
    <form class="form-horizontal form-groups" method="post"
			action="<?php echo base_url();?>index.php?admin/frontend_events/add_event"
      style="margin-top: 20px;">
      <div class="form-group">
				<label class="col-sm-3 control-label"><?php echo get_phrase('title'); ?></label>
				<div class="col-sm-7">
					<input type="text" class="form-control" name="title" placeholder="<?php echo get_phrase('event_title');?>" required>
				</div>
			</div>
      <div class="form-group">
				<label class="col-sm-3 control-label"><?php echo get_phrase('date'); ?></label>
				<div class="col-sm-4">
					<div class="input-group">
						<input type="text" class="form-control datepicker" data-format="mm/d/yyyy" name="timestamp"
              value="<?php echo date('m/d/Y');?>">
						<div class="input-group-addon">
							<a href="#"><i class="entypo-calendar"></i></a>
						</div>
					</div>
				</div>
			</div>
      <div class="form-group">
				<label class="col-sm-3 control-label"><?php echo get_phrase('status'); ?></label>
				<div class="col-sm-4">
					<select class="form-control" name="status">
            <option value="0"><?php echo get_phrase('inactive'); ?></option>
            <option value="1"><?php echo get_phrase('active'); ?></option>
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
