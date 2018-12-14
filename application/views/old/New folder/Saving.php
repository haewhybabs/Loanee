<?php
class Saving extends CI_Controller {
public function __construct()
{
	parent::__construct();
	$this->load->library('session');
	$this->load->helper(array('form', 'url'));
  $this->load->library('form_validation');
  $this->load->model('Moneysaving_model');
  $this->load->library('email');
  $this->load->helper('date');
}

	 public function index(){

	   		if(!isset($_SESSION['id'])){
	     		redirect('index');
	     	}
	     $this->load->view('save');

	 }

	 public function saving_money(){
	 	if(!isset($_SESSION['id'])){
     		redirect('index');
     	}

   	   $this->form_validation->set_rules('amount', 'Amount', 'required');
     
          
          if ($this->form_validation->run()){

          	    //$data=$this->Moneysaving_model->old_amount($_SESSION['id']);
          	    //$data=(int)$data;

             
         
                    
              $data['amount']=$amount1;
              $amount+= $amount;
               $data['user_id']=$this->session->userdata('id');
              $data['status']=1;
              $data['amount'] =$this->input->post('amount');
             
               $d=strtotime("now");
              $data['date']=date("Y-m-d h:i:sa", $d);      
              $saving=$this->Moneysaving_model->saving_money($data);
	
           }
		           if($saving){

		           		redirect('Saving/saving_success');


		           }
           

          else{

             echo validation_errors();

          }

	 }

	 public function saving_success(){

	 	$this->load->view('saving_success');

	 	 
         
	 }

}

