<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title><?php echo $GLOBALS['site_title'].' - '.$GLOBALS['site_quotes']; ?></title>
	<meta name="description" content="ACME Dashboard Bootstrap Admin Template." />
	<meta name="author" content="Łukasz Holeczek" />
	<meta name="keyword" content="ACME, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link id="bootstrap-style" href="<?php echo base_url().'asset/theme/'.$GLOBALS['site_theme']; ?>/css/bootstrap.css" rel="stylesheet" />
	<link href="<?php echo base_url().'asset/theme/'.$GLOBALS['site_theme']; ?>/css/bootstrap-responsive.css" rel="stylesheet" />
	<link id="base-style" href="<?php echo base_url().'asset/theme/'.$GLOBALS['site_theme']; ?>/css/style.css" rel="stylesheet" />
	<link id="base-style-responsive" href="<?php echo base_url().'asset/theme/'.$GLOBALS['site_theme']; ?>/css/style-responsive.css" rel="stylesheet" />
	<link id="base-style-responsive" href="<?php echo base_url().'asset/theme/'.$GLOBALS['site_theme']; ?>/css/chosen.css" rel="stylesheet" />
	<script src="<?php echo base_url().'asset/theme/'.$GLOBALS['site_theme']; ?>/js/jquery-1.7.2.min.js"></script>
	<script src="<?php echo base_url().'asset/theme/'.$GLOBALS['site_theme']; ?>/js/jquery-ui-1.8.21.custom.min.js"></script>
	<script src="<?php echo base_url().'asset/theme/'.$GLOBALS['site_theme']; ?>/js/bootstrap.js"></script>
	<link type="text/css" href="<?php echo base_url().'asset/theme/'.$GLOBALS['site_theme']; ?>/css/jquery-ui-1.7.2.custom.css" rel="stylesheet" />
	<script type="text/javascript">
		$(function(){
			$('#tgl_pesan').datepicker({ dateFormat: 'dd MM yy' });
			$('#tgl_selesai').datepicker({ dateFormat: 'dd MM yy' });
			$('#tgl_bayar').datepicker({ dateFormat: 'dd MM yy' });
			$('#bulan').datepicker( {
				changeMonth: true,
				changeYear: true,
				showButtonPanel: true,
				dateFormat: 'MM yy',
				onClose: function(dateText, inst) { 
					var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
					var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
					$(this).datepicker('setDate', new Date(year, month, 1));
				}
			});
		});
	</script>
	<link rel="stylesheet" href="<?php echo base_url().'asset/theme/'.$GLOBALS['site_theme']; ?>/colorbox/colorbox.css" />
	<script src="<?php echo base_url().'asset/theme/'.$GLOBALS['site_theme']; ?>/colorbox/jquery.colorbox.js"></script>
	<script>
		  $(document).ready(function(){
			  $(".cbbarang").colorbox({rel:'group', iframe:true, width:"700", height:"500"});
			  $(".cbpelanggan").colorbox({rel:'group', iframe:true, width:"700", height:"90%"});
			  $(".cblsbarang").colorbox({rel:'group', iframe:true, width:"700", height:"60%"});
			  $(".cbuser").colorbox({rel:'group', iframe:true, width:"700", height:"60%"});
	
		  });
	</script>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>

<body>
	<div class="navbar">
		<div class="navbar-inner">
			<div class="container-fluid">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<a class="brand" href="./index.html"><span><?php echo $GLOBALS['site_title']; ?></span></a>
								
				<div class="nav-no-collapse header-nav">
					<ul class="nav pull-right">
						<li class="dropdown">
							<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
								<i class="halflings-icon white wrench"></i> Utility
								<span class="caret"></span>
							</a>
							<ul class="dropdown-menu">
								<li><a href="<?php echo base_url(); ?>dashboard/backup"><i class="halflings-icon white tasks"></i> Backup</a></li>
								<li><a href="<?php echo base_url(); ?>dashboard/restore"><i class="halflings-icon white tasks"></i> Restore</a></li>
							</ul>
						</li>
						<li class="dropdown">
							<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
								<i class="halflings-icon white wrench"></i> Karyawan
								<span class="caret"></span>
							</a>
							<ul class="dropdown-menu">
								<li><a href="<?php echo base_url(); ?>dashboard/data_karyawan"><i class="halflings-icon white tasks"></i> Data Karyawan</a></li>
								<li><a href="<?php echo base_url(); ?>dashboard/gaji_karyawan"><i class="halflings-icon white tasks"></i> Gaji Karyawan</a></li>
							</ul>
						</li>
						<?php if($this->session->userdata("level")=="admin"){?>
						<li class="dropdown">
							<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
								<i class="halflings-icon white fire"></i> Sistem
								<span class="caret"></span>
							</a>
							<ul class="dropdown-menu">
								<li><a href="<?php echo base_url(); ?>dashboard/sistem"><i class="halflings-icon white tasks"></i> Konfigurasi</a></li>
							</ul>
						</li>
						<?php } ?>
						<li class="dropdown">
							<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
								<i class="halflings-icon white print"></i> Laporan
								<span class="caret"></span>
							</a>
							<ul class="dropdown-menu">
								<li><a href="<?php echo base_url(); ?>dashboard/laporan_pemesanan/harian"><i class="halflings-icon white list"></i> Pemesanan Harian</a></li>
								<li><a href="<?php echo base_url(); ?>dashboard/laporan_pemesanan/bulanan"><i class="halflings-icon white list"></i> Pemesanan Bulanan</a></li>
								<li><a href="<?php echo base_url(); ?>dashboard/laporan_pembayaran/harian"><i class="halflings-icon white list"></i> Pembayaran Harian</a></li>
								<li><a href="<?php echo base_url(); ?>dashboard/laporan_pembayaran/bulanan"><i class="halflings-icon white list"></i> Pembayaran Bulanan</a></li>
							</ul>
						</li>
						<li class="dropdown">
							<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
								<i class="halflings-icon white user"></i> <?php echo $this->session->userdata("nama_user_login"); ?>
								<span class="caret"></span>
							</a>
							<ul class="dropdown-menu">
								<li><a href="<?php echo base_url(); ?>dashboard/logout"><i class="halflings-icon white off"></i> Logout</a></li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="container-fluid">
		<div class="row-fluid">