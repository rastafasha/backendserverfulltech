<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api_Destacado extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->model('api_model');
        $this->load->model('api_model_destacado');
		$this->load->helper('url');
		$this->load->helper('text');
	}


	// Get Destacados
	public function destacados()
	{
		header("Access-Control-Allow-Origin: *");

		$destacados = $this->api_model_destacado->get_destacados($featured=false, $recentpost=false);

		$posts = array();
		if(!empty($destacados)){
			foreach($destacados as $destacado){

				$short_desc = strip_tags(character_limiter($destacado->description, 70));
				$author = $destacado->firstName.' '.$destacado->lastName;

				$posts[] = array(
					'id' => $destacado->id,
					'title' => $destacado->title,
					'short_desc' => html_entity_decode($short_desc),
					'description' => $destacado->description,
					'technology' => $destacado->technology,
					'author' => $author,
					'image' => base_url('media/images/destacados/'.$destacado->image),
					'background' => base_url('media/images/destacados/'.$destacado->background),
					'createdAt' => $destacado->createdAt
				);
			}
		}

		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($posts));
	}

	public function featured_destacados()
	{
		header("Access-Control-Allow-Origin: *");

		$destacados = $this->api_model_destacado->get_destacados($featured=true, $recentpost=false);

		$posts = array();
		if(!empty($destacados)){
			foreach($destacados as $destacado){
				
				$short_desc = strip_tags(character_limiter($destacado->description, 70));
				$author = $destacado->firstName.' '.$destacado->lastName;

				$posts[] = array(
					'id' => $destacado->id,
					'title' => $destacado->title,
					'short_desc' => html_entity_decode($short_desc),
					'description' => $destacado->description,
					'technology' => $destacado->technology,
					'author' => $author,
					'image' => base_url('media/images/destacados/'.$destacado->image),
					'background' => base_url('media/images/destacados/'.$destacado->background),
					'createdAt' => $destacado->createdAt
				);
			}
		}

		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($posts));
	}

	public function destacado($id)
	{
		header("Access-Control-Allow-Origin: *");
		
		$destacado = $this->api_model_destacado->get_destacado($id);

		$author = $destacado->firstName.' '.$destacado->lastName;

		$post = array(
			'id' => $destacado->id,
			'title' => $destacado->title,
			'description' => $destacado->description,
			'technology' => $destacado->technology,
			'author' => $author,
			'image' => base_url('media/images/destacados/'.$destacado->image),
			'background' => base_url('media/images/destacados/'.$destacado->background),
			'createdAt' => $destacado->createdAt
		);
		
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($post));
	}

	public function recent_destacados()
	{
		header("Access-Control-Allow-Origin: *");

		$destacados = $this->api_model_destacado->get_destacados($featured=false, $recentpost=5);

		$posts = array();
		if(!empty($destacados)){
			foreach($destacados as $destacado){
				
				$short_desc = strip_tags(character_limiter($destacado->description, 70));
				$author = $destacado->firstName.' '.$destacado->lastName;

				$posts[] = array(
					'id' => $destacado->id,
					'title' => $destacado->title,
					'short_desc' => html_entity_decode($short_desc),
					'description' => $destacado->description,
					'technology' => $destacado->technology,
					'author' => $author,
					'image' => base_url('media/images/destacados/'.$destacado->image),
					'background' => base_url('media/images/destacados/'.$destacado->background),
					'createdAt' => $destacado->createdAt
				);
			}
		}

		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($posts));
	}

    //
    


	// Manage Destacado

	public function adminDestacados()
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Allow-Headers: authorization, Content-Type");

		$token = $this->input->get_request_header('Authorization');

		$isValidToken = $this->api_model->checkToken($token);

		$posts = array();
		if($isValidToken) {
			$destacados = $this->api_model_destacado->get_admin_destacados();
			foreach($destacados as $destacado) {
				$posts[] = array(
					'id' => $destacado->id,
					'title' => $destacado->title,
					'description' => $destacado->description,
					'technology' => $destacado->technology,
					'image' => base_url('media/images/destacados/'.$destacado->image),
					'background' => base_url('media/images/destacados/'.$destacado->background),
					'createdAt' => $destacado->createdAt
				);
			}

			$this->output
				->set_status_header(200)
				->set_content_type('application/json')
				->set_output(json_encode($posts)); 
		}
	}

	public function adminDestacado($id)
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Allow-Headers: authorization, Content-Type");

		$token = $this->input->get_request_header('Authorization');

		$isValidToken = $this->api_model->checkToken($token);

		if($isValidToken) {

			$destacado = $this->api_model_destacado->get_admin_destacado($id);

			$post = array(
				'id' => $destacado->id,
				'title' => $destacado->title,
				'description' => $destacado->description,
				'technology' => $destacado->technology,
				'image' => base_url('media/images/destacados/'.$destacado->image),
				'background' => base_url('media/images/destacados/'.$destacado->background),
				'isFeatured' => $destacado->isFeatured,
				'isActive' => $destacado->isActive
			);
			

			$this->output
				->set_status_header(200)
				->set_content_type('application/json')
				->set_output(json_encode($post)); 
		}
	}

	public function createDestacado()
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
			$isFeatured = $this->input->post('isFeatured');
			$isActive = $this->input->post('isActive');

			$filename = NULL;

			$isUploadError = FALSE;

			if ($_FILES && $_FILES['image']['name']) {

				$config['upload_path']          = './media/images/destacados/';
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

			if ($_FILES && $_FILES['background']['name']) {

				$config['upload_path']          = './media/images/destacados/';
	            $config['allowed_types']        = 'gif|jpg|png|jpeg';
	            $config['max_size']             = 500;

	            $this->load->library('upload', $config);
	            if ( ! $this->upload->do_upload('background')) {

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
	        	$destacadoData = array(
					'title' => $title,
					'userId' => 1,
					'description' => $description,
					'technology' => $technology,
					'image' => $filename,
					'background' => $filename,
					'isFeatured' => $isFeatured,
					'isActive' => $isActive,
					'createdAt' => date('Y-m-d H:i:s', time())
				);

				$id = $this->api_model_destacado->insertDestacado($destacadoData);

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

	public function updateDestacado($id)
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Allow-Headers: authorization, Content-Type");
		header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");

		$token = $this->input->get_request_header('Authorization');

		$isValidToken = $this->api_model->checkToken($token);

		if($isValidToken) {

			$destacado = $this->api_model_destacado->get_admin_destacado($id);
			$filename = $destacado->image;

			$title = $this->input->post('title');
			$description = $this->input->post('description');
			$technology = $this->input->post('technology');
			$isFeatured = $this->input->post('isFeatured');
			$isActive = $this->input->post('isActive');

			$isUploadError = FALSE;

			if ($_FILES && $_FILES['image']['name']) {

				$config['upload_path']          = './media/images/destacados/';
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
	   
					if($destacado->image && file_exists(FCPATH.'media/images/destacados/'.$destacado->image))
					{
						unlink(FCPATH.'media/images/destacados/'.$destacado->image);
					}

	            	$uploadData = $this->upload->data();
            		$filename = $uploadData['file_name'];
	            }
			}
			if ($_FILES && $_FILES['background']['name']) {

				$config['upload_path']          = './media/images/destacados/';
	            $config['allowed_types']        = 'gif|jpg|png|jpeg';
	            $config['max_size']             = 500;

	            $this->load->library('upload', $config);
	            if ( ! $this->upload->do_upload('background')) {

	            	$isUploadError = TRUE;

					$response = array(
						'status' => 'error',
						'message' => $this->upload->display_errors()
					);
	            }
	            else {
	   
					if($destacado->background && file_exists(FCPATH.'media/images/destacados/'.$destacado->background))
					{
						unlink(FCPATH.'media/images/destacados/'.$destacado->background);
					}

	            	$uploadData = $this->upload->data();
            		$filename = $uploadData['file_name'];
	            }
			}

			if( ! $isUploadError) {
	        	$destacadoData = array(
					'title' => $title,
					'userId' => 1,
					'description' => $description,
					'technology' => $technology,
					'image' => $filename,
					'background' => $filename,
					'isFeatured' => $isFeatured,
					'isActive' => $isActive
				);

				$this->api_model_destacado->updateDestacado($id, $destacadoData);

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

	public function deleteDestacado($id)
	{
		header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
		header("Access-Control-Allow-Headers: authorization, Content-Type");

		$token = $this->input->get_request_header('Authorization');

		$isValidToken = $this->api_model->checkToken($token);

		if($isValidToken) {

			$destacado = $this->api_model_destacado->get_admin_destacado($id);

			if($destacado->image && file_exists(FCPATH.'media/images/destacados/'.$destacado->image))
			{
				unlink(FCPATH.'media/images/destacados/'.$destacado->image);
			}
			if($destacado->background && file_exists(FCPATH.'media/images/destacados/'.$destacado->background))
			{
				unlink(FCPATH.'media/images/destacados/'.$destacado->image);
			}

			$this->api_model_destacado->deleteDestacado($id);

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
