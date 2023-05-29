<?php include_once 'navbarcreds.php'; ?>
    <div class="row">
      <div class="col-12">
        <div class="border p-4" style="background-color: white;">
          <form action="includes/settings.inc.php" method="POST" >
            <h5>Personal Information</h5>
            <hr>
            <h5>School ID</h5>
            <input class="form-control mb-2" type="text" name="suid" placeholder="<?php echo $uuid; ?>" style="width: 19rem;">
            <button type="submit" name="uidsubmit" class="btn btn-primary">Save School ID</button>
            <hr>
            <h5>Account<h5>
              </h4>
              Last Name:
              <input class="form-control" type="text" name="slname" placeholder="<?php echo $lastn; ?>" style="width: 19rem;"><br>
              First Name:
              <input class="form-control" type="text" name="sfname" placeholder="<?php echo $firstn; ?>" style="width: 19rem;">
              <button type="submit" name="namesubmit" class="btn btn-primary mt-2 mb-2">Update Name</button>
              <!--Middle Name:
              <input class="form-control" type="text" name="smname" value="" placeholder=" "style="width: 19rem;"><br>
              <div class="mb-3">
                Male: <input type="radio" name="gender" value="Male">
                Female: <input type="radio" name="gender" value="Female">
              </div--><hr>
              <div class="">
                <h5>Email</h5>
                <input class="form-control mb-2" type="text" name="smail" placeholder="<?php echo $emails; ?>" style="width: 19rem;">
                <button type="submit" name="esubmit" class="btn btn-primary mb-3">Update Email</button>
              </div>
              <?php
                  //Getting query error from URL shown below the form
                  if (isset($_GET['status'])) {
                    if ($_GET['status'] == "emptyuid") {
                      echo "<p>No School ID inserted!</p>";
                      exit();
                    }
                    elseif ($_GET['status'] == "uidchange") {
                      echo "<p>School ID updated!</p>";
                      exit();
                    }
                    elseif ($_GET['status'] == "flup") {
                      echo "<p>Full name updated!</p>";
                      exit();
                    }
                    elseif ($_GET['status'] == "fup") {
                      echo "<p>First name updated!</p>";
                      exit();
                    }
                    elseif ($_GET['status'] == "lup") {
                      echo "<p>Last name updated!</p>";
                      exit();
                    }
                    elseif ($_GET['status'] == "emptyfl") {
                      echo "<p>No name inserted!</p>";
                      exit();
                    }
                    elseif ($_GET['status'] == "eup") {
                      echo "<p>Email updated!</p>";
                      exit();
                    }
                    elseif ($_GET['status'] == "emptyemail") {
                      echo "<p>No email inserted!</p>";
                      exit();
                    }
                  }
              ?>
          </form>
        </div>
      </div>
    </div>
