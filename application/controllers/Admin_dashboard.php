<?php
class Admin_dashboard extends CI_Controller {


public function __construct()
{
  parent::__construct();
  $this->load->helper(array('form', 'url'));
  $this->load->library('pagination');
  $this->load->library('session');
  $this->load->library('form_validation');
  $this->load->model('Admin_model');
  $this->load->model('Moneysaving_model');
  $this->load->library('email');
  $this->load->helper('date');

 }
    public function index(){
      $status=$this->session->userdata('status');
      if(!isset($_SESSION['id'])){
           redirect('Index');
         }
       elseif(isset($_SESSION['id']) && $status=='member' ){
         redirect('Dashboard');
       }

        $this->load->view('admin/dashboard');
    }
    //get all the users
    public function getUsers(){

      $status=$this->session->userdata('status');
      if(!isset($_SESSION['id'])){
           redirect('Index');
         }
       elseif(isset($_SESSION['id']) && $status=='member' ){
         redirect('Dashboard');
       }


      $config=array();
      $config["base_url"]=base_url().'/moneysaving/Admin_dashboard/getUsers/';
      $total_row=$this->Admin_model->record_count();
      $config["total_rows"]=$total_row;
      $config["per_page"]=1;
      $config['use_page_numbers']=TRUE;
      $config['num_links']=$total_row;
      $config['cur_tag_open']='&nbsp;<a class="current">';
      $config['cur_tag_close']='</a>';
      $config['next_link']='Next';
      $config['prev_link']='Previous';
      $this->pagination->initialize($config);
        if($this->uri->segment(3)){
           $page=($this->uri->segment(3));
        }
        else{
          $page=1;
        }
        $data['get_users']=$this->Admin_model->get_userList($config["per_page"],$page);
        $data['count_users']=$total_row;
        $str_links=$this->pagination->create_links();
        $data["links"]=explode('&nbsp;',$str_links);

       $data['main_content']= 'products';
      $this->load->view('admin/MemberList',$data);





      // var_dump($data);

    }
    //get user details
    public function get_details($id){

      $status=$this->session->userdata('status');
      if(!isset($_SESSION['id'])){
           redirect('Index');
         }
       elseif(isset($_SESSION['id']) && $status=='member' ){
         redirect('Dashboard');
       }
      $data['get_users']=$this->Admin_model->get_userDetails($id);
      $data['fetch_bank']=$this->Moneysaving_model->fetch_bank($id);
      $this->load->view('admin/profileCard',$data);

    }
    //get all loan users
    public function getLoanUser(){
      $status=$this->session->userdata('status');
      if(!isset($_SESSION['id'])){
           redirect('Index');
         }
       elseif(isset($_SESSION['id']) && $status=='member' ){
         redirect('Dashboard');
       }
      $data['getLoanUser']=$this->Admin_model->get_loan_users();
      $data['monthlypercentage']=$this->Admin_model->getMonthPercentage();
    $this->load->view('admin/getLoanUser',$data);

  }
  //Approve Loan
    public function LoanApprove($userid,$id){
      $data['LoanApprove']=$this->Admin_model->Loan_approve($userid,$id);
      if($data['LoanApprove']){

           $this->session->set_flashdata('alert alert-success alert-dismissible','Approve Successfully');
           redirect('Admin_dashboard/getLoanUser');
      }
       else{
         $this->session->set_flashdata('alert alert-success alert-dismissible','Approve Successfully');
         redirect('Admin_dashboard/getLoanUser');
      }

    }

