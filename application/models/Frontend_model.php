<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Frontend_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    // get noticeboard
    function get_frontend_noticeboard() {
      $this->db->where('show_on_website', 1);
      $this->db->order_by('create_timestamp', 'DESC');
      $result = $this->db->get('noticeboard')->result_array();
      return $result;
    }

    function get_frontend_recent_noticeboard() {
      $this->db->where('show_on_website', 1);
      $this->db->order_by('create_timestamp', 'DESC');
      $this->db->limit(4);
      $result = $this->db->get('noticeboard')->result_array();
      return $result;
    }

    function get_frontend_all_events() {
      $this->db->where('status', 1);
      $this->db->order_by('timestamp', 'DESC');
      $result = $this->db->get('frontend_events')->result_array();
      return $result;
    }

    function get_frontend_upcoming_events() {
      $this->db->where('status', 1);
      $this->db->where('timestamp >', time());
      $this->db->limit(4);
      $result = $this->db->get('frontend_events')->result_array();
      return $result;
    }

    function get_frontend_teachers() {
      $this->db->where('show_on_website', 1);
      $result = $this->db->get('teacher')->result_array();
      return $result;
    }

    function get_frontend_notice_by_id($notice_id) {
      $this->db->where('notice_id', $notice_id);
      $result = $this->db->get('noticeboard')->result_array();
      return $result;
    }

    // get all events
    function get_events() {
      $this->db->order_by('timestamp', "DESC");
      $events = $this->db->get('frontend_events')->result_array();
      return $events;
    }
    // add event
    function add_event() {
      $data['title']  = $this->input->post('title');
      $data['timestamp']  = strtotime($this->input->post('timestamp'));
      $data['status'] = $this->input->post('status');
      $this->db->insert('frontend_events', $data);
    }
    // edit event
    function edit_event($event_id) {
      $data['title']  = $this->input->post('title');
      $data['timestamp']  = strtotime($this->input->post('timestamp'));
      $data['status'] = $this->input->post('status');
      $this->db->where('frontend_events_id', $event_id);
      $this->db->update('frontend_events', $data);
    }
    // delete event
    function delete_event($event_id) {
      $this->db->where('frontend_events_id', $event_id);
      $this->db->delete('frontend_events');
    }

    // news
    function get_news() {
      $this->db->order_by('date_added', 'DESC');
      $news = $this->db->get('frontend_news')->result_array();
      return $news;
    }

    function add_news() {
      $data['title']  = $this->input->post('title');
      $data['description']  = $this->input->post('description');
      $data['date_added'] = strtotime($this->input->post('date'));
      if ($_FILES['news_image']['name'] != '') {
        $data['image']  = $_FILES['news_image']['name'];
        move_uploaded_file($_FILES['news_image']['tmp_name'], 'uploads/frontend/news_image/'. $_FILES['news_image']['name']);
      }
      $this->db->insert('frontend_news', $data);
    }

    function delete_news($news_id) {
      // delete the news image if exists
      $news_image = $this->db->get_where('frontend_news', array('frontend_news_id' => $news_id))->row()->image;
      if ($news_image != NULL) {
        if (file_exists('uploads/frontend/news_image/'. $news_image)) {
          unlink('uploads/frontend/news_image/'. $news_image);
        }
      }
      // delete the db entry
      $this->db->where('frontend_news_id', $news_id);
      $this->db->delete('frontend_news');
    }

    // gallery
    function get_gallaries() {
      $this->db->order_by('date_added', 'DESC');
      $result = $this->db->get('frontend_gallery')->result_array();
      return $result;
    }

    function get_gallery_info_by_id($gallery_id) {
      $this->db->where('frontend_gallery_id', $gallery_id);
      $result = $this->db->get('frontend_gallery')->result_array();
      return $result;
    }

    function add_gallery() {
      $data['title']            = $this->input->post('title');
      $data['description']      = $this->input->post('description');
      $data['show_on_website']  = $this->input->post('show_on_website');
      $data['date_added']       = strtotime($this->input->post('date_added'));
      if ($_FILES['cover_image']['name'] != '') {
        $data['image']  = $_FILES['cover_image']['name'];
        move_uploaded_file($_FILES['cover_image']['tmp_name'], 'uploads/frontend/gallery_cover/'. $_FILES['cover_image']['name']);
      }
      $this->db->insert('frontend_gallery', $data);
    }

    function edit_gallery($gallery_id) {
      $image = $this->db->get_where('frontend_gallery', array('frontend_gallery_id' => $gallery_id))->row()->image;
      $data['title']            = $this->input->post('title');
      $data['description']      = $this->input->post('description');
      $data['show_on_website']  = $this->input->post('show_on_website');
      $data['date_added']       = strtotime($this->input->post('date_added'));
      if ($_FILES['cover_image']['name'] != '') {
        $data['image']  = $_FILES['cover_image']['name'];
        move_uploaded_file($_FILES['cover_image']['tmp_name'], 'uploads/frontend/gallery_cover/'. $_FILES['cover_image']['name']);
      } else {
        $data['image']  = $image;
      }
      $this->db->where('frontend_gallery_id', $gallery_id);
      $this->db->update('frontend_gallery', $data);
    }

    function add_gallery_images($gallery_id) {
        $files = $_FILES;
        $number_of_images = count($_FILES['gallery_images']['name']);
        for ($i=0; $i < $number_of_images; $i++) {
          if ($files['gallery_images']['name'][$i] != '') {
            move_uploaded_file($files['gallery_images']['tmp_name'][$i], 'uploads/frontend/gallery_images/'. $files['gallery_images']['name'][$i]);
            $data['frontend_gallery_id']  = $gallery_id;
            $data['image']  = $files['gallery_images']['name'][$i];
            $this->db->insert('frontend_gallery_image', $data);
          }
        }
    }

    function get_frontend_gallery_images_limited($gallery_id) {
      $this->db->where('frontend_gallery_id', $gallery_id);
      $this->db->order_by('frontend_gallery_image_id', 'desc');
      $this->db->limit(4);
      $result = $this->db->get('frontend_gallery_image')->result_array();
      return $result;
    }

    function delete_gallery_image($gallery_image_id) {
      $image = $this->db->get_where('frontend_gallery_image', array(
        'frontend_gallery_image_id' => $gallery_image_id
      ))->row()->image;
      if (file_exists('uploads/frontend/gallery_images/'.$image)) {
        unlink('uploads/frontend/gallery_images/'.$image);
      }
      $this->db->where('frontend_gallery_image_id', $gallery_image_id);
      $this->db->delete('frontend_gallery_image');
    }

    function get_gallery_images($gallery_id) {
      $this->db->where('frontend_gallery_id', $gallery_id);
      $this->db->order_by('frontend_gallery_image_id', 'desc');
      $result = $this->db->get('frontend_gallery_image')->result_array();
      return $result;
    }

    // get general settings
    function get_frontend_general_settings($type = '') {
      $result = $this->db->get_where('frontend_general_settings', array(
        'type' => $type
      ))->row()->description;
      return $result == null ? '' : $result;
    }

    // update terms and conditions
    function update_terms_conditions() {
      $data['description']  = $this->input->post('terms_conditions');
      $this->db->where('type', 'terms_conditions');
      $this->db->update('frontend_general_settings', $data);
    }

    // update privacy policy
    function update_privacy_policy() {
      $data['description']  = $this->input->post('privacy_policy');
      $this->db->where('type', 'privacy_policy');
      $this->db->update('frontend_general_settings', $data);
    }

    // update about us
    function update_about_us() {
      $data['description']  = $this->input->post('about_us');
      $this->db->where('type', 'about_us');
      $this->db->update('frontend_general_settings', $data);

      if ($_FILES['about_us_image']['name'] != '') {
        $data['description']  = 'about_us_' . $_FILES['about_us_image']['name'];
        $this->db->where('type', 'about_us_image');
        $this->db->update('frontend_general_settings', $data);
        move_uploaded_file($_FILES['about_us_image']['tmp_name'], 'uploads/frontend/about_us_'. $_FILES['about_us_image']['name']);
      }
    }

    // send message from contact form
    function send_contact_message() {
      $first_name = $this->input->post('first_name');
      $last_name = $this->input->post('last_name');
      $email = $this->input->post('email');
      $phone = $this->input->post('phone');
      $address = $this->input->post('address');
      $comment = $this->input->post('comment');

      $receiver_email = $this->db->get_where('frontend_general_settings', array(
        'type' => 'email'
      ))->row()->description;

      $msg = $comment."</br>";
      $msg .= $first_name." ".$last_name;
      $msg .= "Phone : ".$phone;
      $msg .= "Address : ". $address;

      $this->email_model->contact_message_email($email, $receiver_email, $msg);
    }

    // update slider images
    function update_slider_images() {
      $current_images_json = $this->db->get_where('frontend_general_settings', array(
        'type' => 'slider_images'
      ))->row()->description;
      $current_images = json_decode($current_images_json);
      $slider = array();
      for ($i=0; $i < 3; $i++) {
        $image = $current_images[$i]->image;
        $data['title']  = $this->input->post('title_'.$i);
        $data['description']  = $this->input->post('description_'.$i);
        if ($_FILES['slider_image_'.$i]['name'] != '') {
          $data['image']  = $_FILES['slider_image_'.$i]['name'];
        } else {
          $data['image']  = $image;
        }
        array_push($slider, $data);
        move_uploaded_file($_FILES['slider_image_'.$i]['tmp_name'], 'uploads/frontend/slider/'. $_FILES['slider_image_'.$i]['name']);
      }
      $images['description']  = json_encode($slider);
      $this->db->where('type', 'slider_images');
      $this->db->update('frontend_general_settings', $images);
    }

    // update general settings
    function update_frontend_general_settings() {
      $data['description']  = $this->input->post('school_title');
      $this->db->where('type', 'school_title');
      $this->db->update('frontend_general_settings', $data);

      $data['description']  = $this->input->post('email');
      $this->db->where('type', 'email');
      $this->db->update('frontend_general_settings', $data);

      $data['description']  = $this->input->post('phone');
      $this->db->where('type', 'phone');
      $this->db->update('frontend_general_settings', $data);

      $data['description']  = $this->input->post('fax');
      $this->db->where('type', 'fax');
      $this->db->update('frontend_general_settings', $data);

      $data['description']  = $this->input->post('copyright_text');
      $this->db->where('type', 'copyright_text');
      $this->db->update('frontend_general_settings', $data);

      $data['description']  = $this->input->post('address');
      $this->db->where('type', 'address');
      $this->db->update('frontend_general_settings', $data);

      $data['description']  = $this->input->post('school_location');
      $this->db->where('type', 'school_location');
      $this->db->update('frontend_general_settings', $data);

      $data['description']  = $this->input->post('homepage_note_title');
      $this->db->where('type', 'homepage_note_title');
      $this->db->update('frontend_general_settings', $data);

      $data['description']  = $this->input->post('homepage_note_description');
      $this->db->where('type', 'homepage_note_description');
      $this->db->update('frontend_general_settings', $data);

      $data['description']  = $this->input->post('recaptcha_site_key');
      $this->db->where('type', 'recaptcha_site_key');
      $this->db->update('frontend_general_settings', $data);

      $links = array();
      $social['facebook'] = $this->input->post('facebook');
      $social['twitter'] = $this->input->post('twitter');
      $social['linkedin'] = $this->input->post('linkedin');
      $social['google'] = $this->input->post('google');
      $social['youtube'] = $this->input->post('youtube');
      $social['instagram'] = $this->input->post('instagram');
      array_push($links, $social);
      $data['description']  = json_encode($links);
      $this->db->where('type', 'social_links');
      $this->db->update('frontend_general_settings', $data);

      if ($_FILES['header_logo']['name'] != '') {
        $data['description']  = 'header_' . $_FILES['header_logo']['name'];
        $this->db->where('type', 'header_logo');
        $this->db->update('frontend_general_settings', $data);
        move_uploaded_file($_FILES['header_logo']['tmp_name'], 'uploads/frontend/header_'. $_FILES['header_logo']['name']);
      }

      if ($_FILES['footer_logo']['name'] != '') {
        $data['description']  = 'footer_' . $_FILES['footer_logo']['name'];
        $this->db->where('type', 'footer_logo');
        $this->db->update('frontend_general_settings', $data);
        move_uploaded_file($_FILES['footer_logo']['tmp_name'], 'uploads/frontend/footer_'. $_FILES['footer_logo']['name']);
      }
    }
}
