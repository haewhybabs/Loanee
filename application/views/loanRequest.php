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
	<link href="<?=base_url('assets/css/demo.css" rel="stylesheet');?>" />


	<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

<!-- Isolated Version of Bootstrap, not needed if your site already uses Bootstrap -->
<link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />

<!-- Bootstrap Date-Picker Plugin -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
</head>

<body>
	<div class="image-container set-full-height" style="background-image: url('<?=base_url();?>/assets/img/wizard-profile.jpg');?>">
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
			<div class="brand">RF</div>
			<div class="made-with"><strong>Refined Finance</strong></div>
		</a>

	    <!--   Big container   -->
	    <div class="container">
	        <div class="row">
		        <div class="col-sm-8 col-sm-offset-2">
		            <!--      Wizard container        -->
		            <div class="wizard-container">
		                <div class="card wizard-card">
		               <?php echo form_open_multipart('Loan/loan_request', ['role'=>'form']);?>
		                <!--        You can switch " data-color="purple" "  with one of the next bright colors: "green", "orange", "red", "blue"       -->

		                    	<div class="wizard-header">
														<div class="well" style="color:red;"> Loan Owe: <b> N<?= $loan_owe-$loan_pay;?></b></div>
		                        	<h3 class="wizard-title">
		                        	   Enter Loan Amount
		                        	</h3>


								             <h5>Enter any Amount, then Click on 'Request Loan' to apply for Loan </h5>
		                      	</div>
		                    	<span class="wizard-navigation">
								  <ul>
			            </ul>
								</span>
								<div class="form-group label-floating">
	                                        		<h4 class="btn-success text-center"><strong>REQUEST NEW LOAN</strong></h4>

	                                        	</div>



		                            <div class="tab-pane" id="address">
		                                <div class="row">
		                                    <div class="col-sm-12">
		                                        <h4 class="info-text"> Enter Amount in Naira </h4>
		                                    </div>


		                                    <div class="col-sm-7 col-sm-offset-1">
		                                    	<div class="form-group label-floating">
		                                            <label class="">Choose the Loan Type</label>
	                                            	<select name="loan_type" class="form-control">
														                   <option disabled="" selected=""></option>

	                                                	<option value="1"> Loan Payment </option>
	                                                	<option value="2">Request for  a Loan</option>


	                                            	</select>
		                                        </div>



	                                        	<div class="form-group label-floating">
	                                        		<label class="control-label">Enter Loan Amount in Naira </label>
	                                    			<input type="text" class="form-control" name="amount">
	                                        	</div>
	                                        	<div class="form-group label-floating">
	                                        		<div class="btn-success text-center">Today's date is <div><?=date("Y-M-D");?></div></div>

	                                        	</div>

	                                        	<div class="form-group"> <!-- Date input -->
        											<label class="control-label" for="date">Repayment Date</label>
        											<input class="form-control" id="date" name="date" placeholder="YY/MM/DD" type="text"/>
      											</div>

	                                        	<div class="pull-right">
	                                        	<div class="form-group label-floating">
	                                        		<input type="submit" class="btn btn-finish btn-fill btn-success btn-wd" name="finish" value="Request Loan">
	                                        		</div>



	                                        	</div>
	                                        	<div class="pull-left">

		                                <input type='link' class='btn btn-finish btn-fill btn-fill btn-wd' name='finish' value='Repay Loan' />
		                            </div>
		                                    </div>



		                                    <div class="wizard-footer">


		                        </div>

		                                    <!-- <div class="col-sm-3">
		                                        <div class="form-group label-floating">
		                                            <label class="control-label">Street Name</label>
		                                            <input type="text" class="form-control">
		                                        </div>
		                                    </div>
		                                    <div class="col-sm-5 col-sm-offset-1">
		                                        <div class="form-group label-floating">
		                                            <label class="control-label">City</label>
		                                            <input type="text" class="form-control">
		                                        </div>
		                                    </div> -->
		                                    <!-- <div class="col-sm-5">
		                                        <div class="form-group label-floating">
		                                            <label class="control-label">Country</label>
	                                            	<select name="country" class="form-control">
														<option disabled="" selected=""></option>

	                                                	<option value="Nigeria"> Nigeria </option>
	                                                	<option value="Ghana"> Ghana </option>
	                                                	<option value="Cameroun">Cameroun </option>
	                                                	<option value="Others"> Others </option>

	                                            	</select>
		                                        </div> -->
		                                    </div>
		                                </div>
		                            </div>
		                        </div>


		                  <?php echo form_close(); ?>
		                </div>
		            </div> <!-- wizard container -->
		        </div>
	        </div><!-- end row -->

	       <div class="tab-pane" id="finish">
		                                <!-- <div class="row">
		                                    <h4 class="info-text"> Drop us a small description. </h4>
		                                    <div class="col-sm-6 col-sm-offset-1">
		                                        <div class="form-group label-floating">
		                                            <label class="control-label">Place description</label>
		                                            <textarea class="form-control" placeholder="" rows="9"></textarea>
		                                        </div>
		                                    </div>
		                                    <!-- <div class="col-sm-4">
		                                    	<div class="form-group label-floating">
		                                            <label class="control-label">Example</label>
		                                            <p class="description">"The place is really nice. We use it every sunday when we go fishing. It is so awesome."</p>
		                                        </div>
		                                    </div> -->
		                                </div>
		                            </div>
		                        </div> -->
	    </div> <!--  big container -->

	    <div class="footer">
	        <div class="container text-center">
	             Made with <i class="fa fa-heart heart"></i> by <a href="#"></a>Refined Finance <a href="#"></a>
	        </div>
	    </div>
	</div>



</body>
	<!--   Core JS Files   -->
    <script src="<?=base_url('assets/js/jquery-2.2.4.min.js" type="text/javascript');?>"></script>
	<script src="<?=base_url('assets/js/bootstrap.min.js" type="text/javascript');?>"></script>
	<script src="<?=base_url('assets/js/jquery.bootstrap.js" type="text/javascript');?>"></script>

	<!--  Plugin for the Wizard -->
	<script src="<?=base_url('assets/js/material-bootstrap-wizard.js');?>"></script>

    <!--  More information about jquery.validate here: http://jqueryvalidation.org/	 -->
	<script src="<?=base_url('assets/js/jquery.validate.min.js');?>"></script>

</html>
