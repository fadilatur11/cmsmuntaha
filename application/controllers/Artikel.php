<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Artikel extends CI_Controller {

    function __construct()
	{
		parent::__construct();
        $this->load->model('Model_t_artikel');
        $this->load->model('Model_t_kategori');
        $this->load->model('Model_t_user');
        date_default_timezone_set('Asia/Jakarta');
        if (empty($this->session->userdata('id'))) {
			redirect('auth/login');
		}
	}

	public function index()
	{
        $data['page'] = 'artikel';
        $config['base_url'] = base_url().'artikel/index/';
        $jumlah_data 			= $this->Model_t_artikel->jumlah_data();
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
        $data['artikel'] = $this->Model_t_artikel->data($config['per_page'],$from);
        //$data['artikel'] = $this->Model_t_artikel->get();
		$this->load->view('artikel/index',$data);
    }
    
    function add()
    {
        $data['kategori'] = $this->Model_t_kategori->get();
        $data['penulis'] = $this->Model_t_user->get();
        $this->load->view('artikel/add',$data);
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
			$image_name = $this->input->post('image');
        }
        $judul = $this->input->post('judul');
        $deskripsi = $this->input->post('deskripsi');
        $kategori = $this->input->post('kategori');
        $penulis = $this->input->post('penulis');
        $gagasan = $this->input->post('gagasan');
        $data = array(
                'judul_artikel' => $judul,
                'id_category' => $kategori,
                'id_user' => $penulis,
                'gagasan' => $gagasan,
                'description' => $deskripsi,
                'thumbnail' => $image_name,
                'publish' => 'Y',
                'headline' => 'N',
                'tgl_pub' => date('Y-m-d H:i:s')
                );
        $this->Model_t_artikel->add($data);
        redirect('artikel');
    }

    function headline($id)
    {
        $artikel = $this->Model_t_artikel->artikel($id);
        if ($artikel['headline'] == 'Y') {
            $data = array('headline'=> 'N');
        }else{
            $data = array('headline'=> 'Y');
        }
        $this->Model_t_artikel->update($id,$data);
        redirect('artikel');
    }

    function edit($id=0)
    {
        $data['artikel'] = $this->Model_t_artikel->artikel($id);
        $data['penulis'] = $this->Model_t_user->get();
        $data['kategori'] = $this->Model_t_kategori->get();
        $this->load->view('artikel/edit',$data);
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
        $deskripsi = $this->input->post('deskripsi');
        $kategori = $this->input->post('kategori');
        $penulis = $this->input->post('penulis');
        $gagasan = $this->input->post('gagasan');
        $idartikel = $this->input->post('idartikel');
        $data = array(
                'judul_artikel' => $judul,
                'id_category' => $kategori,
                'id_user' => $penulis,
                'gagasan' => $gagasan,
                'description' => $deskripsi,
                'thumbnail' => $image_name,
                'publish' => 'Y'
                // 'tgl_pub' => date('Y-m-d H:i:s')
                );
        $this->Model_t_artikel->update($idartikel,$data);
        redirect('artikel');
    }

    function delete($id)
    {
        $this->Model_t_artikel->delete($id);
        redirect('artikel');
    }
}
