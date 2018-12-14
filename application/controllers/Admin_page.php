<?php
class Admin_page extends CI_Controller {
public function __construct()
{
	
	parent::__construct();
	$this->load->library('session');
	$this->load->helper(array('form', 'url'));
  $this->load->library('form_validation');
  $this->load->model('Admin_model');
  $this->load->library('email');
  $this->load->helper('date');
}
	public function index(){

	$this->load->view('confirm_page');

	}

	public function confirm_loan_payment(){

		$data['get_loan_users']=$this->Admin_model->get_loan_users();

		$this->load->view('all_loan_users',$data);
		//$this->Admin_model->confirm_loan();
	}

}
