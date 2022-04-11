<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Model
{
    public function SemuaData()
    {
       return $this->db->get('tbl_siswa')->result_array();
    }
    public function proses_tambah_data()
    {
        $data = [
        "nama_siswa" => $this->input->post('nama_siswa'),
        "kelas" => $this->input->post('kelas'),
        "jurusan" => $this->input->post('jurusan'),
        "alamat" => $this->input->post('alamat'),
        "kategori_id" => $this->input->post('kategori_id'),
        ];
        $this->db->insert('tbl_siswa' , $data);
    }
    public function hapus_data($id_siswa)
    {
        $this->db->where('id_siswa' ,$id_siswa);
        $this->db->delete('tbl_siswa');
    }
    public function  ambil_id_siswa_tbl_siswa($id_siswa)
    {
        return $this->db->get_where('tbl_siswa', ['id_siswa' => $id_siswa])
        ->row_array();
    }
    public function proses_edit_data()
    {
        $data = [
            "nama_siswa" => $this->input->post('nama_siswa'),
            "kelas" => $this->input->post('kelas'),
            "jurusan" => $this->input->post('jurusan'),
            "alamat" => $this->input->post('alamat'),
            "kategori_id" => $this->input->post('kategori_id'),
        ];
        
        $this->db->where('id_siswa', $this->input->post('id_siswa'));
        $this->db->update('tbl_siswa' , $data);
    }
}
   