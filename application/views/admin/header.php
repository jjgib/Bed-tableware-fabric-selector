<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
      
    <title>Admin - <?php echo $title;?></title> 
	<meta name="robots" content="noimageindex, nofollow, nosnippet">
    <link href="<?php echo base_url();?>assets/css/bootstrap.css" rel="stylesheet">
	 <link href="<?php echo base_url();?>assets/style.css" rel="stylesheet">
	 <link href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap4.css" rel="stylesheet">
  </head>
  <body class="admin_body">
  <div class="container dashboard"> 
	<nav class="navbar navbar-dark bg-dark">
	  <a class="navbar-brand" href="#">ADMIN</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	  </button>
	  <div class="collapse navbar-collapse" id="navbarText">
		<ul class="navbar-nav mr-auto">
		  <li class="nav-item active">
			<a class="nav-link" href="<?php echo base_url();?>index.php/admin">Add Product</a>
		  </li>
		  <!---<li class="nav-item">
			<a class="nav-link" href="<?php echo base_url();?>index.php/admin/csv_import">Add CSV</a>
		  </li>-->
		</ul>
		<!---<span class="navbar-text">
		  Navbar text with an inline element
		</span>-->
	  </div>
	</nav>