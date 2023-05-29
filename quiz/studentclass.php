<?php ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
include '../includes/dbh.inc.php';
include 'headerq.php';
include 'session.php';
include 'navbarsession.php';
$get_id = $_GET['id']; ?>
<body style="padding-top: 110px">
  <div class="container bg-white p-4 border rounded">
    <?php
    $sqltcs= mysqli_query($conn, "SELECT * FROM create_class WHERE class_id = '$get_id'");
    $rows = mysqli_fetch_array($sqltcs);
    $class_name=$rows['class_name'];
    $class_description=$rows['class_description'];
    $class_code = $rows['class_code'];
    ?>
    <h3 class="card-title"><b>Class Name: <?php echo $rows['class_name']; ?></b></h3>
    <p class="card-text text-truncate mb-3"><b style="font-size: 20px">Description:</b> <span class="text-secondary lead " style="font-size: 20px;"><?php echo $rows['class_description']; ?></span></p>


  <ul class="nav nav-pills mb-3" id="myTab" role="tablist" style="font-size: 0.9rem">
    <!--li class="nav-item">
      <a class="nav-link active text-dark" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="true">Home</a>
    </li-->
    <li class="nav-item">
      <a class="nav-link active" id="assignment-tab" data-toggle="tab" href="#assignment" role="tab" aria-controls="assignment" aria-selected="false">Assignment</a>
    </li>

    <li class="nav-item">
      <a class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="false">Quizzes</a>
    </li>

    <li class="nav-item">
      <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Progress</a>
    </li>



</ul>


  <div class="tab-content" id="myTabContent">

    <!--div class="tab-pane fade show active" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div-->
    <div class="tab-pane fade show active" id="assignment" role="tabpanel" aria-labelledby="assignment-tab"><?php include 'assignment_student.php'; ?></div>
    <div class="tab-pane fade " id="home" role="tabpanel" aria-labelledby="home-tab"><?php include 'student_quiz_list.php'; ?></div>
    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab"><?php include 'progress.php'; ?></div>





  </div>


</div><!--container-->
<?php include 'script.php'; ?>
<!--script type="text/javascript">
$(document).ready(function(){
  $('#<!?php echo $id; ?>submit').tooltip('show');
  $('#<!?php echo $id; ?>submit').tooltip('hide');
});
</script>
              <script type="text/javascript">
$(document).ready(function(){
  $('#<!?php echo $id; ?>download').tooltip('show');
  $('#<!?php echo $id; ?>download').tooltip('hide');
});
</script-->
</body>
</html>
