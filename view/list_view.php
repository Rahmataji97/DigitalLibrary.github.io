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
                            
                            <div class="filter-options margin-list">
                                <div class="row">                                            
                                    
                                    <div class="col-md-2 col-sm-12 pull-right">
                                        <div class="filter-toggle">
											<?php if($kode=='1')
											{
											?>
                                            <a href="list_view.php?kode=<?php echo $kode; ?>"  class="active"><i class="fa fa-th-large"></i></a>
                                            <a href="list_view_table.php?kode=<?php echo $kode; ?>" ><i class="fa fa-th-list"></i></a>											
											<?php
											}
											 elseif($kode=='2')
											{
											?>
                                            <a href="list_view.php?kode=<?php echo $kode; ?>"  class="active"><i class="fa fa-th-large"></i></a>
                                            <a href="list_view_table.php?kode=<?php echo $kode; ?>" ><i class="fa fa-th-list"></i></a>											
											<?php
											}
											 elseif($kode=='3')
											{
											?>
                                            <a href="list_view.php?kode=<?php echo $kode; ?>"  class="active"><i class="fa fa-th-large"></i></a>
                                            <a href="list_view_table.php?kode=<?php echo $kode; ?>" ><i class="fa fa-th-list"></i></a>											
											<?php
											}
											 elseif($kode=='4')
											{
											?>
                                            <a href="list_view.php?kode=<?php echo $kode; ?>&kategori=<?php echo $kategori; ?>"  class="active"><i class="fa fa-th-large"></i></a>
                                            <a href="list_view_table.php?kode=<?php echo $kode; ?>&kategori=<?php echo $kategori; ?>" ><i class="fa fa-th-list"></i></a>											
											<?php
											}
											 elseif($kode=='5')
											{
											?>
                                            <a href="list_view.php?kode=<?php echo $kode; ?>&keyword=<?php echo $keyword; ?>"  class="active"><i class="fa fa-th-large"></i></a>
                                            <a href="list_view_table.php?kode=<?php echo $kode; ?>&keyword=<?php echo $keyword; ?>" ><i class="fa fa-th-list"></i></a>				
                                            <?php
											}
											 elseif($kode=='6')
											{
											?>
                                            <a href="list_view.php?kode=<?php echo $kode; ?>&sub_kategori=<?php echo $keyword; ?>"  class="active"><i class="fa fa-th-large"></i></a>
                                            <a href="list_view_table.php?kode=<?php echo $kode; ?>&sub_kategori=<?php echo $keyword; ?>" ><i class="fa fa-th-list"></i></a>
											<?php
											}
											?>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="booksmedia-fullwidth">
                                <ul>
								<?php
								
									$batas   = 9;
									$halaman = @$_GET['halaman'];
									if(empty($halaman)){
										$posisi  = 0;
										$halaman = 1;
									}
									else{
										$posisi  = ($halaman-1) * $batas;
									}

									$no = $posisi+1;
								
									if($kode=='1'){
										$sql="SELECT COUNT(*) jumlah, id, judul, deskripsi, penulis, gambar, tahun_terbit, penerbit, 
												kategori FROM (SELECT ebook.id, ebook.judul, ebook.deskripsi, 
												ebook.penulis, ebook.gambar, ebook.kode_ebook, ebook.isbn, ebook.tahun_terbit, 
												penerbit.nama penerbit, kategori.nama kategori, download.id download_id, download.tanggal, 
												download.user_id FROM ebook JOIN kategori ON ebook.kategori_id=kategori.id 
												JOIN penerbit ON ebook.penerbit_id=penerbit.id JOIN download ON download.ebook_id=ebook.id) 
												as A GROUP by  id, judul, deskripsi, penulis, gambar, tahun_terbit, penerbit, kategori
												ORDER BY jumlah DESC Limit $posisi, $batas";
									}
									elseif($kode=='2'){
										$sql="select * from ebook order by id desc Limit $posisi, $batas";
									}
									elseif($kode=='3'){
										$sql="select * from ebook where rekomended='1' ORDER BY id DESC Limit $posisi, $batas";
									}
									elseif($kode=='4'){
										$sql="select * from ebook where kategori_id=$kategori ORDER BY id DESC Limit $posisi, $batas";
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
											ORDER BY id DESC Limit $posisi, $batas";
									}
                                    elseif($kode=='6'){
										$sql="select * from ebook where sub_id=$sub_kategori ORDER BY id DESC Limit $posisi, $batas";
									}
									$sqlexe = mysqli_query($koneksi,$sql);
									$count = mysqli_num_rows($sqlexe);
									if($count){
										 
										foreach($sqlexe as $rowx)
										{
											
								?>
                                    <li>
                                        <!--<div class="book-list-icon red-icon"></div>-->
                                        <figure>
											<?php
												if($rowx['gambar']){
											?>
												<a href="#"><img src="../images/ebook/<?php echo $rowx['gambar']; ?>" alt="Book"></a>
											<?php
												}
												else{
											?>
												<a href="#"><img src="../images/empty-file.jpg" alt="Book"></a>
											<?php
												}
											?>
                                            <figcaption>
                                                <header>
                                                    <h4><a href="#"><?php echo $rowx['judul']; ?></a></h4>
                                                    <p><strong>Author:</strong>  <?php echo $rowx['penulis']; ?></p>
                                                    <p><strong>Year:</strong>  <?php echo $rowx['tahun_terbit']; ?></p>
                                                </header>
                                                <p><?php echo substr($rowx['deskripsi'].'...',0,30); ?></p>
                                                <div class="actions">
                                                    <ul>
                                                        <li>
                                                            <a href="detail_view.php?kode=<?php echo $rowx['id']; ?>" data-toggle="blog-tags" data-placement="top" title="detail">
                                                                <i class="fa fa-file-text"></i>
                                                            </a>
                                                        </li>
														<?php 
															if($log=='login')
															{
														?>
                                                        <li>
                                                            <a href="<?php echo $url; ?>control/download.php?id=<?php echo $rowx['id'];?>&filename=<?php echo $rowx['file_upload'];?>" data-toggle="blog-tags" data-placement="top" title="download">
															<i class="fa fa-download"></i>
                                                            </a>
                                                        </li>
														<li>
                                                            <a href="<?php echo $url; ?>control/bookmark.php?ebook=<?php echo $rowx['id'];?>&user=<?php echo $user;?>&page=list_view&action=1&kode=<?php echo $kode;?>&kategori=<?php echo $kategori;?>&keyword=<?php echo $keyword;?>" data-toggle="blog-tags" data-placement="top" title="bookmark">
															<i class="fa fa-bookmark"></i>
                                                            </a>
                                                        </li>
														<?php
															}
														?>
                                                    </ul>
                                                </div>
                                            </figcaption>
                                        </figure>                                                
                                    </li>
									<?php
										}
									}
										else
										{
											 echo "<div class='banner-header'><h3>Data is Empty</h3></div>";

										}
									?>
                                    
                                </ul>
                            </div>
							<?php

									if($kode=='1'){
										$query2="SELECT COUNT(*) jumlah, id, judul, deskripsi, penulis, gambar, tahun_terbit, penerbit, 
												kategori FROM (SELECT ebook.id, ebook.judul, ebook.deskripsi, 
												ebook.penulis, ebook.gambar, ebook.kode_ebook, ebook.isbn, ebook.tahun_terbit, 
												penerbit.nama penerbit, kategori.nama kategori, download.id download_id, download.tanggal, 
												download.user_id FROM ebook JOIN kategori ON ebook.kategori_id=kategori.id 
												JOIN penerbit ON ebook.penerbit_id=penerbit.id JOIN download ON download.ebook_id=ebook.id) 
												as A GROUP by  id, judul, deskripsi, penulis, gambar, tahun_terbit, penerbit, kategori
												ORDER BY jumlah DESC";
									}
									elseif($kode=='2'){
										$query2="select * from ebook order by id desc";
									}
									elseif($kode=='3'){
										$query2="select * from ebook where rekomended='1' ORDER BY id DESC";
									}
									elseif($kode=='4'){
										$query2="select * from ebook where kategori_id=$kategori ORDER BY id DESC";
									}
									elseif($kode=='5'){
										$query2="select ebook.*, penerbit.nama penerbit, kategori.nama kategori 
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
										$query2="select * from ebook where sub_id=$sub_kategori ORDER BY id DESC";
									}
								$result 	= mysqli_query($koneksi, $query2);
								$jmldata    = mysqli_num_rows($result);
								$jmlhalaman = ceil($jmldata/$batas);
								//echo $query2;
							?>
							<nav>
							  <ul class="pagination pagination-lg">
								<?php 
									if($halaman==1)
									{
								?>
								<li class="page-item disabled">
								  <a class="page-link" href="#">Previous</a>
								</li>
								<?php
									}
									else
									{
										$prv=$halaman - 1;
								?>
								<li class="page-item">
								  <a class="page-link" href="list_view.php?halaman=<?php echo $prv;?>&kode=<?php echo $kode; ?>&kategori=<?php echo $kategori; ?>&keyword=<?php echo $keyword;?>">Previous</a>
								</li>
								<?php
									}
								for($i=1;$i<=$jmlhalaman;$i++) {
									if ($i != $halaman) {
										echo "<li class='page-item'><a class='page-link' href='list_view.php?halaman=$i&kode=$kode&kategori=$kategori&keyword=$keyword'>$i</a></li>";
									} else {
										echo "<li class='page-item active'><a class='page-link' href=''>$i</a></li>";
									}
								}
								if($halaman==$jmlhalaman)
									{
								?>
								<li class="page-item disabled">
								  <a class="page-link" href="#">Next</a>
								</li>
								<?php
									}
									else
									{
										$nxt=$halaman + 1;
								?>
								<li class="page-item">
								  <a class="page-link" href="list_view.php?halaman=<?php echo $nxt;?>&kode=<?php echo $kode; ?>&kategori=<?php echo $kategori; ?>&keyword=<?php echo $keyword;?>">Next</a>
								</li>
									<?php } ?>
							  </ul>
							</nav>
                        </div>

                    </div>
                </main>
            </div>
        </div><br/>
        <!-- End: Products Section -->

		<?php include "footer.php"; ?>

    </body>


</html>