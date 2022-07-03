<?php
include '../includes/dbh.inc.php';
include 'headerq.php';
include 'session.php';
?>
<body>
	<div class="container">
    <div>
									<div class="float-right">
									<a href="teacher_quiz.php" class="btn btn-info"><i class="icon-arrow-left"></i> Back</a>
									</div>

									    <form class="form-horizontal" method="post">
										<div class="control-group">
											<label class="control-label" for="inputEmail">Quiz Title</label>
											<div class="controls">
											<input type="text" name="quiz_title" id="inputEmail" placeholder="Quiz Title">
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="inputPassword">Quiz Description</label>
											<div class="controls">
											<input type="text" class="span8" name="description" id="inputPassword" placeholder="Quiz Description" required>
											</div>
										</div>
										<div class="control-group">
										<div class="controls">
										<button name="save" type="submit" class="btn btn-success"><i class="icon-save"></i> Save</button>
										</div>
										</div>
										</form>
										<?php
										if (isset($_POST['save'])){
										$quiz_title = $_POST['quiz_title'];
										$description = $_POST['description'];
										mysqli_query($conn,"insert into quiz (quiz_title,quiz_description,date_added,teacher_id) values('$quiz_title','$description',NOW(),'$usrid')")or die(mysqli_error());
										?>
										<script>
										window.location = 'teacher_quiz.php';
										</script>
										<?php
										}
										?>
                                </div>
                            </div>
		<?php include('script.php'); ?>
    </body>
</html>
