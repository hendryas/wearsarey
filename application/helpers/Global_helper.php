<?php
function dateSQL($date)
{
    $ci = get_instance();
    if ($date != '') {
        $dateSQL    = substr($date, 6, 4) . "-" . substr($date, 3, 2) . "-" . substr($date, 0, 2);
        return $dateSQL;
    } else {
        $dateSQL    = "";
        return $dateSQL;
    }
}

function get_provinsi_nama($id)
{
    $ci = &get_instance();
    $ci->db->select('name');
    $ci->db->from('provinces');
    $ci->db->where('id', $id);
    return $ci->db->get();
}

function get_kota_nama($id)
{
    $ci = &get_instance();
    $ci->db->select('name');
    $ci->db->from('regencies');
    $ci->db->where('id', $id);
    return $ci->db->get();
}

function get_kecamatan_nama($id)
{
    $ci = &get_instance();
    $ci->db->select('name');
    $ci->db->from('districts');
    $ci->db->where('id', $id);
    return $ci->db->get();
}

function get_kelurahan_nama($id)
{
    $ci = &get_instance();
    $ci->db->select('name');
    $ci->db->from('villages');
    $ci->db->where('id', $id);
    return $ci->db->get();
}

function get_provinsi_instansi_nama($id)
{
    $ci = &get_instance();
    $ci->db->select('name');
    $ci->db->from('provinces');
    $ci->db->where('id', $id);
    return $ci->db->get();
}

function get_kota_instansi_nama($id)
{
    $ci = &get_instance();
    $ci->db->select('name');
    $ci->db->from('regencies');
    $ci->db->where('id', $id);
    return $ci->db->get();
}

function get_kecamatan_instansi_nama($id)
{
    $ci = &get_instance();
    $ci->db->select('name');
    $ci->db->from('districts');
    $ci->db->where('id', $id);
    return $ci->db->get();
}

function get_kelurahan_instansi_nama($id)
{
    $ci = &get_instance();
    $ci->db->select('name');
    $ci->db->from('villages');
    $ci->db->where('id', $id);
    return $ci->db->get();
}

function get_golongan_nama($id)
{
    $ci = &get_instance();
    $ci->db->select('gol_nama');
    $ci->db->from('m_golangka');
    $ci->db->where('gol_id', $id);
    return $ci->db->get();
}

function get_golongan_pangkat($id)
{
    $ci = &get_instance();
    $ci->db->select('gol_pangkat');
    $ci->db->from('m_golangka');
    $ci->db->where('gol_id', $id);
    return $ci->db->get();
}

function get_pendidikan_jurusan_nama($id)
{
    $ci = &get_instance();
    $ci->db->select('pend_jurusan_nama');
    $ci->db->from('m_pendidikan_jurusan');
    $ci->db->where('pend_jurusan_id', $id);
    return $ci->db->get();
}

function get_lembaga_pendidikan_nama($id)
{
    $ci = &get_instance();
    $ci->db->select('lembaga_pendidikan_nama');
    $ci->db->from('m_lembaga_pendidikan');
    $ci->db->where('lembaga_pendidikan_id', $id);
    return $ci->db->get();
}

function get_absensi_by_id($id)
{
    $ci = &get_instance();
    $ci->db->select('*');
    $ci->db->from('progress_absensi_pelatihan');
    $ci->db->where('id_absensi_pelatihan', $id);
    return $ci->db->get();
}

function get_upload_tugas_by_id($id)
{
    $ci = &get_instance();
    $ci->db->select('*');
    $ci->db->from('progress_tugas_pelatihan');
    $ci->db->where('id_tugas_pelatihan', $id);
    return $ci->db->get();
}
function number_roman($number)
{
    $map = array('M' => 1000, 'CM' => 900, 'D' => 500, 'CD' => 400, 'C' => 100, 'XC' => 90, 'L' => 50, 'XL' => 40, 'X' => 10, 'IX' => 9, 'V' => 5, 'IV' => 4, 'I' => 1);
    $returnValue = '';
    while ($number > 0) {
        foreach ($map as $roman => $int) {
            if ($number >= $int) {
                $number -= $int;
                $returnValue .= $roman;
                break;
            }
        }
    }
    return $returnValue;
}
if (!function_exists('tgl_indo')) {
    function date_indo($tgl)
    {
        $ubah = gmdate($tgl, time() + 60 * 60 * 8);
        $pecah = explode("-", $ubah);
        $tanggal = $pecah[2];
        $bulan = bulan($pecah[1]);
        $tahun = $pecah[0];
        return $tanggal . ' ' . $bulan . ' ' . $tahun;
    }
}

