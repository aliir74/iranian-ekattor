<?php
  $slider = $this->frontend_model->get_frontend_general_settings('slider_images');
  $slider_images = json_decode($slider);
  $upcoming_events = $this->frontend_model->get_frontend_upcoming_events();
?>
<div class="slider-area">
    <div id="main-slider" class="owl-carousel main-slider">
      <?php for ($i=0; $i < count($slider_images); $i++) { ?>
        <div class="single-slide d-flex" style="background-image:url(uploads/frontend/slider/<?php echo $slider_images[$i]->image;?>)">
            <div class="slide-content align-self-end">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="slide-text">
                                <h2><?php echo $slider_images[$i]->title; ?></h2>
                                <p><?php echo $slider_images[$i]->description; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      <?php } ?>
    </div>
</div>
<div class="main-msg-area">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7 col-md-12">
                <div class="intro-msg text-center">
                    <h3 class="welcome-title">
                      <?php echo $this->frontend_model->get_frontend_general_settings('homepage_note_title'); ?>
                    </h3>
                    <p class="welcome-desc">
                      <?php echo $this->frontend_model->get_frontend_general_settings('homepage_note_description'); ?>
                    </p>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 ml-lg-auto align-self-stretch">
                <div class="home-event-widget">
                    <div class="widget-title text-center">
                        <h4>Upcomig Events</h4>
                    </div>
                    <div class="widgets-content">
                        <ul>
                          <?php foreach ($upcoming_events as $row) { ?>
                            <li class="clearfix">
                                <div class="event-date pull-left">
                                    <h6 class="date">
                                      <?php echo date('d', $row['timestamp']); ?>
                                      <span class="month"><?php echo date('M', $row['timestamp']); ?></span>
                                    </h6>
                                </div>
                                <h5 class="event-title"><?php echo $row['title']; ?></h5>
                            </li>
                          <?php } ?>
                        </ul>
                    </div>
                    <div class="widget-link text-center">
                        <a href="<?php echo base_url();?>index.php?home/events" class="btn btn-primary">
                          <?php echo get_phrase('view_all'); ?>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
