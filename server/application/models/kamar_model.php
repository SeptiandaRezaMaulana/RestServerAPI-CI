<?php

defined('BASEPATH') or exit('No direct script access allowed');

class kamar_model extends CI_Model
{
    public function getAllKamar()
    {
        $query = $this->db->query("select * from kamar");
        return $query->result_array();
    }
    
    public function datatabels() {
        $query = $this->db->order_by('id_kamar', 'DESC')->get('kamar');
        return $query->result();
    }

    public function tambahDataKamar()
    {
        $data = [
            "nama_kamar" => $this->input->post('nama_kamar', true),
            "jenis_kamar" => $this->input->post('jenis_kamar', true),
            "harga" => $this->input->post('harga', true)
            
        ];
        $gambar = $_FILES['image'];
        if($gambar = '') {
            $config['upload_path']      = '/upload/kamar';
            $config['allowed_types']    = 'jpg|jpeg|png|gif';

            $this->load->library('upload', $config);
            if(!$this->upload->do_upload('gambar')) {
                echo "Failed!!"; die();
            }
        }else {
            $gambar = $this->upload->data('file_name');
        }

        $this->db->insert('kamar', $data);
    }

    public function hapusDataKamar($id)
    {
        $this->db->where('id_kamar', $id);
        $this->db->delete('kamar');
    }

    public function getKamarById($id)
    {
        return $this->db->get_where('kamar', ['id_kamar' => $id])->row();
    }

    public function ubahDataKamar()
    {
        $data = [
            "nama_kamar" => $this->input->post('nama_kamar', true),
            "jenis_kamar" => $this->input->post('jenis_kamar', true),
            "harga" => $this->input->post('harga', true)
        ];
        
        $this->db->where('id_kamar', $this->input->post('id_kamar', true));
        $this->db->update('kamar', $data);
    }

    public function cariDataKamar()
    {
        $keyword = $this->input->post('keyword');
        $this->db->like('nama_kamar', $keyword);
        $this->db->or_like('jenis_kamar', $keyword);
        return $this->db->get('kamar')->result_array();
    }
}
