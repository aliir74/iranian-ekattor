
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
                <div class="map-wrapper">
                    <div class="gmap">
                  </div>
                </div>
            </div>
        </div>
        <div class="row">
          <div class="col-lg-8 col-md-12">
            <div class="contact-form-wrapper">
              <div class="contact-form">
        <form action="<?php echo base_url();?>index.php?home/contact/send"
          method="post">
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputFirstName" class="col-form-label"><?php echo get_phrase('first_name'); ?></label>
              <input type="text" class="form-control" id="inputFirstName" placeholder="<?php echo get_phrase('first_name'); ?>"
                name="first_name" required>
            </div>
            <div class="form-group col-md-6">
              <label for="inputLastName" class="col-form-label"><?php echo get_phrase('last_name'); ?></label>
              <input type="text" class="form-control" id="inputLastName" placeholder="<?php echo get_phrase('last_name'); ?>"
                name="last_name" required>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputEmail" class="col-form-label"><?php echo get_phrase('email'); ?></label>
              <input type="email" class="form-control" id="inputEmail" placeholder="<?php echo get_phrase('email'); ?>"
                name="email" required>
            </div>
            <div class="form-group col-md-6">
              <label for="inputMobile" class="col-form-label"><?php echo get_phrase('phone'); ?></label>
              <input type="text" class="form-control" id="inputMobile" placeholder="<?php echo get_phrase('phone_num'); ?>"
                name="phone">
            </div>
          </div>
          <div class="form-group">
            <label for="inputAddress" class="col-form-label"><?php echo get_phrase('address'); ?></label>
            <input type="text" class="form-control" id="inputAddress" placeholder=""
              name="address">
          </div>
          <div class="form-group">
            <label for="FormControlTextarea"><?php echo get_phrase('comments'); ?>/<?php echo get_phrase('questions'); ?></label>
            <textarea class="form-control" id="FormControlTextarea" rows="3" name="comment"></textarea>
          </div>
          <div class="form-group">
            <div class="g-recaptcha" data-sitekey="<?php echo $this->frontend_model->get_frontend_general_settings('recaptcha_site_key');?>"></div>
          </div>
          <button type="submit" class="btn btn-primary"><?php echo get_phrase('submit'); ?></button>
        </form>
              </div>
            </div>
          </div>
            <div class="col-lg-4 col-md-12">
                <div class="sidebar-widgets">
                    <div class="widgets contact-info-widget">
                        <div class="widget-title">
                            <h4><?php echo get_phrase('contact_info'); ?></h4>
                        </div>
                        <div class="widgets-content">
                          <ul>
                            <li>
                              <p><strong><?php echo get_phrase('address'); ?>: </strong><?php echo $this->frontend_model->get_frontend_general_settings('address'); ?></p>
                            </li>
                            <li>
                              <p><strong><?php echo get_phrase('email'); ?>: </strong><?php echo $this->frontend_model->get_frontend_general_settings('email'); ?></p>
                            </li>
                            <li>
                              <p><strong><?php echo get_phrase('phone'); ?>: </strong><?php echo $this->frontend_model->get_frontend_general_settings('phone'); ?></p>
                            </li>
                            <li>
                              <p><strong><?php echo get_phrase('fax'); ?>: </strong><?php echo $this->frontend_model->get_frontend_general_settings('fax'); ?></p>
                            </li>
                          </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// GOOGLE MAP