if (!function_exists('bulan')) {
    function bulan($bln)
    {
        switch ($bln) {
            case 1:
                return "Januari";
                break;
            case 2:
                return "Februari";
                break;
            case 3:
                return "Maret";
                break;
            case 4:
                return "April";
                break;
            case 5:
                return "Mei";
                break;
            case 6:
                return "Juni";
                break;
            case 7:
                return "Juli";
                break;
            case 8:
                return "Agustus";
                break;
            case 9:
                return "September";
                break;
            case 10:
                return "Oktober";
                break;
            case 11:
                return "November";
                break;
            case 12:
                return "Desember";
                break;
        }
    }
}

//Format Shortdate
if (!function_exists('shortdate_indo')) {
    function shortdate_indo($tgl)
    {
        $ubah = gmdate($tgl, time() + 60 * 60 * 8);
        $pecah = explode("-", $ubah);
        $tanggal = $pecah[2];
        $bulan = short_bulan($pecah[1]);
        $tahun = $pecah[0];
        return $tanggal . '/' . $bulan . '/' . $tahun;
    }
}

if (!function_exists('short_bulan')) {
    function short_bulan($bln)
    {
        switch ($bln) {
            case 1:
                return "01";
                break;
            case 2:
                return "02";
                break;
            case 3:
                return "03";
                break;
            case 4:
                return "04";
                break;
            case 5:
                return "05";
                break;
            case 6:
                return "06";
                break;
            case 7:
                return "07";
                break;
            case 8:
                return "08";
                break;
            case 9:
                return "09";
                break;
            case 10:
                return "10";
                break;
            case 11:
                return "11";
                break;
            case 12:
                return "12";
                break;
        }
    }
}

//Format Medium date
if (!function_exists('mediumdate_indo')) {
    function mediumdate_indo($tgl)
    {
        $ubah = gmdate($tgl, time() + 60 * 60 * 8);
        $pecah = explode("-", $ubah);
        $tanggal = $pecah[2];
        $bulan = medium_bulan($pecah[1]);
        $tahun = $pecah[0];
        return $tanggal . '-' . $bulan . '-' . $tahun;
    }
}

if (!function_exists('medium_bulan')) {
    function medium_bulan($bln)
    {
        switch ($bln) {
            case 1:
                return "Jan";
                break;
            case 2:
                return "Feb";
                break;
            case 3:
                return "Mar";
                break;
            case 4:
                return "Apr";
                break;
            case 5:
                return "Mei";
                break;
            case 6:
                return "Jun";
                break;
            case 7:
                return "Jul";
                break;
            case 8:
                return "Ags";
                break;
            case 9:
                return "Sep";
                break;
            case 10:
                return "Okt";
                break;
            case 11:
                return "Nov";
                break;
            case 12:
                return "Des";
                break;
        }
    }
}

//Long date indo Format
if (!function_exists('longdate_indo')) {
    function longdate_indo($tanggal)
    {
        $ubah = gmdate($tanggal, time() + 60 * 60 * 8);
        $pecah = explode("-", $ubah);
        $tgl = $pecah[2];
        $bln = $pecah[1];
        $thn = $pecah[0];
        $bulan = bulan($pecah[1]);

        $nama = date("l", mktime(0, 0, 0, $bln, $tgl, $thn));
        $nama_hari = "";
        if ($nama == "Sunday") {
            $nama_hari = "Minggu";
        } else if ($nama == "Monday") {
            $nama_hari = "Senin";
        } else if ($nama == "Tuesday") {
            $nama_hari = "Selasa";
        } else if ($nama == "Wednesday") {
            $nama_hari = "Rabu";
        } else if ($nama == "Thursday") {
            $nama_hari = "Kamis";
        } else if ($nama == "Friday") {
            $nama_hari = "Jumat";
        } else if ($nama == "Saturday") {
            $nama_hari = "Sabtu";
        }
        return $tgl . ' ' . $bulan . ' ' . $thn;
    }
}
