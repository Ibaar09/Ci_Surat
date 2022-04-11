<?php
    class Auth extends CI_Controller
    {
        function index(){
            
          
            $this->load->view('tampilan/header');
            
           
        }
        
        
        function proses_login()
        {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $password     = MD5($password);

            $cek_login =$this->db->get_where('tbl_user',array('username'=>$username ,'password' => $password))->row_array();

            if($cek_login > 0)
            {
                $data_session = array(
                    'username'      => $username,
                    'status'        => "login",
                    'hak_akses'     => $cek_login['hak_akses'],
               );

               $this->session->set_userdata($data_session);
               print_r($data_session);
               if ($data_session['hak_akses'] == 'admin')
               {
                   redirect(base_url("Home"));
               }
               else
               {
                   redirect(base_url("Home"));
               }
            }else
               {
                   echo"username atau password salah !";
                   redirect(base_url("auth"));
               }
            
        }
            
              
    }
?>