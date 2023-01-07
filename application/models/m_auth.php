<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class M_auth extends CI_Model{	
	function cek_login($table,$where){
		$cek = $this->db->get_where($table,$where)->row_array();
		if($cek){
			$this->session->set_userdata(['user_id' => $cek['user_id']
		]);
		}
		return $this->db->get_where($table,$where);
	}	

	function register($data){
		$user = array(
			'name' => $data['name'],
			'username' => $data['username'],
			'email' => $data['email'],
			'password' => sha1($data['password']),
		);
		$this->db->insert('user', $user);
	}
}
