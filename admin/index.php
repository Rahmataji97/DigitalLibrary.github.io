<!DOCTYPE html>
<?php 
	session_start(); 
	include "../config/koneksi.php";
	$username 	= '';
	$name 		= '';
	$log 		= '';
	$pos		= '';
	if (isset($_SESSION['status'])){
        if($_SESSION['status'] !="login"){
			header("Location: ".$url."view/login");
		} else {
			$username 	= $_SESSION['username'];
			$name 		= $_SESSION['name'];
			$log 		= $_SESSION['status'];
			$pos		= $_SESSION['posisi'];
			$_SESSION['menu'] = 'home';
			if($pos!="admin"){
                header("Location: ".$url."view/login");
        }}} else { header("Location: ".$url."view/login"); }
?>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title>UNAS Digital Library</title>
<!-- Favicon -->
<link href="<?php echo $url ?>images/unas.png" rel="icon" type="image/x-icon" />
<!-- Font Awesome Icons -->
<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
<!-- overlayScrollbars -->
<link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
<!-- DataTables -->
<link rel="stylesheet" href="<?php echo $url ?>admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?php echo $url ?>admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="dist/css/adminlte.min.css">
<!-- Google Font: Source Sans Pro -->
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?php echo $url; ?>admin/index.php" class="nav-link">Home</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>
  </nav>
  <!-- /.navbar -->
  
  
  <?php include ("sidebar.php"); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Dashboard</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo $url; ?>admin/index.php">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

          <!-- /.col (LEFT) -->
          
            <!-- /.card -->


            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Download Graphics /Category </h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                </div>
              </div>
              <div class="card-body">
                <div class="chart">
                  <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          <!-- /.col (RIGHT) -->

        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
	<section class="content">
      <div class="row">
        <div class="col-12">
       
          <!-- /.card -->

          <div class="card">
            <div class="card-header">
			  <a class='btn btn-primary btn-xs' title='Add Data' href='#'><font size='4'>20 E-Book Most Download</font></a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th style='width:50px'>No.</th>
                  <th>Title</th>
				  <th>Publisher</th>
				  <th>Author</th>
				  <th>Recomended</th>
				  <th>Tahun</th>
				  <th>Kategori</th>
                  <th style='width:50px'>Pict</th>
                </tr>
                </thead>
                <tbody>
				<?php 
				$no=1;
				$sqlx = "select Count(*) jumlah, id, judul, deskripsi, penerbit, kategori, rekomended, tahun_terbit, penulis, gambar  
										from (select ebook.*, penerbit.nama penerbit, kategori.nama kategori, download.id download 
										from ebook join penerbit on ebook.penerbit_id = penerbit.id 
										join kategori on ebook.kategori_id = kategori.id join download 
										on ebook.id=download.ebook_id) A group by  id, judul, deskripsi, penerbit, kategori, rekomended, tahun_terbit, penulis,  
										gambar order by jumlah DESC Limit 0, 20";
				$rs = mysqli_query($koneksi, $sqlx);
				foreach($rs as $row)
				{
			    ?>
					<tr>
					  <td><?php echo $no; ?></td>
					  <td><?php echo $row['judul']; ?></td>
					  <td><?php echo $row['penerbit']; ?></td>
					  <td><?php echo $row['penulis']; ?></td>
					  <?php
						if($row['rekomended']=='1')
						{
					  ?>
					  <td>Recomended</td>
					  <?php
						}
						else
						{
					  ?>
						<td></td>
					  <?php
						}
					  ?>
					  <td><?php echo $row['tahun_terbit']; ?></td>
					  <td><?php echo $row['kategori']; ?></td>
					  <?php 
						if($row['gambar'])
						{
					  ?>
					  <td><img src="<?php echo $url;?>images/ebook/<?php echo $row['gambar']; ?>" width='50px' height='50px'></td>
					  <?php
						}
						else
						{
					  ?>
					  <td><img src="<?php echo $url;?>images/empty-file.jpg" width='50px' height='50px'></td>
					  <?php
						}
					  ?>
					</tr>
				<?php
					$no++;
				}
				?>
                </tbody>
                <tfoot>
                <tr>
                  <th>No.</th>
                  <th>Title</th>
				  <th>Publisher</th>
				  <th>Author</th>
				  <th>Recomended</th>
				  <th>Tahun</th>
				  <th>Kategori</th>
                  <th>Pict</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
	
  </div>
  <!-- /.content-wrapper -->

>

  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2020 <a href="#">Digital Library</a>.</strong> All rights
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.0.4
    </div>
  </footer>
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
 </div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="dist/js/demo.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="plugins/raphael/raphael.min.js"></script>
<script src="plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- DataTables -->
<script src="<?php echo $url ?>admin/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo $url ?>admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo $url ?>admin/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo $url ?>admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- PAGE SCRIPTS -->
<script src="dist/js/pages/dashboard2.js"></script>


<script>
  $(function () {
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */

    //--------------
    //- AREA CHART -
    //--------------

    // Get context with jQuery - using jQuery's .get() method.

    var areaChartData = {
      labels  : [
					<?php 
						$sql = "select * from kategori order by id";
						$sqlx = mysqli_query($koneksi, $sql);
						foreach($sqlx as $row)
						{
					?>
					'<?php echo $row['nama']; ?>',
					<?php
						}
					?>
					
				],
      datasets: [
        {
          label               : 'Download Category',
          backgroundColor     : 'rgba(10,110,110,4)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [
									<?php
										$sqlz = "select count(*) jumlah, ebook.kategori_id, kategori.nama from download 
												join ebook on download.ebook_id=ebook.id join 
												kategori on ebook.kategori_id=kategori.id 
												group by  ebook.kategori_id,kategori.nama order by kategori.id";
										$result = mysqli_query($koneksi, $sqlz);
										foreach($result as $rowx)
										{
											if($rowx['jumlah']){
												echo $rowx['jumlah'];
											}
											else
											{
												echo '0';
											}
									?>
									,
										<?php } ?>
								]
        },
      ]
    }


    //-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas = $('#barChart').get(0).getContext('2d')
    var barChartData = jQuery.extend(true, {}, areaChartData)
    var temp0 = areaChartData.datasets[0]

    barChartData.datasets[0] = temp0


    var barChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      datasetFill             : false
    }

    var barChart = new Chart(barChartCanvas, {
      type: 'bar', 
      data: barChartData,
      options: barChartOptions
    })
  })
</script>
</body>
</html>
