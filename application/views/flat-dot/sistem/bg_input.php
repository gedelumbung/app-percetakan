<div id="content" class="span11">
<div class="row-fluid sortable">		
	<div class="box span12">
		<div class="box-header" data-original-title="">
			<h2><i class="halflings-icon hdd"></i><span class="break"></span>
			<i class="halflings-icon plus-sign"></i><a href="<?php echo base_url(); ?>dashboard/pelanggan/tambah">Tambah Data</a><span class="break"></span>
			Data Pelanggan</h2>
		</div>
		<div class="box-content">
			<?php echo form_open("dashboard/sistem/simpan",'class="form-horizontal"'); ?>
			  <fieldset>
			  
				<div class="control-group">
				  <label class="control-label">Tipe</label>
				  <div class="controls">
					<input type="text" class="input-xlarge" value="<?php echo $tipe; ?>" name="tipe" required />
				  </div>
				</div>
			  
				<div class="control-group">
				  <label class="control-label">Keterangan</label>
				  <div class="controls">
					<input type="text" class="input-xlarge" value="<?php echo $title; ?>" name="title" required />
				  </div>
				</div>
			  
				<div class="control-group">
				  <label class="control-label">Konfigurasi</label>
				  <div class="controls">
					<input type="text" class="input-xlarge" value="<?php echo $content_setting; ?>" name="content_setting" required />
				  </div>
				</div>
				
				<div class="form-actions">
				  <button type="submit" class="btn btn-primary">Save changes</button>
				  <button type="reset" class="btn">Cancel</button>
				</div>
			  </fieldset>
			  <input type="hidden" name="id_param" value="<?php echo $id_param; ?>" />
			<?php echo form_close(); ?> 
		</div>
	</div>

</div>
</div>
</div>