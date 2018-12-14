<?php $this->load->view('layouts/includes/adminHeader');?>
<?php if($msg=$this->session->flashdata('alert alert-success alert-dismissible')):?>
                            <div class="alert alert-success alert-dismissible">
                              <?php echo $msg;?>
                            </div>
                    <?php endif;?>
 <div class="container-fluid">
   <div class="quick-actions_homepage">
     <ul class="quick-actions">
       <li class="bg_lb"> <a href="<?=base_url('Admin_dashboard/getLoanUser');?>"> <i class="icon-dashboard"></i> <span class="label label-important">20</span> Loan Transaction </a> </li>
       <li class="bg_lg span3"> <a href="<?=base_url('Admin_dashboard/savingsWithdrawal');?>"> <i class="icon-signal"></i>Savings and Wtihdrawal History</a> </li>
       <li class="bg_ly"> <a href="<?= base_url('Admin_dashboard/MonthlyPayment');?>"> <i class="icon-inbox"></i> Monthly Payment </a> </li>
       <li class="bg_ls"> <a href="<?=base_url('Admin_dashboard/add_users');?>"> <i class="icon-fullscreen"></i>Add Users</a> </li>
       <!-- <li class="bg_lo span3"> <a href="form-common.html"> <i class="icon-th-list"></i> Forms</a> </li>
       <li class="bg_ls"> <a href="buttons.html"> <i class="icon-tint"></i> Buttons</a> </li>
       <li class="bg_lb"> <a href="interface.html"> <i class="icon-pencil"></i>Elements</a> </li>
       <li class="bg_lg"> <a href="calendar.html"> <i class="icon-calendar"></i> Calendar</a> </li>
       <li class="bg_lr"> <a href="error404.html"> <i class="icon-info-sign"></i> Error</a> </li>
-->
     </ul>
   </div>


<?php $this->load->view('layouts/includes/footer');?>
