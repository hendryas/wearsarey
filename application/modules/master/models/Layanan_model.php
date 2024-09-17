<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Layanan_model extends CI_Model
{
    public function getDataUser($email)
    {
        $this->db->select('user.*');
        $this->db->from('user');
        $this->db->where('email', $email);

        $result = $this->db->get();
        return $result;
    }

    public function getDataLayanans()
    {
        $this->db->select('layanan.*');
        $this->db->select('jenis_layanan.nama_jenis_layanan');
        $this->db->from('layanan');
        $this->db->join('jenis_layanan', 'jenis_layanan.kode = layanan.kode_jenis');

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

    public function insertDataLayanan($data)
    {
        $this->db->insert('layanan', $data);
    }

    public function updateDataLayanan($kode, $data)
    {
        $this->db->where('kode', $kode);
        $this->db->update('layanan', $data);
    }

    public function deleteDataLayanan($kode)
    {
        $this->db->where('kode', $kode);
        $this->db->delete('layanan');
    }
}
