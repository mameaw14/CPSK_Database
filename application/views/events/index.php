	<h1>Events</h1>
	<?php foreach ($events as $event) : ?>
		<?php foreach ($event as $key => $value) : ?>
		<div>
			<?php echo $key.' => '.$value ?>
		</div>
	<?php endforeach; endforeach; ?>
	<a class="btn btn-default" href="<?php echo site_url();?>">กลับหน้าแรก</a>