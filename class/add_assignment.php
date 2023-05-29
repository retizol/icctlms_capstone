<?php
include '../includes/dbh.inc.php';
include 'headerq.php';
include 'session.php';
include 'navbarsession.php';?>
<?php include 'script.php'; ?>
<style media="screen">
.noselect {
-webkit-touch-callout: none; /* iOS Safari */
  -webkit-user-select: none; /* Safari */
   -khtml-user-select: none; /* Konqueror HTML */
     -moz-user-select: none; /* Old versions of Firefox */
      -ms-user-select: none; /* Internet Explorer/Edge */
          user-select: none; /* Non-prefixed version, currently
                                supported by Chrome, Edge, Opera and Firefox */
}

</style>
<body>
  <div class="container bg-white p-4 border rounded">

    <form class="" action="add_assignment_save.php" method="POST" enctype="multipart/form-data" name="upload">
      <div class="row">
      <div class="col-sm-6">
      <div class="form-group">
        <div class="controls">
          <label for="title" class="text-muted">Assignment Title</label>
          <input type="text" name="title" class="form-control" id="title" required>
        </div>
      </div>
      <div class="form-group">
        <div class="controls">
          <label for="text" class="text-muted">Instructions</label>
          <textarea name="inst" class="form-control" id="text" required></textarea>
        </div>
      </div>

      <div class="input-group w-75">
        <div class="custom-file">
          <input type="file" name="uploaded_file" class="custom-file-input" id="fileInput" aria-describedby="fileInput">
          <label class="custom-file-label" for="fileInput">Choose file</label>
          <input type="hidden" name="MAX_FILE_SIZE" value="5000000">
          <input type="hidden" name="id" value="<?php echo $usrid ?>">
        </div>
      </div>
      </div>

      <div class="col-sm-6 mt-3">
        <div class="alert alert-info">Pick the class where you wish to turn in this assignment</div>
        <table cellpadding="0" cellspacing="0" border="0" class="table">
          <thead>
            <tr>
              <th>
                <input type="checkbox"  name="selectAll" id="checkAll">
              </th>
              <th>Class Name</th>
              <th>Subject</th>
            </tr>
          </thead>
          <tbody>
          <?php
          $query = mysqli_query($conn,"SELECT * FROM create_class
            WHERE teacher_id = '$usrid'");
            $count = mysqli_num_rows($query);

            while($row = mysqli_fetch_array($query)){
              $id = $row['class_id'];
              ?>
              <tr id="del<?php echo $id; ?>">
                <td width="30">
                  <input type="checkbox" id="<?php echo $id; ?>" name="selector[]"  value="<?php echo $id; ?>">
                </td>
                <td class="noselect"><label class="m-0" for="<?php echo $id; ?>"><?php echo $row['class_name']; ?></label> </td>
                <td class="noselect"><label class="m-0" for="<?php echo $id; ?>"><?php echo $row['class_subject']; ?></td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
    <hr>
    <center>
      <div class="control-group">
        <div class="controls">
          <button type="submit" name="upload" class="btn btn-success">Upload</button>
        </div>
      </div>
    </center>
    <script>
    document.querySelector('.custom-file-input').addEventListener('change',function(e){
      var fileName = document.getElementById("fileInput").files[0].name;
      var nextSibling = e.target.nextElementSibling
      nextSibling.innerText = fileName
    })
    </script>

    <script>
    $("#checkAll").click(function () {
      $('input:checkbox').not(this).prop('checked', this.checked);
    });
    </script>
    <?php if (isset($_GET['status'])) {
      if ($_GET['status'] == "success") {
        echo "<p>Success!</p>";
        exit();
      }} ?>
  </form>
</div>




</body>
</html>
