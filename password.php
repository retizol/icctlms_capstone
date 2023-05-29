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
    <a class="nav-link text-dark" href="settings.php" role="tab"  aria-selected="false">Profile</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active text-dark" href="#" role="tab" aria-controls="pass" aria-selected="true">Password</a>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
    <div class="row">
      <div class="col-12">
        <div class="p-4 border " style="background-color: white;">
          <h5>Password</h5>
          <hr>
          <form action="includes/settings.inc.php" method="post">
            Current Password:
             <input type="password" class="form-control mb-3" name="old_password" placeholder="Password" style="width: 19rem;" required>

            New Password:
            <input type="password" class="form-control mb-3" name="new_password" placeholder="Password" style="width: 19rem;" required>

             Confirm New Password:
            <input type="password" class="form-control" name="confirm_password" placeholder="Password" style="width: 19rem;" required>
            <br>
            <button type="submit" class="btn btn-primary mt-3" name="pwdsubmit">Submit</button>
            <?php
                //Getting query error from URL shown below the form
                if (isset($_GET['error'])) {
                  if ($_GET['error'] == "oldpassdontmatch") {
                    echo "<p>Old password doesn't match!</p>";
                    exit();
                  }
                  elseif ($_GET['error'] == "newpassdontmatch") {
                    echo "<p>New passwords doesn't match!</p>";
                    exit();
                  }
                  elseif ($_GET['error'] == "none") {
                    echo "<p>Your password has been changed!</p>";
                    exit();
                  }
                }
            ?>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
    <?php
      include_once 'footer2.php';
    ?>
