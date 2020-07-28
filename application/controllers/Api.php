<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('api_model');
		$this->load->helper('url');
		$this->load->helper('text');
	}

	// Get Blog
	public function blogs()
	{
		header("Access-Control-Allow-Origin: *");

		$blogs = $this->api_model->get_blogs($featured=false, $recentpost=false);

		$posts = array();
		if(!empty($blogs)){
			foreach($blogs as $blog){

				$short_desc = strip_tags(character_limiter($blog->description, 70));
				$author = $blog->firstName.' '.$blog->lastName;

				$posts[] = array(
					'id' => $blog->id,
					'title' => $blog->title,
					'short_desc' => html_entity_decode($short_desc),
					'author' => $author,
					'image' => base_url('media/images/'.$blog->image),
					'createdAt' => $blog->createdAt
				);
			}
		}

		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($posts));
	}

	public function featured_blogs()
	{
		header("Access-Control-Allow-Origin: *");

		$blogs = $this->api_model->get_blogs($featured=true, $recentpost=false);

		$posts = array();
		if(!empty($blogs)){
			foreach($blogs as $blog){
				
				$short_desc = strip_tags(character_limiter($blog->description, 70));
				$author = $blog->firstName.' '.$blog->lastName;

				$posts[] = array(
					'id' => $blog->id,
					'title' => $blog->title,
					'short_desc' => html_entity_decode($short_desc),
					'author' => $author,
					'image' => base_url('media/images/'.$blog->image),
					'createdAt' => $blog->createdAt
				);
			}
		}

		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($posts));
	}

	public function blog($id)
	{
		header("Access-Control-Allow-Origin: *");
		
		$blog = $this->api_model->get_blog($id);

		$author = $blog->firstName.' '.$blog->lastName;

		$post = array(
			'id' => $blog->id,
			'title' => $blog->title,
			'description' => $blog->description,
			'author' => $author,
			'image' => base_url('media/images/'.$blog->image),
			'createdAt' => $blog->createdAt
		);
		
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($post));
	}

	public function recent_blogs()
	{
		header("Access-Control-Allow-Origin: *");

		$blogs = $this->api_model->get_blogs($featured=false, $recentpost=5);

		$posts = array();
		if(!empty($blogs)){
			foreach($blogs as $blog){
				
				$short_desc = strip_tags(character_limiter($blog->description, 70));
				$author = $blog->firstName.' '.$blog->lastName;

				$posts[] = array(
					'id' => $blog->id,
					'title' => $blog->title,
					'short_desc' => html_entity_decode($short_desc),
					'author' => $author,
					'image' => base_url('media/images/'.$blog->image),
					'createdAt' => $blog->createdAt
				);
			}
		}

		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($posts));
	}

	//




	// Get Users 

public function users()
{
	header("Access-Control-Allow-Origin: *");

	$users = $this->api_model->get_users($featured=false, $recentpost=false);

	$posts = array();
	if(!empty($users)){
		foreach($users as $user){

			$short_desc = strip_tags(character_limiter($user->description, 70));
			$author = $user->firstName.' '.$user->lastName;

			$posts[] = array(
				'id' => $user->id,
				'username' => $user->username,
				'password' => $user->password,
				'firstName' => $user->firstName,
				'lastName' => $user->lastName,
				'image' => base_url('media/images/user/'.$user->image),
				'createdAt' => $user->createdAt
			);
		}
	}

	$this->output
		->set_content_type('application/json')
		->set_output(json_encode($posts));
}


