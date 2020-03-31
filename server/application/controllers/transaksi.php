<?php
defined('BASEPATH') or exit('No direct script access allowed');

class transaksi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('transaksi_model');
        $this->load->model('kamar_model');
        $this->load->model('penyewa_model');
        $this->load->model('cetak_model');

        if ($this->session->userdata('level') == "user" and $this->session->userdata('status') == "Tidak Aktif") {
            $this->session->sess_destroy();
            $data['pesan'] = "Sorry You Are Not Active, Please Contact Admin!!";
            $data['title'] = 'Login User';
            $this->load->view('auth/template/header', $data);
            $this->load->view('auth/login', $data);
        } elseif ($this->session->userdata('level') != "user" and $this->session->userdata('level') != "admin") {
            redirect('auth', 'refresh');
        }
    }

    public function index()
    {
        $data['title'] = 'Transaction List Hotel AZA(AL&REZ)';
        //$data['transaksi'] = $this->transaksi_model->getAllTransaksiUserKategori();
        $data['transaksi'] = $this->transaksi_model->datatabels();
        if ($this->input->post('keyword')) {
            #code..
            $data['transaksi'] = $this->transaksi_model->cariDataTransaksi();
        }
        $status_login = $this->session->userdata('level');
        if ($status_login == 'admin') {
            $this->load->view('admin/template/header', $data);
            $this->load->view('transaksi/index', $data);
            $this->load->view('template/footer');
        } elseif ($status_login == 'user') {
            $this->load->view('user/header', $data);
            $this->load->view('transaksi/index', $data);
            $this->load->view('template/footer');
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
            $data['title'] = 'Form Add Transaction Data';
            $this->load->library('form_validation');
            $data['kamar'] = $this->kamar_model->getAllKamar();
            $data['penyewa'] = $this->penyewa_model->getAllPenyewa();
            $this->form_validation->set_rules('id_kamar', 'Id_kamar', 'required');
            $this->form_validation->set_rules('id_penyewa', 'Id_penyewa', 'required');

            if ($this->form_validation->run() == FALSE) {
                #code...
                $this->load->view('template/header', $data);
                $this->load->view('transaksi/tambah', $data);
                $this->load->view('template/footer');
            } else {
                #code...
                $this->transaksi_model->tambahdatatransaksi();
                $this->session->set_flashdata('flash-data', 'Added');
                redirect('transaksi', 'refresh');
            }
        } else {
            redirect('auth', 'refresh');
        }
    }

    public function detail($id)
    {
        $status_login = $this->session->userdata('level');
        if ($status_login == 'user') {
            $data['title'] = 'Detail Booking';
            $data['transaksi'] = $this->transaksi_model->getAllTransaksiUserKategoriById($id);
            $this->load->view('user/header', $data);
            $this->load->view('transaksi/detail', $data);
            $this->load->view('template/footer');
        } elseif ($status_login == 'admin' || $status_login == 'user') {
            $data['title'] = 'Booking Detail';
            $data['transaksi'] = $this->transaksi_model->getAllTransaksiUserKategoriById($id);
            $this->load->view('template/header', $data);
            $this->load->view('transaksi/detail', $data);
            $this->load->view('template/footer');
        }
    }

    public function edit($id)
    {
        $status_login = $this->session->userdata('level');
        if ($status_login == 'user') {
            redirect('transaksi', 'refresh');
        } elseif ($status_login == 'admin' || $status_login == 'user') {
            $data['title'] = 'Form Edit Booking';
            $data['transaksi'] = $this->transaksi_model->getAllTransaksiUserKategoriById($id);
            $this->load->library('form_validation');
            $this->form_validation->set_rules('status', 'Status', 'required');
            $this->form_validation->set_rules('tgl_checkout', 'Tgl_checkout', 'required');

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('template/header', $data);
                $this->load->view('transaksi/edit', $data);
                $this->load->view('template/footer');
            } else {
                $this->transaksi_model->ubahDataTransaksi($id);
                $this->session->set_flashdata('flash-data', 'Edited');
                redirect('transaksi', 'refresh');
            }
        } else {
            redirect('auth', 'refresh');
        }
    }
    function json() {
        header('Content-Type: application/json');
        echo $this->transaksi_model->json();
    }
    public function laporan_pdf() {
        $data['title'] = 'Report Transaction';
        $data['transaksi'] = $this->cetak_model->viewTransaksi();
        $this->load->library('pdf');

        $this->pdf->setPaper('A4', 'landscape');
        $this->pdf->filename = "laporan_transaksi.pdf";
        $this->pdf->load_view('transaksi/laporan', $data);
    }
}

/* End of file Controllername.php */