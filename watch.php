<?php
/*************************************************
* Filename    : watch.php
* Programmer  : Ranggi Rahman
* Date        : 2017 - 11 - 28
* Email       : ranggirahman@gmail.com
* Website     : 1400707.blog.upi.edu
* Deskripsi   : Video Player Page
*
**************************************************/

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
	$nama = $row['nama'];
	$reward = $row['reward'];
	
	$result = mysqli_query($koneksi,"select *from learn where learntitle='$filenx'");
	$row = mysqli_fetch_array($result);
	$learnid = $row['learnid'];
	$owner = $row['ownerid'];
	$learndir = $row['learndir'];
	$watch = $row['watch'];
	$watch = $watch + 1;			      	
	$result = mysqli_query($koneksi,"update learn set watch='$watch' where learntitle='$filenx'");

	$result = mysqli_query($koneksi,"select *from user where username='$owner'");
	$row = mysqli_fetch_array($result);
	$namaowner = $row['nama'];
	$divowner = $row['division'];
	$rewardowner = $row['reward'];
	$rewardowner = $rewardowner + 1;			      	
	$result = mysqli_query($koneksi,"update user set reward='$rewardowner' where username='$owner'");

	$co = mysqli_query($koneksi,"select count(learnid) from learn_response where learnid='$learnid'");
	$cr = mysqli_fetch_array($co);
    $cs = $cr['count(learnid)'];

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
					<hr>
					<div class="row">
						<div class="col-sm-2">
							
						</div>
						<div class="col-sm-3">
							<i class="material-icons" style="font-size: 20px;">remove_red_eye</i> <?php echo "$watch"; ?> Views
						</div>						
						<div class="col-sm-7">
							<i class="material-icons" style="font-size: 20px;">comment</i> <?php echo "$cs"; ?> Comments
						</div>
					</div>
					<?php
						$result = mysqli_query($koneksi,"select *from learn_response where learnid='$learnid'");

						if($result == TRUE){
							while($key = mysqli_fetch_array($result,MYSQLI_BOTH)){
								echo "<hr><div class='row'>
										<div class='col-sm-2'>	
											<center><img src='user/profile/".$key['resusername'].".jpg?dummy=8484744' onerror=this.src='img/default_profile.jpg' class='rounded-circle' height=70px' width='70px'/></center>									
										</div>
										<div class='col-sm-10'>	
											<h5>".$key['resnama']."</h5>									
											".$key['comment']."
										</div>
									</div>
									";
							}
						}
					?>
					<hr>
					<div class="row">
						<div class='col-sm-2'>	
							<center><img src='user/profile/<?php echo $username?>.jpg?dummy=8484744' onerror=this.src='img/default_profile.jpg' class='rounded-circle' height=70px' width='70px'/></center>									
						</div>
						<div class='col-sm-10'>
							<form action="" method="POST">
								<textarea class="form-control" rows="3" name="comment" placeholder="Add a Comment..." required></textarea>
								<hr>
								<input class="btn btn-success float-right" type="submit" name="submit" value="Post">
							</form>							
						</div>
					</div>
		  		</div>	
		  		<div class="col-sm-3">	 
			  		<div class="card">
			  			<div class="card-header">
					    	<i class="material-icons" style="font-size: 20px;">person</i> Video By
					  	</div>
						<div class="card-body text-center">
						   	<img src="user/profile/<?php echo $owner ?>.jpg?dummy=8484744" onerror=this.src="img/default_profile.jpg" class="rounded-circle border border-warning" height="100px" width="100px" /></a>
						   	<br><br>
							<h5><?php echo "$namaowner"; ?></h5>
							<h5><?php echo "$divowner"; ?></h5>						
						</div>
					</div>
					<br>
					<div class="card">
					  <div class="card-header">
					    <i class="material-icons" style="font-size: 20px;">video_library</i> Similar Video
					  </div>
						<ul class="list-group list-group-flush">
						  	<?php			        	
								$files = array_diff(scandir($learndir), array('..', '.'));	

								foreach ($files as $value) {
									$filenx = preg_replace("/\.[^.]+$/", "", $value);
									$tmpvalue = $username.'&'.$learndir.$value;
									$envalue = base64_encode($tmpvalue);
									$link = 'watch.php?s='.$envalue;
								    echo "<li class='list-group-item'><a href='$link'>".$filenx."</a></li>";
								}
							?>
						</ul>
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

<?php
  if(isset($_POST['submit'])){

    $comment = mysql_real_escape_string($_POST['comment']);
    $result = mysqli_query($koneksi,"insert into learn_response(learnid,resusername,resnama,comment) values ('$learnid','$username','$nama','$comment')");

    $reward = $reward + 50;			      	
	$result = mysqli_query($koneksi,"update user set reward='$reward' where username='$username'");

    echo "<meta http-equiv='refresh' content='0'>";
  }
?>