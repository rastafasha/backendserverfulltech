<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api_Bancuadrado extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('api_model');
		$this->load->model('api_model_bancuadrado');
		$this->load->helper('url');
		$this->load->helper('text');
	}


    // Ads cuadrado
	public function bancuadrados()
	{
		header("Access-Control-Allow-Origin: *");

		$bancuadrados = $this->api_model_bancuadrado->get_bancuadrados($featured=false, $recentpost=false);

		$posts = array();
		if(!empty($bancuadrados)){
			foreach($bancuadrados as $bancuadrado){


				$posts[] = array(
					'id' => $bancuadrado->id,
					'titulo' => $bancuadrado->titulo,
					'target' => $bancuadrado->target,
					'enlace' => $bancuadrado->enlace,
					'is_active' => $bancuadrado->is_active,
					'image' => base_url('media/images/ads/cuadrado/'.$bancuadrado->image),
					'created_at' => $bancuadrado->created_at
				);
			}
		}

		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($posts));
	}

	public function featured_bancuadrados()
	{
		header("Access-Control-Allow-Origin: *");

		$bancuadrados = $this->api_model_bancuadrado->get_bancuadrados($featured=true, $recentpost=false);

		$posts = array();
		if(!empty($bancuadrados)){
			foreach($bancuadrados as $bancuadrado){
				

				$posts[] = array(
					'id' => $bancuadrado->id,
					'titulo' => $bancuadrado->titulo,
					'target' => $bancuadrado->target,
					'enlace' => $bancuadrado->enlace,
					'is_active' => $bancuadrado->is_active,
					'image' => base_url('media/images/ads/cuadrado/'.$bancuadrado->image),
					'created_at' => $bancuadrado->created_at
				);
			}
		}

		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($posts));
	}

	public function bancuadrado($id)
	{
		header("Access-Control-Allow-Origin: *");
		
		$bancuadrado = $this->api_model_bancuadrado->get_bancuadrado($id);


		$post = array(
			'id' => $bancuadrado->id,
			'titulo' => $bancuadrado->titulo,
			'target' => $bancuadrado->target,
			'enlace' => $bancuadrado->enlace,
			'is_active' => $bancuadrado->is_active,
			'image' => base_url('media/images/ads/cuadrado/'.$bancuadrado->image),
			'created_at' => $bancuadrado->created_at
		);
		
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($post));
	}

	public function recent_bancuadrados()
	{
		header("Access-Control-Allow-Origin: *");

		$bancuadrados = $this->api_model_bancuadrado->get_bancuadrados($featured=false, $recentpost=5);

		$posts = array();
		if(!empty($bancuadrados)){
			foreach($bancuadrados as $bancuadrado){
				

				$posts[] = array(
					'id' => $bancuadrado->id,
					'titulo' => $bancuadrado->titulo,
					'target' => $bancuadrado->target,
					'enlace' => $bancuadrado->enlace,
					'is_active' => $bancuadrado->is_active,
					'image' => base_url('media/images/ads/cuadrado/'.$bancuadrado->image),
					'created_at' => $bancuadrado->created_at
				);
			}
		}

		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($posts));
	}

	//


	//CRUD bancuadrado

	public function adminBancuadrados()
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Allow-Headers: authorization, Content-Type");

		$token = $this->input->get_request_header('Authorization');

		$isValidToken = $this->api_model->checkToken($token);

		$posts = array();
		if($isValidToken) {
			$bancuadrados = $this->api_model_bancuadrado->get_admin_bancuadrados();
			foreach($bancuadrados as $bancuadrado) {
				$posts[] = array(
					'id' => $bancuadrado->id,
					'titulo' => $bancuadrado->titulo,
					'target' => $bancuadrado->target,
					'enlace' => $bancuadrado->enlace,
					'is_active' => $bancuadrado->is_active,
					'image' => base_url('media/images/ads/cuadrado/'.$bancuadrado->image),
					'created_at' => $bancuadrado->created_at
				);
			}

			$this->output
				->set_status_header(200)
				->set_content_type('application/json')
				->set_output(json_encode($posts)); 
		}
	}

	public function adminBancuadrado($id)
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Allow-Headers: authorization, Content-Type");

		$token = $this->input->get_request_header('Authorization');

		$isValidToken = $this->api_model->checkToken($token);

		if($isValidToken) {

			$bancuadrado = $this->api_model_bancuadrado->get_admin_bancuadrado($id);

			$post = array(
				'id' => $bancuadrado->id,
				'titulo' => $bancuadrado->titulo,
				'target' => $bancuadrado->target,
				'enlace' => $bancuadrado->enlace,
				'is_active' => $bancuadrado->is_active,
				'image' => base_url('media/images/ads/cuadrado/'.$bancuadrado->image),
				'created_at' => $bancuadrado->created_at,
				'is_active' => $bancuadrado->is_active
			);
			

			$this->output
				->set_status_header(200)
				->set_content_type('application/json')
				->set_output(json_encode($post)); 
		}
	}

	public function createBancuadrado()
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

				$config['upload_path']          = './media/images/ads/cuadrado/';
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
	        	$bancuadradoData = array(
					'titulo' => $titulo,
					'target' => $target,
					'enlace' => $enlace,
					'image' => $filename,
					'is_active' => $is_active,
					'created_at' => date('Y-m-d H:i:s', time())
				);

				$id = $this->api_model_bancuadrado->insertBancuadrado($bancuadradoData);

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

	public function updateBancuadrado($id)
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Allow-Headers: authorization, Content-Type");
		header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");

		$token = $this->input->get_request_header('Authorization');

		$isValidToken = $this->api_model->checkToken($token);

		if($isValidToken) {

			$bancuadrado = $this->api_model_bancuadrado->get_admin_bancuadrado($id);
			$filename = $bancuadrado->image;


			$titulo = $this->input->post('titulo');
			$target = $this->input->post('target');
			$enlace = $this->input->post('enlace');
			$is_active = $this->input->post('is_active');

			$isUploadError = FALSE;

			if ($_FILES && $_FILES['image']['name']) {

				$config['upload_path']          = './media/images/ads/cuadrado/';
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
	   
					if($bancuadrado->image && file_exists(FCPATH.'media/images/ads/cuadrado/'.$bancuadrado->image))
					{
						unlink(FCPATH.'media/images/ads/cuadrado/'.$bancuadrado->image);
					}

	            	$uploadData = $this->upload->data();
            		$filename = $uploadData['file_name'];
	            }
			}

			if( ! $isUploadError) {
	        	$bancuadradoData = array(
					
					'titulo' => $titulo,
					'target' => $target,
					'enlace' => $enlace,
					'image' => $filename,
					'is_active' => $is_active
				);

				$this->api_model_bancuadrado->updateBancuadrado($id, $bancuadradoData);

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

	public function deleteBancuadrado($id)
	{
		header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
		header("Access-Control-Allow-Headers: authorization, Content-Type");

		$token = $this->input->get_request_header('Authorization');

		$isValidToken = $this->api_model->checkToken($token);

		if($isValidToken) {

			$bancuadrado = $this->api_model_bancuadrado->get_admin_bancuadrado($id);

			if($bancuadrado->image && file_exists(FCPATH.'media/images/ads/cuadrado/'.$bancuadrado->image))
			{
				unlink(FCPATH.'media/images/ads/cuadrado/'.$bancuadrado->image);
			}

			$this->api_model->deleteBancuadrado($id);

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
