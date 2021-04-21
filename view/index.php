<!DOCTYPE html>
<html lang="zxx">
	<?php 
		include "header.php"; 
	?>
    <body class="layout-v2">
        <?php include "header_section.php"; ?>
	        <!-- Start: Slider Section -->
        <div data-ride="carousel" class="carousel slide" id="home-v1-header-carousel">
            <!-- Carousel slides -->
            <div class="carousel-inner">
                <div class="item active">
                    <figure>
                        <img alt="Home Slide" src="<?php echo $url ?>images/header-slider/home-v2/slide1.jpg" />
                    </figure>
                    <div class="container">
                        <div class="carousel-caption">
                            <h3>Universitas Nasional Digital Library</h3>
                            <h2>Perpustakaan Dalam Genggaman</h2>
                            <p>Cukup Gerakkan Jari Anda</p>
                            
                        </div>
                    </div>
                </div>
                <div class="item">
                    <figure>
                        <img alt="Home Slide" src="<?php echo $url ?>images/header-slider/home-v2/slide2.jpg" />
                    </figure>
                    <div class="container">
                        <div class="carousel-caption">
                            <h3>Desain Aplikasi Menarik dan Menyenangkan</h3>
                            <h2>Membaca Semakin Mudah</h2>
                            <p>Baca buku, download koleksi bacaan dan bersosialisasi secara bersamaan. Di mana pun, kapan pun dengan nyaman bersama setiap orang.</p>
                            
                        </div>
                    </div>
                </div>
                <div class="item">
                    <figure>
                        <img alt="Home Slide" src="<?php echo $url ?>images/header-slider/home-v2/slide3.jpg" />
                    </figure>
                    <div class="container">
                        <div class="carousel-caption">
                            <h3>Kami menawarkan berbagai fitur sosial yang dirancang untuk kamu semua
                            terutama yang berjiwa muda.</h3>
                            <h2>Tetap Terhubung</h2>
                            <p>Dapatkan kumpulan eBooks yang terbaik dan nikmati kemudahan membaca dengan fitur yang menyenangkan. Jadi tunggu apa lagi, :-)</p>
                            
                        </div>
                    </div>
                </div>
            </div>
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#home-v2-header-carousel" data-slide-to="0" class="active"></li>
                <li data-target="#home-v1-header-carousel" data-slide-to="1"></li>
                <li data-target="#home-v1-header-carousel" data-slide-to="2"></li>
            </ol>
        </div>
        <!-- End: Slider Section -->

        <!-- Start: Search Section -->
        <section class="search-filters">
            <div class="container">
                <div class="filter-box">
                    <h3>Apa yang kamu cari ?</h3>
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
            </div>
        </section>
        <!-- End: Search Section -->

        <!-- Start: Features -->
        <section class="features ">
            
                <ul>
                    <li class="violet-hover">
                        <div class="feature-box">
                            <i class="light-green"></i>
							<img src="<?php echo $url ?>images/icon-ebooks.png" width="48px" height="48px" style="display: block; margin: auto;"><br/>
                            <h3>Popular Downnload</h3>
                            <a class="light-green" href="<?php echo $url ?>view/list_view.php?kode=1">
                                View Selection <i class="fa fa-long-arrow-right"></i>
                            </a>
                        </div>
                    </li>
					
                    <li class="violet-hover">
                        <div class="feature-box">
                            <i class="red"></i>
							<img src="<?php echo $url ?>images/icon-magazine.png" width="48px" height="48px" style="display: block; margin: auto;"><br/>
                            <h3>List Article</h3>
                            <a class="red" href="<?php echo $url ?>view/list_view.php?kode=2">
                                View Selection <i class="fa fa-long-arrow-right"></i>
                            </a>
                        </div>
                    </li>
					<li class="violet-hover">
                        <div class="feature-box">
                            <i class="blue"></i>
							<img src="<?php echo $url ?>images/icon-eaudio.png" width="48px" height="48px" style="display: block; margin: auto;"><br/>
                            <h3>Recomended</h3>
                            <a class="blue" href="<?php echo $url ?>view/list_view.php?kode=3">
                                View Selection <i class="fa fa-long-arrow-right"></i>
                            </a>
                        </div>
                    </li>
                </ul>

        </section>
        <!-- End: Features -->

        <!-- Start: Category Filter -->
        <section class="category-filter section-padding">
            <div class="container">
                <div class="row">
                    <div class="center-content">
                        <h2>Check Out The New Releases
                        <span class="underline center"></span>
                        <p class="lead">Check Out The New Releases.</p></h2>
                    </div>
                    <div class="filter-buttons">
                        <div class="filter btn" data-filter="all">All New Releases</div>
                    </div>
                    <div id="category-filter">
                        <ul class="category-list">
						<?php 
							
								$vsql = "select * from ebook order by id desc limit 0,12";
								$vx	  = mysqli_query($koneksi, $vsql);
								foreach($vx as $rowd)
								{
						?>
                            <li class="category-item all">
                                <figure>
									<?php 
										if($rowd['gambar']){
									?>
                                    <img src="<?php echo $url ?>images/ebook/<?php echo $rowd['gambar']; ?>" alt="New Releaase" />
									<?php
										}
										else
										{
									?>
									<img src="<?php echo $url ?>images/empty-file.jpg" alt="New Releaase" />
									<?php
										}
									?>
                                    <figcaption class="bg-yellow">
                                        <div class="diamond">
                                            <i class="book"></i>
                                        </div>
                                        <div class="info-block">
                                            <h4><?php echo $rowd['judul']; ?></h4>
											<span class="author"><strong>Author:</strong> <?php echo $rowd['penulis']; ?></span>
                                            <span class="author"><strong>ISBN:</strong> <?php echo $rowd['isbn']; ?></span>
											<span class="author"><strong>Code:</strong> <?php echo $rowd['kode_ebook']; ?></span>
                                     
                                            <p><?php echo substr($rowd['deskripsi'].'...',0,30) ?></p>
                                            <a href="<?php echo $url ?>view/detail_view.php?kode=<?php echo $rowd['id']; ?>">More Detail <i class="fa fa-long-arrow-right"></i></a>
                                        </div>
                                    </figcaption>
                                </figure>
                            </li>
							<?php
								}
							?>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Start: Category Filter -->

        <!-- Start: Welcome Section -->
        <section class="welcome-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="welcome-wrap">
                            <div class="welcome-text">
                                <h2 class="section-title">Jadilah Pribadi yang Kreatif dan Inovatif</h2>
                                <span class="underline left"></span>
                                <p>Selamat datang di Situs Perpustakaan Digital Universitas Nasional, perpustakaan buku elektronik atau e-book yang dapat Anda unduh.</p>
								<p>Anda dapat memilih kategori apa saja sesuai dengan bidang fakultas dan tema yang ingin Anda baca, ada berbagai macam pengetahuan yang bisa diambil di sini.</p>
								<p>Telusuri dan temukan bacaan yang Kamu inginkan. Jalin pertemanan dan saling berbagi buku yang kamu rekomendasikan.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="welcome-image">
                            <img src="<?php echo $url ?>images/hp1.png" class="algin-right" alt="" />
                             <img src="<?php echo $url ?>images/hp.png" class="algin-right" alt="" />
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End: Welcome Section -->

		<?php include "footer.php" ?>
    </body>
	

</html>