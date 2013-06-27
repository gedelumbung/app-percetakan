<body>

<div class="container-fluid">
	<div class="row-fluid">
	<div id="content" class="span12">
	<div class="row-fluid sortable">		
		<div class="box span12">
			<div class="box-header" data-original-title="">
				<h2><i class="halflings-icon hdd"></i><span class="break"></span>
				Form Pembayaran</h2>
			</div>
			<div class="box-content">
				<?php echo form_open("dashboard/pemesanan/simpan_pembayaran",'class="form-horizontal"'); ?>
				  <fieldset>
				  
					<div class="control-group">
					  <label class="control-label">No Kwitansi</label>
					  <div class="controls">
						<input type="text" class="input-xlarge" value="<?php echo $kode_pembayaran; ?>" name="kode_pembayaran" required readonly="true" />
					  </div>
					</div>
				  
					<div class="control-group">
					  <label class="control-label">No Nota</label>
					  <div class="controls">
						<input type="text" class="input-xlarge" value="<?php echo $no_nota; ?>" name="no_nota" required readonly="true" />
					  </div>
					</div>
				  
					<div class="control-group">
					  <label class="control-label">Pelanggan</label>
					  <div class="controls">
						<select data-placeholder="Cari nama pelanggan..." class="chzn-select" style="width:400px;" tabindex="2" name="kode_pelanggan" id="kode_pelanggan" 
						disabled="disabled">
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
						<input type="text" class="input-xlarge" id="tgl_pesan" value="<?php echo $tgl_pesan; ?>" name="tgl_pesan" required disabled="disabled" />
					  </div>
					</div>
				  
					<div class="control-group">
					  <label class="control-label">Tanggal Selesai</label>
					  <div class="controls">
						<input type="text" class="input-xlarge" id="tgl_selesai" value="<?php echo $tgl_selesai; ?>" name="tgl_selesai" required disabled="disabled" />
					  </div>
					</div>
				  
					<div class="control-group">
					  <label class="control-label">Tanggal Bayar</label>
					  <div class="controls">
						<input type="text" class="input-xlarge" id="tgl_bayar" value="<?php echo $tgl_bayar; ?>" name="tgl_bayar" required />
					  </div>
					</div>
				  
					<div class="control-group">
					  <label class="control-label">Jumlah Bayar</label>
					  <div class="controls">
						<input type="text" class="input-xlarge" id="jumlah_harga" value="<?php echo $jumlah_harga; ?>" name="jumlah_harga" required disabled="disabled" />
					  </div>
					</div>
				  
					<div class="control-group">
					  <label class="control-label">Bayar</label>
					  <div class="controls">
						<input type="text" class="input-xlarge" id="bayar" name="bayar" value="<?php echo $bayar; ?>" required />
					  </div>
					</div>
					
					<table class="table table-striped table-bordered bootstrap-datatable datatable">
						<thead>
							<tr>
								<th>No.</th>
								<th>Nama Bahan Baku</th>
								<th>Jumlah Pakai</th>
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
						</tr>
			
					<?php $i++; $no++;?>
					<?php endforeach; ?>
					</table>
					
				  </fieldset>
				<?php echo form_close(); ?> 
			</div>
		</div>
	
	</div>
	</div>
	</div>
</div>
</body>
