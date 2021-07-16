<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once APPPATH . 'third_party/Spout/Autoloader/autoload.php';

use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Admin_model', 'admin');

        date_default_timezone_set('Asia/Jakarta');
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['sekolah'] = $this->db->get_where('tb_datsek')->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/admin_topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }

    public function editprofile()
    {
        $data['title'] = 'Edit Profile';
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['sekolah'] = $this->db->get_where('tb_datsek')->row_array();

        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|trim');
        $this->form_validation->set_rules('nip', 'NIP Lengkap', 'required|trim');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required|trim');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required|trim');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/admin_topbar', $data);
            $this->load->view('admin/editprofile', $data);
            $this->load->view('templates/footer');
        } else {
            $name = $this->input->post('nama');
            $nip = $this->input->post('nip');
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
            $this->db->set('nip', $nip);
            $this->db->set('tempat_lahir', $tempat);
            $this->db->set('tanggal_lahir', $ttl);
            $this->db->set('jenis_kelamin', $jk);
            $this->db->where('email', $email);
            $this->db->update('tb_user');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Profile anda berhasil diubah</div>');
            redirect('admin/editprofile');
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
            $this->load->view('templates/admin_topbar', $data);
            $this->load->view('admin/ubahpassword', $data);
            $this->load->view('templates/footer');
        } else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');
            if (!password_verify($current_password, $data['user']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Aktif Salah!</div>');
                redirect('admin/ubahpassword');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Baru tidak Boleh sama dengan Password Aktif!</div>');
                    redirect('admin/ubahpassword');
                } else {
                    // password sudah ok
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->set('pass_tampil', $new_password);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('tb_user');

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password Berhasil Diubah!</div>');
                    redirect('admin/ubahpassword');
                }
            }
        }
    }

    public function sekolah()
    {
        $data['title'] = 'Data Sekolah';
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['sekolah'] = $this->db->get_where('tb_datsek')->row_array();
        $data['kurikulum'] = $this->db->get_where('tb_kurikulum')->row_array();

        $this->form_validation->set_rules('nama_sekolah', 'Nama Sekolah', 'required|trim');
        $this->form_validation->set_rules('npsn', 'NPSN', 'required|trim');
        $this->form_validation->set_rules('nama_kepsek', 'Nama Kepala Sekolah', 'required|trim');
        $this->form_validation->set_rules('nip_kepsek', 'NIP Kepala Sekolah', 'required|trim');
        $this->form_validation->set_rules('ket', 'Status Akreditasi', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/admin_topbar', $data);
            $this->load->view('admin/sekolah', $data);
            $this->load->view('templates/footer');
        } else {
            $this->admin->m_updatesekolah();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Sekolah berhasil diubah</div>');
            redirect('admin/sekolah');
        }
    }

    public function kurikulum()
    {
        $data['title'] = 'Data Sekolah';
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['sekolah'] = $this->db->get_where('tb_datsek')->row_array();
        $data['kurikulum'] = $this->db->get_where('tb_kurikulum')->row_array();

        $this->form_validation->set_rules('jenis_kurikulum', 'Jenis KUrikulum', 'required|trim');
        $this->form_validation->set_rules('tahun_ajar', 'Tahun Akademik', 'required|trim');
        $this->form_validation->set_rules('nama_sekolah', 'Nama Sekolah', 'required|trim');
        $this->form_validation->set_rules('npsn', 'NPSN', 'required|trim');
        $this->form_validation->set_rules('nama_kepsek', 'Nama Kepala Sekolah', 'required|trim');
        $this->form_validation->set_rules('nip_kepsek', 'NIP Kepala Sekolah', 'required|trim');
        $this->form_validation->set_rules('ket', 'Status Akreditasi', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/admin_topbar', $data);
            $this->load->view('admin/sekolah', $data);
            $this->load->view('templates/footer');
        } else {
            $this->admin->m_updatekurikulum();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Kurikulum berhasil diubah</div>');
            redirect('admin/sekolah');
        }
    }

    public function logosekolah()
    {
        $data['title'] = 'Data Sekolah';
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['sekolah'] = $this->db->get_where('tb_datsek')->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/admin_topbar', $data);
        $this->load->view('admin/sekolah', $data);
        $this->load->view('templates/footer');

        $this->admin->m_updatelogosekolah();
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Sekolah berhasil diubah</div>');
        redirect('admin/sekolah');
    }

    public function guru()
    {
        $data['title'] = 'Data Guru';
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['sekolah'] = $this->db->get_where('tb_datsek')->row_array();
        $data['status'] = $this->db->get('tb_user_role')->result_array();
        $data['guru'] = $this->admin->getguru();
        $data['jenis'] = ['Laki-Laki', 'Perempuan'];
        $data['start'] = $this->uri->segment(3);

        $this->load->library('pagination');

        if ($this->input->post('submit')) {
            $data['kata'] = $this->input->post('kata');
            $this->session->set_userdata('kata', $data['kata']);
        } else {
            $data['kata'] = $this->session->userdata('kata');
        }

        $this->db->like('nama', $data['kata']);
        $this->db->from('tb_user');
        $config['base_url'] = 'http://localhost:8080/rpp-online/admin/guru';
        $config['total_rows'] = $this->db->count_all_results();
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 100;

        $this->pagination->initialize($config);

        $data['gurus'] = $this->admin->get_guru($config['per_page'], $data['start'], $data['kata']);

        $this->form_validation->set_rules('nama', 'Nama PTK', 'required|trim');
        $this->form_validation->set_rules('nip', 'NIP PTK', 'required|trim');
        $this->form_validation->set_rules('email', 'Email PTK', 'required|trim|valid_email|is_unique[tb_user.email]', [
            'is_unique' => 'Email ini Sudah Terdaftar!'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[5]|matches[password2]', [
            'matches' => 'Password tidak cocok!',
            'min_length' => 'Password terlalu pendek!'
        ]);
        $this->form_validation->set_rules('password2', 'Konfirmasi Password', 'required|trim|matches[password1]');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required|trim');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/admin_topbar', $data);
            $this->load->view('admin/guru', $data);
            $this->load->view('templates/footer');
        } else {
            $this->admin->m_insertguru();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Guru berhasil ditambah</div>');
            redirect('admin/guru');
        }
    }

    public function hapusguru($id)
    {
        $this->db->where('id_user', $id);
        $this->db->delete('tb_user');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Jurusan berhasil dihapus</div>');
        redirect('admin/guru');
    }

    public function editguru($id)
    {
        $data['title'] = 'Data Jurusan';
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['sekolah'] = $this->db->get_where('tb_datsek')->row_array();
        $data['guru'] = $this->admin->getguru();
        $data['guruId'] = $this->admin->m_guruId($id);
        $data['status'] = $this->db->get('tb_user_role')->result_array();
        $data['jenis'] = ['Laki-Laki', 'Perempuan'];

        $this->form_validation->set_rules('nama', 'Nama PTK', 'required|trim');
        $this->form_validation->set_rules('nip', 'NIP PTK', 'required|trim');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required|trim');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/admin_topbar', $data);
            $this->load->view('admin/guru', $data);
            $this->load->view('templates/footer');
        } else {
            $this->admin->m_editguru();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Guru berhasil diubah</div>');
            redirect('admin/guru');
        }
    }

    public function upload_guru()
    {
        $config['upload_path'] = './file_upload/';
        $config['allowed_types'] = 'xlsx|xls';
        $config['file_name'] = 'data_guru' . time();
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('guru')) {
            $file = $this->upload->data();
            $reader = ReaderEntityFactory::createXLSXReader();

            $reader->open('file_upload/' . $file['file_name']);
            foreach ($reader->getSheetIterator() as $sheet) {
                $numrow = 1;
                foreach ($sheet->getRowIterator() as $row) {
                    if ($numrow > 1) {
                        $dataguru = array(
                            'nama'          => $row->getCellAtIndex(1),
                            'nip'           => $row->getCellAtIndex(2),
                            'tempat_lahir'  => $row->getCellAtIndex(3),
                            'tanggal_lahir' => $row->getCellAtIndex(4),
                            'jenis_kelamin' => $row->getCellAtIndex(5),
                            'image'         => 'default.jpg',
                            'email'         => $row->getCellAtIndex(6),
                            'password'      => password_hash($row->getCellAtIndex(7), PASSWORD_DEFAULT),
                            'pass_tampil'   => $row->getCellAtIndex(7),
                            'role_id'       => 2,
                            'id_ket_guru'   => 2,
                            'is_active'     => 1,
                            'tanggal_buat'  => time(),
                        );
                        $this->admin->m_upload_guru($dataguru);
                    }
                    $numrow++;
                }
                $reader->close();
                unlink('file_upload/' . $file['file_name']);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Guru berhasil diupload</div>');
                redirect('admin/guru');
            }
        } else {
            echo "Error : " . $this->upload->display_errors();
        };
    }

    public function jurusan()
    {
        $data['title'] = 'Data Jurusan';
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['sekolah'] = $this->db->get_where('tb_datsek')->row_array();
        $data['start'] = $this->uri->segment(3);

        $this->load->library('pagination');

        if ($this->input->post('submit')) {
            $data['kata'] = $this->input->post('kata');
            $this->session->set_userdata('kata', $data['kata']);
        } else {
            $data['kata'] = $this->session->userdata('kata');
        }

        $this->db->like('komp_keahlian', $data['kata']);
        $this->db->from('tb_jurusan');
        $config['base_url'] = 'http://localhost:8080/rpp-online/admin/jurusan';
        $config['total_rows'] = $this->db->count_all_results();
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 5;

        $this->pagination->initialize($config);

        $data['jurusan'] = $this->admin->getjurusan($config['per_page'], $data['start'], $data['kata']);

        $this->form_validation->set_rules('bidang_keahlian', 'Bidang Keahlian', 'required|trim');
        $this->form_validation->set_rules('prog_keahlian', 'Program Keahlian', 'required|trim');
        $this->form_validation->set_rules('komp_keahlian', 'Kompetensi Keahlian', 'required|trim');
        $this->form_validation->set_rules('prog_pend', 'Program Pendidikan', 'required|trim');
        $this->form_validation->set_rules('ket', 'Keterangan', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/admin_topbar', $data);
            $this->load->view('admin/jurusan', $data);
            $this->load->view('templates/footer');
        } else {
            $this->admin->m_insertjurusan();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Jurusan berhasil ditambah</div>');
            redirect('admin/jurusan');
        }
    }

    public function hapusjurusan($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tb_jurusan');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Jurusan berhasil dihapus</div>');
        redirect('admin/jurusan');
    }

    public function editjurusan($id)
    {
        $data['title'] = 'Data Jurusan';
        $data['sekolah'] = $this->db->get_where('tb_datsek')->row_array();
        $data['jurusanId'] = $this->admin->m_jurusanId($id);
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['jurusan'] = $this->db->get('tb_jurusan')->result_array();

        $this->form_validation->set_rules('bidang_keahlian', 'Bidang Keahlian', 'required|trim');
        $this->form_validation->set_rules('prog_keahlian', 'Program Keahlian', 'required|trim');
        $this->form_validation->set_rules('komp_keahlian', 'Kompetensi Keahlian', 'required|trim');
        $this->form_validation->set_rules('prog_pend', 'Program Pendidikan', 'required|trim');
        $this->form_validation->set_rules('ket', 'Keterangan', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/admin_topbar', $data);
            $this->load->view('admin/jurusan', $data);
            $this->load->view('templates/footer');
        } else {
            $this->admin->m_editjurusan($id);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Jurusan berhasil diubah</div>');
            redirect('admin/jurusan');
        }
    }

    public function upload_jurusan()
    {
        $config['upload_path'] = './file_upload/';
        $config['allowed_types'] = 'xlsx|xls';
        $config['file_name'] = 'data_jurusan' . time();
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('jurusan')) {
            $file = $this->upload->data();
            $reader = ReaderEntityFactory::createXLSXReader();

            $reader->open('file_upload/' . $file['file_name']);
            foreach ($reader->getSheetIterator() as $sheet) {
                $numrow = 1;
                foreach ($sheet->getRowIterator() as $row) {
                    if ($numrow > 1) {
                        $datajurusan = array(
                            'bidang_keahlian'   => $row->getCellAtIndex(1),
                            'prog_keahlian'     => $row->getCellAtIndex(2),
                            'komp_keahlian'     => $row->getCellAtIndex(3),
                            'prog_pend'         => $row->getCellAtIndex(4),
                            'ket'               => $row->getCellAtIndex(5),
                        );
                        $this->admin->m_upload_jurusan($datajurusan);
                    }
                    $numrow++;
                }
                $reader->close();
                unlink('file_upload/' . $file['file_name']);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Jurusan berhasil diupload</div>');
                redirect('admin/jurusan');
            }
        } else {
            echo "Error : " . $this->upload->display_errors();
        };
    }

    public function rombel()
    {
        $data['title'] = 'Data Rombel';
        $data['sekolah'] = $this->db->get_where('tb_datsek')->row_array();
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['jurusan'] = $this->db->get('tb_jurusan')->result_array();
        $data['rombel'] = $this->admin->getrombel();
        $data['tingkat'] = ['X', 'XI', 'XII', 'XIII'];
        $data['start'] = $this->uri->segment(3);

        $this->load->library('pagination');

        if ($this->input->post('submit')) {
            $data['kata'] = $this->input->post('kata');
            $this->session->set_userdata('kata', $data['kata']);
        } else {
            $data['kata'] = $this->session->userdata('kata');
        }

        $this->db->like('nama_kelas', $data['kata']);
        $this->db->from('tb_rombel');
        $config['base_url'] = 'http://localhost:8080/rpp-online/admin/rombel';
        $config['total_rows'] = $this->db->count_all_results();
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 100;

        $this->pagination->initialize($config);

        $data['rombels'] = $this->admin->getrombels($config['per_page'], $data['start'], $data['kata']);

        $this->form_validation->set_rules('nama_kelas', 'Nama Kelas', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/admin_topbar', $data);
            $this->load->view('admin/rombel', $data);
            $this->load->view('templates/footer');
        } else {
            $this->admin->m_insertrombel();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Rombel berhasil ditambah</div>');
            redirect('admin/rombel');
        }
    }

    public function hapusrombel($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tb_rombel');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Rombel berhasil dihapus</div>');
        redirect('admin/rombel');
    }

    public function editrombel($id)
    {
        $data['title'] = 'Data Rombel';
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['sekolah'] = $this->db->get_where('tb_datsek')->row_array();
        $data['jurusan'] = $this->db->get('tb_jurusan')->result_array();
        $data['rombel'] = $this->admin->getrombel();
        $data['rombelId'] = $this->admin->m_rombelId($id);
        $data['tingkat'] = ['X', 'XI', 'XII', 'XIII'];

        $this->form_validation->set_rules('nama_kelas', 'Nama Kelas', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/admin_topbar', $data);
            $this->load->view('admin/rombel', $data);
            $this->load->view('templates/footer');
        } else {
            $this->admin->m_editrombel($id);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Rombel berhasil diubah</div>');
            redirect('admin/rombel');
        }
    }

    public function upload_rombel()
    {
        $config['upload_path'] = './file_upload/';
        $config['allowed_types'] = 'xlsx|xls';
        $config['file_name'] = 'data_rombel' . time();
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('rombel')) {
            $file = $this->upload->data();
            $reader = ReaderEntityFactory::createXLSXReader();

            $reader->open('file_upload/' . $file['file_name']);
            foreach ($reader->getSheetIterator() as $sheet) {
                $numrow = 1;
                foreach ($sheet->getRowIterator() as $row) {
                    if ($numrow > 1) {
                        $datarombel = array(
                            'id_jurusan'    => $row->getCellAtIndex(1),
                            'tingkat_kelas' => $row->getCellAtIndex(2),
                            'nama_kelas'    => $row->getCellAtIndex(3),
                            'ket'           => $row->getCellAtIndex(4),
                        );
                        $this->admin->m_upload_rombel($datarombel);
                    }
                    $numrow++;
                }
                $reader->close();
                unlink('file_upload/' . $file['file_name']);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Rombel berhasil diupload</div>');
                redirect('admin/rombel');
            }
        } else {
            echo "Error : " . $this->upload->display_errors();
        };
    }

    public function mapel()
    {
        $data['title'] = 'Data Mata Pelajaran';
        $data['sekolah'] = $this->db->get_where('tb_datsek')->row_array();
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['mapel'] = $this->admin->getmapel();
        $data['kurikulum'] = $this->db->get('tb_kurikulum')->result_array();
        $data['start'] = $this->uri->segment(3);

        $this->load->library('pagination');

        if ($this->input->post('submit')) {
            $data['kata'] = $this->input->post('kata');
            $this->session->set_userdata('kata', $data['kata']);
        } else {
            $data['kata'] = $this->session->userdata('kata');
        }

        $this->db->like('nama_mapel', $data['kata']);
        $this->db->from('tb_mapel');
        $config['base_url'] = 'http://localhost:8080/rpp-online/admin/mapel';
        $config['total_rows'] = $this->db->count_all_results();
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 100;

        $this->pagination->initialize($config);

        $data['mapels'] = $this->admin->getmapels($config['per_page'], $data['start'], $data['kata']);

        $this->form_validation->set_rules('kode_mapel', 'Kode Mata Pelajaran', 'required|trim');
        $this->form_validation->set_rules('nama_mapel', 'Nama Mata Pelajaran', 'required|trim');
        $this->form_validation->set_rules('id_kurikulum', 'Jenis Kurikulum', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/admin_topbar', $data);
            $this->load->view('admin/mapel', $data);
            $this->load->view('templates/footer');
        } else {
            $this->admin->m_insertmapel();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Mata Pelajaran berhasil ditambah</div>');
            redirect('admin/mapel');
        }
    }

    public function hapusmapel($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tb_mapel');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Mata Pelajaran berhasil dihapus</div>');
        redirect('admin/mapel');
    }

    public function mapeledit($id)
    {
        $data['title'] = 'Data Mata Pelajaran';
        $data['sekolah'] = $this->db->get_where('tb_datsek')->row_array();
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['mapel'] = $this->admin->getmapel();
        $data['kurikulum'] = $this->db->get('tb_kurikulum')->result_array();
        $data['mapelId'] = $this->admin->m_mapelId($id);

        $this->form_validation->set_rules('kode_mapel', 'Kode Mata Pelajaran', 'required|trim');
        $this->form_validation->set_rules('nama_mapel', 'Nama Mata Pelajaran', 'required|trim');
        $this->form_validation->set_rules('id_kurikulum', 'Jenis Kurikulum', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/admin_topbar', $data);
            $this->load->view('admin/mapel', $data);
            $this->load->view('templates/footer');
        } else {
            $this->admin->m_editmapel($id);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Mata Pelajaran berhasil diubah</div>');
            redirect('admin/mapel');
        }
    }

    public function upload_mapel()
    {
        $config['upload_path'] = './file_upload/';
        $config['allowed_types'] = 'xlsx|xls';
        $config['file_name'] = 'data_mapel' . time();
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('mapel')) {
            $file = $this->upload->data();
            $reader = ReaderEntityFactory::createXLSXReader();

            $reader->open('file_upload/' . $file['file_name']);
            foreach ($reader->getSheetIterator() as $sheet) {
                $numrow = 1;
                foreach ($sheet->getRowIterator() as $row) {
                    if ($numrow > 1) {
                        $datamapel = array(
                            'kode_mapel'    => $row->getCellAtIndex(1),
                            'nama_mapel'    => $row->getCellAtIndex(2),
                            'id_kurikulum'  => 1,
                        );
                        $this->admin->m_upload_mapel($datamapel);
                    }
                    $numrow++;
                }
                $reader->close();
                unlink('file_upload/' . $file['file_name']);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Mata Pelajaran berhasil diupload</div>');
                redirect('admin/mapel');
            }
        } else {
            echo "Error : " . $this->upload->display_errors();
        };
    }

    public function semester()
    {
        $data['title'] = 'Data Semester';
        $data['sekolah'] = $this->db->get_where('tb_datsek')->row_array();
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['semester'] = $this->db->get('tb_semester')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/admin_topbar', $data);
        $this->load->view('admin/semester', $data);
        $this->load->view('templates/footer');
    }

    public function semester_upload()
    {
        $config['upload_path'] = './file_upload/';
        $config['allowed_types'] = 'xlsx|xls';
        $config['file_name'] = 'data_semester' . time();
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('semester')) {
            $file = $this->upload->data();
            $reader = ReaderEntityFactory::createXLSXReader();

            $reader->open('file_upload/' . $file['file_name']);
            foreach ($reader->getSheetIterator() as $sheet) {
                $numrow = 1;
                foreach ($sheet->getRowIterator() as $row) {
                    if ($numrow > 1) {
                        $datasemester = array(
                            'ket_semester'    => $row->getCellAtIndex(1),
                            'bulan1'           => $row->getCellAtIndex(2),
                            'bulan2'           => $row->getCellAtIndex(3),
                            'bulan3'           => $row->getCellAtIndex(4),
                            'bulan4'           => $row->getCellAtIndex(5),
                            'bulan5'           => $row->getCellAtIndex(6),
                            'bulan6'           => $row->getCellAtIndex(7),
                        );
                        $this->admin->m_upload_semester($datasemester);
                    }
                    $numrow++;
                }
                $reader->close();
                unlink('file_upload/' . $file['file_name']);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Semester berhasil diupload</div>');
                redirect('admin/semester');
            }
        } else {
            echo "Error : " . $this->upload->display_errors();
        };
    }

    public function semesteredit($id)
    {
        $data['title'] = 'Data Semester';
        $data['sekolah'] = $this->db->get_where('tb_datsek')->row_array();
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['semester'] = $this->db->get('tb_semester')->result_array();
        $data['semesterId'] = $this->admin->m_semesterId($id);

        $this->form_validation->set_rules('ket_semester', 'Keterangan Semester', 'required|trim');
        $this->form_validation->set_rules('bulan', 'Bulan', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/admin_topbar', $data);
            $this->load->view('admin/mapel', $data);
            $this->load->view('templates/footer');
        } else {
            $this->admin->m_editsemester($id);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Semester berhasil diubah</div>');
            redirect('admin/semester');
        }
    }

    public function kko()
    {
        $data['title'] = 'Data KKO';
        $data['sekolah'] = $this->db->get_where('tb_datsek')->row_array();
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['kko_peng'] = $this->db->get('tb_kko_pengetahuan')->result_array();
        $data['kko_sikap'] = $this->db->get('tb_kko_sikap')->result_array();
        $data['kko_ket'] = $this->db->get('tb_kko_keterampilan')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/admin_topbar', $data);
        $this->load->view('admin/kko', $data);
        $this->load->view('templates/footer');
    }

    public function kko_peng()
    {
        $config['upload_path'] = './file_upload/kko/';
        $config['allowed_types'] = 'xlsx|xls';
        $config['file_name'] = 'kko_peng' . time();
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('pengetahuan')) {
            $file = $this->upload->data();
            $reader = ReaderEntityFactory::createXLSXReader();

            $reader->open('file_upload/kko/' . $file['file_name']);
            foreach ($reader->getSheetIterator() as $sheet) {
                $numrow = 1;
                foreach ($sheet->getRowIterator() as $row) {
                    if ($numrow > 1) {
                        $kkopengetahuan = array(
                            'c1_pengetahuan' => $row->getCellAtIndex(1),
                            'c2_pemahaman'   => $row->getCellAtIndex(2),
                            'c3_penerapan'   => $row->getCellAtIndex(3),
                            'c4_analisis'    => $row->getCellAtIndex(4),
                            'c5_penilaian'   => $row->getCellAtIndex(5),
                            'c6_sintesis'    => $row->getCellAtIndex(6),
                        );
                        $this->admin->m_import_peng($kkopengetahuan);
                    }
                    $numrow++;
                }
                $reader->close();
                unlink('file_upload/kko/' . $file['file_name']);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data KKO Pengetahuan berhasil diupload</div>');
                redirect('admin/kko');
            }
        } else {
            echo "Error : " . $this->upload->display_errors();
        };
    }

    public function kko_ket()
    {
        $config['upload_path'] = './file_upload/kko/';
        $config['allowed_types'] = 'xlsx|xls';
        $config['file_name'] = 'kko_ket' . time();
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('keterampilan')) {
            $file = $this->upload->data();
            $reader = ReaderEntityFactory::createXLSXReader();

            $reader->open('file_upload/kko/' . $file['file_name']);
            foreach ($reader->getSheetIterator() as $sheet) {
                $numrow = 1;
                foreach ($sheet->getRowIterator() as $row) {
                    if ($numrow > 1) {
                        $kkoketerampilan = array(
                            'p1_menirukan'      => $row->getCellAtIndex(1),
                            'p2_memanipulasi'   => $row->getCellAtIndex(2),
                            'p3_pengalamiahan'  => $row->getCellAtIndex(3),
                            'p4_artikulasi'     => $row->getCellAtIndex(4),
                            'p5_imitasi'        => $row->getCellAtIndex(5),
                            'p6_presisi'        => $row->getCellAtIndex(6),
                            'p7_naturalisasi'   => $row->getCellAtIndex(7),
                        );
                        $this->admin->m_import_ket($kkoketerampilan);
                    }
                    $numrow++;
                }
                $reader->close();
                unlink('file_upload/kko/' . $file['file_name']);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data KKO Keterampilan berhasil diupload</div>');
                redirect('admin/kko');
            }
        } else {
            echo "Error : " . $this->upload->display_errors();
        };
    }

    public function kko_sikap()
    {
        $config['upload_path'] = './file_upload/kko/';
        $config['allowed_types'] = 'xlsx|xls';
        $config['file_name'] = 'kko_sikap' . time();
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('sikap')) {
            $file = $this->upload->data();
            $reader = ReaderEntityFactory::createXLSXReader();

            $reader->open('file_upload/kko/' . $file['file_name']);
            foreach ($reader->getSheetIterator() as $sheet) {
                $numrow = 1;
                foreach ($sheet->getRowIterator() as $row) {
                    if ($numrow > 1) {
                        $kkosikap = array(
                            'c1_menerima'    => $row->getCellAtIndex(1),
                            'c2_menanggapi'  => $row->getCellAtIndex(2),
                            'c3_menilai'     => $row->getCellAtIndex(3),
                            'c4_menghayati'  => $row->getCellAtIndex(4),
                            'c5_mengamalkan' => $row->getCellAtIndex(5),
                        );
                        $this->admin->m_import_sikap($kkosikap);
                    }
                    $numrow++;
                }
                $reader->close();
                unlink('file_upload/kko/' . $file['file_name']);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data KKO Sikap berhasil diupload</div>');
                redirect('admin/kko');
            }
        } else {
            echo "Error : " . $this->upload->display_errors();
        };
    }

    public function model_pemb()
    {
        $data['title'] = 'Data Model Pembelajaran';
        $data['sekolah'] = $this->db->get_where('tb_datsek')->row_array();
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['model'] = $this->db->get('tb_model_pemb')->result_array();
        $data['start'] = $this->uri->segment(3);

        $this->load->library('pagination');

        if ($this->input->post('submit')) {
            $data['kata'] = $this->input->post('kata');
            $this->session->set_userdata('kata', $data['kata']);
        } else {
            $data['kata'] = $this->session->userdata('kata');
        }

        $this->db->like('jenis_model_pemb', $data['kata']);
        $this->db->from('tb_model_pemb');
        $config['base_url'] = 'http://localhost:8080/rpp-online/admin/model_pemb';
        $config['total_rows'] = $this->db->count_all_results();
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 100;

        $this->pagination->initialize($config);

        $data['models'] = $this->admin->getmodels($config['per_page'], $data['start'], $data['kata']);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/admin_topbar', $data);
        $this->load->view('admin/model_pembelajaran', $data);
        $this->load->view('templates/footer');
    }

    public function edit_model_pemb($id)
    {
        $data['title'] = 'Data Model Pembelajaran';
        $data['sekolah'] = $this->db->get_where('tb_datsek')->row_array();
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['model'] = $this->db->get('tb_model_pemb')->result_array();
        $data['modelId'] = $this->admin->m_pembelajaranId($id);

        $this->form_validation->set_rules('jenis_model_pemb', 'Jenis Model Pembelajaran', 'required|trim');
        $this->form_validation->set_rules('penjelasan_model', 'Penjelasan', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/admin_topbar', $data);
            $this->load->view('admin/model_pembelajaran', $data);
            $this->load->view('templates/footer');
        } else {
            $this->admin->m_editpembelajaran($id);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Model Pembelajaran berhasil diubah</div>');
            redirect('admin/model_pemb');
        }
    }

    public function upload_model()
    {
        $config['upload_path'] = './file_upload/';
        $config['allowed_types'] = 'xlsx|xls';
        $config['file_name'] = 'model_pemb_' . time();
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('pembelajaran')) {
            $file = $this->upload->data();
            $reader = ReaderEntityFactory::createXLSXReader();

            $reader->open('file_upload/' . $file['file_name']);
            foreach ($reader->getSheetIterator() as $sheet) {
                $numrow = 1;
                foreach ($sheet->getRowIterator() as $row) {
                    if ($numrow > 1) {
                        $pembelajaran = array(
                            'jenis_model_pemb'    => $row->getCellAtIndex(1),
                            'penjelasan_model'    => $row->getCellAtIndex(2),
                            'langkah_langkah'    => $row->getCellAtIndex(3),
                        );
                        $this->admin->m_import_model($pembelajaran);
                    }
                    $numrow++;
                }
                $reader->close();
                unlink('file_upload/' . $file['file_name']);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Model Pembelajaran berhasil diupload</div>');
                redirect('admin/model_pemb');
            }
        } else {
            echo "Error : " . $this->upload->display_errors();
        };
    }

    public function hapus_model_pemb($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tb_model_pemb');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Model Pembelajaran berhasil dihapus</div>');
        redirect('admin/model_pemb');
    }


    public function tugas()
    {
        $data['title'] = 'Data Pembagian Tugas';
        $data['sekolah'] = $this->db->get_where('tb_datsek')->row_array();
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['userdata'] = $this->db->get('tb_user')->result_array();
        $data['mapel'] = $this->db->get('tb_mapel')->result_array();
        $data['rombel'] = $this->db->get('tb_rombel')->result_array();
        $data['tugas'] = $this->admin->getTugas_guru();

        $this->form_validation->set_rules('user_id', 'Nama Guru', 'required|trim');
        $this->form_validation->set_rules('id_mapel', 'Mata Pelajaran', 'required|trim');
        $this->form_validation->set_rules('id_rombel', 'Kelas', 'required|trim');

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/admin_topbar', $data);
            $this->load->view('admin/tugas', $data);
            $this->load->view('templates/footer');
        } else {
            $this->admin->m_inserttugas();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Pembagian Tugas berhasil ditambah</div>');
            redirect('admin/tugas');
        }
    }

    public function editTugas($id)
    {
        $data['title'] = 'Data Pembagian Tugas';
        $data['sekolah'] = $this->db->get_where('tb_datsek')->row_array();
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['userdata'] = $this->db->get('tb_user')->result_array();
        $data['mapel'] = $this->db->get('tb_mapel')->result_array();
        $data['rombel'] = $this->db->get('tb_rombel')->result_array();
        $data['tugasId'] = $this->admin->m_tugasId($id);
        $data['tugas'] = $this->admin->getTugas_guru();

        $this->form_validation->set_rules('user_id', 'Nama Guru', 'required|trim');
        $this->form_validation->set_rules('id_mapel', 'Mata Pelajaran', 'required|trim');
        $this->form_validation->set_rules('id_rombel', 'Kelas', 'required|trim');

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/admin_topbar', $data);
            $this->load->view('admin/tugas', $data);
            $this->load->view('templates/footer');
        } else {
            $this->admin->m_edittugas($id);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Pembagian Tugas berhasil ditambah</div>');
            redirect('admin/tugas');
        }
    }

    public function hapustugas($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tb_tugas_guru');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Pembagian Tugas berhasil dihapus</div>');
        redirect('admin/tugas');
    }

    public function pengaturan()
    {
        $data['title'] = 'Pengaturan';
        $data['sekolah'] = $this->db->get_where('tb_datsek')->row_array();
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/admin_topbar', $data);
        $this->load->view('admin/pengaturan', $data);
        $this->load->view('templates/footer');
    }

    function backup()
    {
        $this->load->dbutil();
        $tanggal = date('YmdS-His');

        $config = array(
            'format'                => 'zip',
            'filename'              => 'db_erpp_' . $tanggal . '.sql',
            'add_drop'              => TRUE,
            'add_insert'            => TRUE,
            'newline'               => "\n",
            'foreign_key_checks'    => FALSE,
        );

        $backup = &$this->dbutil->backup($config);
        $nama_file = 'backup_DB_' . $tanggal . '.zip';
        $this->load->helper('download');
        force_download($nama_file, $backup);
    }

    function restore()
    {
        $this->admin->droptabel();

        $fileupload = $_FILES['restorefile'];
        $nama = $_FILES['restorefile']['name'];

        if (isset($fileupload)) {
            $lokasifile = $fileupload['tmp_name'];
            $direktori = "file_upload/restore/$nama";
            move_uploaded_file($lokasifile, "$direktori");
        }

        $isi_file = file_get_contents($direktori);
        $string_query = rtrim($isi_file, "\n;");
        $array_query = explode(";", $string_query);

        foreach ($array_query as $query) {
            $this->db->query($query);
        }
        unlink($direktori);

        echo "<script>alert('Data Berhasil di Restore')</script>";
        redirect('admin/pengaturan', 'refresh');
    }
}
