<?php
$header_logo = $this->frontend_model->get_frontend_general_settings('header_logo');
?>
<header>
    <div class="logo-area">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col">
                    <div class="logo-container text-center">
                      <a href="<?php echo base_url();?>index.php?home">
                          <img src="<?php echo base_url();?>uploads/frontend/<?php echo $header_logo;?>" alt="">
                          <!--<h2><?php /*echo $school_title; */?></h2>-->
                          <h2>دبیرستان دوره اول علامه حلی ۲ تهران</h2>
                      </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="menu-area">
        <div class="container">
            <nav class="navbar navbar-expand-lg">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-md-center" id="navbarSupportedContent">
                    <ul class="navbar-nav ">
                        <li class="nav-item <?php if($page_name == 'home') echo 'active';?>">
                          <a class="nav-link" href="<?php echo base_url();?>index.php?home">
                            <?php echo get_phrase('home'); ?>
                          </a>
                        </li>
                        <li class="nav-item <?php if($page_name == 'noticeboard' || $page_name == 'notice_details') echo 'active';?>">
                          <a class="nav-link" href="<?php echo base_url();?>index.php?home/noticeboard">
                            <?php echo get_phrase('noticeboard'); ?>
                          </a>
                        </li>
                        <li class="nav-item <?php if($page_name == 'event') echo 'active';?>">
                          <a class="nav-link" href="<?php echo base_url();?>index.php?home/events">
                            <?php echo get_phrase('events'); ?>
                          </a>
                        </li>
                        <li class="nav-item <?php if($page_name == 'teacher') echo 'active';?>">
                          <a class="nav-link" href="<?php echo base_url();?>index.php?home/teachers">
                            <?php echo get_phrase('teachers'); ?>
                          </a>
                        </li>
                        <li class="nav-item <?php if($page_name == 'gallery' || $page_name == 'gallery_view') echo 'active';?>">
                          <a class="nav-link" href="<?php echo base_url();?>index.php?home/gallery">
                            <?php echo get_phrase('gallery'); ?>
                          </a>
                        </li>
                        <li class="nav-item <?php if($page_name == 'admission') echo 'active';?>">
                          <a class="nav-link" href="<?php echo base_url();?>index.php?home/admission">
                            <?php echo get_phrase('admission'); ?>
                          </a>
                        </li>
                        <li class="nav-item <?php if($page_name == 'about') echo 'active';?>">
                          <a class="nav-link" href="<?php echo base_url();?>index.php?home/about">
                            <?php echo get_phrase('about'); ?>
                          </a>
                        </li>
                        <li class="nav-item <?php if($page_name == 'contact') echo 'active';?>">
                          <a class="nav-link" href="<?php echo base_url();?>index.php?home/contact">
                            <?php echo get_phrase('contact'); ?>
                          </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</header>
