<?php
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
					      	<a class="dropdown-item" href="#">Edit Profile</a>
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
					    	<li class="breadcrumb-item active" aria-current="page">Forum</li>
					  	</ol>
					</nav>
	   			</div>				
		  	</div>
		  	<div class="row">
		  		<div class="col-sm-12">	 
			  		<div class="card">
						<div class="card-body">
						    <p>
							  	<a class="btn btn-warning" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
							    	<i class="material-icons" style="font-size: 20px;">create</i> Create Post
							  	</a>
							</p>
							<div class="collapse" id="collapseExample">
								<hr>
								<form action="" method="POST">
								<div class="row">
									<div class="col-sm-3">
										<div class="card">
								  			<div class="card-header">
										    	<i class="material-icons" style="font-size: 20px;">person</i> Thread Starter
										  	</div>
											<div class="card-body text-center">
											   	<img src="user/profile/<?php echo $username ?>.jpg?dummy=8484744" onerror=this.src="img/default_profile.jpg" class="rounded-circle border border-warning" height="100px" width="100px" /></a>
											   	<br><br>
												<h5><?php echo "$nama"; ?></h5>
												<h5><?php echo "$division"; ?></h5>						
											</div>
										</div>
									</div>
									<div class="col-sm-9">										
								    	<div class="row">
								    		<div class="col-sm-12">
								    			<input class="form-control" name="forumtitle" placeholder="Title" maxlength="100" size="100" required>
								    		</div>
								    	</div>
								    	<br>
								    	<div class="row">
								    		<div class="col-sm-12">
								    			<div class="input-group">
													<span class="input-group-addon" id="basic-addon1">Forum Category</span>
											    	<select class="form-control" id="eventType" name="category">
													  	<option value="Teknologi Informasi">Teknologi Informasi</option>
													  	<option value="Sistem Informasi">Sistem Informasi</option>
													  	<option value="Teknik Mesin">Teknik Mesin</option>
													  	<option value="Administrasi">Administrasi</option>
													</select>
												</div>
								    		</div>
								    	</div>
								    	<div class="row">
								    		<div class="col-sm-12">
									    		<hr>
												<textarea class="form-control" rows="6" name="forumcontent" placeholder="Write Here.." required></textarea>
											</div>
										</div>
									</div>									
								</div>
								<hr>
								<div class="row">
									<div class="col-sm-12">
										<input class="btn btn-success float-right" type="submit" name="submit" value="Post">
									</div>
								</div>
								</form>
							</div>
						</div>
					</div>
					<?php
					  	if(isset($_POST['submit'])){

						    $forumtitle = $_POST['forumtitle'];
						    $category = $_POST['category'];
						    $forumcontent = mysql_real_escape_string($_POST['forumcontent']);

						    $result = mysqli_query($koneksi,"insert into forum(owner,forumtitle,category,forumcontent) values ('$username','$forumtitle','$category','$forumcontent')");

					      	echo "	<br>
					        		<div class='alert alert-success alert-dismissible fade show' role='alert'>
									  	".$forumtitle." has been posted to ".$category.".
									  	<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
									    	<span aria-hidden='true'>&times;</span>
									  	</button>
									</div>
					      		";

					      	$reward = $reward + 100;			      	
					      	$result = mysqli_query($koneksi,"update user set reward='$reward' where username='$username'");									   
					  	}
					?>
				</div>
		  	</div>
		  	<hr>			  	
		  	<div class="row">
		  		<div class="col-sm-12">
		  			<div id="accordion" role="tablist">
					  	<div class="card">
						    <div class="card-header" role="tab" id="headingOne">
						      	<h5 class="mb-0">
						        	<a data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
						          		<i class="material-icons" >people</i> Teknologi Informasi
						        	</a>
						      	</h5>
						    </div>
						    <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
						      	<div class="card-body">
						      		<table class="table">
						      			<tr>
						      				<th width="3%"></th>
						      				<th width="70%">Post Title</th>
						      				<th>By</th>
						      				<th>Replied</th>
						      			</tr>
							      		<?php
							      			$cat = 'Teknologi Informasi';
											$result = mysqli_query($koneksi,"select *from forum where category='$cat'");										

											if($result == TRUE){
												while($key = mysqli_fetch_array($result,MYSQLI_BOTH)){
														$tmpvalue = $username.'&'.$key['forumtitle'];
														$envalue = base64_encode($tmpvalue);
														$link = 'post.php?s='.$envalue;


														$forumid = $key['forumid'];

														$c = mysqli_query($koneksi,"select count(forumresid) from forum_response where forumid='$forumid'"); 
														$cr = mysqli_fetch_array($c);
								   						$replycount = $cr['count(forumresid)'];					
													echo "<tr>
															<td>	
																<center><img src='user/profile/".$key['owner'].".jpg?dummy=8484744' onerror=this.src='img/default_profile.jpg' class='rounded-circle' height=20px' width='20px'/></center>									
															</td>
															<td><a href='$link' >".$key['forumtitle']."</a></td>
														";
														$owner = $key['owner'];
														$result2 = mysqli_query($koneksi,"select *from user where username='$owner'");
														$row = mysqli_fetch_array($result2);
														$namaowner = $row['nama'];
													echo "
															<td>".$namaowner."</td>
															<td>".$replycount."</td>
														</tr>
														";
												}
											}
										?>
									</table>
						      	</div>
						    </div>
						</div>
					  	<div class="card">
					    	<div class="card-header" role="tab" id="headingTwo">
					      		<h5 class="mb-0">
					        		<a class="collapsed" data-toggle="collapse" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
					          			<i class="material-icons" >people</i> Sistem Informasi
					        		</a>
					      		</h5>
					    	</div>
						    <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordion">
							    <div class="card-body">
							       	<table class="table">
						      			<tr>
						      				<th width="3%"></th>
						      				<th width="70%">Post Title</th>
						      				<th>By</th>
						      				<th>Replied</th>
						      			</tr>
							      		<?php
							      			$cat = 'Sistem Informasi';
											$result = mysqli_query($koneksi,"select *from forum where category='$cat'");										

											if($result == TRUE){
												while($key = mysqli_fetch_array($result,MYSQLI_BOTH)){
														$tmpvalue = $username.'&'.$key['forumtitle'];
														$envalue = base64_encode($tmpvalue);
														$link = 'post.php?s='.$envalue;


														$forumid = $key['forumid'];

														$c = mysqli_query($koneksi,"select count(forumresid) from forum_response where forumid='$forumid'"); 
														$cr = mysqli_fetch_array($c);
								   						$replycount = $cr['count(forumresid)'];					
													echo "<tr>
															<td>	
																<center><img src='user/profile/".$key['owner'].".jpg?dummy=8484744' onerror=this.src='img/default_profile.jpg' class='rounded-circle' height=20px' width='20px'/></center>									
															</td>
															<td><a href='$link' >".$key['forumtitle']."</a></td>
														";
														$owner = $key['owner'];
														$result2 = mysqli_query($koneksi,"select *from user where username='$owner'");
														$row = mysqli_fetch_array($result2);
														$namaowner = $row['nama'];
													echo "
															<td>".$namaowner."</td>
															<td>".$replycount."</td>
														</tr>
														";
												}
											}
										?>
									</table>
							    </div>
						    </div>
					  	</div>
					  	<div class="card">
					    	<div class="card-header" role="tab" id="headingThree">
					      		<h5 class="mb-0">
					        		<a class="collapsed" data-toggle="collapse" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
					          			<i class="material-icons" >people</i> Teknik Mesin
					        		</a>
					      		</h5>
					    	</div>
					    	<div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree" data-parent="#accordion">
					      		<div class="card-body">
					        		<table class="table">
						      			<tr>
						      				<th width="3%"></th>
						      				<th width="70%">Post Title</th>
						      				<th>By</th>
						      				<th>Replied</th>
						      			</tr>
							      		<?php
							      			$cat = 'Teknik Mesin';
											$result = mysqli_query($koneksi,"select *from forum where category='$cat'");										

											if($result == TRUE){
												while($key = mysqli_fetch_array($result,MYSQLI_BOTH)){
														$tmpvalue = $username.'&'.$key['forumtitle'];
														$envalue = base64_encode($tmpvalue);
														$link = 'post.php?s='.$envalue;


														$forumid = $key['forumid'];

														$c = mysqli_query($koneksi,"select count(forumresid) from forum_response where forumid='$forumid'"); 
														$cr = mysqli_fetch_array($c);
								   						$replycount = $cr['count(forumresid)'];					
													echo "<tr>
															<td>	
																<center><img src='user/profile/".$key['owner'].".jpg?dummy=8484744' onerror=this.src='img/default_profile.jpg' class='rounded-circle' height=20px' width='20px'/></center>									
															</td>
															<td><a href='$link' >".$key['forumtitle']."</a></td>
														";
														$owner = $key['owner'];
														$result2 = mysqli_query($koneksi,"select *from user where username='$owner'");
														$row = mysqli_fetch_array($result2);
														$namaowner = $row['nama'];
													echo "
															<td>".$namaowner."</td>
															<td>".$replycount."</td>
														</tr>
														";
												}
											}
										?>
									</table>
					    		</div>
					  		</div>
						</div>
						<div class="card">
					    	<div class="card-header" role="tab" id="headingThree">
					      		<h5 class="mb-0">
					        		<a class="collapsed" data-toggle="collapse" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
					          			<i class="material-icons" >people</i> Administrasi
					        		</a>
					      		</h5>
					    	</div>
					    	<div id="collapseFour" class="collapse" role="tabpanel" aria-labelledby="headingFour" data-parent="#accordion">
					      		<div class="card-body">
					        		<table class="table">
						      			<tr>
						      				<th width="3%"></th>
						      				<th width="70%">Post Title</th>
						      				<th>By</th>
						      				<th>Replied</th>
						      			</tr>
							      		<?php
							      			$cat = 'Administrasi';
											$result = mysqli_query($koneksi,"select *from forum where category='$cat'");										

											if($result == TRUE){
												while($key = mysqli_fetch_array($result,MYSQLI_BOTH)){
														$tmpvalue = $username.'&'.$key['forumtitle'];
														$envalue = base64_encode($tmpvalue);
														$link = 'post.php?s='.$envalue;


														$forumid = $key['forumid'];

														$c = mysqli_query($koneksi,"select count(forumresid) from forum_response where forumid='$forumid'"); 
														$cr = mysqli_fetch_array($c);
								   						$replycount = $cr['count(forumresid)'];					
													echo "<tr>
															<td>	
																<center><img src='user/profile/".$key['owner'].".jpg?dummy=8484744' onerror=this.src='img/default_profile.jpg' class='rounded-circle' height=20px' width='20px'/></center>									
															</td>
															<td><a href='$link' >".$key['forumtitle']."</a></td>
														";
														$owner = $key['owner'];
														$result2 = mysqli_query($koneksi,"select *from user where username='$owner'");
														$row = mysqli_fetch_array($result2);
														$namaowner = $row['nama'];
													echo "
															<td>".$namaowner."</td>
															<td>".$replycount."</td>
														</tr>
														";
												}
											}
										?>
									</table>
					    		</div>
					  		</div>
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