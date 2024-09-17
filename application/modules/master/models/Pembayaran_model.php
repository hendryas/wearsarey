<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembayaran_model extends CI_Model
{
    public function getDataUser($email)
    {
        $this->db->select('user.*');
        $this->db->from('user');
        $this->db->where('email', $email);

        $result = $this->db->get();
        return $result;
    }

    public function getDataPembayarans()
    {
        $this->db->select('pembayaran.*');
        $this->db->from('pembayaran');

        $result = $this->db->get();
        return $result;
    }

    public function insertDataPembayaran($data)
    {
        $this->db->insert('pembayaran', $data);
    }

    public function updateDataPembayaran($id_pembayaran, $data)
    {
        $this->db->where('id', $id_pembayaran);
        $this->db->update('pembayaran', $data);
    }

    public function deleteDataPembayaran($id_pembayaran)
    {
        $this->db->where('id', $id_pembayaran);
        $this->db->delete('pembayaran');
    }
}
