<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ClassModel extends CI_Model {
	public function class_all_data()
	{
	    return $this->db->select('id,name,capacity,created_at,update_at')->from('class')->order_by('name','asc')->get()->result();
	}

	public function class_detail_data($id)
	{
	    return $this->db->select('id,name,capacity,created_at,update_at')->from('class')->where('id',$id)->order_by('name','asc')->get()->row();
	}

	public function class_create_data($data)
	{
	    $this->db->insert('class',$data);
	    return array('status' => 201,'message' => 'Data has been created.');
	}

	public function class_update_data($id,$data)
	{
	    $this->db->where('id',$id)->update('class',$data);
	    return array('status' => 200,'message' => 'Data has been updated.');
	}

	public function class_delete_data($id)
	{
	    $this->db->where('id',$id)->delete('class');
	    return array('status' => 200,'message' => 'Data has been deleted.');
	}
?>