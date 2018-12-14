<?php $this->load->view('layouts/includes/adminHeader');?>






<div class="limiter">
	<div class="container">
		<div class="wrap-table100">
			<div class="table100">
            <?php if($getAllUsers==false):?>
                  <div class="well">No Payment Yet to any user</div>
            <?php else:?>


                     <table><br>
                             <h3>Monthly Payment</h3><br>
                             <thead>
                               <tr class="table100-head">
                                 <th class="column1">Date</th>
                                 <th class="column2">Name</th>
                                 <th class="column3">Username</th>
                                 <th class="column4">Details</th>
                                 <th class="column5">Amount</th>
                                 <th class="column5">Pay</th>
                                 <th class="column6">Delete</th>

                               </tr>
                             </thead>
                         <tbody>

												<?php	 $this->load->model('Admin_model');
		 		                  $this->load->model('Moneysaving_model');?>
                       <?php foreach ($get_users as $allUsers):?>
                         <?php foreach ($getAllUsers as $users):?>
                         <?php if ($users->user_id==$allUsers->id):?>
                            <?php foreach ($monthlypercentage as$percentage):?>
														<?php	$data['get_amount']=$this->Moneysaving_model->sum_amount($allUsers->id);
															$data['getWithdraw']=$this->Moneysaving_model->get_withdraw($allUsers->id);
															$data['real_amount']=$data['get_amount']-$data['getWithdraw'];?>
                              <?php $savepercent=$percentage->savepercentage/100;?>
															<?php if ($data['real_amount']*$savepercent > 0):?>

                               <tr>
                                 <td class="column1"><?=$users->date;?></td>
                                 <td class="column2"><a href="<?= base_url('');?>Admin_dashboard/get_details/<?=$users->user_id;?>"> <?=$allUsers->first_name;?> <?=$allUsers->last_name;?></a></td>
                                 <td class="column3"><a href="<?= base_url('');?>Admin_dashboard/get_details/<?=$users->user_id;?>"> <?=$allUsers->username;?></a></td>
                                 <td class="column4">is receiving </td>
                                 <td class="column5"><?=$data['real_amount'] * $savepercent;?></td>
                                  <?php if($users->is_paid=='0'):?>
                                 <td class="column5"><a href="<?= base_url('');?>Admin_dashboard/UsersPaid/<?=$users->id;?>"><i>Click me</i> if its Paid</a></td>
                                 <?php else:?>
                                   <td class="column5"><a href="<?= base_url('');?>Admin_dashboard/UsersPaid/<?=$users->id;?>">	paid for <?=$users->is_paid;?> time(s) </a></td>

                                 <?php endif;?>
                                 <td class="column6"><a href="<?=base_url('');?>Admin_dashboard/DeletePayment/<?=$users->id;?>">Delete</a></td>

                               </tr>
														<?php endif;?>
                            <?php endforeach;?>
                           <?php endif;?>
                          <?php endforeach;?>
                    <?php endforeach;?>
            <?php endif;?>
          </div>
        </div>
      </div>
    </div>




    <?php $this->load->view('layouts/includes/footer');?>
