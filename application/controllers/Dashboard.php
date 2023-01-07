<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller{
	function __construct(){
		parent::__construct();
		logged_in();
		$this->load->model('m_auth');
		$this->load->model('m_post');
	}
	public function index(){
		$content['post'] = $this->m_post->get();
		$content['comment'] = $this->m_post->get_comment();
		$this->load->view('templates/header');
		$this->load->view('templates/side_nav');
		$this->load->view('v_dashboard', $content);
	}
}
