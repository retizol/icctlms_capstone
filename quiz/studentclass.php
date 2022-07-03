<?php ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
include '../includes/dbh.inc.php';
include 'headerq.php';
include 'session.php';
include 'navbarsession.php';
$get_id = $_GET['id']; ?>
<body style="padding-top: 110px">
  <div class="container">

  <ul class="nav nav-tabs" id="myTab" role="tablist">
    <!--li class="nav-item">
      <a class="nav-link active text-dark" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="true">Home</a>
    </li-->


    <li class="nav-item">
      <a class="nav-link active text-dark" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="false">Activities</a>
    </li>

    <li class="nav-item">
      <a class="nav-link text-dark" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Progress</a>
    </li>
</ul>


  <div class="tab-content" id="myTabContent">

    <!--div class="tab-pane fade show active" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div-->

    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab"><?php include 'student_quiz_list.php'; ?>
    </div>

    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab"><?php include 'progress.php'; ?></div>



  </div>


</div><!--container-->
<?php include 'script.php'; ?>
</body>
</html>
