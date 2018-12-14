<?php $this->load->view('layouts/includes/adminHeader');?>

<div class="limiter">
	<div class="container">
		<div class="wrap-table100">
			<div class="table100">
	  <?php if($savingsWithdraw==false):?>
					<div class="well">No Saving Transaction Yet from any user</div>
		<?php else:?>



      <table><br>
              <h3>Investment Transaction</h3><br>
              <thead>
                <tr class="table100-head">
                  <th class="column1">Date</th>
                  <th class="column1">Name</th>
                  <th class="column1">Username</th>
                  <th class="column2">Details</th>
                  <th class="column3">Amount</th>
									<th class="column3">Investment Balance</th>
                  <th class="column4">Monthly Earning</th>
                  <th class="column5">Approve</th>
                  <th class="column6">Unapprove</th>
                  <th class="column6">Delete</th>

                </tr>
              </thead>
          <tbody>
            <?php foreach ($savingsWithdraw as $users):?>

                <?php
                 $this->load->model('Admin_model');
                 $this->load->model('Moneysaving_model');
                 $all_users=$this->Admin_model->get_allUsers();
                 ?>
                 <?php foreach ($all_users as $saveUsers):?>
                     <?php if ($users->user_id==$saveUsers->id):?>

                    <?php

                      $data['get_amount']=$this->Moneysaving_model->sum_amount($saveUsers->id);
                      $data['getWithdraw']=$this->Moneysaving_model->get_withdraw($saveUsers->id);
                      $data['real_amount']=$data['get_amount']-$data['getWithdraw'];

                    ?>
                    <?php foreach ($monthlypercentage as$percentage):?>

                      <?php $savepercent=$percentage->savepercentage/100;?>
                        <?php if ($users->amount_type=='1' && $users->admin_delete=='0'):?>
                          <tr>
                             <td class="column1"><?=$users->date;?></td>
                             <td class="column1"><a href="<?= base_url('');?>Admin_dashboard/get_details/<?=$users->user_id;?>"><?=$saveUsers->first_name;?> <?=$saveUsers->last_name;?></a></td>
                             <td class="column1"><a href="<?= base_url('');?>Admin_dashboard/get_details/<?=$users->user_id;?>"> <?=$saveUsers->username;?></a></td>
                             <td class="column2">claim to have saved </td>
                             <td class="column3">N<?= $users->amount;?></td>
														  <td class="column3">N<?=$data['real_amount'];?></td>
                             <?php if($users->status=='2'):?>
                              <td class="column4">N<?=$data['real_amount']*$savepercent;?></td>
                             <td class="column5" style="color:green;">Transaction Approved</td>
                            <td class="column6"><a href="<?= base_url('');?>Admin_dashboard/SaveUnapprove/<?=$saveUsers->id;?>/<?=$users->id;?>">Unapprove</a></td>
                             <?php elseif($users->status=='1'):?>
                              <td class="column4">.....</td>
                             <td class="column5"><a href="<?= base_url('');?>Admin_dashboard/SaveApprove/<?=$saveUsers->id;?>/<?=$users->id;?>">Approve</a></td>
                               <td class="column6"><a href="<?= base_url('');?>Admin_dashboard/SaveUnapprove/<?=$saveUsers->id;?>/<?=$users->id;?>">Unapprove</a></td>
                            <?php elseif($users->status=='3'):?>
                              <td class="column4">.....</td>
                               <td class="column5"><a href="<?= base_url('');?>Admin_dashboard/SaveApprove/<?=$saveUsers->id;?>/<?=$users->id;?>">Approve</a></td>
                               <td class="column6"> Transction Unapproved</td>

                           <?php endif;?>
                             <td class="column6"><a href="<?=base_url('');?>Admin_dashboard/admin_clearSave/<?=$users->id;?>">Delete</a></td>

                           </tr>



												 <?php elseif ($users->amount_type=='2' && $users->admin_delete=='0'):?>
	                           <tr>
	                              <td class="column1"><?=$users->date;?></td>
	                              <td class="column1"><a href="<?= base_url('');?>Admin_dashboard/get_details/<?=$users->user_id;?>"><?=$saveUsers->first_name;?> <?=$saveUsers->last_name;?></a></td>
	                              <td class="column1"><a href="<?= base_url('');?>Admin_dashboard/get_details/<?=$users->user_id;?>"> <?=$saveUsers->username;?></a></td>
	                              <td class="column2">is requesting to withdraw </td>
	                              <td class="column3">N<?= $users->amount;?></td>
																 <td class="column3">N<?= $data['real_amount'];?></td>
	                              <?php if($users->status=='2'):?>
	                               <td class="column4">......</td>
	                              <td class="column5" style="color:green;">Transaction Approved</td>
	                             <td class="column6"><a href="<?= base_url('');?>Admin_dashboard/SaveUnapprove/<?=$saveUsers->id;?>/<?=$users->id;?>">Unapprove</a></td>
	                              <?php elseif($users->status=='1'):?>
	                               <td class="column4">.....</td>
	                              <td class="column5"><a href="<?= base_url('');?>Admin_dashboard/SaveApprove/<?=$saveUsers->id;?>/<?=$users->id;?>">Approve</a></td>
	                                <td class="column6"><a href="<?= base_url('');?>Admin_dashboard/SaveUnapprove/<?=$saveUsers->id;?>/<?=$users->id;?>">Unapprove</a></td>
	                             <?php elseif($users->status=='3'):?>
	                               <td class="column4">.....</td>
	                                <td class="column5"><a href="<?= base_url('');?>Admin_dashboard/SaveApprove/<?=$saveUsers->id;?>/<?=$users->id;?>">Approve</a></td>
	                                <td class="column6"> Transction Unapproved</td>

	                            <?php endif;?>
	                              <td class="column6"><a href="<?=base_url('');?>Admin_dashboard/admin_clearSave/<?=$users->id;?>">Delete</a></td>

	                            </tr>

                        <?php endif;?>
                     <?php endforeach;?>
                    <?php endif;?>

                 <?php endforeach;?>

            <?php endforeach;?>
    <?php endif;?>




		<?php if($RsavingsWithdraw==false):?>
					<div class="well">No Saving Transaction Yet from any user</div>
		<?php else:?>



      <table><br>
              <h3>Saving and Withdrawal Transaction</h3><br>
              <thead>
                <tr class="table100-head">
                  <th class="column1">Date</th>
                  <th class="column1">Name</th>
                  <th class="column1">Username</th>
                  <th class="column2">Details</th>
                  <th class="column3">Amount</th>
                  <th class="column4">Saving Balance</th>
                  <th class="column5">Approve</th>
                  <th class="column6">Unapprove</th>
                  <th class="column6">Delete</th>

                </tr>
              </thead>
          <tbody>
            <?php foreach ($RsavingsWithdraw as $users):?>

                <?php
                 $this->load->model('Admin_model');
                 $this->load->model('Moneysaving_model');
                 $all_users=$this->Admin_model->get_allUsers();
                 ?>
                 <?php foreach ($all_users as $saveUsers):?>
                     <?php if ($users->user_id==$saveUsers->id):?>

                    <?php

                      $data['get_Ramount']=$this->Moneysaving_model->sum_Ramount($saveUsers->id);
                      $data['getRwithdraw']=$this->Moneysaving_model->get_Rwithdraw($saveUsers->id);
                      $data['real_Ramount']=$data['get_Ramount']-$data['getRwithdraw'];

                    ?>
                    <?php foreach ($monthlypercentage as$percentage):?>

                      <?php $savepercent=$percentage->savepercentage/100;?>
                        <?php if ($users->amount_type=='1' && $users->admin_delete=='0'):?>
                          <tr>
                             <td class="column1"><?=$users->date;?></td>
                             <td class="column1"><a href="<?= base_url('');?>Admin_dashboard/get_details/<?=$users->user_id;?>"><?=$saveUsers->first_name;?> <?=$saveUsers->last_name;?></a></td>
                             <td class="column1"><a href="<?= base_url('');?>Admin_dashboard/get_details/<?=$users->user_id;?>"> <?=$saveUsers->username;?></a></td>
                             <td class="column2">claim to have saved </td>
                             <td class="column3"><?= $users->amount;?></td>
                             <?php if($users->status=='2'):?>
                              <td class="column4">N<?=$data['real_Ramount']?></td>
                             <td class="column5" style="color:green;">Transaction Approved</td>
                            <td class="column6"><a href="<?= base_url('');?>Admin_dashboard/RSaveUnapprove/<?=$saveUsers->id;?>/<?=$users->id;?>">Unapprove</a></td>
                             <?php elseif($users->status=='1'):?>
                              <td class="column4">N<?=$data['real_Ramount'];?></td>
                             <td class="column5"><a href="<?= base_url('');?>Admin_dashboard/RSaveApprove/<?=$saveUsers->id;?>/<?=$users->id;?>">Approve</a></td>
                               <td class="column6"><a href="<?= base_url('');?>Admin_dashboard/RSaveUnapprove/<?=$saveUsers->id;?>/<?=$users->id;?>">Unapprove</a></td>
                            <?php elseif($users->status=='3'):?>
                              <td class="column4">.....</td>
                               <td class="column5"><a href="<?= base_url('');?>Admin_dashboard/RSaveApprove/<?=$saveUsers->id;?>/<?=$users->id;?>">Approve</a></td>
                               <td class="column6"> Transction Unapproved</td>

                           <?php endif;?>
                             <td class="column6"><a href="<?=base_url('');?>Admin_dashboard/admin_clearRSave/<?=$users->id;?>">Delete</a></td>
                           </tr>



												 <?php elseif ($users->amount_type=='2' && $users->admin_delete=='0'):?>
	                           <tr>
	                              <td class="column1"><?=$users->date;?></td>
	                              <td class="column1"><a href="<?= base_url('');?>Admin_dashboard/get_details/<?=$users->user_id;?>"><?=$saveUsers->first_name;?> <?=$saveUsers->last_name;?></a></td>
	                              <td class="column1"><a href="<?= base_url('');?>Admin_dashboard/get_details/<?=$users->user_id;?>"> <?=$saveUsers->username;?></a></td>
	                              <td class="column2">is requesting to withdraw </td>
	                              <td class="column3">N<?= $users->amount;?></td>
	                              <?php if($users->status=='2'):?>
	                               <td class="column4">......</td>
	                              <td class="column5" style="color:green;">Transaction Approved</td>
	                              <td class="column6"><a href="<?= base_url('');?>Admin_dashboard/SaveUnapprove/<?=$saveUsers->id;?>/<?=$users->id;?>">Unapprove</a></td>
	                              <?php elseif($users->status=='1'):?>
	                               <td class="column4">.....</td>
	                               <td class="column5"><a href="<?= base_url('');?>Admin_dashboard/SaveApprove/<?=$saveUsers->id;?>/<?=$users->id;?>">Approve</a></td>
	                                <td class="column6"><a href="<?= base_url('');?>Admin_dashboard/SaveUnapprove/<?=$saveUsers->id;?>/<?=$users->id;?>">Unapprove</a></td>
	                             <?php elseif($users->status=='3'):?>
	                               <td class="column4">.....</td>
	                                <td class="column5"><a href="<?= base_url('');?>Admin_dashboard/SaveApprove/<?=$saveUsers->id;?>/<?=$users->id;?>">Approve</a></td>
	                                <td class="column6"> Transction Unapproved</td>

	                            <?php endif;?>
	                              <td class="column6"><a href="<?=base_url('');?>Admin_dashboard/admin_clearSave/<?=$users->id;?>">Delete</a></td>
	                            </tr>

                        <?php endif;?>
                     <?php endforeach;?>
                    <?php endif;?>

                 <?php endforeach;?>

            <?php endforeach;?>
    <?php endif;?>
