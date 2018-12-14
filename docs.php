<!doctype html>
<html class="no-js" lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MoneySaving</title>
    <link rel="stylesheet" href="<?= base_url('assets/csss/bootstrap.min.css') ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url('assets/csss/bootstrap.min.css')?>"/>
    <link rel="stylesheet" href="<?php echo base_url('assets/csss/mainstyle.css')?>"/>
    <script src="<?= base_url('assests/js/jquery.js')?>"></script>
    
   
  </head>
  <header>
    <nav class="navbar navbar-inverse navbar-fixed-top">
       <div class="container">

           <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
           <span class="sr-only">Toggle navigation</span>
           <span class="icon-bar"></span>
           <span class="icon-bar"></span>
           <span class="icon-bar"></span>
           
           </button>
             
                <ul class="nav navbar-nav navbar-right">

              
                      <?php   if(isset($_SESSION['id']) && $total_amount>$loan_owe ):?>
                      <?php

                         $this->load->model('Moneysaving_model');
                         $clear_loan=$this->Moneysaving_model->clear_loan($_SESSION['id']);


                      ?>

                   <li class=""><a href="<?=base_url('registration/logout')?>">Logout</a></li>  

                   <li class=""><a href="<?=base_url('Loan')?>">Request for loan</a></li>  
                    <li class=""><a href="<?=base_url('Saving')?>">Save Money</a></li>  

                 <?php elseif (isset($_SESSION['id'])&& $total_amount<$loan_owe): ?>
                   <li class=""><a href="<?=base_url('Saving')?>">Save Money</a></li>  
                     <li class=""><a href="<?=base_url('registration/logout')?>">Logout</a></li>  

                <?php else:?>
                  <li><a href="<?=base_url ('registration')?>">Create an Account</a></li>
             
                  
                </ul>


                  
                </ul>
                   <?php echo form_open_multipart('registration/login', ['class'=>'navbar-form navbar-right']);?>
                    <div class="form-group">
                      <input type="email" name="email" class="form-control" placeholder="Enter YOur email">
                    </div>

                     <div class="form-group">
                      <input type="password" name="password" class="form-control" placeholder="Enter password">
                    </div>
                    <button name="submit" type="submit" class="btn btn-default">Login</button>

                  <?php echo form_close(); ?>
                   <?php endif;?>
             </div> 

          
       </div>
    </nav>
  </header>

   <div class="container">
       <div class="jumbotron" width 300x;>
         <h3> Your Amount Saved :<?php echo $total_amount-$loan_owe;?></h3>
       </div>
   </div>

       
                       



















              <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="<?php echo base_url('assests/jss/bootstrap.min.js'); ?>"></script>
    <script src="<?php echo base_url('assests/jss/bootstrap.js'); ?>"></script>
    
  </body>
            </html>