<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api_model_articulo extends CI_Model 
{

	

	// get Articulos
	public function get_articulos($featured, $recentpost)
	{
		$this->db->select('articulo.*, cat.category_name, u.firstName, u.lastName');
		$this->db->from('articulos articulo');
		$this->db->join('users u', 'u.id=articulo.userId');
		$this->db->join('categories cat', 'cat.id=articulo.categoryId', 'left');
		$this->db->where('articulo.isActive', 1);

		if($featured) {
			$this->db->where('articulo.isFeatured', 1);
			$this->db->order_by('articulo.createdAt', 'desc');
		}
		if($recentpost){
			$this->db->order_by('articulo.createdAt', 'asc');
			$this->db->limit($recentpost);
		}
		$query = $this->db->get();
		return $query->result();
	}

	public function get_articulo($id)
	{
		$this->db->select('articulo.*, cat.category_name, u.firstName, u.lastName');
		$this->db->from('articulos articulo');
		$this->db->join('users u', 'u.id=articulo.userId');
		$this->db->join('categories cat', 'cat.id=articulo.categoryId', 'left');
		$this->db->where('articulo.isActive', 1);
		$this->db->where('articulo.id', $id);
		$query = $this->db->get();
		return $query->row();
	}

	//

	

	// manage articulos
	public function get_admin_articulos()
	{
		$this->db->select('articulo.*, u.firstName, u.lastName');
		$this->db->from('articulos articulo');
		$this->db->join('users u', 'u.id=articulo.userId');
		$this->db->order_by('articulo.createdAt', 'asc');
		$query = $this->db->get();
		return $query->result();
	}

	public function get_admin_articulo($id)
	{
		$this->db->select('articulo.*');
		$this->db->from('articulos articulo');
		$this->db->join('users u', 'u.id=articulo.userId');
		$this->db->where('articulo.id', $id);
		$query = $this->db->get();
		return $query->row();
	}
	//


	// crud Articulos

	public function insertArticulo($articuloData)
	{
		$this->db->insert('articulos', $articuloData);
		return $this->db->insert_id();
	}

	public function updateArticulo($id, $articuloData)
	{
		$this->db->where('id', $id);
		$this->db->update('articulos', $articuloData);
	}

	public function deleteArticulo($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('articulos');
	}

	//

}
