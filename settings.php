<?php
  include_once 'header.php';
  include_once 'footer3.php';
  include_once 'session.php';
  include_once 'navbarsession.php';
  ob_start();
?>
<div class="container">
<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active text-dark" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="true">Profile</a>
  </li>
  <li class="nav-item">
    <a class="nav-link text-dark" href="password.php" role="tab" aria-controls="pass" aria-selected="true">Password</a>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab"><?php include 'userinfo.php'; ?></div>
</div>

</div>
<?php
include_once 'footer2.php';
?>
