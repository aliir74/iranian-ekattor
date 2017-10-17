<?php
  $info = $this->frontend_model->get_frontend_notice_by_id($notice_id);
  $recent_notices = $this->frontend_model->get_frontend_recent_noticeboard();
  $upcoming_events = $this->frontend_model->get_frontend_upcoming_events();
?>
<div class="single-news-area page-content-area">
    <div class="container">
        <div class="row">
          <?php foreach ($info as $row) { ?>
            <div class="col-lg-8 col-md-12">
                <div class="single-news-wrapper" id="notice-print">
                    <div class="news-header clearfix">
                        <div class="left-title pull-left">
                            <h1 class="news-title"><?php echo $row['notice_title']; ?></h1>
                            <span class="news-meta"><?php echo date('d M, Y', $row['create_timestamp']); ?></span>
                        </div>
                        <div class="right-btn pull-right">
                            <button type="button" class="btn btn-sm btn-outline-dark d-print-none" onclick="printDiv('notice-print')">Print</button>
                        </div>
                    </div>
                    <div class="news-image">
                        <img src="uploads/frontend/noticeboard/<?php echo $row['image'];?>" alt="" class="img-fluid">
                    </div>
                    <div class="page-content">
                        <?php echo $row['notice']; ?>
                    </div>
                </div>
            </div>
          <?php } ?>
            <div class="col-lg-4 col-md-12">
                <div class="sidebar-widgets">
                    <div class="widgets recent-news-widget">
                        <div class="widget-title">
                            <h4><?php echo get_phrase('recent_notices'); ?></h4>
                        </div>
                        <div class="widgets-content">
                          <ul>
                            <?php foreach ($recent_notices as $row) { ?>
                            <li>
                              <h5 class="news-title">
                                <a href="<?php echo base_url();?>index.php?home/notice_details/<?php echo $row['notice_id'];?>">
                                  <?php echo $row['notice_title']; ?>
                                </a>
                              </h5>
                              <span class="meta"><?php echo date('d M, Y', $row['create_timestamp']); ?></span>
                            </li>
                          <?php } ?>
                          </ul>
                        </div>

                    </div>
                    <div class="widgets recent-events-widget">
                        <div class="widget-title">
                            <h4><?php echo get_phrase('upcoming_events'); ?></h4>
                        </div>
                        <div class="widgets-content">
                          <ul>
                            <?php foreach ($upcoming_events as $row) { ?>
                            <li>
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

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
