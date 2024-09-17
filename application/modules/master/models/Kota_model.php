<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kota_model extends CI_Model
{
    public function getDataUser($email)
    {
        $this->db->select('user.*');
        $this->db->from('user');
        $this->db->where('email', $email);

        $result = $this->db->get();
        return $result;
    }

    public function insertDataKota($data)
    {
        $this->db->insert('kota', $data);
    }

    public function getDataKota()
    {
        $this->db->select('*');
        $this->db->from('kota');

        $result = $this->db->get();
        return $result;
    }

    public function deleteDataKota($kode)
    {
        $this->db->where('kode', $kode);
        $this->db->delete('kota');
    }
}