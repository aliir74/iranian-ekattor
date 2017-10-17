<?php
  $this->db->where('show_on_website', 1);
  $query = $this->db->get('teacher', $per_page, $this->uri->segment(3));
  $teachers = $query->result_array();
?>
<div class="teacher-area page-content-area">
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
          <?php foreach ($teachers as $row) {
              $social = $row['social_links'];
              $links = json_decode($social);
            ?>
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="card ekattor-grid-teacher text-center">
                   <div class="teacher-image">
                        <img class="card-img-top img-fluid" alt="" src="uploads/teacher_image/<?php echo $row['teacher_id'];?>.jpg">
                        <div class="teacher-social">
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
                            </ul>
                        </div>
                    </div>
                    <div class="card-body">
                        <h3 class="card-title"><?php echo $row['name']; ?></h3>
                        <p class="card-text"><?php echo $row['designation']; ?></p>
                        <a href="mailto:<?php echo $row['email']; ?>" target="_self" class="card-link"><?php echo $row['email']; ?></a>
                        <p class="card-text"><?php echo $row['phone']; ?></p>
                    </div>
                </div>
            </div>
          <?php } ?>
        </div>
        <div class="row">
            <div class="col">
                <div class="teacher-grid-pagination">
                    <nav aria-label="pagination">
                        <?php echo $this->pagination->create_links(); ?>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
