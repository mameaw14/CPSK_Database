<h2>เชื่อม Facebook กับ Database</h2>
<?php echo form_open('profile/connect'); ?>
<?php echo validation_errors(); ?>
<div class="input-group">
	<label for="std_id">รหัสนิสิต</label>
	<input type="text" class="form-control" name="std_id">
</div>
<div class="input-group">
	<label for="name">ชื่อจริง (ex. สมชาย)</label>
	<input type="text" class="form-control" name="name">
</div>
<button type="submit" id="submit" class="btn btn-default">ยืนยัน</button>
</form>