<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	var $api_url = '';
	function __construct() {
		parent::__construct();
		$this->api_url = $this->config->item('api_url');
	}

	public function index()
	{		
		$this->load_page('login');
	}

	public function load_page($page = '')
	{	
		$page_name = 'pages/user/'.$page.'_view';
		$data['page_title'] = 'Sermo | '.ucwords($page);
		$this->load->view($page_name, $data);
	}

	public function authenticate()
	{		
		$curl = new Curl();
		$curl->setHeader('Content-Type', 'Application/json');
		$curl -> post($this->api_url.'login', json_encode($this->input->post()));
		$redirect_url = 'user/login';
		if ($curl -> error) {
			$message = '<div class="alert alert-danger alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<strong>Error!</strong> '.$curl -> error_message.'</div>';
		}else{
			$response = json_decode($curl -> response, TRUE);
			if($response['status'] == 'success'){
				$redirect_url = 'apps';
				$this->session->set_userdata('user_token', $response['data']['token']);
				$message = '<div class="alert alert-success alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<strong>Success!</strong> '.$response['description'].'</div>';
			}else{
				$message = '<div class="alert alert-danger alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<strong>Error!</strong> '.$response['description'].'</div>';
			}
		}
		$this->session->set_flashdata('user_msg', $message);
		redirect($redirect_url);
	}

	public function registration()
	{		
		$curl = new Curl();
		$curl->setHeader('Content-Type', 'Application/json');
		$curl -> post($this->api_url.'register', json_encode($this->input->post()));
		$redirect_url = 'user/register';
		if ($curl -> error) {
			$message = '<div class="alert alert-danger alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<strong>Error!</strong> '.$curl -> error_message.'</div>';
		}else{
			$response = json_decode($curl -> response, TRUE);
			if($response['status'] == 'success'){
				$redirect_url = 'user/login';
				$message = '<div class="alert alert-success alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<strong>Success!</strong> '.$response['description'].'</div>';
			}else{
				$message = '<div class="alert alert-danger alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<strong>Error!</strong> '.$response['description'].'</div>';
			}
		}
		$this->session->set_flashdata('user_msg', $message);
		redirect($redirect_url);
	}

	public function forgot_pass()
	{		
		$curl = new Curl();
		$curl->setHeader('Content-Type', 'Application/json');
		$curl -> post($this->api_url.'reset_pass', json_encode($this->input->post()));
		$redirect_url = 'user/forgot-pass';
		if ($curl -> error) {
			$message = '<div class="alert alert-danger alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<strong>Error!</strong> '.$curl -> error_message.'</div>';
		}else{
			$response = json_decode($curl -> response, TRUE);
			if($response['status'] == 'success'){
				$redirect_url = 'user/login';
				$message = '<div class="alert alert-success alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<strong>Success!</strong> '.$response['description'].'</div>';
			}else{
				$message = '<div class="alert alert-danger alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<strong>Error!</strong> '.$response['description'].'</div>';
			}
		}
		$this->session->set_flashdata('user_msg', $message);
		redirect($redirect_url);
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('user/login');
	}
}
