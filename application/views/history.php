<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

		<ul>
			<h2> Loan  History</h2>
			<?php foreach ($check_status as $status):?>
				<?php if ($status->loan_type=='1' && $status->status=='1'):?>

			<li><?= $status->amount; ?> Loan Payment on <?= $status->returning_date;?></li>
			  	<p> Pending</p>
        <a href="<?=base_url('');?>Loan/DelLoanPending/<?= $history->id;?>" style="background: red; color: white;">delete</a>


      <?php elseif ($status->loan_type=='1' && $status->status=='2'):?>
				<li><?= $status->amount; ?> Loan Payment on <?= $status->returning_date;?></li>
          <p> Successful</p>
				  <a href="<?=base_url('');?>Loan/DelLoanPending/<?= $history->id;?>" style="background: red; color: white;">delete</a>

			<?php elseif ($status->loan_type=='2' && $status->status=='1'):?>
				<li>You requested for <?= $status->amount; ?> Loan on <?= $status->returning_date;?></li>
					<p>Pending</p>
					<a href="<?=base_url('');?>Loan/DelLoanPending/<?= $history->id;?>" style="background: red; color: white;">delete</a>



				<?php elseif($status->loan_type="2" ):?>



                <?php endif;?>

			<?php if ($status->status== '2'):?>
				<p>Successful</p>

			<?php else: ?>

			<p> Pending</p>


	        <?php endif;?>

         <?php endforeach;?>

   <h1> Savings/Withdrawal History</h1>


         <?php foreach ($check_save_status as $history):?>
				<?php if($history->amount_type=='1' && $history->status=='2'):?>
			     <li> Saved a total of:<?= $history->amount; ?> on <?= $history->date;?></li><br>
			     <p>Successful</p>
			     <a href="<?=base_url('');?>Loan/clear_each/<?= $history->id;?>" style="background: red; color: white;">delete</a>

                 <?php elseif($history->amount_type=='1' && $history->status=='1'):?>
                 	<li>You requested to Save a total of:<?= $history->amount; ?> on <?= $history->date;?></li><br>
                             <p> Pending</p>
                      <a href="<?=base_url('');?>Loan/clear_each/<?= $history->id;?>" style="background: red; color: white;">delete</a>



                 <?php elseif($history->amount_type=='2' && $history->status=='2'):?>
                 	<li>You withdrew a total of:<?= $history->amount; ?> on <?= $history->date;?></li><br>
                             <p> succesfull</p>
                      <a href="<?=base_url('');?>Loan/clear_each/<?= $history->id;?>" style="background: red; color: white;">delete</a>


                 <?php elseif($history->amount_type=='2' && $history->status=='1'):?>
                 	<li>You requested to withdraw a total of :<?= $history->amount; ?> on <?= $history->date;?></li><br>
                             <p> Pending</p>
                      <a href="<?=base_url('');?>Loan/clear_each/<?= $history->id;?>" style="background: red; color: white;">delete</a>

                <?php endif;?>
        <?php endforeach;?>





		</ul>








</body>
</html>
