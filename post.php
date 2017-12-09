<?php
/*************************************************
* Filename    : post.php
* Programmer  : Ranggi Rahman
* Contributor : Lingga Setyagusti
* Date        : 2017 - 11 - 28
* Email       : ranggirahman@gmail.com
* Website     : 1400707.blog.upi.edu
* Deskripsi   : Forum Post View
*
**************************************************/

  include "koneksi.php";

  	$s = $_GET['s'];

  	$temp = base64_decode($s);
	$hs = (explode("&",$temp));

 	$username = substr($hs['0'], 0);
	$forumtitle = substr($hs['1'], 0);

 	$result = mysqli_query($koneksi,"select *from user where username='$username'");
	$row = mysqli_fetch_array($result);
	$nama = $row['nama'];
	$reward = $row['reward'];

	$result = mysqli_query($koneksi,"select *from forum where forumtitle='$forumtitle'");
	$row = mysqli_fetch_array($result);
	$forumid = $row['forumid'];
	$category = $row['category'];
	$owner = $row['owner'];
	$forumcontent = $row['forumcontent'];

	$result = mysqli_query($koneksi,"select *from user where username='$owner'");
	$row = mysqli_fetch_array($result);
	$namaowner = $row['nama'];
	$divowner = $row['division'];

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
					    	<li class="breadcrumb-item"><a href="forum.php?s=<?php echo "$s"?>">Forum</a></li>
					    	<li class="breadcrumb-item active"><?php echo "$category";?></li>
					    	<li class="breadcrumb-item active" aria-current="page"><?php echo "$forumtitle";?></li>
					  	</ol>
					</nav>
	   			</div>				
		  	</div>
		  	<div class="row">
		  		<div class="col-sm-12">	 
			  		<div class="card">
			  			<div class="card-header" role="tab" id="headingOne">
					      	<h5 class="mb-0">
				          		<i class="material-icons" style="font-size: 20px;">chat_bubble</i> <?php echo "$forumtitle";?>
					      	</h5>
					    </div>
						<div class="card-body">
						    <div class="row">
						    	<div class="col-sm-2">
								   	<img src="user/profile/<?php echo $owner ?>.jpg?dummy=8484744" onerror=this.src="img/default_profile.jpg" class="rounded-circle border border-warning" height="80px" width="80px" /></a>
								   	<br><br>
									<b><?php echo "$namaowner"; ?></b><br>
									<?php echo "$divowner"; ?>		
						    	</div>
						    	<div style="border-left:1px solid lightgray;height:auto;"></div>
						    	<div class="col-sm-9">
						    		<?php echo "$forumcontent"; ?>
						    	</div>
						    </div>
						</div>
					</div>					
				</div>
		  	</div>
		  	<hr>			  	
		  	<div class="row">
		  		<div class="col-sm-10">							
				</div>					
				<div class="col-sm-2w">
					<?php 
						$c = mysqli_query($koneksi,"select count(forumresid) from forum_response where forumid='$forumid'"); 
						$cr = mysqli_fetch_array($c);
   						$replycount = $cr['count(forumresid)'];

					?>


					<i class="material-icons" style="font-size: 20px;">comment</i> <?php echo "$replycount"; ?> Replied
				</div>   	
			</div>	
			<?php
				$result = mysqli_query($koneksi,"select *from forum_response where forumid='$forumid'");

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
						<textarea class="form-control" rows="3" name="comment" placeholder="Reply Post.." required></textarea>
						<hr>
						<input class="btn btn-success float-right" type="submit" name="submit" value="Post">
					</form>							
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
    $result = mysqli_query($koneksi,"insert into forum_response(forumid,resusername,resnama,comment) values ('$forumid','$username','$nama','$comment')");

    $reward = $reward + 50;			      	
	$result = mysqli_query($koneksi,"update user set reward='$reward' where username='$username'");

    echo "<meta http-equiv='refresh' content='0'>";
  }
?>								    	