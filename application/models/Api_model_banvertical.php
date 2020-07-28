<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api_model_banvertical extends CI_Model 
{
	
	
	
	// horizontal Get
	public function get_banverticals($featured, $recentpost)
	{
		$this->db->select('banvertical.*');
		$this->db->from('banverticals banvertical');

		$query = $this->db->get();
		return $query->result();
	}

	public function get_banvertical($id)
	{
		$this->db->select('banvertical.*');
		$this->db->from('banverticals banvertical');
		$this->db->where('banvertical.id', $id);
		$query = $this->db->get();
		return $query->row();
	}
	//


	// horizontal gets

	public function get_admin_banverticals()
	{
		$this->db->select('banvertical.*');
		$this->db->from('banverticals banvertical');

		$query = $this->db->get();
		return $query->result();
	}

	public function get_admin_banvertical($id)
	{
		$this->db->select('banvertical.*');
		$this->db->from('banverticals banvertical');
		$this->db->where('banvertical.id', $id);
		$query = $this->db->get();
		return $query->row();
	}
    //
    
    // CRUD horizontal

	public function insertBanvertical($banverticalData)
	{
		$this->db->insert('banverticals', $banverticalData);
		return $this->db->insert_id();
	}

	public function updateBanvertical($id, $banverticalData)
	{
		$this->db->where('id', $id);
		$this->db->update('banverticals', $banverticalData);
	}

	public function deleteBanvertical($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('banverticals');
	}
	//



	
}
