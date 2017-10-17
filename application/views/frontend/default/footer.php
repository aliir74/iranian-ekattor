<?php
$footer_logo = $this->frontend_model->get_frontend_general_settings('footer_logo');
$social = $this->frontend_model->get_frontend_general_settings('social_links');
$links = json_decode($social);
?>
<footer>
    <div class="footer-widget-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-12">
                    <div class="footer-widget info-widget text-right">
                        <ul>
                            <li class="address">
                              <?php echo $this->frontend_model->get_frontend_general_settings('address'); ?><i class="fa fa-map-marker"></i>
                            </li>
                            <li class="phone">
                              <?php echo $this->frontend_model->get_frontend_general_settings('phone'); ?><i class="fa fa-phone"></i>
                            </li>
                            <li class="fax">
                              <?php echo $this->frontend_model->get_frontend_general_settings('fax'); ?><i class="fa fa-fax"></i></li>
                            <li class="email">
                              <?php echo $this->frontend_model->get_frontend_general_settings('email'); ?><i class="fa fa-envelope"></i>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="footer-widget logo-widget text-center">
                        <div class="footer-logo-container">
                            <img src="<?php echo base_url();?>uploads/frontend/<?php echo $header_logo;?>" alt="">
                        </div>
                        <div class="footer-socials">
                            <ul>
                                <?php if ($links[0]->facebook != '') { ?>
                                <li><a href="<?php echo $links[0]->facebook;?>" target="_blank"><i class="fa fa-facebook-official"></i></a></li>
                                <?php } ?>
                                <?php if ($links[0]->twitter != '') { ?>
                                <li><a href="<?php echo $links[0]->twitter;?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                <?php } ?>
                                <?php if ($links[0]->linkedin != '') { ?>
                                <li><a href="<?php echo $links[0]->linkedin;?>" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                                <?php } ?>
                                <?php if ($links[0]->google != '') { ?>
                                <li><a href="<?php echo $links[0]->google;?>" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                                <?php } ?>
                                <?php if ($links[0]->youtube != '') { ?>
                                <li><a href="<?php echo $links[0]->youtube;?>" target="_blank"><i class="fa fa-youtube"></i></a></li>
                                <?php } ?>
                                <?php if ($links[0]->instagram != '') { ?>
                                <li><a href="<?php echo $links[0]->instagram;?>" target="_blank"><i class="fa fa-instagram"></i></a></li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="footer-widget link-widget">
                        <ul>
                            <li>
                              <a href="<?php echo base_url();?>index.php?home/privacy_policy">
                                <?php echo get_phrase('privacy_policy'); ?>
                              </a>
                            </li>
                            <li>
                              <a href="<?php echo base_url();?>index.php?home/terms_conditions">
                                <?php echo get_phrase('terms_&_conditions'); ?>
                              </a>
                            </li>
                            <li>
                              <a href="<?php echo base_url();?>index.php?home/contact">
                                <?php echo get_phrase('contact_us'); ?>
                              </a>
                            </li>
                            <li>
                              <a href="<?php echo base_url();?>index.php?login" target="_blank">
                                <?php echo get_phrase('admin'); ?>
                              </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright-area">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="copyright-text text-center">
                        <p><?php echo $this->frontend_model->get_frontend_general_settings('copyright_text'); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
