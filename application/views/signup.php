<!DOCTYPE html>
<html lang="en">
<head>
	<title>Signup for Refined Finance</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="<?=base_url('assets/images/icons/favicon.ico');?>"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=base_url('assets/vendor/bootstrap/css/bootstrap.min.css');?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=base_url('assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css');?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=base_url('assets/vendor/animate/animate.css');?>">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?=base_url('assets/vendor/css-hamburgers/hamburgers.min.css');?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=base_url('assets/vendor/select2/select2.min.css');?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/util.css');?>">
	<link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/main.css');?>">
	 <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
	 <link rel="stylesheet" href="<?php echo base_url('assets/css/mainstyle.css')?>"/>

    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css')?>"/>
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="<?=base_url('assets/images/img-01.png');?>" alt="IMG">
				</div>
       
				  

	             <?php echo form_open_multipart('registration/register', ['class'=>'login100-form validate-form']);?>
					<span class="login100-form-title">
						Register
					</span>
	   				 <?php if($msg=$this->session->flashdata('alert alert-success alert-dismissible')):?>
                             <div class="alert alert-success alert-dismissible">
                               <?php echo $msg;?>
                             </div>
                     <?php endif;?>
 


					<div class="wrap-input100 validate-input" data-validate = "please input your first name">
						<input class="input100" type="text" name="first_name" placeholder="Your First Name" value="<?= set_value('first_name');?>">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
						<?php echo form_error('first_name', '<div class="error">', '</div>'); ?>
					</div>


					<div class="wrap-input100 validate-input" data-validate = "please input your last name"  value="<?= set_value('last_name');?>">
						<input class="input100" type="text" name="last_name" placeholder="Your Last Name">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
							<?php echo form_error('last_name', '<div class="error">', '</div>'); ?>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "please input your username"  value="<?= set_value('username');?>">
						<input class="input100" type="text" name="username" placeholder="Create Your Username">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
						<?php echo form_error('username', '<div class="error">', '</div>'); ?>
					</div>



					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz"  value="<?= set_value('email');?>">
						<input class="input100" type="email" name="email" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
						<?php echo form_error('email', '<div class="error">', '</div>'); ?>
					</div>


					<div class="wrap-input100 validate-input" data-validate = "mobile">
						<input class="input100" type="phone" name="mobile" placeholder="Enter your phone number"  value="<?= set_value('mobile');?>">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
						<?php echo form_error('mobile', '<div class="error">', '</div>'); ?>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
						<?php echo form_error('password', '<div class="error">', '</div>'); ?>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="passconf" placeholder="Confirm Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
						<?php echo form_error('passconf', '<div class="error">', '</div>'); ?>
					</div>


					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Register
						</button>
					</div>

					<div class="text-center p-t-12">
						<span class="txt1">
							Already
						</span>
						<a class="txt2" href="<?=base_url('index/login');?>">
							have an Account?
						</a>

						
					</div>

					<div class="text-center p-t-136">
						<a class="txt2" href="<?=base_url('index/login');?>">
							Login here
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
			 <?php echo form_close(); ?>
			</div>
		</div>
	</div>
	
	

	
<!--===============================================================================================-->	
	<script src="<?=base_url('assets/vendor/jquery/jquery-3.2.1.min.js');?>"></script>
<!--===============================================================================================-->
	<script src="<?=base_url('assets/vendor/bootstrap/js/popper.js');?>"></script>
	<script src="<?=base_url('assets/vendor/bootstrap/js/bootstrap.min.js');?>"></script>
<!--===============================================================================================-->
	<script src="<?=base_url('assets/vendor/select2/select2.min.js');?>"></script>
<!--===============================================================================================-->
	<script src="<?=base_url('assets/vendor/tilt/tilt.jquery.min.js');?>"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="<?=base_url('assets/js/main.js');?>"></script>

</body>
</html>