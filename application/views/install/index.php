<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="Neon Admin Panel" />
	<meta name="author" content="" />

	<title>Installation | Ekattor School Management System Pro</title>
	<?php include 'styles.php'; ?>
</head>
<body class="page-body" data-url="http://neon.dev">

<div class="page-container horizontal-menu">


	<header class="navbar navbar-fixed-top"
    style="min-height: 80px;">

		<div class="navbar-inner">
			<!-- logo -->
			<div class="navbar-brand">
				<a href="#">
					<img src="uploads/logo.png"  style="max-height:40px;"/>
				</a>
			</div>
      <div class="navbar-brand"
        style="margin-top: 13px; margin-left: -22px;">
        Ekattor School Management System Pro
      </div>
      <div class="navbar-brand pull-right"
        style="margin-top: 13px;">
        Installation
      </div>
		</div>
	</header>
	<div class="main-content">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
          <?php include 'main/'.$page_name.'.php'; ?>
          <?php include 'footer.php'; ?>
				</div>
			</div>
		</div>
	</div>

<?php include 'scripts.php'; ?>

</body>
</html>
