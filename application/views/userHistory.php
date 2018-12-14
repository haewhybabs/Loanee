<!DOCTYPE html>
<html lang="en">
<head>
	<title>Table V01</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="<?=base_url('assets/images/icons/favicon.ico');?>"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=base_url('assets/vendor/bootstrap/css/bootstrap.min.css');?>">
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
<!--===============================================================================================-->
</head>
<body>

	<div class="limiter">
		<div class="container-table100">
			<div class="wrap-table100">
				<div class="table100">
					<table>
						<h3>Loan History</h3>
						<thead>
							<tr class="table100-head">
								<th class="column1">Date</th>
								<th class="column2">Details</th>
								<th class="column3">Amount</th>
								<th class="column4">Interest</th>
								<th class="column5">Status</th>
								<th class="column6">Delete</th>

							</tr>
						</thead>
						<tbody>
						<?php foreach ($check_status as $status):?>
							<?php if ($status->loan_type=='1' && $status->status=='1'):?>
								<tr>
									<td class="column1"> <?= $status->returning_date;?></td>
									<td class="column2">You paid(Loan) a total of </td>
									<td class="column3">N<?= $status->amount; ?></td>
									<td class="column4">5%</td>
									<td class="column5">Pending</td>
								  <td class="column6"><a href="#">Delete</a></td>

								</tr>
						  <?php elseif($status->loan_type=='1' && $status->status=='2'):?>
								<tr>
									<td class="column1"> <?= $status->returning_date;?></td>
									<td class="column2">You paid(Loan) a total of </td>
									<td class="column3">N<?= $status->amount; ?></td>
									<td class="column4">5%</td>
									<td class="column5">Successful</td>
									<td class="column6"><a href="#">Delete</a></td>

								</tr>
							<?php elseif($status->loan_type=='2' && $status->status=='1'):?>

							<tr>
								<td class="column1"> <?= $status->returning_date;?></td>
								<td class="column2">You requested for a loan of</td>
								<td class="column3">N<?= $status->amount; ?></td>
								<td class="column4">5%</td>
								<td class="column5">Pending</td>
								<td class="column6"><a href="#">Delete</a></td>

							</tr>
						<?php elseif($status->loan_type='2' && $status->status=='2'):?>

							<tr>
								<td class="column1"> <?= $status->returning_date;?></td>
								<td class="column2">You requested for a loan of</td>
								<td class="column3">N<?= $status->amount; ?></td>
								<td class="column4">5%</td>
								<td class="column5">Successful</td>
								<td class="column6"><a href="#">Delete</a></td>

							</tr>
            <?php endif;?>
					  <?php endforeach;?>

						</tbody>
					</table>
                      <br>
                      <br>

					<table>
							<h3>Savings History</h3>
						<thead>
							<tr class="table100-head">
								<th class="column1">Date</th>
								<th class="column2">ID</th>
								<th class="column3">Details</th>
								<th class="column4">Amount</th>
								<th class="column5">Interest</th>
								<th class="column6">Total</th>
								<th class="column6">Status</th>
								<th class="column6">Status</th>

							</tr>
						</thead>
						<tbody>
								<tr>
									<td class="column1">2017-09-29 01:22</td>
									<td class="column2">1</td>
									<td class="column3">You requested for a loan of </td>
									<td class="column4">N50000</td>
									<td class="column5">5%</td>
									<td class="column6">N52500</td>
									<td class="column6">Pending</td>
								</tr>
								<tr>
									<td class="column1">2017-09-29 01:22</td>
									<td class="column2">1</td>
									<td class="column3">You requested for a loan of </td>
									<td class="column4">N50000</td>
									<td class="column5">5%</td>
									<td class="column6">N52500</td>
									<td class="column6">Approved</td>
								</tr>
								<tr>
									<td class="column1">2017-09-29 01:22</td>
									<td class="column2">1</td>
									<td class="column3">You saved a total of </td>
									<td class="column4">N50000</td>
									<td class="column5">5%</td>
									<td class="column6">N52500</td>
									<td class="column6">Processing</td>
								</tr>
								<tr>
									<td class="column1">2017-09-29 01:22</td>
									<td class="column2">1</td>
									<td class="column3">You saved a total of </td>
									<td class="column4">N50000</td>
									<td class="column5">5%</td>
									<td class="column6">N52500</td>
									<td class="column6">Processing</td>
								</tr>


						</tbody>
					</table>




				</div>
			</div>
		</div>
	</div>










<!--===============================================================================================-->
	<script src="<?=base_url('assets/vendor/jquery/jquery-3.2.1.min.js');?>"></script>
<!--===============================================================================================-->
	<script src="<?=base_url('assets/vendor/bootstrap/js/popper.js');?>"></script>
	<script src="<?=base_url('assets/vendor/bootstrap/js/bootstrap.min.js');?>"></script>
<!--===============================================================================================-->
	<script src="<?=base_url('assets/vendor/select2/select2.min.js');?>"></script>
<!--===============================================================================================-->
	<script src="<?=base_url('assets/js/main.js');?>"></script>

</body>
</html>
