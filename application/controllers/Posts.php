<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Posts extends CI_Controller{
	function __construct(){
		parent::__construct();		
		$this->load->model('m_auth');
		logged_in();
		$this->load->model('m_post');
		$this->load->library('form_validation');
	}

	function index(){
		$this->load->view('templates/header');
		$this->load->view('templates/side_nav');
		$this->load->view('v_post');
	}

	function upload(){
		$count = $this->m_post->get_id();
		if($this->input-method() === 'post'){
			$config = array(
				'upload_path' => FCPATH.".assets/uploads/",
				'allowed_types' => "gif|jpg|png|jpeg",
				'file_name' => ++$count,
				'overwrite' => TRUE,
				'max_size' => "2048000",
				'max_height' => "1080",
				'max_width' => "1080"
				);
			$this->load->library('upload', $config);
		}

		$this->form_validation->set_rules('text', 'text', 'required');
		if($this->form_validation->run() == true){
			if(!$this->upload->do_upload('image')){
				$data['error'] = $this->upload->display_errors();
			}
			else{
				$uploaded_data = $this->upload->data();
				$data = array(
					'image' => $uploaded_data['file_name'],
					'text' => $this->input->post('text'),
					'post_id' => ++$count,
					'created' => date('Y-m-d'),
					'user_id' => $this->session->userdata('user_id'),
				);
				if($this->m_post->add($data)){
					$this->session->set_flashdata('success', 'Success');
					redirect(base_url('dashboard'));
				}
			}
		}
		else{
			$this->session->set_flashdata('error', validation_errors());
			redirect(base_url('posts'));
		}
	}
}
