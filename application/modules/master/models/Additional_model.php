<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Additional_model extends CI_Model
{
    public function getDataUser($email)
    {
        $this->db->select('user.*');
        $this->db->from('user');
        $this->db->where('email', $email);

        $result = $this->db->get();
        return $result;
    }

    public function getDataAdditionals()
    {
        $this->db->select('additional.*');
        $this->db->from('additional');

        $result = $this->db->get();
        return $result;
    }

    public function insertDataAdditional($data)
    {
        $this->db->insert('additional', $data);
    }

    public function updateDataAdditional($kode, $data)
    {
        $this->db->where('kode', $kode);
        $this->db->update('additional', $data);
    }

    public function deleteDataAdditional($kode)
    {
        $this->db->where('kode', $kode);
        $this->db->delete('additional');
    }
}
