<?php
  include "koneksi.php";

  	$s = $_GET['s'];

 	$username = base64_decode($s);
 	$result = mysqli_query($koneksi,"select *from user where username='$username'");
	$row = mysqli_fetch_array($result);

	$password = $row['password'];
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
					      	<a class="dropdown-item" href="#">Edit Profile</a>
					      	<a class="dropdown-item" href="index.php">Logout</a>
					    </div>
					</li>
		        </ul>
	      	</div>
	    </div>

	   	<div class="container" style="padding-top: 50px; padding-bottom: 50px;">
	   		<div class="row">
	   			<div class="col-sm-2">
	   				
	   			</div>
	   			<div class="col-sm-8">
		   			<div class="card">
		   				<div class="card-header">
		   					<i class="material-icons" >person</i> Edit Profile
		   				</div>		   					
			  			<div class="card-body">	
			  				<form enctype="multipart/form-data" action="" method="POST">			  				
			  					<table border="0">
			  						<tr>
			  							<td width="5%" rowspan="3"><img src="user/profile/<?php echo $username ?>.jpg?dummy=8484744" onerror=this.src="img/default_profile.jpg" class="rounded-circle" height="100px" width="100px"/></td>
			  							<td width="3%" rowspan="3"></td>
				  						<td width="15%">Nama</td>
				  						<td width="2%">:</td>
				  						<td><input class="form-control" type="text" name="nama" value="<?php echo($nama) ?>"></td>
				  						<td></td>
				  					</tr>
				  					<tr>
				  						<td>Division</td>
				  						<td>:</td>
				  						<td><input class="form-control" type="text" name="division" value="<?php echo($division) ?>"></td>
				  						<td></td>
				  					</tr>
				  					<tr>
				  						<td>Password</td>
				  						<td>:</td>
				  						<td><input class="form-control" type="password" name="password1"></td>
				  						<td><input class="form-control" type="password" name="password2"></td>
				  					</tr>
				  					<tr>
				  						<td>
				  							<input class="btn btn-sm" type="file" name="uploaded_file" style="width: 98%">
				  						</td>
				  						<td></td>
				  						<td></td>
				  						<td></td>
				  					</tr>
			  					</table>								
			  			</div>
						<div class="card-footer">						    
							<input class="btn btn-success float-right" type="submit" name="submit" value="Update">
							</form>
						</div>
					</div>
				</div>
				<div class="col-sm-2">
	   				
	   			</div>
		  	</div>		  	
		</div>


	    <script src="js/jquery.min.js"></script>
	    <script src="js/popper.min.js"></script>
	    <script src="js/bootstrap.js"></script>
	    <script src="js/custom.js"></script> 

	</body>
</html>

<?php
	if(isset($_POST['submit'])){

	    $nama = $_POST['nama'];
	    $division = $_POST['division'];
	    $password1 = $_POST['password1'];
	    $password2 = $_POST['password2'];

	    $result = mysqli_query($koneksi,"update user set nama='$nama', division='$division' where username='$username'");

	    if($password1 != ''){
	    	if($password1 == $password2){
	    		$result = mysqli_query($koneksi,"update user set password='$password1' where username='$username'");
			}else{
		    	$message = "Password not Correct";
				echo "<script type='text/javascript'>alert('$message');</script>";
			}
	    }

	    if (empty($_FILES['uploaded_file']['name'])) {
		    // No file was selected for upload, your (re)action goes here
		}else{
			$path = "user/profile/".$row['username'].".jpg";
	    	if(move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $path)) {
				echo "<script type='text/javascript'>alert('$path');</script>";
		      	echo "	<br>
		        		<div class='alert alert-success alert-dismissible fade show' role='alert'>
						  	Profile Photo ".  basename( $_FILES['uploaded_file']['name'])." has been updated
						  	<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
						    	<span aria-hidden='true'>&times;</span>
						  	</button>
						</div>
		      		";
		    }else{
		        echo "	<br>
		        		<div class='alert alert-warning alert-dismissible fade show' role='alert'>
						  	There was an error uploading the photo, please try again!
						  	<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
						    	<span aria-hidden='true'>&times;</span>
						  	</button>
						</div>
					";
		    }
		}

	    

	    echo "<meta http-equiv='refresh' content='0'>";
	}
?>						    	