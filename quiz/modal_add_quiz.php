<div id="add_quiz" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
				<h5>Add Quiz</h5>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <form method="post">
					<div class="mb-4">
						<label class="">Quiz Title</label>
						<div class="controls">
						<input type="text" class="form-control" name="quiz_title" id="inputEmail" placeholder="Quiz Title" required>
						</div>
						<label class="mt-3">Quiz Description</label>
						<div class="controls">
						<input type="text" class="form-control" name="description" placeholder="Quiz Description" required>
						</div>
					</div>
					<div class="control-group">
						<div class="modal-footer">
							<button name="saveaq" type="submit" class="btn btn-success">Save</button>
			        <button class="btn btn-secondary" data-dismiss="modal" aria-hidden="true">Close</button>
			      </div>
					</div>
        </form>
					<?php
					if (isset($_POST['saveaq'])){
					$quiz_title = $_POST['quiz_title'];
					$description = $_POST['description'];
					mysqli_query($conn,"INSERT into quiz (quiz_title, quiz_description, date_added, teacher_id) values('$quiz_title', '$description', NOW(), '$usrid')")or die(mysqli_error());

          header('Location: teacher_quiz.php');
					}
					?>
      </div>
    </div>
  </div>
</div>
