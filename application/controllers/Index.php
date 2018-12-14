<?php
class Index extends CI_Controller {


public function __construct()
{
  parent::__construct();
  $this->load->helper(array('form', 'url'));
  $this->load->library('pagination');
  $this->load->library('session');
  $this->load->library('form_validation');
  $this->load->model('Moneysaving_model');

  $this->load->helper('date');

 }
       public function index(){


        $this->load->view('homepage');

        }

        public function login(){
          $status=$this->session->userdata('status');
           if(isset($_SESSION['id']) && $status=='member' ){
            redirect('Dashboard');
         }elseif(isset($_SESSION['id']) && $status=='admin'){

           redirect('Admin_dashboard');
         }
          $this->load->view('login');
        }

        public function register(){
          if(isset($_SESSION['id'])){
           redirect('Dashboard');
         }
          $this->load->view('signup');
        }
      public function Forgot_pass(){
        $this->load->view('ForgotPass');
      }
      public function ForgotPass(){
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        if($this->form_validation->run()){
          $email=$this->input->post('email');
          $checkEmail=$this->Moneysaving_model->confirm_email($email);
          $name=$checkEmail->first_name;
          $password=$checkEmail->email;
          $this->load->library('email');
          $config['protocol']    = 'smtp';

          $config['smtp_host']    = 'ssl://smtp.gmail.com';

          $config['smtp_port']    = '2525';

          $config['smtp_timeout'] = '7';

          $config['smtp_user']    = 'babalolaisaac@gmail.com';

          $config['smtp_pass']    = 'babalola774';

          $config['charset']    = 'utf-8';

          $config['newline']    = "\r\n";

          $config['mailtype'] = 'text'; // or html

          $config['validation'] = TRUE;

         $this->email->initialize($config);



          $this->email->from('babalolaisaac@gmail.com', 'Ayobami Bablola');
          $this->email->to($email);
          $this->email->subject('Password Recovery');
          $this->email->message('Hi '.$name.' Your Password is '.$password.' You can now login. Thank you');
          $this->email->send();
          if ($this->email->send()){
            echo 'success';
          }
          else{
            ob_start();
             $this->email->print_debugger();
             $error = ob_end_clean();
             $errors[] = $error;
          }
          /*if($checkEmail && $this->email->send()){
            $this->session->set_flashdata('alert alert-success alert-dismissible','Your Password has been sent to your Email');
           redirect('registration/login');
          }
          else{
            $this->session->set_flashdata('alert alert-success alert-dismissible','Incorrect Email');
             redirect('registration/login');
          }
         */

        }
        else{
          $this->load->view('ForgotPass');
        }
      }
}
