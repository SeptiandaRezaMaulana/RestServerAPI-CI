<?php

defined('BASEPATH') or exit('No direct script access allowed');

class cetak_model extends CI_Model
{
    public function viewPenyewa()
    {
        $this->db->select('nama_penyewa, no_hp, jenis_kelamin');
        $query = $this->db->get('penyewa');
        return $query->result();
    }
    public function viewKamar()
    {
        $this->db->select('*');
        $query = $this->db->get('kamar');
        return $query->result();
    }

    public function viewTransaksi()
    {
        $query = $this->db->query("select * from transaksi t join penyewa p on p.id_penyewa = t.id_penyewa join kamar k on k.id_kamar = t.id_kamar");
        return $query->result();
    }

    public function viewUser()
    {
        $this->db->select('*');
        $query = $this->db->get('user');
        return $query->result();
    }
}
