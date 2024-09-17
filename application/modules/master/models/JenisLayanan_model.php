<?php
defined('BASEPATH') or exit('No direct script access allowed');

class JenisLayanan_model extends CI_Model
{
    public function getDataUser($email)
    {
        $this->db->select('user.*');
        $this->db->from('user');
        $this->db->where('email', $email);

        $result = $this->db->get();
        return $result;
    }

    public function getDataJenisLayanans()
    {
        $this->db->select('jenis_layanan.*');
        $this->db->from('jenis_layanan');

        $result = $this->db->get();
        return $result;
    }

    public function insertDataJenisLayanan($data)
    {
        $this->db->insert('jenis_layanan', $data);
    }

    public function updateDataJenisLayanan($kode, $data)
    {
        $this->db->where('kode', $kode);
        $this->db->update('jenis_layanan', $data);
    }

    public function deleteDataJenisLayanan($kode)
    {
        $this->db->where('kode', $kode);
        $this->db->delete('jenis_layanan');
    }
}
