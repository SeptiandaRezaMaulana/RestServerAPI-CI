<?php
defined('BASEPATH') or exit('No direct script access allowed');

class penyewa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('penyewa_model');
        $this->load->model('cetak_model');

        if ($this->session->userdata('level') == "user" and $this->session->userdata('status') == "Tidak Aktif") {
            $this->session->sess_destroy();
            $data['pesan'] = "Sorry You Are Not Active, Please Contact Admin!!";
            $data['title'] = 'Login User';
            $this->load->view('auth/template/header', $data);
            $this->load->view('auth/login', $data);
        } elseif ($this->session->userdata('level') == "user") {
            redirect('user', 'refresh');
        } elseif ($this->session->userdata('level') != "admin" and $this->session->userdata('level') != "user") {
            redirect('auth', 'refresh');
        }
    }


    public function index()
    {
        $data['title'] = 'List Tenant';
        $data['penyewa'] = $this->penyewa_model->datatabels();
        if ($this->input->post('keyword')) {
            #code..
            $data['penyewa'] = $this->penyewa_model->cariDataPenyewa();
        }
        $status_login = $this->session->userdata('level');
        if ($status_login == 'admin') {
            $this->load->view('admin/template/header', $data);
            $this->load->view('penyewa/index', $data);
            $this->load->view('template/footer');
        } elseif ($status_login == 'user') {
            $this->load->view('template/header', $data);
            $this->load->view('penyewa/index', $data);
            $this->load->view('template/footer');
        } elseif ($status_login == 'user') {
            redirect('user', 'refresh');
        } else {
            redirect('auth', 'refresh');
        }
    }

    public function tambah()
    {
        $status_login = $this->session->userdata('level');
        if ($status_login == 'user') {
            redirect('transaksi', 'refresh');
        } elseif ($status_login == 'admin' || $status_login == 'user') {
            $data['title'] = 'Form Added Tenant Data';
            $this->load->library('form_validation');

            $this->form_validation->set_rules('nama_penyewa', 'Nama_Penyewa', 'trim|required');
            $this->form_validation->set_rules('no_hp', 'Nim', 'trim|required');
            $this->form_validation->set_rules('no_hp', 'No_hp', 'trim|required');
            $this->form_validation->set_rules('jenis_kelamin', 'Jenis_Kelamin', 'trim|required');

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('template/header', $data);
                $this->load->view('penyewa/tambah', $data);
                $this->load->view('template/footer');
            } else {
                $this->penyewa_model->tambahDataPenyewa();
                $this->session->set_flashdata('flash-data', 'Added');
                redirect('penyewa', 'refresh');
            }
        } else {
            redirect('auth', 'refresh');
        }
    }

    public function hapusDataPenyewa($id)
    {

        $status_login = $this->session->userdata('level');
        if ($status_login == 'user') {
            redirect('transaksi', 'refresh');
        } elseif ($status_login == 'admin' || $status_login == 'user') {
            $this->penyewa_model->hapusDataPenyewa($id);
            $this->session->flashdata('flash-data-hapus', 'Deleted');
            redirect('penyewa', 'refresh');
        } else {
            redirect('auth', 'refresh');
        }
    }

    public function detail($id)
    {
        $status_login = $this->session->userdata('level');
        if ($status_login == 'user') {
            redirect('transaksi', 'refresh');
        } elseif ($status_login == 'admin' || $status_login == 'user') {
            $data['title'] = 'Tenant Detail';
            $data['penyewa'] = $this->penyewa_model->getPenyewaById($id);
            $this->load->view('template/header', $data);
            $this->load->view('penyewa/detail', $data);
            $this->load->view('template/footer');
        } else {
            redirect('auth', 'refresh');
        }
    }

    public function edit($id)
    {
        $status_login = $this->session->userdata('level');
        if ($status_login == 'user') {
            redirect('transaksi', 'refresh');
        } elseif ($status_login == 'admin' || $status_login == 'user') {
            $data['title'] = 'Form Edit Tenant';
            $data['penyewa'] = $this->penyewa_model->getPenyewaById($id);
            $this->load->library('form_validation');
            $this->form_validation->set_rules('nama_penyewa', 'Nama_Penyewa', 'trim|required');
            $this->form_validation->set_rules('no_hp', 'No_hp', 'trim|required');
            $this->form_validation->set_rules('jenis_kelamin', 'Jenis_Kelamin', 'trim|required');


            if ($this->form_validation->run() == FALSE) {
                $this->load->view('template/header', $data);
                $this->load->view('penyewa/edit', $data);
                $this->load->view('template/footer');
            } else {
                $this->penyewa_model->ubahDataPenyewa();
                $this->session->set_flashdata('flash-data', 'Edited');
                redirect('penyewa', 'refresh');
            }
        } else {
            redirect('auth', 'refresh');
        }
    }
    public function laporan_pdf() {
        $data['title'] = 'Report Tenant';
        $data['penyewa'] = $this->cetak_model->viewPenyewa();
        $this->load->library('pdf');

        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "laporan_penyewa.pdf";
        $this->pdf->load_view('penyewa/laporan', $data);
    }
}