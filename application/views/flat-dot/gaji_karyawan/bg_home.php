<div id="content" class="span11">
<div class="row-fluid sortable">		
	<div class="box span12">
		<div class="box-header" data-original-title="">
			<h2><i class="halflings-icon hdd"></i><span class="break"></span>
			<i class="halflings-icon plus-sign"></i><a href="<?php echo base_url(); ?>dashboard/gaji_karyawan/tambah">Tambah Data</a><span class="break"></span>
			Gaji Karyawan</h2>
		</div>
		<div class="box-content">
			<?php echo form_open("dashboard/gaji_karyawan/set"); ?>
			<input type="text" class="input-xlarge" id="bulan" value="<?php echo $bulan_cari; ?>" name="bulan" required />
			<input type="submit" value="Lihat Gaji" class="btn btn-small" />
			<?php echo form_close(); ?>
			<?php echo $dt_retrieve; ?>
		</div>
	</div>

</div>
</div>
</div>