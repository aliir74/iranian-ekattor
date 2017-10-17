<?php
  $school_title = $this->frontend_model->get_frontend_general_settings('school_title');
  $theme = $this->frontend_model->get_frontend_general_settings('theme');
?>
<!doctype html>
<html class="no-js" lang="">
    <head>
      <title>
        <?php echo $page_title; ?> | <?php echo $school_title;?>
      </title>
        <?php include 'metas.php'; ?>
        <?php include 'stylesheets.php'; ?>
    </head>
    <body>

        <?php include 'navigation.php'; ?>

        <?php include $page_name . '.php'; ?>

        <?php include 'footer.php'; ?>

        <?php include 'javascripts.php'; ?>

    </body>
</html>
