<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api_model_categoria extends CI_Model 
{

	// get 
	public function get_porcategorias()// obtiene todos las categorias
	{
        $this->db->select('articulo.*, cat.category_name, articulo.title');
        $this->db->from('articulos articulo');
        $this->db->join('categories cat', 'cat.id=articulo.categoryId', 'left');
        $this->db->order_by('cat.category_name', 'asc');

		$query = $this->db->get();
        return $query->result();
        
	}
	
    

	public function get_porcategoria($id)// obtiene 1 articulo por el id
	{
		$this->db->select('articulo.*, cat.category_name');
		$this->db->from('articulos articulo');
		$this->db->join('categories cat', 'cat.id=articulo.categoryId', 'left');
		$this->db->where('articulo.isActive', 1);
        $this->db->where('articulo.categoryId', $id);
        $this->db->order_by('cat.category_name', 'asc');

		$query = $this->db->get();
        return $query->row();
        
       
	}
	
	// get categoria 1 
	public function get_categoria1()// obtiene todos las categorias
	{
        $this->db->select('articulo.*, cat.category_name, articulo.categoryId');
        $this->db->from('articulos articulo');
		$this->db->join('categories cat', 'cat.id=articulo.categoryId', 'left');
		$this->db->where('articulo.categoryId', 1);
		$this->db->order_by('cat.category_name', 'asc');

		$query = $this->db->get();
        return $query->result();
        
	}

	public function get_categoria2()// obtiene todos las categorias
	{
        $this->db->select('articulo.*, cat.category_name, articulo.categoryId');
        $this->db->from('articulos articulo');
		$this->db->join('categories cat', 'cat.id=articulo.categoryId', 'left');
		$this->db->where('articulo.categoryId', 2);
		$this->db->order_by('cat.category_name', 'asc');

		$query = $this->db->get();
        return $query->result();
        
	}
	public function get_categoria3()// obtiene todos las categorias
	{
        $this->db->select('articulo.*, cat.category_name, articulo.categoryId');
        $this->db->from('articulos articulo');
		$this->db->join('categories cat', 'cat.id=articulo.categoryId', 'left');
		$this->db->where('articulo.categoryId', 3);
		$this->db->order_by('cat.category_name', 'asc');

		$query = $this->db->get();
        return $query->result();
        
	}
	public function get_categoria4()// obtiene todos las categorias
	{
        $this->db->select('articulo.*, cat.category_name, articulo.categoryId');
        $this->db->from('articulos articulo');
		$this->db->join('categories cat', 'cat.id=articulo.categoryId', 'left');
		$this->db->where('articulo.categoryId', 4);
		$this->db->order_by('cat.category_name', 'asc');

		$query = $this->db->get();
        return $query->result();
        
	}
	public function get_categoria5()// obtiene todos las categorias
	{
        $this->db->select('articulo.*, cat.category_name, articulo.categoryId');
        $this->db->from('articulos articulo');
		$this->db->join('categories cat', 'cat.id=articulo.categoryId', 'left');
		$this->db->where('articulo.categoryId', 5);
		$this->db->order_by('cat.category_name', 'asc');

		$query = $this->db->get();
        return $query->result();
        
	}
	public function get_categoria6()// obtiene todos las categorias
	{
        $this->db->select('articulo.*, cat.category_name, articulo.categoryId');
        $this->db->from('articulos articulo');
		$this->db->join('categories cat', 'cat.id=articulo.categoryId', 'left');
		$this->db->where('articulo.categoryId', 6);
		$this->db->order_by('cat.category_name', 'asc');

		$query = $this->db->get();
        return $query->result();
        
	}
	public function get_categoria7()// obtiene todos las categorias
	{
        $this->db->select('articulo.*, cat.category_name, articulo.categoryId');
        $this->db->from('articulos articulo');
		$this->db->join('categories cat', 'cat.id=articulo.categoryId', 'left');
		$this->db->where('articulo.categoryId', 7);
		$this->db->order_by('cat.category_name', 'asc');

		$query = $this->db->get();
        return $query->result();
        
	}
    

	//

	

	public function get_categories()
	{
		$query = $this->db->get('categories');
		return $query->result();
	}
	public function get_categorie($categoryId)
	{

		$this->db->select('categorie.*');
		$this->db->from('categories categorie');
		$this->db->where('categorie.id', $categoryId);

		$query = $this->db->get('categories');
		return $query->result();
	}

	
	


	// manage blog
	public function get_admin_categorias()
	{
		$this->db->select('categorie.*');
		$this->db->from('categories categorie');
		$this->db->order_by('categorie.categoryId', 'asc');
		$query = $this->db->get();
		return $query->result();
	}

	public function get_admin_categoria($id)
	{
		$this->db->select('categorie.*');
		$this->db->from('categories categorie');
		$this->db->where('categorie.id', $id);
		$query = $this->db->get();
		return $query->row();
	}
	//


	// crud 

	public function insertCategoria($categoriaData)
	{
		$this->db->insert('categories', $categoriaData);
		return $this->db->insert_id();
	}

	public function updateCategoria($id, $categoriaData)
	{
		$this->db->where('id', $id);
		$this->db->update('categories', $categoriaData);
	}

	public function deleteCategoria($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('categories');
	}

	//

}
