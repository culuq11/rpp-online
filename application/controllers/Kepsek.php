<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kepsek extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Kepsek_model', 'kepsek');
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['sekolah'] = $this->db->get_where('tb_datsek')->row_array();
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['hasil'] = $this->kepsek->getAll_cetak();
        $data['hasil_pending'] = $this->kepsek->count_pending();
        $data['hasil_setujui'] = $this->kepsek->count_setujui();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/kepsek_topbar', $data);
        $this->load->view('kepsek/index', $data);
        $this->load->view('templates/footer');
    }

    public function approval()
    {
        $data['title'] = 'Approval Data RPP';
        $data['sekolah'] = $this->db->get_where('tb_datsek')->row_array();
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['status_approve'] = ['N', 'Y'];
        $data['hasil'] = $this->kepsek->getAll_cetak();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/kepsek_topbar', $data);
        $this->load->view('kepsek/approval', $data);
        $this->load->view('templates/footer');
    }

    public function detail_approval($id)
    {
        $data['title'] = 'Approval Data RPP';
        $data['sekolah'] = $this->db->get_where('tb_datsek')->row_array();
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['status_approve'] = ['N', 'Y'];
        $data['hasil'] = $this->kepsek->getAll_cetak();
        $data['hasilRPP'] = $this->kepsek->aprroveID($id);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/kepsek_topbar', $data);
        $this->load->view('kepsek/approval', $data);
        $this->load->view('templates/footer');
    }

    public function edit_approval($id)
    {
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['sekolah'] = $this->db->get_where('tb_datsek')->row_array();
        $data['hasilRPP'] = $this->kepsek->aprroveID($id);
        $data['status_approve'] = ['N', 'Y'];
        $data['hasil'] = $this->kepsek->getAll_cetak();

        $this->form_validation->set_rules('status', 'Status', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/kepsek_topbar', $data);
            $this->load->view('kepsek/approval', $data);
            $this->load->view('templates/footer');
        } else {
            $this->kepsek->approve_edit();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data RPP berhasil diUbah</div>');
            redirect('kepsek/approval');
        }
    }

    public function ubahPassword()
    {
        $data['title'] = 'Ubah Password';
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['sekolah'] = $this->db->get_where('tb_datsek')->row_array();

        $this->form_validation->set_rules('current_password', 'Password Aktif', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'Password Baru', 'required|trim|min_length[5]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Konfirmasi Password Baru', 'required|trim|min_length[5]|matches[new_password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/kepsek_topbar', $data);
            $this->load->view('kepsek/ubahpassword', $data);
            $this->load->view('templates/footer');
        } else {
            $this->kepsek->m_ubahpassword();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password Berhasil Diubah!</div>');
            redirect('kepsek/ubahpassword');
        }
    }
}
