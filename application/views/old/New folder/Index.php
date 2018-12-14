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
  $this->load->library('email');
  $this->load->helper('date');

 }
       public function index(){

         if(!isset($_SESSION['id'])  ){
        redirect('index/login');
      }

        $data['total_amount']=$this->Moneysaving_model->sum_amount($_SESSION['id']);
         $data['get_date']=$this->Moneysaving_model->get_date($_SESSION['id']);
        

      

        $this->load->view('index',$data);
      
        }

        public function login(){
          $this->load->view('login');
        }

        public function register(){
          $this->load->view('register');
        }

}