var center = [<?php echo $this->frontend_model->get_frontend_general_settings('school_location'); ?>];
$('.gmap').gmap3({
center: center,
scrollwheel: false,
zoom: 15,
        streetViewControl : true,
        styles: [
      {
      "elementType": "geometry",
      "stylers": [
        {
        "color": "#f5f5f5"
        }
      ]
      },
      {
      "elementType": "labels.icon",
      "stylers": [
        {
        "visibility": "off"
        }
      ]
      },
      {
      "elementType": "labels.text.fill",
      "stylers": [
        {
        "color": "#485d5e"
        }
      ]
      },
      {
      "elementType": "labels.text.stroke",
      "stylers": [
        {
        "color": "#f5f5f5"
        }
      ]
      },
      {
      "featureType": "administrative.land_parcel",
      "elementType": "labels.text.fill",
      "stylers": [
        {
        "color": "#8080ff"
        }
      ]
      },
      {
      "featureType": "landscape.man_made",
      "elementType": "geometry.fill",
      "stylers": [
        {
        "color": "#dce2e2"
        }
      ]
      },
      {
      "featureType": "landscape.natural",
      "elementType": "geometry.fill",
      "stylers": [
        {
        "color": "#dce2e2"
        }
      ]
      },
      {
      "featureType": "poi",
      "elementType": "geometry",
      "stylers": [
        {
        "color": "#eeeeee"
        }
      ]
      },
      {
      "featureType": "poi",
      "elementType": "labels.text.fill",
      "stylers": [
        {
        "color": "#757575"
        }
      ]
      },
      {
      "featureType": "poi.business",
      "elementType": "geometry.fill",
      "stylers": [
        {
        "color": "#dce2e2"
        }
      ]
      },
      {
      "featureType": "poi.government",
      "elementType": "geometry.fill",
      "stylers": [
        {
        "color": "#dce2e2"
        }
      ]
      },
      {
      "featureType": "poi.medical",
      "elementType": "geometry.fill",
      "stylers": [
        {
        "color": "#dce2e2"
        }
      ]
      },
      {
      "featureType": "poi.park",
      "elementType": "geometry",
      "stylers": [
        {
        "color": "#e5e5e5"
        }
      ]
      },
      {
      "featureType": "poi.park",
      "elementType": "geometry.fill",
      "stylers": [
        {
        "color": "#a5d6a7"
        }
      ]
      },
      {
      "featureType": "poi.place_of_worship",
      "elementType": "geometry.fill",
      "stylers": [
        {
        "color": "#dce2e2"
        }
      ]
      },
      {
      "featureType": "poi.school",
      "elementType": "geometry.fill",
      "stylers": [
        {
        "color": "#dce2e2"
        }
      ]
      },
      {
      "featureType": "poi.sports_complex",
      "elementType": "geometry.fill",
      "stylers": [
        {
        "color": "#dce2e2"
        }
      ]
      },
      {
      "featureType": "road",
      "elementType": "geometry",
      "stylers": [
        {
        "color": "#ffffff"
        }
      ]
      },
      {
      "featureType": "road.arterial",
      "elementType": "labels.text.fill",
      "stylers": [
        {
        "color": "#757575"
        }
      ]
      },
      {
      "featureType": "road.highway",
      "elementType": "geometry",
      "stylers": [
        {
        "color": "#dadada"
        }
      ]
      },
      {
      "featureType": "road.highway",
      "elementType": "geometry.fill",
      "stylers": [
        {
        "color": "#bfd1d5"
        }
      ]
      },
      {
      "featureType": "road.highway",
      "elementType": "labels.text.fill",
      "stylers": [
        {
        "color": "#616161"
        }
      ]
      },
      {
      "featureType": "road.local",
      "elementType": "labels.text.fill",
      "stylers": [
        {
        "color": "#485d5e"
        }
      ]
      },
      {
      "featureType": "transit.line",
      "elementType": "geometry",
      "stylers": [
        {
        "color": "#e5e5e5"
        }
      ]
      },
      {
      "featureType": "transit.station",
      "elementType": "geometry",
      "stylers": [
        {
        "color": "#eeeeee"
        }
      ]
      },
      {
      "featureType": "water",
      "elementType": "geometry",
      "stylers": [
        {
        "color": "#c9c9c9"
        }
      ]
      },
      {
      "featureType": "water",
      "elementType": "geometry.fill",
      "stylers": [
        {
        "color": "#a5cbe2"
        }
      ]
      },
      {
      "featureType": "water",
      "elementType": "labels.text.fill",
      "stylers": [
        {
        "color": "#ffffff"
        }
      ]
      }
    ],
})
.marker({
position: center,
icon: 'assets/frontend/default/img/icons/marker.png'
});
</script>
