<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{
    public function updatePeserta($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('user', $data);
    }
    public function getDataUser($email)
    {
        $this->db->select('user.*');
        $this->db->from('user');
        $this->db->where('email', $email);

        $result = $this->db->get();
        return $result;
    }

    public function getUser()
    {
        $this->db->select('a.*, b.role');
        $this->db->from('user a');
        $this->db->join('user_role b', 'b.id=a.role_id', 'left');
        $this->db->order_by("b.role", "asc");
        $query = $this->db->get();
        return $query;
    }

    public function getRole()
    {
        $this->db->select('');
        $this->db->from('user_role');
        $query = $this->db->get();
        return $query;
    }

    public function deleteDataUser($nik)
    {
        $data['peserta'] = $this->db->get_where('user', ['nik' => $nik])->row_array();

        $this->db->where('nik', $nik);
        $this->db->delete('user');

        $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
        <strong>Data User berhasil dihapus!</strong></div>');
        redirect('master/user');
    }

    public function editDataUser()
    {
        $nik = $this->input->post('nik');

        $data = [
            'role_id' => htmlspecialchars($this->input->post('role_id')),
        ];

        $this->db->where('nik', $nik);
        $this->db->update('user', $data);

        $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
        <strong>Data User telah diubah!</strong></div>');
        redirect('master/user');
    }

    public function deleteDataPeserta($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user');
    }

    public function insertDataUser($data)
    {
        $this->db->insert('user', $data);
    }

    public function getTotalBarang()
    {
        $this->db->select('*');
        $this->db->from('barang');
        $query = $this->db->get();
        return $query;
    }
}
