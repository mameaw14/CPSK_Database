	<h1>Profile</h1>
	<?php foreach ($student as $key => $value) : ?>
	<div>
		<?php echo $key.' => '.$value ?>
	</div>
	<?php endforeach; ?>
	<a class="btn btn-default" href="<?php echo site_url();?>">กลับหน้าแรก</a>