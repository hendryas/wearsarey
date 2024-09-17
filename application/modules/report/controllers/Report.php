<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Report extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    //jika tidak ada session,lempar ke auth
    // is_logged_in();
    $this->load->model('Barang_model');
    $this->load->model('master/Menu_model', 'Menu_model');
    $this->load->model('report/Report_model', 'reportModel');
    date_default_timezone_set('Asia/Jakarta');
  }

  public function index()
  {
    $data['title'] = 'Report Bulanan';
    $email = $this->session->userdata('email');
    $data['user'] = $this->Menu_model->getDataUser($email)->row_array();

    $this->load->view('templates/templateadmin/main_header', $data);
    $this->load->view('templates/loaders/loader');
    $this->load->view('templates/templateadmin/header_menu', $data);
    $this->load->view('templates/templateadmin/navbar_menu', $data);
    $this->load->view('report/report', $data);
    $this->load->view('templates/templateadmin/main_footer');
  }

  public function report_bulanan()
  {
    $tanggal = $this->input->post('tanggal');
    $email = $this->session->userdata('email');
    $data['user'] = $this->Menu_model->getDataUser($email)->row_array();

    $data['report_produk'] = $this->reportModel->getDataReport($tanggal)->result_array();
    $data['tanggal'] = $this->input->post('tanggal');

    // $this->load->view('report/report_bulanan', $data);

    $html = $this->load->view('report/report_bulanan', $data, true);
    $mpdf = new \Mpdf\Mpdf();
    // $mpdf->showImageErrors = true;
    $mpdf->WriteHTML($html);
    $mpdf->Output();
  }
}
