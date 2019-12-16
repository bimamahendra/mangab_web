<!DOCTYPE html>
<html>

<head>
	<title> <?php echo $page_title ?> </title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="<?= base_url('assets/images/icon_scan.png') ?>">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
	<link rel="stylesheet" href="<?= base_url('assets/css/simple-sidebar.css') ?>">

	<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
</head>
<body>
	<div class="d-flex" id="wrapper">
		<nav class="bg-light border-right" id="sidebar-wrapper">
			<div class="sidebar-heading" > Mahasiswa Ngabsen <b>(MaNgab)</b> </div>
			<div class="list-group list-group-flush">
				<a href="<?= base_url(); ?>" class="list-group-item list-group-item-action bg-light"><span class="fa fa-dashboard"></span> Dashboard</a>
				<a href="<?= base_url('Mahasiswa'); ?>" class="list-group-item list-group-item-action bg-light"><span class="fa fa-users"></span> Data Mahasiswa</a>
				<a href="<?= base_url('Dosen'); ?>" class="list-group-item list-group-item-action bg-light"><span class="fa fa-user"></span> &nbsp;Data Dosen</a>
				<!-- <a href="<?= base_url('Matkul'); ?>" class="list-group-item list-group-item-action bg-light"><span class="fa fa-book"></span> Data Mata Kuliah</a> -->
				<!-- <a href="<?= base_url('Kelas'); ?>" class="list-group-item list-group-item-action bg-light"><span class="fa fa-building"></span> &nbsp;Data Kelas</a> -->
				<!-- <a href="<?= base_url('Frs'); ?>" class="list-group-item list-group-item-action bg-light"><span class="fa fa-calendar"></span> &nbsp;Data FRS</a> -->
				<a href="<?= base_url('Absen'); ?>" class="list-group-item list-group-item-action bg-light"><span class="fa fa-list"></span> Rekap Kehadiran</a>
			</div>
		</nav>
		<!-- /#sidebar-wrapper -->
		<!-- Page Content -->
		<div id="page-content-wrapper">
			<nav class="navbar navbar-expand-lg border-bottom"  style="background:#005792">
				<!-- <button class="btn btn-light" id="menu-toggle"><i class="fa fa-bars"></i></button>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button> -->
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav ml-auto mt-2 mt-lg-0">
						<li class="nav-item" style="color: white"> <b> <?php echo $page_title ?> </b> <br></li>
					</ul>
					<ul class="navbar-nav ml-auto mt-2 mt-lg-0">
						<li class="nav-item"> <a class="nav-link" href="<?= base_url('login/logout'); ?>" style="color:white">Log Out <span class="fa fa-sign-out" style="color: white"></span><br></a> </li>
					</ul>
				</div>
			</nav>
			<div class="container-fluid">
				<?php $this->load->view($main_content); ?>
			</div>
		</div>	
	</div>
</body>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

<script>
	$("#menu-toggle").click(function(e) {
		e.preventDefault();
		$("#wrapper").toggleClass("toggled");
	});
	$(document).ready(function() {
		$('#newstable').DataTable( {
			"paging":   true,
			"ordering": false,
			"info":     false
		});
	});
</script>

</html>