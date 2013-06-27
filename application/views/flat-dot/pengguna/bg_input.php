<div id="content" class="span11">
<div class="row-fluid sortable">		
	<div class="box span12">
		<div class="box-header" data-original-title="">
			<h2><i class="halflings-icon hdd"></i><span class="break"></span>
			<i class="halflings-icon plus-sign"></i><a href="<?php echo base_url(); ?>dashboard/pengguna/tambah">Tambah Data</a><span class="break"></span>
			Data Pengguna</h2>
		</div>
		<div class="box-content">
			<?php echo form_open("dashboard/pengguna/simpan",'class="form-horizontal"'); ?>
			  <fieldset>
			  
				<div class="control-group">
				  <label class="control-label">Nama Pengguna</label>
				  <div class="controls">
					<input type="text" class="input-xlarge" value="<?php echo $nama_user; ?>" name="nama_user" required />
				  </div>
				</div>
			  
				<div class="control-group">
				  <label class="control-label">Username</label>
				  <div class="controls">
					<input type="text" class="input-xlarge" value="<?php echo $username; ?>" name="username" required />
				  </div>
				</div>
			  
				<div class="control-group">
				  <label class="control-label">Password</label>
				  <div class="controls">
					<input type="text" class="input-xlarge" value="" name="password" <?php if($st=="tambah"){ echo "required"; } ?> />
					<?php if($st=="edit"){ echo "*Kosongkan jika tidak diganti"; } ?>
				  </div>
				</div>
			  
				<div class="control-group">
				  <label class="control-label">Level</label>
				  <div class="controls">
				  	<?php $a='selected'; $k='selected';
				  	if($level=="admin"){$a='selected'; $k='';}
				  	else if($level=="kasir"){$a=''; $k='selected';}
				  	?>
				  	<select name="level">
				  		<option value="admin" <?php echo $a; ?>>Admin</option>
				  		<option value="kasir" <?php echo $k; ?>>Kasir</option>
				  	</select>
				  </div>
				</div>
				
				<div class="form-actions">
				  <button type="submit" class="btn btn-primary">Save changes</button>
				  <button type="reset" class="btn">Cancel</button>
				</div>
			  </fieldset>
			  <input type="hidden" name="id_param" value="<?php echo $id_param; ?>" />
			  <input type="hidden" name="st" value="<?php echo $st; ?>" />
			<?php echo form_close(); ?> 
		</div>
	</div>

</div>
</div>
</div>