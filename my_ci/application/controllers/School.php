<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class School extends CI_Controller {

	public function __construct()
    {       
		parent::__construct();
		//error_reporting(0);
		$this->load->model('Main_model');
		$this->load->helper('url');
		$this->load->library('session');
		//session_start();
		
	}

	

	public function login()
	{
		$this->load->view('login');
	}

	public function register()
	{
		$this->load->view('register');
	}

	public function add_details_register()
	{
		error_reporting(0);
		$arr = [
			'name' => $_POST['name'],
			'email' => $_POST['email'],
			'pwd' => $_POST['pwd']
		];
		 $my_model = $this->Main_model->add_details_register($arr);
		 if($my_model){
		 	$success = 'success';
		 	echo json_encode($success);
		 }
		//echo "<pre>";print_r($my_model);
	}

	public function check_login_details()
	{
		$arr = [
			'email' => $_POST['email'],
			'pwd' => $_POST['pwd']
		];
		$my_model = $this->Main_model->check_login_details($arr);
		 
		//echo "<pre>";print_r($this->session->userdata('id'));

		//print_r($my_model);exit();
		
		
		if (!empty($my_model) && $my_model != 'falied') {
			$loggedIn1 = $this->session->set_userdata('id',$my_model['id']);  
			redirect('school');
		}else if($my_model == 'falied'){
		
		 	redirect('login');
		}
	}

	public function index()
	{
		//echo "<pre>"; print_r($_SESSION['id']);exit();
		if(!empty($this->session->userdata('id'))){
			$this->load->view('school_listing');
		}
		
		
	}

	

	public function create_school()
	{
		//print_r($this->session->userdata('id'));exit();
		$this->load->view('add_school');
	}

	public function add_details_school()
	{
		//echo "<pre>";print_r($_POST);exit();
		$arr = [
			'school_name' => $_POST['school_name'],
			'location' => $_POST['location'],
			'entered_by' => $_POST['user_id']
		];
		 $my_model = $this->Main_model->add_details_school($arr);
		 if($my_model){
		 	$success = 'success';
		 	echo json_encode($success);
		 }
	}

	public function edit_school()
	{
		$id = $this->uri->segment(3);
		$my_model['data'] = $this->Main_model->edit_school($id);
		$this->load->view('school_edit',$my_model);
		//echo "<pre>";print_r($my_model);
	}

	public function edit_details_school()
	{
		
		$arr = [
			'school_name' => $_POST['school_name'],
			'location' => $_POST['location'],
			'entered_by' => $_POST['user_id'],
			'id' => $_POST['id']
		];
		 $my_model = $this->Main_model->edit_details_school($arr);
		 //echo "<pre>";print_r($my_model);exit();
		 if($my_model){
		 	$success = 'success';
		 	echo json_encode($success);
		 }
	}

	public function delete_details_school()
	{
		//echo "<pre>";print_r($_POST);exit();
		$my_model = $this->Main_model->delete_details_school($_POST['id']);
		if($my_model){
		 	$success = 'success';
		 	echo json_encode($success);
		 }
	}

	public function signout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}

	
}
