<?php

defined('BASEPATH') or exit('No direct script access allowed');

class transaksi_model extends CI_Model
{
    public function getAllTransaksiUserKategori()
    {
        $this->db->select('*');
        $this->db->from('transaksi t');
        $this->db->join('penyewa p', 'p.id_penyewa = t.id_penyewa');
        $this->db->join('kamar k', 'k.id_kamar = t.id_kamar');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function json() {
        $this->datatables->select('*');
        $this->datatables->from('transaksi t');
        $this->datatables->join('penyewa p', 'p.id_penyewa = t.id_penyewa');
        $this->datatables->join('kamar k', 'k.id_kamar = t.id_kamar');
        return $this->datatables->generate();
    }

    public function datatabels()
    {
        $query = $this->db->query("select * from transaksi t join penyewa p on p.id_penyewa = t.id_penyewa join kamar k on k.id_kamar = t.id_kamar order by t.id_transaksi DESC");
        return $query->result();
    }

    public function getAllTransaksiUserKategoriById($id)
    {
        $query = $this->db->query("select * from transaksi t join penyewa p on p.id_penyewa = t.id_penyewa join kamar k on k.id_kamar = t.id_kamar where t.id_transaksi = $id");
        return $query->row();
    }

    public function tambahDataTransaksi()
    {
        $tgl_sewa = date('yy-m-d');
        $tgl_checkout = date('yy-m-d');
        $data = [
            "id_kamar" => $this->input->post('id_kamar', true), // ini sama dengan htmlspecialchars($_POST['nama'])
            "id_penyewa" => $this->input->post('id_penyewa', true),
            "tgl_sewa" => $tgl_sewa,
            "tgl_checkout" => $tgl_checkout,
            "status" => 'Booked'
        ];
        //$id_kamare = $this->input->post('id_kamar', true);
        $this->db->insert('transaksi', $data);
    }

    public function ubahDataTransaksi()
    {
        // $status = $this->input->post('status', true);
        // if ($status_pengembalian == "KOSONG"{
        //     $this->transaksi_model->tambahDataTransaksi($id)
        // }

        $data = [
            "tgl_checkout" => $this->input->post('tgl_checkout', true),
            "status" => $this->input->post('status', true)
        ];

        $this->db->where('id_transaksi', $this->input->post('id_transaksi', true));
        $this->db->update('transaksi', $data);
    }


    public function cariDataTransaksi()
    {
        $keyword = $this->input->post('keyword');
        $this->db->distinct();
        $this->db->select('t.id_transaksi, p.nama_penyewa,k.nama_kamar,k.jenis_kamar,t.tgl_sewa,t.status');
        $this->db->from('transaksi t');
        $this->db->join('penyewa p', 'p.id_penyewa = t.id_penyewa');
        $this->db->join('kamar k', 'k.id_kamar = t.id_kamar');
        $this->db->like('p.nama_penyewa', $keyword);
        $this->db->or_like('k.nama_kamar', $keyword);
        return $this->db->get('transaksi')->result_array();
    }
}
