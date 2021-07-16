<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rpp extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		$this->load->model('Rpp_model', 'rpp');
	}

	public function index()
	{
		$data['title'] = 'Input Data RPP';
		$data['sekolah'] = $this->db->get_where('tb_datsek')->row_array();
		$data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['data_rpp'] = $this->rpp->datarpp('tb_rpp_data', $data['user']['id_user']);
		$data['tugas_guru'] = $this->rpp->get_tugasGuru('tb_tugas_guru', $data['user']['id_user']);
		$data['mapel'] = $this->rpp->get_data_rpp('tb_mapel');
		$data['rombel'] = $this->rpp->get_data_rpp('tb_rombel');
		$data['semester'] = $this->rpp->get_data_rpp('tb_semester');

		$this->form_validation->set_rules('id_mapel', 'Mata Pelajaran', 'required|trim');
		$this->form_validation->set_rules('id_rombel', 'Kelas', 'required|trim');
		$this->form_validation->set_rules('kode_kikd_peng', 'Kode KI KD', 'required|trim');
		$this->form_validation->set_rules('kode_kikd_ket', 'Kode KI KD', 'required|trim');
		$this->form_validation->set_rules('ket_kd_peng', 'Kompetensi Dasar', 'required|trim');
		$this->form_validation->set_rules('ket_kd_peng', 'Kompetensi Dasar', 'required|trim');
		$this->form_validation->set_rules('id_semester', 'Semester', 'required|trim');
		$this->form_validation->set_rules('alokasi_waktu', 'Alokasi Waktu', 'required|trim');
		$this->form_validation->set_rules('materi_pokok', 'Materi Pokok', 'required|trim');
		$this->form_validation->set_rules('pertemuan', 'Pertemuan', 'required|trim');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('rpp/index', $data);
			$this->load->view('templates/footer');
		} else {
			$datainput = [
				'id_mapel' => $this->input->post('id_mapel'),
				'id_rombel' => $this->input->post('id_rombel'),
				'kode_kikd_peng' => $this->input->post('kode_kikd_peng'),
				'ket_kd_peng' => $this->input->post('ket_kd_peng'),
				'kode_kikd_ket' => $this->input->post('kode_kikd_ket'),
				'ket_kd_ket' => $this->input->post('ket_kd_ket'),
				'pertemuan' => $this->input->post('pertemuan'),
				'id_semester' => $this->input->post('id_semester'),
				'alokasi_waktu' => $this->input->post('alokasi_waktu'),
				'materi_pokok' => $this->input->post('materi_pokok'),
				'user_id' => $this->input->post('user_id')
			];
			$this->rpp->insert_rpp('tb_rpp_data', $datainput);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data RPP berhasil ditambah</div>');
			redirect('rpp');
		}
	}

	public function copy_datarpp()
	{
		$data['title'] = 'Input Data RPP';
		$data['sekolah'] = $this->db->get_where('tb_datsek')->row_array();
		$data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['data_rpp'] = $this->rpp->datarpp('tb_rpp_data', $data['user']['id_user']);
		$data['tugas_guru'] = $this->rpp->get_tugasGuru('tb_tugas_guru', $data['user']['id_user']);
		$data['mapel'] = $this->rpp->get_data_rpp('tb_mapel');
		$data['rombel'] = $this->rpp->get_data_rpp('tb_rombel');
		$data['semester'] = $this->rpp->get_data_rpp('tb_semester');

		$this->form_validation->set_rules('id_rombel', 'Kelas', 'required|trim');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('rpp/index', $data);
			$this->load->view('templates/footer');
		} else {
			$datainput = [
				'id_mapel' => $this->input->post('id_mapel'),
				'id_rombel' => $this->input->post('id_rombel'),
				'kode_kikd_peng' => $this->input->post('kode_kikd_peng'),
				'ket_kd_peng' => $this->input->post('ket_kd_peng'),
				'kode_kikd_ket' => $this->input->post('kode_kikd_ket'),
				'ket_kd_ket' => $this->input->post('ket_kd_ket'),
				'pertemuan' => $this->input->post('pertemuan'),
				'id_semester' => $this->input->post('id_semester'),
				'alokasi_waktu' => $this->input->post('alokasi_waktu'),
				'materi_pokok' => $this->input->post('materi_pokok'),
				'user_id' => $this->input->post('user_id')
			];
			$this->rpp->insert_rpp('tb_rpp_data', $datainput);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data RPP berhasil ditambah</div>');
			redirect('rpp');
		}
	}

	public function edit_datarpp($id_data)
	{
		$data['title'] = 'Input Data RPP';
		$data['sekolah'] = $this->db->get_where('tb_datsek')->row_array();
		$data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['IDdata'] = $this->rpp->m_getId($id_data);
		$data['tugas_guru'] = $this->rpp->get_tugasGuru('tb_tugas_guru', $data['user']['id_user']);
		$data['mapel'] = $this->rpp->get_data_rpp('tb_mapel');
		$data['rombel'] = $this->rpp->get_data_rpp('tb_rombel');
		$data['semester'] = $this->rpp->get_data_rpp('tb_semester');

		$this->form_validation->set_rules('id_mapel', 'Mata Pelajaran', 'required|trim');
		$this->form_validation->set_rules('id_rombel', 'Kelas', 'required|trim');
		$this->form_validation->set_rules('kode_kikd_peng', 'Kode KI KD', 'required|trim');
		$this->form_validation->set_rules('kode_kikd_ket', 'Kode KI KD', 'required|trim');
		$this->form_validation->set_rules('ket_kd_peng', 'Kompetensi Dasar', 'required|trim');
		$this->form_validation->set_rules('ket_kd_peng', 'Kompetensi Dasar', 'required|trim');
		$this->form_validation->set_rules('id_semester', 'Semester', 'required|trim');
		$this->form_validation->set_rules('alokasi_waktu', 'Alokasi Waktu', 'required|trim');
		$this->form_validation->set_rules('materi_pokok', 'Materi Pokok', 'required|trim');
		$this->form_validation->set_rules('pertemuan', 'Pertemuan', 'required|trim');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('rpp/edit_data', $data);
			$this->load->view('templates/footer');
		} else {
			$datainput = [
				'id_mapel' => $this->input->post('id_mapel'),
				'id_rombel' => $this->input->post('id_rombel'),
				'kode_kikd_peng' => $this->input->post('kode_kikd_peng'),
				'ket_kd_peng' => $this->input->post('ket_kd_peng'),
				'kode_kikd_ket' => $this->input->post('kode_kikd_ket'),
				'ket_kd_ket' => $this->input->post('ket_kd_ket'),
				'pertemuan' => $this->input->post('pertemuan'),
				'id_semester' => $this->input->post('id_semester'),
				'alokasi_waktu' => $this->input->post('alokasi_waktu'),
				'materi_pokok' => $this->input->post('materi_pokok')
			];
			$this->db->where('id_data', $this->input->post('id_data'));
			$this->db->update('tb_rpp_data', $datainput);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data RPP berhasil diubah</div>');
			redirect('rpp');
		}
	}

	public function hapus_datarpp($id)
	{
		$this->db->where('id_data', $id);
		$this->db->delete('tb_rpp_data');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Data RPP berhasil dihapus</div>');
		redirect('rpp');
	}


	public function tujuan()
	{
		$data['title'] = 'Input Tujuan Pembelajaran';
		$data['sekolah'] = $this->db->get_where('tb_datsek')->row_array();
		$data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['data_tujuan'] = $this->rpp->tujuanrpp('tb_rpp_tujuan', $data['user']['id_user']);
		$data['rombel'] = $this->rpp->datarpp('tb_rpp_data', $data['user']['id_user']);
		$data['model_pemb'] = $this->rpp->get_data_rpp('tb_model_pemb');
		// $data['tujuan'] = $this->rpp->get_data_rpp('tb_rpp_tujuan');
		// $data['mapel'] = $this->rpp->get_data_rpp('tb_mapel');
		// $data['rombel'] = $this->rpp->get_data_rpp('tb_rombel');

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('rpp/tujuan', $data);
		$this->load->view('templates/footer');
	}

	public function get_kkopeng()
	{
		$auto = $this->input->get('term');
		if ($auto) {
			$getDataKKO = $this->rpp->getKKO_peng($auto);
			foreach ($getDataKKO as $row) {
				$resluts[] = array(
					'label' => $row['kko_pengetahuan']
				);
				$this->output->set_content_type('application/json')->set_output(json_encode($resluts));
			};
		}
	}

	public function get_kkoket()
	{
		$auto = $this->input->get('term');
		if ($auto) {
			$getDataKKO = $this->rpp->getKKO_ket($auto);
			foreach ($getDataKKO as $row) {
				$resluts[] = array(
					'label' => $row['kko_keterampilan']
				);
				$this->output->set_content_type('application/json')->set_output(json_encode($resluts));
			};
		}
	}

	public function get_kkosikap()
	{
		$auto = $this->input->get('term');
		if ($auto) {
			$getDataKKO = $this->rpp->getKKO_sikap($auto);
			foreach ($getDataKKO as $row) {
				$resluts[] = array(
					'label' => $row['kko_sikap']
				);
				$this->output->set_content_type('application/json')->set_output(json_encode($resluts));
			};
		}
	}

	public function get_model()
	{
		$auto = $this->input->get('term');
		if ($auto) {
			$getDatamodel = $this->rpp->getmodel_pemb($auto);
			foreach ($getDatamodel as $row) {
				$resluts[] = array(
					'label' => $row['jenis_model_pemb'],
					'model' => $row['id']
				);
				$this->output->set_content_type('application/json')->set_output(json_encode($resluts));
			};
		}
	}

	public function input_tujuan()
	{
		$data['title'] = 'Input Tujuan Pembelajaran';
		$data['sekolah'] = $this->db->get_where('tb_datsek')->row_array();
		$data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['tugas_guru'] = $this->rpp->get_tugasGuru('tb_tugas_guru', $data['user']['id_user']);
		// $data['mapel'] = $this->rpp->get_data_rpp('tb_mapel');
		// $data['rombel'] = $this->rpp->get_data_rpp('tb_rombel');
		$data['tujuan'] = $this->rpp->get_data_rpp('tb_rpp_tujuan');
		$data['mapel'] = $this->rpp->datarpp('tb_rpp_data', $data['user']['id_user']);
		$data['rombel'] = $this->rpp->datarpp('tb_rpp_data', $data['user']['id_user']);
		$data['model_pemb'] = $this->rpp->get_data_rpp('tb_model_pemb');
		$data['kko_peng'] = $this->rpp->get_data_rpp('tb_kko_pengetahuan');
		$data['kko_ket'] = $this->rpp->get_data_rpp('tb_kko_keterampilan');
		$data['kko_sikap'] = $this->rpp->get_data_rpp('tb_kko_sikap');

		$this->form_validation->set_rules('id_mapel', 'Mata Pelajaran', 'required|trim');
		$this->form_validation->set_rules('id_rombel', 'Kelas', 'required|trim');
		$this->form_validation->set_rules('t_audience', 'Audience', 'required|trim');
		$this->form_validation->set_rules('kko_pengetahuan', 'KKO Pengetahuan', 'required|trim');
		$this->form_validation->set_rules('t_behaviour', 'Behaviour', 'required|trim');
		$this->form_validation->set_rules('kko_keterampilan', 'KKO Keterampilan', 'required|trim');
		$this->form_validation->set_rules('t_behaviour_2', 'Behaviour', 'required|trim');
		// $this->form_validation->set_rules('kko_peng_2', 'KKO Pengetahuan', 'required|trim');
		// $this->form_validation->set_rules('t_behaviour_3', 'Behaviour', 'required|trim');
		$this->form_validation->set_rules('kko_sikap', 'KKO Sikap', 'required|trim');
		$this->form_validation->set_rules('t_behaviour_4', 'Behaviour', 'required|trim');
		$this->form_validation->set_rules('t_condition', 'Condition', 'required|trim');
		$this->form_validation->set_rules('t_4c', '4C', 'required|trim');
		$this->form_validation->set_rules('t_m', 'M', 'required|trim');
		$this->form_validation->set_rules('t_degree', 'Degree', 'required|trim');
		$this->form_validation->set_rules('model_pemb', 'Model Pembelajaran', 'required|trim');
		// $this->form_validation->set_rules('sumber_belajar', 'Sumber Belajar', 'required|trim');

		if ($this->form_validation->run() == false) {

			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('rpp/input_tujuan', $data);
			$this->load->view('templates/footer');
		} else {
			$datainput = [
				't_audience' => $this->input->post('t_audience'),
				'kko_1' => $this->input->post('kko_1'),
				't_behaviour' => $this->input->post('t_behaviour'),
				'kko_2' => $this->input->post('kko_2'),
				't_behaviour_2' => $this->input->post('t_behaviour_2'),
				// 'kko_3' => $this->input->post('kko_3'),
				// 't_behaviour_3' => $this->input->post('t_behaviour_3'),
				'kko_4' => $this->input->post('kko_4'),
				't_behaviour_4' => $this->input->post('t_behaviour_4'),
				't_condition' => $this->input->post('t_condition'),
				't_degree' => $this->input->post('t_degree'),
				't_4c' => $this->input->post('t_4c'),
				't_m' => $this->input->post('t_m'),
				// 'sumber_belajar' => $this->input->post('sumber_belajar'),
				'id_model_pemb' => $this->input->post('id_model_pemb'),
				'id_mapel' => $this->input->post('id_mapel'),
				'id_rombel' => $this->input->post('id_rombel'),
				'user_id' => $this->input->post('user_id')
			];
			$this->rpp->insert_rpp('tb_rpp_tujuan', $datainput);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data RPP berhasil ditambah</div>');
			redirect('rpp/tujuan');
		}
	}

	public function copy_tujuan()
	{
		$data['title'] = 'Input Tujuan Pembelajaran';
		$data['sekolah'] = $this->db->get_where('tb_datsek')->row_array();
		$data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['tugas_guru'] = $this->rpp->get_tugasGuru('tb_tugas_guru', $data['user']['id_user']);
		$data['tujuan'] = $this->rpp->get_data_rpp('tb_rpp_tujuan');
		$data['mapel'] = $this->rpp->datarpp('tb_rpp_data', $data['user']['id_user']);
		$data['rombel'] = $this->rpp->datarpp('tb_rpp_data', $data['user']['id_user']);
		$data['model_pemb'] = $this->rpp->get_data_rpp('tb_model_pemb');
		$data['kko_peng'] = $this->rpp->get_data_rpp('tb_kko_pengetahuan');
		$data['kko_ket'] = $this->rpp->get_data_rpp('tb_kko_keterampilan');
		$data['kko_sikap'] = $this->rpp->get_data_rpp('tb_kko_sikap');

		$this->form_validation->set_rules('id_rombel', 'Kelas', 'required|trim');

		if ($this->form_validation->run() == false) {

			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('rpp/input_tujuan', $data);
			$this->load->view('templates/footer');
		} else {
			$datainput = [
				't_audience' => $this->input->post('t_audience'),
				'kko_1' => $this->input->post('kko_1'),
				't_behaviour' => $this->input->post('t_behaviour'),
				'kko_2' => $this->input->post('kko_2'),
				't_behaviour_2' => $this->input->post('t_behaviour_2'),
				// 'kko_3' => $this->input->post('kko_3'),
				// 't_behaviour_3' => $this->input->post('t_behaviour_3'),
				'kko_4' => $this->input->post('kko_4'),
				't_behaviour_4' => $this->input->post('t_behaviour_4'),
				't_condition' => $this->input->post('t_condition'),
				't_degree' => $this->input->post('t_degree'),
				't_4c' => $this->input->post('t_4c'),
				't_m' => $this->input->post('t_m'),
				// 'sumber_belajar' => $this->input->post('sumber_belajar'),
				'id_model_pemb' => $this->input->post('id_model_pemb'),
				'id_mapel' => $this->input->post('id_mapel'),
				'id_rombel' => $this->input->post('id_rombel'),
				'user_id' => $this->input->post('user_id')
			];
			$this->rpp->insert_rpp('tb_rpp_tujuan', $datainput);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data RPP berhasil ditambah</div>');
			redirect('rpp/tujuan');
		}
	}

	public function edit_tujuan($id_tujuan)
	{
		$data['title'] = 'Input Tujuan Pembelajaran';
		$data['sekolah'] = $this->db->get_where('tb_datsek')->row_array();
		$data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['tujuanID'] = $this->rpp->tujuanId($id_tujuan);
		$data['mapel'] = $this->rpp->datarpp('tb_rpp_data', $data['user']['id_user']);
		$data['rombel'] = $this->rpp->datarpp('tb_rpp_data', $data['user']['id_user']);
		$data['model_pemb'] = $this->rpp->get_data_rpp('tb_model_pemb');
		$data['kko_peng'] = $this->rpp->get_data_rpp('tb_kko_pengetahuan');
		$data['kko_ket'] = $this->rpp->get_data_rpp('tb_kko_keterampilan');
		$data['kko_sikap'] = $this->rpp->get_data_rpp('tb_kko_sikap');

		$this->form_validation->set_rules('id_mapel', 'Mata Pelajaran', 'required|trim');
		$this->form_validation->set_rules('id_rombel', 'Kelas', 'required|trim');
		$this->form_validation->set_rules('t_audience', 'Audience', 'required|trim');
		$this->form_validation->set_rules('kko_pengetahuan', 'KKO Pengetahuan', 'required|trim');
		$this->form_validation->set_rules('t_behaviour', 'Behaviour', 'required|trim');
		$this->form_validation->set_rules('kko_keterampilan', 'KKO Keterampilan', 'required|trim');
		$this->form_validation->set_rules('t_behaviour_2', 'Behaviour', 'required|trim');
		// $this->form_validation->set_rules('kko_peng_2', 'KKO Pengetahuan', 'required|trim');
		// $this->form_validation->set_rules('t_behaviour_3', 'Behaviour', 'required|trim');
		$this->form_validation->set_rules('kko_sikap', 'KKO Sikap', 'required|trim');
		$this->form_validation->set_rules('t_behaviour_4', 'Behaviour', 'required|trim');
		$this->form_validation->set_rules('t_condition', 'Condition', 'required|trim');
		$this->form_validation->set_rules('t_4c', '4C', 'required|trim');
		$this->form_validation->set_rules('t_m', 'M', 'required|trim');
		$this->form_validation->set_rules('t_degree', 'Degree', 'required|trim');
		$this->form_validation->set_rules('model_pemb', 'Model Pembelajaran', 'required|trim');
		// $this->form_validation->set_rules('sumber_belajar', 'Sumber Belajar', 'required|trim');

		if ($this->form_validation->run() == false) {

			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('rpp/edit_tujuan', $data);
			$this->load->view('templates/footer');
		} else {
			$datainput = [
				't_audience' => $this->input->post('t_audience'),
				'kko_1' => $this->input->post('kko_1'),
				't_behaviour' => $this->input->post('t_behaviour'),
				'kko_2' => $this->input->post('kko_2'),
				't_behaviour_2' => $this->input->post('t_behaviour_2'),
				// 'kko_3' => $this->input->post('kko_3'),
				// 't_behaviour_3' => $this->input->post('t_behaviour_3'),
				'kko_4' => $this->input->post('kko_4'),
				't_behaviour_4' => $this->input->post('t_behaviour_4'),
				't_condition' => $this->input->post('t_condition'),
				't_degree' => $this->input->post('t_degree'),
				't_4c' => $this->input->post('t_4c'),
				't_m' => $this->input->post('t_m'),
				// 'sumber_belajar' => $this->input->post('sumber_belajar'),
				'id_model_pemb' => $this->input->post('model_pemb'),
				'id_mapel' => $this->input->post('id_mapel'),
				'id_rombel' => $this->input->post('id_rombel'),
				'user_id' => $this->input->post('user_id')
			];
			$this->db->where('id_tujuan', $this->input->post('id_tujuan'));
			$this->db->update('tb_rpp_tujuan', $datainput);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data RPP berhasil ditambah</div>');
			redirect('rpp/tujuan');
		}
	}

	public function hapus_tujuan($id)
	{
		$this->db->where('id_tujuan', $id);
		$this->db->delete('tb_rpp_tujuan');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Data RPP berhasil dihapus</div>');
		redirect('rpp/tujuan');
	}

	public function model()
	{
		$data['title'] = 'Input Model Pembelajaran';
		$data['sekolah'] = $this->db->get_where('tb_datsek')->row_array();
		$data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['data_model'] = $this->rpp->modelrpp('tb_rpp_model', $data['user']['id_user']);
		$data['rombel'] = $this->rpp->datarpp('tb_rpp_data', $data['user']['id_user']);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('rpp/model_pemb', $data);
		$this->load->view('templates/footer');
	}

	public function input_model()
	{
		$data['title'] = 'Input Model Pembelajaran';
		$data['sekolah'] = $this->db->get_where('tb_datsek')->row_array();
		$data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
		// $data['tugas_guru'] = $this->rpp->get_tugasGuru('tb_tugas_guru', $data['user']['id_user']);
		// $data['mapel'] = $this->rpp->get_data_rpp('tb_mapel');
		// $data['rombel'] = $this->rpp->get_data_rpp('tb_rombel');
		// $data['model'] = $this->rpp->get_data_rpp('tb_model_pemb');
		$data['tujuan'] = $this->rpp->tujuanrpp('tb_rpp_tujuan', $data['user']['id_user']);
		$data['mapel'] = $this->rpp->datarpp('tb_rpp_data', $data['user']['id_user']);
		$data['rombel'] = $this->rpp->datarpp('tb_rpp_data', $data['user']['id_user']);

		$this->form_validation->set_rules('id_model_pemb', 'Model Pembelajaran', 'required|trim');
		$this->form_validation->set_rules('id_mapel', 'Mata Pelajaran', 'required|trim');
		$this->form_validation->set_rules('id_rombel', 'Kelas', 'required|trim');
		$this->form_validation->set_rules('keg_awal_1', 'Kegiatan Pertama', 'required|trim');
		$this->form_validation->set_rules('keg_awal_2', 'Kegiatan Kedua', 'required|trim');
		$this->form_validation->set_rules('keg_awal_3', 'Kegiatan Ketiga', 'required|trim');
		$this->form_validation->set_rules('keg_akhir_1', 'Judul Pendahuluan', 'required|trim');
		$this->form_validation->set_rules('keg_akhir_2', 'Judul Inti', 'required|trim');
		$this->form_validation->set_rules('keg_akhir_3', 'Judul Inti', 'required|trim');
		$this->form_validation->set_rules('sintak1', 'Sintak', 'required|trim');
		$this->form_validation->set_rules('aktifitas1', 'Aktifitas', 'required|trim');
		$this->form_validation->set_rules('sintak2', 'Sintak', 'required|trim');
		$this->form_validation->set_rules('aktifitas2', 'Aktifitas', 'required|trim');
		$this->form_validation->set_rules('sintak3', 'Sintak', 'required|trim');
		$this->form_validation->set_rules('aktifitas3', 'Aktifitas', 'required|trim');
		$this->form_validation->set_rules('sintak4', 'Sintak', 'required|trim');
		$this->form_validation->set_rules('aktifitas4', 'Aktifitas', 'required|trim');
		$this->form_validation->set_rules('sintak5', 'Sintak', 'required|trim');
		$this->form_validation->set_rules('aktifitas5', 'Aktifitas', 'required|trim');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('rpp/model_pemb_input', $data);
			$this->load->view('templates/footer');
		} else {
			$datainput = [
				'id_model_pemb' => $this->input->post('id_model_pemb'),
				'id_mapel' => $this->input->post('id_mapel'),
				'id_rombel' => $this->input->post('id_rombel'),
				'keg_awal_1' => $this->input->post('keg_awal_1'),
				'keg_awal_2' => $this->input->post('keg_awal_2'),
				'keg_awal_3' => $this->input->post('keg_awal_3'),
				'keg_akhir_1' => $this->input->post('keg_akhir_1'),
				'keg_akhir_2' => $this->input->post('keg_akhir_2'),
				'keg_akhir_3' => $this->input->post('keg_akhir_3'),
				'sintak1' => $this->input->post('sintak1'),
				'aktifitas1' => $this->input->post('aktifitas1'),
				'sintak2' => $this->input->post('sintak2'),
				'aktifitas2' => $this->input->post('aktifitas2'),
				'sintak3' => $this->input->post('sintak3'),
				'aktifitas3' => $this->input->post('aktifitas3'),
				'sintak4' => $this->input->post('sintak4'),
				'aktifitas4' => $this->input->post('aktifitas4'),
				'sintak5' => $this->input->post('sintak5'),
				'aktifitas5' => $this->input->post('aktifitas5'),
				'user_id' => $this->input->post('user_id')
			];
			$this->rpp->insert_rpp('tb_rpp_model', $datainput);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data RPP berhasil ditambah</div>');
			redirect('rpp/model');
		}
	}

	public function copy_model()
	{
		$data['title'] = 'Input Model Pembelajaran';
		$data['sekolah'] = $this->db->get_where('tb_datsek')->row_array();
		$data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['tujuan'] = $this->rpp->tujuanrpp('tb_rpp_tujuan', $data['user']['id_user']);
		$data['mapel'] = $this->rpp->datarpp('tb_rpp_data', $data['user']['id_user']);
		$data['rombel'] = $this->rpp->datarpp('tb_rpp_data', $data['user']['id_user']);

		$this->form_validation->set_rules('id_rombel', 'Kelas', 'required|trim');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('rpp/model_pemb_input', $data);
			$this->load->view('templates/footer');
		} else {
			$datainput = [
				'id_model_pemb' => $this->input->post('id_model_pemb'),
				'id_mapel' => $this->input->post('id_mapel'),
				'id_rombel' => $this->input->post('id_rombel'),
				'keg_awal_1' => $this->input->post('keg_awal_1'),
				'keg_awal_2' => $this->input->post('keg_awal_2'),
				'keg_awal_3' => $this->input->post('keg_awal_3'),
				'keg_akhir_1' => $this->input->post('keg_akhir_1'),
				'keg_akhir_2' => $this->input->post('keg_akhir_2'),
				'keg_akhir_3' => $this->input->post('keg_akhir_3'),
				'sintak1' => $this->input->post('sintak1'),
				'aktifitas1' => $this->input->post('aktifitas1'),
				'sintak2' => $this->input->post('sintak2'),
				'aktifitas2' => $this->input->post('aktifitas2'),
				'sintak3' => $this->input->post('sintak3'),
				'aktifitas3' => $this->input->post('aktifitas3'),
				'sintak4' => $this->input->post('sintak4'),
				'aktifitas4' => $this->input->post('aktifitas4'),
				'sintak5' => $this->input->post('sintak5'),
				'aktifitas5' => $this->input->post('aktifitas5'),
				'user_id' => $this->input->post('user_id')
			];
			$this->rpp->insert_rpp('tb_rpp_model', $datainput);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data RPP berhasil ditambah</div>');
			redirect('rpp/model');
		}
	}

	public function edit_model($id_model)
	{
		$data['title'] = 'Input Model Pembelajaran';
		$data['sekolah'] = $this->db->get_where('tb_datsek')->row_array();
		$data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['modeldata'] = $this->rpp->modelID($id_model);
		// $data['tugas_guru'] = $this->rpp->get_tugasGuru('tb_tugas_guru', $data['user']['id_user']);
		// $data['mapel'] = $this->rpp->get_data_rpp('tb_mapel');
		// $data['rombel'] = $this->rpp->get_data_rpp('tb_rombel');
		// $data['model'] = $this->rpp->get_data_rpp('tb_model_pemb');
		$data['mapel'] = $this->rpp->datarpp('tb_rpp_data', $data['user']['id_user']);
		$data['rombel'] = $this->rpp->datarpp('tb_rpp_data', $data['user']['id_user']);
		$data['tujuan'] = $this->rpp->tujuanrpp('tb_rpp_tujuan', $data['user']['id_user']);

		$this->form_validation->set_rules('id_model_pemb', 'Model Pembelajaran', 'required|trim');
		$this->form_validation->set_rules('id_mapel', 'Mata Pelajaran', 'required|trim');
		$this->form_validation->set_rules('id_rombel', 'Kelas', 'required|trim');
		$this->form_validation->set_rules('keg_awal_1', 'Kegiatan Pertama', 'required|trim');
		$this->form_validation->set_rules('keg_awal_2', 'Kegiatan Kedua', 'required|trim');
		$this->form_validation->set_rules('keg_awal_3', 'Kegiatan Ketiga', 'required|trim');
		$this->form_validation->set_rules('keg_akhir_1', 'Judul Pendahuluan', 'required|trim');
		$this->form_validation->set_rules('keg_akhir_2', 'Judul Inti', 'required|trim');
		$this->form_validation->set_rules('keg_akhir_3', 'Judul Inti', 'required|trim');
		$this->form_validation->set_rules('sintak1', 'Sintak', 'required|trim');
		$this->form_validation->set_rules('aktifitas1', 'Aktifitas', 'required|trim');
		$this->form_validation->set_rules('sintak2', 'Sintak', 'required|trim');
		$this->form_validation->set_rules('aktifitas2', 'Aktifitas', 'required|trim');
		$this->form_validation->set_rules('sintak3', 'Sintak', 'required|trim');
		$this->form_validation->set_rules('aktifitas3', 'Aktifitas', 'required|trim');
		$this->form_validation->set_rules('sintak4', 'Sintak', 'required|trim');
		$this->form_validation->set_rules('aktifitas4', 'Aktifitas', 'required|trim');
		$this->form_validation->set_rules('sintak5', 'Sintak', 'required|trim');
		$this->form_validation->set_rules('aktifitas5', 'Aktifitas', 'required|trim');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('rpp/model_pemb_edit', $data);
			$this->load->view('templates/footer');
		} else {
			$datainput = [
				'id_model_pemb' => $this->input->post('id_model_pemb'),
				'id_mapel' => $this->input->post('id_mapel'),
				'id_rombel' => $this->input->post('id_rombel'),
				'keg_awal_1' => $this->input->post('keg_awal_1'),
				'keg_awal_2' => $this->input->post('keg_awal_2'),
				'keg_awal_3' => $this->input->post('keg_awal_3'),
				'keg_akhir_1' => $this->input->post('keg_akhir_1'),
				'keg_akhir_2' => $this->input->post('keg_akhir_2'),
				'keg_akhir_3' => $this->input->post('keg_akhir_3'),
				'sintak1' => $this->input->post('sintak1'),
				'aktifitas1' => $this->input->post('aktifitas1'),
				'sintak2' => $this->input->post('sintak2'),
				'aktifitas2' => $this->input->post('aktifitas2'),
				'sintak3' => $this->input->post('sintak3'),
				'aktifitas3' => $this->input->post('aktifitas3'),
				'sintak4' => $this->input->post('sintak4'),
				'aktifitas4' => $this->input->post('aktifitas4'),
				'sintak5' => $this->input->post('sintak5'),
				'aktifitas5' => $this->input->post('aktifitas5'),
				'user_id' => $this->input->post('user_id')
			];
			$this->db->where('id_model', $this->input->post('id_model'));
			$this->db->update('tb_rpp_model', $datainput);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data RPP berhasil diubah</div>');
			redirect('rpp/model');
		}
	}

	public function hapus_model($id)
	{
		$this->db->where('id_model', $id);
		$this->db->delete('tb_rpp_model');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Data RPP berhasil dihapus</div>');
		redirect('rpp/model');
	}

	public function penilaian()
	{
		$data['title'] = 'Input Penilaian';
		$data['sekolah'] = $this->db->get_where('tb_datsek')->row_array();
		$data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['nilai'] = $this->rpp->penilainrpp('tb_rpp_penilaian', $data['user']['id_user']);
		$data['tugas_guru'] = $this->rpp->get_tugasGuru('tb_tugas_guru', $data['user']['id_user']);
		$data['mapel'] = $this->rpp->datarpp('tb_rpp_data', $data['user']['id_user']);
		$data['rombel'] = $this->rpp->datarpp('tb_rpp_data', $data['user']['id_user']);
		// $data['mapel'] = $this->rpp->get_data_rpp('tb_mapel');
		// $data['rombel'] = $this->rpp->get_data_rpp('tb_rombel');

		$this->form_validation->set_rules('id_rombel', 'Kelas', 'required|trim');
		$this->form_validation->set_rules('id_mapel', 'Mata Pelajaran', 'required|trim');
		$this->form_validation->set_rules('judul_penilaian', 'Kegiatan Pendahuluan', 'required|trim');
		$this->form_validation->set_rules('pengetahuan', 'Judul Pendahuluan', 'required|trim');
		$this->form_validation->set_rules('keterampilan', 'Judul Pendahuluan', 'required|trim');
		$this->form_validation->set_rules('sikap', 'Kegiatan Pendahuluan', 'required|trim');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('rpp/penilaian', $data);
			$this->load->view('templates/footer');
		} else {
			$datainput = [
				'user_id' => $this->input->post('user_id'),
				'id_rombel' => $this->input->post('id_rombel'),
				'id_mapel' => $this->input->post('id_mapel'),
				'judul_penilaian' => $this->input->post('judul_penilaian'),
				'pengetahuan' => $this->input->post('pengetahuan'),
				'keterampilan' => $this->input->post('keterampilan'),
				'sikap' => $this->input->post('sikap')
			];
			$this->rpp->insert_rpp('tb_rpp_penilaian', $datainput);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data RPP berhasil ditambah</div>');
			redirect('rpp/penilaian');
		}
	}

	public function copy_penilaian()
	{
		$data['title'] = 'Input Penilaian';
		$data['sekolah'] = $this->db->get_where('tb_datsek')->row_array();
		$data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['nilai'] = $this->rpp->penilainrpp('tb_rpp_penilaian', $data['user']['id_user']);
		$data['tugas_guru'] = $this->rpp->get_tugasGuru('tb_tugas_guru', $data['user']['id_user']);
		$data['mapel'] = $this->rpp->datarpp('tb_rpp_data', $data['user']['id_user']);
		$data['rombel'] = $this->rpp->datarpp('tb_rpp_data', $data['user']['id_user']);

		$this->form_validation->set_rules('id_rombel', 'Kelas', 'required|trim');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('rpp/penilaian', $data);
			$this->load->view('templates/footer');
		} else {
			$datainput = [
				'user_id' => $this->input->post('user_id'),
				'id_rombel' => $this->input->post('id_rombel'),
				'id_mapel' => $this->input->post('id_mapel'),
				'judul_penilaian' => $this->input->post('judul_penilaian'),
				'pengetahuan' => $this->input->post('pengetahuan'),
				'keterampilan' => $this->input->post('keterampilan'),
				'sikap' => $this->input->post('sikap')
			];
			$this->rpp->insert_rpp('tb_rpp_penilaian', $datainput);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data RPP berhasil ditambah</div>');
			redirect('rpp/penilaian');
		}
	}

	public function edit_penilaian($id_nilai)
	{
		$data['title'] = 'Input Penilaian';
		$data['sekolah'] = $this->db->get_where('tb_datsek')->row_array();
		$data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['nilaidata'] = $this->rpp->IDnilai($id_nilai);
		$data['mapel'] = $this->rpp->datarpp('tb_rpp_data', $data['user']['id_user']);
		$data['rombel'] = $this->rpp->datarpp('tb_rpp_data', $data['user']['id_user']);
		// $data['mapel'] = $this->rpp->get_data_rpp('tb_mapel');
		// $data['rombel'] = $this->rpp->get_data_rpp('tb_rombel');

		$this->form_validation->set_rules('id_rombel', 'Kelas', 'required|trim');
		$this->form_validation->set_rules('id_mapel', 'Mata Pelajaran', 'required|trim');
		$this->form_validation->set_rules('judul_penilaian', 'Kegiatan Pendahuluan', 'required|trim');
		$this->form_validation->set_rules('pengetahuan', 'Judul Pendahuluan', 'required|trim');
		$this->form_validation->set_rules('keterampilan', 'Judul Pendahuluan', 'required|trim');
		$this->form_validation->set_rules('sikap', 'Kegiatan Pendahuluan', 'required|trim');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('rpp/edit_penilaian', $data);
			$this->load->view('templates/footer');
		} else {
			$datainput = [
				'user_id' => $this->input->post('user_id'),
				'id_rombel' => $this->input->post('id_rombel'),
				'id_mapel' => $this->input->post('id_mapel'),
				'judul_penilaian' => $this->input->post('judul_penilaian'),
				'pengetahuan' => $this->input->post('pengetahuan'),
				'keterampilan' => $this->input->post('keterampilan'),
				'sikap' => $this->input->post('sikap')
			];
			$this->db->where('id_nilai', $this->input->post('id_nilai'));
			$this->db->update('tb_rpp_penilaian', $datainput);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data RPP berhasil ditambah</div>');
			redirect('rpp/penilaian');
		}
	}

	public function hapus_penilaian($id)
	{
		$this->db->where('id_nilai', $id);
		$this->db->delete('tb_rpp_penilaian');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Data RPP berhasil dihapus</div>');
		redirect('rpp/penilaian');
	}

	public function cetak()
	{
		$data['title'] = 'Cetak RPP 1 Lembar';
		$data['sekolah'] = $this->db->get_where('tb_datsek')->row_array();
		$data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['cetak_rpp'] = $this->rpp->cetakrpp('tb_rpp_cetak', $data['user']['id_user']);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('rpp/cetak_rpp', $data);
		$this->load->view('templates/footer');
	}

	public function cetak_input()
	{
		$data['title'] = 'Cetak RPP 1 Lembar';
		$data['sekolah'] = $this->db->get_where('tb_datsek')->row_array();
		$data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['cetak_rpp'] = $this->rpp->cetakrpp('tb_rpp_cetak', $data['user']['id_user']);
		$data['mapel'] = $this->rpp->datarpp('tb_rpp_data', $data['user']['id_user']);
		$data['rombel'] = $this->rpp->datarpp('tb_rpp_data', $data['user']['id_user']);
		$data['dataRPP'] = $this->rpp->datarpp('tb_rpp_data', $data['user']['id_user']);
		$data['tujuanRPP'] = $this->rpp->tujuanrpp('tb_rpp_tujuan', $data['user']['id_user']);
		$data['modelRPP'] = $this->rpp->modelrpp('tb_rpp_model', $data['user']['id_user']);
		$data['nilaiRPP'] = $this->rpp->penilainrpp('tb_rpp_penilaian', $data['user']['id_user']);

		$this->form_validation->set_rules('id_rombel', 'Rombel', 'required|trim');
		$this->form_validation->set_rules('id_mapel', 'Mata Pelajaran', 'required|trim');
		$this->form_validation->set_rules('id_rpp_data', 'Kompetensi Dasar', 'required|trim');
		$this->form_validation->set_rules('id_rpp_tujuan', 'Data Audience', 'required|trim');
		$this->form_validation->set_rules('id_rpp_model', 'Model Pembelajaran', 'required|trim');
		$this->form_validation->set_rules('id_rpp_penilaian', 'Judul Penilaian', 'required|trim');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('rpp/cetak_input', $data);
			$this->load->view('templates/footer');
		} else {
			$datainput = [
				'id_users' => $this->input->post('user_id'),
				// 'id_rombel' => $this->input->post('id_rombel'),
				'id_kelas' => $this->input->post('id_rombel'),
				// 'id_mapel' => $this->input->post('id_mapel'),
				'id_matpel' => $this->input->post('id_mapel'),
				'id_rpp_data' => $this->input->post('id_rpp_data'),
				'id_rpp_tujuan' => $this->input->post('id_rpp_tujuan'),
				'id_rpp_model' => $this->input->post('id_rpp_model'),
				'id_rpp_penilaian' => $this->input->post('id_rpp_penilaian'),
				'status' => 'N'
			];
			$this->rpp->insert_rpp('tb_rpp_cetak', $datainput);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data RPP berhasil ditambah</div>');
			redirect('rpp/cetak');
		}
	}

	public function cetak_edit($id_cetak)
	{
		$data['title'] = 'Cetak RPP 1 Lembar';
		$data['sekolah'] = $this->db->get_where('tb_datsek')->row_array();
		$data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['cetak_rpp'] = $this->rpp->IDcetak_edit($id_cetak);
		$data['dataRPP'] = $this->rpp->datarpp('tb_rpp_data', $data['user']['id_user']);
		$data['tujuanRPP'] = $this->rpp->tujuanrpp('tb_rpp_tujuan', $data['user']['id_user']);
		$data['modelRPP'] = $this->rpp->modelrpp('tb_rpp_model', $data['user']['id_user']);
		$data['nilaiRPP'] = $this->rpp->penilainrpp('tb_rpp_penilaian', $data['user']['id_user']);

		$this->form_validation->set_rules('id_rombel', 'Rombel', 'required|trim');
		$this->form_validation->set_rules('id_mapel', 'Mata Pelajaran', 'required|trim');
		$this->form_validation->set_rules('id_rpp_data', 'Kompetensi Dasar', 'required|trim');
		$this->form_validation->set_rules('id_rpp_tujuan', 'Data Audience', 'required|trim');
		$this->form_validation->set_rules('id_rpp_model', 'Model Pembelajaran', 'required|trim');
		$this->form_validation->set_rules('id_rpp_penilaian', 'Judul Penilaian', 'required|trim');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('rpp/cetak_edit', $data);
			$this->load->view('templates/footer');
		} else {
			$datainput = [
				'id_users' => $this->input->post('user_id'),
				// 'id_rombel' => $this->input->post('id_rombel'),
				'id_kelas' => $this->input->post('id_rombel'),
				// 'id_mapel' => $this->input->post('id_mapel'),
				'id_matpel' => $this->input->post('id_mapel'),
				'id_rpp_data' => $this->input->post('id_rpp_data'),
				'id_rpp_tujuan' => $this->input->post('id_rpp_tujuan'),
				'id_rpp_model' => $this->input->post('id_rpp_model'),
				'id_rpp_penilaian' => $this->input->post('id_rpp_penilaian'),
				'status' => 'N'
			];
			$this->db->where('id_cetak', $this->input->post('id_cetak'));
			$this->db->update('tb_rpp_cetak', $datainput);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data RPP berhasil diubah</div>');
			redirect('rpp/cetak');
		}
	}

	public function cetak_detail($id_cetak)
	{
		$data['title'] = 'Hasil RPP 1 Lembar';
		$data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['cetak_rpp'] = $this->rpp->IDcetak($id_cetak, $data['user']['id_user']);
		// var_dump($data['cetak_rpp']);
		// die;
		$data['sekolah'] = $this->db->get_where('tb_datsek')->row_array();

		$this->load->view('templates/header', $data);
		$this->load->view('rpp/cetak_detail', $data);
	}

	public function cetak_hapus($id)
	{
		$this->db->where('id_cetak', $id);
		$this->db->delete('tb_rpp_cetak');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Data RPP berhasil dihapus</div>');
		redirect('rpp/cetak');
	}

	// public function toPDF()
	// {
	// 	$this->load->library('dompdf_gen');

	// 	$data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
	// 	$data['cetak_rpp'] = $this->rpp->cetakrpp('tb_rpp_cetak', $data['user']['id_user']);
	// 	$data['sekolah'] = $this->db->get('tb_datsek')->row_array();
	// 	$data['mapel'] = $this->rpp->datarpp('tb_rpp_data', $data['user']['id_user']);
	// 	$data['rombel'] = $this->rpp->datarpp('tb_rpp_data', $data['user']['id_user']);
	// 	$data['dataRPP'] = $this->rpp->datarpp('tb_rpp_data', $data['user']['id_user']);
	// 	$data['tujuanRPP'] = $this->rpp->tujuanrpp('tb_rpp_tujuan', $data['user']['id_user']);
	// 	$data['modelRPP'] = $this->rpp->modelrpp('tb_rpp_model', $data['user']['id_user']);
	// 	$data['nilaiRPP'] = $this->rpp->penilainrpp('tb_rpp_penilaian', $data['user']['id_user']);

	// 	$this->load->view('templates/header', $data);
	// 	$this->load->view('rpp/cetak_pdf', $data);

	// 	$paper_size 	= 'A4';
	// 	$orientation 	= 'potrait';
	// 	$html 			= $this->output->get_output();
	// 	$this->dompdf->set_paper($paper_size, $orientation);

	// 	$this->dompdf->load_html($html);
	// 	$this->dompdf->render();
	// 	$this->dompdf->stream('RPP_1_Lembar_' . $data['user']['nama'] . '.pdf', array('Attachment' => 0));
	// }

	public function print_rpp()
	{
		$data['title'] = 'Cetak RPP 1 Lembar';
		$data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['cetak_rpp'] = $this->rpp->printrpp($data['user']['id_user']);
		$data['sekolah'] = $this->db->get('tb_datsek')->row_array();

		$this->load->view('templates/header', $data);
		$this->load->view('rpp/cetak_hasil', $data);
		// $this->load->view('rpp/footer', $data);
	}
}
