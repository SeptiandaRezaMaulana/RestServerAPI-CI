<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penyewa extends CI_Controller
{
    var $API = "";

    public function __construct()
    {
        parent::__construct();
        $this->API = "http://localhost/pesanHotel/server/api";
    }

    public function index()
    {
        $data['title'] = 'Tenant Name';
        $result =  $this->curl->simple_get($this->API . '/penyewa');
        $data['penyewa'] = json_decode($result, true);
        if ($this->session->userdata('level') == "admin") {
            $this->load->view('user/admin/header', $data);
            $this->load->view('penyewa/index', $data);
            $this->load->view('user/footer');
        } elseif ($this->session->userdata('level') == "user") {
            if ($this->session->userdata('jabatan') == "petugas") {
                redirect('user/index');
            } else {
                $this->load->view('user/header', $data);
                $this->load->view('penyewa/index', $data);
                $this->load->view('user/footer');
            }
        } else {
            redirect('auth');
        }
    }

    public function tambah()
    {
        if ($this->session->userdata('level') == "admin") {
            if (isset($_POST['submit'])) {
                $data = array(
                    'nama_penyewa'      =>  $this->input->post('nama_penyewa'),
                    'no_hp'             =>  $this->input->post('no_hp'),
                    'jenis_kelamin'     =>  $this->input->post('jenis_kelamin')
                );
                $insert =  $this->curl->simple_post($this->API . '/penyewa', $data, array(CURLOPT_BUFFERSIZE => 10));
                if ($insert) {
                    $this->session->set_flashdata('result', 'Added data successfully!!');
                } else {
                    $this->session->set_flashdata('result', 'Add data failed!!');
                }
                redirect('penyewa');
            } else {
                $data['title'] = "Added Tenant Data";
                $this->load->view('user/header', $data);
                $this->load->view('penyewa/tambah');
            }
        } elseif ($this->session->userdata('level') == "user") {
            if ($this->session->userdata('jabatan') == "petugas") {
                redirect('user/index');
            } else {
                if (isset($_POST['submit'])) {
                    $data = array(
                        'nama_penyewa'      =>  $this->input->post('nama_penyewa'),
                        'no_hp'             =>  $this->input->post('no_hp'),
                        'jenis_kelamin'     =>  $this->input->post('jenis_kelamin')
                    );
                    $insert =  $this->curl->simple_post($this->API . '/penyewa', $data, array(CURLOPT_BUFFERSIZE => 10));
                    if ($insert) {
                        $this->session->set_flashdata('result', 'Added data successfully');
                    } else {
                        $this->session->set_flashdata('result', 'Add data failed!!');
                    }
                    redirect('penyewa');
                } else {
                    $data['title'] = "Added Tenant Data";
                    $this->load->view('user/header', $data);
                    $this->load->view('penyewa/tambah');
                }
            }
        } else {
            redirect('auth');
        }
    }

    public function edit($id)
    {
        if ($this->session->userdata('level') == "admin") {
            if (isset($_POST['submit'])) {
                $data = array(
                    'id_penyewa'        =>  $this->input->post('id_penyewa'),
                    'nama_penyewa'      =>  $this->input->post('nama_penyewa'),
                    'no_hp'             =>  $this->input->post('no_hp'),
                    'jenis_kelamin'     =>  $this->input->post('jenis_kelamin')
                );
                $update =  $this->curl->simple_put($this->API . '/penyewa', $data, array(CURLOPT_BUFFERSIZE => 10));
                if ($update) {
                    $this->session->set_flashdata('result', 'Added data successfully');
                } else {
                    $this->session->set_flashdata('result', 'Add data failed!!');
                }
                redirect('penyewa');
            } else {
                $data['penyewa'] = json_decode($this->curl->simple_get($this->API . '/penyewa?id_penyewa=' . $id));
                $data['title'] = "Form Edit Tenant";
                $this->load->view('user/header', $data);
                $this->load->view('penyewa/edit', $data);
            }
        } elseif ($this->session->userdata('level') == "user") {
            if ($this->session->userdata('jabatan') == "petugas") {
                redirect('user/index');
            } else {
                if (isset($_POST['submit'])) {
                    $data = array(
                        'id_penyewa'        =>  $this->input->post('id_penyewa'),
                        'nama_penyewa'      =>  $this->input->post('nama_penyewa'),
                        'no_hp'             =>  $this->input->post('no_hp'),
                        'jenis_kelamin'     =>  $this->input->post('jenis_kelamin')
                    );
                    $update =  $this->curl->simple_put($this->API . '/penyewa', $data, array(CURLOPT_BUFFERSIZE => 10));
                    if ($update) {
                        $this->session->set_flashdata('result', 'Added data successfully!!');
                    } else {
                        $this->session->set_flashdata('result', 'Add data failed!!');
                    }
                    redirect('penyewa');
                } else {
                    $data['penyewa'] = json_decode($this->curl->simple_get($this->API . '/penyewa?id_penyewa=' . $id));
                    $data['title'] = "Form Edit Tenant";
                    $this->load->view('user/header', $data);
                    $this->load->view('penyewa/edit', $data);
                }
            }
        } else {
            redirect('auth');
        }
    }

    public function hapus($id)
    {
        if ($this->session->userdata('level') == "admin") {
            if (empty($id)) {
                redirect('penyewa');
            } else {
                $delete =  $this->curl->simple_delete($this->API . '/penyewa?id_penyewa=', array('id_penyewa' => $id), array(CURLOPT_BUFFERSIZE => 10));
                if ($delete) {
                    $this->session->set_flashdata('result', 'Failed to delete data!!');
                } else {
                    $this->session->set_flashdata('result', 'Successfully deleted data!!');
                }
                redirect('penyewa');
            }
        } elseif ($this->session->userdata('level') == "user") {
            if ($this->session->userdata('jabatan') == "petugas") {
                redirect('user/index');
            } else {
                if (empty($id)) {
                    redirect('penyewa');
                } else {
                    $delete =  $this->curl->simple_delete($this->API . '/penyewa?id_penyewa=', array('id_penyewa' => $id), array(CURLOPT_BUFFERSIZE => 10));
                    if ($delete) {
                        $this->session->set_flashdata('result', 'Failed to delete data!!');
                    } else {
                        $this->session->set_flashdata('result', 'Successfully deleted data!!');
                    }
                    redirect('penyewa');
                }
            }
        } else {
            redirect('auth');
        }
    }
}
