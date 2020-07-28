<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api_Banhorizontal extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('api_model');
		$this->load->model('api_model_banhorizontal');
		$this->load->helper('url');
		$this->load->helper('text');
	}


// Ads horizontal
public function banhorizontals()
{
	header("Access-Control-Allow-Origin: *");

	$banhorizontals = $this->api_model_banhorizontal->get_banhorizontals($featured=false, $recentpost=false);

	$posts = array();
	if(!empty($banhorizontals)){
		foreach($banhorizontals as $banhorizontal){


			$posts[] = array(
				'id' => $banhorizontal->id,
				'titulo' => $banhorizontal->titulo,
				'target' => $banhorizontal->target,
				'enlace' => $banhorizontal->enlace,
				'is_active' => $banhorizontal->is_active,
				'image' => base_url('media/images/ads/horizontal/'.$banhorizontal->image),
				'created_at' => $banhorizontal->created_at
			);
		}
	}

	$this->output
		->set_content_type('application/json')
		->set_output(json_encode($posts));
}

public function featured_banhorizontals()
{
	header("Access-Control-Allow-Origin: *");

	$banhorizontals = $this->api_model_banhorizontal->get_banhorizontals($featured=true, $recentpost=false);

	$posts = array();
	if(!empty($banhorizontals)){
		foreach($banhorizontals as $banhorizontal){
			

			$posts[] = array(
				'id' => $banhorizontal->id,
				'titulo' => $banhorizontal->titulo,
				'target' => $banhorizontal->target,
				'enlace' => $banhorizontal->enlace,
				'is_active' => $banhorizontal->is_active,
				'image' => base_url('media/images/ads/horizontal/'.$banhorizontal->image),
				'created_at' => $banhorizontal->created_at
			);
		}
	}

	$this->output
		->set_content_type('application/json')
		->set_output(json_encode($posts));
}

public function banhorizontal($id)
{
	header("Access-Control-Allow-Origin: *");
	
	$banhorizontal = $this->api_model_banhorizontal->get_banhorizontal($id);


	$post = array(
		'id' => $banhorizontal->id,
		'titulo' => $banhorizontal->titulo,
		'target' => $banhorizontal->target,
		'enlace' => $banhorizontal->enlace,
		'is_active' => $banhorizontal->is_active,
		'image' => base_url('media/images/ads/horizontal/'.$banhorizontal->image),
		'created_at' => $banhorizontal->created_at
	);
	
	$this->output
		->set_content_type('application/json')
		->set_output(json_encode($post));
}

public function recent_banhorizontals()
{
	header("Access-Control-Allow-Origin: *");

	$banhorizontals = $this->api_model_banhorizontal->get_banhorizontals($featured=false, $recentpost=5);

	$posts = array();
	if(!empty($banhorizontals)){
		foreach($banhorizontals as $banhorizontal){
			

			$posts[] = array(
				'id' => $banhorizontal->id,
				'titulo' => $banhorizontal->titulo,
				'target' => $banhorizontal->target,
				'enlace' => $banhorizontal->enlace,
				'is_active' => $banhorizontal->is_active,
				'image' => base_url('media/images/ads/horizontal/'.$banhorizontal->image),
				'created_at' => $banhorizontal->created_at
			);
		}
	}

	$this->output
		->set_content_type('application/json')
		->set_output(json_encode($posts));
}

//


//CRUD ban horizontal

public function adminBanhorizontals()
{
	header("Access-Control-Allow-Origin: *");
	header("Access-Control-Allow-Headers: authorization, Content-Type");

	$token = $this->input->get_request_header('Authorization');

	$isValidToken = $this->api_model->checkToken($token);

	$posts = array();
	if($isValidToken) {
		$banhorizontals = $this->api_model_banhorizontal->get_admin_banhorizontals();
		foreach($banhorizontals as $banhorizontal) {
			$posts[] = array(
				'id' => $banhorizontal->id,
				'titulo' => $banhorizontal->titulo,
				'target' => $banhorizontal->target,
				'enlace' => $banhorizontal->enlace,
				'is_active' => $banhorizontal->is_active,
				'image' => base_url('media/images/ads/horizontal/'.$banhorizontal->image),
				'created_at' => $banhorizontal->created_at
			);
		}

		$this->output
			->set_status_header(200)
			->set_content_type('application/json')
			->set_output(json_encode($posts)); 
	}
}

