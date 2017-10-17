<div class="about-us-area page-content-area">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="page-title">
                    <h1><?php echo $page_title; ?></h1>
                    <hr>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="about-us-wrapper">
                    <div class="about-image">
                        <img src="uploads/frontend/<?php echo $this->frontend_model->get_frontend_general_settings('about_us_image'); ?>" alt="" class="img-fluid">
                    </div>
                    <div class="page-content">
                      <?php echo $this->frontend_model->get_frontend_general_settings('about_us'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
