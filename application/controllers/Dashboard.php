<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct()
	{
		parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        if (empty($this->session->userdata('id'))) {
			redirect('auth/login');
		}
	}

	public function index()
	{
        $data['page'] = 'dashboard';
		$this->load->view('dashboard/index');
	}
}
