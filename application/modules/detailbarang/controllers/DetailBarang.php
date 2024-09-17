<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DetailBarang extends CI_Controller
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


  public function detail($id)
  {
    $data['title'] = 'Detail Barang';
    $email = $this->session->userdata('email');
    $data['user'] = $this->menuModel->getDataUser($email)->row_array();

    $data['product'] = $this->barangModel->getDataProductDetail($id)->result_array();
    $data['gambar_products'] = $this->barangModel->getDataGambarProduct($id)->result_array();
    // var_dump($data['gambar_products']);
    // die;

    $this->load->view('templates/hurst/header', $data);
    $this->load->view('detailbarang/detailbarang', $data);
    $this->load->view('templates/hurst/footer', $data);
  }
}
