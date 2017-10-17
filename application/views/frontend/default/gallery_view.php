<?php
  $gallery_info = $this->frontend_model->get_gallery_info_by_id($gallery_id);
  foreach ($gallery_info as $row) {
    $this->db->where('frontend_gallery_id', $row['frontend_gallery_id']);
    $this->db->order_by('frontend_gallery_image_id', 'DESC');
    $query = $this->db->get('frontend_gallery_image', $per_page, $this->uri->segment(4));
    $images = $query->result_array();
?>
<div class="single-album-area page-content-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="single-album-wrapper">
                    <div class="album-header">
                        <h1 class="album-title">
                          <?php echo $row['title']; ?>
                        </h1>
                        <span class="album-meta"><?php echo date('d M, Y', $row['date_added']); ?></span>
                        <p class="album-description">
                          <?php echo $row['description']; ?>
                        </p>
                        <hr>
                    </div>
                    <div class="album-content lightbox-popup">
                        <div class="card-columns">
                            <?php foreach ($images as $image) { ?>
                              <div class="card">
                                  <a href="uploads/frontend/gallery_images/<?php echo $image['image'];?>">
                                      <img class="img-fluid" alt=""
                                        src="uploads/frontend/gallery_images/<?php echo $image['image'];?>">
                                  </a>
                              </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="album-grid-pagination">
                    <nav aria-label="pagination">
                        <?php echo $this->pagination->create_links(); ?>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } ?>
