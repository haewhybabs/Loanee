


<?php $this->load->view('layouts/includes/adminHeader');?>






<!--breadcrumbs-->
<div class="limiter">
	<div class="container">
		<div class="wrap-table100">
			<div class="table100">
	  <?php if($getLoanUser==false):?>
					<div class="well">No Loan Transaction Yet from any user</div>
		<?php else:?>



				<table><br>
								<h3>Loan History</h3><br>
								<thead>
									<tr class="table100-head">
										<th class="column1">Date</th>
										<th class="column1">Name</th>
										<th class="column1">Username</th>
										<th class="column2">Details</th>
										<th class="column3">Amount</th>
										<th class="column3">Loan Owe</th>
										<th class="column4">Criteria</th>
										<th class="column5">Approve</th>
										<th class="column6">Unapprove</th>
										<th class="column6">Delete</th>

									</tr>
								</thead>
     		  <tbody>
						<?php foreach ($getLoanUser as $users):?>

								<?php
								 $this->load->model('Admin_model');
								 $this->load->model('Moneysaving_model');
								 $all_users=$this->Admin_model->get_allUsers();
								 ?>
								 <?php foreach ($all_users as $loanUsers):?>
								 <?php if ($users->user_id==$loanUsers->id):?>
										 <?php

										 $data['get_amount']=$this->Moneysaving_model->sum_amount($loanUsers->id);
										 $data['getWithdraw']=$this->Moneysaving_model->get_withdraw($loanUsers->id);
										 $data['real_amount']=$data['get_amount']-$data['getWithdraw'];
										 $data['loan_owe']=$this->Moneysaving_model->get_loan_confirmed($loanUsers->id);
							       $data['loan_pay']=$this->Moneysaving_model->get_loanPay($loanUsers->id);
							       $data['loan_current']=$data['loan_owe']-$data['loan_pay'];
										 ?>
										 <?php foreach ($monthlypercentage as$percentage):?>

											 <?php $savepercent=$percentage->savepercentage/100;?>


													<?php if ($data['real_amount']<20000 &&  $users->loan_type=='2'  && $users->admin_delete=='0' ): ?>
                            <a href="<?= base_url('');?>Admin_dashboard/get_details/<?=$users->user_id;?>">
															<tr>
																<td class="column1"><?=$users->returning_date;?></td>
																<td class="column1"><a href="<?= base_url('');?>Admin_dashboard/get_details/<?=$users->user_id;?>"> <?=$loanUsers->first_name;?> <?=$loanUsers->last_name;?></a></td>
																<td class="column1"><a href="<?= base_url('');?>Admin_dashboard/get_details/<?=$users->user_id;?>"> <?=$loanUsers->username;?></a></td>
																<td class="column2">is requesting for a loan of </td>
																<td class="column3">N<?=$users->amount;?></td>
																	<td class="column3">N<?=$data['loan_current'];?></td>
																<td class="column4" style="color:red;"><b>Saved Amount < N20000</b></td>
																<?php if($users->status=='2'):?>
  															<td class="column5" style="color:green;">Transaction Approved</td>
  																<td class="column6">......</td>
  															<?php elseif($users->status=='1'):?>
  															<td class="column5"><a href="<?= base_url('');?>Admin_dashboard/LoanApprove/<?=$loanUsers->id;?>/<?=$users->id;?>">Approve</a></td>
  																<td class="column5"><a href="<?= base_url('');?>Admin_dashboard/LoanUnapprove/<?=$loanUsers->id;?>/<?=$users->id;?>">Unapprove</a></td>
                               <?php elseif($users->status=='3'):?>
 																<td class="column5" style="color:green;">.......</td>
 																	<td class="column6"> Transction Unapproved</td>
 															<?php endif;?>
																<td class="column6"><a href="<?=base_url('');?>Admin_dashboard/admin_clear/<?=$users->id;?>">Delete</a></td>

															</tr>
                            </a>

													<?php elseif ($users->loan_type=='1' && $users->admin_delete=='0'):?>

														<a href="<?= base_url('');?>Admin_dashboard/get_details/<?=$users->user_id;?>">
															<tr>
																<td class="column1"><?=$users->returning_date;?></td>
																<td class="column1"><a href="<?= base_url('');?>Admin_dashboard/get_details/<?=$users->user_id;?>"><?=$loanUsers->first_name;?> <?=$loanUsers->last_name;?></a></td>
																<td class="column1"><a href="<?= base_url('');?>Admin_dashboard/get_details/<?=$users->user_id;?>"> <?=$loanUsers->username;?></a></td>
																<td class="column2">claim to have paid </td>
																<td class="column3">N<?= $users->amount;?></td>
																	<td class="column3">N<?=$data['loan_current'];?></td>
																<td class="column4">........</td>
																<?php if($users->status=='2'):?>
  															<td class="column5" style="color:green;">Transaction Approved</td>
  																<td class="column6">......</td>
  															<?php elseif($users->status=='1'):?>
  															<td class="column5"><a href="<?= base_url('');?>Admin_dashboard/LoanApprove/<?=$loanUsers->id;?>/<?=$users->id;?>">Approve</a></td>
  																<td class="column5"><a href="<?= base_url('');?>Admin_dashboard/LoanUnapprove/<?=$loanUsers->id;?>/<?=$users->id;?>">Unapprove</a></td>
                               <?php elseif($users->status=='3'):?>
 																<td class="column5" style="color:green;">.......</td>
 																	<td class="column6"> Transction Unapproved</td>
 															<?php endif;?>
																<td class="column6"><a href="<?=base_url('');?>Admin_dashboard/admin_clear/<?=$users->id;?>">Delete</a></td>
															</tr>
                            </a>

													<?php elseif($data['real_amount']>20000 && $users->loan_type=='2' && $users->admin_delete=='0' ):?>

														<a href="<?= base_url('');?>Admin_dashboard/get_details/<?=$users->user_id;?>">
														 <tr>
															 <td class="column1"><?=$users->returning_date;?></td>
															 <td class="column1"><a href="<?= base_url('');?>Admin_dashboard/get_details/<?=$users->user_id;?>"><?=$loanUsers->first_name;?> <?=$loanUsers->last_name;?></a></td>
															 <td class="column1"><a href="<?= base_url('');?>Admin_dashboard/get_details/<?=$users->user_id;?>"> <?=$loanUsers->username;?></a></td>
															 <td class="column2">is requesting for a loan of </td>
															 <td class="column3">N<?=$users->amount;?></td>
															 	<td class="column3">N<?=$data['loan_current'];?></td>
															 <td class="column4">Saved Amount > N20000</td>
															 <?php if($users->status=='2'):?>
															 <td class="column5" style="color:green;">Transaction Approved</td>
																 <td class="column6">......</td>
															 <?php elseif($users->status=='1'):?>
															 <td class="column5"><a href="<?= base_url('');?>Admin_dashboard/LoanApprove/<?=$loanUsers->id;?>/<?=$users->id;?>">Approve</a></td>
																 <td class="column5"><a href="<?= base_url('');?>Admin_dashboard/LoanUnapprove/<?=$loanUsers->id;?>/<?=$users->id;?>">Unapprove</a></td>
															<?php elseif($users->status=='3'):?>
															 <td class="column5" style="color:green;">.......</td>
																 <td class="column6"> Transction Unapproved</td>
														 <?php endif;?>
																<td class="column6"><a href="<?=base_url('');?>Admin_dashboard/admin_clear/<?=$users->id;?>">Delete</a></td>
														 </tr>
														</a>
													<?php endif;?>

                 <?php endforeach;?>
							 <?php endif;?>

				  		   <?php endforeach;?>
				    <?php endforeach;?>
			     </tbody>
			   </table>


 		<?php endif;?>
    </div>
  </div>
</div>







<?php $this->load->view('layouts/includes/footer');?>
