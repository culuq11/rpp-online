<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Menu_model', 'menu');
    }

    public function index()
    {
        $data['title'] = 'Manajemen Menu';
        $data['sekolah'] = $this->db->get_where('tb_datsek')->row_array();
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

        $data['menu'] = $this->db->get('tb_umenu')->result_array();

        $this->form_validation->set_rules('menu', 'Menu', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/admin_topbar', $data);
            $this->load->view('menu/index', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->insert('tb_umenu', ['menu' => $this->input->post('menu')]);
            $this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">Menu Baru ditambahkan!</div>');
            redirect('menu');
        }
    }

    public function editmenu($id)
    {
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['sekolah'] = $this->db->get_where('tb_datsek')->row_array();
        $data['menu'] = $this->menu->getIdmenu($id);
        $data['menu'] = $this->db->get('tb_umenu')->result_array();

        $this->form_validation->set_rules('menu', 'Menu', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/admin_topbar', $data);
            $this->load->view('menu/index', $data);
            $this->load->view('templates/footer');
        } else {
            $this->menu->m_editmenu();
            $this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">Menu Telah Diubah!</div>');
            redirect('menu');
        }
    }

    public function hapusmenu($id)
    {
        $this->menu->m_hapusmenu($id);
        $this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">Menu berhasil dihapus!</div>');
        redirect('menu');
    }

    public function submenu()
    {
        $data['title'] = 'Manajemen Submenu';
        $data['sekolah'] = $this->db->get_where('tb_datsek')->row_array();
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

        $data['subMenu'] = $this->menu->getSubMenu();
        $data['menu'] = $this->db->get('tb_umenu')->result_array();

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required');
        $this->form_validation->set_rules('icon', 'icon', 'required');

        if ($this->form_validation->run() ==  false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/admin_topbar', $data);
            $this->load->view('menu/submenu', $data);
            $this->load->view('templates/footer');
        } else {
            $this->menu->m_insertSubmenu();
            $this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">Submenu Baru ditambahkan!</div>');
            redirect('menu/submenu');
        }
    }

    public function editSubmenu($id)
    {
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['sekolah'] = $this->db->get_where('tb_datsek')->row_array();
        $data['menu'] = $this->menu->getIdSubmenu($id);
        $data['subMenu'] = $this->menu->getSubMenu();
        $data['menu'] = $this->db->get('tb_umenu')->result_array();

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required');
        $this->form_validation->set_rules('icon', 'icon', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/admin_topbar', $data);
            $this->load->view('menu/submenu', $data);
            $this->load->view('templates/footer');
        } else {
            $this->menu->m_editSubmenu();
            $this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">Menu Telah Diubah!</div>');
            redirect('menu/submenu');
        }
    }

    public function hapusSubmenu($id)
    {
        $this->menu->m_hapusSubmenu($id);
        $this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">Menu berhasil dihapus!</div>');
        redirect('menu/submenu');
    }

    public function role()
    {
        $data['title'] = 'Role';
        $data['sekolah'] = $this->db->get_where('tb_datsek')->row_array();
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get('tb_user_role')->result_array();

        $this->form_validation->set_rules('role', 'Role', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/admin_topbar', $data);
            $this->load->view('menu/role', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->insert('tb_user_role', ['role' => $this->input->post('role')]);
            $this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">Menu Telah Ditambahkan.!</div>');
            redirect('menu/role');
        }
    }

    public function editrole($id)
    {
        $data['title'] = 'Role';
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['sekolah'] = $this->db->get_where('tb_datsek')->row_array();
        $data['role'] = $this->menu->getIdrole($id);

        $data['role'] = $this->db->get('tb_user_role')->result_array();

        $this->form_validation->set_rules('role', 'Role', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/admin_topbar', $data);
            $this->load->view('menu/role', $data);
            $this->load->view('templates/footer');
        } else {
            $this->menu->m_editrole();
            $this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">Menu Telah Diubah.!</div>');
            redirect('menu/role');
        }
    }

    public function hapusrole($id)
    {
        $this->menu->m_hapusrole($id);
        $this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">Menu berhasil dihapus!</div>');
        redirect('menu/role');
    }


    public function roleAccess($role_id)
    {
        $data['title'] = 'Role Access';
        $data['sekolah'] = $this->db->get_where('tb_datsek')->row_array();
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get_where('tb_user_role', ['id' => $role_id])->row_array();

        $this->db->where('id !=', 1);
        $data['menu'] = $this->db->get('tb_umenu')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/admin_topbar', $data);
        $this->load->view('menu/roleaccess', $data);
        $this->load->view('templates/footer');
    }


    public function changeAccess()
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];

        $result = $this->db->get_where('tb_uacc_menu', $data);

        if ($result->num_rows() < 1) {
            $this->db->insert('tb_uacc_menu', $data);
        } else {
            $this->db->delete('tb_uacc_menu', $data);
        }

        $this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">Akses Berhasil diubah!</div>');
    }
}
