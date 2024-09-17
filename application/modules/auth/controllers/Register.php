<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Register extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        ini_set('date.timezone', 'Asia/Jakarta');
        $this->load->model('auth/Auth_model', 'authModel');
    }

    public function index()
    {
        //ini untuk menghindari jika kembali ke auth,untuk tiap rolenya nanti di tambahkan jika perlu
        if ($this->session->userdata('role_id') == 1) {
            redirect('admin');
        } elseif ($this->session->userdata('role_id') == 2) {
            redirect('admin');
        } elseif ($this->session->userdata('role_id') == 3) {
            redirect('staff');
        } elseif ($this->session->userdata('role_id') == 4) {
            redirect('customer');
        }

        $this->form_validation->set_rules('name', 'Nama', 'required|trim', [ //bener
            'required' => 'Nama tidak boleh kosong.'
        ]);
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required|trim', [ //bener
            'required' => 'Tanggal lahir tidak boleh kosong.',
        ]);
        $this->form_validation->set_rules('gender', 'Gender', 'required|trim', [ //bener
            'required' => 'Gender tidak boleh kosong.'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email', [ //bener
            'required' => 'Email tidak boleh kosong.',
            'valid_email' => 'Silahkan tuliskan Alamat Email dengan benar.'
        ]);
        $this->form_validation->set_rules('phone', 'Phone', 'required|trim|min_length[10]|is_unique[user.phone]', [ //bener
            'required' => 'No. Handhphone tidak boleh kosong.',
            'is_unique' => 'No. Handhphone ini sudah terdaftar.',
            'min_length' => 'No. Handhphone terlalu pendek!',
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[8]|matches[password2]', [ //bener
            'matches' => 'Password tidak sama!',
            'min_length' => 'Password terlalu pendek!',
            'required' => 'Password tidak boleh kosong.',
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]', [ //bener
            'required' => 'Password tidak boleh kosong.',
            'matches' => 'Password tidak sama!',
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Register';

            // $this->load->view('templates/templateauth/auth_header', $data);
            // $this->load->view('auth/registerpage/view_index');
            // $this->load->view('templates/templateauth/auth_footer');

            $this->load->view('templates/hurst/header', $data);
            $this->load->view('auth/registerpage/view_index');
            $this->load->view('templates/hurst/footer', $data);
        } else {
            $name = $this->input->post('name');
            $tgl_lahir = $this->input->post('tgl_lahir');
            $gender = $this->input->post('gender');
            $email = $this->input->post('email');
            $phone = $this->input->post('phone');
            $password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
            $role_id = 4;
            $is_active = 0;
            $date_created = date('Y-m-d H:i:s');
            $data = [
                'name' => $name,
                'tgl_lahir' => $tgl_lahir,
                'gender' => $gender,
                'email' => $email,
                'phone' => $phone,
                'password' => $password,
                'role_id' => $role_id,
                'is_active' => $is_active,
                'date_created' => $date_created
            ];

            // siapkan token
            $token = base64_encode(random_bytes(32));
            $user_token = [
                'email' => $email,
                'token' => $token,
                'date_created' => time()
            ];

            $this->authModel->insertDataUser($data);

            $this->authModel->insertDataUserToken($user_token);

            //Setelah data masuk,Kirim email activasi
            $this->_sendEmail($token, 'verify', $name);

            $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
            <strong>Selamat akun anda sudah di buat!</strong> Silahkan cek email untuk mengaktivasi akunmu.</div>');
            redirect('auth/login');
        }
    }

    public function registerakun()
    {
        $name = $this->input->post('nama');
        $email = $this->input->post('email');
        $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
        $role_id = 2;
        $is_active = 1;
        $date_created = date('Y-m-d H:i:s');

        $data = [
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'role_id' => $role_id,
            'is_active' => $is_active,
            'date_created' => $date_created
        ];
        $this->authModel->insertDataUser($data);

        $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
        <strong>Selamat akun anda sudah di buat!</strong></div>');
        redirect('auth/login');
    }
}
