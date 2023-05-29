<?php
error_reporting(0);
ini_set('display_errors', 0);
include '../includes/dbh.inc.php';
include 'headerq.php';
include 'session.php';
include 'navbarsession.php';
if ((!isset($usrcid)) || !($usrcid == '1' || $usrcid == '2')) {
  header('location: ../dashboard.php');
}
ob_start();?>
<?php $get_id = $_GET['id']; ?>
<?php $quiz_question_id = $_GET['quiz_question_id']; ?>
<body style="padding-top:110px">
	<div class="container">
		<div class="row">
			<div class="col-sm-10">
				<div id="" class="">
					<a href="quiz_question.php<?php echo '?id='.$get_id; ?>" class="btn btn-success"><i class="icon-arrow-left"></i> Back</a>
				</div>
						<?php
						$query = mysqli_query($conn,"SELECT * FROM quiz_question
							LEFT JOIN question_type on quiz_question.question_type_id = question_type.question_type_id
							where quiz_id = '$get_id' and quiz_question_id = '$quiz_question_id'  order by date_added DESC ");
							$row = mysqli_fetch_array($query);
							$questiontype = $row['question_type_id'];
							//echo "<pre>"; var_dump($questiontype); echo "</pre>";

							if ($questiontype == 1) {
								$opt1 = 'selected="selected"';
							}elseif ($questiontype == 2) {
								$opt2 = 'selected="selected"';}
								?>
								<form class="form-horizontal" method="post">
									<div class="control-group">
										<label class="control-label" for="inputPassword">Question</label>
										<div class="controls">
											<textarea class="form-control" name="question" required><?php echo $row['question_text']; ?></textarea>
										</div>
									</div>

										<label class="control-label" for="inputEmail">Question Type:</label>
											<select class="form-control w-50 mb-3" id="qSelect" name="question_typeee" disabled>
												<option value="1" <?php echo $opt1 ?? null ?> disabled>Multiple Choice</option>
												<option value="2" <?php echo $opt2 ?? null ?> disabled>True or False</option>
											</select>
											<input type="text" name="question_type" value="<?php echo $questiontype; ?>" hidden>

											<?php  if ($questiontype == 1) {
												include_once 'edit_q1.php';
											}elseif ($questiontype == 2) {
												include_once 'edit_q2.php';}
												?>


									<button name="save" type="submit" class="btn btn-info"><i class="icon-save"></i> Save</button>
						</form>

		<?php
		if (isset($_POST['save'])){
		$question = $_POST['question'];
		$type = $_POST['question_type'];
		$mca = $_POST['answer'];

		$ans1 = $_POST['ans1'];
		$ans2 = $_POST['ans2'];
		$ans3 = $_POST['ans3'];
		$ans4 = $_POST['ans4'];

		$answerarr = array($ans1, $ans2, $ans3, $ans4);

		if ($type  == '2'){
			$tof = $_POST['correct'];
			//mysqli_query($conn,"INSERT into quiz_question (quiz_id, question_text, date_added, answer, question_type_id) values('$get_id', '$question', NOW(), '$tof', '$type')");
			mysqli_query($conn, "UPDATE quiz_question SET quiz_id = '$get_id', question_text = '$question', date_added = NOW(), answer = '$tof', question_type_id = '$type' WHERE quiz_question_id = $quiz_question_id");
		}else{

		mysqli_query($conn, "UPDATE quiz_question SET quiz_id = '$get_id', question_text = '$question', date_added = NOW(), answer = '$mca', question_type_id = '$type' WHERE quiz_question_id = $quiz_question_id");

		$qui = "SELECT answer_id FROM answer WHERE quiz_question_id=$quiz_question_id";
		$state = $conn->prepare($qui);
		$state->execute();
		$resultz = $state->get_result();
		while ($rams = $resultz->fetch_assoc()) {
		$quiz_question_id = $row['quiz_question_id'];
		mysqli_query($conn, "UPDATE answer SET answer_text = '$ans1' WHERE quiz_question_id = $quiz_question_id");
		mysqli_query($conn, "UPDATE answer SET answer_text = '$ans2' WHERE quiz_question_id = $quiz_question_id");
		mysqli_query($conn, "UPDATE answer SET answer_text = '$ans3' WHERE quiz_question_id = $quiz_question_id");
		mysqli_query($conn, "UPDATE answer SET answer_text = '$ans4'' WHERE quiz_question_id = $quiz_question_id");
		//mysqli_query($conn,"INSERT INTO answer (quiz_question_id, answer_text, choices) VALUES('$quiz_question_id','$ans1','A')");
		//mysqli_query($conn,"INSERT INTO answer (quiz_question_id, answer_text, choices) VALUES('$quiz_question_id','$ans2','B')");
		//mysqli_query($conn,"INSERT INTO answer (quiz_question_id, answer_text, choices) VALUES('$quiz_question_id','$ans3','C')");
		//mysqli_query($conn,"INSERT INTO answer (quiz_question_id, answer_text, choices) VALUES('$quiz_question_id','$ans4','D')");
	}}
	?>
<script>
 		window.location = 'quiz_question.php<?php echo '?id='.$get_id; ?>';
</script>
		<?php
		}
		?>
	</div>
</div>
</div>
		<?php include('script.php'); ?>
		<script>
		$(function() {
		         $('#qSelect').change(function(){
		             $('.qDivSelect').hide();
		             $('#' + $(this).val()).show();
		         });
		     });

				 /*$(function () {
		   $("#qSelect").change(function() {
		     var val = $(this).val();
		     if(val === "1") {
					 $("#1").show();
					 $("#2").hide();
		     }
		     else if(val === "2") {
		         $("#2").show();
		         $("#1").hide();
		     }
		   });
		 });*/
		</script>

</body>
</html>