public function adminBanhorizontal($id)
{
	header("Access-Control-Allow-Origin: *");
	header("Access-Control-Allow-Headers: authorization, Content-Type");

	$token = $this->input->get_request_header('Authorization');

	$isValidToken = $this->api_model->checkToken($token);

	if($isValidToken) {

		$banhorizontal = $this->api_model_banhorizontal->get_admin_banhorizontal($id);

		$post = array(
			'id' => $banhorizontal->id,
			'titulo' => $banhorizontal->titulo,
			'target' => $banhorizontal->target,
			'enlace' => $banhorizontal->enlace,
			'image' => base_url('media/images/ads/horizontal/'.$banhorizontal->image),
			'created_at' => $banhorizontal->created_at,
			'is_active' => $banhorizontal->is_active
		);
		

		$this->output
			->set_status_header(200)
			->set_content_type('application/json')
			->set_output(json_encode($post)); 
	}
}

public function createBanhorizontal()
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

			$config['upload_path']          = './media/images/ads/horizontal/';
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
			$banhorizontalData = array(
				'titulo' => $titulo,
				'target' => $target,
				'enlace' => $enlace,
				'image' => $filename,
				'is_active' => $is_active,
				'created_at' => date('Y-m-d H:i:s', time())
			);

			$id = $this->api_model_banhorizontal->insertBanhorizontal($banhorizontalData);

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

public function updateBanhorizontal($id)
{
	header("Access-Control-Allow-Origin: *");
	header("Access-Control-Allow-Headers: authorization, Content-Type");
	header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");

	$token = $this->input->get_request_header('Authorization');

	$isValidToken = $this->api_model->checkToken($token);

	if($isValidToken) {

		$banhorizontal = $this->api_model_banhorizontal->get_admin_banhorizontal($id);
		$filename = $banhorizontal->image;


		$titulo = $this->input->post('titulo');
		$target = $this->input->post('target');
		$enlace = $this->input->post('enlace');
		$is_active = $this->input->post('is_active');

		$isUploadError = FALSE;

		if ($_FILES && $_FILES['image']['name']) {

			$config['upload_path']          = './media/images/ads/horizontal/';
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
   
				if($banhorizontal->image && file_exists(FCPATH.'media/images/ads/horizontal/'.$banhorizontal->image))
				{
					unlink(FCPATH.'media/images/ads/horizontal/'.$banhorizontal->image);
				}

				$uploadData = $this->upload->data();
				$filename = $uploadData['file_name'];
			}
		}

		if( ! $isUploadError) {
			$banhorizontalData = array(
				
				'titulo' => $titulo,
				'target' => $target,
				'enlace' => $enlace,
				'image' => $filename,
				'is_active' => $is_active
			);

			$this->api_model_banhorizontal->updateBanhorizontal($id, $banhorizontalData);

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

public function deleteBanhorizontal($id)
{
	header('Access-Control-Allow-Origin: *');
	header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
	header("Access-Control-Allow-Headers: authorization, Content-Type");

	$token = $this->input->get_request_header('Authorization');

	$isValidToken = $this->api_model->checkToken($token);

	if($isValidToken) {

		$banhorizontal = $this->api_model_banhorizontal->get_admin_banhorizontal($id);

		if($banhorizontal->image && file_exists(FCPATH.'media/images/ads/horizontal/'.$banhorizontal->image))
		{
			unlink(FCPATH.'media/images/ads/horizontal/'.$banhorizontal->image);
		}

		$this->api_model_banhorizontal->deleteBanhorizontal($id);

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
