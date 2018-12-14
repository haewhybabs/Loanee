<?php
class Registration extends CI_Controller {
public function __construct()
{
	parent::__construct();
	$this->load->library('session');
	$this->load->helper(array('form', 'url'));
  $this->load->library('form_validation');
  $this->load->model('Moneysaving_model');
  $this->load->library('email');
}


	public function index()
	{
		if(isset($_SESSION['id'])){
     		redirect('index');
     	}
    
       $this->load->view('registration');



	}
     public function register()
     {

     	if(isset($_SESSION['id'])){
     		redirect('index');
     	}

         $config= [
        'upload_path'=>'./uploads','allowed_types'=>'gif|jpg|png|jpeg',];

         $this->load->library('upload',$config);
        $this->load->library('form_validation');


        $this->form_validation->set_rules('first_name', 'First Name', 'trim|required|min_length[3]|max_length[12]');
        $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]|max_length[12]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
        $this->form_validation->set_rules('passconf', 'Password Confirmation', 'trim|required|matches[password]');
        $this->form_validation->set_rules('mobile', 'Your Mobile Number ', 'required');
       
          if ($this->form_validation->run()&& $this->upload->do_upload('userfile')) {

               
              
        
                  $data=$this->input->post();
                  $info=$this->upload->data();
                  $image_path=base_url("uploads/reg_image/".$info['file_name']);
                  $data['image']=$image_path;
                
                 $registration=$this->Moneysaving_model->register($data);

              
              
                 $this->email->from('babalolaisaac@gmail.com', 'Ayobami Bablola');
                 
                 $this->email->to($data['email']);
                 $this->email->subject('oba');
                 $this->email->message('oba');

                 if ($registration && $this->email->send()){
                  
                    
                   $this->session->set_flashdata('alert alert-success alert-dismissible','Registration Successfully');
                    redirect('index');

                 }
                 else{
                     $this->email->print_debugger();

                    $this->session->set_flashdata('alert alert-success alert-dismissible','Failed to Register');
                    redirect('index');

                 }

            
          }


            else{
              echo validation_errors();
                $this->load->view('registration');
              
            }


     }

     public function login(){

     	//if(isset($_SESSION['id'])){
     		//redirect('index');
     	//}
      $this->load->library('form_validation');

         $this->form_validation->set_rules('email','Email','required');
         $this->form_validation->set_rules('password','Password','required');
          if($this->form_validation->run()){

          	
          	$password=$this->input->post('password');
          	$email=$this->input->post('email');
          	$user=$this->Moneysaving_model->login($password,$email);

               if ($user){
               	  $session_data=array(
		             		'id'=>$user->id,
                    'first_name'=>$user->first_name,
                    'last_name'=>$user->last_name,
		             	'username'=>$user->username,
		                'email'=>$user->email,
		                 
		                'password'=>$user->password,

		                'mobile'=>$user->mobile,
		                'image'=>$user->image,

		             	);
		             $this->session->set_userdata($session_data);

               	redirect('index');
               }
               else{
               	  $this->session->set_flashdata('alert alert-danger fade in','Incorrect Password or Email');
                  echo "error";
               }

          }
          else{
          	echo validation_errors();
          }

     }
     public function logout(){

        $this->session->sess_destroy();
        return redirect('index');
      }



}

?>