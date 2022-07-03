<?php
  include_once 'header.php';
  include_once 'navbarsession.php';
?>
<div class="container" style="padding-top: 110px;">
    <div class="row">
        <div class="col-md-12 bg-light">
            <a href="teacher_classes.php" class="text-dark"><small>Class Management</small></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="teacher_whatsdue.php" class="text-dark"><small>What's Due</small></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="teacher_progress.php" class="text-dark"><small>Progress</small></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          </div>
    </div>
</div>

<br>

<div class="container">
  <div class="row">
    <div class="col-md-12 bg-light">
    <div class="dropdown">
        <button type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown">
        Assigned By Me
        </button>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="#">Assigned By Me</a>
            <a class="dropdown-item" href="#">To Do</a>
          </div>
    </div>
<br><br<br>
    <div class="dropdown">
            <button type="button" class="btn btn-lg  dropdown-toggle" data-toggle="dropdown">
            All My Classes
            </button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="#">All my Classes</a>
                <a class="dropdown-item" href="#">Send to Individual Students</a>
              </div>
        </div>

    </div>

    <div class="col-md-12 bg-light">  <br>
    <div class="btn-group">

        <button type="button" class="btn btn-light" > <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
          <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
          <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
        </svg>&nbsp;&nbsp;Review</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <button type="button" class="btn btn-light" > <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
          <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
          <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"/>
        </svg>&nbsp;&nbsp;Reviewed</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <button type="button" class="btn btn-light" > <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clock-history" viewBox="0 0 16 16">
          <path d="M8.515 1.019A7 7 0 0 0 8 1V0a8 8 0 0 1 .589.022l-.074.997zm2.004.45a7.003 7.003 0 0 0-.985-.299l.219-.976c.383.086.76.2 1.126.342l-.36.933zm1.37.71a7.01 7.01 0 0 0-.439-.27l.493-.87a8.025 8.025 0 0 1 .979.654l-.615.789a6.996 6.996 0 0 0-.418-.302zm1.834 1.79a6.99 6.99 0 0 0-.653-.796l.724-.69c.27.285.52.59.747.91l-.818.576zm.744 1.352a7.08 7.08 0 0 0-.214-.468l.893-.45a7.976 7.976 0 0 1 .45 1.088l-.95.313a7.023 7.023 0 0 0-.179-.483zm.53 2.507a6.991 6.991 0 0 0-.1-1.025l.985-.17c.067.386.106.778.116 1.17l-1 .025zm-.131 1.538c.033-.17.06-.339.081-.51l.993.123a7.957 7.957 0 0 1-.23 1.155l-.964-.267c.046-.165.086-.332.12-.501zm-.952 2.379c.184-.29.346-.594.486-.908l.914.405c-.16.36-.345.706-.555 1.038l-.845-.535zm-.964 1.205c.122-.122.239-.248.35-.378l.758.653a8.073 8.073 0 0 1-.401.432l-.707-.707z"/>
          <path d="M8 1a7 7 0 1 0 4.95 11.95l.707.707A8.001 8.001 0 1 1 8 0v1z"/>
          <path d="M7.5 3a.5.5 0 0 1 .5.5v5.21l3.248 1.856a.5.5 0 0 1-.496.868l-3.5-2A.5.5 0 0 1 7 9V3.5a.5.5 0 0 1 .5-.5z"/>
        </svg>&nbsp;&nbsp;Scheduled</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    </div>

    </div>
  </div>
</div>

<div class="container">
<hr>
<div class="float-right">

      <div class="dropdown">
            <button type="button" class="btn  dropdown-toggle" data-toggle="dropdown">
            All work
            </button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="#">All Works</a>
                <a class="dropdown-item" href="#">Assignments</a>
                <a class="dropdown-item" href="#">Quizzes</a>
              </div>
        </div>
</div>
</div>
<br>
<br>
<div class="container">

  <div class="row bg-light">
  <div class="col-6 col-md-4 ">Assignment / Quiz Name</div>
  <div class="col-6 col-md-4">Ready to Grade</div>
  <div class="col-6 col-md-4">Viewed</div>
</div>
</div>
<br>
<div class="container">
  <div class="card-deck">
    <div class="card bg-light">
      <div class="card-body text-center">
        <br><br><br>No work to review.<br><br><br>
      </div>
    </div>
  </div>
</div>
<?php
  include_once 'footer.php';
 ?>
