<div class="privacy-area page-content-area">
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
                <div class="privacy-wrapper">
                    <div class="page-content">
                      <?php echo $this->frontend_model->get_frontend_general_settings('privacy_policy'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
