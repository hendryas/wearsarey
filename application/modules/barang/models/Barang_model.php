<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang_model extends CI_Model
{
  public function getDataProduct()
  {
    $this->db->select('a.*');
    $this->db->from('barang a');

    $result = $this->db->get();
    return $result;
  }

  public function getDataProductDetail($id)
  {
    $this->db->select('barang.*');
    $this->db->where('barang.id_barang', $id);
    $this->db->from('barang');

    $query = $this->db->get();
    return $query;
  }

  public function getDataGambarProduct($id)
  {
    $this->db->select('a.*');
    $this->db->where('a.id_barang', $id);
    $this->db->from('gambar_barang a');

    $query = $this->db->get();
    return $query;
  }
}