public function user($id)
{
	header("Access-Control-Allow-Origin: *");
	
	$user = $this->api_model->get_user($id);

	$author = $user->firstName.' '.$user->lastName;

	$post = array(
		'id' => $user->id,
		'username' => $user->username,
		'password' => $user->password,
		'firstName' => $user->firstName,
		'lastName' => $user->lastName,
		'image' => base_url('media/images/user/'.$user->image),
		'createdAt' => $user->createdAt
	);
	
	$this->output
		->set_content_type('application/json')
		->set_output(json_encode($post));
}
//




	// Categories

	public function categories()
	{
		header("Access-Control-Allow-Origin: *");

		$categories = $this->api_model->get_categories();

		$category = array();
		if(!empty($categories)){
			foreach($categories as $cate){
				$category[] = array(
					'id' => $cate->id,
					'name' => $cate->category_name
				);
			}
		}

		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($category));
	}

	// Pages

	public function page($slug)
	{
		header("Access-Control-Allow-Origin: *");
		
		$page = $this->api_model->get_page($slug);

		$pagedata = array(
			'id' => $page->id,
			'title' => $page->title,
			'description' => $page->description
		);
		
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($pagedata));
	}

	// Contact

	public function contact()
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
		header('Access-Control-Allow-Headers: Accept,Accept-Language,Content-Language,Content-Type');
		header('responseType: text');

		$formdata = json_decode(file_get_contents('php://input'), true);

		if( ! empty($formdata)) {

			$name = $formdata['name'];
			$email = $formdata['email'];
			$phone = $formdata['phone'];
			$message = $formdata['message'];

			$contactData = array(
				'name' => $name,
				'email' => $email,
				'phone' => $phone,
				'message' => $message,
				'createdAt' => date('Y-m-d H:i:s', time())
			);
			
			$id = $this->api_model->insert_contact($contactData);

			$this->sendemail($contactData);
			
			$response = array('id' => $id);
		}
		else {
			$response = array('id' => '');
		}
		
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($response));
	}

	public function sendemail($contactData)
	{
		$message = '<p>Hi, <br />Alguien ha escrito desde Full Technology Venezuela webapp.</p>';
		$message .= '<p><strong>Nombre: </strong>'.$contactData['name'].'</p>';
		$message .= '<p><strong>Apellido: </strong>'.$contactData['lastname'].'</p>';
		$message .= '<p><strong>Email: </strong>'.$contactData['email'].'</p>';
		$message .= '<p><strong>Teléfono: </strong>'.$contactData['phone'].'</p>';
		$message .= '<p><strong>Mensaje: </strong>'.$contactData['message'].'</p>';
		$message .= '<br />Gracias!';

		$this->load->library('email');

		$config['protocol'] = 'sendmail';
		$config['mailpath'] = '/usr/sbin/sendmail';
		$config['charset'] = 'iso-8859-1';
		$config['wordwrap'] = TRUE;
		$config['mailtype'] = 'html';

		$this->email->initialize($config);

		/*$this->email->from('mercadocreativo@gmail.com', 'Full Technology Venezuela');
		$this->email->to('mercadocreativo@gmail.com');*/
		$this->email->from('fulltechnology.ca@gmail.com', 'Full Technology Venezuela');
		$this->email->to('fulltechnology.ca@gmail.com');
		$this->email->cc('mercadocreativo@hotmail.com');
		// $this->email->bcc('mercadocreativo@gmail.com');

		$this->email->subject('Contact Form');
		$this->email->message($message);

		$this->email->send();
	}
	//





