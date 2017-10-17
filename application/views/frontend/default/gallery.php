<?php
  $this->db->where('show_on_website', 1);
  $this->db->order_by('date_added', 'DESC');
  $query = $this->db->get('frontend_gallery', $per_page, $this->uri->segment(3));
  $galleries = $query->result_array();
?>
<div class="gallery-area page-content-area">
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
            <div class="col-md-12">
              <?php foreach ($galleries as $row) {
                  $images = $this->frontend_model->get_frontend_gallery_images_limited($row['frontend_gallery_id']);
                ?>
                <div class="gallery-album-view">
                    <div class="album-title clearfix">
                        <h3 class="pull-left"><?php echo $row['title']; ?></h3>
                        <div class="view-all-btn pull-right">
                            <a href="<?php echo base_url();?>index.php?home/gallery_view/<?php echo $row['frontend_gallery_id'];?>"
                              class="btn">
                              <?php echo get_phrase('view_gallery'); ?>
                            </a>
                        </div>
                    </div>
                    <div class="row no-gutters lightbox-popup">
                        <?php foreach ($images as $image) { ?>
                          <div class="col-lg-3 col-md-6">
                              <a href="uploads/frontend/gallery_images/<?php echo $image['image'];?>">
                                  <img class="img-fluid" alt=""
                                    src="uploads/frontend/gallery_images/<?php echo $image['image'];?>">
                              </a>
                          </div>
                        <?php } ?>
                    </div>
                </div>
              <?php } ?>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="gallery-pagination">
                    <nav aria-label="pagination">
                        <?php echo $this->pagination->create_links(); ?>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
