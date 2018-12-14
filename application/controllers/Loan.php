<?php
class Loan extends CI_Controller {
public function __construct()
{
	parent::__construct();
	$this->load->library('session');
	$this->load->helper(array('form', 'url'));
  $this->load->library('form_validation');
  $this->load->model('Moneysaving_model');
	$this->load->model('Admin_model');
  $this->load->library('email');
  $this->load->helper('date');
}


//load loan request page

   public function index(){

   		if(!isset($_SESSION['id'])){
     		redirect('index/login');
     	}

     	$data['date_now'] = date("Y-m-d");
     	 $data['loan_owe']=$this->Moneysaving_model->get_loan_confirmed($_SESSION['id']);
     	 $data['loan_pay']=$this->Moneysaving_model->get_loanPay($_SESSION['id']);
			 $data['loan_current']=$data['loan_owe']-$data['loan_pay'];

          $this->load->view('loanRequest', $data);

          // this format is string comparable

   }
   //make loan request

   public function loan_request(){
   	if(!isset($_SESSION['id'])){
     		redirect('index/login');
     	}

   	   $this->form_validation->set_rules('amount', 'Loan Amount', 'required');

          if ($this->form_validation->run()){


              $confamount=$this->input->post('amount');
							$loanType=$this->input->post('loan_type');
                if ($loanType==1){
                  $data['loan_type']=$loanType;
                   $data['amount']=$confamount;
                }
                else{
               $datap['monthlypercentage']=$this->Admin_model->getMonthPercentage();
								 foreach ($datap['monthlypercentage'] as $percentage){
									 $loanpercent=$percentage->loanpercentage/100;
									   $data['loan_type']=$loanType;
                  $data['amount']=$confamount+($confamount*$loanpercent);
							   	}
                }


              $data['user_id']=$this->session->userdata('id');
              $data['status']=1;
              $d=strtotime("now");
              $data['returning_date']= date("Y-m-d h:i:sa", $d);
             $data['is_delete']=0;


              $saving=$this->Moneysaving_model->loanrequest($data);
            //  if(date("Y-m-d")>$data['returning_date']){
              	 //$days_left['check_day_left']= date("Y-m-d") - $data['returning_date'];
             // }





               if ($saving && $data['loan_type']==1){
                 $this->session->set_flashdata('alert alert-success alert-dismissible','Continue');
               	redirect('Loan/loan_confirm');



                 }

                 else {
                   $this->session->set_flashdata('alert alert-success alert-dismissible','Note:For us to consider your request, You must have saved money with us before. Well,your r equest is currently under Processing');
                 	redirect('Dashboard');
                 }



          }


          else{

              echo 'fail';
          }
   }
      public function loan_confirm(){
      	$this->load->view('loan_confirm');

      }
      public function status(){
      	if(!isset($_SESSION['id'])){
     		redirect('index/login');
     	}
      	$data['check_status']=$this->Moneysaving_model->check_status($_SESSION['id']);
      	$data['check_save_status']=$this->Moneysaving_model->check_save_payment($_SESSION['id']);
				$data['monthlypercentage']=$this->Admin_model->getMonthPercentage();
				$data['check_Rsave_status']=$this->Moneysaving_model->check_Rsave_payment($_SESSION['id']);

      	$this->load->view('his', $data);


      }

     public function load_loan_payment(){
     	if(!isset($_SESSION['id'])){
     		redirect('index/login');
     	}
     	$this->load->view('make_loan_payment');
     }

     public function loan_payment(){
     	if(!isset($_SESSION['id'])){
     		redirect('index/login');
     	}
     	$this->form_validation->set_rules('amount','Loan Amount','required');

     	if($this->form_validation->run()){
     		$data['status']=$this->input->post('payment_type');
     		$data['amount']=$this->input->post('amount');
     		$data['user_id']=$this->session->userdata('id');
     		$input=$this->Moneysaving_model->input_loan_payment($data);

              if($input){

              	$this->session->set_flashdata('alert alert-danger fade in','Payment Successful');
                  redirect('Dashboard');
              }
     	}

     	else{
     		echo validation_errors();
     	}
     }

       public function clear_each2($id){
     	 $this->Moneysaving_model->cleareach2($id);
     	 redirect("Loan/status");
     }

      public function clear_each($id){
     	 $this->Moneysaving_model->cleareach($id);
     	 redirect("Loan/status");
     }
		 public function clear_Save($id){
			$this->Moneysaving_model->clearSave($id);
			redirect("Loan/status");
		}


}
