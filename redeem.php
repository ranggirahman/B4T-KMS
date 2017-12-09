<?php
/*************************************************
* Filename    : redeem.php
* Programmer  : Ranggi Rahman
* Contributor : Lingga Setyagusti
* Date        : 2017 - 11 - 28
* Email       : ranggirahman@gmail.com
* Website     : 1400707.blog.upi.edu
* Deskripsi   : User Rewards Redeem Page
*
**************************************************/

  	include "koneksi.php";

  	$s = $_GET['s'];

 	$username = base64_decode($s);
 	$result = mysqli_query($koneksi,"select *from user where username='$username'");
	$row = mysqli_fetch_array($result);

	$nama = $row['nama'];
	$division = $row['division'];
	$reward = $row['reward'];
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
					    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="" role="button" aria-haspopup="true" aria-expanded="false">Rewards: <?php echo "$reward"; ?>&nbsp;&nbsp;&nbsp;<img src="user/profile/<?php echo $username ?>.jpg?dummy=8484744" onerror=this.src="img/default_profile.jpg" class="rounded-circle" height="25px" width="25px" /></a>
					    <div class="dropdown-menu">
					    	<a class="dropdown-item disabled">Hi, <?php echo "$nama"; ?></a>
					    	<div class="dropdown-divider"></div>
					      	<a class="dropdown-item" href="edit.php?s=<?php echo "$s"?>">Edit Profile</a>
					      	<a class="dropdown-item" href="index.php">Logout</a>
					    </div>
					</li>
		        </ul>
	      	</div>
	    </div>

	   	<div class="container" style="padding-top: 50px; padding-bottom: 50px;">
	   		<div class="row">
	   			<div class="col-sm-12">	   				
		   			<nav aria-label="breadcrumb" role="navigation">
					  	<ol class="breadcrumb">
					    	<li class="breadcrumb-item"><a href="main.php?s=<?php echo "$s"?>">Home</a></li>
					    	<li class="breadcrumb-item active" aria-current="page">Redeem</li>
					  	</ol>
					</nav>
	   			</div>				
		  	</div>
		  	<div class="row">
		  		<div class="col-sm-3">	 
			  		<div class="card text-center">
			  			<div class="card-body">
			  				<i class="material-icons" style="font-size: 100px; color: darkgrey;">restaurant</i>
			  				<hr>
			  				<h5>Voucher Makan Dikantin</h5>
			  			</div>
						<div class="card-footer">						    
							<form action="" method="POST">							
								<input class="btn btn-success" type="submit" name="100" value="100 Rewards">
							</form>
						</div>
					</div>				
				</div>
				<div class="col-sm-3">	 
			  		<div class="card text-center">
						<div class="card-body">
			  				<i class="material-icons" style="font-size: 100px; color: darkgrey;">local_grocery_store</i>
			  				<hr>
			  				<h5>Voucher Belanja Bulanan</h5>
			  			</div>
						<div class="card-footer">						    
							<form action="" method="POST">							
								<input class="btn btn-success" type="submit" name="250" value="250 Rewards">
							</form>
						</div>
					</div>				
				</div>
				<div class="col-sm-3">	 
			  		<div class="card text-center">
						<div class="card-body">
			  				<i class="material-icons" style="font-size: 100px; color: darkgrey;">local_gas_station</i>
			  				<hr>
			  				<h5>Voucher Isi Bensin</h5>
			  			</div>
						<div class="card-footer">						    
							<form action="" method="POST">							
								<input class="btn btn-success" type="submit" name="1000" value="1000 Rewards">
							</form>
						</div>
					</div>				
				</div>
				<div class="col-sm-3">	 
			  		<div class="card text-center">
						<div class="card-body">
			  				<i class="material-icons" style="font-size: 100px; color: darkgrey;">flight</i>
			  				<hr>
			  				<h5>Tiket Liburan</h5>
			  			</div>
						<div class="card-footer">						    
							<form action="" method="POST">							
								<input class="btn btn-success" type="submit" name="5000" value="5000 Rewards">
							</form>
						</div>
					</div>				
				</div>			
		  	</div> 
			<?php
			  	if(isset($_POST['100'])){						    
			      	$reward = $reward - 100;			      	
			      	$result = mysqli_query($koneksi,"update user set reward='$reward' where username='$username'");			

			      	echo "<meta http-equiv='refresh' content='0'>";						   
			  	}else if(isset($_POST['250'])){
			  		$reward = $reward - 250;			      	
			      	$result = mysqli_query($koneksi,"update user set reward='$reward' where username='$username'");			

			      	echo "<meta http-equiv='refresh' content='0'>";
			    }else if(isset($_POST['1000'])){
			  		$reward = $reward - 1000;			      	
			      	$result = mysqli_query($koneksi,"update user set reward='$reward' where username='$username'");			

			      	echo "<meta http-equiv='refresh' content='0'>";
			    }else if(isset($_POST['5000'])){
			  		$reward = $reward - 2300;			      	
			      	$result = mysqli_query($koneksi,"update user set reward='$reward' where username='$username'");			

			      	echo "<meta http-equiv='refresh' content='0'>";
			    }
			?>	
		</div>


	    <script src="js/jquery.min.js"></script>
	    <script src="js/popper.min.js"></script>
	    <script src="js/bootstrap.js"></script>
	    <script src="js/custom.js"></script> 

	</body>
</html>								    	