<?php
defined('BASEPATH') or exit('No direct script access allowed');

class RekapPembayaranCustomer extends CI_Controller
{
  //Method default yang selalu dijalankan ketika mengakses controller Auth
  public function __construct()
  {
    parent::__construct();
    ini_set('date.timezone', 'Asia/Jakarta');
    $this->load->model('rekappembayarancustomer/rekappembayarancustomer_model', 'rekapadmin');
    $this->load->model('master/menu_model', 'menuModel');
    // is_logged_in();
  }


  public function index()
  {
    $data['title'] = 'Pembayaran Customer';
    $email = $this->session->userdata('email');
    $data['user'] = $this->menuModel->getDataUser($email)->row_array();

    $data['belum_bayar'] = $this->rekapadmin->pesanan()->result_array();
    $data['pesanan_diproses'] = $this->rekapadmin->pesanan_diproses()->result_array();
    $data['pesanan_dikirim'] = $this->rekapadmin->pesanan_dikirim()->result_array();
    $data['pesanan_diterima'] = $this->rekapadmin->pesanan_diterima()->result_array();

    // var_dump($data['pesanan_diterima']);
    // die;

    $this->load->view('templates/templateadmin/main_header', $data);
    $this->load->view('templates/loaders/loader');
    $this->load->view('templates/templateadmin/header_menu', $data);
    $this->load->view('templates/templateadmin/navbar_menu', $data);
    $this->load->view('rekappembayarancustomer/rekappembayarancustomer', $data);
    $this->load->view('templates/templateadmin/main_footer');
  }

  public function proses($id)
  {
    $id = decrypt_url($id);
    $data = [
      'status_order' => 1
    ];
    $this->rekapadmin->update_order($data, $id);
    $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
        Pesanan Berhasil di Proses/Dikemas!.</div>');
    redirect('rekappembayarancustomer');
  }

  public function kirim($id)
  {
    $id = decrypt_url($id);
    $data = [
      'status_order' => 2,
      'no_resi' => htmlspecialchars($this->input->post('no_resi')),
    ];
    $this->rekapadmin->update_order($data, $id);

    $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
       Pesanan Berhasil di Kirim!.</div>');
    redirect('rekappembayarancustomer');
  }
}
