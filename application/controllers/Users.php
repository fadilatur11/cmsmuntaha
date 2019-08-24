<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

    function __construct()
	{
		parent::__construct();
        $this->load->model('Model_t_user');
        date_default_timezone_set('Asia/Jakarta');
        if (empty($this->session->userdata('id'))) {
			redirect('auth/login');
		}
	}

	public function index()
	{
        $data['page'] = 'Users';
        $data['users'] = $this->Model_t_user->get();
		$this->load->view('users/index',$data);
    }

    function add()
    {
        $this->load->view('users/add');
    }

    function addaction()
    {
        $nama = $this->input->post('nama');
        $role = $this->input->post('role');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $encrypted = password_hash($password,PASSWORD_DEFAULT);
        $data = array(
                'nama' => $nama,
                'role' => $role,
                'email' => $email,
                'password' => $encrypted
                );
        $this->Model_t_user->add($data);
        redirect('users');
    }

    function edit($id)
    {
        $data['user'] = $this->Model_t_user->user($id);
        $this->load->view('users/edit',$data);
    }

    function editaction()
    {
        $nama = $this->input->post('nama');
        $role = $this->input->post('role');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $encrypted = password_hash($password,PASSWORD_DEFAULT);
        $id = $this->input->post('id');
        $data = array(
                'nama' => $nama,
                'role' => $role,
                'email' => $email,
                'password' => $encrypted
                );
        $this->Model_t_user->update($id,$data);
        redirect('users');
    }

    function delete($id)
    {
        $this->Model_t_user->delete($id);
        redirect('users');
    }
}