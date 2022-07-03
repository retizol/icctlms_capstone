
<nav class="navbar navbar-expand-lg fixed-top navbar-dark py-2" style="background-color: #060F65;">
      <div class="container">
		  <a class="navbar-brand mr-5 mb-0 h1" href="dashboard.php">
		  <img src="images/icctonline3.png" width="100%" height="55" alt="icct_online_logo"></a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span>
		  </button>

		  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
			  <ul class="navbar-nav mr-auto">
				  <li class="nav-item active mr-4">
					  <a class="nav-link" href="dashboard.php"><i class="fa fa-home fa-lg"></i> Home<span class="sr-only">(current)</span></a>
				  </li>
				  <li class="nav-item">
					  <a class="nav-link text-light mr-4" href="<?php
            if ($usrcid == '2') {
              echo 'class/teacher_classes.php';
            }elseif ($usrcid == '3'){
              echo 'class/student_classes.php';
            }
             ?>"><i class="fa fa-mortar-board fa-lg"></i> Classes</a>
				  </li>
				  <!--li class="nav-item">
					  <a class="nav-link text-light mr-4" href="#"><i class="fa fa-tasks fa-lg"></i> To Do</a>
				  </li>
				  <li class="nav-item">
					  <a class="nav-link text-light mr-4" href="#"><i class="fa fa-suitcase fa-lg"></i> Bag</a>
				  </li>
				  <li class="nav-item">
					  <a class="nav-link text-light mr-4" href="#"><i class="fa fa-inbox fa-lg"></i> Inbox</a>
				  </li-->

			  </ul>
			  <ul class="navbar-nav">
				  <!--div class="nav-item form-group has-search mb-0 mr-3">
					  <input type="text" class="form-control fa" placeholder="&#xF002; Search">
				  </div>
				  <li class="nav-item">
					  <a class="mr-3" href="#" style="color: white; font-size: 25px;"><i class="fa fa-bell" aria-hidden="true"></i></a>
				  </li-->
          <li class="nav-item mt-3"><p class=" text-white text-uppercase mr-3"><?php echo $usruid . '_ ' . $usrlname . ", " . $usrfname; ?></p></p></li>
			  </ul>
			  <ul class="navbar-nav">
				  <li class="nav-item dropdown">
					  <a class="nav-link text-light" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="images/williemascot.png" class="img-fluid rounded-circle border border-white" alt="willie_mascot" width="40" style="vertical-align: middle; border-width: 1px !important"></a>
					  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown02">
						  <a class="dropdown-item" href="settings.php"><i class="fa fa-wrench"></i> Settings</a>
						  <div class="dropdown-divider"></div>
						  <a class="dropdown-item" href="includes/logout.inc.php"><i class="fa fa-sign-out"></i> Logout</a>
					  </div>
				  </li>
			  </ul>
		  </div>
		</div>
	</nav>