    //Unapprove loan
    public function LoanUnapprove($userid,$id){
      $data['LoanUnapprove']=$this->Admin_model->Loan_unapprove($userid,$id);
      if($data['LoanUnapprove']){

           $this->session->set_flashdata('alert alert-success alert-dismissible','Approve Successfully');
           redirect('Admin_dashboard/getLoanUser');
      }
       else{
         $this->session->set_flashdata('alert alert-success alert-dismissible','Approve Successfully');
         redirect('Admin_dashboard/getLoanUser');
      }

    }
    public function SaveApprove($userid,$id){
      $data['SaveApprove']=$this->Admin_model->Save_approve($userid,$id);
      if($data['SaveApprove']){

           $this->session->set_flashdata('alert alert-success alert-dismissible','Approve Successfully');
           redirect('Admin_dashboard/savingsWithdrawal');
      }
       else{
         $this->session->set_flashdata('alert alert-success alert-dismissible','Approve Successfully');
         redirect('Admin_dashboard/savingsWithdrawal');
      }

    }
    public function RSaveApprove($userid,$id){
      $data['RSaveApprove']=$this->Admin_model->RSave_approve($userid,$id);
      if($data['RSaveApprove']){

           $this->session->set_flashdata('alert alert-success alert-dismissible','Approve Successfully');
           redirect('Admin_dashboard/savingsWithdrawal');
      }
       else{
         $this->session->set_flashdata('alert alert-success alert-dismissible','Approve Successfully');
         redirect('Admin_dashboard/savingsWithdrawal');
      }

    }



    public function SaveUnapprove($userid,$id){
      $data['SaveUnapprove']=$this->Admin_model->Save_unapprove($userid,$id);
      if($data['SaveUnapprove']){

           $this->session->set_flashdata('alert alert-success alert-dismissible','Approve Successfully');
           redirect('Admin_dashboard/savingsWithdrawal');
      }
       else{
         $this->session->set_flashdata('alert alert-success alert-dismissible','Approve Successfully');
         redirect('Admin_dashboard/savingsWithdrawal');
      }

    }


