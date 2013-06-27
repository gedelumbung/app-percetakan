<script type="text/javascript">
function hitSisa()
{
	var total = document.getElementById("jumlah_harga").value;
	var uang_muka = document.getElementById("uang_muka").value;
	var sisa = eval(total-uang_muka);
	document.frm_pesan.sisa_bayar.value = sisa;
}
</script>
<div id="content" class="span11">
<div class="row-fluid sortable">		
	<div class="box span12">
		<div class="box-header" data-original-title="">
			<h2><i class="halflings-icon hdd"></i><span class="break"></span>
			<i class="halflings-icon plus-sign"></i><a href="<?php echo base_url(); ?>dashboard/pemesanan/tambah">Tambah Data</a><span class="break"></span>
			Data Pemesanan</h2>
		</div>
		<div class="box-content">
			<?php echo form_open("dashboard/pemesanan/simpan_update",'class="form-horizontal" name="frm_pesan"'); ?>
			  <fieldset>
			  
				<div class="control-group">
				  <label class="control-label">No Nota</label>
				  <div class="controls">
					<input type="text" class="input-xlarge" value="<?php echo $no_nota; ?>" name="no_nota" required readonly="true" />
				  </div>
				</div>
			  
				<div class="control-group">
				  <label class="control-label">Pelanggan</label>
				  <div class="controls">
					<select data-placeholder="Cari nama pelanggan..." class="chzn-select" style="width:400px;" tabindex="2" name="kode_pelanggan" id="kode_pelanggan">
          		<option value=""></option> 
					<?php
						foreach($pelanggan->result_array() as $dp)
						{
						$pilih='';
						if($dp['kode_pelanggan']==$this->session->userdata("kode_pelanggan"))
						{
						$pilih='selected="selected"';
					?>
						<option value="<?php echo $dp['kode_pelanggan']; ?>" <?php echo $pilih; ?>><?php echo $dp['nama_pelanggan']; ?></option>
					<?php
					}
					else
					{
					?>
						<option value="<?php echo $dp['kode_pelanggan']; ?>"><?php echo $dp['nama_pelanggan']; ?></option>
					<?php
					}
						}
					?>
				</select>
				  </div>
				</div>
			  
				<div class="control-group">
				  <label class="control-label">Tanggal Pesan</label>
				  <div class="controls">
					<input type="text" class="input-xlarge" id="tgl_pesan" value="<?php echo $tgl_pesan; ?>" name="tgl_pesan" required />
				  </div>
				</div>
			  
				<div class="control-group">
				  <label class="control-label">Tanggal Selesai</label>
				  <div class="controls">
					<input type="text" class="input-xlarge" id="tgl_selesai" value="<?php echo $tgl_selesai; ?>" name="tgl_selesai" required />
				  </div>
				</div>
				
				<table class="table table-striped table-bordered bootstrap-datatable datatable">
					<thead>
						<tr>
							<th>No.</th>
							<th>Nama Jenis Cetakan</th>
							<th>Jumlah</th>
							<th>Harga Satuan</th>
							<th>Subtotal</th>
							<th><a href="<?php echo base_url(); ?>dashboard/pemesanan/tambah_item" class="cbbarang btn btn-warning btn-small">Tambah Cetakan</a></th>
						</tr>
					</thead> 
					<?php $i = 1; $no=1;?>
					<?php foreach($this->cart->contents() as $items): ?>
					
					<?php echo form_hidden('rowid[]', $items['rowid']); ?>
					<tr class="content">
						
						<td><?php echo $no; ?></td>
						<td><?php echo $items['name']; ?></td>
						<td><?php echo $items['qty']; ?> 
						<?php foreach ($this->cart->product_options($items['rowid']) as $option_name => $option_value)
						{
							echo $option_value;
						} 
						?>
						</td>
						<td><?php echo number_format($items['price'],2,',','.'); ?></td>
						<td><?php echo number_format($items['subtotal'],2,',','.'); ?></td>
						<td align="center">
						<a href="#" class="delbutton" id="<?php echo $items['rowid']; ?>" class="btn btn-small">Hapus</a>
						</td>
					</tr>
	  	
				<?php $i++; $no++;?>
				<?php endforeach; ?>
				</table>
			  
				<div class="control-group">
				  <label class="control-label">Total Harga</label>
				  <div class="controls">
					<input type="text" class="input-xlarge" id="jumlah_harga" value="<?php echo $this->cart->total(); ?>" name="jumlah_harga" required />
				  </div>
				</div>
			  
				<div class="control-group">
				  <label class="control-label">Uang Muka</label>
				  <div class="controls">
					<input type="text" class="input-xlarge" id="uang_muka" value="<?php echo $uang_muka; ?>" name="uang_muka" onChange="hitSisa()" required />
				  </div>
				</div>
			  
				<div class="control-group">
				  <label class="control-label">Sisa Pembayaran</label>
				  <div class="controls">
					<input type="text" class="input-xlarge" id="sisa_bayar" value="<?php echo $this->cart->total()-$uang_muka; ?>" name="sisa_bayar" />
				  </div>
				</div>
			  
				<div class="control-group">
				  <label class="control-label">Status Pembayaran</label>
				  <div class="controls">
				  <?php $l=''; $bl='';
				  if($status_pembayaran=="Lunas"){$l='selected'; $bl='';}
				  else if($status_pembayaran=="Belum Lunas"){$l=''; $bl='selected';}
				 	?>
					<select data-placeholder="Status Pembayaran..." class="chzn-select2" style="width:200px;" tabindex="2" name="status_pembayaran" id="status_pembayaran">
          				<option value=""></option> 
						<option value="Belum Lunas" <?php echo $bl; ?>>Belum Lunas</option> 
						<option value="Lunas" <?php echo $l; ?>>Lunas</option> 
					</select>
				  </div>
				</div>
				
				<div class="form-actions">
				  <button type="submit" class="btn btn-primary">Save changes</button>
				  <button type="reset" class="btn">Cancel</button>
				</div>
			  </fieldset>
			<script src="<?php echo base_url(); ?>asset/theme/<?php echo $GLOBALS['site_theme']; ?>/js/chosen.jquery.js" type="text/javascript"></script>
			<script type="text/javascript"> $(".chzn-select").chosen().change(function(){ 
						var kode_pelanggan = $("#kode_pelanggan").val(); 
						$.ajax({ 
						url: "<?php echo base_url(); ?>dashboard/pemesanan/set_kd_pelanggan", 
						data: "kode_pelanggan="+kode_pelanggan, 
						cache: false, 
						success: function(msg){} 
				})
				});
				$(".chzn-select2").chosen();
				
				$(document).ready(function() {
					$(".delbutton").click(function(){
					 var element = $(this);
					 var del_id = element.attr("id");
					 var info = del_id;
					 if(confirm("Anda yakin akan menghapus?"))
					 {
							 $.ajax({
							 url: "<?php echo base_url(); ?>dashboard/pemesanan/hapus_pesanan", 
							 data: "kode="+info, 
							 cache: false, 
							 success: function(){
							 }
						 });	
					 	$(this).parents(".content").animate({ opacity: "hide" }, "slow");
						}
					 return false;
					 });
					 
					 $('#tgl_pesan').change(function() {
					  var tgl_pesan = $("#tgl_pesan").val(); 
						$.ajax({ 
						url: "<?php echo base_url(); ?>dashboard/pemesanan/set_tgl_pesanan", 
						data: "tgl_pesan="+tgl_pesan, 
						cache: false, 
						success: function(msg){} 
					}) 
					})
					 
					 $('#tgl_selesai').change(function() {
					  var tgl_selesai = $("#tgl_selesai").val(); 
						$.ajax({ 
						url: "<?php echo base_url(); ?>dashboard/pemesanan/set_tgl_selesai", 
						data: "tgl_selesai="+tgl_selesai, 
						cache: false, 
						success: function(msg){} 
					}) 
					})
					 
					 $('#jumlah_harga').change(function() {
					  var jumlah_harga = $("#jumlah_harga").val(); 
						$.ajax({ 
						url: "<?php echo base_url(); ?>dashboard/pemesanan/set_jumlah_harga", 
						data: "jumlah_harga="+jumlah_harga, 
						cache: false, 
						success: function(msg){} 
					}) 
					})
				})
			</script>
			<?php echo form_close(); ?> 
		</div>
	</div>

</div>
</div>
</div>