<div id="content" class="span11">
<div class="row-fluid sortable">		
	<div class="box span12">
		<div class="box-header" data-original-title="">
			<h2><i class="halflings-icon hdd"></i><span class="break"></span>
			Laporan Pemesanan Bulanan</h2>
		</div>
		<div class="box-content">
			<?php echo form_open("dashboard/laporan_pemesanan/set"); ?>
			<input type="text" class="input-xlarge" id="bulan" value="<?php echo $bulan_cari; ?>" name="bulan" required />
			<input type="hidden" name="jenis" value="bulanan" />
			<input type="submit" value="Lihat Laporan" class="btn btn-small" />
			<?php echo form_close(); ?>
			<?php echo $dt_retrieve; ?>
		</div>
	</div>

</div>
</div>
</div>