<?php
/*************************************************
* Filename    : index.php
* Programmer  : Ranggi Rahman
* Contributor : Lingga Setyagusti
* Date        : 2017 - 11 - 28
* Email       : ranggirahman@gmail.com
* Website     : 1400707.blog.upi.edu
* Deskripsi   : Video List List
*
**************************************************/

  	include "koneksi.php";

  	$s = $_GET['s'];

 	$username = base64_decode($s);
 	$result = mysqli_query($koneksi,"select *from user where username='$username'");
	$row = mysqli_fetch_array($result);

	$nama = $row['nama'];
	$reward = $row['reward'];

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
					    	<li class="breadcrumb-item active" aria-current="page">Learning</li>
					  	</ol>
					</nav>
	   			</div>				
		  	</div>
		  	<div class="row">
		  		<div class="col-sm-3">	 
			  		<div class="card">
						<div class="card-body">
						    <h4 class="card-title">Upload Video</h4>
						    <form enctype="multipart/form-data" action="learn.php?s=<?php echo "$s"?>" method="POST">
				    			<label class="custom-file">
								  	<input type="file" name="uploaded_file" class="custom-file-input">
								  	<span class="custom-file-control"></span>
								</label>					
								<br><br>Directory
						    	<select class="form-control" id="eventType" name="category">
								  	<option value="1">Panduan Kerja</option>
								  	<option value="2">Praktik Kerja</option>
								  	<option value="3">Dokumentasi Kerja</option>
								  	<option value="4">Dokumen Penelitian</option>
								</select>
								<hr>
							    <input class="btn btn-success float-right" type="submit" value="Upload"></input>											    
							</form>
							<?php
							  	if(!empty($_FILES['uploaded_file']))
							  	{
							  		$category = $_POST['category'];
							  		if($category == '1'){
								    	$path = "user/learn/panduan_kerja/";
							  		}if($category == '2'){
							  			$path = "user/learn/praktik_kerja/";
							  		}if($category == '3'){
							  			$path = "user/learn/dokumentasi_kerja/";
							  		}if($category == '4'){
							  			$path = "user/learn/dokumen_penelitian/";
							  		}

							  		$learndir = $path;
								    $path = $path . basename( $_FILES['uploaded_file']['name']);
								    if(move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $path)) {
								      	echo "	<br><br>
								        		<div class='alert alert-success alert-dismissible fade show' role='alert'>
												  	The file ".  basename( $_FILES['uploaded_file']['name'])." has been uploaded
												  	<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
												    	<span aria-hidden='true'>&times;</span>
												  	</button>
												</div>
								      		";
								      	$files = basename( $_FILES['uploaded_file']['name']);
								      	$filenx = preg_replace("/\.[^.]+$/", "", $files);
								      	$result = mysqli_query($koneksi,"insert into learn(learntitle,ownerid,learndir,watch) values ('$filenx','$username','$learndir','0')");

								      	$reward = $reward + 250;			      	
								      	$result = mysqli_query($koneksi,"update user set reward='$reward' where username='$username'");
								    } else{
								        echo "	<br><br>
								        		<div class='alert alert-warning alert-dismissible fade show' role='alert'>
												  	There was an error uploading the file, please try again!
												  	<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
												    	<span aria-hidden='true'>&times;</span>
												  	</button>
												</div>
											";
								    }
							  	}
							?>
						</div>
					</div>
				</div>
		  		<div class="col-sm-9">
		  			<div id="accordion" role="tablist">
					  	<div class="card">
						    <div class="card-header" role="tab" id="headingOne">
						      	<h5 class="mb-0">
						        	<a data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
						          		<i class="material-icons" >folder</i> Panduan Kerja
						        	</a>
						      	</h5>
						    </div>
						    <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
						      	<div class="card-body">
						      		<table class="table">
						      			<tr>
						      				<th>Video Name</th>
						      				<th>Uploaded By</th>
						      				<th>View</th>
						      			</tr>
						      		<?php
							        	$path = "user/learn/panduan_kerja/";			        	
										$files = array_diff(scandir($path), array('..', '.'));	

										foreach ($files as &$value) {
											$filenx = preg_replace("/\.[^.]+$/", "", $value);
											$tmpvalue = $username.'&'.$path.$value;
											$envalue = base64_encode($tmpvalue);
											$link = 'watch.php?s='.$envalue;
											echo "<tr>";
										    echo "<td width=70%'><i class='material-icons' style='color: tomato;' >video_library</i><a href='$link'> ".$filenx."</a></td>";
										    $result = mysqli_query($koneksi,"select *from learn where learntitle='$filenx'");
											$row = mysqli_fetch_array($result);
											$ownerid = $row['ownerid'];
											$view = $row['watch'];
											$result = mysqli_query($koneksi,"select *from user where username='$ownerid'");
											$row = mysqli_fetch_array($result);
											$namaowner = $row['nama'];

										    echo "<td>".$namaowner."</td>";
										    echo "<td>".$view."</td>";
										    echo "</tr>";
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
					          			<i class="material-icons" >folder</i> Praktik Kerja
					        		</a>
					      		</h5>
					    	</div>
						    <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordion">
							    <div class="card-body">
							       	<table class="table">
						      			<tr>
						      				<th>Video Name</th>
						      				<th>Uploaded By</th>
						      				<th>View</th>
						      			</tr>
						      		<?php
							        	$path = "user/learn/praktik_kerja/";			        	
										$files = array_diff(scandir($path), array('..', '.'));	

										foreach ($files as &$value) {
											$filenx = preg_replace("/\.[^.]+$/", "", $value);
											$tmpvalue = $username.'&'.$path.$value;
											$envalue = base64_encode($tmpvalue);
											$link = 'watch.php?s='.$envalue;
											echo "<tr>";
										    echo "<td width=70%'><i class='material-icons' style='color: tomato;' >video_library</i><a href='$link'> ".$filenx."</a></td>";
										    $result = mysqli_query($koneksi,"select *from learn where learntitle='$filenx'");
											$row = mysqli_fetch_array($result);
											$ownerid = $row['ownerid'];
											$view = $row['watch'];
											$result = mysqli_query($koneksi,"select *from user where username='$ownerid'");
											$row = mysqli_fetch_array($result);
											$namaowner = $row['nama'];

										    echo "<td>".$namaowner."</td>";
										    echo "<td>".$view."</td>";
										    echo "</tr>";
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
					          			<i class="material-icons" >folder</i> Dokumentasi Kerja
					        		</a>
					      		</h5>
					    	</div>
					    	<div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree" data-parent="#accordion">
					      		<div class="card-body">
					        		<table class="table">
						      			<tr>
						      				<th>Video Name</th>
						      				<th>Uploaded By</th>
						      				<th>View</th>
						      			</tr>
						      		<?php
							        	$path = "user/learn/dokumentasi_kerja/";			        	
										$files = array_diff(scandir($path), array('..', '.'));	

										foreach ($files as &$value) {
											$filenx = preg_replace("/\.[^.]+$/", "", $value);
											$tmpvalue = $username.'&'.$path.$value;
											$envalue = base64_encode($tmpvalue);
											$link = 'watch.php?s='.$envalue;
											echo "<tr>";
										    echo "<td width=70%'><i class='material-icons' style='color: tomato;' >video_library</i><a href='$link'> ".$filenx."</a></td>";
										    $result = mysqli_query($koneksi,"select *from learn where learntitle='$filenx'");
											$row = mysqli_fetch_array($result);
											$ownerid = $row['ownerid'];
											$view = $row['watch'];
											$result = mysqli_query($koneksi,"select *from user where username='$ownerid'");
											$row = mysqli_fetch_array($result);
											$namaowner = $row['nama'];

										    echo "<td>".$namaowner."</td>";
										    echo "<td>".$view."</td>";
										    echo "</tr>";
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
					          			<i class="material-icons" >folder</i> Dokumen Penelitian
					        		</a>
					      		</h5>
					    	</div>
					    	<div id="collapseFour" class="collapse" role="tabpanel" aria-labelledby="headingFour" data-parent="#accordion">
					      		<div class="card-body">
					        		<table class="table">
						      			<tr>
						      				<th>Video Name</th>
						      				<th>Uploaded By</th>
						      				<th>View</th>
						      			</tr>
						      		<?php
							        	$path = "user/learn/dokumen_penelitian/";			        	
										$files = array_diff(scandir($path), array('..', '.'));	

										foreach ($files as &$value) {
											$filenx = preg_replace("/\.[^.]+$/", "", $value);
											$tmpvalue = $username.'&'.$path.$value;
											$envalue = base64_encode($tmpvalue);
											$link = 'watch.php?s='.$envalue;
											echo "<tr>";
										    echo "<td width=70%'><i class='material-icons' style='color: tomato;' >video_library</i><a href='$link'> ".$filenx."</a></td>";
										    $result = mysqli_query($koneksi,"select *from learn where learntitle='$filenx'");
											$row = mysqli_fetch_array($result);
											$ownerid = $row['ownerid'];
											$view = $row['watch'];
											$result = mysqli_query($koneksi,"select *from user where username='$ownerid'");
											$row = mysqli_fetch_array($result);
											$namaowner = $row['nama'];

										    echo "<td>".$namaowner."</td>";
										    echo "<td>".$view."</td>";
										    echo "</tr>";
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