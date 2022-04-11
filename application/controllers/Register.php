<?php
    class Register extends CI_Controller{
        function index(){
            $this->load->view('tampilan/head');
            $this->load->view('tampilan/header');
            //$this->load->view('template/banner');
            $this->load->view('register');
            $this->load->view('tampilan/footer');
            $this->load->view('tampilan/js');
        }
        function proses_register(){
            $username   = $this->input->post('username');
            $password   = $this->input->post('password');
            $password   = md5($password);
            $no_hp      = $this->input->post('no_hp');

            $data = array(
                'username' => $username,
                'password' => $password,
                'no_hp'    => $no_hp,
            );
            $this->db->insert('tbl_user',$data);
            redirect(base_url("Auth"));
        }
    }
?>