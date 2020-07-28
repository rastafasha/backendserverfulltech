<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api_model extends CI_Model 
{

	// get blog
	public function get_blogs($featured, $recentpost)
	{
		$this->db->select('blog.*, cat.category_name, u.firstName, u.lastName');
		$this->db->from('blogs blog');
		$this->db->join('users u', 'u.id=blog.userId');
		$this->db->join('categories cat', 'cat.id=blog.categoryId', 'left');
		$this->db->where('blog.isActive', 1);

		if($featured) {
			$this->db->where('blog.isFeatured', 1);
		}
		if($recentpost){
			$this->db->order_by('blog.createdAt', 'desc');
			$this->db->limit($recentpost);
		}
		$query = $this->db->get();
		return $query->result();
	}

	public function get_blog($id)
	{
		$this->db->select('blog.*, cat.category_name, u.firstName, u.lastName');
		$this->db->from('blogs blog');
		$this->db->join('users u', 'u.id=blog.userId');
		$this->db->join('categories cat', 'cat.id=blog.categoryId', 'left');
		$this->db->where('blog.isActive', 1);
		$this->db->where('blog.id', $id);
		$query = $this->db->get();
		return $query->row();
	}

	//

	// get contact

	public function get_contact($id)
	{
		$this->db->select('contact.*');
		$this->db->from('contacts contact');
		$this->db->where('contact.id', $id);
		$query = $this->db->get();
		return $query->row();
	}

	//

	



	// Get Users

	public function get_users($featured, $recentpost)
	{
		$this->db->select('user.*, cat.category_name, u.firstName, u.lastName');
		$this->db->from('users user');
		$this->db->join('users u', 'u.id=user.userId');
		$this->db->where('user.isActive', 1);

		if($featured) {
			$this->db->where('user.isFeatured', 1);
		}
		if($recentpost){
			$this->db->order_by('user.createdAt', 'desc');
			$this->db->limit($recentpost);
		}
		$query = $this->db->get();
		return $query->result();
	}

	public function get_user($id)
	{
		$this->db->select('user.*, cat.category_name, u.firstName, u.lastName');
		$this->db->from('users user');
		$this->db->where('user.id', $id);
		$query = $this->db->get();
		return $query->row();
	}

	//

	public function get_page($slug)
	{
		$this->db->where('slug', $slug);
		$query = $this->db->get('pages');
		return $query->row();
	}

	

	

	public function login($username, $password) 
	{
		$this->db->where('username', $username);
		$this->db->where('password', md5($password));
		$query = $this->db->get('users');

		if($query->num_rows() == 1) {
			return $query->row();
		}
	}

	// manage blog
	public function get_admin_blogs()
	{
		$this->db->select('blog.*, u.firstName, u.lastName');
		$this->db->from('blogs blog');
		$this->db->join('users u', 'u.id=blog.userId');
		$this->db->order_by('blog.createdAt', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	public function get_admin_blog($id)
	{
		$this->db->select('blog.*, u.firstName, u.lastName');
		$this->db->from('blogs blog');
		$this->db->join('users u', 'u.id=blog.userId');
		$this->db->where('blog.id', $id);
		$query = $this->db->get();
		return $query->row();
	}
	//
	// manage contact
	public function get_admin_contacts()
	{
		$this->db->select('contact.*');
		$this->db->from('contacts contact');
		$this->db->order_by('contact.createdAt', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	public function get_admin_contact($id)
	{
		$this->db->select('contact.*');
		$this->db->from('contacts contact');
		$this->db->where('contact.id', $id);
		$query = $this->db->get();
		return $query->row();
	}
	//

	

	
	

	// Manage User

public function get_admin_users()
{
	$this->db->select('user.*, u.firstName, u.lastName');
	$this->db->from('users user');
	$this->db->join('users u', 'u.id=user.id');
	$this->db->order_by('user.createdAt', 'desc');
	$query = $this->db->get();
	return $query->result();
}

public function get_admin_user($id)
{
	$this->db->select('user.*, u.firstName, u.lastName');
	$this->db->from('users user');
	$this->db->join('users u', 'u.id=user.id');
	$this->db->where('user.id', $id);
	$query = $this->db->get();
	return $query->row();
}
//

	public function checkToken($token)
	{
		$this->db->where('token', $token);
		$query = $this->db->get('users');

		if($query->num_rows() == 1) {
			return true;
		}
		return false;
	}

	// crud Contact

	public function insert_contact($contactData)
	{
		$this->db->insert('contacts', $contactData);
		return $this->db->insert_id();
	}

	public function insertContact($contactData)
	{
		$this->db->insert('contacts', $contactData);
		return $this->db->insert_id();
	}
	public function deleteContact($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('contacts');
	}

	//


	// crud blog

	public function insertBlog($blogData)
	{
		$this->db->insert('blogs', $blogData);
		return $this->db->insert_id();
	}

	public function updateBlog($id, $blogData)
	{
		$this->db->where('id', $id);
		$this->db->update('blogs', $blogData);
	}

	public function deleteBlog($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('blogs');
	}

	//

	


	// Crud User
	public function insertUser($userData)
	{
		$this->db->insert('users', $userData);
		return $this->db->insert_id();
	}

	public function updateUser($id, $userData)
	{
		$this->db->where('id', $id);
		$this->db->update('users', $userData);
	}

	public function deleteUser($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('users');
	}
	//
}
