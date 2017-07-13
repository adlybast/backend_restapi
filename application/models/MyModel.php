<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MyModel extends CI_Model {

    var $client_service = "frontend-client";
    var $auth_key       = "simplerestapi";

    public function check_auth_client(){
        $client_service = $this->input->get_request_header('Client-Service', TRUE);
        $auth_key  = $this->input->get_request_header('Auth-Key', TRUE);
        if($client_service == $this->client_service && $auth_key == $this->auth_key){
            return true;
        } else {
            return json_output(401,array('status' => 401,'message' => 'Unauthorized.'));
        }
    }

    public function login($username,$password)
    {
        $q  = $this->db->select('password,id')->from('users')->where('username',$username)->get()->row();
        if($q == ""){
            return array('status' => 204,'message' => 'Username not found.');
        } else {
            $hashed_password = $q->password;
            $id              = $q->id;
            if (hash_equals($hashed_password, crypt($password, $hashed_password))) {
               $last_login = date('Y-m-d H:i:s');
               $token = crypt(substr( md5(rand()), 0, 7));
               $expired_at = date("Y-m-d H:i:s", strtotime('+12 hours'));
               $this->db->trans_start();
               $this->db->where('id',$id)->update('users',array('last_login' => $last_login));
               $this->db->insert('users_authentication',array('users_id' => $id,'token' => $token,'expired_at' => $expired_at));
               if ($this->db->trans_status() === FALSE){
                  $this->db->trans_rollback();
                  return array('status' => 500,'message' => 'Internal server error.');
               } else {
                  $this->db->trans_commit();
                  return array('status' => 200,'message' => 'Successfully login.','id' => $id, 'token' => $token);
               }
            } else {
               return array('status' => 204,'message' => 'Wrong password.');
            }
        }
    }

    public function logout()
    {
        $users_id  = $this->input->get_request_header('User-ID', TRUE);
        $token     = $this->input->get_request_header('Authorization', TRUE);
        $this->db->where('users_id',$users_id)->where('token',$token)->delete('users_authentication');
        return array('status' => 200,'message' => 'Successfully logout.');
    }

    public function auth()
    {
        $users_id  = $this->input->get_request_header('User-ID', TRUE);
        $token     = $this->input->get_request_header('Authorization', TRUE);
        $q  = $this->db->select('expired_at')->from('users_authentication')->where('users_id',$users_id)->where('token',$token)->get()->row();
        if($q == ""){
            return json_output(401,array('status' => 401,'message' => 'Unauthorized.'));
        } else {
            if($q->expired_at < date('Y-m-d H:i:s')){
                return json_output(401,array('status' => 401,'message' => 'Your session has been expired.'));
            } else {
                $updated_at = date('Y-m-d H:i:s');
                $expired_at = date("Y-m-d H:i:s", strtotime('+12 hours'));
                $this->db->where('users_id',$users_id)->where('token',$token)->update('users_authentication',array('expired_at' => $expired_at,'updated_at' => $updated_at));
                return array('status' => 200,'message' => 'Authorized.');
            }
        }
    }

    public function student_all_data()
    {
        return $this->db->select('id,name,email,class_id')->from('student')->order_by('id','asc')->get()->result();
    }

    public function student_detail_data($id)
    {
        return $this->db->select('id,name,email,class_id')->from('student')->where('id',$id)->order_by('id','asc')->get()->row();
    }

    public function student_create_data($data)
    {
        $this->db->insert('student',$data);
        return array('status' => 201,'message' => 'Data has been created.');
    }

    public function student_update_data($id,$data)
    {
        $this->db->where('id',$id)->update('student',$data);
        return array('status' => 200,'message' => 'Data has been updated.');
    }

    public function student_delete_data($id)
    {
        $this->db->where('id',$id)->delete('student');
        return array('status' => 200,'message' => 'Data has been deleted.');
    }


    //Table Class
    public function class_all_data()
    {
        return $this->db->select('id,name,capacity')->from('class')->order_by('id','asc')->get()->result();
    }

    public function class_detail_data($id)
    {
        return $this->db->select('id,name,capacity')->from('class')->where('id',$id)->order_by('id','asc')->get()->row();
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

    // Assign and Kick student

    public function student_available()
    {
        $this->db->select('id,name,email,class_id')->from('student')->where('class_id',0)->order_by('id','asc')->get()->result();
    }

    public function assign_student($id,$data)
    {
        $this->db->where('id',$id)->update('student',$data);
        return array('status' => 200,'message' => 'Student has been assigned' );;
    }

    public function kick_student($id)
    {
        $this->db->where('id',$id)->delete('student');
        return array('status' => 200, 'message' => 'Student has been kicked' );
    }
}
