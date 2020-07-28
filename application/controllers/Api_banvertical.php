<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api_Banvertical extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('api_model');
		$this->load->model('api_model_banvertical');
		$this->load->helper('url');
		$this->load->helper('text');
	}

	

// Ads vertical
public function banverticals()
{
	header("Access-Control-Allow-Origin: *");

	$banverticals = $this->api_model_banvertical->get_banverticals($featured=false, $recentpost=false);

	$posts = array();
	if(!empty($banverticals)){
		foreach($banverticals as $banvertical){


			$posts[] = array(
				'id' => $banvertical->id,
				'titulo' => $banvertical->titulo,
				'target' => $banvertical->target,
				'enlace' => $banvertical->enlace,
				'is_active' => $banvertical->is_active,
				'image' => base_url('media/images/ads/vertical/'.$banvertical->image),
				'created_at' => $banvertical->created_at
			);
		}
	}

	$this->output
		->set_content_type('application/json')
		->set_output(json_encode($posts));
}

public function featured_banverticals()
{
	header("Access-Control-Allow-Origin: *");

	$banverticals = $this->api_model_banvertical->get_banverticals($featured=true, $recentpost=false);

	$posts = array();
	if(!empty($banverticals)){
		foreach($banverticals as $banvertical){
			

			$posts[] = array(
				'id' => $banvertical->id,
				'titulo' => $banvertical->titulo,
				'target' => $banvertical->target,
				'enlace' => $banvertical->enlace,
				'is_active' => $banvertical->is_active,
				'image' => base_url('media/images/ads/vertical/'.$banvertical->image),
				'created_at' => $banvertical->created_at
			);
		}
	}

	$this->output
		->set_content_type('application/json')
		->set_output(json_encode($posts));
}

public function banvertical($id)
{
	header("Access-Control-Allow-Origin: *");
	
	$banvertical = $this->api_model_banvertical->get_banvertical($id);


	$post = array(
		'id' => $banvertical->id,
		'titulo' => $banvertical->titulo,
		'target' => $banvertical->target,
		'enlace' => $banvertical->enlace,
		'is_active' => $banvertical->is_active,
		'image' => base_url('media/images/ads/vertical/'.$banvertical->image),
		'created_at' => $banvertical->created_at
	);
	
	$this->output
		->set_content_type('application/json')
		->set_output(json_encode($post));
}

public function recent_banverticals()
{
	header("Access-Control-Allow-Origin: *");

	$banverticals = $this->api_model_banvertical->get_banverticals($featured=false, $recentpost=5);

	$posts = array();
	if(!empty($banverticals)){
		foreach($banverticals as $banvertical){
			

			$posts[] = array(
				'id' => $banvertical->id,
				'titulo' => $banvertical->titulo,
				'target' => $banvertical->target,
				'enlace' => $banvertical->enlace,
				'is_active' => $banvertical->is_active,
				'image' => base_url('media/images/ads/vertical/'.$banvertical->image),
				'created_at' => $banvertical->created_at
			);
		}
	}

	$this->output
		->set_content_type('application/json')
		->set_output(json_encode($posts));
}

//


//CRUD ban vertical

public function adminBanverticals()
{
	header("Access-Control-Allow-Origin: *");
	header("Access-Control-Allow-Headers: authorization, Content-Type");

	$token = $this->input->get_request_header('Authorization');

	$isValidToken = $this->api_model->checkToken($token);

	$posts = array();
	if($isValidToken) {
		$banverticals = $this->api_model_banvertical->get_admin_banverticals();
		foreach($banverticals as $banvertical) {
			$posts[] = array(
				'id' => $banvertical->id,
				'titulo' => $banvertical->titulo,
				'target' => $banvertical->target,
				'enlace' => $banvertical->enlace,
				'is_active' => $banvertical->is_active,
				'image' => base_url('media/images/ads/vertical/'.$banvertical->image),
				'created_at' => $banvertical->created_at
			);
		}

		$this->output
			->set_status_header(200)
			->set_content_type('application/json')
			->set_output(json_encode($posts)); 
	}
}

public function adminBanvertical($id)
{
	header("Access-Control-Allow-Origin: *");
	header("Access-Control-Allow-Headers: authorization, Content-Type");

	$token = $this->input->get_request_header('Authorization');

	$isValidToken = $this->api_model->checkToken($token);

	if($isValidToken) {

		$banvertical = $this->api_model_banvertical->get_admin_banvertical($id);

		$post = array(
			'id' => $banvertical->id,
			'titulo' => $banvertical->titulo,
			'target' => $banvertical->target,
			'enlace' => $banvertical->enlace,
			'is_active' => $banvertical->is_active,
			'image' => base_url('media/images/ads/vertical/'.$banvertical->image),
			'created_at' => $banvertical->created_at,
			'is_active' => $banvertical->is_active
		);
		

		$this->output
			->set_status_header(200)
			->set_content_type('application/json')
			->set_output(json_encode($post)); 
	}
}

public function createBanvertical()
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

			$config['upload_path']          = './media/images/ads/vertical/';
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
			$banverticalData = array(
				'titulo' => $titulo,
				'target' => $target,
				'enlace' => $enlace,
				'image' => $filename,
				'is_active' => $is_active,
				'created_at' => date('Y-m-d H:i:s', time())
			);

			$id = $this->api_model_banvertical->insertBanvertical($banverticalData);

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

public function updateBanvertical($id)
{
	header("Access-Control-Allow-Origin: *");
	header("Access-Control-Allow-Headers: authorization, Content-Type");
	header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");

	$token = $this->input->get_request_header('Authorization');

	$isValidToken = $this->api_model->checkToken($token);

	if($isValidToken) {

		$banvertical = $this->api_model_banvertical->get_admin_banvertical($id);
		$filename = $banvertical->image;


		$titulo = $this->input->post('titulo');
		$target = $this->input->post('target');
		$enlace = $this->input->post('enlace');
		$is_active = $this->input->post('is_active');

		$isUploadError = FALSE;

		if ($_FILES && $_FILES['image']['name']) {

			$config['upload_path']          = './media/images/ads/vertical/';
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
   
				if($banvertical->image && file_exists(FCPATH.'media/images/ads/vertical/'.$banvertical->image))
				{
					unlink(FCPATH.'media/images/ads/vertical/'.$banvertical->image);
				}

				$uploadData = $this->upload->data();
				$filename = $uploadData['file_name'];
			}
		}

		if( ! $isUploadError) {
			$banverticalData = array(
				
				'titulo' => $titulo,
				'target' => $target,
				'enlace' => $enlace,
				'image' => $filename,
				'is_active' => $is_active
			);

			$this->api_model_banvertical->updateBanvertical($id, $banverticalData);

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

public function deleteBanvertical($id)
{
	header('Access-Control-Allow-Origin: *');
	header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
	header("Access-Control-Allow-Headers: authorization, Content-Type");

	$token = $this->input->get_request_header('Authorization');

	$isValidToken = $this->api_model->checkToken($token);

	if($isValidToken) {

		$banvertical = $this->api_model_banvertical->get_admin_banvertical($id);

		if($banvertical->image && file_exists(FCPATH.'media/images/ads/vertical/'.$banvertical->image))
		{
			unlink(FCPATH.'media/images/ads/vertical/'.$banvertical->image);
		}

		$this->api_model_banvertical->deleteBanvertical($id);

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
