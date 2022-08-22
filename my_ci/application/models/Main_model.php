<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main_model extends CI_Model {

   public function __construct()
    {
        parent::__construct();
    }
  
    public function add_details_register($post='')
    {
    	$insert_data = $this->db->insert('user',$post);
    	if($insert_data){
    		return true;
    	}
    }

    public function check_login_details($post='')
    {
    	$get_data = $this->db->get_where('user',$post)->result_array();
    	
    	//echo "<pre>";print_r($get_data);exit();
    	
    	if(!empty($get_data)){
    		//$this->session->set_userdata('id', $get_data[0]['id']);
    		return $get_data[0];
    	}else{
    		return 'falied';
    	}
    	//echo "<pre>";print_r($get_data);
    }

    /*public function make_datatables()
    {
    	
    	$get_data = $this->db->get_where('school_master',array('entered_by' => $id))->result_array();
    }*/

    public function add_details_school($post='')
    {
      $insert_data = $this->db->insert('school_master',$post);
      if($insert_data){
        return true;
      }
    }

    public function edit_school($id='')
    {
       $get_data = $this->db->get_where('school_master',array('id' => $id))->result_array();
       return $get_data;
       //echo "<pre>";print_r($get_data);exit();
    }

    public function edit_details_school($post='')
    {
      //echo "<pre>";print_r($post);exit();
      $data = [
        'school_name' => $post['school_name'],
        'location' => $post['location'],
        'entered_by' => $post['entered_by']
      ];
      $this->db->where('id', $post['id']);
      $insert_data = $this->db->update('school_master', $data);
      if($insert_data){
        return true;
      }
    }

    public function delete_details_school($post='')
    {
      $this->db->where('id', $post);
      $insert_data = $this->db->delete('school_master');
      if($insert_data){
        return true;
      }
    }
}
