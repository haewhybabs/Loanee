<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<link rel="apple-touch-icon" sizes="76x76" href="<?=base_url('assets/img/favicon.ico');?>">

	<title>Refined Finance</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

	<link rel="apple-touch-icon" sizes="76x76" href="<?=base_url('assets/img/apple-icon.png');?>" />
	<link rel="icon" type="image/png" href="<?=base_url('assets/img/favicon.png');?>" />

	<!--     Fonts and icons     -->
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

	<!-- CSS Files -->
	<link href="<?=base_url('assets/css/bootstrap.min.css');?>" rel="stylesheet" />
	<link href="<?=base_url('assets/css/material-bootstrap-wizard.css');?>" rel="stylesheet" />

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link href="<?=base_url('assets/css/demo.css');?>" rel="stylesheet" />
</head>

<body>
	<div class="image-container set-full-height" style="background-image: url('<?=base_url('assets/img/wizard-profile.jpg');?>">
	    <!--   Creative Tim Branding   -->
	    <a href="/">
	         <div class="logo-container">
	            <div class="logo">
	                <img src="<?=base_url('assets/img/refined1.png');?>">
	            </div>
	            <div class="brand">

	                Refined Finance
	            </div>
	        </div>
	    </a>

		<!--  Made With Material Kit  -->
		<a href="#" class="made-with-mk">
			<div class="brand">MK</div>
			<div class="made-with">Made with <strong>Material Kit</strong></div>
		</a>

	    <!--   Big container   -->
	    <div class="container">
	        <div class="row">
		        <div class="col-sm-8 col-sm-offset-2">
		            <!--      Wizard container        -->
		            <div class="wizard-container">
		                <div class="card wizard-card" data-color="green" id="wizardProfile">
		                    <?php echo form_open_multipart('Dashboard/getprofile', ['role'=>'form']);?>
		                <!--        You can switch " data-color="purple" "  with one of the next bright colors: "green", "orange", "red", "blue"       -->

		                    	<div class="wizard-header">
		                        	<h3 class="wizard-title">
		                        	   Build Your Profile
		                        	</h3>
									<h5>This information will let us know more about you.</h5>
		                    	</div>
								<div class="wizard-navigation">
									<ul>
			                            <li><a href="#about" data-toggle="tab">About</a></li>
			                            <li><a href="#account" data-toggle="tab">Account</a></li>
			                            <li><a href="#address" data-toggle="tab">Address</a></li>
			                            <li><a href="#finish" data-toggle="tab">Finish</a></li>
			                        </ul>
								</div>

							
		                        <div class="tab-content">
		                            <div class="tab-pane" id="about">
		                              <div class="row">
		                                	<h4 class="info-text"> Let's start with the basic information </h4>
		                                	<div class="col-sm-4 col-sm-offset-1">
		                                    	<div class="picture-container">
		                                    			<?php foreach ($get_users as $dat):?>

								                      

							

		                                        	<div class="picture">
                                        				<img  src=<?= $dat->image;?> class="picture-src" id="wizardPicturePreview" title=""/>
		                                            	<?php echo form_upload(['name'=>'userfile','value'=>'Save']);?>
		                                        	</div>
		                                        	<h6>Choose Picture</h6>
		                                    	</div>
		                                	</div>
		                                	<div class="col-sm-6">
												<div class="input-group">
													<span class="input-group-addon">
														<i class="material-icons">face</i>
													</span>
													<div class="form-group label-floating">
			                                          <label class="control-label"> First Name </small></label>
			                                          <input name="firstname" type="text" class="form-control" value="<?php echo $dat->first_name;?>">
			                                        </div>
												</div>

												<div class="input-group">
													<span class="input-group-addon">
														<i class="material-icons">record_voice_over</i>
													</span>
													<div class="form-group label-floating">
													  <label class="control-label">Last Name</label>
													  <input name="lastname" type="text" class="form-control" value="<?php echo $dat->last_name;?>">
													</div>
												</div>
		                                	</div>
		                                	<div class="col-sm-10 col-sm-offset-1">
												<div class="input-group">
													<span class="input-group-addon">
														<i class="material-icons">email</i>
													</span>
													<div class="form-group label-floating">
			                                            <label class="control-label"> Email</small></label>
			                                            <input name="email" type="email" class="form-control" value="<?php echo $dat->email;?>">
			                                        </div>
												</div>
		                                	</div>
		                            	</div>
		                            </div>
		                            <?php endforeach;?>
		                            <div class="tab-pane" id="account">
		                                <h4 class="info-text"> Are You A / An? (checkboxes) </h4>
		                                <div class="row">
		                                    <div class="col-sm-10 col-sm-offset-1">
		                                        <div class="col-sm-4">
		                                            <div class="choice" data-toggle="wizard-checkbox">
		                                                <input type="radio" name="jobb" value="Design">
		                                                <div class="icon">
		                                                    <i class="fa fa-pencil"></i>
		                                                </div>
		                                                <h6>Individual</h6>
		                                            </div>
		                                        </div>
		                                        <div class="col-sm-4">
		                                            <div class="choice" data-toggle="wizard-checkbox">
		                                                <input type="radio" name="jobb" value="Code">
		                                                <div class="icon">
		                                                    <i class="fa fa-terminal"></i>
		                                                </div>
		                                                <h6>Small Scale Company</h6>
		                                            </div>
		                                        </div>
		                                        <div class="col-sm-4">
		                                            <div class="choice" data-toggle="wizard-checkbox">
		                                                <input type="radio" name="jobb" value="Develop">
		                                                <div class="icon">
		                                                    <i class="fa fa-laptop"></i>
		                                                </div>
		                                                <h6>Medium Scale</h6>
		                                            </div>
		                                        </div>
		                                    </div>
		                                </div>
		                            </div>
		                           
		                            
		                            <div class="tab-pane" id="address">
		                                <div class="row">
		                                    <div class="col-sm-12">
		                                        <h4 class="info-text"> Let us know Your Location </h4>
		                                    </div>
		                                    <div class="col-sm-7 col-sm-offset-1">
	                                        	<div class="form-group label-floating">
	                                        		<label class="control-label">House Number </label>
	                                    			<input type="text" class="form-control" name="house_number">
	                                        	</div>
		                                    </div>
		                                    <div class="col-sm-3">
		                                        <div class="form-group label-floating">
		                                            <label class="control-label">Street Name</label>
		                                            <input type="text" class="form-control" name="street_name">
		                                        </div>
		                                    </div>
		                                    <div class="col-sm-5 col-sm-offset-1">
		                                        <div class="form-group label-floating">
		                                            <label class="control-label">City</label>
		                                            <input type="text" class="form-control" name="city">
		                                        </div>
		                                    </div>
		                                    <div class="col-sm-5">
		                                        <div class="form-group label-floating">
		                                            <label class="control-label">Country</label>
	                                            	<select name="country" class="form-control">
														<option disabled="" selected=""></option>
	                                                	
	                                                	<option value="Nigeria"> Nigeria </option>
	                                                	<option value="Ghana"> Ghana </option>
	                                                	<option value="Cameroun">Cameroun </option>
	                                                	<option value="Others"> Others </option>
	                                                	
	                                            	</select>
		                                        </div>
		                                    </div>
		                                </div>
		                            </div>
		                         
		                        </div>


		                        <div class="wizard-footer">
		                            <div class="pull-right">
		                                <input type='button' class='btn btn-next btn-fill btn-success btn-wd' name='next' value='Next' />
		                                <input type='submit' class='btn btn-finish btn-fill btn-success btn-wd' name='submit' value='Finish' />
		                            </div>

		                            <div class="pull-left">
		                                <input type='button' class='btn btn-previous btn-fill btn-default btn-wd' name='previous' value='Previous' />
		                            </div>
		                            <div class="clearfix"></div>
		                        </div>
		                    </form>
		                </div>
		            </div> <!-- wizard container -->
		        </div>
	        </div><!-- end row -->

	         <div class="tab-pane" id="finish">
		                                <div class="row">
		                                    <h4 class="info-text"> Drop us a small description. </h4>
		                                    <div class="col-sm-6 col-sm-offset-1">
		                                        <div class="form-group label-floating">
		                                            <label class="control-label">Place description</label>
		                                            <textarea class="form-control" placeholder="" rows="9"></textarea>
		                                        </div>
		                                    </div>
		                                    <div class="col-sm-4">
		                                    	<div class="form-group label-floating">
		                                            <label class="control-label">Example</label>
		                                            <p class="description">"The place is really nice. We use it every sunday when we go fishing. It is so awesome."</p>
		                                        </div>
		                                    </div>
		                                </div>
		                            </div>
		                        </div>
	    </div> <!--  big container -->

	    <div class="footer">
	        <div class="container text-center">
	             Made with <i class="fa fa-heart heart"></i> by <a href="#"></a>Refined Finance <a href="#"></a>
	        </div>
	    </div>
	</div>

</body>
	<!--   Core JS Files   -->
    <script src="<?=base_url('assets/js/jquery-2.2.4.min.js');?>" type="text/javascript"></script>
	<script src="<?=base_url('assets/js/bootstrap.min.js');?>" type="text/javascript"></script>
	<script src="<?=base_url('assets/js/jquery.bootstrap.js');?>" type="text/javascript"></script>

	<!--  Plugin for the Wizard -->
	<script src="<?=base_url('assets/js/material-bootstrap-wizard.js');?>"></script>

    <!--  More information about jquery.validate here: http://jqueryvalidation.org/	 -->
	<script src="<?=base_url('assets/js/jquery.validate.min.js');?>"></script>

</html>
