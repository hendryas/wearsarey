<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bank_model extends CI_Model
{
    public function getDataUser($email)
    {
        $this->db->select('user.*');
        $this->db->from('user');
        $this->db->where('email', $email);

        $result = $this->db->get();
        return $result;
    }

    public function getDataBanks()
    {
        $this->db->select('bank.*');
        $this->db->from('bank');

        $result = $this->db->get();
        return $result;
    }

    public function insertDataBank($data)
    {
        $this->db->insert('bank', $data);
    }

    public function updateDataBank($kode, $data)
    {
        $this->db->where('kode', $kode);
        $this->db->update('bank', $data);
    }

    public function deleteDataBank($kode)
    {
        $this->db->where('kode', $kode);
        $this->db->delete('bank');
    }
}
