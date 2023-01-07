<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Auth extends CI_Controller{
 
	function __construct(){
		parent::__construct();		
		$this->load->model('m_auth');
		$this->load->library('form_validation');
	}
 
	function index(){
		$this->load->view('templates/header');
		$this->load->view('v_auth');
	}
 
	function login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array(
			'username' => $username,
			'password' => sha1($password)
			);
		$cek = $this->m_auth->cek_login("user",$where)->num_rows();
		if($cek > 0){
			$data_session = array(
				'nama' => $username,
				'status' => "login",
				);
 
			$this->session->set_userdata($data_session);
			
			redirect(base_url("dashboard"));
 
		}else{
			$this->session->set_flashdata('login_error', 'Wrong username or password');
			redirect(base_url('auth'));
		}
	}
 
	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('auth'));
	}
}
