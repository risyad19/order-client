<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    function __construct(){
        parent::__construct();
		$this->load->model('Mlogin','Mlogin');
    }
    
	function index(){
        if($this->session->userdata('logged') !=TRUE){
            $this->load->view('view-login');
        }else{
            $url=base_url('home');
            redirect($url);
        };
    }
    
    function autentikasi(){
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $validasi_username = $this->Mlogin->query_validasi_username($username);
        if(count($validasi_username) > 1){
            $validate_ps=$this->Mlogin->query_validasi_password($username,$password);
            if(count($validate_ps) > 1){
                $x = $validate_ps;
                if($x['active']=='1'){
                    $this->session->set_userdata('logged',TRUE);
                    $this->session->set_userdata('user',$username);
                    $id=$x['id'];
                    $level=$x['level'];
                    if($level=='0'){ //Kasir
                        $name = $x['username'];
                        $this->session->set_userdata('access','Kasir');
                        $this->session->set_userdata('id',$id);
                        $this->session->set_userdata('name',$name);
                        $this->session->set_userdata('level',$level);
                        redirect('home');

                    }else if($level=='1'){ //Pelayan
                        $name = $x['username'];
                        $this->session->set_userdata('access','Pelayan');
                        $this->session->set_userdata('id',$id);
                        $this->session->set_userdata('name',$name);
                        $this->session->set_userdata('level',$level);
                        redirect('home');

                    }
                }else{
                    $url=base_url('login');
                    echo $this->session->set_flashdata('msg','<h3>Uupps!</h3>
                    <p>Cek kembali inputannya ya.</p>');
                    redirect($url);
                }
            }else{
                $url=base_url('login');
                echo $this->session->set_flashdata('msg','<h3>Uupps!</h3>
                    <p>Password yang kamu masukan salah.</p>');
                redirect($url);
            }

        }else{
            $url=base_url('login');
            echo $this->session->set_flashdata('msg','<h3>Uupps!</h3>
            <p>Username yang kamu masukan salah.</p>');
            redirect($url);
        }

    }

    function logout(){
        $this->session->sess_destroy();
        $url=base_url('login');
        redirect($url);
    }

}