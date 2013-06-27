<div id="content" class="span11">
<div class="row-fluid sortable">		
	<div class="box span12">
		<div class="box-header" data-original-title="">
			<h2><i class="halflings-icon hdd"></i><span class="break"></span>
			<i class="halflings-icon plus-sign"></i><a href="<?php echo base_url(); ?>dashboard/gaji_karyawan/tambah">Tambah Data</a><span class="break"></span>
			Gaji Karyawan</h2>
		</div>
		<div class="box-content">
			<?php echo form_open("dashboard/gaji_karyawan/simpan",'class="form-horizontal"'); ?>
			  <fieldset>
			  
				<div class="control-group">
				  <label class="control-label">Nama Karyawan</label>
				  <div class="controls">
					<select name="id_karyawan">
					<?php
						foreach($karyawan->result_array() as $k)
						{
							if($id_karyawan==$k['id_karyawan'])
							{
					?>
						<option value="<?php echo $k['id_karyawan']; ?>" selected="selected"><?php echo $k['nama_karyawan']; ?></option>
					<?php
							}
							else
							{
					?>
						<option value="<?php echo $k['id_karyawan']; ?>"><?php echo $k['nama_karyawan']; ?></option>
					<?php
							}
						}
					?>
					</select>
				  </div>
				</div>
			  
				<div class="control-group">
				  <label class="control-label">Bulan</label>
				  <div class="controls">
					<input type="text" class="input-xlarge" value="<?php echo $tanggal; ?>" name="tanggal" id="bulan" required />
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