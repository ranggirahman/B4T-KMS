<?php
/*************************************************
* Filename    : index.php
* Programmer  : Ranggi Rahman
* Contributor : Lingga Setyagusti
* Date        : 2017 - 11 - 28
* Email       : ranggirahman@gmail.com
* Website     : 1400707.blog.upi.edu
* Deskripsi   : Home Page
*
**************************************************/

  	include "koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">    
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <link rel="stylesheet" href="css/bootstrap.css" media="screen">
	    <link rel="stylesheet" href="css/custom.min.css">
	    <link rel="stylesheet" href="css/modification.css">
	    <link href="css/jumbotron.css" rel="stylesheet">
	    <link rel="icon" href="img/favicon.ico">	   
	    <title>Balai Besar Bahan dan Barang Teknik - KMS</title>
  	</head>

  	<body>
  		<div class="fixed-bg"></div>  
	    <div class="navbar navbar-expand-lg fixed-top navbar-dark bg-primary">
	      	<div class="container">
	        	<a href="index.php" class="navbar-brand"><img src="img/logo.png" class="img-fluid" style="max-width: 20%; and height: auto"> Balai Besar Bahan dan Barang Teknik</a>
	      	</div>
	    </div>

	    <div class="jumbotron">
	    	<div class="container">	    	
			   	<div class="row">
          	<div class="col-md-8">
            	<h1 class="display-3">Knowledge Management System B4T</h1>
          	</div>
          	<div class="col-md-3" style="padding-top: 20px">            
            	<form action="" method="POST">
              	<table border=0>
                	<th><h3>Login</h3></th>
                	<tr height="50px">
                    	<td><input class="form-control" type="user" name="username" placeholder="Username" maxlength="40" size="40" required></td>
               		</tr>
               		<tr height="50px">
                    	<td><input class="form-control" type="password" name="password" placeholder="Password" maxlength="20" size="40" required></td>
                	</tr>
              	</table>
              	<hr>
              	<table border=0>
                <tr>
                  	<td><input class="btn btn-success" type="submit" name="submit" value="Login"></td>
                </tr>                            
              	</table>
            	</form>
          	</div>
		      </div>
	    	</div>
			</div>

			<div class="container">
	      <div class="row">
	        <div class="col-md-12">
	          <p>Ini Adalah Website Sistem Management Pengetahuan Pada Balai Besar Bahan dan Barang Teknik (B4T).</p>
	        </div>
	     	</div>
	      <hr>
	      <footer>
	        <p>&copy; 2017 Balai Besar Bahan dan Barang Teknik. All Rights Reserved</p>
	      </footer>
		  </div>


	    <script src="js/jquery.min.js"></script>
	    <script src="js/popper.min.js"></script>
	    <script src="js/bootstrap.min.js"></script>
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
    		$message = "Invalid Username or Password";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }

  }
?>