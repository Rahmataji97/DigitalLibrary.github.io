<!DOCTYPE html>
<?php 
	
	session_start(); 
	include "../../../config/koneksi.php";
	$username 	= '';
	$name 		= '';
	$log 		= '';
	$pos		= '';
	if (isset($_SESSION['status']))
	{
		if($_SESSION['status'] !="login")
		{
			header("Location: ".$url."view/login");
		}
		else
		{
			$username 	= $_SESSION['username'];
			$name 		= $_SESSION['name'];
			$log 		= $_SESSION['status'];
			$pos		= $_SESSION['posisi'];
			$_SESSION['menu'] = 'ebook';
			if($pos!="admin")
			{
				header("Location: ".$url."view/login");
			}
		}
	}
	else
	{
		header("Location: ".$url."view/login");
	}
?>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Digital Library | Category</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo $url ?>admin/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo $url ?>admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo $url ?>admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo $url ?>admin/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
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

 <?php include ("../../sidebar.php"); ?>
 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>E-Book</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo $url; ?>admin/index.php">Home</a></li>
              <li class="breadcrumb-item active">E-Book</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
       
          <!-- /.card -->

          <div class="card">
            <div class="card-header">
			  <a class='btn btn-primary btn-xs' title='Add Data' href='ebook_tambah.php'><font size='4'>Add Data</font></a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th style='width:50px'>No.</th>
				  <th>Code</th>
                  <th>Title</th>
				  <th>Publisher</th>
				  <th>Author</th>
				  <th>Recomended</th>
				  <th>ISBN</th>
				  <th>Tahun</th>
				  <th>Kategori</th>
				  <th>Sub Kategori</th>
                  <th style='width:50px'>Pict</th>
				  <th style='width:50px'>Action</th>
                </tr>
                </thead>
                <tbody>
				<?php 
				$no=1;
				$sql = "select ebook.id, ebook.kode_ebook, ebook.judul, penerbit.nama as penerbit, ebook.penulis, ebook.rekomended,
				ebook.isbn, ebook.tahun_terbit, kategori.nama as kategori, sub_kategori.nama as sub_kategori, ebook.gambar from ebook 
						join kategori on ebook.kategori_id=kategori.id
                        join sub_kategori on ebook.sub_id=sub_kategori.id 
						join penerbit on ebook.penerbit_id=penerbit.id 
						order by ebook.judul";
				$tampil = mysqli_query($koneksi,$sql);
				foreach($tampil as $row)
				{
			    ?>
					<tr>
					  <td><?php echo $no; ?></td>
					  <td><?php echo $row['kode_ebook']; ?></td>
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
					  <td><?php echo $row['isbn']; ?></td>
					  <td><?php echo $row['tahun_terbit']; ?></td>
					  <td><?php echo $row['kategori']; ?></td>
					  <td><?php echo $row['sub_kategori']; ?></td>
					  <td><img src="<?php echo $url;?>images/ebook/<?php echo $row['gambar']; ?>" width='50px' height='50px'></td>
					  <td>
						<center>
							<a class='btn btn-success btn-xs' title='Edit Data' 
								href='<?php echo $url;?>admin/pages/ebook/ebook_ubah.php?id=<?php echo $row["id"]; ?>'>
								<i class="nav-icon fas fa-check"></i></a>
							<a class='btn btn-danger btn-xs' title='Delete Data' href='<?php echo $url;?>control/ebook/con_ebook_hapus.php?id=<?php echo $row["id"]; ?>' onclick="return confirm('Apa anda yakin untuk hapus Data ini?')"><i class="nav-icon fas fa-times"></i></a>
						 </center>
					  </td>
					</tr>
				<?php
					$no++;
				}
				?>
                </tbody>
                <tfoot>
                <tr>
                  <th>No.</th>
                  <th>Code</th>
                  <th>Title</th>
				  <th>Publisher</th>
				  <th>Author</th>
				  <th>Recomended</th>
				  <th>ISBN</th>
				  <th>Tahun</th>
				  <th>Kategori</th>
				  <th>Sub Kategori</th>
                  <th>Pict</th>
				  <th>Action</th>
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
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.0.4
    </div>
    <strong>Copyright &copy; 2020 <a href="#">Digital Library</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?php echo $url ?>admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo $url ?>admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="<?php echo $url ?>admin/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo $url ?>admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo $url ?>admin/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo $url ?>admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo $url ?>admin/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo $url ?>admin/dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false, 
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html>
