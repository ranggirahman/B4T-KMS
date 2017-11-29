<?php
  include "koneksi.php";

  $s = $_GET['s'];

 	$username = base64_decode($s);
 	$result = mysqli_query($koneksi,"select *from user where username='$username'");
	$row = mysqli_fetch_array($result);

	$nama = $row['nama'];
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">    
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <link rel="stylesheet" href="css/bootstrap.css" media="screen">
	    <link rel="stylesheet" href="css/custom.min.css">
	    <link href="css/jumbotron.css" rel="stylesheet">
	    <link rel="icon" href="img/favicon.ico">

	    <title>Balai Besar Bahan dan Barang Teknik - KMS</title>
  	</head>

  	<body>
  		<div class="fixed-bg"></div>  
	    <div class="navbar navbar-expand-lg fixed-top navbar-dark bg-primary">
	      	<div class="container">
	        	<a href="main.php?s=<?php echo $s ?>" class="navbar-brand"><img src="img/logo.png" class="img-fluid" style="max-width: 20%; and height: auto"> Balai Besar Bahan dan Barang Teknik</a>

	        	<ul class="nav navbar-nav ml-auto">
		            <li class="nav-item">
		              <a class="navbar-text" style="color: white;">Hi, <?php echo "$nama"; ?></a>
		            </li>
 		            <li class="nav-item">
		              <a class="nav-link" href="index.php"> Logout</a>
		            </li>
		        </ul>
	      	</div>
	    </div>

	   	<div class="container">
	   		<div class="row" style="padding-top: 50px;">
	   			<div class="col-sm-9">
	   				<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
					  	<div class="carousel-inner">
					    	<div class="carousel-item active">
					      		<img class="d-block w-100" src="img/slider/1.jpg" alt="First slide">
					      		<div class="carousel-caption d-none d-md-block">
								    <h3>Discovery New Knowledge</h3>
								</div>
					    	</div>
					    	<div class="carousel-item">
					      		<img class="d-block w-100" src="img/slider/2.jpg" alt="Second slide">
					      		<div class="carousel-caption d-none d-md-block">
								    <h3>Sharing The Knowledge</h3>
								</div>
					    	</div>
					    	<div class="carousel-item">
					      		<img class="d-block w-100" src="img/slider/3.jpg" alt="Third slide">
					      		<div class="carousel-caption d-none d-md-block">
								    <h3>Get Rewards</h3>
								</div>
					    	</div>
					  	</div>
					  	<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
					    	<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					    	<span class="sr-only">Previous</span>
					  	</a>
					  	<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
					    	<span class="carousel-control-next-icon" aria-hidden="true"></span>
					    	<span class="sr-only">Next</span>
					  	</a>
					</div>
	   			</div>
	   			<div class="col-sm-3">
	   				<div class="card">						
						<a class="twitter-timeline" href="https://twitter.com/B4T_Bandung?ref_src=twsrc%5Etfw" data-height="519" data-chrome="noheader,nofooter">Tweets by B4T_Bandung</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
					</div>
	   			</div>	   			
	   		</div>
	   		<br>
	   		<div class="row">	
			    <div class="col-sm-3">
				    <div class="card text-center">
				      	<div class="card-body">
				        	<img src="img/glyph/si-glyph-book-3.svg" style="width: 100px;"/>
				        	<hr>
				        	<p class="card-text">Share Knowledge and Help Other Succeed</p>
				        	<a href="#" class="btn btn-primary">File Library</a>
				      	</div>
				    </div>
				</div>
				<div class="col-sm-3">
				    <div class="card text-center">
				      	<div class="card-body">
				        	<img src="img/glyph/si-glyph-movie-play.svg" style="width: 100px;"/>
				        	<hr>
				        	<p class="card-text">Search and Connect With Expert</p>
				        	<a href="#" class="btn btn-primary">Learning</a>
				      	</div>
				    </div>
				</div>
				<div class="col-sm-3">
				    <div class="card text-center">
				      	<div class="card-body">
				        	<img src="img/glyph/si-glyph-person-public.svg" style="width: 94px;"/>
				        	<hr>
				        	<p class="card-text">Search and Follow Communities of Practice</p>
				        	<a href="#" class="btn btn-primary">Forum</a>
				      	</div>
				    </div>
				</div>
				<div class="col-sm-3">
				    <div class="card text-center">
				      	<div class="card-body">
				        	<img src="img/glyph/si-glyph-document-search.svg" style="width: 94px;"/>
				        	<hr>
				        	<p class="card-text">Find Useful Content in the Knowledge</p>
				        	<a href="#" class="btn btn-primary">Search</a>
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

<?php
  if(isset($_POST['submit'])){

    $username = $_POST['username'];
    $password = $_POST['password'];

    $c = mysqli_query($koneksi,"select count(username) from user where username='$username' and password='$password'");

    $cr = mysqli_fetch_array($c);
    $ci = $cr['count(username)'];

    if( $ci == 1 ){
        $co = $username;
        $en = base64_encode($co);

        header("Location: main.php?s=$en");
    }else{
    }

  }
?>