	<?php foreach ($student as $key => $value) : ?>

	<label for="<?= $key?>"> <?= $key ?> </label>
	<div class="input-group">
		<input type="text" class="form-control" id="<?= $key ?>" placeholder="<?= $value?>">
	</div>
	<?php endforeach; ?>
	<input type="submit" name="summit">