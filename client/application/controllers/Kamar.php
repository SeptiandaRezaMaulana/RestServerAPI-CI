<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kamar extends CI_Controller
{
    var $API = "";

    public function __construct()
    {
        parent::__construct();
        $this->API = "http://localhost/pesanHotel/server/api";
    }

    public function index()
    {
        $data['title'] = 'List Room';
        $result =  $this->curl->simple_get($this->API . '/kamar');
        $data['kamar'] = json_decode($result, true);
        if ($this->session->userdata('level') == "admin") {
            $this->load->view('user/admin/header', $data);
            $this->load->view('kamar/index', $data);
            $this->load->view('user/footer');
        } elseif ($this->session->userdata('level') == "user") {
            if ($this->session->userdata('jabatan') == "petugas") {
                $this->load->view('user/petugas/header', $data);
                $this->load->view('kamar/index', $data);
                $this->load->view('user/footer');
            } else {
                $this->load->view('user/header', $data);
                $this->load->view('kamar/index', $data);
                $this->load->view('user/footer');
            }
        } else {
            redirect('auth');
        }
    }
}
