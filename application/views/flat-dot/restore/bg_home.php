<div id="content" class="span11">
<div class="row-fluid sortable">		
	<div class="box span12">
		<div class="box-header" data-original-title="">
			<h2><i class="halflings-icon hdd"></i>
				<span class="break"></span>
			Data Restore</h2>
		</div>
		<div class="box-content">
					<?php echo form_open_multipart('dashboard/restore/upload'); ?>
						<input type="file" name="userfile" class="input-read-only" />
						<input type="submit" value="Restore Data" class="btn btn-info" />
					<?php echo form_close(); ?>
		</div>
	</div>

</div>
</div>
</div>