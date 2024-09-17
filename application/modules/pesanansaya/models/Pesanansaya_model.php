<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pesanansaya_model extends CI_Model
{
  public function detail_pesanan($id_transaksi)
  {
    $this->db->select('rekap_pembayaran_pelanggan.*');
    $this->db->from('rekap_pembayaran_pelanggan');
    $this->db->where('id', $id_transaksi);

    $query = $this->db->get()->row_array();
    return $query;
  }
}
