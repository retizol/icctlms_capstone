<?php
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
include '../includes/dbh.inc.php';
include 'headerq.php';
include 'session.php';
include 'navbarsession.php';
ob_start();
?>
<?php $get_id = $_GET['id']; ?>
<?php
	  $post_id = $_GET['post_id'];
	  if($post_id == ''){
	  ?>
		<!--script>
		window.location = "studentclass.php<!?php echo '?id='.$get_id; ?>";
	</script-->
	  <?php
	  }
?>
<body>
	<div class="container ">
		<?php


		$query1 = mysqli_query($conn,"SELECT * FROM assignment WHERE assignment_id = '$post_id'");
		$row1 = mysqli_fetch_array($query1);
		$flocz = $row1['floc'];
		$fileomg = substr($flocz, 17);

		$bananaque = mysqli_query($conn,"SELECT * FROM teacher_class_student LEFT JOIN users ON teacher_class_student.teacher_id = users.usersId WHERE class_id = '$get_id'");
		$rowboat = mysqli_fetch_array($bananaque);

		$query = mysqli_query($conn,"SELECT * FROM student_assignment
						WHERE assignment_id = '$post_id' AND student_id = '$usrid'");
						$row = mysqli_fetch_array($query);
						$student_id = $row['student_id'] ?? null;
		?>
		<div class="row">
			<div class="col-sm-8 bg-white p-4 border rounded">
				<div class="">
					<div class="h4"><?php echo $row1['title']; ?><span class="float-right"><?php echo $row['grade'] ?? null; ?>/100</span> </div>
				</div>

				<hr>
					<div>
						<form id="add_assignment" action="upload_assignment.php" method="POST" enctype="multipart/form-data">
							<div class="">
								<div class="custom-file">
									<input name="uploaded_file" class="custom-file-input" id="fileInput" type="file" aria-describedby="fileInput" required>
									<label class="custom-file-label" for="fileInput">Choose file</label>
									<input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
									<input type="hidden" name="id" value="<?php echo $post_id; ?>"/>
									<input type="hidden" name="get_id" value="<?php echo $get_id; ?>"/>
								</div>
							</div>
								<div class="mt-4">
									<button type="submit" name="upload" class="btn btn-success float-right">Turn In Assignment</button>
								</div>
						</form>
					</div>
			</div><!--colsm8-->
			<div class="col-sm-4 bg-white p-4 border rounded">
				<div class="mb-2">
					<p class="mb-0"><strong>Professor:</strong> <?php echo $rowboat['usersFName'] ." ". $rowboat['usersLName'];?></p>

						<a  href="studentclass.php?id=<?php echo $get_id; ?>"><?php echo $rowboat['class_name']; ?></a>
					</div>
					<div class="mb-3">Instructions:
					<p><?php echo $row1['instruction']; ?></p></div>
					<div class="mt-5">
						<?php
						if ($flocz == ""){
						}else{
							?>
						<a data-placement="bottom" title="Download" id="<?php echo $id; ?>download" class="btn border rounded text-truncate" href="../class/<?php echo $row1['floc']; ?>" style="width: 18rem" target=”_blank”><i class="fa fa-download" aria-hidden="true"></i> <?php echo $fileomg; ?></a>
					<?php } ?>
					</div>
			</div><!--colsm4-->
		</div>
	</div> <!--container-->
<?php include 'script.php' ; ?>
<script>
document.querySelector('.custom-file-input').addEventListener('change',function(e){
  var fileName = document.getElementById("fileInput").files[0].name;
  var nextSibling = e.target.nextElementSibling
  nextSibling.innerText = fileName
})
</script>
</body>
</html>
