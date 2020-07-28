<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api_Articulo extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->model('api_model');
        $this->load->model('api_model_articulo');
		$this->load->helper('url');
		$this->load->helper('text');
	}


	// Get Articulos
	public function articulos()
	{
		header("Access-Control-Allow-Origin: *");

		$articulos = $this->api_model_articulo->get_articulos($featured=false, $recentpost=false);

		$posts = array();
		if(!empty($articulos)){
			foreach($articulos as $articulo){

				$short_desc = strip_tags(character_limiter($articulo->description, 70));
				$author = $articulo->firstName.' '.$articulo->lastName;

				$posts[] = array(
					'id' => $articulo->id,
					'title' => $articulo->title,
					'short_desc' => html_entity_decode($short_desc),
					'description' => $articulo->description,
					'technology' => $articulo->technology,
					'popup' => $articulo->popup,
					'categoryId' => $articulo->categoryId,
					'isActive' => $articulo->isActive,
					'isFeatured' => $articulo->isFeatured,
					'author' => $author,
					'image' => base_url('media/images/articulos/'.$articulo->image),
					'createdAt' => $articulo->createdAt
				);
			}
		}

		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($posts));
	}

	public function featured_articulos()
	{
		header("Access-Control-Allow-Origin: *");

		$articulos = $this->api_model_articulo->get_articulos($featured=true, $recentpost=false);

		$posts = array();
		if(!empty($articulos)){
			foreach($articulos as $articulo){
				
				$short_desc = strip_tags(character_limiter($articulo->description, 70));
				$author = $articulo->firstName.' '.$articulo->lastName;

				$posts[] = array(
					'id' => $articulo->id,
					'title' => $articulo->title,
					'short_desc' => html_entity_decode($short_desc),
					'description' => $articulo->description,
					'technology' => $articulo->technology,
					'popup' => $articulo->popup,
					'categoryId' => $articulo->categoryId,
					'isFeatured' => $articulo->isFeatured,
					'author' => $author,
					'image' => base_url('media/images/articulos/'.$articulo->image),
					'createdAt' => $articulo->createdAt
				);
			}
		}

		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($posts));
	}

	public function articulo($id)
	{
		header("Access-Control-Allow-Origin: *");
		
		$articulo = $this->api_model_articulo->get_articulo($id);

		$author = $articulo->firstName.' '.$articulo->lastName;

		$post = array(
			'id' => $articulo->id,
			'title' => $articulo->title,
			'description' => $articulo->description,
			'technology' => $articulo->technology,
			'popup' => $articulo->popup,
			'categoryId' => $articulo->categoryId,
			'isFeatured' => $articulo->isFeatured,
			'author' => $author,
			'image' => base_url('media/images/articulos/'.$articulo->image),
			'createdAt' => $articulo->createdAt
		);
		
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($post));
	}

	public function recent_articulos()
	{
		header("Access-Control-Allow-Origin: *");

		$articulos = $this->api_model_articulo->get_articulos($featured=false, $recentpost=5);

		$posts = array();
		if(!empty($articulos)){
			foreach($articulos as $articulo){
				
				$short_desc = strip_tags(character_limiter($articulo->description, 70));
				$author = $articulo->firstName.' '.$articulo->lastName;

				$posts[] = array(
					'id' => $articulo->id,
					'title' => $articulo->title,
					'short_desc' => html_entity_decode($short_desc),
					'description' => $articulo->description,
					'technology' => $articulo->technology,
					'popup' => $articulo->popup,
					'categoryId' => $articulo->categoryId,
					'author' => $author,
					'image' => base_url('media/images/articulos/'.$articulo->image),
					'createdAt' => $articulo->createdAt
				);
			}
		}

		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($posts));
	}

	//


	// Manage Articulos

	public function adminArticulos()
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Allow-Headers: authorization, Content-Type");

		$token = $this->input->get_request_header('Authorization');

		$isValidToken = $this->api_model->checkToken($token);

		$posts = array();
		if($isValidToken) {
			$articulos = $this->api_model_articulo->get_admin_articulos();
			foreach($articulos as $articulo) {
				$posts[] = array(
					'id' => $articulo->id,
					'title' => $articulo->title,
					'description' => $articulo->description,
					'technology' => $articulo->technology,
					'popup' => $articulo->popup,
					'categoryId' => $articulo->categoryId,
					'image' => base_url('media/images/articulos/'.$articulo->image),
					'createdAt' => $articulo->createdAt
				);
			}

			$this->output
				->set_status_header(200)
				->set_content_type('application/json')
				->set_output(json_encode($posts)); 
		}
	}

	public function adminArticulo($id)
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Allow-Headers: authorization, Content-Type");

		$token = $this->input->get_request_header('Authorization');

		$isValidToken = $this->api_model->checkToken($token);

		if($isValidToken) {

			$articulo = $this->api_model_articulo->get_admin_articulo($id);

			$post = array(
				'id' => $articulo->id,
				'title' => $articulo->title,
				'description' => $articulo->description,
				'technology' => $articulo->technology,
				'popup' => $articulo->popup,
				'categoryId' => $articulo->categoryId,
				'image' => base_url('media/images/articulos/'.$articulo->image),
				'isFeatured' => $articulo->isFeatured,
				'isActive' => $articulo->isActive
			);
			

			$this->output
				->set_status_header(200)
				->set_content_type('application/json')
				->set_output(json_encode($post)); 
		}
	}

	public function createArticulo()
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
		header("Access-Control-Allow-Headers: authorization, Content-Type");

		$token = $this->input->get_request_header('Authorization');

		$isValidToken = $this->api_model->checkToken($token);

		if($isValidToken) {

			$title = $this->input->post('title');
			$description = $this->input->post('description');
			$technology = $this->input->post('technology');
			$popup = $this->input->post('popup');
			$categoryId = $this->input->post('categoryId');
			$isFeatured = $this->input->post('isFeatured');
			$isActive = $this->input->post('isActive');

			$filename = NULL;

			$isUploadError = FALSE;

			if ($_FILES && $_FILES['image']['name']) {

				$config['upload_path']          = './media/images/articulos/';
	            $config['allowed_types']        = 'gif|jpg|png|jpeg';
	            $config['max_size']             = 500;

	            $this->load->library('upload', $config);
	            if ( ! $this->upload->do_upload('image')) {

	            	$isUploadError = TRUE;

					$response = array(
						'status' => 'error',
						'message' => $this->upload->display_errors()
					);
	            }
	            else {
	            	$uploadData = $this->upload->data();
            		$filename = $uploadData['file_name'];
	            }
			}

			if( ! $isUploadError) {
	        	$articuloData = array(
					'title' => $title,
					'userId' => 1,
					'description' => $description,
					'technology' => $technology,
					'popup' => $popup,
					'categoryId' => $categoryId,
					'image' => $filename,
					'isFeatured' => $isFeatured,
					'isActive' => $isActive,
					'createdAt' => date('Y-m-d H:i:s', time())
				);

				$id = $this->api_model_articulo->insertArticulo($articuloData);

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

	public function updateArticulo($id)
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Allow-Headers: authorization, Content-Type");
		header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");

		$token = $this->input->get_request_header('Authorization');

		$isValidToken = $this->api_model->checkToken($token);

		if($isValidToken) {

			$articulo = $this->api_model_articulo->get_admin_articulo($id);
			$filename = $articulo->image;

			$title = $this->input->post('title');
			$description = $this->input->post('description');
			$technology = $this->input->post('technology');
			$popup = $this->input->post('popup');
			$categoryId = $this->input->post('categoryId');
			$isFeatured = $this->input->post('isFeatured');
			$isActive = $this->input->post('isActive');

			$isUploadError = FALSE;

			if ($_FILES && $_FILES['image']['name']) {

				$config['upload_path']          = './media/images/articulos/';
	            $config['allowed_types']        = 'gif|jpg|png|jpeg';
	            $config['max_size']             = 500;

	            $this->load->library('upload', $config);
	            if ( ! $this->upload->do_upload('image')) {

	            	$isUploadError = TRUE;

					$response = array(
						'status' => 'error',
						'message' => $this->upload->display_errors()
					);
	            }
	            else {
	   
					if($articulo->image && file_exists(FCPATH.'media/images/articulos/'.$articulo->image))
					{
						unlink(FCPATH.'media/images/articulos/'.$articulo->image);
					}

	            	$uploadData = $this->upload->data();
            		$filename = $uploadData['file_name'];
	            }
			}

			if( ! $isUploadError) {
	        	$articuloData = array(
					'title' => $title,
					'userId' => 1,
					'description' => $description,
					'technology' => $technology,
					'popup' => $popup,
					'categoryId' => $categoryId,
					'image' => $filename,
					'isFeatured' => $isFeatured,
					'isActive' => $isActive
				);

				$this->api_model_articulo->updateArticulo($id, $articuloData);

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

	public function deleteArticulo($id)
	{
		header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
		header("Access-Control-Allow-Headers: authorization, Content-Type");

		$token = $this->input->get_request_header('Authorization');

		$isValidToken = $this->api_model->checkToken($token);

		if($isValidToken) {

			$articulo = $this->api_model_articulo->get_admin_articulo($id);

			if($articulo->image && file_exists(FCPATH.'media/images/articulos/'.$articulo->image))
			{
				unlink(FCPATH.'media/images/articulos/'.$articulo->image);
			}

			$this->api_model_articulo->deleteArticulo($id);

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
