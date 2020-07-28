<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api_model_destacado extends CI_Model 
{



	// get Destacados
	public function get_destacados($featured, $recentpost)
	{
		$this->db->select('destacado.*, cat.category_name, u.firstName, u.lastName');
		$this->db->from('destacados destacado');
		$this->db->join('users u', 'u.id=destacado.userId');
		$this->db->join('categories cat', 'cat.id=destacado.categoryId', 'left');
		$this->db->where('destacado.isActive', 1);

		if($featured) {
			$this->db->where('destacado.isFeatured', 1);
		}
		if($recentpost){
			$this->db->order_by('destacado.createdAt', 'asc');
			$this->db->limit($recentpost);
		}
		$query = $this->db->get();
		return $query->result();
	}

	public function get_destacado($id)
	{
		$this->db->select('destacado.*, cat.category_name, u.firstName, u.lastName');
		$this->db->from('destacados destacado');
		$this->db->join('users u', 'u.id=destacado.userId');
		$this->db->join('categories cat', 'cat.id=destacado.categoryId', 'left');
		$this->db->where('destacado.isActive', 1);
		$this->db->where('destacado.id', $id);
		$query = $this->db->get();
		return $query->row();
	}

	//


	

	

	// manage destacado
	public function get_admin_destacados()
	{
		$this->db->select('destacado.*, u.firstName, u.lastName');
		$this->db->from('destacados destacado');
		$this->db->join('users u', 'u.id=destacado.userId');
		$this->db->order_by('destacado.createdAt', 'asc');
		$query = $this->db->get();
		return $query->result();
	}

	public function get_admin_destacado($id)
	{
		$this->db->select('destacado.*, u.firstName, u.lastName');
		$this->db->from('destacados destacado');
		$this->db->join('users u', 'u.id=destacado.userId');
		$this->db->where('destacado.id', $id);
		$query = $this->db->get();
		return $query->row();
	}
	//

	

	

	// crud Destacados

	public function insertDestacado($destacadoData)
	{
		$this->db->insert('destacados', $destacadoData);
		return $this->db->insert_id();
	}

	public function updateDestacado($id, $destacadoData)
	{
		$this->db->where('id', $id);
		$this->db->update('destacados', $destacadoData);
	}

	public function deleteDestacado($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('destacados');
	}

	//

}
