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




               $data['amount_type']=1;
               $data['user_id']=$this->session->userdata('id');
              $data['status']=1;
              $data['amount'] =$this->input->post('amount');
							$data['is_delete']=0;

               $d=strtotime("now");
              $data['date']=date("Y-m-d h:i:sa", $d);
              $saving=$this->Moneysaving_model->saving_money($data);

           }
		           if($saving){

		           		 $this->load->view('saving_success',$data);



		           }


          else{

             echo validation_errors();

          }

	 }
   public function withdraw(){
    $this->load->view('withdraw');
   }
   public function withdraw_cash(){

    if(!isset($_SESSION['id'])){
        redirect('index');
      }

       $this->form_validation->set_rules('amount', 'Amount', 'required');


          if ($this->form_validation->run()){



               $data['amount_type']=2;
               $data['user_id']=$this->session->userdata('id');
              $data['status']=1;
              $data['amount'] =$this->input->post('amount');

               $d=strtotime("now");
              $data['date']=date("Y-m-d h:i:sa", $d);
              $withdraw=$this->Moneysaving_model->saving_money($data);

           }
               if($withdraw){

                   $this->session->set_flashdata('alert alert-success alert-dismissible',' Your Request is under Processing. We will get back to you soon');
                  redirect('Dashboard');



               }


         else{
            $this->load->view('withdraw');

        }
   }

	 public function saving_success(){

	 	$this->load->view('saving_success');



	 }

   public function save_card(){
		 if(!isset($_SESSION['id'])){
				 redirect('index');
			 }
    $data['fetch_bank']=$this->Moneysaving_model->fetch_bank($_SESSION['id']);
    if ($data['fetch_bank']===false){

      $this->load->view('cardSave1');
    }
    else{

      $this->load->view('cardSave',$data);
    }
   }
   public function bankDetails(){
		 $config= [
            'upload_path'=>'./uploads/documents','allowed_types'=>'gif|jpg|png|jpeg',];
						   $this->load->library('upload',$config);

        $this->form_validation->set_rules('bank_name', 'Bank Name', 'required');
        $this->form_validation->set_rules('account_name', 'Accoun Name', 'required');
				$this->form_validation->set_rules('account_number', 'Account Number', 'required');
        $this->form_validation->set_rules('bvn', 'BVN', 'required');
        $this->form_validation->set_rules('card_number', 'Card Number', 'required');

        $this->form_validation->set_rules('expiration_date', 'Expiration Date', 'required');
         $this->form_validation->set_rules('cvv', 'CVV', 'trim|required|max_length[3]');

         if ($this->form_validation->run() && $this->upload->do_upload('userfile')) {
					 $info=$this->upload->data();
					 $image_path=base_url("uploads/documents/".$info['file_name']);
					 $data=$this->input->post();
					 $data['document']=$image_path;

          $data['user_id']=$this->session->userdata('id');
          $storedata=$this->Moneysaving_model->savedata($data,$_SESSION['id']);
             if($storedata){
                 $this->session->set_flashdata('alert alert-success alert-dismissible',' Successfully Saved');
                  redirect('Dashboard');
             }
             else{
              $this->session->set_flashdata('alert alert-success alert-dismissible',' Successfully Saved');
                  redirect('Saving/bankDetails');
             }

         }
         else{
          $this->load->view('cardSave1');
         }


   }

}
