<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

		<ul>
			<?php foreach ($check_status as $status):?>
				<?php if ($status->loan_type=='1'):?>

			<li><?= $status->amount; ?> Loan Payment on <?= $status->returning_date;?></li>

			     <?php elseif($status->loan_type="2"):?>

			     	<li>You requested for <?= $status->amount; ?> Loan on <?= $status->returning_date;?></li>

                <?php endif;?>

			<?php if ($status->status== '2'):?>
				<p>Successful</p>

			<?php else: ?>

			<p> Pending</p>
			
		
	        <?php endif;?>		    	
		     <a href="<?=base_url('');?>Loan/clear_each2/<?= $status->id;?>" style="background: red;">delete</a>
         <?php endforeach;?>




         <?php foreach ($check_save_status as $history):?>
				<?php if($history->status=='1' || $history->status=='2'):?>

			     <li><?= $history->amount; ?> Savings on <?= $history->date;?></li>
                 <?php endif;?>
			<?php if ($history->status== '2'):?>
				<p>Successful</p>

			<?php else: ?>

			<p> Pending</p>
		
	        <?php endif;?>		
             <a href="<?=base_url('');?>Loan/clear_each/<?= $history->id;?>" style="background: red;">delete</a>

         	<?php endforeach;?>

             <?php 
                $d=strtotime("next month");
                echo date("Y-m-d h:i:sa", $d) . "<br>";

         	?>
		</ul>

    

    
    

    

</body>
</html>