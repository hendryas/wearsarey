<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Forgotpassword extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        ini_set('date.timezone', 'Asia/Jakarta');
        $this->load->model('auth/Auth_model', 'authModel');
    }

    public function index()
    {
        $email = $this->session->userdata('email');
        $user = $this->authModel->getDataUser($email)->row_array();

        if ($this->session->userdata('email')) {
            if ($user['role_id'] == 1) {
                redirect('admin');
            } elseif ($user['role_id'] == 2) {
                redirect('admin');
            } elseif ($user['role_id'] == 3) {
                redirect('staff');
            } elseif ($user['role_id'] == 4) {
                redirect('customer');
            }
        }

        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email', [
            'required' => 'Email tidak boleh kosong.',
            'valid_email' => 'Silahkan tuliskan Alamat Email dengan benar.'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Forgot Password';

            $this->load->view('templates/templateauth/auth_header', $data);
            $this->load->view('auth/forgotpasswordpage/forgot_password');
            $this->load->view('templates/templateauth/auth_footer');
        } else {
            $email = $this->input->post('email');
            $user = $this->authModel->getDataUserActive($email)->row_array();

            // $user = $this->db->get_where('user', ['email' => $email, 'is_active' => 1])->row_array();
            $name = $user['name'];

            if ($user) {
                $token = base64_encode(random_bytes(32));
                $user_token = [
                    'email'         => $email,
                    'token'         => $token,
                    'date_created'  => time()
                ];

                $this->authModel->insertDataUserToken($user_token);

                $this->_sendEmail($token, 'forgot', $name);

                $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
                <strong>Email berhasil dikirim! </strong> Silahkan cek email untuk mereset password.</div>');
                redirect('auth/forgotpassword');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">
                <strong>Email belum terdaftar atau teraktivasi! </strong> Silahkan gunakan email yang sudah terdaftar.</div>');
                redirect('auth/forgotpassword');
            }
        }
    }
}
