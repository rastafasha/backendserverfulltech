<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api_Banemergente extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('api_model');
		$this->load->model('api_model_banemergente');
		$this->load->helper('url');
		$this->load->helper('text');
	}


    // Ads cuadrado
	public function banemergentes()
	{
		header("Access-Control-Allow-Origin: *");

		$banemergentes = $this->api_model_banemergente->get_banemergentes($featured=false, $recentpost=false);

		$posts = array();
		if(!empty($banemergentes)){
			foreach($banemergentes as $banemergente){


				$posts[] = array(
					'id' => $banemergente->id,
					'titulo' => $banemergente->titulo,
					'target' => $banemergente->target,
					'enlace' => $banemergente->enlace,
					'is_active' => $banemergente->is_active,
					'image' => base_url('media/images/ads/emergente/'.$banemergente->image),
					'created_at' => $banemergente->created_at
				);
			}
		}

		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($posts));
	}

	public function featured_banemergentes()
	{
		header("Access-Control-Allow-Origin: *");

		$banemergentes = $this->api_model_banemergente->get_banemergentes($featured=true, $recentpost=false);

		$posts = array();
		if(!empty($banemergentes)){
			foreach($banemergentes as $banemergente){
				

				$posts[] = array(
					'id' => $banemergente->id,
					'titulo' => $banemergente->titulo,
					'target' => $banemergente->target,
					'enlace' => $banemergente->enlace,
					'is_active' => $banemergente->is_active,
					'image' => base_url('media/images/ads/emergente/'.$banemergente->image),
					'created_at' => $banemergente->created_at
				);
			}
		}

		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($posts));
	}

	public function banemergente($id)
	{
		header("Access-Control-Allow-Origin: *");
		
		$bancuadrado = $this->api_model_banemergente->get_bancuadrado($id);


		$post = array(
			'id' => $banemergente->id,
			'titulo' => $banemergente->titulo,
			'target' => $banemergente->target,
			'enlace' => $banemergente->enlace,
			'is_active' => $banemergente->is_active,
			'image' => base_url('media/images/ads/emergente/'.$banemergente->image),
			'created_at' => $banemergente->created_at
		);
		
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($post));
	}

	public function recent_banemergentes()
	{
		header("Access-Control-Allow-Origin: *");

		$bancuadrados = $this->api_model_banemergente->get_banemergentes($featured=false, $recentpost=5);

		$posts = array();
		if(!empty($bancuadrados)){
			foreach($banemergentes as $banemergente){
				

				$posts[] = array(
					'id' => $banemergente->id,
					'titulo' => $banemergente->titulo,
					'target' => $banemergente->target,
					'enlace' => $banemergente->enlace,
					'is_active' => $banemergente->is_active,
					'image' => base_url('media/images/ads/emergente/'.$banemergente->image),
					'created_at' => $banemergente->created_at
				);
			}
		}

		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($posts));
	}

	//


	//CRUD bancuadrado

	public function adminBanemergentes()
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Allow-Headers: authorization, Content-Type");

		$token = $this->input->get_request_header('Authorization');

		$isValidToken = $this->api_model->checkToken($token);

		$posts = array();
		if($isValidToken) {
			$banemergentes = $this->api_model_banemergente->get_admin_banemergentes();
			foreach($banemergentes as $banemergente) {
				$posts[] = array(
					'id' => $banemergente->id,
					'titulo' => $banemergente->titulo,
					'target' => $banemergente->target,
					'enlace' => $banemergente->enlace,
					'is_active' => $banemergente->is_active,
					'image' => base_url('media/images/ads/emergente/'.$banemergente->image),
					'created_at' => $banemergente->created_at
				);
			}

			$this->output
				->set_status_header(200)
				->set_content_type('application/json')
				->set_output(json_encode($posts)); 
		}
	}

	public function adminBanemergente($id)
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Allow-Headers: authorization, Content-Type");

		$token = $this->input->get_request_header('Authorization');

		$isValidToken = $this->api_model->checkToken($token);

		if($isValidToken) {

			$banemergente = $this->api_model_banemergente->get_admin_banemergente($id);

			$post = array(
				'id' => $banemergente->id,
				'titulo' => $banemergente->titulo,
				'target' => $banemergente->target,
				'enlace' => $banemergente->enlace,
				'is_active' => $banemergente->is_active,
				'image' => base_url('media/images/ads/emergente/'.$banemergente->image),
				'created_at' => $banemergente->created_at,
				'is_active' => $banemergente->is_active
			);
			

			$this->output
				->set_status_header(200)
				->set_content_type('application/json')
				->set_output(json_encode($post)); 
		}
	}

	public function createBanemergente()
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
		header("Access-Control-Allow-Headers: authorization, Content-Type");

		$token = $this->input->get_request_header('Authorization');

		$isValidToken = $this->api_model->checkToken($token);

		if($isValidToken) {

			$titulo = $this->input->post('titulo');
			$target = $this->input->post('target');
			$enlace = $this->input->post('enlace');
			$is_active = $this->input->post('is_active');

			$filename = NULL;

			$isUploadError = FALSE;

			if ($_FILES && $_FILES['image']['name']) {

				$config['upload_path']          = './media/images/ads/emergente/';
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
	        	$banemergenteData = array(
					'titulo' => $titulo,
					'target' => $target,
					'enlace' => $enlace,
					'image' => $filename,
					'is_active' => $is_active,
					'created_at' => date('Y-m-d H:i:s', time())
				);

				$id = $this->api_model_banemergente->insertBanemergente($banemergenteData);

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

	public function updateBanemergente($id)
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Allow-Headers: authorization, Content-Type");
		header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");

		$token = $this->input->get_request_header('Authorization');

		$isValidToken = $this->api_model->checkToken($token);

		if($isValidToken) {

			$banemergente = $this->api_model_banemergente->get_admin_banemergente($id);
			$filename = $banemergente->image;


			$titulo = $this->input->post('titulo');
			$target = $this->input->post('target');
			$enlace = $this->input->post('enlace');
			$is_active = $this->input->post('is_active');

			$isUploadError = FALSE;

			if ($_FILES && $_FILES['image']['name']) {

				$config['upload_path']          = './media/images/ads/emergente/';
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
	   
					if($banemergente->image && file_exists(FCPATH.'media/images/ads/emergente/'.$banemergente->image))
					{
						unlink(FCPATH.'media/images/ads/emergente/'.$banemergente->image);
					}

	            	$uploadData = $this->upload->data();
            		$filename = $uploadData['file_name'];
	            }
			}

			if( ! $isUploadError) {
	        	$banemergenteData = array(
					
					'titulo' => $titulo,
					'target' => $target,
					'enlace' => $enlace,
					'image' => $filename,
					'is_active' => $is_active
				);

				$this->api_model_banemergente->updateBanemergente($id, $banemergenteData);

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

	public function deleteBanemergente($id)
	{
		header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
		header("Access-Control-Allow-Headers: authorization, Content-Type");

		$token = $this->input->get_request_header('Authorization');

		$isValidToken = $this->api_model->checkToken($token);

		if($isValidToken) {

			$banemergente = $this->api_model_banemergente->get_admin_banemergente($id);

			if($banemergente->image && file_exists(FCPATH.'media/images/ads/emergente/'.$banemergente->image))
			{
				unlink(FCPATH.'media/images/ads/emergente/'.$banemergente->image);
			}

			$this->api_model_banemergente->deleteBanemergente($id);

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
