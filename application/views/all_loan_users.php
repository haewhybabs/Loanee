<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php foreach ($get_loan_users as $loan_users):?>
		<p><?php echo $loan_users->user_id; echo $loan_users->amount; ?></p> 

	<?php endforeach;?>

</body>
</html>