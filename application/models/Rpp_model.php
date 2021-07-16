<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rpp_model extends CI_Model
{
    public function m_getId($id_data)
    {
        return $this->db->get_where('tb_rpp_data', ['id_data' => $id_data])->row_array();
    }

    public function tujuanId($id_tujuan)
    {
        return $this->db->get_where('tb_rpp_tujuan', ['id_tujuan' => $id_tujuan])->row_array();
    }

    // public function tujuan_Id($id_tujuan)
    // {
    //     return $this->db->from('tb_rpp_cetak')
    //         ->join('tb_model_pemb', 'tb_model_pemb.id=id_model_pemb')
    //         ->where(['id_tujuan' => $id_tujuan])
    //         ->get()
    //         ->row_array();
    //     // return $this->db->get_where('tb_rpp_tujuan', ['id_tujuan' => $id_tujuan])->row_array();
    // }

    public function modelID($id_model)
    {
        return $this->db->get_where('tb_rpp_model', ['id_model' => $id_model])->row_array();
    }

    public function IDnilai($id_nilai)
    {
        return $this->db->get_where('tb_rpp_penilaian', ['id_nilai' => $id_nilai])->row_array();
    }

    public function IDcetak_edit($id_cetak)
    {
        return $this->db->get_where('tb_rpp_cetak', ['id_cetak' => $id_cetak])->row_array();
    }

    public function IDcetak($id_cetak, $id_user)
    {
        // return $this->db->get_where('tb_rpp_cetak', ['id_cetak' => $id_cetak])->row_array();
        return $this->db->from('tb_rpp_cetak')
            ->join('tb_rpp_data', 'tb_rpp_data.id_data=id_rpp_data')
            ->join('tb_semester', 'tb_semester.id=id_semester')
            ->join('tb_rpp_tujuan', 'tb_rpp_tujuan.id_tujuan=id_rpp_tujuan')
            ->join('tb_rpp_model', 'tb_rpp_model.id_model=id_rpp_model')
            ->join('tb_model_pemb', 'tb_model_pemb.id=tb_rpp_model.id_model_pemb')
            ->join('tb_rpp_penilaian', 'tb_rpp_penilaian.id_nilai=id_rpp_penilaian')
            // ->join('tb_mapel', 'tb_mapel.id=tb_rpp_data.id_mapel')
            // ->join('tb_rombel', 'tb_rombel.id=tb_rpp_data.id_rombel')
            ->join('tb_mapel', 'tb_mapel.id=id_matpel')
            ->join('tb_rombel', 'tb_rombel.id=id_kelas')
            ->where(['id_cetak' => $id_cetak])
            ->where(['status' => 'Y'])
            ->where(['id_users' => $id_user])
            ->get()
            ->row_array();
    }

    function get_data_rpp($table)
    {
        return $this->db->get($table)->result_array();
    }

    function insert_rpp($table, $datainput)
    {
        return $this->db->insert($table, $datainput);
    }

    // function cetak_deatil($table)
    // {
    //     return $this->db->from($table)
    //         ->join('tb_user', 'tb_user.id_user=user_id')
    //         ->join('tb_mapel', 'tb_mapel.id=id_mapel', 'left')
    //         ->join('tb_rombel', 'tb_rombel.id=id_rombel', 'left')
    //         ->join('tb_semester', 'tb_semester.id=id_semester', 'left')
    //         ->join('tb_rpp_data', 'tb_rpp_data.id_data=id_rpp_data', 'left')
    //         ->join('tb_rpp_tujuan', 'tb_rpp_tujuan.id_tujuan=id_rpp_tujuan', 'left')
    //         ->join('tb_rpp_model', 'tb_rpp_model.id_model=id_rpp_model', 'left')
    //         ->join('tb_rpp_penilaian', 'tb_rpp_penilaian.id_nilai=id_rpp_penilaian', 'left')
    //         ->where($table.'.')
    // }


    function datarpp($table, $id)
    {
        return $this->db->from($table)
            ->join('tb_user', 'tb_user.id_user=user_id')
            ->join('tb_mapel', 'tb_mapel.id=id_mapel', 'left')
            // ->join('tb_mapel', 'tb_mapel.id=tb_tugas_guru.id_mapel', 'left')
            ->join('tb_rombel', 'tb_rombel.id=id_rombel', 'left')
            ->join('tb_semester', 'tb_semester.id=id_semester', 'left')
            ->where($table . '.user_id', $id)
            ->get()
            ->result();
    }

    function get_tugasGuru($table, $id)
    {
        return $this->db->from($table)
            ->join('tb_user', 'tb_user.id_user=user_id')
            ->join('tb_mapel', 'tb_mapel.id=id_mapel', 'left')
            ->join('tb_rombel', 'tb_rombel.id=id_rombel', 'left')
            ->where($table . '.user_id', $id)
            ->get()
            ->result();
    }

    function edit_data_rpp()
    {
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
        return $this->db->update('tb_rpp_data', $datainput);
    }

    public function getKKO_peng($auto)
    {
        $this->db->select('*');
        $this->db->from('tb_kko');
        $this->db->like('kko_pengetahuan', $auto);
        $this->db->limit(10);
        return $this->db->get()->result_array();
    }

    public function getKKO_ket($auto)
    {
        $this->db->select('*');
        $this->db->from('tb_kko');
        $this->db->like('kko_keterampilan', $auto);
        $this->db->limit(10);
        return $this->db->get()->result_array();
    }

    public function getKKO_sikap($auto)
    {
        $this->db->select('*');
        $this->db->from('tb_kko');
        $this->db->like('kko_sikap', $auto);
        $this->db->limit(10);
        return $this->db->get()->result_array();
    }

    public function getmodel_pemb($auto)
    {
        $this->db->select('*');
        $this->db->from('tb_model_pemb');
        $this->db->like('jenis_model_pemb', $auto);
        $this->db->limit(10);
        return $this->db->get()->result_array();
    }

    function tujuanrpp($table, $id)
    {
        return $this->db->from($table)
            ->join('tb_user', 'tb_user.id_user=user_id')
            ->join('tb_mapel', 'tb_mapel.id=id_mapel', 'right')
            ->join('tb_rombel', 'tb_rombel.id=id_rombel', 'right')
            ->join('tb_model_pemb', 'tb_model_pemb.id=id_model_pemb', 'right')
            ->where($table . '.user_id', $id)
            ->get()
            ->result();
    }

    function modelrpp($table, $id)
    {
        return $this->db->from($table)
            ->join('tb_user', 'tb_user.id_user=user_id')
            ->join('tb_mapel', 'tb_mapel.id=id_mapel', 'right')
            ->join('tb_rombel', 'tb_rombel.id=id_rombel', 'right')
            ->join('tb_model_pemb', 'tb_model_pemb.id=id_model_pemb', 'right')
            ->where($table . '.user_id', $id)
            ->get()
            ->result();
    }

    function model_n_tujuan($table, $id)
    {
        return $this->db->from($table)
            ->join('tb_rpp_tujuan', 'tb_rpp_tujuan.id_tujuan=user_id')
            ->where($table . '.user_id', $id)
            ->get()
            ->result();
    }

    function penilainrpp($table, $id)
    {
        return $this->db->from($table)
            ->join('tb_user', 'tb_user.id_user=user_id')
            ->join('tb_mapel', 'tb_mapel.id=id_mapel', 'right')
            ->join('tb_rombel', 'tb_rombel.id=id_rombel', 'right')
            ->where($table . '.user_id', $id)
            ->get()
            ->result();
    }

    function cetakrpp($table, $id)
    {
        return $this->db->from($table)
            // ->join('tb_user', 'tb_user.id_user=tb_rpp_data.user_id')
            // ->join('tb_mapel', 'tb_mapel.id=id_mapel', 'right')
            // ->join('tb_rombel', 'tb_rombel.id=id_rombel', 'right')
            // ->where('tb_rpp_data', 'id_data', $id_data)
            ->join('tb_mapel', 'tb_mapel.id=id_matpel', 'right')
            ->join('tb_rombel', 'tb_rombel.id=id_kelas', 'right')
            ->where($table . '.id_users', $id)
            ->get()
            ->result();
    }

    function printrpp($id_user)
    {
        return $this->db->from('tb_rpp_cetak')
            ->join('tb_rpp_data', 'tb_rpp_data.id_data=id_rpp_data')
            ->join('tb_semester', 'tb_semester.id=id_semester')
            ->join('tb_rpp_tujuan', 'tb_rpp_tujuan.id_tujuan=id_rpp_tujuan')
            ->join('tb_rpp_model', 'tb_rpp_model.id_model=id_rpp_model')
            ->join('tb_model_pemb', 'tb_model_pemb.id=tb_rpp_model.id_model_pemb')
            ->join('tb_rpp_penilaian', 'tb_rpp_penilaian.id_nilai=id_rpp_penilaian')
            ->join('tb_mapel', 'tb_mapel.id=tb_rpp_data.id_mapel')
            ->join('tb_rombel', 'tb_rombel.id=tb_rpp_data.id_rombel')
            // ->where(['id_cetak' => $id_cetak])
            ->where(['status' => 'Y'])
            ->where(['id_users' => $id_user])
            ->get()
            ->row_array();
    }
}
