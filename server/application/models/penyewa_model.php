<?php

defined('BASEPATH') or exit('No direct script access allowed');

class penyewa_model extends CI_Model
{

    public function getAllPenyewa()
    {
        $query = $this->db->get('penyewa');
        return $query->result_array();
    }

    public function datatabels() {
        $query = $this->db->order_by('id_penyewa', 'DESC')->get('penyewa');
        return $query->result();
    }
    
    public function tambahDataPenyewa()
    {
        $data = [
            "nama_penyewa" => $this->input->post('nama_penyewa', true), // ini sama dengan htmlspecialchars($_POST['nama'])
            "no_hp" => $this->input->post('no_hp', true),
            "jenis_kelamin" => $this->input->post('jenis_kelamin', true)
        ];

        $this->db->insert('penyewa', $data);
    }

    public function hapusDataPenyewa($id)
    {
        $this->db->where('id_penyewa', $id);
        $this->db->delete('penyewa');
    }

    public function getPenyewaById($id)
    {
        return $this->db->get_where('penyewa', ['id_penyewa' => $id])->row();
    }

    public function ubahDataPenyewa()
    {
        $data = [
            "nama_penyewa" => $this->input->post('nama_penyewa', true), 
            "no_hp" => $this->input->post('no_hp', true),
            "jenis_kelamin" => $this->input->post('jenis_kelamin', true)
        ];

        $this->db->where('id_penyewa', $this->input->post('id_penyewa', true));
        $this->db->update('penyewa', $data);
    }

    public function cariDataPenyewa()
    {
        $keyword = $this->input->post('keyword');
        $this->db->like('nama_penyewa', $keyword);
        $this->db->or_like('jenis_kelamin', $keyword);
        return $this->db->get('penyewa')->result_array();
    }
}
