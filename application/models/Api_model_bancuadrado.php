<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api_model_bancuadrado extends CI_Model 
{
	
	

	// bancuadrado Get
	public function get_bancuadrados($featured, $recentpost)
	{
		$this->db->select('bancuadrado.*');
		$this->db->from('bancuadrados bancuadrado');

		$query = $this->db->get();
		return $query->result();
	}

	public function get_bancuadrado($id)
	{
		$this->db->select('bancuadrado.*');
		$this->db->from('bancuadrados bancuadrado');
		$this->db->where('bancuadrado.id', $id);
		$query = $this->db->get();
		return $query->row();
	}
	//


	// bancuadrado gets

	public function get_admin_bancuadrados()
	{
		$this->db->select('bancuadrado.*');
		$this->db->from('bancuadrados bancuadrado');

		$query = $this->db->get();
		return $query->result();
	}

	public function get_admin_bancuadrado($id)
	{
		$this->db->select('bancuadrado.*');
		$this->db->from('bancuadrados bancuadrado');
		$this->db->where('bancuadrado.id', $id);
		$query = $this->db->get();
		return $query->row();
	}
    //
    
    // CRUD bancuadrado

	public function insertBancuadrado($bancuadradoData)
	{
		$this->db->insert('bancuadrados', $bancuadradoData);
		return $this->db->insert_id();
	}

	public function updateBancuadrado($id, $bancuadradoData)
	{
		$this->db->where('id', $id);
		$this->db->update('bancuadrados', $bancuadradoData);
	}

	public function deleteBancuadrado($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('bancuadrados');
	}
	//



	
}