    public function RSaveUnapprove($userid,$id){
      $data['RSaveUnapprove']=$this->Admin_model->RSave_unapprove($userid,$id);
      if($data['RSaveUnapprove']){

           $this->session->set_flashdata('alert alert-success alert-dismissible','Approve Successfully');
           redirect('Admin_dashboard/savingsWithdrawal');
      }
       else{
         $this->session->set_flashdata('alert alert-success alert-dismissible','Approve Successfully');
         redirect('Admin_dashboard/savingsWithdrawal');
      }

    }
    //Admin Delete LoanTransaction
    public function admin_clear($id){
      $delete=$this->Admin_model->adminClear($id);
      redirect('Admin_dashboard/getLoanUser');

    }
    public function admin_clearSave($id){
      $delete=$this->Admin_model->adminClearSave($id);
      redirect('Admin_dashboard/savingsWithdrawal');

    }
    public function admin_clearRSave($id){
      $delete=$this->Admin_model->adminClearRSave($id);
      redirect('Admin_dashboard/savingsWithdrawal');

    }
    //Get all Savings and Withdrawal Transaction
    public function savingsWithdrawal(){
      $status=$this->session->userdata('status');
      if(!isset($_SESSION['id'])){
           redirect('Index');
         }
       elseif(isset($_SESSION['id']) && $status=='member' ){
         redirect('Dashboard');
       }

        $data['monthlypercentage']=$this->Admin_model->getMonthPercentage();
        $data['savingsWithdraw']= $this->Admin_model->getSavingsWithdrawal();
          $data['RsavingsWithdraw']= $this->Admin_model->getRsavingsWithdrawal();
      $this->load->view('admin/savingsWithdrawal', $data);


    }
    public function MonthlyPayment(){
      $status=$this->session->userdata('status');
      if(!isset($_SESSION['id'])){
           redirect('Index');
         }
       elseif(isset($_SESSION['id']) && $status=='member' ){
         redirect('Dashboard');
       }

      $data['monthlypayment']=$this->Admin_model->getMonthPercentage();
       $this->load->view('admin/MonthlyPayment',$data);
    }
    public function MonthlyPaymentC(){
      $status=$this->session->userdata('status');
      if(!isset($_SESSION['id'])){
           redirect('Index');
         }
       elseif(isset($_SESSION['id']) && $status=='member' ){
         redirect('Dashboard');
       }

       $this->form_validation->set_rules('savepercentage', 'Payment Percentage', 'required');
       $this->form_validation->set_rules('loanpercentage', 'Loan Payment Percentage', 'required');
       if ($this->form_validation->run()){

         $data['savepercentage']=$this->input->post('savepercentage');
         $data['loanpercentage']=$this->input->post('loanpercentage');
         $d=strtotime("now");
         $data['date']= date("Y-m-d h:i:sa", $d);
         $store=$this->Admin_model->saveEarning($data);
         if($store){

           redirect('Admin_dashboard/PaymentPerMonth');
         }
         else{
          redirect('Admin_dashboard/PaymentPerMonth');
         }
       }
        else{
         $this->load->view('admin/MonthlyPayment');
       }

   }
   public function PaymentPerMonth(){

     $status=$this->session->userdata('status');
     if(!isset($_SESSION['id'])){
         redirect('Index');
       }
      elseif(isset($_SESSION['id']) && $status=='member' ){
        redirect('Dashboard');
      }
     //get all Users
     $data['get_users']=$this->Admin_model->get_allUsers();

     //get users that have paid
     $data['getAllUsers']=$this->Admin_model->getAllpayment();
     $data['monthlypercentage']=$this->Admin_model->getMonthPercentage();
     $this->load->view('admin/UserPayment', $data);

   }
   //confirm payment
   public function UsersPaid($id){

       $datap['getIsPaid']=$this->Admin_model->getIsPaid($id);
       if ($datap['getIsPaid']==false){
         $c=0;
       }
       else{
         $c=$datap['getIsPaid'];
       }
     $c=$c+1;
     $data['Payuser']=$this->Admin_model->Payuser($c,$id);
     if($data['Payuser']){

          $this->session->set_flashdata('alert alert-success alert-dismissible','Payment Confirmed');
              redirect('Admin_dashboard/PaymentPerMonth');
     }
      else{
        $this->session->set_flashdata('alert alert-success alert-dismissible','Approve Successfully');
               redirect('Admin_dashboard/PaymentPerMonth');
     }
   }
   public function Admin_login(){
     $status=$this->session->userdata('status');
     if(isset($_SESSION['id']) && $status=='member'){
         redirect('Dashboard');
       }
       elseif(isset($_SESSION['id']) && $status=='admin'){
           redirect('Admin_dashboard');
         }
      $this->load->view('admin/Admin_login');
   }
   public function login(){
     if(isset($_SESSION['id'])){
      		redirect('Admin_dashboard');
      	}
     $this->form_validation->set_rules('email','Email','required');
     $this->form_validation->set_rules('password','Password','required');
      if($this->form_validation->run()){


        $password=$this->input->post('password');
        $email=$this->input->post('email');
        $user=$this->Admin_model->login($password,$email);

           if ($user){

              $session_data=array(
                'id'=>$user->id,
                'first_name'=>$user->first_name,
                'last_name'=>$user->last_name,
              'username'=>$user->username,
                'email'=>$user->email,

                'password'=>$user->password,

                'mobile'=>$user->mobile,
                'status'=>$user->status,
              );
             $this->session->set_userdata($session_data);

            redirect('Admin_dashboard');
           }
           else{
               $this->session->set_flashdata('alert alert-success alert-dismissible','Incorrect Password oe Email');
              redirect('Admin_dashboard/Admin_login');
            }


      }
      else{
      $this->load->view('login');
      }


   }
   public function add_users(){
     $status=$this->session->userdata('status');
     if(!isset($_SESSION['id'])){
          redirect('Index');
        }
      elseif(isset($_SESSION['id']) && $status=='admin' ){
        redirect('Admin_dashboard');
      }
     $this->load->view('admin/add_users');
   }
   public function AddUsers(){

     $this->form_validation->set_rules('first_name', 'First Name', 'trim|required|min_length[3]|max_length[12]');
     $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required|min_length[3]');
     $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
     $this->form_validation->set_rules(
     'username', 'Username',
     'required|min_length[4]|max_length[12]|is_unique[admin.username]',
     array(
             'required'      => 'You have not provided %s.',
             'is_unique'     => 'This %s already exists.'
     )
   );
     $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
     $this->form_validation->set_rules('passwordconf', 'Password Confirmation', 'trim|required|matches[password]');
     $this->form_validation->set_rules('mobile', 'Your Mobile Number ', 'required');

       if ($this->form_validation->run()) {
          $data=$this->input->post();
          $addUsers=$this->Moneysaving_model->addAmin($data);

          if ($addUsers){


            $this->session->set_flashdata('alert alert-success alert-dismissible','Registration Successfully');
             redirect('Admin_dashboard');

          }
      }else{
        $this->load->view('add_users');
      }
   }
}
