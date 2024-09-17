<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Voucher_model extends CI_Model
{
    public function getDataUser($email)
    {
        $this->db->select('user.*');
        $this->db->from('user');
        $this->db->where('email', $email);

        $result = $this->db->get();
        return $result;
    }

    public function getDataVouchers()
    {
        $this->db->select('voucher.*');
        $this->db->from('voucher');

        $result = $this->db->get();
        return $result;
    }

    public function insertDataVoucher($data)
    {
        $this->db->insert('voucher', $data);
    }

    public function updateDataVoucher($id_voucher, $data)
    {
        $this->db->where('id', $id_voucher);
        $this->db->update('voucher', $data);
    }

    public function deleteDataVoucher($id_voucher)
    {
        $this->db->where('id', $id_voucher);
        $this->db->delete('voucher');
    }
}
