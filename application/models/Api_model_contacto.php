<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api_model_contacto extends CI_Model 
{
	
	
//  Get
public function get_contacts($featured, $recentpost)
{
    $this->db->select('contact.*');
    $this->db->from('contacts contact');

    if($featured) {
        $this->db->where('contact.is_featured', 1);
    }
    if($recentpost){ 
        $this->db->order_by('contact.createdAt', 'asc');
        $this->db->limit($recentpost);
    }
    $query = $this->db->get();
    return $query->result();
}

public function get_contact($id)
{
    $this->db->select('contact.*');
    $this->db->from('contacts contact');
    $this->db->where('contact.id', $id);
    $query = $this->db->get();
    return $query->row();
}
//

// gets
public function get_admin_contacts()
{
    $this->db->select('contact.*');
    $this->db->from('contacts contact');
    $this->db->order_by('contact.createdAt', 'asc');
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


// CRUD 


	public function deleteContact($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('contacts');
    }
    
    public function insertContact($contactoData)
	{
		$this->db->insert('contacts', $contactoData);
		return $this->db->insert_id();
	}
//




	
}
