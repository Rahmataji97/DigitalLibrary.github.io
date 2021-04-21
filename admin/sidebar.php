<!-- Main Sidebar Container -->
  <?php
	$menu=$_SESSION['menu'];
	$posisi=$_SESSION['posisi'];
	$userid=$_SESSION['userid'];
	$gambar='';
	if(!empty($_SESSION['gambar'])){
		$gambar=$_SESSION['gambar'];
	}
  ?>
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo $url; ?>admin/index.php" class="brand-link">
      <img src="<?php echo $url ?>admin/dist/img/unas.png" alt="unas Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">UNAS Digital Library</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
			<?php
		  if($gambar!=''){
			  ?>
			  <img src="<?php echo $url ?>images/user/<?php echo $gambar;?>" class="img-circle elevation-2" alt="User Image">
		<?php
		  }
		  else{
		?>
          <img src="<?php echo $url ?>admin/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
		<?php
		  }
		?>
        </div>
        <div class="info">
          <a href="<?php echo $url; ?>admin/pages/user/user_ubah.php?id=<?php echo $userid; ?>" class="d-block"><?php echo $name; ?></a>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="<?php echo $url ?>admin/index.php" class="nav-link <?php if($menu=='home'){?> active <?php } ?>">
              <i class="nav-icon fas fa-desktop"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo $url ?>admin/pages/penerbit/penerbit.php"  class="nav-link <?php if($menu=='penerbit'){?> active <?php } ?>">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Publisher
              </p>
            </a>
          </li>
		  <li class="nav-item">
            <a href="<?php echo $url ?>admin/pages/kategori/kategori.php" class="nav-link <?php if($menu=='kategori'){?> active <?php } ?>">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Category
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo $url ?>admin/pages/sub_kategori/sub_kategori.php" class="nav-link <?php if($menu=='sub_kategori'){?> active <?php } ?>">
              <i class="nav-icon fas fa-paste"></i>
              <p>
                Sub Category
              </p>
            </a>
          </li>
		  <li class="nav-item">
            <a href="<?php echo $url ?>admin/pages/ebook/ebook.php" class="nav-link <?php if($menu=='ebook'){?> active <?php } ?>">
              <i class="nav-icon fas fa-book"></i>
              <p>
                E-Books
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo $url ?>admin/pages/download/download_history.php" class="nav-link <?php if($menu=='download'){?> active <?php } ?>">
              <i class="nav-icon fas fa-download"></i>
              <p>
                Download History
              </p>
            </a>
          </li>
		  <li class="nav-item">
            <a href="<?php echo $url ?>admin/pages/pesan/pesan.php" class="nav-link <?php if($menu=='pesan'){?> active <?php } ?>">
              <i class="nav-icon fas fa-envelope"></i>
              <p>
                Message
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo $url ?>admin/pages/user/user.php" class="nav-link <?php if($menu=='user'){?> active <?php } ?>">
              <i class="nav-icon far fa-user-circle"></i>
              <p>
                User
              </p>
            </a>
          </li>
		  <li class="nav-item">
            <a href="<?php echo $url; ?>control/con_logout.php" class="nav-link">
              <i class="nav-icon fas fa-arrow-left"></i>
              <p>
                Logout
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>