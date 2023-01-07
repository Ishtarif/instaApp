<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller{
 
	function __construct(){
		parent::__construct();		
		$this->load->model('m_auth');
	}

	function index(){
		$this->load->view('templates/header');
		$this->load->view('v_register');
	}

	function sign_up(){
		$this->form_validation->set_rules('username', 'username', 'trim|required|is_unique[user.username]');
		$this->form_validation->set_rules('password', 'password', 'trim|required|min_length[1]');
		$this->form_validation->set_rules('confirm_password', 'confirm_password', 'required|matches[password]');
		$this->form_validation->set_rules('name', 'name', 'required');
		$this->form_validation->set_rules('email', 'email', 'required|is_unique[user.email]');

		if($this->form_validation->run() == true){
			$data = array(
				'name' => $this->input->post('name'),
				'username' => $this->input->post('username'),
				'email' => $this->input->post('email'),
				'password' => $this->input->post('password'),
			);
			$this->m_auth->register($data);
			$this->session->set_flashdata('success', 'Success');
			redirect(base_url('auth'));
		}
		else{
			$this->session->set_flashdata('error', validation_errors());
			redirect(base_url('register'));
		}
	}
}
