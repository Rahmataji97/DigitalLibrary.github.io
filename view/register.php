<html lang="zxx">
<?php 
    include "header.php"; 
?>
<body>
<?php include "header_section_detail.php"; ?>
<section class="page-banner services-banner">
    <div class="container">
        <div class="banner-header">
            <h2>.: Form Register :.</h2>
            <span class="underline center"></span>
            <p class="lead">Register Member.</p>
        </div>
        <div class="breadcrumb">
            <ul>
            <li><a href="index-2.html">Home</a></li>
            <li>Form Register</li>
            </ul>
        </div>
    </div>
</section>	
    <div id="content" class="site-content">
    <div id="primary" class="content-area">
        <main id="main" class="site-main">
    <div class="booksmedia-detail-main">
    <div class="container">
    <div class="row">
<section class="search-filters">
    <div class="container">
    <div class="filter-box">
        <h3>Please Register, For Download E-Book From Digital Library</h3>
    </div>
    </div>
</section>
    </div>
    <div class="booksmedia-detail-box">
    <div class="container-fluid">
    <div class="row">
    <div class="col-md-6">
    <div class="card card-primary">
        <form method="post" action="<?php echo $url;?>control/user/con_user_tambah.php?action=1" enctype="multipart/form-data">
    <div class="card-body">
    <div class="form-">
        <label for="exampleInputFile">Full Name</label>
        <input type="text" class="form-control" id="nama" name="nama" placeholder="name" required>
    </div><br/>
    <div class="form-group">
        <label for="exampleInputFile">User ID</label><br/>
        <input type="text" class="form-control" id="user_name" name="user_name" placeholder="user name" required>
    </div><br/>
    <div class="form-group">
        <label for="exampleInputFile">Password</label><br/>
        <input type="password" class="form-password" name="pass" placeholder="password" required>
        <input type="checkbox" class="form-checkbox"> Show password
    </div><br/>
    <div class="form-group">
        <label for="exampleInputFile">Retype Password</label><br/>
        <input type="password" class="form-pass" name="pass2" placeholder="retype password" required>
    </div><br/>
    <div class="form-group">
        <label for="exampleInputFile">Pict.</label><br/>
        <input type="file" name="gambar">
    </div><br/>
    <div class="form-group">
        <input type="hidden" class="form-control" name="posisi" value="anggota">
    </div><br/>
    </div>
    <div class="form-group">   
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
        </form>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
        </main>
    </div>
    </div>
<?php include "footer.php"; ?>
<script type="text/javascript">
		$(document).ready(function(){		
        $('.form-checkbox').click(function(){
    if($(this).is(':checked')){
        $('.form-password').attr('type','text');
    }else{
        $('.form-password').attr('type','password');
    }});
});
</script>
</body>
<html>