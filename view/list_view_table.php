<!DOCTYPE html>
<html lang="zxx">
    

	<?php 
		include "header.php"; 
		$kode 	  = "";
		$kategori = "";
		$keyword  = "";
		if(isset($_GET['kode'])){
			$kode = $_GET['kode'];
		}
		if(isset($_GET['kategori'])){
			$kategori = $_GET['kategori'];
		}
        if(isset($_GET['sub_kategori'])){
			$sub_kategori = $_GET['sub_kategori'];
		}
		if(isset($_GET['keyword'])){
			$keyword = $_GET['keyword'];
		}
	?>

	
    <body>
		<?php include "header_section_detail.php"; ?>
		
        <!-- Start: Page Banner -->
        <section class="page-banner services-banner">
            <div class="container">
                <div class="banner-header">
                    <h2>E-Books Listing</h2>
                    <span class="underline center"></span>
                    <p class="lead"></p>
                </div>
                <div class="breadcrumb">
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li>E-Books Listing</li>
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
                                    <h3>Ingin cari dengan kriteria "Sub Kategori" ?</h3>
                    <form action="<?php echo $url; ?>control/search2.php" method="POST">
                        <div class="col-md-10 col-sm-6">
                            <div class="form-group">
                                <select name="sub_kategori">
                                <?php
                                $koneksi = mysqli_connect("localhost",'root',"","digital_library");
                                if (!$koneksi){
                                die("Koneksi database gagal:".mysqli_connect_error());
                                }
                                $sql="select * from sub_kategori";
                                    $hasil=mysqli_query($koneksi,$sql);
                                    $no=0;
                                while ($data = mysqli_fetch_array($hasil)) {
                                $no++;
                                ?>
                                <option value="<?php echo $data['id'];?>"><?php echo $data['nama'];?></option>
                                <?php } ?>
                                </select>
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
									<?php if($kode=='1')
											{
											?>
                                            <a href="list_view.php?kode=<?php echo $kode; ?>" ><i class="fa fa-th-large"></i></a>
                                            <a href="list_view_table.php?kode=<?php echo $kode; ?>" class="active"><i class="fa fa-th-list"></i></a>											
											<?php
											}
											 elseif($kode=='2')
											{
											?>
                                            <a href="list_view.php?kode=<?php echo $kode; ?>" ><i class="fa fa-th-large"></i></a>
                                            <a href="list_view_table.php?kode=<?php echo $kode; ?>"  class="active" ><i class="fa fa-th-list"></i></a>											
											<?php
											}
											 elseif($kode=='3')
											{
											?>
                                            <a href="list_view.php?kode=<?php echo $kode; ?>"  ><i class="fa fa-th-large"></i></a>
                                            <a href="list_view_table.php?kode=<?php echo $kode; ?>" class="active"><i class="fa fa-th-list"></i></a>											
											<?php
											}
											 elseif($kode=='4')
											{
											?>
                                            <a href="list_view.php?kode=<?php echo $kode; ?>&kategori=<?php echo $kategori; ?>"  ><i class="fa fa-th-large"></i></a>
                                            <a href="list_view_table.php?kode=<?php echo $kode; ?>&kategori=<?php echo $kategori; ?>" class="active"><i class="fa fa-th-list"></i></a>											
											<?php
											}
											 elseif($kode=='5')
											{
											?>
                                            <a href="list_view.php?kode=<?php echo $kode; ?>&keyword=<?php echo $keyword; ?>"  ><i class="fa fa-th-large"></i></a>
                                            <a href="list_view_table.php?kode=<?php echo $kode; ?>&keyword=<?php echo $keyword; ?>" class="active"><i class="fa fa-th-list"></i></a>										
                                    
                                            <?php
											}
											 elseif($kode=='6')
											{
											?>
                                            <a href="list_view.php?kode=<?php echo $kode; ?>&sub_kategori=<?php echo $sub_kategori; ?>"  ><i class="fa fa-th-large"></i></a>
                                            <a href="list_view_table.php?kode=<?php echo $kode; ?>&sub_kategori=<?php echo $sub_kategori; ?>" class="active"><i class="fa fa-th-list"></i></a>	
											<?php
											}
											?>
								</div>
							</div>
						  
							<div class="col-12">
						   
							  <!-- /.card -->

							  <div class="card">
								<div class="card-header">
								  <i class='btn btn-primary btn-xs' title='E-Book Listing'><font size='4'>E-Book Listing</font></i>
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
									  <th>Tahun</th>
									  <th>Kategori</th>
									  <th>Sub Kategori</th>
									  <th style='width:50px'>Action</th>
									</tr>
									</thead>
									<tbody>
									<?php
										if($kode=='1'){
											$sql="SELECT COUNT(*) jumlah, id, judul, deskripsi, penulis, gambar, tahun_terbit, penerbit, 
												kategori FROM (SELECT ebook.id, ebook.judul, ebook.deskripsi, 
												ebook.penulis, ebook.gambar, ebook.kode_ebook, ebook.isbn, ebook.tahun_terbit, 
												penerbit.nama penerbit, kategori.nama kategori, download.id download_id, download.tanggal, 
												download.user_id FROM ebook JOIN kategori ON ebook.kategori_id=kategori.id 
												JOIN penerbit ON ebook.penerbit_id=penerbit.id JOIN download ON download.ebook_id=ebook.id) 
												as A GROUP by  id, judul, deskripsi, penulis, gambar, tahun_terbit, penerbit, kategori
												ORDER BY jumlah DESC Limit 0, 20";
										}
										elseif($kode=='2'){
											$sql="select ebook.*, penerbit.nama penerbit, kategori.nama kategori 
											from ebook join penerbit on ebook.penerbit_id = penerbit.id 
											join kategori on ebook.kategori_id = kategori.id order by ebook.id desc";
										}
										elseif($kode=='3'){
											$sql="select ebook.*, penerbit.nama penerbit, kategori.nama kategori 
											from ebook join penerbit on ebook.penerbit_id = penerbit.id 
											join kategori on ebook.kategori_id = kategori.id  where rekomended='1' ORDER BY id DESC";
										}
										elseif($kode=='4'){
											$sql="select ebook.*, penerbit.nama penerbit, kategori.nama kategori 
											from ebook join penerbit on ebook.penerbit_id = penerbit.id 
											join kategori on ebook.kategori_id = kategori.id where kategori_id=$kategori ORDER BY id DESC";
										}
										elseif($kode=='5'){
											$sql="select ebook.*, penerbit.nama penerbit, kategori.nama kategori 
												from ebook join penerbit on ebook.penerbit_id = penerbit.id 
												join kategori on ebook.kategori_id = kategori.id 
												where upper(ebook.judul) like upper('%$keyword%') OR 
												upper(ebook.penulis) like upper('%$keyword%') OR 
												upper(penerbit.nama) like upper('%$keyword%') OR 
												upper(kategori.nama) like upper('%$keyword%') OR 
												upper(ebook.deskripsi) like upper('%$keyword%') 
												ORDER BY id DESC";
										}
                                        elseif($kode=='6'){
											$sql="select ebook.*, penerbit.nama penerbit, kategori.nama kategori 
											from ebook join penerbit on ebook.penerbit_id = penerbit.id 
											join sub_kategori on ebook.sub_id = sub_kategori.id where sub_id=$sub_kategori ORDER BY id DESC";
										}
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
										  <td><?php echo $rowx['tahun_terbit']; ?></td>
										  <td><?php echo $rowx['kategori']; ?></td>
										  <td><?php echo $rowx['sub_kategori']; ?></td>
										  
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
												
													<a title="bookmark"href="<?php echo $url; ?>control/bookmark.php?ebook=<?php echo $rowx['id'];?>&user=<?php echo $user;?>&page=list_view_table&action=1&kode=<?php echo $kode;?>&kategori=<?php echo $kategori;?>&keyword=<?php echo $keyword;?>">
													<i class="fa fa-bookmark fa-lg"></i>
													</a>

												
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
									  <th>Tahun</th>
									  <th>Kategori</th>
									  <th>Sub Kategori</th>
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