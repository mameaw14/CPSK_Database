<?php if($student) : ?>
	เชื่อมต่อสำเร็จ
	<a href="<?php echo site_url('profile/edit'); ?>" class="btn btn-primary">แก้ไขข้อมูล</a>
<?php else : ?>
	<?php echo $error ?>
<?php endif;?>
