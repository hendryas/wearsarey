<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rekening_model extends CI_Model
{
    public function getDataUser($email)
    {
        $this->db->select('user.*');
        $this->db->from('user');
        $this->db->where('email', $email);

        $result = $this->db->get();
        return $result;
    }

    public function getDataRekenings()
    {
        $this->db->select('rekening.*');
        $this->db->select('bank.nama_bank');
        $this->db->from('rekening');
        $this->db->join('bank', 'bank.kode = rekening.kode_bank');

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

    public function insertDataRekening($data)
    {
        $this->db->insert('rekening', $data);
    }

    public function updateDataRekening($kode, $data)
    {
        $this->db->where('kode', $kode);
        $this->db->update('rekening', $data);
    }

    public function deleteDataRekening($kode)
    {
        $this->db->where('kode', $kode);
        $this->db->delete('rekening');
    }
}
