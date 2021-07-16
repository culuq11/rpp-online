<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('User_model', 'user');
        $this->load->model('Rpp_model', 'rpp');
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['sekolah'] = $this->db->get_where('tb_datsek')->row_array();
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['tugas_guru'] = $this->rpp->get_tugasGuru('tb_tugas_guru', $data['user']['id_user']);
        $data['hasil_cetak'] = $this->user->getAll_cetak('tb_rpp_cetak', $data['user']['id_user']);


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }

    public function editprofile()
    {
        $data['title'] = 'Edit Profile';
        $data['sekolah'] = $this->db->get_where('tb_datsek')->row_array();
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|trim');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required|trim');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required|trim');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/editprofile', $data);
            $this->load->view('templates/footer');
        } else {
            $this->user->m_editprofile();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Profile anda berhasil diubah</div>');
            redirect('user');
        }
    }

    public function ubahPassword()
    {
        $data['title'] = 'Ubah Password';
        $data['sekolah'] = $this->db->get_where('tb_datsek')->row_array();
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('current_password', 'Password Aktif', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'Password Baru', 'required|trim|min_length[5]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Konfirmasi Password Baru', 'required|trim|min_length[5]|matches[new_password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/ubahpassword', $data);
            $this->load->view('templates/footer');
        } else {
            $this->user->m_ubahpassword();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password Berhasil Diubah!</div>');
            redirect('user/ubahpassword');
        }
    }
}
