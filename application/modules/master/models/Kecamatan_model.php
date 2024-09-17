<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kecamatan_model extends CI_Model
{
    public function getDataUser($email)
    {
        $this->db->select('user.*');
        $this->db->from('user');
        $this->db->where('email', $email);

        $result = $this->db->get();
        return $result;
    }

    public function insertDataKecamatan($data)
    {
        $this->db->insert('kecamatan', $data);
    }

    public function getDataKecamatan()
    {
        $this->db->select('*');
        $this->db->from('kecamatan');
        $this->db->join('kota', 'kota.kode=kecamatan.kode_kota');
        $this->db->join('user', 'user.id=kecamatan.kode_admin');

        $result = $this->db->get();
        return $result;
    }

    public function deleteDataKecamatan($kode)
    {
        $this->db->where('kode', $kode);
        $this->db->delete('kecamatan');
    }

    public function getDataKota()
    {
        $this->db->select('*');
        $this->db->from('kota');

        $result = $this->db->get();
        return $result;
    }

    public function getDataAdmin($role_id)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('role_id', $role_id);

        $result = $this->db->get();
        return $result;
    }
}