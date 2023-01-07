<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Post extends CI_Model{

	public function get($id = null){
		$this->db->select('post.*, user.name as user_name');
		$this->db->from('post');
		$this->db->join('user', 'post.user_id=user.user_id', 'left');
		if($id){
			$this->db->where('post_id', $id);
		}
		$this->db->order_by('created', 'desc');
		$query = $this->db->get();
		
		return $query;
	}
    
  public function add($post){
		$data = array(
			'image' => $post['image'],
			'text' => $post['text'],
			'post_id' => $post['post_id'],
			'created' => $post['created'],
			'user_id' => $post['user_id'],
		);

    $insert = $this->db->insert('post',$data);
    return $insert?true:false;
  }

	public function get_id(){
		$this->db->select(max('post_id'));
		$this->db->from('post');
		$query = $this->db->get();
		$result = $query->row();
	}
	public function get_comment(){
		$this->db->select('comment.*, user.name as name');
		$this->db->from('comment');
		$this->db->join('user', 'comment.user_id=user.user_id', 'left');
		$query = $this->db->get();
		return $query;
	}
}
