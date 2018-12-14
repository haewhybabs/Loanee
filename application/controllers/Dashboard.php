<?php
class Dashboard extends CI_Controller {


public function __construct()
{
  parent::__construct();
  $this->load->helper(array('form', 'url'));
  $this->load->library('pagination');
  $this->load->library('session');
  $this->load->library('form_validation');
  $this->load->model('Moneysaving_model');
  $this->load->library('email');
  $this->load->helper('date');

 }
       public function index(){


         $status=$this->session->userdata('status');
         if(!isset($_SESSION['id'])){
              redirect('Index');
            }
          elseif(isset($_SESSION['id']) && $status=='admin' ){
            redirect('Admin_dashboard');
          }

          $data=$this->Moneysaving_model->get_user_data($_SESSION['id']);


          foreach ($data as $hey) {
          	 if ($hey->image=='noimage.png'){
          	 $data['get_users']=$this->Moneysaving_model->get_users($_SESSION['id']);
          	 	$this->load->view('profile1',$data);

          	 }
          	 else{
               // Investment Balance
              $data['get_amount']=$this->Moneysaving_model->sum_amount($_SESSION['id']);
              $data['getWithdraw']=$this->Moneysaving_model->get_withdraw($_SESSION['id']);
              $data['real_amount']=$data['get_amount']-$data['getWithdraw'];
             // Save Balance
            $data['get_Ramount']=$this->Moneysaving_model->sum_Ramount($_SESSION['id']);
            $data['getRwithdraw']=$this->Moneysaving_model->get_Rwithdraw($_SESSION['id']);
            $data['real_Ramount']=$data['get_Ramount']-$data['getRwithdraw'];
            //Loan Owe
            $data['loan_owe']=$this->Moneysaving_model->get_loan_confirmed($_SESSION['id']);
            $data['loan_pay']=$this->Moneysaving_model->get_loanPay($_SESSION['id']);
            $data['loan_current']=$data['loan_owe']-$data['loan_pay'];
          	 	$this->load->view('dashboard',$data);

          	 }
          }


       }


       public function getprofile(){


         $status=$this->session->userdata('status');
         if(!isset($_SESSION['id'])){
              redirect('Index');
            }
          elseif(isset($_SESSION['id']) && $status=='admin' ){
            redirect('Admin_dashboard');
          }

       	    $config= [
        'upload_path'=>'./uploads','allowed_types'=>'gif|jpg|png|jpeg',];

         $this->load->library('upload',$config);
         $this->load->library('form_validation');

       	$this->form_validation->set_rules('house_number', 'Your House Number ', 'required');
        $this->form_validation->set_rules('street_name', 'Your Street Name ', 'required');
        $this->form_validation->set_rules('city', 'City', 'required');
        $this->form_validation->set_rules('country', 'Selecting Country ', 'required');


       	  if ($this->form_validation->run()&& $this->upload->do_upload('userfile')) {
                  $info=$this->upload->data();
                  $image_path=base_url("uploads/".$info['file_name']);
                  $datap['image']=$image_path;
                  $data['house_number']=$this->input->post('house_number');
                  $data['street_name']=$this->input->post('street_name');
                  $data['city']=$this->input->post('city');
                  $data['country']=$this->input->post('country');
                  $data['user_id']=$this->session->userdata('id');
                  $profile=$this->Moneysaving_model->profile_upload($data);
                  $update_image=$this->Moneysaving_model->update_image($datap['image'],$_SESSION['id']);


                   $this->session->set_flashdata('alert alert-success alert-dismissible','Profile Updated Successfully');
                    redirect('Dashboard');



            }else{

            	redirect('Dashboard');
            }

       }

      public function profile_page(){


        $status=$this->session->userdata('status');
        if(!isset($_SESSION['id'])){
             redirect('Index');
           }
         elseif(isset($_SESSION['id']) && $status=='admin' ){
           redirect('Admin_dashboard');
         }

      	 $data['get_users']=$this->Moneysaving_model->get_users($_SESSION['id']);
      	 $data['get_profile_user']=$this->Moneysaving_model->get_profile_user($_SESSION['id']);
           if ($data['get_profile_user']===false){
           	$this->load->view('profile1',$data['get_users']);
           }
           else{
           	     $this->load->view('profile',$data);
           }

      	 //var_dump($data);
      }
      public function settings_view(){
        $this->load->view('settings');
      }

     public function Setting(){
     	 $this->form_validation->set_rules('username', 'Username','required');
     	 $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
     	 $this->form_validation->set_rules('new_pass', 'New Password', 'trim|required|min_length[8]');

           if ($this->form_validation->run()){
              $password=$this->input->post('password');
              $username=$this->input->post('username');
              $new_pass=$this->input->post('new_pass');
               $id=$this->session->userdata('id');
              $select_pass=$this->Moneysaving_model->select_password($password,$username);
              if($select_pass){

                  $updatepass=$this->Moneysaving_model->update_password($new_pass,$id);

                      $this->session->set_flashdata('alert alert-success alert-dismissible','Password Changed Successfully');
                      redirect('Dashboard');

              }
              else{
                  $this->session->set_flashdata('alert alert-success alert-dismissible','Incorrect Password or Username');
                  redirect('Dashboard/settings_view');
              }


           }
           else{

                 $this->load->view('settings');
           }

     }
 }
