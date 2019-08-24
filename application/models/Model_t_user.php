<?php
/**
* 
*/
class Model_t_user extends CI_Model
{
	
	protected $_table = 'users';

	function get()
	{
		$this->db->order_by('id', 'desc');
		return $this->db->get($this->_table)->result_array();
    }

    function add($data)
	  {
		  $this->db->insert($this->_table,$data);
    }
    
    function user($id)
    {
        $this->db->where('id',$id);
        return $this->db->get($this->_table)->row_array();
    }

    function update($id,$data)
    {
      $this->db->where('id',$id);
      $this->db->update($this->_table,$data);
      // print_r($this->db->last_query());
      // die();
    }

    function delete($id)
    {
      $this->db->where('id',$id);
		  $this->db->delete($this->_table);
    }

    function email($email)
    {
      $this->db->where('email',$email);
      return $this->db->get($this->_table)->row_array();
    }

    function akun($email,$password)
    {
      $this->db->where('email',$email);
      $this->db->where('password',$password);
      return $this->db->get($this->_table)->row_array();
    }
}