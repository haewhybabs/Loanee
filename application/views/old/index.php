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

              

                   <li class=""><a href="<?=base_url('registration/logout')?>">Logout</a></li>  
 
                   <li class=""><a href="<?=base_url('Loan')?>">Request for loan</a></li>  
              
                 
                   <li class=""><a href="<?=base_url('Saving')?>">Save Money</a></li>  
              

              
            </ul>
          
       </div>
    </nav>
  </header>

   <div class="container">
       <div class="jumbotron" width 300x;>

      <?php if($total_amount>0):?>

       <h3> Amount saved: <?php echo $total_amount;?>

       <?php else:?>
         <h3> Amount Saved : 0.0
          <?php endif;?>

        <?php 
         $get_date=strtotime($get_date);
         $enddate = strtotime("+4 weeks", $get_date);
         $get_now= strtotime("now");
            if($get_now==$enddate && $total_amount>0):
             $this->load->model('Moneysaving_model');
            
                 $earning=$total_amount*0.5;
             ?>
             <p> earning: <?php echo $earning;?></p>

         <?php else:?>
           <p> earning:<?php echo $earning=0;?>
         
         <?php endif;?> 

       </div>

           
                
      
       <a href="loan/status">Check Loan status</a>
   </div>

       
                       



















              <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="<?php echo base_url('assests/jss/bootstrap.min.js'); ?>"></script>
    <script src="<?php echo base_url('assests/jss/bootstrap.js'); ?>"></script>
    
  </body>
            </html>