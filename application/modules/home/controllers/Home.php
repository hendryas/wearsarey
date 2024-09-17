<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
  //Method default yang selalu dijalankan ketika mengakses controller Auth
  public function __construct()
  {
    parent::__construct();
    ini_set('date.timezone', 'Asia/Jakarta');
    $this->load->model('barang/barang_model', 'barangModel');
    $this->load->model('master/menu_model', 'menuModel');
    // is_logged_in();
  }


  public function index()
  {
    $data['title'] = 'Halaman Barang';
    $email = $this->session->userdata('email');
    $data['user'] = $this->menuModel->getDataUser($email)->row_array();

    $data['product'] = $this->barangModel->getDataProduct()->result_array();

    // $this->load->view('templates/templateadmin/main_header', $data);
    // $this->load->view('templates/loaders/loader');
    // $this->load->view('templates/templateadmin/header_menu', $data);
    // $this->load->view('templates/templateadmin/navbar_menu', $data);
    // $this->load->view('home/home', $data);
    // $this->load->view('templates/templateadmin/main_footer');
    $this->load->view('templates/hurst/header', $data);
    $this->load->view('home/home2', $data);
    $this->load->view('templates/hurst/footer', $data);
  }
}
