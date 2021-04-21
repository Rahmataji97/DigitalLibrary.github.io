<!DOCTYPE html>
<html lang="zxx">
    

	<?php 
		include "header.php"; 
		$bookcode = "";
		if(isset($_GET['kode']))
		{
			$bookcode = $_GET['kode'];
		}
	?>

    <body>
		<?php include "header_section_detail.php"; ?>

        <!-- Start: Page Banner -->
        <section class="page-banner services-banner">
            <div class="container">
                <div class="banner-header">
                    <h2>E-Book Detail</h2>
                    <span class="underline center"></span>
                    <p class="lead">About E-Book Detail.</p>
                </div>
                <div class="breadcrumb">
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li>E-Book Detail</li>
                    </ul>
                </div>
            </div>
        </section>
        <!-- End: Page Banner -->

        <!-- Start: Products Section -->
        <div id="content" class="site-content">
            <div id="primary" class="content-area">
                <main id="main" class="site-main">
                    <div class="booksmedia-detail-main">
                        <div class="container">
                            <div class="row">
                                <!-- Start: Search Section -->
                                <section class="search-filters">
                                    <div class="container">
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
                                    </div>
                                </section>
                                <!-- End: Search Section -->
                            </div>
                            <div class="booksmedia-detail-box">
								<?php 
									$sql = "select ebook.*, penerbit.nama penerbit, kategori.nama kategori 
											from ebook join penerbit on ebook.penerbit_id = penerbit.id 
											join kategori on ebook.kategori_id = kategori.id 
											where ebook.id=$bookcode";
											
									$sqlexe = mysqli_query($koneksi,$sql);
									$count = mysqli_num_rows($sqlexe);
									if($count)
									{
										foreach($sqlexe as $row)
										{
								?>
                                <div class="detailed-box">    
									<div class="col-xs-12 col-sm-5 col-md-3">
                                        <div class="post-thumbnail">
											<?php 
												if($row['gambar'])
												{
											?>
                                            <img src="<?php echo $url; ?>images/ebook/<?php echo $row['gambar']; ?>" alt="Book Image">
											<?php
										}
										else
										{
										?>
											<img src="<?php echo $url; ?>images/empty-file.jpg" alt="Book Image">
										<?php
										}
										?>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-7 col-md-6">
                                        <div class="post-center-content">
                                            <h2><?php echo $row['judul']; ?></h2>
											<p><strong>E-Book Code:</strong> <?php echo $row['kode_ebook']; ?></p>
                                            <p><strong>Author:</strong> <?php echo $row['penulis']; ?></p>
                                            <p><strong>ISBN:</strong> <?php echo $row['isbn']; ?></p>
                                            <p><strong>Publisher:</strong> <?php echo $row['penerbit']; ?></p>
											<p><strong>Year:</strong> <?php echo $row['tahun_terbit']; ?></p>
                                            <p><strong>Category:</strong> <?php echo $row['kategori']; ?></p>
                                            <div class="actions">
												<?php 
													if($log=='login')
													{
												?>
                                                <ul>
                                                    <li>
                                                        <a href="<?php echo $url; ?>control/download.php?id=<?php echo $row['id'];?>&filename=<?php echo $row['file_upload'];?>" data-toggle="blog-tags" data-placement="top" title="" data-original-title="Download E-Book">
                                                            <i class="fa fa-download"></i>
                                                        </a>
                                                    </li>
                                                    
													<li>
														<a href="<?php echo $url; ?>control/bookmark.php?ebook=<?php echo $row['id'];?>&user=<?php echo $user;?>&page=detail_view&action=1&kode=<?php echo $row['id'];?>&action=1&kategori=x&keyword=x" data-toggle="blog-tags" data-placement="top" title="bookmark">
														<i class="fa fa-bookmark"></i>
														</a>
													</li>
                                                </ul>
												<?php
													}
												?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-3 ">
                                        <div class="post-right-content">
                                            <h4>Available now</h4>
											<?php
												$sqld = "select count(*) jumlah, ebook_id from download where ebook_id='$bookcode' 
														 group by ebook_id";
												$sqlresult = mysqli_query($koneksi, $sqld);
												$jml = 0;
												foreach($sqlresult as $rowd)
												{
													$jml = $rowd['jumlah'];
												}
											?>
                                            <p><strong>Total Download:</strong> <?php echo $jml; ?></p>
											
                                            <p><strong>Available On:</strong> Digital Library</p>
											
                                        </div>
                                    </div>
									
                                    <div class="clearfix"></div>
                                </div>
                                <div class="clearfix"></div>
                                <p><strong>Description:</strong> <?php echo $row['deskripsi']; ?></p>
								<?php
											}
										}
								?>
                                <div class="table-tabs" id="responsiveTabs">
                                    <ul class="nav nav-tabs">
                                        <li class="active"><b class="arrow-up"></b><a data-toggle="tab" href="#sectionB">Recomended E-Book</a></li>
                                    </ul>
									
                                    <div class="tab-content">
                                        <div id="sectionA" class="tab-pane fade in active">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Title E-Book</th>
                                                        <th>Author</th>
                                                        <th>Publisher</th>
                                                        <th>Category</th>
														<th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
													<?php 
														$sqlr = "select ebook.*, penerbit.nama penerbit, kategori.nama kategori 
															from ebook join penerbit on ebook.penerbit_id = penerbit.id 
															join kategori on ebook.kategori_id = kategori.id 
															where ebook.rekomended='1' limit 0, 10";
														$sqlexe = mysqli_query($koneksi, $sqlr);
														foreach($sqlexe as $rowz)
														{
													?>
                                                    <tr>
                                                        <td><strong><?php echo $rowz['judul']; ?></strong></td>
                                                        <td><?php echo $rowz['penulis']; ?></td>
                                                        <td><?php echo $rowz['penerbit']; ?></td>
														<td><?php echo $rowz['kategori']; ?></td>
                                                        <td>
															<a class='btn btn-success btn-xs' title='View Detail' 
															href='<?php echo $url;?>view/detail_view.php?kode=<?php echo $rowz["id"]; ?>'>
															<i class="fa fa-file-text-o"></i></a>
															<?php 
																if($log=='login'){
															?>
															<a class='btn btn-primary btn-xs' title='download' 
															href='<?php echo $url; ?>control/download.php?id=<?php echo $rowz['id'];?>&filename=<?php echo $rowz['file_upload'];?>'>
															<i class="fa fa-download"></i></a>
															
															
                                                            <a class='btn btn-danger btn-xs' href="<?php echo $url; ?>control/bookmark.php?ebook=<?php echo $rowz['id'];?>&user=<?php echo $user;?>&page=detail_view&action=1&kode=<?php echo $rowz['id'];?>&action=1&kategori=x&keyword=x" title="bookmark">
															<i class="fa fa-bookmark"></i>
                                                            </a>
                                                        
															<?php
																}
															?>
														</td> 														
                                                    </tr>
                                                    <?php
														}
													?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <!-- End: Products Section -->
        <div class="booksmedia-fullwidth">
            <div class="container">
                <h2 class="section-title text-center">Popular Download</h2>
                    <span class="underline center"></span>
                    <p class="lead text-center">Most downloaded e-books.</p>
                        <ul class="popular-items-detail-v2">
							<?php 
								$sqlx = "select Count(*) jumlah, id, judul, deskripsi, penerbit, kategori, tahun_terbit, penulis, gambar  
										from (select ebook.*, penerbit.nama penerbit, kategori.nama kategori, download.id download 
										from ebook join penerbit on ebook.penerbit_id = penerbit.id 
										join kategori on ebook.kategori_id = kategori.id join download 
										on ebook.id=download.ebook_id) A group by  id, judul, deskripsi, penerbit, kategori, tahun_terbit, penulis,  
										gambar order by jumlah DESC Limit 0, 6";
								$rs = mysqli_query($koneksi, $sqlx);
								foreach($rs as $rowc)
								{
							?>
                            <li>
                                <figure>
									<?php 
										if($rowc['gambar'])
										{
									?>
                                    <img src="<?php echo $url; ?>images/ebook/<?php echo $rowc['gambar'];?>" alt="Book">
									<?php
										}
										else
										{
									?>
									<img src="<?php echo $url; ?>images/empty-file.jpg" alt="Book">
									<?php
										}
									?>
                                    <figcaption>
                                        <header>
                                            <h4><a href="#"><?php echo $rowc['judul']; ?></a></h4>
                                            <p><strong>Author:</strong>  <?php echo $rowc['penulis']; ?></p>
                                            <p><strong>Penerbit:</strong>  <?php echo $rowc['penerbit']; ?></p>
											<p><strong>Year:</strong>  <?php echo $rowc['tahun_terbit']; ?></p>
                                        </header>
                                        <p><?php $rowc['deskripsi'];?> </p>
                                        <div class="actions">
                                            <ul>
                                                <li>
                                                    <a href="detail_view.php?kode=<?php echo $rowc['id']; ?>" data-toggle="blog-tags" data-placement="top" title="View Detail">
                                                        <i class="fa fa-file-text-o"></i>
                                                    </a>
                                                </li>
												<?php
													if($log=='login')
													{
												?>
                                                <li>
                                                    <a href="<?php echo $url; ?>control/download.php?id=<?php echo $rowc['id'];?>&filename=<?php echo $rowc['file_upload'];?>" data-toggle="blog-tags" data-placement="top" title="Download">
                                                        <i class="fa fa-file-download"></i>
                                                    </a>
                                                </li>
												
												<li>
													<a href="<?php echo $url; ?>control/bookmark.php?ebook=<?php echo $rowc['id'];?>&user=<?php echo $user;?>&page=detail_view&kode=<?php echo $rowc['id'];?>&action=1&kategori=x&keyword=x" data-toggle="blog-tags" data-placement="top" title="bookmark">
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
							?>
                        </ul>
            </div>
        </div>
		<?php include "footer.php"; ?>

    </body>
</html>