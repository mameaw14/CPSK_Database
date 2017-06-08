	<?php echo validation_errors(); ?>
	<?php echo form_open('events/add'); ?>



	<?php foreach ($fields as $key => $value) : ?>
	<label for="<?= $key ?>"> <?= $value ?> </label>
	<div class="input-group">
		<?php if ($key == 'additional_field_enabled') : ?>
			<input type="checkbox" class="form-control" name="<?= $key ?>" checked > ต้องการ
		<?php else : ?>
			<input type="text" class="form-control" name="<?= $key ?>" value="">
		<?php endif; ?>
	</div>
	<?php endforeach; ?>

	<button class="btn btn-default" type="submit">เพิ่ม</button>
	</form>