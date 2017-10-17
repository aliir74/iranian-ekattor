<?php
  $this->db->where('status', 1);
  $this->db->order_by('timestamp', 'DESC');
  $query = $this->db->get('frontend_events', $per_page, $this->uri->segment(3));
  $events = $query->result_array();
  $recent_notices = $this->frontend_model->get_frontend_recent_noticeboard();
?>
<div class="single-news-area page-content-area">
    <div class="container">
        <div class="row page-title">
            <div class="col-md-6">
                <div>
                    <h1><?php echo $page_title; ?></h1>
                </div>
            </div>
            <div class="col-md-6">
                <nav aria-label="pagination">
                    <?php echo $this->pagination->create_links(); ?>
                </nav>
            </div>
            <div class="col">
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <div class="event-list-wrapper">
                  <div class="event-list">
                    <ul>
                      <?php foreach ($events as $row) { ?>
                      <li>
                        <div class="event-date text-center">
                          <h6 class="date">
                            <?php echo date('d', $row['timestamp']); ?>
                            <span class="month"><?php echo date('M', $row['timestamp']); ?></span>
                          </h6>
                        </div>
                        <h5 class="event-title">
                          <?php echo $row['title']; ?>
                        </h5>
                      </li>
                    <?php } ?>
                    </ul>
                  </div>

      <div class="row">
        <div class="col">
          <div class="event-list-pagination">
            <nav aria-label="pagination">
              <?php echo $this->pagination->create_links(); ?>
            </nav>
          </div>
        </div>
      </div>
                </div>
            </div>
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
                </div>
            </div>
        </div>
    </div>
</div>
