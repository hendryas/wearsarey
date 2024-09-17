<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rekappembayaran_model extends CI_Model
{
  public function belum_bayar($id_user)
  {
    $this->db->select('rekap_pembayaran_pelanggan.*');
    $this->db->from('rekap_pembayaran_pelanggan');
    $this->db->where('id_user', $id_user);
    $this->db->where('status_order', 0);
    $this->db->order_by('tgl_order', 'desc');

    $query = $this->db->get();
    return $query;
  }

  public function diproses($id_user)
  {
    $this->db->select('rekap_pembayaran_pelanggan.*');
    $this->db->from('rekap_pembayaran_pelanggan');
    $this->db->where('id_user', $id_user);
    $this->db->where('status_order', 1);
    $this->db->order_by('tgl_order', 'desc');

    $query = $this->db->get();
    return $query;
  }

  public function dikirim($id_user)
  {
    $this->db->select('rekap_pembayaran_pelanggan.*');
    $this->db->from('rekap_pembayaran_pelanggan');
    $this->db->where('id_user', $id_user);
    $this->db->where('status_order', 2);
    $this->db->order_by('tgl_order', 'desc');

    $query = $this->db->get();
    return $query;
  }

  public function diterima($id_user)
  {
    $this->db->select('rekap_pembayaran_pelanggan.*');
    $this->db->from('rekap_pembayaran_pelanggan');
    $this->db->where('id_user', $id_user);
    $this->db->where('status_order', 3);
    $this->db->order_by('tgl_order', 'desc');

    $query = $this->db->get();
    return $query;
  }
}
