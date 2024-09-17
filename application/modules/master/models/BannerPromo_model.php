<?php
defined('BASEPATH') or exit('No direct script access allowed');

class BannerPromo_model extends CI_Model
{
    public function getDataUser($email)
    {
        $this->db->select('user.*');
        $this->db->from('user');
        $this->db->where('email', $email);

        $result = $this->db->get();
        return $result;
    }

    public function getDataBannerPromo()
    {
        $this->db->select('banner_promo.*');
        $this->db->from('banner_promo');

        $result = $this->db->get();
        return $result;
    }

    public function insertDataBannerPromo($data)
    {
        $this->db->insert('banner_promo', $data);
    }
}
