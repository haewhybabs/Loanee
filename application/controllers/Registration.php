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
		$status=$this->session->userdata('status');
		if(isset($_SESSION['id']) && $status=='member'){
     		redirect('Dashboard');
     	}
			elseif(isset($_SESSION['id']) && $status=='admin'){
					redirect('Admin_dashboard');
				}


       $this->load->view('registration');



	}
     public function register()
     {

     	if(isset($_SESSION['id'])){
     		redirect('index');
     	}

        $this->form_validation->set_rules('first_name', 'Firstd Name', 'trim|required|min_length[3]|max_length[12]');
        $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
      $this->form_validation->set_rules(
        'username', 'Username',
        'required|min_length[4]|max_length[12]|is_unique[users.username]',
        array(
                'required'      => 'You have not provided %s.',
                'is_unique'     => 'This %s already exists.'
        )
      );
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
        $this->form_validation->set_rules('passconf', 'Password Confirmation', 'trim|required|matches[password]');
        $this->form_validation->set_rules('mobile', 'Your Mobile Number ', 'required');

          if ($this->form_validation->run()) {




                  $data=$this->input->post();
									$data['status']='member';
                  $data['image']='noimage.png';
                 $registration=$this->Moneysaving_model->register($data);
                 $this->email->from('babalolaisaac@gmail.com', 'Ayobami Bablola');

                 $this->email->to($data['email']);
                 $this->email->subject('');
                 $this->email->message('');

                 if ($registration || $this->email->send()){


                   $this->session->set_flashdata('alert alert-success alert-dismissible','Registration Successfully');
                    redirect('registration/register');

                 }
                 else{
                     $this->email->print_debugger();

                    $this->session->set_flashdata('alert alert-success alert-dismissible','Failed to Register');
                    redirect('registration/register');

                 }


          }


            else{


                     $this->load->view('signup');


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
								 if($user->status=='member'){
               	  $session_data=array(
		             		'id'=>$user->id,
                    'first_name'=>$user->first_name,
                    'last_name'=>$user->last_name,
		             	'username'=>$user->username,
		                'email'=>$user->email,

		                'password'=>$user->password,

		                'mobile'=>$user->mobile,
		                'image'=>$user->image,
                    'status'=>$user->status,
		             	);
		             $this->session->set_userdata($session_data);

               	redirect('Dashboard');
							}
               }
               else{
               	   $this->session->set_flashdata('alert alert-success alert-dismissible','Incorrect Password or Email');
                  redirect('registration/login');
               }

          }
          else{
          $this->load->view('login');
          }

     }
     public function logout(){

        $this->session->sess_destroy();
        return redirect('index');
      }



}

?>
