<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kajian extends CI_Controller {

    function __construct()
	{
		parent::__construct();
        $this->load->model('Model_t_artikel');
        $this->load->model('Model_t_kategori');
        date_default_timezone_set('Asia/Jakarta');
        if (empty($this->session->userdata('id'))) {
			redirect('auth/login');
		}
	}

	public function index()
	{
        $data['page'] = 'Kajina';
        $config['base_url'] = base_url().'kajian/index/';
        $jumlah_data 			= $this->Model_t_artikel->jumlah_kajian();
		$config['total_rows'] = $jumlah_data;
		$config['per_page'] = 10;
		$from = $this->uri->segment(3);
		// print_r ($form= $this->uri->segment(3));
		// die();
		$config['uri_segment'] = 3;
		$config['first_tag_open'] 	= '<div class="btn btn-light" type="button">';
        $config['first_tag_close'] 	= '</div>';
        $config['last_tag_open'] 	= '<div class="btn btn-light" type="button">';
        $config['last_tag_close'] 	= '</div>';
        $config['prev_tag_open'] 	= '<div class="btn btn-light" type="button">';
        $config['prev_tag_close'] 	= '</div>';
        $config['next_tag_open'] 	= '<div class="btn btn-light" type="button">';
        $config['next_tag_close'] 	= '</div>';
        $config['num_tag_open'] 	= '<div class="btn btn-light" type="button">';
        $config['num_tag_close'] 	= '</div>';
        $config['cur_tag_open'] 	= '<div class="btn btn-light active" type="button">';
        $config['cur_tag_close'] 	= '</div>';

        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        $data['kajian'] = $this->Model_t_artikel->kajian($config['per_page'],$from);
		$this->load->view('kajian/index',$data);
    }
    
    function add()
    {
		$this->load->view('kajian/add');
    }

    function addaction()
    {
        if(!empty($_FILES['image']['name'])){
			$image_name =  str_replace(' ','_',date('Ymdhis').$_FILES['image']['name']);
			$config['upload_path'] 		= $this->config->item('upload');
			$config['allowed_types'] 	= 'gif|jpg|png|jpeg';
			$config['file_name'] 		= $image_name;
			$this->upload->initialize($config);
			$this->upload->do_upload('image');
		}else{
			$image_name = $this->input->post('imagex');
        }

        $judul = $this->input->post('judul');
        $link = $this->input->post('link');
        $data = array(
                'judul_artikel' => $judul,
                'id_category' => 3,
                'id_user' => 1,
                'gagasan' => $judul.'~ Channel Youtube Irtaqi',
                'description' => $link,
                'thumbnail' => $image_name,
                'headline' => 'N',
                'publish' => 'Y',
                'tgl_pub' => date('Y-m-d H:i:s')
                );
        $this->Model_t_artikel->add($data);
        redirect('kajian');
    }

    function edit($id)
    {
        $data['kajian'] = $this->Model_t_artikel->artikel($id);
        $this->load->view('kajian/edit',$data);
    }

    function editaction()
    {
        if(!empty($_FILES['image']['name'])){
			$image_name =  str_replace(' ','_',date('Ymdhis').$_FILES['image']['name']);
			$config['upload_path'] 		= $this->config->item('upload');
			$config['allowed_types'] 	= 'gif|jpg|png|jpeg';
			$config['file_name'] 		= $image_name;
			$this->upload->initialize($config);
			$this->upload->do_upload('image');
		}else{
			$image_name = $this->input->post('imagex');
        }

        $judul = $this->input->post('judul');
        $link = $this->input->post('link');
        $id = $this->input->post('idartikel');
        $data = array(
                'judul_artikel' => $judul,
                'id_category' => 3,
                'id_user' => 1,
                'gagasan' => $judul.'~ Channel Youtube Irtaqi',
                'description' => $link,
                'thumbnail' => $image_name,
                'headline' => 'N',
                'publish' => 'Y',
                'tgl_pub' => date('Y-m-d H:i:s')
                );
        $this->Model_t_artikel->update($id,$data);
        redirect('kajian');
    }

    function delete($id)
    {
        $this->Model_t_artikel->delete($id);
        redirect('kajian');
    }
}
