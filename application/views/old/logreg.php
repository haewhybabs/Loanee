 <!doctype html>
<html class="no-js" lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Money</title>
   <link rel="stylesheet" href="<?= base_url('assets/csss/bootstrap.min.css') ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url('assets/csss/bootstrap.min.css')?>"/>
    <link rel="stylesheet" href="<?php echo base_url('assets/csss/mainstyle.css')?>"/>
    <script src="<?= base_url('assets/js/jquery.js')?>"></script>
    
   
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

             <div class="navbar-collapse collapse">
    
              
                  <li><a href="<?=base_url ('registration')?>">Create an Account</a></li>

                  
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
             </div> 

          
       </div>
    </nav>
  </header>