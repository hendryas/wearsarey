<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Report_model extends CI_Model
{
  public function getDataReport($tanggal)
  {
    $this->db->select('rekap_pembayaran_pelanggan.*');
    $this->db->from('rekap_pembayaran_pelanggan');
    $this->db->where('tgl_order >=', $tanggal);
    $this->db->where('tgl_order <=', $tanggal);
    $this->db->order_by('tgl_order', 'desc');

    $query = $this->db->get();
    return $query;
  }
}
