<!doctype html>
<?php
//$system_title = $this->db->get_where('settings', array('type' => 'system_title'))->row()->description;
//$system_name  = $this->db->get_where('settings', array('type' => 'system_name'))->row()->description;
$system_name = "دبیرستان دوره‌ی اول علامه حلی ۲ تهران"
?>

<html class="no-js" lang="">
    <head>
      <meta charset="utf-8">
      <meta http-equiv="x-ua-compatible" content="ie=edge">
      <title>
        <?php echo get_phrase('login'); ?> | <?php echo $system_name; ?>
      </title>
      <meta name="description" content="">
      <meta name="viewport" content="width=device-width, initial-scale=1">

	    <link rel="shortcut icon" href="<?php echo base_url();?>assets/login_page/img/favicon.png">
      <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.css">
      <link rel="stylesheet" href="<?php echo base_url();?>assets/login_page/css/font-awesome.min.css">
      <link rel="stylesheet" href="<?php echo base_url();?>assets/login_page/css/normalize.css">
      <link rel="stylesheet" href="<?php echo base_url();?>assets/login_page/css/main.css">
      <link rel="stylesheet" href="<?php echo base_url();?>assets/login_page/css/style.css">
      <script src="<?php echo base_url();?>assets/login_page/js/vendor/modernizr-2.8.3.min.js"></script>
		  <link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,500,700" rel="stylesheet">

    </head>
    <body>
		<div class="main-content-wrapper">
			<div class="login-area">
				<div class="login-header">
					<a href="<?php echo base_url();?>index.php?login" class="logo">
						<img src="<?php echo base_url();?>assets/login_page/img/logo.png" height="60" alt="">
					</a>
					<h2 class="title"><?php echo $system_name; ?></h2>
				</div>
				<div class="login-content">
					<form method="post" role="form" id="form_login"
            action="<?php echo base_url();?>index.php?login/validate_login">
						<div class="form-group">
							<input type="email" class="input-field" name="email" placeholder="<?php echo get_phrase('email');?>"
                required autocomplete="off">
						</div>
						<div class="form-group">
							<input type="password" class="input-field" name="password" placeholder="<?php echo get_phrase('password');?>"
                required>
						</div>
						<button type="submit" class="btn btn-primary"><?php echo get_phrase('login'); ?><i class="fa fa-lock"></i></button>
					</form>

					<div class="login-bottom-links">
						<a href="<?php echo base_url();?>index.php?login/forgot_password" class="link">
							<?php echo get_phrase('forgot_your_password'); ?> ?
						</a>
					</div>
				</div>
			</div>
			<div class="image-area"></div>
		</div>

    <script src="<?php echo base_url();?>assets/login_page/js/vendor/jquery-1.12.0.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap-notify.js"></script>


    <?php if ($this->session->flashdata('login_error') != '') { ?>
      <script type="text/javascript">
        $.notify({
          // options
          title: '<strong><?php echo get_phrase('error');?>!!</strong>',
          message: '<?php echo $this->session->flashdata('login_error');?>'
          },{
          // settings
          type: 'danger'
        });
      </script>
    <?php } ?>


    </body>
</html>
