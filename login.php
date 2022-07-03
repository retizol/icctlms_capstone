<?php
  include_once 'headerindex.php';
?>

<div style="padding-top: 140px;">
  <div class="container">
    <div class="row d-flex justify-content-center">
      <div class="col-md-6">
    <section>
      <div class="text-center">
          <a href="index.php"><img src="images/icctonline3.png" class="rounded" alt="icctol"></a>
      </div>
      <form class="" action="includes/login.inc.php" method="POST">
      <!--img class="mb-4" src="images/icctonline3.png" alt="" width="200" height="100%"-->
      <br><br>
      <label for="usernameid">School ID no. / Email</label>
      <input class="form-control" type="text" id="usernameid" name="uid" placeholder="example@icct.com">
      <label class="mt-2" for="password">Password</label>
      <input class="form-control" type="password" id="password" name="pwd" placeholder="Password">
      <br>
      <button class="btn btn-lg btn-primary btn-block" type="submit" name="submitLogin">Sign In</button> <br>
      <?php
          //Getting query error from URL shown below the form
          if (isset($_GET['error'])) {
            if ($_GET['error'] == "emptyinput") {
              echo "<p>Fill in all fields!<p>";
              exit();
            }
            elseif ($_GET['error'] == "wronglogin") {
              echo "<p>Incorrect school ID / Email or password!<p>";
              exit();
            }
          }
      ?>
    </form>
</section>
</div>
</div>
</div>
</div>

<?php
  include_once 'footer2.php';
?>
