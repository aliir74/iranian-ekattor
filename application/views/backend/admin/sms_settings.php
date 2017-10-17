<hr />
<?php
	$active_sms_service = $this->db->get_where('settings' , array(
		'type' => 'active_sms_service'
	))->row()->description;
?>
<div class="row">
	<div class="col-md-12">

		<div class="tabs-vertical-env">

			<ul class="nav tabs-vertical">
			<li class="active"><a href="#b-profile" data-toggle="tab">Select A SMS Service</a></li>
				<li>
					<a href="#v-home" data-toggle="tab">
						Clickatell Settings
						<?php if ($active_sms_service == 'clickatell'):?>
							<span class="badge badge-success"><?php echo get_phrase('active');?></span>
						<?php endif;?>
					</a>
				</li>
				<li>
					<a href="#v-profile" data-toggle="tab">
						Twilio Settings
						<?php if ($active_sms_service == 'twilio'):?>
							<span class="badge badge-success"><?php echo get_phrase('active');?></span>
						<?php endif;?>
					</a>
				</li>
				<li>
					<a href="#v-msg91-profile" data-toggle="tab">
						MSG91 Settings
						<?php if ($active_sms_service == 'msg91'):?>
							<span class="badge badge-success"><?php echo get_phrase('active');?></span>
						<?php endif;?>
					</a>
				</li>
			</ul>

			<div class="tab-content">

				<div class="tab-pane active" id="b-profile">

					<?php echo form_open(base_url() . 'index.php?admin/sms_settings/active_service' ,
						array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>

					<div class="form-group">
						<label class="col-sm-3 control-label"><?php echo get_phrase('select_a_service');?></label>
                        <div class="col-sm-5">
							<select name="active_sms_service" class="form-control selectboxit">
                              <option value=""<?php if ($active_sms_service == '') echo 'selected';?>>
                              		<?php echo get_phrase('not_selected');?>
                              	</option>
                        		<option value="clickatell"
                        			<?php if ($active_sms_service == 'clickatell') echo 'selected';?>>
                        				Clickatell
                        		</option>
                        		<option value="twilio"
                        			<?php if ($active_sms_service == 'twilio') echo 'selected';?>>
                        				Twilio
                        		</option>
														<option value="msg91"
                        			<?php if ($active_sms_service == 'msg91') echo 'selected';?>>
                        				MSG91
                        		</option>
                        		<option value="disabled"<?php if ($active_sms_service == 'disabled') echo 'selected';?>>
                        			<?php echo get_phrase('disabled');?>
                        		</option>
                          </select>
						</div>
					</div>
					<div class="form-group">
	                    <div class="col-sm-offset-3 col-sm-5">
	                        <button type="submit" class="btn btn-info"><?php echo get_phrase('save');?></button>
	                    </div>
	                </div>
	            <?php echo form_close();?>
				</div>

				<div class="tab-pane" id="v-home">
					<?php echo form_open(base_url() . 'index.php?admin/sms_settings/clickatell' ,
						array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
						<div class="form-group">
	                      <label  class="col-sm-3 control-label"><?php echo get_phrase('clickatell_username');?></label>
	                      	<div class="col-sm-5">
	                          	<input type="text" class="form-control" name="clickatell_user"
	                            	value="<?php echo $this->db->get_where('settings' , array('type' =>'clickatell_user'))->row()->description;?>" required>
	                      	</div>
	                  	</div>
	                  	<div class="form-group">
	                        <label  class="col-sm-3 control-label"><?php echo get_phrase('clickatell_password');?></label>
	                        <div class="col-sm-5">
	                            <input type="text" class="form-control" name="clickatell_password"
	                                value="<?php echo $this->db->get_where('settings' , array('type' =>'clickatell_password'))->row()->description;?>" required>
	                        </div>
	                    </div>
	                    <div class="form-group">
	                      <label  class="col-sm-3 control-label"><?php echo get_phrase('clickatell_api_id');?></label>
	                        <div class="col-sm-5">
	                            <input type="text" class="form-control" name="clickatell_api_id"
	                                value="<?php echo $this->db->get_where('settings' , array('type' =>'clickatell_api_id'))->row()->description;?>" required>
	                        </div>
	                    </div>
	                    <div class="form-group">
		                    <div class="col-sm-offset-3 col-sm-5">
		                        <button type="submit" class="btn btn-info"><?php echo get_phrase('save');?></button>
		                    </div>
		                </div>
	                <?php echo form_close();?>
				</div>
				<div class="tab-pane" id="v-profile">
					<?php echo form_open(base_url() . 'index.php?admin/sms_settings/twilio' ,
						array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
						<div class="form-group">
	                      <label  class="col-sm-3 control-label"><?php echo get_phrase('twilio_account');?> SID</label>
	                      	<div class="col-sm-5">
	                          	<input type="text" class="form-control" name="twilio_account_sid"
	                            	value="<?php echo $this->db->get_where('settings' , array('type' =>'twilio_account_sid'))->row()->description;?>" required>
	                      	</div>
	                  	</div>
	                  	<div class="form-group">
	                        <label  class="col-sm-3 control-label"><?php echo get_phrase('authentication_token');?></label>
	                        <div class="col-sm-5">
	                            <input type="text" class="form-control" name="twilio_auth_token"
	                                value="<?php echo $this->db->get_where('settings' , array('type' =>'twilio_auth_token'))->row()->description;?>" required>
	                        </div>
	                    </div>
	                    <div class="form-group">
	                      <label  class="col-sm-3 control-label"><?php echo get_phrase('registered_phone_number');?></label>
	                        <div class="col-sm-5">
	                            <input type="text" class="form-control" name="twilio_sender_phone_number"
	                                value="<?php echo $this->db->get_where('settings' , array('type' =>'twilio_sender_phone_number'))->row()->description;?>" required>
	                        </div>
	                    </div>
	                    <div class="form-group">
		                    <div class="col-sm-offset-3 col-sm-5">
		                        <button type="submit" class="btn btn-info"><?php echo get_phrase('save');?></button>
		                    </div>
		                </div>
	                <?php echo form_close();?>
				</div>
				<!-- MSG91 settings -->
				<div class="tab-pane" id="v-msg91-profile">
					<?php echo form_open(base_url() . 'index.php?admin/sms_settings/msg91' ,
						array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
						<div class="form-group">
	                      <label  class="col-sm-3 control-label"><?php echo get_phrase('authentication_key');?> SID</label>
	                      	<div class="col-sm-5">
	                          	<input type="text" class="form-control" name="authentication_key"
	                            	value="<?php echo $this->db->get_where('settings' , array('type' =>'msg91_authentication_key'))->row()->description;?>" required>
	                      	</div>
	                  	</div>
	                  	<div class="form-group">
	                        <label  class="col-sm-3 control-label"><?php echo get_phrase('sender_ID');?></label>
	                        <div class="col-sm-5">
	                            <input type="text" class="form-control" name="sender_ID"
	                                value="<?php echo $this->db->get_where('settings' , array('type' =>'msg91_sender_ID'))->row()->description;?>" required>
	                        </div>
													<p style="margin-top: 10px;"><a href="http://help.msg91.com/article/40-what-is-a-sender-id-how-to-select-a-sender-id" target="_blank" style="color: #2196F3;"><?php echo get_phrase('what_is_sender_ID?'); ?></a></p>
	                    </div>
											<div class="form-group">
	                        <label  class="col-sm-3 control-label"><?php echo get_phrase('route');?></label>
	                        <div class="col-sm-5">
	                            <input type="text" class="form-control" name="msg91_route"
	                                value="<?php echo $this->db->get_where('settings' , array('type' =>'msg91_route'))->row()->description;?>" required>
	                        </div>
													<p style="margin-top: 10px;"><?php echo "If your operator supports multiple routes then give one route name. Eg: route=1 for promotional, route=4 for transactional SMS."; ?></p>
	                    </div>
											<div class="form-group">
	                        <label  class="col-sm-3 control-label"><?php echo get_phrase('country_code');?></label>
	                        <div class="col-sm-5">
	                            <input type="text" class="form-control" name="msg91_country_code"
	                                value="<?php echo $this->db->get_where('settings' , array('type' =>'msg91_country_code'))->row()->description;?>" required>
	                        </div>
													<p style="margin-top: 10px;"><?php echo "0 for international,1 for USA, 91 for India."; ?></p>
	                    </div>
	                    <div class="form-group">
		                    <div class="col-sm-offset-3 col-sm-5">
		                        <button type="submit" class="btn btn-info"><?php echo get_phrase('save');?></button>
		                    </div>
		                </div>
	                <?php echo form_close();?>
				</div>

			</div>

		</div>

	</div>
</div>
