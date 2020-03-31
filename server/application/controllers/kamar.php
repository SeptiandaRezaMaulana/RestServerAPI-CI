<?php
defined('BASEPATH') or exit('No direct script access allowed');

class kamar extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('kamar_model');
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
        $data = array(
            'title' => 'List Room',
            'kamar' =>  $this->kamar_model->datatabels()
        );
        if ($this->input->post('keyword')) {
            #code..
            $data['kamar'] = $this->kamar_model->cariDataKamar();
        }
        $status_login = $this->session->userdata('level');
        if ($status_login == 'admin') {
            $this->load->view('admin/template/header', $data);
            $this->load->view('kamar/index', $data);
            $this->load->view('template/footer');
        } elseif ($status_login == 'user') {
            $this->load->view('user/header', $data);
            $this->load->view('kamar/index', $data);
            $this->load->view('template/footer');
        } else {
            redirect('auth', 'refresh');
        }
    }

    public function tambah()
    {
        $status_login = $this->session->userdata('level');
        if ($status_login == 'user') {
            redirect('kamar', 'refresh');
        } elseif ($status_login == 'admin' || $status_login == 'user') {
            $data['title'] = 'Form Add Room Data';
            $this->load->library('form_validation');
            $this->form_validation->set_rules('nama_kamar', 'Nama_kamar', 'trim|required');
            $this->form_validation->set_rules('jenis_kamar', 'Jenis_kamar', 'trim|required');
            $this->form_validation->set_rules('harga', 'Harga', 'trim|required');

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('template/header', $data);
                $this->load->view('kamar/tambah', $data);
                $this->load->view('template/footer');
            } else {
                $this->kamar_model->tambahDataKamar();
                $this->session->set_flashdata('flash-data', 'Added');
                redirect('kamar', 'refresh');
            }
        } else {
            redirect('auth', 'refresh');
        }
    }

    public function hapus($id)
    {
        $status_login = $this->session->userdata('level');
        if ($status_login == 'user') {
            redirect('kamar', 'refresh');
        } elseif ($status_login == 'admin' || $status_login == 'user') {
            $this->kamar_model->hapusDataKamar($id);
            $this->session->flashdata('flash-data-hapus', 'Deleted');
            redirect('kamar', 'refresh');
        } else {
            redirect('auth', 'refresh');
        }
    }

    public function detail($id)
    {
        $data['title'] = 'Room Detail';
        $data['kamar'] = $this->kamar_model->getKamarById($id);
        $this->load->view('template/header', $data);
        $this->load->view('kamar/detail', $data);
        $this->load->view('template/footer');
    }

    public function edit($id)
    {
        $status_login = $this->session->userdata('level');
        if ($status_login == 'user') {
            redirect('kamar', 'refresh');
        } elseif ($status_login == 'admin' || $status_login == 'user') {
            $data['title'] = 'Form Edit Room';
            $data['kamar'] = $this->kamar_model->getKamarById($id);
            $this->load->library('form_validation');
            $this->form_validation->set_rules('nama_kamar', 'Nama_kamar', 'trim|required');
            $this->form_validation->set_rules('jenis_kamar', 'Jenis_kamar', 'trim|required');
            $this->form_validation->set_rules('harga', 'Harga', 'trim|required');

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('template/header', $data);
                $this->load->view('kamar/edit', $data);
                $this->load->view('template/footer');
            } else {
                $this->kamar_model->ubahDataKamar();
                $this->session->set_flashdata('flash-data', 'Edited');
                redirect('kamar', 'refresh');
            }
        } else {
            redirect('auth', 'refresh');
        }
    }
    public function laporan_pdf() {
        $data['title'] = 'Report Room';
        $data['kamar'] = $this->cetak_model->viewKamar();
        $this->load->library('pdf');

        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "laporan_kamar.pdf";
        $this->pdf->load_view('kamar/laporan', $data);
    }
    private function _uploadImage() {
        $config['upload_path']      = './upload/product';
        $config['allowed_types']    = 'gif|jpg|jpeg|png';
        $config['file_name']        = $this->product_id;
        $config['overwrite']        = true;
        $config['max_size']         = 1024;
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if($this->upload->do_upload('image')) {
            return $this->upload->data("file_name");
        }
        return "default.jpg";
    }
}