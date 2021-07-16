<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{

    public function m_editprofile()
    {
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        $name = $this->input->post('nama');
        $tempat = $this->input->post('tempat_lahir');
        $ttl = $this->input->post('tanggal_lahir');
        $jk = $this->input->post('jenis_kelamin');
        $email = $this->input->post('email');

        // cek jika ada gambar yang akan diupload
        $upload_image = $_FILES['image']['name'];
        #var_dump($upload_image);
        #die;
        if ($upload_image) {
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']      = '2048';
            $config['upload_path'] = './assets/img/profile/';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('image')) {
                $old_image = $data['user']['image'];
                if ($old_image != 'default.jpg') {
                    unlink(FCPATH . 'assets/img/profile/' . $old_image);
                }
                $new_image = $this->upload->data('file_name');
                $this->db->set('image', $new_image);
            } else {
                echo $this->upload->dispay_errors();
            }
        }

        $this->db->set('nama', $name);
        $this->db->set('tempat_lahir', $tempat);
        $this->db->set('tanggal_lahir', $ttl);
        $this->db->set('jenis_kelamin', $jk);
        $this->db->where('email', $email);
        $this->db->update('tb_user');
    }

    public function m_ubahpassword()
    {
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        $current_password = $this->input->post('current_password');
        $new_password = $this->input->post('new_password1');
        if (!password_verify($current_password, $data['user']['password'])) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Aktif Salah!</div>');
            redirect('user/ubahpassword');
        } else {
            if ($current_password == $new_password) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Baru tidak Boleh sama dengan Password Aktif!</div>');
                redirect('user/ubahpassword');
            } else {
                // password sudah ok
                $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                $this->db->set('password', $password_hash);
                $this->db->set('password', $this->input->post('new_password1'));
                $this->db->where('email', $this->session->userdata('email'));
                $this->db->update('tb_user');
            }
        }
    }

    function getAll_cetak($table, $id)
    {
        return $this->db->from($table)
            ->join('tb_user', 'tb_user.id_user=id_users')
            ->join('tb_rpp_data', 'tb_rpp_data.id_data=id_rpp_data')
            ->join('tb_mapel', 'tb_mapel.id=id_matpel')
            ->join('tb_rombel', 'tb_rombel.id=id_kelas')
            ->join('tb_semester', 'tb_semester.id=id_semester')
            ->join('tb_rpp_tujuan', 'tb_rpp_tujuan.id_tujuan=id_rpp_tujuan')
            ->join('tb_rpp_model', 'tb_rpp_model.id_model=id_rpp_model')
            ->join('tb_model_pemb', 'tb_model_pemb.id=tb_rpp_model.id_model_pemb')
            ->join('tb_rpp_penilaian', 'tb_rpp_penilaian.id_nilai=id_rpp_penilaian')
            // ->join('tb_mapel', 'tb_mapel.id=tb_rpp_data.id_mapel')
            // ->join('tb_rombel', 'tb_rombel.id=tb_rpp_data.id_rombel')
            ->where($table . '.id_users', $id)
            ->get()
            ->result();
    }
}
