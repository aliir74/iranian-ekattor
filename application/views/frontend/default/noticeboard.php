<?php
  $this->db->where('show_on_website', 1);
  $this->db->order_by('create_timestamp', 'DESC');
  $query = $this->db->get('noticeboard', $per_page, $this->uri->segment(3));
  $notices = $query->result_array();
?>
<div class="news-area page-content-area">
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
          <?php foreach ($notices as $row) { ?>
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="card ekattor-grid-news">
                    <img class="card-img-top img-fluid" alt="" src="uploads/frontend/noticeboard/<?php echo $row['image'];?>">
                    <div class="card-body">
                        <h3 class="card-title"><a href="<?php echo base_url();?>index.php?home/notice_details/<?php echo $row['notice_id'];?>"><?php echo $row['notice_title']; ?></a></h3>
                        <p class="card-text">
                          <?php echo substr($row['notice'], 0, 100); ?> ...
                        </p>
                        <hr>
                        <p class="card-text pull-left"><small class="text-muted"><?php echo date('d M, Y', $row['create_timestamp']); ?></small></p>
                        <a href="<?php echo base_url();?>index.php?home/notice_details/<?php echo $row['notice_id'];?>" class="pull-right btn">
                          <?php echo get_phrase('read_more'); ?>..
                        </a>
                    </div>
                </div>
            </div>
          <?php } ?>
        </div>
        <div class="row">
            <div class="col">
                <div class="news-grid-pagination">
                    <nav aria-label="pagination">
                        <?php echo $this->pagination->create_links(); ?>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
