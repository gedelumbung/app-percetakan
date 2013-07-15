<div id="content" class="span11">
<div class="row-fluid sortable">		
	<div class="box span12">
		<div class="box-header" data-original-title="">
			<h2><i class="halflings-icon hdd"></i><span class="break"></span>
			Laporan Pembayaran Harian</h2>
		</div>
		<div class="box-content">
			<?php echo form_open("dashboard/laporan_pembayaran/set"); ?>
			<input type="text" class="input-xlarge" id="tgl_pesan" value="<?php echo $tgl_cari; ?>" name="tgl" required />
			<input type="hidden" name="jenis" value="harian" />
			<input type="submit" value="Lihat Laporan" class="btn btn-small" />
			<?php echo form_close(); ?>
			<?php echo $dt_retrieve; ?>
			<span class="label label-success">JUMLAH DATA : <?php echo $this->db->get("dlmbg_pembayaran")->num_rows(); ?></span>
		</div>
	</div>

</div>
</div>
</div>