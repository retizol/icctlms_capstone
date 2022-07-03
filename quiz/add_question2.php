<?php
include '../includes/dbh.inc.php';
include 'headerq.php';
include 'session.php';
$get_id = $_GET['id'];
?>
<body>
	<div class="container">
			<div class="row">
					<div  id="content">
							 <div class="row">
					    <!-- breadcrumb -->
						 <!-- end breadcrumb -->
                        <!-- block -->
                        <div>
                            <div class="navbar">
                                <div id="" class="float-right">
								<a href="quiz_question.php<?php echo '?id='.$get_id; ?>" class="btn btn-success">Back</a>
								</div>
                            </div>
                            <div >
                                <div class="">


							    <form class="" method="post">
								        <div class="">
											<label class="" for="question">Question</label>
											<div class="">
													<textarea name="question" id="ckeditor_full" required></textarea>
											</div>
										</div>
										<!-- <div class="control-group">
											<label class="control-label" for="inputEmail">Points</label>
											<div class="controls">

											<input type="number" class="span1" name="points" min=1 max=5 required>
											</div>
										</div> -->

										<!--Choices from sql-->
										<div class="">
											<label class="" >Question Type:</label>
											<div class="">
												<select class="custom-select w-50" id="qtype" name="question_type" required>
													<option value=""></option>
													<?php
													$query_question = mysqli_query($conn,"SELECT * from question_type")or die(mysqli_error());
													while($query_question_row = mysqli_fetch_array($query_question)){
													?>
													<option value="<?php
                          echo $query_question_row['question_type_id']; ?>"><?php
                          echo $query_question_row['question_type'];  ?></option>
													<?php } ?>
												</select>
											</div>
										</div>

										<!--Radio choices-->
											<div class="">
													<div class="qDivSelect" id="opt11" style="display: none">
														A: <input type="text" name="ans1" size="60"> <input name="answer" value="A" type="radio"><br><br>
														B: <input type="text" name="ans2" size="60"> <input name="answer" value="B" type="radio"><br><br>
														C: <input type="text" name="ans3" size="60"> <input name="answer" value="C" type="radio"><br><br>
														D: <input type="text" name="ans4" size="60"> <input name="answer" value="D" type="radio"><br><br>
													</div>

													<div class="qDivSelect" id="opt12" style="display: none">
														<input name="correctt" value="True" type="radio">True<br /><br />
														<input name="correctt"  value="False" type="radio">False<br /><br />
													</div>
											</div>
						<div class="control-group">
										<div class="controls">

										<button name="save" type="submit" class="btn btn-info">Save</button>
										</div>
										</div>


		</form>

		<?php
		if (isset($_POST['save'])){
		$question = $_POST['question'];
		$points = $_POST['points'];
		$type = $_POST['question_type'];
		$answer = $_POST['answer'];

		$ans1 = $_POST['ans1'];
		$ans2 = $_POST['ans2'];
		$ans3 = $_POST['ans3'];
		$ans4 = $_POST['ans4'];

		if ($type  == '2'){
				mysqli_query($conn,"INSERT INTO quiz_question (quiz_id, question_text, date_added, answer, question_type_id) values('$get_id','$question', NOW(), '".$_POST['correctt']."', '$type')")or die(mysqli_error());
		}else{

		mysqli_query($conn,"INSERT into quiz_question (quiz_id, question_text, date_added, answer, question_type_id) values('$get_id', '$question', NOW(), '$answer', '$type')")or die(mysqli_error());
		$query = mysqli_query($conn,"SELECT * from quiz_question order by quiz_question_id DESC LIMIT 1")or die(mysqli_error());
		$row = mysqli_fetch_array($query);
		$quiz_question_id = $row['quiz_question_id'];

		mysqli_query($conn,"INSERT into answer (quiz_question_id,answer_text,choices) values('$quiz_question_id','$ans1','A')")or die(mysqli_error());
		mysqli_query($conn,"INSERT into answer (quiz_question_id,answer_text,choices) values('$quiz_question_id','$ans2','B')")or die(mysqli_error());
		mysqli_query($conn,"INSERT into answer (quiz_question_id,answer_text,choices) values('$quiz_question_id','$ans3','C')")or die(mysqli_error());
		mysqli_query($conn,"INSERT into answer (quiz_question_id,answer_text,choices) values('$quiz_question_id','$ans4','D')")or die(mysqli_error());

		}

	?>
		<script>
 		window.location = 'quiz_question.php<?php echo '?id='.$get_id; ?>'
		</script>
		<?php
		}
		?>
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
                </div>
            </div>
					</div>
					<script>
					$(function() {
						$('#qtype').change(function(){
								$('.qDivSelect').hide();
								$('#' + $(this).val()).show();
						});
					});



				$(document).ready(function(){
						$("#opt11").hide();
						$("#opt12").hide();
						$("#opt13").hide();

						$("#qtype").change(function(){
								var x = $(this).val();
								if(x == '1') {
									$("#opt11").show();
									$("#opt12").hide();
									$("#opt13").hide();
								} else if(x == '2') {
									$("#opt11").hide();
									$("#opt12").show();
									$("#opt13").hide();
								} else {
									$("#opt11").hide();
									$("#opt12").hide();
									$("#opt13").hide();
								}
							});

						});
</script>
        </div>
		<?php include('script.php'); ?>
    </body>
</html>
