<?php $this->load->view('layouts/includes/header1');?>
  <div id="content-header">
    <div id="breadcrumb"> <a href="<?=base_url('index');?>" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></div>
  </div>
<!--End-breadcrumbs-->

<!--Action boxes-->
 <?php if($msg=$this->session->flashdata('alert alert-success alert-dismissible')):?>
                             <div class="alert alert-success alert-dismissible">
                               <?php echo $msg;?>
                             </div>
                     <?php endif;?>
 <div class="well">Your Investment Balance:N<?=$real_amount;?></div>
 <div class="well">Your Savings:N<?=$real_Ramount;?></div>
 <div class="well">Loan Owe:N<?=$loan_current;?></div>
  <div class="container-fluid">
    <div class="quick-actions_homepage">
      <ul class="quick-actions">
        <li class="bg_lb"> <a href="<?= base_url('Saving');?>"> <i class="icon-dashboard"></i> <span class="label label-important">20</span>Invest With Us </a> </li>
        <li class="bg_lg span3"> <a href="<?=base_url('Loan');?>"> <i class="icon-signal"></i> Apply For Loan</a> </li>
        <li class="bg_ly"> <a href="<?= base_url('Loan/status');?>"> <i class="icon-inbox"></i><span class="label label-success">101</span>Transactions History </a> </li>
        <li class="bg_lo"> <a href="tables.html"> <i class="icon-th"></i> Tables</a> </li>
        <li class="bg_ls"> <a href="<?=base_url('Saving/withdraw');?>"> <i class="icon-fullscreen"></i> Withdraw Money</a> </li>
        <!-- <li class="bg_lo span3"> <a href="form-common.html"> <i class="icon-th-list"></i> Forms</a> </li>
        <li class="bg_ls"> <a href="buttons.html"> <i class="icon-tint"></i> Buttons</a> </li>
        <li class="bg_lb"> <a href="interface.html"> <i class="icon-pencil"></i>Elements</a> </li>
        <li class="bg_lg"> <a href="calendar.html"> <i class="icon-calendar"></i> Calendar</a> </li>
        <li class="bg_lr"> <a href="error404.html"> <i class="icon-info-sign"></i> Error</a> </li>
 -->
      </ul>
    </div>


<?php $this->load->view('layouts/includes/footer');?>
