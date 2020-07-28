<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api_Contacto extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('api_model_contacto');
		$this->load->model('api_model');
		$this->load->helper('url');
		$this->load->helper('text');
	}

	


	// get congreso
	public function contacts()
	{
		header("Access-Control-Allow-Origin: *");

		$contactos = $this->api_model_contacto->get_contacts($featured=false, $recentpost=false);

		$posts = array();
		if(!empty($contactos)){
			foreach($contactos as $contacto){


				$posts[] = array(
					'id' => $contacto->id,
					'name' => $contacto->name,
					'lastname' => $contacto->lastname,
					'email' => $contacto->email,
					'phone' => $contacto->phone,
					'message' => $contacto->message,
					'createdAt' => $contacto->createdAt
				);
			}
		}

		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($posts));
	}

	public function featured_contact()
	{
		header("Access-Control-Allow-Origin: *");

		$contactos = $this->api_model_contacto->get_contacts($featured=true, $recentpost=false);

		$posts = array();
		if(!empty($contactos)){
			foreach($contactos as $contacto){
				

				$posts[] = array(
					'id' => $contacto->id,
					'name' => $contacto->name,
					'lastname' => $contacto->lastname,
					'email' => $contacto->email,
					'phone' => $contacto->phone,
					'message' => $contacto->message,
					'createdAt' => $contacto->createdAt
				);
			}
		}

		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($posts));
	}

	public function contact($id)
	{
		header("Access-Control-Allow-Origin: *");
		
		$contacto = $this->api_model_contacto->get_contact($id);


		$post = array(
			'id' => $contacto->id,
					'name' => $contacto->name,
					'lastname' => $contacto->lastname,
					'email' => $contacto->email,
					'phone' => $contacto->phone,
					'message' => $contacto->message,
					'createdAt' => $contacto->createdAt
		);
		
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($post));
	}

	public function recent_contact()
	{
		header("Access-Control-Allow-Origin: *");

		$contacto = $this->api_model_contacto->get_contact($featured=false, $recentpost=5);

		$posts = array();
		if(!empty($contacto)){
			foreach($contacto as $contacto){
				

				$posts[] = array(
					'id' => $contacto->id,
					'name' => $contacto->name,
					'lastname' => $contacto->lastname,
					'email' => $contacto->email,
					'phone' => $contacto->phone,
					'message' => $contacto->message,
					'createdAt' => $contacto->createdAt
				);
			}
		}

		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($posts));
	}

	//


	//CRUD congreso

	public function adminContacts()
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Allow-Headers: authorization, Content-Type");

		$token = $this->input->get_request_header('Authorization');

		$isValidToken = $this->api_model->checkToken($token);

		$posts = array();
		if($isValidToken) {
			$contactos = $this->api_model_contacto->get_admin_contacts();
			foreach($contactos as $contacto) {
				$posts[] = array(
					'id' => $contacto->id,
					'name' => $contacto->name,
					'lastname' => $contacto->lastname,
					'email' => $contacto->email,
					'phone' => $contacto->phone,
					'message' => $contacto->message,
					'createdAt' => $contacto->createdAt
				);
			}

			$this->output
				->set_status_header(200)
				->set_content_type('application/json')
				->set_output(json_encode($posts)); 
		}
	}

	public function adminContact($id)
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Allow-Headers: authorization, Content-Type");

		$token = $this->input->get_request_header('Authorization');

		$isValidToken = $this->api_model->checkToken($token);

		if($isValidToken) {

			$contacto = $this->api_model_contacto->get_admin_contact($id);

			$post = array(
				'id' => $contacto->id,
					'name' => $contacto->name,
					'lastname' => $contacto->lastname,
					'email' => $contacto->email,
					'phone' => $contacto->phone,
					'message' => $contacto->message,
					'createdAt' => $contacto->createdAt
			);
			

			$this->output
				->set_status_header(200)
				->set_content_type('application/json')
				->set_output(json_encode($post)); 
		}
	}

	


	public function deleteContact($id)
	{
		header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
		header("Access-Control-Allow-Headers: authorization, Content-Type");

		$token = $this->input->get_request_header('Authorization');

		$isValidToken = $this->api_model->checkToken($token);

		if($isValidToken) {

			$contacto = $this->api_model_contacto->get_admin_contact($id);

			$this->api_model_contacto->deleteContact($id);

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