// login
	public function login() 
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
		header('Access-Control-Allow-Headers: Accept,Accept-Language,Content-Language,Content-Type');

		$formdata = json_decode(file_get_contents('php://input'), true);

		$username = $formdata['username'];
		$password = $formdata['password'];

		$user = $this->api_model->login($username, $password);

		if($user) {
			$response = array(
				'userId' => $user->id,
				'firstName' => $user->firstName,
				'lastName' => $user->lastName,
				'token' => $user->token
			);
		}
		else {
			$response = array();
		}

		$this->output
				->set_content_type('application/json')
				->set_output(json_encode($response));
	}
	//




	// Manage Blog

	public function adminBlogs()
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Allow-Headers: authorization, Content-Type");

		$token = $this->input->get_request_header('Authorization');

		$isValidToken = $this->api_model->checkToken($token);

		$posts = array();
		if($isValidToken) {
			$blogs = $this->api_model->get_admin_blogs();
			foreach($blogs as $blog) {
				$posts[] = array(
					'id' => $blog->id,
					'title' => $blog->title,
					'image' => base_url('media/images/'.$blog->image),
					'createdAt' => $blog->createdAt
				);
			}

			$this->output
				->set_status_header(200)
				->set_content_type('application/json')
				->set_output(json_encode($posts)); 
		}
	}

	public function adminBlog($id)
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Allow-Headers: authorization, Content-Type");

		$token = $this->input->get_request_header('Authorization');

		$isValidToken = $this->api_model->checkToken($token);

		if($isValidToken) {

			$blog = $this->api_model->get_admin_blog($id);

			$post = array(
				'id' => $blog->id,
				'title' => $blog->title,
				'description' => $blog->description,
				'image' => base_url('media/images/'.$blog->image),
				'isFeatured' => $blog->isFeatured,
				'isActive' => $blog->isActive
			);
			

			$this->output
				->set_status_header(200)
				->set_content_type('application/json')
				->set_output(json_encode($post)); 
		}
	}

	public function createBlog()
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
		header("Access-Control-Allow-Headers: authorization, Content-Type");

		$token = $this->input->get_request_header('Authorization');

		$isValidToken = $this->api_model->checkToken($token);

		if($isValidToken) {

			$title = $this->input->post('title');
			$description = $this->input->post('description');
			$isFeatured = $this->input->post('isFeatured');
			$isActive = $this->input->post('isActive');

			$filename = NULL;

			$isUploadError = FALSE;

			if ($_FILES && $_FILES['image']['name']) {

				$config['upload_path']          = './media/images/';
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
	        	$blogData = array(
					'title' => $title,
					'userId' => 1,
					'description' => $description,
					'image' => $filename,
					'isFeatured' => $isFeatured,
					'isActive' => $isActive,
					'createdAt' => date('Y-m-d H:i:s', time())
				);

				$id = $this->api_model->insertBlog($blogData);

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

	public function updateBlog($id)
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Allow-Headers: authorization, Content-Type");
		header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");

		$token = $this->input->get_request_header('Authorization');

		$isValidToken = $this->api_model->checkToken($token);

		if($isValidToken) {

			$blog = $this->api_model->get_admin_blog($id);
			$filename = $blog->image;

			$title = $this->input->post('title');
			$description = $this->input->post('description');
			$isFeatured = $this->input->post('isFeatured');
			$isActive = $this->input->post('isActive');

			$isUploadError = FALSE;

			if ($_FILES && $_FILES['image']['name']) {

				$config['upload_path']          = './media/images/';
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
	   
					if($blog->image && file_exists(FCPATH.'media/images/'.$blog->image))
					{
						unlink(FCPATH.'media/images/'.$blog->image);
					}

	            	$uploadData = $this->upload->data();
            		$filename = $uploadData['file_name'];
	            }
			}

			if( ! $isUploadError) {
	        	$blogData = array(
					'title' => $title,
					'userId' => 1,
					'description' => $description,
					'image' => $filename,
					'isFeatured' => $isFeatured,
					'isActive' => $isActive
				);

				$this->api_model->updateBlog($id, $blogData);

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

	public function deleteBlog($id)
	{
		header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
		header("Access-Control-Allow-Headers: authorization, Content-Type");

		$token = $this->input->get_request_header('Authorization');

		$isValidToken = $this->api_model->checkToken($token);

		if($isValidToken) {

			$blog = $this->api_model->get_admin_blog($id);

			if($blog->image && file_exists(FCPATH.'media/images/'.$blog->image))
			{
				unlink(FCPATH.'media/images/'.$blog->image);
			}

			$this->api_model->deleteBlog($id);

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



	// Manage Users

public function adminUsers()
{
	header("Access-Control-Allow-Origin: *");
	header("Access-Control-Allow-Headers: authorization, Content-Type");

	$token = $this->input->get_request_header('Authorization');

	$isValidToken = $this->api_model->checkToken($token);

	$posts = array();
	if($isValidToken) {
		$users = $this->api_model->get_admin_users();
		foreach($users as $user) {
			$posts[] = array(
				'id' => $user->id,
				'username' => $user->username,
				'password' => $user->password,
				'firstName' => $user->firstName,
				'lastName' => $user->lastName,
				'image' => base_url('media/images/user/'.$user->image),
				'createdAt' => $user->createdAt
			);
		}

		$this->output
			->set_status_header(200)
			->set_content_type('application/json')
			->set_output(json_encode($posts)); 
	}
}

public function adminUser($id)
{
	header("Access-Control-Allow-Origin: *");
	header("Access-Control-Allow-Headers: authorization, Content-Type");

	$token = $this->input->get_request_header('Authorization');

	$isValidToken = $this->api_model->checkToken($token);

	if($isValidToken) {

		$user = $this->api_model->get_admin_user($id);

		$post = array(
			'id' => $user->id,
			'username' => $user->username,
			'password' => $user->password,
			'firstName' => $user->firstName,
			'lastName' => $user->lastName,
			'image' => base_url('media/images/user/'.$user->image),
			'isFeatured' => $user->isFeatured,
			'isActive' => $user->isActive
		);
		

		$this->output
			->set_status_header(200)
			->set_content_type('application/json')
			->set_output(json_encode($post)); 
	}
}

public function createUser()
{
	header("Access-Control-Allow-Origin: *");
	header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
	header("Access-Control-Allow-Headers: authorization, Content-Type");

	$token = $this->input->get_request_header('Authorization');

	$isValidToken = $this->api_model->checkToken($token);

	if($isValidToken) {

		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$firstName = $this->input->post('firstName');
		$lastName = $this->input->post('lastName');
		$isFeatured = $this->input->post('isFeatured');
		$isActive = $this->input->post('isActive');

		$filename = NULL;

		$isUploadError = FALSE;

		if ($_FILES && $_FILES['image']['name']) {

			$config['upload_path']          = './media/images/user/';
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
			$userData = array(
				'username' => $username,
				'password' => $password,
				'firstName' => $firstName,
				'lastName' => $lastName,
				'image' => $filename,
				'isFeatured' => $isFeatured,
				'isActive' => $isActive,
				'createdAt' => date('Y-m-d H:i:s', time())
			);

			$id = $this->api_model->insertUser($userData);

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

public function updateUser($id)
{
	header("Access-Control-Allow-Origin: *");
	header("Access-Control-Allow-Headers: authorization, Content-Type");
	header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");

	$token = $this->input->get_request_header('Authorization');

	$isValidToken = $this->api_model->checkToken($token);

	if($isValidToken) {

		$user = $this->api_model->get_admin_user($id);
		$filename = $user->image;

		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$firstName = $this->input->post('firstName');
		$lastName = $this->input->post('lastName');
		$isFeatured = $this->input->post('isFeatured');
		$isActive = $this->input->post('isActive');

		$isUploadError = FALSE;

		if ($_FILES && $_FILES['image']['name']) {

			$config['upload_path']          = './media/images/user/';
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
   
				if($user->image && file_exists(FCPATH.'media/images/user/'.$user->image))
				{
					unlink(FCPATH.'media/images/user/'.$user->image);
				}

				$uploadData = $this->upload->data();
				$filename = $uploadData['file_name'];
			}
		}

		if( ! $isUploadError) {
			$userData = array(
				'username' => $username,
				'password' => $password,
				'firstName' => $firstName,
				'lastName' => $lastName,
				'button' => $button,
				'image' => $filename,
				'isFeatured' => $isFeatured,
				'isActive' => $isActive
			);

			$this->api_model->updateUser($id, $userData);

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

public function deleteUser($id)
{
	header('Access-Control-Allow-Origin: *');
	header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
	header("Access-Control-Allow-Headers: authorization, Content-Type");

	$token = $this->input->get_request_header('Authorization');

	$isValidToken = $this->api_model->checkToken($token);

	if($isValidToken) {

		$user = $this->api_model->get_admin_user($id);

		if($user->image && file_exists(FCPATH.'media/images/user/'.$user->image))
		{
			unlink(FCPATH.'media/images/user/'.$user->image);
		}

		$this->api_model->deleteUser($id);

		$response = array(
			'status' => 'success'
		);

		$this->output
			->set_status_header(200)
			->set_content_type('application/json')
			->set_output(json_encode($response)); 
	}
}


}
