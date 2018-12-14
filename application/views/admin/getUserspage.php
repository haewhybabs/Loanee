<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php $this->load->view('layouts/includes/adminHeader');?>
  <h2>These are all the users currently using the platform</h2>
	<?php foreach ($get_users as $users):?>
    <a href="<?= base_url('');?>Admin_dashboard/get_details/<?=$users->id;?>">
		<p><?php echo $users->id; echo $users->first_name;?> <?= $users->last_name;?></p>
    </a>
	<?php endforeach;?>


	<?php $this->load->view('layouts/includes/footer');?>
</body>
</html>
