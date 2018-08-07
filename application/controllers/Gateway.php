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

	public function load_page($page = '', $app_code = NULL)
	{	
		//Redirect unauthorized user
		if(!$this->session->userdata('user_token')){
			redirect('user/login');
		}
		$wallet_balance = 0;
		$app_cards = '';
		$have_responses = array('apps', 'dashboard');
		if(in_array($page, $have_responses)){

			$icons = array('fa-comments', 'fa-list', 'fa-shopping-cart', 'fa-support');
			$colors = array('bg-primary', 'bg-warning', 'bg-success', 'bg-danger');
			$responses = $this->get_responses($page);
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
							            	<a class="card-footer text-white clearfix small z-1" href="'.base_url().'dashboard/'.$app['code'].'">
							              		<span class="float-left">View Details</span>
							              		<span class="float-right">
							                		<i class="fa fa-angle-right"></i>
							              		</span>
							            	</a>
							          	</div>
							        </div>';
				}
				
			}else if(!empty($responses) && $page == 'dashboard'){
				$data['app_content'] = array();
				$wallet_balance = $this->get_responses('wallet', $app_code)['balance'];
			}
		}else{
			$wallet_balance = $this->get_responses('wallet', $this->uri->segment(2))['balance'];
		}
		$data['wallet_balance'] = $wallet_balance;
		$data['app_cards'] = $app_cards;
		$data['content_view'] = 'pages/gateway/'.$page.'_view';
		$data['page_title'] = 'Sermo | '.ucwords($page);
		$this->load->view('template/template_view', $data);
	}

	public function get_responses($page = '', $app_code = NULL)
	{	
		$urls = array(
			'apps' => 'apps',
			'dashboard' => 'apps',
			'wallet' => 'wallet?app='.$app_code
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
		$curl->post($this->api_url.'app', json_encode($this->input->post()));
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

	public function get_transactions($service, $app_code){
		$service_url = strtolower($service)."_group?app=".$app_code;
		$responses = array('data' => array(), 'destroy' => true, 'pagingType' => 'full_numbers');
		$curl = new Curl();
		$curl->setHeader('Content-Type', 'Application/json');
		$curl->setHeader('Authorization', $this->session->userdata('user_token'));
		$curl->get($this->api_url.$service_url);
		if (!$curl -> error) {
			$response = json_decode($curl -> response, TRUE);
			if($response['status'] == 'success'){
				if(!empty($response['data'])){
					foreach ($response['data'] as $key => $values) {
						$tmp_arr = array_values($values);
						if($service == 'Meeting'){
							array_push($tmp_arr, "<button class='btn btn-xs btn-info' data-toggle='modal' data-target='#participantModal' data-code='".$tmp_arr[0]."'> <i class='fa fa-eye'></i> View Participants</button>");
						}
						$responses['data'][] = $tmp_arr;
						if($key == 0){
							foreach (array_keys($values) as $column) {
								$responses['columns'][]['title'] = $column;
							}
							$responses['columns'][]['title'] = 'options'; //Additional Options
						}
					}
				}else{
					$responses['data'] = array();
					//Default columns per service
					$columns = array(
						'meeting' => array('title', 'description', 'organizer', 'venue', 'start_date', 'end_date', 'participants', 'facilitators', 'options'),
						'message' => array('name', 'description'),
						'payment' => array('name', 'description')
					);
					foreach ($columns[strtolower($service)] as $column) {
						$responses['columns'][]['title'] = $column;
					}
				}
			}
		}
		echo json_encode($responses);
	}

	public function create_transaction($service, $app_code){
		$service_url = strtolower($service)."_group";
		//Add appID
		$post_data = $this->input->post();
		$post_data['app'] = $app_code;
		//Make App Request 
		$curl = new Curl();
		$curl->setHeader('Content-Type', 'Application/json');
		$curl->setHeader('Authorization', $this->session->userdata('user_token'));
		$curl->post($this->api_url.$service_url, json_encode($post_data));
		$redirect_url = strtolower($service)."/".$app_code;
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
		$this->session->set_flashdata('trans_msg', $message);
		redirect($redirect_url);
	}

	public function get_participants($code){
		$participant_url = "participant?code=".$code;
		$responses = array('data' => array(), 'destroy' => true, 'pagingType' => 'full_numbers');
		$curl = new Curl();
		$curl->setHeader('Content-Type', 'Application/json');
		$curl->setHeader('Authorization', $this->session->userdata('user_token'));
		$curl->get($this->api_url.$participant_url);
		if (!$curl -> error) {
			$response = json_decode($curl -> response, TRUE);
			if($response['status'] == 'success'){
				foreach ($response['data']  as $key => $value) {
					$responses['data'][$key] = array($value['id'], $value['name'], $value['phone']);
				}
			}
		}
		echo json_encode($responses);
	}

	public function manage_participant(){
		$input = $this->input->post();
		//Make App Request 
		$participant_url = $this->api_url."participant";
		$curl = new Curl();
		$curl->setHeader('Content-Type', 'Application/json');
		$curl->setHeader('Authorization', $this->session->userdata('user_token'));
		//Evaluate type of action
		if ($input['action'] == 'edit') {
			unset($input['action']);
			$curl->patch($participant_url, json_encode($input));
			$input['action'] = 'edit';
		} else if ($input['action'] == 'delete') {
			unset($input['action']);
			$curl->delete($participant_url, $input);
			$input['action'] = 'delete';
		} 
		echo json_encode($input);
	}

	public function add_participant(){
		$post_data = $this->input->post();
		//Make App Request 
		$participant_url = $this->api_url."participant";
		$curl = new Curl();
		$curl->setHeader('Content-Type', 'Application/json');
		$curl->setHeader('Authorization', $this->session->userdata('user_token'));
		$curl->post($participant_url, json_encode($post_data));

		if ($curl -> error) {
			$message = array('error' => $curl -> error_message);
		}else{
			$message = json_decode($curl -> response, TRUE);
		}
		echo json_encode($message);
	}

	public function manage_transaction($service){
		$input = $this->input->post();
		//Make App Request 
		$transaction_url = $this->api_url.strtolower($service)."_group";
		$curl = new Curl();
		$curl->setHeader('Content-Type', 'Application/json');
		$curl->setHeader('Authorization', $this->session->userdata('user_token'));
		//Evaluate type of action
		if ($input['action'] == 'edit') {
			unset($input['action']);
			$curl->patch($transaction_url, json_encode($input));
			$input['action'] = 'edit';
			if ($curl -> error) {
				echo $curl -> error_message;
			}
		} else if ($input['action'] == 'delete') {
			unset($input['action']);
			$curl->delete($transaction_url, $input);
			$input['action'] = 'delete';
		} 
		echo json_encode($input);
	}

}
