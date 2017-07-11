<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class MasterModel extends CI_Model {

	public function student_available()
	{
		return $this->db->select('id,name,email')->from('student')->where('class_id'== 0)->order_by('id','asc')->get()->result();
	}

	public function assign_student($id,$data)
	{
        $this->db->where('id',$id)->update('student',$data);
        return array('status' => 200,'message' => 'Student has been assigned.');
    }

	public function kick_student($id,$data)
	{
        $this->db->where('id',$id)->delete('student',$data);
        return array('status' => 200,'message' => 'Student has been kicked.');		
	}
}

?>