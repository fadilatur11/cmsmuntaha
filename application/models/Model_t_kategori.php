<?php
/**
* 
*/
class Model_t_kategori extends CI_Model
{
	
	protected $_table = 'categories';

	function get()
	{
		$this->db->order_by('id', 'desc');
		return $this->db->get($this->_table)->result_array();
	}

	function add($data)
	{
		$this->db->insert($this->_table,$data);
	}

	function kategori($id)
	{
		$this->db->where('id',$id);
		return $this->db->get($this->_table)->row_array();
	}

	function update($id,$data)
	{
		$this->db->where('id',$id);
		$this->db->update($this->_table,$data);
	}

	function delete($id)
	{
		$this->db->where('id',$id);
		$this->db->delete($this->_table);
	}
}