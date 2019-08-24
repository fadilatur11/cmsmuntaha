<?php
/**
* 
*/
class Model_t_artikel extends CI_Model
{
	
	protected $_table = 'article';

	function get()
	{
		$this->db->select('categories.id,categories.kategori,article.id as id_artikel,article.judul_artikel,article.tgl_pub,article.id_category,article.id_user,article.publish,article.headline,article.dibaca,users.nama');
		$this->db->join('categories','categories.id = article.id_category');
		$this->db->join('users','users.id = article.id_user');
		$this->db->order_by('article.tgl_pub', 'desc');
		return $this->db->get($this->_table)->result_array();
	}

	function add($data)
	{
		$this->db->insert($this->_table,$data);
	}

	function update($id,$data)
	{
		$this->db->where('id',$id);
		$this->db->update($this->_table,$data);
		//print_r($this->db->last_query());
	}

	function artikel($id)
	{
		$this->db->where('id',$id);
		return $this->db->get($this->_table)->row_array();
		// print_r($this->db->last_query());
	}

	function delete($id)
	{
		$this->db->where('id',$id);
		$this->db->delete($this->_table);
	}

	function jumlah_data()
	{
		return $this->db->get($this->_table)->num_rows();
	}

	function data($number,$offset)
	{
		$this->db->select('categories.id,categories.kategori,article.id as id_artikel,article.judul_artikel,article.tgl_pub,article.id_category,article.id_user,article.publish,article.headline,article.dibaca,users.nama');
		$this->db->join('categories','categories.id = article.id_category');
		$this->db->join('users','users.id = article.id_user');
		$this->db->where_not_in('article.id_category',3);
		$this->db->order_by('article.tgl_pub', 'desc');
		return $this->db->get($this->_table,$number,$offset)->result_array();		
	}

	function kajian($number,$offset)
	{
		$this->db->select('categories.id,categories.kategori,article.id as id_artikel,article.judul_artikel,article.tgl_pub,article.id_category,article.id_user,article.publish,article.headline,article.dibaca,users.nama,article.description');
		$this->db->join('categories','categories.id = article.id_category');
		$this->db->join('users','users.id = article.id_user');
		$this->db->where('article.id_category',3);
		$this->db->order_by('article.tgl_pub', 'desc');
		return $this->db->get($this->_table,$number,$offset)->result_array();		
	}

	function jumlah_kajian()
	{
		$this->db->where('id_category',3);
		return $this->db->get($this->_table)->num_rows();
	}
}