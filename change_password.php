<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title> Account | eShop </title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">

    <style type="text/css">
    	.font{
			font-family: "Century Gothic", CenturyGothic, AppleGothic, sans-serif;

    	}
    	.orangeFont{
			color: #FF9933;
    	}
    	.greyColor{
			color: #526666;
    	}
    </style>
</head><!--/head-->

<body>
	<header id="header"><!--header-->
	
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="index.php"><img src="images/home/eshoplogo.png" alt="" /></a>
						</div>
					
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav font">

								<!-- !!!!!!!!!!!!!!!!!!!!!! -->

								<?php 
								if(isset($_SESSION['email']))
								{	
									echo "<li><a href='profile.php'><i class='fa fa-user'></i> Account</a></li>";
								    echo "<li><a href='logout.php' class='active'><i class='fa fa-lock'></i> Logout</a></li>	"; 
								}
								else 
								{
									echo "<li><a href='login.php'><i class='fa fa-lock'></i> Login | Sign-Up</a></li>";
								}
								?>

								<!-- !!!!!!!!!!!!!!!!!!!!!! -->

							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->

	</header><!--/header-->
	
	<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-sm-offset-0">
					<?php
						mysql_connect('localhost', 'root', '');
						mysql_select_db('new_db');

						$email = $_SESSION['email'];
						$query=" SELECT * FROM Users WHERE email = '$email' ";
						$result = mysql_fetch_array(mysql_query($query));
						$firstname = $result[3];
						$lastname = $result[4];

						mysql_close();
					?>
				<table width="100%" >
		 		 <tr>
		  		    <td>
		  		    	<img src="data:image/jpeg;base64,<?php echo base64_encode($result[5]);?>" style="max-height: 260px; max-width: 280px" />
		  		    </td>
					<td>
						<h1 class="orangeFont font"><span class="greyColor font">Welcome&nbsp</span><?php echo $firstname . " " . $lastname ; ?></h1>
					</td>					
		 		 </tr>
		  		</table>

		  		<hr>
		  		<table style="width:100%; font-size: 16px" cellpadding="5" class="font">
		  				<h3 style="color:#FF9933; font-family: 'Century Gothic' ;font-weight: bold; ">
								<?php 
								if(isset($_GET['error']))
								{
									if($_GET['error']==0) 
									{
										echo "E-Mail fields don't match !";
									}
									elseif($_GET['error']==1) 
									{
										echo "Passwords don't match !";
									}
									elseif($_GET['error']==2) 
									{
										echo "Password must be at least 6 characters !";
									}
								} 
								?>
							</h3>
					<tr><form action="change_password_check.php" method="POST"></tr>
					<tr><td><b class="orangeFont">E-Mail: </b><?php echo $email; ?></td></tr>
					<tr><td><b class="orangeFont">Password: </b><input type="password" name="password"></td></tr>
					<tr><td><b class="orangeFont">Confirm Password: </b><input type="password" name="c_password"></td></tr>
					<tr><td><b class="orangeFont">First Name: </b><?php echo $firstname; ?></td></tr>
					<tr><td><b class="orangeFont">Last Name: </b><?php echo $lastname; ?></td></tr>
					<tr><td>
						<button type="submit" class="btn btn-default font">Update</button>
						<input class="btn btn-default font" action="action" type="button" value="Cancel" onclick="history.go(-1);" />
					</td></tr>
					</form>	
				</table>

				</div>
			</div>
		</div>
	</section><!--/form-->
	
	
	<footer id="footer"><!--Footer-->		
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left font">Copyright © 2014 E-SHOP Inc. All rights reserved.</p>
				</div>
			</div>
		</div>
		
	</footer><!--/Footer-->

</body>
</html>