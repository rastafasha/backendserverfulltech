<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api_categoria extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->model('api_model');
        $this->load->model('api_model_categoria');
		$this->load->helper('url');
		$this->load->helper('text');
	}

	// Get Blog
	public function categorias()
	{
		header("Access-Control-Allow-Origin: *");

		$categories = $this->api_model_categoria->get_categories($featured=false, $recentpost=false);

		$posts = array();
		if(!empty($categories)){
			foreach($categories as $cat){


				$posts[] = array(
					'id' => $cat->id,
                    'category_name' => $cat->category_name,
				);
			}
		}

		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($posts));
    }
    
    public function porcategorias()
	{
		header("Access-Control-Allow-Origin: *");

		$categories = $this->api_model_categoria->get_porcategorias($featured=false, $recentpost=false);

		$posts = array();
		if(!empty($categories)){
			foreach($categories as $cat){


				$posts[] = array(
					'categoryId' => $cat->categoryId ,
                    'category_name' => $cat->category_name,
                    'title' => $cat->title,
                    'description' => $cat->description,
					'technology' => $cat->technology,
					'popup' => $cat->popup,
					'image' => base_url('media/images/articulos/'.$cat->image),
				);
			}
		}

		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($posts));
	}

	public function porcategoria1()
	{
		header("Access-Control-Allow-Origin: *");

		$categories = $this->api_model_categoria->get_categoria1($featured=false, $recentpost=false);

		$posts = array();
		if(!empty($categories)){
			foreach($categories as $cat){


				$posts[] = array(
					'categoryId' => $cat->categoryId ,
                    'category_name' => $cat->category_name,
                    'title' => $cat->title,
                    'description' => $cat->description,
					'technology' => $cat->technology,
					'popup' => $cat->popup,
					'image' => base_url('media/images/articulos/'.$cat->image),
				);
			}
		}

		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($posts));
	}

	public function porcategoria2()
	{
		header("Access-Control-Allow-Origin: *");

		$categories = $this->api_model_categoria->get_categoria2($featured=false, $recentpost=false);

		$posts = array();
		if(!empty($categories)){
			foreach($categories as $cat){


				$posts[] = array(
					'categoryId' => $cat->categoryId ,
                    'category_name' => $cat->category_name,
                    'title' => $cat->title,
                    'description' => $cat->description,
					'technology' => $cat->technology,
					'popup' => $cat->popup,
					'image' => base_url('media/images/articulos/'.$cat->image),
				);
			}
		}

		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($posts));
	}

	public function porcategoria3()
	{
		header("Access-Control-Allow-Origin: *");

		$categories = $this->api_model_categoria->get_categoria3($featured=false, $recentpost=false);

		$posts = array();
		if(!empty($categories)){
			foreach($categories as $cat){


				$posts[] = array(
					'categoryId' => $cat->categoryId ,
                    'category_name' => $cat->category_name,
                    'title' => $cat->title,
                    'description' => $cat->description,
					'technology' => $cat->technology,
					'popup' => $cat->popup,
					'image' => base_url('media/images/articulos/'.$cat->image),
				);
			}
		}

		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($posts));
	}
	public function porcategoria4()
	{
		header("Access-Control-Allow-Origin: *");

		$categories = $this->api_model_categoria->get_categoria4($featured=false, $recentpost=false);

		$posts = array();
		if(!empty($categories)){
			foreach($categories as $cat){


				$posts[] = array(
					'categoryId' => $cat->categoryId ,
                    'category_name' => $cat->category_name,
                    'title' => $cat->title,
                    'description' => $cat->description,
					'technology' => $cat->technology,
					'popup' => $cat->popup,
					'image' => base_url('media/images/articulos/'.$cat->image),
				);
			}
		}

		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($posts));
	}

	public function porcategoria5()
	{
		header("Access-Control-Allow-Origin: *");

		$categories = $this->api_model_categoria->get_categoria5($featured=false, $recentpost=false);

		$posts = array();
		if(!empty($categories)){
			foreach($categories as $cat){


				$posts[] = array(
					'categoryId' => $cat->categoryId ,
                    'category_name' => $cat->category_name,
                    'title' => $cat->title,
                    'description' => $cat->description,
					'technology' => $cat->technology,
					'popup' => $cat->popup,
					'image' => base_url('media/images/articulos/'.$cat->image),
				);
			}
		}

		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($posts));
	}
	public function porcategoria6()
	{
		header("Access-Control-Allow-Origin: *");

		$categories = $this->api_model_categoria->get_categoria6($featured=false, $recentpost=false);

		$posts = array();
		if(!empty($categories)){
			foreach($categories as $cat){


				$posts[] = array(
					'categoryId' => $cat->categoryId ,
                    'category_name' => $cat->category_name,
                    'title' => $cat->title,
                    'description' => $cat->description,
					'technology' => $cat->technology,
					'popup' => $cat->popup,
					'image' => base_url('media/images/articulos/'.$cat->image),
				);
			}
		}

		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($posts));
	}
	public function porcategoria7()
	{
		header("Access-Control-Allow-Origin: *");

		$categories = $this->api_model_categoria->get_categoria7($featured=false, $recentpost=false);

		$posts = array();
		if(!empty($categories)){
			foreach($categories as $cat){


				$posts[] = array(
					'categoryId' => $cat->categoryId ,
                    'category_name' => $cat->category_name,
                    'title' => $cat->title,
                    'description' => $cat->description,
					'technology' => $cat->technology,
					'popup' => $cat->popup,
					'image' => base_url('media/images/articulos/'.$cat->image),
				);
			}
		}

		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($posts));
	}


	public function categoria($categoryId)
	{
		header("Access-Control-Allow-Origin: *");
		
		$cat = $this->api_model_categoria->get_categorie($categoryId);


		$post = array(
			'categoryId' => $cat->categoryId,
                    'category_name' => $cat->category_name,
		);
		
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($post));
    }



	//

	
	// Manage cat

	public function adminCategorias()
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Allow-Headers: authorization, Content-Type");

		$token = $this->input->get_request_header('Authorization');

		$isValidToken = $this->api_model->checkToken($token);

		$posts = array();
		if($isValidToken) {
			$categories = $this->api_model_categoria->get_admin_categorias();
			foreach($categories as $categorie) {
				$posts[] = array(
					'id' => $categorie->id,
					'category_name' => $categorie->category_name
				);
			}

			$this->output
				->set_status_header(200)
				->set_content_type('application/json')
				->set_output(json_encode($posts)); 
		}
	}

	public function adminCategoria($id)
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Allow-Headers: authorization, Content-Type");

		$token = $this->input->get_request_header('Authorization');

		$isValidToken = $this->api_model->checkToken($token);

		if($isValidToken) {

			$categorie = $this->api_model_categoria->get_admin_categoria($id);

			$post = array(
				'id' => $categorie->id,
					'category_name' => $categorie->category_name
			);
			

			$this->output
				->set_status_header(200)
				->set_content_type('application/json')
				->set_output(json_encode($post)); 
		}
	}

	public function createCategoria()
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
		header("Access-Control-Allow-Headers: authorization, Content-Type");

		$token = $this->input->get_request_header('Authorization');

		$isValidToken = $this->api_model->checkToken($token);

		if($isValidToken) {

			$category_name = $this->input->post('category_name');

			if( ! $isUploadError) {
	        	$categoriaData = array(
					'category_name' => $category_name,
				);

				$id = $this->api_model_categoria->insertCategoria($categoriaData);

				$response = array(
					'status' => 'success'
				);
			}

			$this->output
				->set_status_header(200)
				->set_content_type('application/json')
				->set_output(json_encode($response)); 
		}
	}

	public function updateCategoria($id)
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Allow-Headers: authorization, Content-Type");
		header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");

		$token = $this->input->get_request_header('Authorization');

		$isValidToken = $this->api_model->checkToken($token);

		if($isValidToken) {

			$categorie = $this->api_model_categoria->get_admin_categoria($id);

			$category_name = $this->input->post('category_name');


			if( ! $isUploadError) {
	        	$categoriaData = array(
					'category_name' => $category_name
				);

				$this->api_model_categoria->updateCategoria($id, $categoriaData);

				$response = array(
					'status' => 'success'
				);
           	}

			$this->output
				->set_status_header(200)
				->set_content_type('application/json')
				->set_output(json_encode($response)); 
		}
	}

	public function deleteCategoria($id)
	{
		header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
		header("Access-Control-Allow-Headers: authorization, Content-Type");

		$token = $this->input->get_request_header('Authorization');

		$isValidToken = $this->api_model->checkToken($token);

		if($isValidToken) {

            $categorie = $this->api_model_categoria->get_admin_categoria($id);
            
			$this->api_model_categoria->deleteCatgoria($id);

			$response = array(
				'status' => 'success'
			);

			$this->output
				->set_status_header(200)
				->set_content_type('application/json')
				->set_output(json_encode($response)); 
		}
	}
	//



}
