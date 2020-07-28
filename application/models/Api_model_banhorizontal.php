<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api_model_banhorizontal extends CI_Model 
{


	// directorio Get
	public function get_banhorizontals($featured, $recentpost)
	{
		$this->db->select('banhorizontal.*');
		$this->db->from('banhorizontals banhorizontal');

		$query = $this->db->get();
		return $query->result();
	}

	public function get_banhorizontal($id)
	{
		$this->db->select('banhorizontal.*');
		$this->db->from('banhorizontals banhorizontal');
		$this->db->where('banhorizontal.id', $id);
		$query = $this->db->get();
		return $query->row();
	}
	//


	// directorio gets

	public function get_admin_banhorizontals()
	{
		$this->db->select('banhorizontal.*');
		$this->db->from('banhorizontals banhorizontal');

		$query = $this->db->get();
		return $query->result();
	}

	public function get_admin_banhorizontal($id)
	{
		$this->db->select('banhorizontal.*');
		$this->db->from('banhorizontals banhorizontal');
		$this->db->where('banhorizontal.id', $id);
		$query = $this->db->get();
		return $query->row();
	}
    //
    
    // CRUD directorio

	public function insertBanhorizontal($banhorizontalData)
	{
		$this->db->insert('banhorizontals', $banhorizontalData);
		return $this->db->insert_id();
	}

	public function updateBanhorizontal($id, $banhorizontalData)
	{
		$this->db->where('id', $id);
		$this->db->update('banhorizontals', $banhorizontalData);
	}

	public function deleteBanhorizontal($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('banhorizontals');
	}
	//


	
}
