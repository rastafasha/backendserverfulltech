<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api_model_banemergente extends CI_Model 
{
	
	

	// bancuadrado Get
	public function get_banemergentes($featured, $recentpost)
	{
		$this->db->select('banemergente.*');
		$this->db->from('banemergentes banemergente');

		$query = $this->db->get();
		return $query->result();
	}

	public function get_banemergente($id)
	{
		$this->db->select('banemergente.*');
		$this->db->from('banemergentes banemergente');
		$this->db->where('banemergente.id', $id);
		$query = $this->db->get();
		return $query->row();
	}
	//


	// bancuadrado gets

	public function get_admin_banemergentes()
	{
		$this->db->select('banemergente.*');
		$this->db->from('banemergentes banemergente');

		$query = $this->db->get();
		return $query->result();
	}

	public function get_admin_banemergente($id)
	{
		$this->db->select('banemergente.*');
		$this->db->from('banemergentes banemergente');
		$this->db->where('banemergente.id', $id);
		$query = $this->db->get();
		return $query->row();
	}
    //
    
    // CRUD bancuadrado

	public function insertBanemergente($banemergenteData)
	{
		$this->db->insert('banemergentes', $banemergenteData);
		return $this->db->insert_id();
	}

	public function updateBanemergente($id, $banemergenteData)
	{
		$this->db->where('id', $id);
		$this->db->update('banemergentes', $banemergenteData);
	}

	public function deleteBanemergente($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('banemergentes');
	}
	//



	
}
