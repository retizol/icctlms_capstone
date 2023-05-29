<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
<link href="css/main.css" rel="stylesheet" type="text/css">

</head>
<body>
	<nav class="navbar navbar-expand-lg fixed-top navbar-dark py-2" style="background-color: #060F65;">
	      <div class="container">
			  <a class="navbar-brand mr-5 mb-0 h1" href="index.php">
			  <img src="images/icctonline3.png" width="100%" height="55" alt="icct_online_logo"></a>
			  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span>
			  </button>

			  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
				  <ul class="navbar-nav mr-auto">
					  <li class="nav-item active"><a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
					  </li>
					  <li class="nav-item">
						  <a class="nav-link text-light" href="#">Support</a>
					  </li>
					  <li class="nav-item dropdown">
						  <a class="nav-link dropdown-toggle text-light" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Campuses</a>
						  <div class="dropdown-menu" aria-labelledby="dropdown01">
							  <a class="dropdown-item" href="#">Main Campus - Cainta</a>
							  <a class="dropdown-item" href="#">Antipolo</a>
							  <a class="dropdown-item" href="#">Binangonan</a>
							  <a class="dropdown-item" href="#">Cainta Annex</a>
							  <a class="dropdown-item" href="#">Cogeo</a>
							  <a class="dropdown-item" href="#">San Mateo action</a>
							  <a class="dropdown-item" href="#">Taytay</a>
						  </div>
					  </li>
				  </ul>
				  <ul class="navbar-nav">
					  <li class="nav-item ">
						  <a class="nav-link text-light" href="login.php">Login </a>
					  </li>
					  <li class="nav-item">
						  <a class="nav-link text-light" href="signup.php">Sign Up</a>
					  </li>
				  </ul>
			  </div>
			</div>
		</nav>


	<main role="main pt-5" >
		<div class="container pt-5"></div>
      	<!-- Main jumbotron  -->
				<div class="jumbotron bg-light pb-5" >
					<div class="container pt-5 h-100" >

						<div class="row">
							<div class="col-sm-8" style="z-index: 2;">
								<h3 class="display-4">Our own eLearning is here!</h3><br>
								<p class="">ICCT Colleges, is a tertiary education provider with campuses located in the Province of Rizal, Philippines. Course offerings include Arts & Sciences, Business, Computer, Criminology, Education, Engineering, Health Sciences, Hospitality & Tourism Management, Short Term/Certificate Programs and Senior High School.<br><br>ICCT Colleges recognizes that the current COVID-19 crisis presents many challenges; but we believe that learning goes on regardless of the constraints we face.<br></p>
								<a class="btn bg-warning text-light" href="login.php" role="button" >&nbsp;Login&nbsp;</a>
								<a class="btn bg-warning text-light" href="signup.php" role="button">Sign Up</a>
							</div>
							<div class="col-sm-4" style="z-index: 1">
								<img src="images/frontimg2.png" alt="" class="img-fluid"  style="position: absolute; right: 30px; bottom: 0; height: 90%; width: 320px">
							</div>
						</div>

			</div>
		</div>

		<div class="jumbotron pt-3" style="background-color: #FFFFFF">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<h2>Our Mission</h2>
						<p class="text-justify">We aim to connect and assist in connecting both instructors and students to create an active platform for learning and to receive and give an enhanced quality of education; Furthermore, to consistently prepare students for the diverse requirements of technological efficiency needed in the fields of the various academic disciplines through research and global connections.</p>
					</div>
					<div class="col-md-6">
						<h2>Our Vision</h2>
						<p class="text-justify">To become the leading premier provider of a top-class e-Learning platform and create improve and ensure course quality, improve faculty effectiveness, and provide pedagogically sound and learner-centered education in order to enhance student success and retention.</p>
					</div>
				</div>
			</div> <!-- /container -->
		</div>
	</main>


<?php
	include_once 'footer2.php';

?>
