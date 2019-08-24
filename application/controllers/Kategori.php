<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

    function __construct()
	{
		parent::__construct();
        //$this->load->model('Model_t_artikel');
        $this->load->model('Model_t_kategori');
        date_default_timezone_set('Asia/Jakarta');
        if (empty($this->session->userdata('id'))) {
			redirect('auth/login');
		}
	}

	public function index()
	{
        $data['page'] = 'kategori';
        $data['kategori'] = $this->Model_t_kategori->get();
		$this->load->view('kategori/index',$data);
    }
    
    function add()
    {
		$this->load->view('kategori/add');
    }

    function addaction()
    {
        $kategori = $this->input->post('kategori');
        $data = array(
                'kategori' => $kategori,
                'urltitle' => url_title(str_replace("'","",$kategori)),
                );
        $this->Model_t_kategori->add($data);
        redirect('kategori');
    }

    function edit($id)
    {
        $data['kategori'] = $this->Model_t_kategori->kategori($id);
        $this->load->view('kategori/edit',$data);
    }

    function editaction()
    {
        $kategori = $this->input->post('kategori');
        $id = $this->input->post('id');
        $data = array(
                'kategori' => $kategori,
                'urltitle' => url_title(str_replace("'","",$kategori)),
                );
        $this->Model_t_kategori->update($id,$data);
        redirect('kategori');
    }

    function delete($id)
    {
        $this->Model_t_kategori->delete($id);
        redirect('kategori');
    }
}
