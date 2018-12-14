<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
  <h2>User Registration Details:</h2>
	<?php foreach ($get_users as $users):?>
  <ul>
		<li><p><b>name</b> :<?php echo $users->first_name;?> <?= $users->last_name;?></p></li>
    	<li><p><b>email</b> :<?php echo $users->email;?></p></li>
      <li><p><b>mobile</b> :<?php echo $users->mobile;?></p></li>
      <li><p><b>password</b> :<?php echo $users->password;?></p></li>
      <li><p><b>username</b> :<?php echo $users->username;?></p></li>
      <li><p><b>image :</b></p> <img src="<?echo $users->image;?> " style="width:40px; height:50px;"/></li>
  </ul>
	<?php endforeach;?>
  <h2> User Bank Details: </h2>
   <?php if ($fetch_bank==false):?>
      <p> No bank details yet </p>

   <?php else:?>
  <?php foreach ($fetch_bank as $users):?>
    <ul>
        <li><p><b>Bank Name</b> <?= $users->bank_name;?></p></li>
        <li><p><b>Bvn Number:</b> :<?php echo $users->bvn;?></p></li>
        <li><p><b>Account Name</b> :<?php echo $users->account_name;?></p></li>
        <li><p><b>Account Number</b> :<?php echo $users->account_number;?></p></li>
				<li><p><b>Card Number</b> :<?php echo $users->card_number;?></p></li>
				<li><p><b>CVV</b> :<?php echo $users->cvv;?></p></li>
				  <li><p><b>Expiration Date</b> :<?php echo $users->expiration_date;?></p></li>
				 <li><p><b>document :</b></p> <img src="<?echo $users->document;?> " style="width:40px; height:50px;"/></li>

    </ul>
    <?php endforeach;?>
  <?php endif;?>
</body>
</html>
