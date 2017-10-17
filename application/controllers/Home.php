<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*  
 *  @author   : Creativeitem
 *  date    : 14 september, 2017
 *  Ekattor School Management System Pro
 *  http://codecanyon.net/user/Creativeitem
 *  http://support.creativeitem.com
 */
class Home extends CI_Controller {

  protected $theme;

  // constructor
  function __construct()
  {
    parent::__construct();
    $this->load->database();
    $this->load->library('session');
    $this->theme = $this->frontend_model->get_frontend_general_settings('theme');
  }

  // default function
  public function index() {
    $page_data['page_name']  = 'home';
    $page_data['page_title'] = get_phrase('home');
    $this->load->view('frontend/'.$this->theme.'/index', $page_data);
  }

  // noticeboard
  function noticeboard() {
    $count_notice = $this->db->get_where('noticeboard', array('show_on_website' => 1))->num_rows();
    $config = array();
    $config = manager($count_notice, 9);
    $config['base_url']  = base_url().'index.php?home/noticeboard/';
    $this->pagination->initialize($config);

    $page_data['per_page']    = $config['per_page'];
    $page_data['page_name']  = 'noticeboard';
    $page_data['page_title'] = get_phrase('noticeboard');
    $this->load->view('frontend/'.$this->theme.'/index', $page_data);
  }

  function notice_details($notice_id = '') {
    $page_data['notice_id'] = $notice_id;
    $page_data['page_name']  = 'notice_details';
    $page_data['page_title'] = get_phrase('notice_details');
    $this->load->view('frontend/'.$this->theme.'/index', $page_data);
  }

  function events() {
    $count_events = $this->db->get_where('frontend_events', array('status' => 1))->num_rows();
    $config = array();
    $config = manager($count_events, 8);
    $config['base_url']  = base_url().'index.php?home/events/';
    $this->pagination->initialize($config);

    $page_data['per_page']    = $config['per_page'];
    $page_data['page_name']  = 'event';
    $page_data['page_title'] = get_phrase('event_list');
    $this->load->view('frontend/'.$this->theme.'/index', $page_data);
  }

  function teachers() {
    $count_teachers = $this->db->get_where('teacher', array('show_on_website' => 1))->num_rows();
    $config = array();
    $config = manager($count_teachers, 9);
    $config['base_url']  = base_url().'index.php?home/teachers/';
    $this->pagination->initialize($config);

    $page_data['per_page']    = $config['per_page'];
    $page_data['page_name']  = 'teacher';
    $page_data['page_title'] = get_phrase('teachers');
    $this->load->view('frontend/'.$this->theme.'/index', $page_data);
  }

  function gallery() {
    $count_gallery = $this->db->get_where('frontend_gallery', array('show_on_website' => 1))->num_rows();
    $config = array();
    $config = manager($count_gallery, 6);
    $config['base_url']  = base_url().'index.php?home/gallery/';
    $this->pagination->initialize($config);

    $page_data['per_page']    = $config['per_page'];
    $page_data['page_name']  = 'gallery';
    $page_data['page_title'] = get_phrase('gallery');
    $this->load->view('frontend/'.$this->theme.'/index', $page_data);
  }

  function gallery_view($gallery_id = '') {
    $count_images = $this->db->get_where('frontend_gallery_image', array(
      'frontend_gallery_id' => $gallery_id
    ))->num_rows();
    $config = array();
    $config = manager($count_images, 9);
    $config['base_url']  = base_url().'index.php?home/gallery_view/'.$gallery_id.'/';
    $this->pagination->initialize($config);

    $page_data['per_page']    = $config['per_page'];
    $page_data['gallery_id']  = $gallery_id;
    $page_data['page_name']  = 'gallery_view';
    $page_data['page_title'] = get_phrase('gallery');
    $this->load->view('frontend/'.$this->theme.'/index', $page_data);
  }

  function admission() {
    $page_data['page_name']  = 'admission';
    $page_data['page_title'] = get_phrase('admission_form');
    $this->load->view('frontend/'.$this->theme.'/index', $page_data);
  }

  function about() {
    $page_data['page_name']  = 'about';
    $page_data['page_title'] = get_phrase('about_us');
    $this->load->view('frontend/'.$this->theme.'/index', $page_data);
  }

  function contact($param1 = '') {
    if ($param1 == 'send') {
      $this->frontend_model->send_contact_message();
      redirect(base_url().'index.php?home/contact', 'refresh');
    }
    $page_data['page_name']  = 'contact';
    $page_data['page_title'] = get_phrase('contact_us');
    $this->load->view('frontend/'.$this->theme.'/index', $page_data);
  }

  function privacy_policy() {
    $page_data['page_name']  = 'privacy_policy';
    $page_data['page_title'] = get_phrase('privacy_policy');
    $this->load->view('frontend/'.$this->theme.'/index', $page_data);
  }

  function terms_conditions() {
    $page_data['page_name']  = 'terms_conditions';
    $page_data['page_title'] = get_phrase('terms_&_conditions');
    $this->load->view('frontend/'.$this->theme.'/index', $page_data);
  }

}
