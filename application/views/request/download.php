<table data-toggle="table" data-search="true" data-id-field="student-id" data-sort-name="student_id" data-sort-order="asc">
	<thead><tr>
			<?php foreach ($data[0] as $key => $value) :
				?><th data-field="<?= $key?>" data-sortable="true"> <?php
						echo $key;
				?></th><?php
			endforeach;
			?>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($data as $row) :
			?><tr><?php
			foreach ($row as $key => $value) :
				?><td><?php echo $value; ?></td><?php
			endforeach;
			?><tr><?php
		endforeach;
		?>
	</tbody>
</table>

<a class="btn btn-default" href="<?php echo site_url();?>">กลับหน้าแรก</a>