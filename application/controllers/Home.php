<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
     public function index()
     {
         $data['title'] = 'Halaman Data Surat';
         $data['tbl_siswa'] = $this->Siswa->SemuaData();
         $this->load->view('templates/header', $data);
         $this->load->view('templates/sidebar');
         $this->load->view('templates/topbar');
         $this->load->view('templates/index', $data);
         $this->load->view('templates/footer');
     }
     public function tambah_data()
     {
        $data['title'] = 'Halaman Tambah Surat';
        $data['tbl_siswa'] = $this->Siswa->SemuaData();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('home/tambah_data', $data);
        $this->load->view('templates/footer'); 
     }
     public function proses_tambah_data()
     {
                $config['upload_path']          = './gambar/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 10000;
                $config['max_width']            = 10000;
                $config['max_height']           = 10000;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('userfile'))
                {
                       echo "Gagal Tambah";
                }
                else
                {
                        $gambar = $this->upload->data();
                        $gambar = $gambar['file_name'];
                        $nama_siswa = $this->input->post('nama_siswa', TRUE);
                        $kelas = $this->input->post('kelas', TRUE);
                        $jurusan = $this->input->post('jurusan', TRUE);
                        $alamat = $this->input->post('alamat', TRUE);
                        $kategori_id = $this->input->post('kategori_id', TRUE);

                        $data = array(
                            'nama_siswa' => $nama_siswa,
                            'kelas' => $kelas,
                            'jurusan' => $jurusan,
                            'alamat' => $alamat,
                            'kategori_id' => $kategori_id,
                            'gambar' => $gambar,
                            
                        );
                        $this->db->insert('tbl_siswa', $data);
                        $this->session->set_flashdata('pesan' , '<div class="alert alert-success" role="alert">
                               Data berhasil Ditambah!
                               </div>');
                               redirect('Home');
                }
     }

     public function hapus_data($id_siswa)
     {
         $this->Siswa->hapus_data($id_siswa);
         $this->session->set_flashdata('pesan' , '<div class="alert alert-success" role="alert">
        Data berhasil di hapus!
       </div>');
         redirect('Home');
     }
     public function edit_data($id_siswa)
     {
        $data['title'] = 'Halaman Edit Surat';
         $data['tbl_siswa'] = $this->Siswa->
         ambil_id_siswa_tbl_siswa($id_siswa);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('home/edit_data', $data);
        $this->load->view('templates/footer'); 
     }

     public function proses_edit_data()
     {
        $id_siswa = $this->input->post('id_siswa');
        $config['upload_path']          = './gambar/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 10000;
        $config['max_width']            = 10000;
        $config['max_height']           = 10000;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('userfile'))
        {
            $nama_siswa = $this->input->post('nama_siswa', TRUE);
            $kelas = $this->input->post('kelas', TRUE);
            $jurusan = $this->input->post('jurusan', TRUE);
            $alamat = $this->input->post('alamat', TRUE);
            $kategori_id = $this->input->post('kategori_id', TRUE);

            $data = array(
                'nama_siswa' => $nama_siswa,
                'kelas' => $kelas,
                'jurusan' => $jurusan,
                'alamat' => $alamat,
                'kategori_id' => $kategori_id,
            );
            $this->db->where('id_siswa', $id_siswa);
            $this->db->update('tbl_siswa', $data);
            $this->session->set_flashdata('pesan' , '<div class="alert alert-success" role="alert">
                   Data berhasil Diubah!
                   </div>');
                   redirect('Home');

        }
        else
        {
                $gambar = $this->upload->data();
                $gambar = $gambar['file_name'];
                $nama_siswa = $this->input->post('nama_siswa', TRUE);
                $kelas = $this->input->post('kelas', TRUE);
                $jurusan = $this->input->post('jurusan', TRUE);
                $alamat = $this->input->post('alamat', TRUE);
                $kategori_id = $this->input->post('kategori_id', TRUE);

                $data = array(
                    'nama_siswa' => $nama_siswa,
                    'kelas' => $kelas,
                    'jurusan' => $jurusan,
                    'alamat' => $alamat,
                    'kategori_id' => $kategori_id,
                    'gambar' => $gambar,
                    
                );

                $this->db->where('id_siswa', $id_siswa);
                $this->db->update('tbl_siswa', $data);
                $this->session->set_flashdata('pesan' , '<div class="alert alert-success" role="alert">
                       Data berhasil Diubah!
                       </div>');
                       redirect('Home');
        }

    }
    
} 