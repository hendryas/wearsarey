<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rekappembayaran extends CI_Controller
{
  //Method default yang selalu dijalankan ketika mengakses controller Auth
  public function __construct()
  {
    parent::__construct();
    ini_set('date.timezone', 'Asia/Jakarta');
    $this->load->model('rekappembayaran/rekappembayaran_model', 'pembayaranModel');
    $this->load->model('master/menu_model', 'menuModel');
    // is_logged_in();
  }


  public function index()
  {
    $data['title'] = 'Halaman Rekappembayaran';
    $email = $this->session->userdata('email');
    $data['user'] = $this->menuModel->getDataUser($email)->row_array();

    $data['belum_bayar'] = $this->pembayaranModel->belum_bayar($data['user']['id'])->result_array();
    $data['diproses'] = $this->pembayaranModel->diproses($data['user']['id'])->result_array();
    $data['dikirim'] = $this->pembayaranModel->dikirim($data['user']['id'])->result_array();
    $data['diterima'] = $this->pembayaranModel->diterima($data['user']['id'])->result_array();


    $this->load->view('templates/hurst/header', $data);
    $this->load->view('rekappembayaran/rekappembayaran', $data);
    $this->load->view('templates/hurst/footer', $data);

    // $this->load->view('templates/templateadmin/main_header', $data);
    // $this->load->view('templates/loaders/loader');
    // $this->load->view('templates/templateadmin/header_menu', $data);
    // $this->load->view('templates/templateadmin/navbar_menu', $data);
    // $this->load->view('rekappembayaran/rekappembayaran', $data);
    // $this->load->view('templates/templateadmin/main_footer');
  }

  public function diTerima($id)
  {
    $id_transaksi = decrypt_url($id);
    $data = [
      'status_order'  => 3,
    ];

    $this->db->where('id', $id_transaksi);
    $this->db->update('rekap_pembayaran_pelanggan', $data);
    $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
            Pesanan berhasil di terima!.</div>');
    redirect('rekappembayaran');
  }
}
