<?php
 	include "koneksi.php";

  	$s = $_GET['s'];

  	$temp = base64_decode($s);
	$hs = (explode("&",$temp));
	
 	$username = substr($hs['0'], 0);
	$learnfile = substr($hs['1'], 0);
	$filetmp = preg_replace("/\.[^.]+$/", "", $learnfile);
	$filenx = basename($filetmp);

 	$result = mysqli_query($koneksi,"select *from user where username='$username'");
	$row = mysqli_fetch_array($result);
	$userid = $row['userid'];
	$nama = $row['nama'];
	$reward = $row['reward'];
	
	$result2 = mysqli_query($koneksi,"select *from learn where learntitle='$filenx'");
	$row2 = mysqli_fetch_array($result2);
	$owner = $row2['ownerid'];
	$watch = $row2['watch'];
	$watch = $watch + 1;			      	
	$result = mysqli_query($koneksi,"update learn set watch='$watch' where learntitle='$filenx'");

	$result3 = mysqli_query($koneksi,"select *from user where username='$owner'");
	$row3 = mysqli_fetch_array($result3);
	$idowner = $row3['userid'];
	$namaowner = $row3['nama'];
	$divowner = $row3['division'];

	$s = base64_encode($username);
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">    
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <link rel="stylesheet" href="css/bootstrap.css" media="screen">
	    <link rel="stylesheet" href="css/custom.min.css">
	    <link rel="stylesheet" href="css/material-icons.css">
	    <link rel="stylesheet" href="css/modification.css">
	    <link href="css/jumbotron.css" rel="stylesheet">
	    <link rel="icon" href="img/favicon.ico">

	    <title>Balai Besar Bahan dan Barang Teknik - KMS</title>
  	</head>

  	<body>
	    <div class="navbar navbar-expand-lg fixed-top navbar-dark bg-primary">
	      	<div class="container">
	        	<a href="main.php?s=<?php echo $s ?>" class="navbar-brand"><img src="img/logo.png" class="img-fluid" style="max-width: 20%; and height: auto"> Balai Besar Bahan dan Barang Teknik</a>

	        	<ul class="nav navbar-nav ml-auto">
		            <li class="nav-item dropdown">
					    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="" role="button" aria-haspopup="true" aria-expanded="false">Rewards: <?php echo "$reward"; ?>&nbsp;&nbsp;&nbsp;<img src="user/profile/<?php echo $userid ?>.jpg?dummy=8484744" onerror=this.src="img/default_profile.jpg" class="rounded-circle" height="25px" width="25px" /></a>
					    <div class="dropdown-menu">
					    	<a class="dropdown-item disabled">Hi, <?php echo "$nama"; ?></a>
					    	<div class="dropdown-divider"></div>
					      	<a class="dropdown-item" href="#">Edit Profile</a>
					      	<a class="dropdown-item" href="index.php">Logout</a>
					    </div>
					</li>
		        </ul>
	      	</div>
	    </div>

	   	<div class="container" style="padding-top: 50px;">
	   		<div class="row">
	   			<div class="col-sm-12">	   				
		   			<nav aria-label="breadcrumb" role="navigation">
					  	<ol class="breadcrumb">
					    	<li class="breadcrumb-item"><a href="main.php?s=<?php echo "$s"?>">Home</a></li>
					    	<li class="breadcrumb-item"><a href="learn.php?s=<?php echo "$s"?>">Learning</a></li>
					    	<li class="breadcrumb-item active" aria-current="page"><?php echo "$filenx";?></li>
					  	</ol>
					</nav>
	   			</div>				
		  	</div>
		  	<div class="row">
		  		<div class="col-sm-9">
		  			<video width="100%" poster="" controls>
					  	<source src="<?php echo "$learnfile" ?>" type="video/mp4">
					  	Your browser does not support HTML5 video.
					</video>
		  		</div>	
		  		<div class="col-sm-3">	 
			  		<div class="card text-center">
						<div class="card-body">
						    <h4 class="card-title">Video By</h4>
						   	<img src="user/profile/<?php echo $idowner ?>.jpg?dummy=8484744" onerror=this.src="img/default_profile.jpg" class="rounded-circle border border-warning" height="100px" width="100px" /></a>
						   	<br><br>
							<h5><?php echo "$namaowner"; ?></h5>
							<h5><?php echo "$divowner"; ?></h5>
							<hr>
							<h5><?php echo "$watch"; ?> Views</h5>
						</div>
					</div>
				</div>	   	
			</div>
		</div>


	    <script src="js/jquery.min.js"></script>
	    <script src="js/popper.min.js"></script>
	    <script src="js/bootstrap.js"></script>
	    <script src="js/custom.js"></script> 

	</body>
</html>