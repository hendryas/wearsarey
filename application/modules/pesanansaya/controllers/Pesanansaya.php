<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pesanansaya extends CI_Controller
{
  //Method default yang selalu dijalankan ketika mengakses controller Auth
  public function __construct()
  {
    parent::__construct();
    ini_set('date.timezone', 'Asia/Jakarta');
    $this->load->model('pesanansaya/pesanansaya_model', 'pesananModel');
    $this->load->model('master/menu_model', 'menuModel');
    // is_logged_in();
  }


  public function bayar($id)
  {
    $data['title'] = 'Halaman Bayar Pesanan';
    $email = $this->session->userdata('email');
    $data['user'] = $this->menuModel->getDataUser($email)->row_array();

    $id_transaksi = decrypt_url($id);
    $data['DataPesanan'] = $this->pesananModel->detail_pesanan($id_transaksi);

    // $this->load->view('templates/templateadmin/main_header', $data);
    // $this->load->view('templates/loaders/loader');
    // $this->load->view('templates/templateadmin/header_menu', $data);
    // $this->load->view('templates/templateadmin/navbar_menu', $data);
    // $this->load->view('pesanansaya/pesanansaya', $data);
    // $this->load->view('templates/templateadmin/main_footer');

    $this->load->view('templates/hurst/header', $data);
    $this->load->view('pesanansaya/pesanansaya', $data);
    $this->load->view('templates/hurst/footer', $data);
  }

  public function bayarpesanan($id)
  {
    $id_transaksi = decrypt_url($id);
    $email = $this->session->userdata('email');
    $user = $this->menuModel->getDataUser($email)->row_array();

    $no_order = htmlspecialchars($this->input->post('no_order', true));
    $name = htmlspecialchars($this->input->post('name', true));
    $nama_bank = htmlspecialchars($this->input->post('nama_bank', true));
    $no_rek = htmlspecialchars($this->input->post('no_rek', true));
    $image = $_FILES['image']['name'];

    $dname = explode(".", $_FILES['image']['name']);
    $ext = end($dname);
    $new_image = $_FILES['image']['name'] = strtolower('bukti_bayar' . '_'  . $no_order . '.' . $ext);

    $data = [
      'no_order' => $no_order,
      'name' => $name,
      'nama_bank' => $nama_bank,
      'no_rek' => $no_rek,
      'image' => $new_image
    ];

    if ($image) {
      $file_name1 = 'bukti_bayar' . '_'  . $no_order . '.' . $ext;
      $config['allowed_types'] = 'jpg|png';
      $config['max_size']     = '3048';
      $config['upload_path'] = './assets/images/bukti_bayar/';
      $config['remove_space'] = TRUE;
      $config['file_name'] = $file_name1;
      $this->load->library('upload', $config);

      if ($this->upload->do_upload('image')) {
        $this->upload->data();
      } else {
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
        redirect('pesanansaya/bayar/') . $id;
      }
    }

    $data = [
      'status_pembayaran'  => 1,
      'atas_nama'          => $name,
      'nama_bank'          => $nama_bank,
      'no_rek'             => $no_rek,
      'bukti_bayar'        => $new_image,
    ];

    $this->db->where('id', $id_transaksi);
    $this->db->update('rekap_pembayaran_pelanggan', $data);

    $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
            Bukti Pembayaran Berhasil di Upload!.</div>');
    redirect('rekappembayaran');
  }
}
