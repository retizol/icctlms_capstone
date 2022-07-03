<?php
  include_once 'header.php';
  include_once 'session.php';
  include_once 'navbarsession.php';
?>
<div class="container" style="padding-top:110px">

<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active text-dark" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="true">Settings</a>
  </li>


  <li class="nav-item">
    <a class="nav-link text-dark" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="false">Password</a>
  </li>

</ul>

<div class="tab-content" id="myTabContent">

  <div class="tab-pane fade show active" id="contact" role="tabpanel" aria-labelledby="contact-tab"><?php include 'userinfo.php'; ?></div>

  <div class="tab-pane fade " id="home" role="tabpanel" aria-labelledby="home-tab"><?php include 'password.php'; ?>
  </div>



</div>


    <?php
      include_once 'footer2.php';
    ?>
