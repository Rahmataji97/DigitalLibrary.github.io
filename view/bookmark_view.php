<!DOCTYPE html>
<html lang="zxx">
    

	<?php 
		include "header.php"; 
		$user = $_SESSION['userid'];
	?>

	
    <body>
		<?php include "header_section_detail.php"; ?>
		
        <!-- Start: Page Banner -->
        <section class="page-banner services-banner">
            <div class="container">
                <div class="banner-header">
                    <h2>:: Bookmark ::</h2>
                    <span class="underline center"></span>
                    <p class="lead"></p>
                </div>
                <div class="breadcrumb">
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li>Bookmark</li>
                    </ul>
                </div>
            </div>
        </section>
        <!-- End: Page Banner -->

        <!-- Start: Products Section -->
        <div id="content" class="site-content">
            <div id="primary" class="content-area">
                <main id="main" class="site-main">
                    <div class="books-full-width">
                        <div class="container">
                            <!-- Start: Search Section -->
                            <section class="search-filters">
                                <div class="filter-box">
                                    <h3>What are you looking for e-book?</h3>
									<form action="<?php echo $url; ?>control/search.php" method="POST">
										<div class="col-md-10 col-sm-6">
											<div class="form-group">
												<label class="sr-only" for="keywords">Search by Keyword</label>
												<input class="form-control" placeholder="Search by Keyword" id="keywords" name="keywords" type="text">
											</div>
										</div>
										
										<div class="col-md-2 col-sm-6">
											<div class="form-group">
												<input class="form-control" type="submit" value="Search" >
											</div>
										</div>
									</form>
                                </div>
                                <div class="clear"></div>
                            </section>
                            <!-- End: Search Section -->
                            

						  <div class="row">
							<div class="filter-options margin-list">
								<div class="filter-toggle">
									<a href="" class="active"><i class="fa fa-th-list"></i></a>											
											
								</div>
							</div>
						  
							<div class="col-12">
						   
							  <!-- /.card -->

							  <div class="card">
								<div class="card-header">
								  <i class='btn btn-primary btn-xs' title='E-Book Listing'><font size='4'>:: Bookmark ::</font></i>
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
									  <th>ISBN</th>
									  <th>Tahun</th>
									  <th>Kategori</th>
									  <th>Tgl. Bookmark</th>
									  <th style='width:50px'>Action</th>
									</tr>
									</thead>
									<tbody>
									<?php
										$sql="select ebook.*, penerbit.nama penerbit, kategori.nama kategori, bookmark.tanggal 
										from ebook join bookmark on bookmark.ebook_id=ebook.id join penerbit on ebook.penerbit_id = penerbit.id 
										join kategori on ebook.kategori_id = kategori.id where bookmark.user_id=$user order by ebook.id desc";
										
										//echo $sql;
										
										$sqlexe = mysqli_query($koneksi,$sql);
										$count = mysqli_num_rows($sqlexe);
										if($count){
											$no = 1;
											foreach($sqlexe as $rowx)
											{
										?>
										<tr>
										  <td><?php echo $no; ?></td>
										  <td><strong><?php echo $rowx['judul']; ?></strong></td>
										  <td><?php echo $rowx['penerbit']; ?></td>
										  <td><?php echo $rowx['penulis']; ?></td>
										  <td><?php echo $rowx['isbn']; ?></td>
										  <td><?php echo $rowx['tahun_terbit']; ?></td>
										  <td><?php echo $rowx['kategori']; ?></td>
										  <td><?php echo date('d-m-Y',strtotime($rowx['tanggal'])); ?></td>
										  <td>
											<center>
												<a title='View Detail' 
													href='detail_view.php?kode=<?php echo $rowx['id']; ?>'>
													<i class="fa fa-file-text fa-lg"></i></a>
												<?php
													if($log=='login')
													{
												?>
												<a title='Download' 
													href='<?php echo $url; ?>control/download.php?id=<?php echo $rowx['id'];?>&filename=<?php echo $rowx['file_upload'];?>'>
													<i class="fa fa-download fa-lg"></i></a>
												
												<a title='Unbookmark' 
													href='<?php echo $url; ?>control/bookmark.php?ebook=<?php echo $rowx['id'];?>&user=<?php echo $user;?>&page=bookmark_view&action=0'>
													<i class="fa fa-ban  fa-lg"></i></a>
												<?php
													}
												?>
											</center>
										  </td>
										</tr>
									<?php
										$no++;
											}
										}
										
									?>
									</tbody>
									<tfoot>
									<tr>
									  <th>No.</th>
									  <th>Title</th>
									  <th>Publisher</th>
									  <th>Author</th>
									  <th>ISBN</th>
									  <th>Tahun</th>
									  <th>Kategori</th>
									  <th>Tgl. Bookmark</th>
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

                        </div>

                    </div>
                </main>
            </div>
        </div><br/><br/><br/>
        <!-- End: Products Section -->

		<?php include "footer.php"; ?>

		
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