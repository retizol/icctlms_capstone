<?php
  include_once 'headerindex.php';
	include_once 'navbarindex.php'
?>
<div class="container" style="padding-top: 110px;">
  <div class="row g-5 my-custom-row align-item-center">
    <div class="col-md-4 offset-md-4">
      <div class="">
        <a href="index.php">
            </a>

      </div>
      <br><br>
      <div class="text-center">
            <h3>Choose an account</h3>
      </div><br>
      <div class="p-3 border rounded" style=" border-color: #8a2be2 !important">
        <a href="signupteacher.php" class="text-center text-dark card-link">
          <p class="text-center card-link mt-2"><b style="color: #8a2be2">TEACHER ACCOUNT</b><br><br><span class="text-secondary lead " style="font-size: 16px;"> For teachers, co-teachers, admins, coaches, advisors, instructional tech</span></p>
        </a>
      </div><br>
      <div class="p-3 border rounded" style=" border-color: #c71585 !important">
        <a href="signupstudent.php" class="text-center text-dark card-link">
          <p class="text-center card-link mt-2"><b style="color: #c71585">STUDENT ACCOUNT</b><br><br><span class="text-secondary lead " style="font-size: 16px;">For students, class participants, club members, etc.</span></p>
        </a>
      </div>
    </div>
  </div>
</div>
</div>
<?php
  include_once 'footer2.php';
?>
