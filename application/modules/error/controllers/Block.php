<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Block extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Access Block';
        $data['role_id'] = $this->session->userdata('role_id');

        // $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('error/blockpage/view_index', $data);
    }
}
