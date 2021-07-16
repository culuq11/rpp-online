<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kepsek_model extends CI_Model
{

    function getdataRpp($table)
    {
        return $this->db->get($table)->result_array();
    }

    public function aprroveID($id)
    {
        return $this->db->get_where('tb_rpp_cetak', ['id_cetak' => $id])->row_array();
    }

    public function approve_edit()
    {
        $datainput = [
            'status' => $this->input->post('status'),
            'notif' => $this->input->post('notif')
        ];
        $this->db->where('id_cetak', $this->input->post('id'));
        $this->db->update('tb_rpp_cetak', $datainput);
    }

    function count_pending()
    {
        $this->db->select('*');
        $this->db->from('tb_rpp_cetak');
        $this->db->like('status', 'N');
        return $this->db->count_all_results();
    }

    function count_setujui()
    {
        $this->db->select('*');
        $this->db->from('tb_rpp_cetak');
        $this->db->like('status', 'Y');
        return $this->db->count_all_results();
    }


    function getAll_cetak()
    {
        return $this->db->from('tb_rpp_cetak')
            ->join('tb_user', 'tb_user.id_user=id_users')
            ->join('tb_rpp_data', 'tb_rpp_data.id_data=id_rpp_data')
            // ->join('tb_mapel', 'tb_mapel.id=tb_rpp_data.id_mapel')
            ->join('tb_mapel', 'tb_mapel.id=id_matpel')
            // ->join('tb_rombel', 'tb_rombel.id=tb_rpp_data.id_rombel')
            ->join('tb_rombel', 'tb_rombel.id=id_kelas')
            ->join('tb_semester', 'tb_semester.id=id_semester')
            ->join('tb_rpp_tujuan', 'tb_rpp_tujuan.id_tujuan=id_rpp_tujuan')
            ->join('tb_rpp_model', 'tb_rpp_model.id_model=id_rpp_model')
            ->join('tb_model_pemb', 'tb_model_pemb.id=tb_rpp_model.id_model_pemb')
            ->join('tb_rpp_penilaian', 'tb_rpp_penilaian.id_nilai=id_rpp_penilaian')
            ->get()
            ->result_array();
    }

    public function m_ubahpassword()
    {
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        $current_password = $this->input->post('current_password');
        $new_password = $this->input->post('new_password1');
        if (!password_verify($current_password, $data['user']['password'])) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Aktif Salah!</div>');
            redirect('kepsek/ubahpassword');
        } else {
            if ($current_password == $new_password) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Baru tidak Boleh sama dengan Password Aktif!</div>');
                redirect('kepsek/ubahpassword');
            } else {
                // password sudah ok
                $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                $this->db->set('password', $password_hash);
                $this->db->set('pass_tampil', $this->input->post('new_password1'));
                $this->db->where('email', $this->session->userdata('email'));
                $this->db->update('tb_user');
            }
        }
    }
}
