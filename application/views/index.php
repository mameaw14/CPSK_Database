	<h1 id="header">CPSK DATABASE</h1>
	<div class="box">
<?php if($student) : ?>
	<h2><?= $student['name'] ?> <?= $student['major'] ?></h2>
	<a class="btn btn-primary" href="<?php echo site_url('profile'); ?>">My Profile</a>
	<a class="btn btn-warning" href="<?php echo site_url('request'); ?>">REQUEST</a>
	<a class="btn btn-default" href="<?php echo site_url('profile/edit'); ?>">แก้ไขข้อมูล</a>
	<button onclick="javascript:fblogout()"class="btn btn-danger">Logout</button>
<?php elseif(is_logged_in()) : ?>
	<script type="text/javascript">
		window.location = "<?php echo site_url('profile/connect'); ?>";
	</script>
<?php else : ?>
	<button class="btn btn-lg btn-primary" onclick="javascript:fblogin()">Connect to Database</button>
<?php endif; ?>

</div>