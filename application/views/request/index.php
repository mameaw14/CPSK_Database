<h1>Request Data</h1>
<?php echo validation_errors(); ?>
<?php echo form_open('request'); ?>
	<h2>ขอ</h2>
	<?php foreach ($fields as $key => $value) : ?>
	<div class="checkbox">
		<label>
			<input type="checkbox" name="req[]" value="<?php echo $key ?>">
			<?= $value ?>
		</label>
	</div>
	<?php endforeach; ?>

	<h2>ของนิสิต</h2>
	<?php foreach ($years as $key) : ?>
	<div class="checkbox">
		<label>
			<input type="checkbox" name="year[]" value="<?php echo $key ?>">
			รหัส <?= $key ?>
		</label>
	</div>
	<?php endforeach; ?>

	<h2>เพื่อนำไปใช้ (ใส่รายละเอียดให้ชัดเจน)</h2>
	<textarea name="reason" class="form-control" rows="3"></textarea>

	<button class="btn btn-primary" type="submit" name="summit">REQUEST</button>
</form>