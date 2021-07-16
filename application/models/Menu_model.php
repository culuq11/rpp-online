<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu_model extends CI_Model
{
    public function getSubMenu()
    {
        $query = "SELECT `tb_usub_menu`.*, `tb_umenu`.`menu`
                  FROM `tb_usub_menu` JOIN `tb_umenu`
                  ON `tb_usub_menu`.`menu_id` = `tb_umenu`.`id`
                ";
        return $this->db->query($query)->result_array();
    }

    public function getIdmenu($id)
    {
        return $this->db->get_where('tb_umenu', ['id' => $id])->row_array();
    }

    public function m_hapusmenu($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tb_umenu');
    }

    public function m_editmenu()
    {
        $data = ["menu" => $this->input->post('menu', true)];
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('tb_umenu', $data);
    }

    public function getIdSubmenu($id)
    {
        return $this->db->get_where('tb_usub_menu', ['id' => $id])->row_array();
    }

    public function m_insertSubmenu()
    {
        $data = [
            'title' => $this->input->post('title'),
            'menu_id' => $this->input->post('menu_id'),
            'url' => $this->input->post('url'),
            'icon' => $this->input->post('icon'),
            'is_active' => $this->input->post('is_active')
        ];
        $this->db->insert('tb_usub_menu', $data);
    }

    public function m_editSubmenu()
    {
        $data = [
            'title' => $this->input->post('title'),
            'menu_id' => $this->input->post('menu_id'),
            'url' => $this->input->post('url'),
            'icon' => $this->input->post('icon'),
            'is_active' => $this->input->post('is_active')
        ];
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('tb_usub_menu', $data);
    }

    public function m_hapusSubmenu($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tb_usub_menu');
    }

    public function getIdrole($id)
    {
        return $this->db->get_where('tb_user_role', ['id' => $id])->row_array();
    }

    public function m_editrole()
    {
        $data = ["role" => $this->input->post('role', true)];
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('tb_user_role', $data);
    }

    public function m_hapusrole($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tb_user_role');
    }
}
