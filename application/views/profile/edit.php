	<?php if($edited) : ?>
		<script type="text/javascript">window.location = "./"</script>
	<? endif; ?>
	<?php echo validation_errors(); ?>
	<?php echo form_open('profile/submit_edit_form'); ?>
	<h1><?php echo 'แก้ไขข้อมูล  '.$student['name'].' '.$student['surname'] ?></h1>
	<input type="hidden" name="student-id" value="<?= $student['student_id'] ?>">
	<label for="name-en"> ชื่อ(ภาษาอังกฤษ) </label>
	<div class="input-group">
		<input type="text" class="form-control" name="name-en" value="<?= $student['name_en'] ?> ">
	</div>

	<label for="surname-en"> นามสกุล (ภาษาอังกฤษ) </label>
	<div class="input-group">
		<input type="text" class="form-control" name="surname-en" value="<?= $student['surname_en'] ?>">
	</div>

	<label for="nickname-en"> ชื่อเล่น (ภาษาอังกฤษ) </label>
	<div class="input-group">
		<input type="text" class="form-control" name="nickname-en" value="<?= $student['nickname_en'] ?>">
	</div>

	<label for="tel-no"> เบอร์โทรศัพท์ </label>
	<div class="input-group">
		<input type="text" class="form-control" name="tel-no" value="<?= $student['tel_no'] ?>">
	</div>

	<label for="shirt-size"> ไซส์เสื้อ รอบอก (นิ้ว) </label>
	<div class="input-group">
		<input type="number" min="32" max="52" class="form-control" name="shirt-size" value="<?= $student['shirt_size'] ?>">
	</div>

	<label for="allergic"> อาหารที่แพ้ โรคประจำตัว </label>
	<div class="input-group">
		<input type="text" class="form-control" name="allergic" value="<?= $student['allergic'] ?>">
	</div>

	<button class="btn btn-default" type="submit" name="summit">แก้ไข</button>
	</form>