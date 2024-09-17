<?php
defined('BASEPATH') or exit('No direct script access allowed');

class About extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    //jika tidak ada session,lempar ke auth
    // is_logged_in();
    $this->load->model('Barang_model');
    $this->load->model('master/Menu_model', 'Menu_model');
    date_default_timezone_set('Asia/Jakarta');
  }

  public function index()
  {
    $data['title'] = 'About';
    $email = $this->session->userdata('email');
    $data['user'] = $this->Menu_model->getDataUser($email)->row_array();
    // $data['product'] = $this->Barang_model->getDataProduct()->result_array();

    $this->load->view('templates/hurst/header', $data);
    $this->load->view('about/about', $data);
    $this->load->view('templates/hurst/footer', $data);
  }
}
