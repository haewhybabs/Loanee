<!DOCTYPE html>
<html lang="en">
<head>
<title>Refined Finance</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="<?=base_url('assets/css1/bootstrap.min.css');?>" />
<link rel="stylesheet" href="<?=base_url('assets/css1/bootstrap-responsive.min.css');?>" />
<link rel="stylesheet" href="<?=base_url('assets/css1/fullcalendar.css');?>" />
<link rel="stylesheet" href="<?=base_url('assets/css1/matrix-style.css');?>" />
<link rel="stylesheet" href="<?=base_url('assets/css1/matrix-media.css');?>" />
<link href="<?=base_url('assets/font-awesome/css1/font-awesome.css');?>" rel="stylesheet" />
<link rel="stylesheet" href="<?=base_url('assets/css/jquery.gritter.css');?>" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
  <link rel="icon" type="image/png" href="<?=base_url('assets/images/icons/favicon.ico');?>"/>
<!--===============================================================================================-->
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?=base_url('assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css');?>">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?=base_url('assets/vendor/animate/animate.css');?>">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?=base_url('assets/vendor/select2/select2.min.css');?>">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?=base_url('assets/vendor/perfect-scrollbar/perfect-scrollbar.css');?>">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/util.css');?>">
  <link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/mainh.css');?>">
</head>
<body>

<!--Header-part-->
<div id="header">
  <h1><a href="dashboard.html">Matrix Admin</a></h1>
</div>
<!--close-Header-part-->


<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
  <ul class="nav">
    <?php $user=$this->session->userdata('username');?>
    <li  class="dropdown" id="profile-messages" ><a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i>  <span class="text">Welcome <?= $user;?></span><b class="caret"></b></a>
      <ul class="dropdown-menu">
        <li><a href="#"><i class="icon-user"></i> My Profile</a></li>
        <li class="divider"></li>
        <li><a href="#"><i class="icon-check"></i> My Tasks</a></li>
        <li class="divider"></li>
        <li><a href="<?=base_url('registration/logout');?>"><i class="icon-key"></i> Log Out</a></li>
      </ul>
    </li>
    <li class="dropdown" id="menu-messages"><a href="#" data-toggle="dropdown" data-target="#menu-messages" class="dropdown-toggle"><i class="icon icon-envelope"></i> <span class="text">Messages</span> <span class="label label-important">5</span> <b class="caret"></b></a>
      <ul class="dropdown-menu">
        <li><a class="sAdd" title="" href="#"><i class="icon-plus"></i> new message</a></li>
        <li class="divider"></li>
        <li><a class="sInbox" title="" href="#"><i class="icon-envelope"></i> inbox</a></li>
        <li class="divider"></li>
        <li><a class="sOutbox" title="" href="#"><i class="icon-arrow-up"></i> outbox</a></li>
        <li class="divider"></li>
        <li><a class="sTrash" title="" href="#"><i class="icon-trash"></i> trash</a></li>
      </ul>
    </li>
    <li class=""><a title="" href="<?=base_url('Dashboard/settings_view');?>"><i class="icon icon-cog"></i> <span class="text">Settings</span></a></li>
    <li class=""><a title="" href="<?=base_url('registration/logout');?>"><i class="icon icon-share-alt"></i> <span class="text">Logout</span></a></li>
  </ul>
</div>
<!--close-top-Header-menu-->
<!--start-top-serch-->
<div id="search">
  <input type="text" placeholder="Search here..."/>
  <button type="submit" class="tip-bottom" title="Search"><i class="icon-search icon-white"></i></button>
</div>
<!--close-top-serch-->
<!--sidebar-menu-->
<div id="sidebar"><a href="<?=base_url('Dashboard');?>" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
  <ul>
    <li class="active"><a href="<?=base_url('Dashboard');?>"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="<?=base_url('Dashboard/profile_page');?>"><i class="icon icon-signal"></i> <span>Profile</span></a> </li>
    <li> <a href="<?=base_url('Saving/save_card');?>"><i class="icon icon-inbox"></i> <span>Save Bank Details</span></a> </li>
    <li><a href="<?=base_url('Loan');?>"><i class="icon icon-th"></i> <span>Loans</span></a></li>
    <li><a href="<?=base_url('Saving/withdraw');?>"><i class="icon icon-fullscreen"></i> <span>Withdraw Investment</span></a></li>
      <li><a href="<?=base_url('Real_Saving');?>"><i class="icon icon-fullscreen"></i> <span></span>Save Your Money</a></li>
    <li class="submenu"> <a href="<?= base_url('Loan/status');?>"><i class="icon icon-th-list"></i> <span>Transaction History</span> <span class="label label-important">3</span></a>
      <ul>
        <li><a href="form-common.html">Basic Form</a></li>
        <li><a href="form-validation.html">Form with Validation</a></li>
        <li><a href="form-wizard.html">Form with Wizard</a></li>
      </ul>
    </li>
    <li><a href="<?= base_url('Dashboard/settings_view');?>"><i class="icon icon-tint"></i> <span>Settings</span></a></li>
    <li><a href="<?=base_url('Registration/logout');?>"><i class="icon icon-pencil"></i> <span>Logout</span></a></li>
    <!-- <li class="submenu"> <a href="#"><i class="icon icon-file"></i> <span>Addons</span> <span class="label label-important">5</span></a>
      <ul>
        <li><a href="index2.html">Dashboard2</a></li>
        <li><a href="gallery.html">Gallery</a></li>
        <li><a href="calendar.html">Calendar</a></li>
        <li><a href="invoice.html">Invoice</a></li>
        <li><a href="chat.html">Chat option</a></li>
      </ul> -->
    <!-- </li>
    <li class="submenu"> <a href="#"><i class="icon icon-info-sign"></i> <span>Error</span> <span class="label label-important">4</span></a>
      <ul>
        <li><a href="error403.html">Error 403</a></li>
        <li><a href="error404.html">Error 404</a></li>
        <li><a href="error405.html">Error 405</a></li>
        <li><a href="error500.html">Error 500</a></li>
      </ul> -->
    </li>
   <!--  <li class="content"> <span>Monthly Bandwidth Transfer</span>
      <div class="progress progress-mini progress-danger active progress-striped">
        <div style="width: 77%;" class="bar"></div>
      </div>
      <span class="percent">77%</span>
      <div class="stat">21419.94 / 14000 MB</div>
    </li> -->
    <!-- <li class="content"> <span>Disk Space Usage</span>
      <div class="progress progress-mini active progress-striped">
        <div style="width: 87%;" class="bar"></div>
      </div>
      <span class="percent">87%</span>
      <div class="stat">604.44 / 4000 MB</div>
    </li> -->
  </ul>
</div>
<!--sidebar-menu-->

<!--main-container-part-->
<div id="content">
