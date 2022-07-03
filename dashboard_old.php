<?php
  include_once 'header.php';
  include_once 'navbarsession.php';
?>

<div style="padding-top: 110px;">
  <div class="container">
    <div class="row">
      <div class="col-lg-3 px-2 order-first">
        <div class="p-3 border border-light rounded bg-light">
          <img src="images/williemascot.png" class="img-fluid rounded-circle border mx-auto d-block" width="70px" alt="pfp">
          <p class="my-1 mx-auto text-center"><?php echo $usruid . '_ ' . $usrlname . ", " . $usrfname; ?></p>
          <p class="my-1 mx-auto text-center d-block"><small><a class="text-secondary" href="studentprofile.php">View Profile</a></small></p>
        </div><br>

        <div class="p-2 pb-3 border border-light rounded bg-light">
          <div class="pb-2 d-flex justify-content-between">
            <span>MY CLASSES</span><span class="d-flex flex-row-reverse" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-ellipsis-h fa-lg" aria-hidden="true"></i></span>
            <div class="dropdown-menu dropdown-menu-right">
              <a class="dropdown-item" href="#">View Archived Classes</a>
              <a class="dropdown-item" href="#">Join a Class</a>
            </div>
          </div>
          <div class="pb-2 list-group list-group-flush">
            <a href="#" class="list-group-item list-group-item-action text-truncate ">Capstone Project</a>
            <a href="#" class="list-group-item list-group-item-action text-truncate">Information and Assurance Security 2</a>
            <a href="#" class="list-group-item list-group-item-action text-truncate">Integrative Programming Technologies</a>
            <a href="#" class="list-group-item list-group-item-action text-truncate">CISCO2: Routing and Switching</a>
            <a href="#" class="list-group-item list-group-item-action text-truncate">IM2: Advanced Database System</a>
          </div>
          <a class="pt-2 text-decoration-none text-dark" href="student_classes.php" role="button">All Classes</a>
        </div>


      </div>


      <div class="col-lg-6 px-2">
        <div class="p-3 border border-light rounded bg-light">
          <h2>H2 Heading</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ullamcorper malesuada proin libero nunc consequat interdum varius sit amet.</p>
        </div>
      </div>


      <div class="col-lg-3 px-2 order-last">
        <div class="p-2 pb-3 border border-light rounded bg-light">
          <div class="p-2 d-flex justify-content-between">
            <p class="font-weight-bold">Upcoming</p>
          </div>
          <div class="pb-2 list-group list-group-flush">
            <a href="#" class="list-group-item list-group-item-action text-truncate ">CHAPTER 1 QUIZ</a>
            <a href="#" class="list-group-item list-group-item-action text-truncate ">CHAPTER 2 QUIZ</a>
            <a href="#" class="list-group-item list-group-item-action text-truncate ">CHAPTER 3 QUIZ</a>
          </div>
          <i class="fa fa-calendar-check-o fa-lg" aria-hidden="true"></i><a class="pt-2 text-decoration-none text-dark" href="calendar.php" role="button"> View Calendar</a>
        </div>
      </div>

    </div>
  </div> <!-- /container -->
</div>
<?php
  include_once 'footer.php';

?>
