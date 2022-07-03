
    <div class="row">
      <div class="col-12">
        <div class="border p-4">
          <form action="includes/settings.inc.php" method="POST">
            <h3> Personal Information</h3>
            <hr>
            <br>
            <h5>School ID</h5>
            <input class="form-control w-25 mb-2" type="text" name="suid" placeholder="<?php echo $usruid; ?>">
            <button type="submit" name="uidsubmit" class="btn btn-primary">Save School ID</button>
            <hr>

            <h5>Account<h5>

              </h4>

              Last Name:
              <input class="form-control w-25" type="text" name="slname" placeholder="<?php echo $usrlname; ?>"><br>
              First Name:
              <input class="form-control w-25" type="text" name="sfname" placeholder="<?php echo $usrfname; ?>"><br>
              Middle Name:
              <input class="form-control w-25" type="text" name="smname" value="" placeholder=" "><br>
              <div class="mb-3">
                Male: <input type="radio" name="gender" value="Male">
                Female: <input type="radio" name="gender" value="Female">
              </div>
              <div class="">
                <h5>Email</h5>
                <input class="form-control w-25 mb-2" type="text" name="smail" placeholder="<?php echo $usremail; ?>">
                <button type="submit" name="esubmit" class="btn btn-primary">Update Email</button>

              </div>

          </form>
        </div>
      </div>
    </div>
