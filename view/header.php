<?php
	session_start();
	include "../config/koneksi.php";
	$username 	= "";
	$name 		= "";
	$log 		= "";
	$pos		= "";
	if (isset($_SESSION['status']))
	{
		if($_SESSION['status'] =="login")
		{
			$username 	= $_SESSION['username'];
			$name 		= $_SESSION['name'];
			$log 		= $_SESSION['status'];
			$pos		= $_SESSION['posisi'];
			$userid     = $_SESSION['userid'];
		}
	}
?>

	<head>

        <!-- Meta -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1">

        <!-- Title -->
        <title>UNAS Digital Library</title>

        <!-- Favicon -->
        <link href="<?php echo $url ?>images/unas.png" rel="icon" type="image/x-icon" />

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i%7CLato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet" />
        <link href="<?php echo $url ?>css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        
        <!-- Mobile Menu -->
        <link href="<?php echo $url ?>css/mmenu.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $url ?>css/mmenu.positioning.css" rel="stylesheet" type="text/css" />

        <!-- Stylesheet -->
        <link href="<?php echo $url ?>css/style.css" rel="stylesheet" type="text/css" />

		  <!-- DataTables -->
		<link rel="stylesheet" href="<?php echo $url ?>admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
		<link rel="stylesheet" href="<?php echo $url ?>admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="<?php //echo $url ?>js/html5shiv.min.js"></script>
        <script src="<?php //echo $url ?>js/respond.min.js"></script>
        <![endif]-->

    </head>