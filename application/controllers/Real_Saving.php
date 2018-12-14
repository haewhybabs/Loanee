<?php
class Real_Saving extends CI_Controller {
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
	     $this->load->view('admin/real_saving');

	 }

   public function Rsaving_money(){
	 	if(!isset($_SESSION['id'])){
     		redirect('index');
     	}

   	   $this->form_validation->set_rules('amount', 'Amount', 'required');
        $this->form_validation->set_rules('amount_type', 'Amount', 'required');


          if ($this->form_validation->run()){

          	    //$data=$this->Moneysaving_model->old_amount($_SESSION['id']);
          	    //$data=(int)$data;




               $data['amount_type']=$this->input->post('amount_type');
               $data['user_id']=$this->session->userdata('id');
              $data['status']=1;
              $data['amount'] =$this->input->post('amount');
							$data['user_delete']=0;
              $data['admin_delete']=0;
              $saving=$this->Moneysaving_model->Rsaving_money($data);


		           if($saving && $data['amount_type']=='1'){

		           		 redirect('https://paystack.com/pay/tm68bqs9au');



		           }
							 elseif($saving && $data['amount_type']=='2'){
								  $this->session->set_flashdata('alert alert-success alert-dismissible','We will get back to you soon');
									redirect('Dashboard');
							 }


          }else{

             $this->load->view('real_saving');

          }

	 }
}
