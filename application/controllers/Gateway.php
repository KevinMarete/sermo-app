<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gateway extends CI_Controller {
	var $api_url = '';
	function __construct() {
		parent::__construct();
		$this->api_url = $this->config->item('api_url');
	}

	public function index()
	{		
		$this->load_page('apps');
	}

	public function load_page($page = '', $id = NULL)
	{	
		//Redirect unauthorized user
		if(!$this->session->userdata('user_token')){
			redirect('user/login');
		}

		$have_responses = array('apps', 'dashboard');
		if(in_array($page, $have_responses)){
			$icons = array('fa-comments', 'fa-list', 'fa-shopping-cart', 'fa-support');
			$colors = array('bg-primary', 'bg-warning', 'bg-success', 'bg-danger');
			$responses = $this->get_responses($page);
			$app_cards = '';
			if(!empty($responses) && $page == 'apps'){
				foreach ($responses as $key => $app) {
					$app_cards .= '<div class="col-xl-3 col-sm-6 mb-3">
							          	<div class="card text-white '.$colors[$key].' o-hidden h-100">
							            	<div class="card-body">
							              		<div class="card-body-icon">
							                		<i class="fa fa-fw '.$icons[$key].'"></i>
							              		</div>
							              		<div class="mr-5">'.$app['name'].'</div>
							            	</div>
							            	<a class="card-footer text-white clearfix small z-1" href="'.base_url().'dashboard/'.$app['id'].'">
							              		<span class="float-left">View Details</span>
							              		<span class="float-right">
							                		<i class="fa fa-angle-right"></i>
							              		</span>
							            	</a>
							          	</div>
							        </div>';
				}
				$data['app_cards'] = $app_cards;
			}else if(!empty($responses) && $page == 'dashboard'){
				$data['app_content'] = array();
			}
		}
		$data['content_view'] = 'pages/gateway/'.$page.'_view';
		$data['page_title'] = 'Sermo | '.ucwords($page);
		$this->load->view('template/template_view', $data);
	}

	public function get_responses($page = '')
	{	
		$urls = array(
			'apps' => 'getapps',
			'dashboard' => 'getapps'
		);
		$responses = array();
		$curl = new Curl();
		$curl->setHeader('Content-Type', 'Application/json');
		$curl->setHeader('Authorization', $this->session->userdata('user_token'));
		$curl->get($this->api_url.$urls[$page]);
		if (!$curl -> error) {
			$response = json_decode($curl -> response, TRUE);
			if($response['status'] == 'success'){
				$responses = $response['data'];
			}
		}
		return $responses;
	}

	public function create_app()
	{		
		$curl = new Curl();
		$curl->setHeader('Content-Type', 'Application/json');
		$curl->setHeader('Authorization', $this->session->userdata('user_token'));
		$curl->post($this->api_url.'appcreate', json_encode($this->input->post()));
		$redirect_url = 'apps';
		if ($curl -> error) {
			$message = '<div class="alert alert-danger alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<strong>Error!</strong> '.$curl -> error_message.'</div>';
		}else{
			$response = json_decode($curl -> response, TRUE);
			if($response['status'] == 'success'){
				$message = '<div class="alert alert-success alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<strong>Success!</strong> '.$response['description'].'</div>';
			}else{
				$message = '<div class="alert alert-danger alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<strong>Error!</strong> '.$response['description'].'</div>';
			}
		}
		$this->session->set_flashdata('apps_msg', $message);
		redirect($redirect_url);
	}
}
