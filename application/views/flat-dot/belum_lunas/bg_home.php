<div id="content" class="span11">
<div class="row-fluid sortable">		
	<div class="box span12">
		<div class="box-header" data-original-title="">
			<h2><i class="halflings-icon hdd"></i><span class="break"></span>
			Data Belum Lunas</h2>
		</div>
		<div class="box-content">
			<?php echo form_open("dashboard/belum_lunas/set"); ?>
			<input type="text" class="input-xlarge" value="<?php echo $this->session->userdata("key"); ?>" name="key" />
			<select name="key_search">
				<option value="nama_pelanggan">Nama pelanggan</option>
				<option value="a.kode_pemesanan">Kode pemesanan</option>
			</select>
			<input type="submit" value="Cari Data" class="btn" />
			<?php echo form_close(); ?>
			<?php echo $dt_retrieve; ?>
			<span class="label label-success">JUMLAH DATA : <?php echo $this->db->get_where("dlmbg_pemesanan",array("status_pembayaran"=>"Belum Lunas"))->num_rows(); ?></span>
		</div>
	</div>

</div>
</div>
</div>