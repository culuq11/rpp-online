<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{


    public function m_updatesekolah()
    {
        $nama_sekolah = $this->input->post('nama_sekolah');
        $npsn = $this->input->post('npsn');
        $alamat = $this->input->post('alamat');
        $nama_kepsek = $this->input->post('nama_kepsek');
        $nip_kepsek = $this->input->post('nip_kepsek');
        $ket = $this->input->post('ket');
        $id = $this->input->post('id');

        $this->db->set('nama_sekolah', $nama_sekolah);
        $this->db->set('npsn', $npsn);
        $this->db->set('alamat', $alamat);
        $this->db->set('nama_kepsek', $nama_kepsek);
        $this->db->set('nip_kepsek', $nip_kepsek);
        $this->db->set('ket', $ket);
        $this->db->where('id', $id);
        $this->db->update('tb_datsek');
    }

    public function m_updatekurikulum()
    {
        $tahun_ajar = $this->input->post('tahun_ajar');
        $jenis_kurikulum = $this->input->post('jenis_kurikulum');
        $ket = $this->input->post('ket');
        $id = $this->input->post('id');

        $this->db->set('tahun_ajar', $tahun_ajar);
        $this->db->set('jenis_kurikulum', $jenis_kurikulum);
        $this->db->set('ket', $ket);
        $this->db->where('id', $id);
        $this->db->update('tb_kurikulum');
    }

    public function m_updatelogosekolah()
    {
        $data['sekolah'] = $this->db->get_where('tb_datsek')->row_array();
        $id = $this->input->post('id');

        // cek jika ada gambar yang akan diupload
        $upload_image = $_FILES['image']['name'];
        #var_dump($upload_image);
        #die;
        if ($upload_image) {
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']      = '2048';
            $config['upload_path'] = './assets/img/';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('image')) {
                $old_image = $data['sekolah']['logo'];
                if ($old_image != 'logo.png') {
                    unlink(FCPATH . 'assets/img/' . $old_image);
                }
                $new_image = $this->upload->data('file_name');
                $this->db->set('logo', $new_image);
                $this->db->where('id', $id);
                $this->db->update('tb_datsek');
            } else {
                echo $this->upload->dispay_errors();
            }
        }
    }

    public function getguru()
    {
        $query = "SELECT `tb_user`.*, `tb_user_role`.`ket_role`
                  FROM `tb_user` JOIN `tb_user_role`
                  ON `tb_user`.`id_ket_guru` = `tb_user_role`.`id` ORDER BY `id_user` ASC
                ";
        return $this->db->query($query)->result_array();
    }

    public function get_guru($limit, $start, $kata = null)
    {
        if ($kata) {
            $this->db->like('nama', $kata);
        }
        return $this->db->get('tb_user', $limit, $start)->result_array();
    }

    public function m_guruId($id)
    {
        return $this->db->get_where('tb_jurusan', ['id' => $id])->row_array();
    }

    public function m_insertguru()
    {

        $data = [
            'nama' => htmlspecialchars($this->input->post('nama')),
            'nip' => $this->input->post('nip'),
            'tempat_lahir' => $this->input->post('tempat_lahir'),
            'tanggal_lahir' => $this->input->post('tanggal_lahir'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'image' => 'default.jpg',
            'email' => htmlspecialchars($this->input->post('email')),
            'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
            'pass_tampil' => $this->input->post('password1'),
            'role_id' => $this->input->post('role_id'),
            'id_ket_guru' => 2,
            'is_active' => $this->input->post('is_active'),
            'tanggal_buat' => time()
        ];
        $this->db->insert('tb_user', $data);
    }

    public function m_editguru()
    {

        $data = [
            'nama' => htmlspecialchars($this->input->post('nama')),
            'nip' => $this->input->post('nip'),
            'tempat_lahir' => $this->input->post('tempat_lahir'),
            'tanggal_lahir' => $this->input->post('tanggal_lahir'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'role_id' => $this->input->post('role_id'),
            'id_ket_guru' => $this->input->post('id_ket_guru'),
            'is_active' => $this->input->post('is_active')
        ];

        $this->db->where('id_user', $this->input->post('id_user'));
        $this->db->update('tb_user', $data);
    }

    public function m_upload_guru($dataguru)
    {
        $jumlah = count($dataguru);
        if ($jumlah > 0) {
            $this->db->replace('tb_user', $dataguru);
        }
    }

    public function m_jurusanId($id)
    {
        return $this->db->get_where('tb_jurusan', ['id' => $id])->row_array();
    }

    public function getjurusan($limit, $start, $kata = null)
    {
        if ($kata) {
            $this->db->like('komp_keahlian', $kata);
        }
        return $this->db->get('tb_jurusan', $limit, $start)->result_array();
    }

    public function m_insertjurusan()
    {
        $data = [
            'bidang_keahlian' => $this->input->post('bidang_keahlian'),
            'prog_keahlian' => $this->input->post('prog_keahlian'),
            'komp_keahlian' => $this->input->post('komp_keahlian'),
            'prog_pend' => $this->input->post('prog_pend'),
            'ket' => $this->input->post('ket')
        ];
        $this->db->insert('tb_jurusan', $data);
    }

    public function m_editjurusan()
    {
        $data = [
            'bidang_keahlian' => $this->input->post('bidang_keahlian'),
            'prog_keahlian' => $this->input->post('prog_keahlian'),
            'komp_keahlian' => $this->input->post('komp_keahlian'),
            'prog_pend' => $this->input->post('prog_pend'),
            'ket' => $this->input->post('ket')
        ];
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('tb_jurusan', $data);
    }

    public function m_upload_jurusan($datajurusan)
    {
        $jumlah = count($datajurusan);
        if ($jumlah > 0) {
            $this->db->replace('tb_jurusan', $datajurusan);
        }
    }

    public function m_rombelId($id)
    {
        return $this->db->get_where('tb_jurusan', ['id' => $id])->row_array();
    }

    public function getrombel()
    {
        $query = "SELECT `tb_rombel`.*, `tb_jurusan`.`komp_keahlian`
                  FROM `tb_rombel` JOIN `tb_jurusan`
                  ON `tb_rombel`.`id_jurusan` = `tb_jurusan`.`id` ORDER BY `tingkat_kelas` ASC
                ";
        return $this->db->query($query)->result_array();
    }

    public function getrombels($limit, $start, $kata = null)
    {
        if ($kata) {
            $this->db->like('nama_kelas', $kata);
        }
        return $this->db->get('tb_rombel', $limit, $start)->result_array();
    }

    public function totalrombel()
    {
        return $this->db->get('tb_rombel')->num_rows();
    }

    public function m_insertrombel()
    {
        $data = [
            'id_jurusan' => $this->input->post('id_jurusan'),
            'tingkat_kelas' => $this->input->post('tingkat_kelas'),
            'nama_kelas' => $this->input->post('nama_kelas'),
            'ket' => $this->input->post('ket')
        ];
        $this->db->insert('tb_rombel', $data);
    }

    public function m_editrombel()
    {
        $data = [
            'id_jurusan' => $this->input->post('id_jurusan'),
            'tingkat_kelas' => $this->input->post('tingkat_kelas'),
            'nama_kelas' => $this->input->post('nama_kelas'),
            'ket' => $this->input->post('ket')
        ];
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('tb_rombel', $data);
    }

    public function m_upload_rombel($datarombel)
    {
        $jumlah = count($datarombel);
        if ($jumlah > 0) {
            $this->db->replace('tb_rombel', $datarombel);
        }
    }

    public function m_mapelId($id)
    {
        return $this->db->get_where('tb_mapel', ['id' => $id])->row_array();
    }

    public function getmapel()
    {
        $query = "SELECT `tb_mapel`.*, `tb_kurikulum`.`jenis_kurikulum`
                  FROM `tb_mapel` JOIN `tb_kurikulum`
                  ON `tb_mapel`.`id_kurikulum` = `tb_kurikulum`.`id` ORDER BY `id` ASC
                ";
        return $this->db->query($query)->result_array();
    }

    public function getmapels($limit, $start, $kata = null)
    {
        if ($kata) {
            $this->db->like('nama_mapel', $kata);
        }
        return $this->db->get('tb_mapel', $limit, $start)->result_array();
    }

    public function m_insertmapel()
    {
        $data = [
            'kode_mapel' => $this->input->post('kode_mapel'),
            'nama_mapel' => $this->input->post('nama_mapel'),
            'id_kurikulum' => $this->input->post('id_kurikulum'),
        ];
        $this->db->insert('tb_mapel', $data);
    }

    public function m_editmapel()
    {
        $data = [
            'kode_mapel' => $this->input->post('kode_mapel'),
            'nama_mapel' => $this->input->post('nama_mapel'),
            'id_kurikulum' => $this->input->post('id_kurikulum'),
        ];
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('tb_mapel', $data);
    }

    public function m_upload_mapel($datamapel)
    {
        $jumlah = count($datamapel);
        if ($jumlah > 0) {
            $this->db->replace('tb_mapel', $datamapel);
        }
    }

    public function m_semesterId($id)
    {
        return $this->db->get_where('tb_semester', ['id' => $id])->row_array();
    }

    public function m_upload_semester($datasemester)
    {
        $jumlah = count($datasemester);
        if ($jumlah > 0) {
            $this->db->replace('tb_semester', $datasemester);
        }
    }

    public function m_editsemester()
    {
        $data = [
            'ket_semester' => $this->input->post('ket_semester'),
            'bulan' => $this->input->post('bulan'),
        ];
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('tb_semester', $data);
    }

    public function m_import_peng($kkopengetahuan)
    {
        $jumlah = count($kkopengetahuan);
        if ($jumlah > 0) {
            $this->db->replace('tb_kko_pengetahuan', $kkopengetahuan);
        }
    }

    public function m_import_sikap($kkosikap)
    {
        $jumlah = count($kkosikap);
        if ($jumlah > 0) {
            $this->db->replace('tb_kko_sikap', $kkosikap);
        }
    }

    public function m_import_ket($kkoketerampilan)
    {
        $jumlah = count($kkoketerampilan);
        if ($jumlah > 0) {
            $this->db->replace('tb_kko_keterampilan', $kkoketerampilan);
        }
    }

    public function m_pembelajaranId($id)
    {
        return $this->db->get_where('tb_model_pemb', ['id' => $id])->row_array();
    }

    public function getmodels($limit, $start, $kata = null)
    {
        if ($kata) {
            $this->db->like('jenis_model_pemb', $kata);
        }
        return $this->db->get('tb_model_pemb', $limit, $start)->result_array();
    }

    public function m_editpembelajaran()
    {
        $data = [
            'jenis_model_pemb' => $this->input->post('jenis_model_pemb'),
            'penjelasan_model' => $this->input->post('penjelasan_model'),
        ];
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('tb_model_pemb', $data);
    }

    public function m_import_model($pembelajaran)
    {
        $jumlah = count($pembelajaran);
        if ($jumlah > 0) {
            $this->db->replace('tb_model_pemb', $pembelajaran);
        }
    }

    public function m_tugasId($id)
    {
        return $this->db->get_where('tb_tugas_guru', ['id' => $id])->row_array();
    }

    public function m_edittugas()
    {
        $data = [
            'user_id' => $this->input->post('user_id'),
            'id_mapel' => $this->input->post('id_mapel'),
            'id_rombel' => $this->input->post('id_rombel'),
        ];
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('tb_tugas_guru', $data);
    }

    public function m_inserttugas()
    {
        $data = [
            'user_id' => $this->input->post('user_id'),
            'id_mapel' => $this->input->post('id_mapel'),
            'id_rombel' => $this->input->post('id_rombel'),
        ];
        $this->db->insert('tb_tugas_guru', $data);
    }

    function getTugas_guru()
    {
        $query = "SELECT `tb_tugas_guru`.*, `tb_user`.`nama`, `tb_mapel`.`nama_mapel`, `tb_rombel`.`nama_kelas`
                 FROM (((`tb_tugas_guru`
                 JOIN `tb_user` ON `tb_tugas_guru`.`user_id` = `tb_user`.`id_user`)
                 JOIN `tb_mapel` ON `tb_tugas_guru`.`id_mapel` = `tb_mapel`.`id`)
                 JOIN `tb_rombel` ON `tb_tugas_guru`.`id_rombel` = `tb_rombel`.`id`)
                 ORDER BY `id` ASC
                 ";
        return $this->db->query($query)->result_array();
    }

    function droptabel()
    {
        $cek = $this->db->query("SHOW TABLES");

        if ($cek->num_rows() > 0) {
            $query = $this->db->query('DROP TABLE
            tb_datsek,
            tb_jurusan,
            tb_kko,
            tb_kko_keterampilan,
            tb_kko_pengetahuan,
            tb_kko_sikap,
            tb_kurikulum,
            tb_mapel,
            tb_model_pemb,
            tb_rombel,
            tb_rpp_cetak,
            tb_rpp_data,
            tb_rpp_model,
            tb_rpp_penilaian,
            tb_rpp_promes,
            tb_rpp_tujuan,
            tb_semester,
            tb_silabus,
            tb_tugas_guru,
            tb_uacc_menu,
            tb_umenu,
            tb_user,
            tb_user_role,
            tb_usub_menu');
            return $query;
        } else {
            return true;
        }
    }
}
