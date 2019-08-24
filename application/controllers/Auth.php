<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    function __construct()
	{
		parent::__construct();
        $this->load->model('Model_t_user');
        date_default_timezone_set('Asia/Jakarta');
        // if (empty($this->session->userdata('id'))) {
		// 	redirect('auth/login');
		// }
	}

	public function login()
	{
        $data['page'] = 'Auth';
		$this->load->view('auth/login',$data);
    }

    function loginaction()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $login = $this->Model_t_user->email($email);
        if (!empty($login)) {
            if (password_verify($password,$login['password'])) { //validasi password ke database
                //echo 'benar';
                $session_akun = array(
					'id' => $login['id'],
					'nama' => $login['nama'],
					'email' => $login['email']);
                $this->session->set_userdata($session_akun);
                redirect('dashboard');
            } else {
                echo 'password salah';
            }
        }else{
            //echo 'email tak ada';
            redirect('auth/login');
        }
    }

    function logout()
    {
        $this->session->sess_destroy();
        redirect('auth/login');
    }
}