<?php
include '../includes/dbh.inc.php';
include 'headerq.php';
include 'session.php';?>
<?php $get_id = $_GET['id']; ?>
<?php $quiz_question_id = $_GET['quiz_question_id']; ?>
<body>
	<div class="container">
			<div class="row">
					<div  id="content">
							 <div class="row">
						 <!-- end breadcrumb -->
                        <!-- block -->
												<div>
                            <div class="navbar">
                                <div id="" class="float-right">
								<a href="quiz_question.php<?php echo '?id='.$get_id; ?>" class="btn btn-success"><i class="icon-arrow-left"></i> Back</a>
								</div>
							</div>
							<div >
              <div>
								<?php
										$query = mysqli_query($conn,"SELECT * FROM quiz_question
										LEFT JOIN question_type on quiz_question.question_type_id = question_type.question_type_id
										where quiz_id = '$get_id' and quiz_question_id = '$quiz_question_id'  order by date_added DESC ")or die(mysqli_error());
										$row = mysqli_fetch_array($query);
										 if ($row['quiz_question_id'] == 1) {
											$choice = selected;
										}elseif ($row['quiz_question_id'] == 2) {
											$choices = selected;}

								?>

							    <form class="form-horizontal" method="post">
								        <div class="control-group">
											<label class="control-label" for="inputPassword">Question</label>
											<div class="controls">
													<textarea name="question" required><?php echo $row['question_text']; ?></textarea>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="inputEmail">Question Type:</label>
											<div class="controls">
												<select class="form-control w-50 mb-3" id="qSelect" name="question_type">
						              <option value="" disabled>Choose Question</option>

						              <option value="1" <?php $choice; ?>>Multiple Choice</option>
						              <option value="2" <?php $choices; ?>>True or False</option>
													</select>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" ></label>
											<div class="controls">
										<div id="opt11">
<?php
$sql = "SELECT * FROM answer WHERE quiz_question_id=$quiz_question_id";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();
while ($rows = $result->fetch_assoc()) {
    $ans = $rows['answer_text'];


?>
	<div class="input-group mb-2">
		<div class="input-group-prepend">
			<div class="input-group-text">
				<input type="radio" name="correctm" value="A" <?php if($row['answer'] == 'A'){ echo 'checked'; }?>>
			</div>
		</div>
		<input class="form-control" type="text" name="ans1" value="<?php echo $ans;?>">
	</div>
</div>

<div id="opt12">
	<input name="correctt" <?php if($row['answer'] == 'True'){ echo 'checked'; }?> value="t" type="radio">True<br /><br />
	<input name="correctt" <?php if($row['answer'] == 'False'){ echo 'checked'; }?> value="f" type="radio">False<br /><br />
</div>
											</div>
										</div>
<?php } ?>
						<div class="control-group">
										<div class="controls">

										<button name="save" type="submit" class="btn btn-info"><i class="icon-save"></i> Save</button>
										</div>
										</div>


		</form>

		<?php
		if (isset($_POST['save'])){
		$question = $_POST['question'];
		$points = $_POST['points'];
		$type = $_POST['question_tpye'];
		$answer = $_POST['answer'];

		$ans1 = $_POST['ans1'];
		$ans2 = $_POST['ans2'];
		$ans3 = $_POST['ans3'];
		$ans4 = $_POST['ans4'];

		if ($type  == '2'){
				mysqli_query($conn,"INSERT into quiz_question (quiz_id, question_text, date_added, answer, question_type_id)
			values('$get_id', '$question', NOW(), '".$_POST['correctt']."', '$type')")or die(mysqli_error());
		}else{

		mysqli_query($conn,"INSERT into quiz_question (quiz_id, question_text, date_added, answer, question_type_id)
		values('$get_id','$question',NOW(),'$answer','$type')")or die(mysqli_error());
		$query = mysqli_query($conn,"SELECT * from quiz_question order by quiz_question_id DESC LIMIT 1")or die(mysqli_error());
		$row = mysqli_fetch_array($query);
		$quiz_question_id = $row['quiz_question_id'];

		mysqli_query($conn,"INSERT into answer (quiz_question_id, answer_text, choices) values('$quiz_question_id','$ans1','A')")or die(mysqli_error());
		mysqli_query($conn,"INSERT into answer (quiz_question_id, answer_text, choices) values('$quiz_question_id','$ans2','B')")or die(mysqli_error());
		mysqli_query($conn,"INSERT into answer (quiz_question_id, answer_text, choices) values('$quiz_question_id','$ans3','C')")or die(mysqli_error());
		mysqli_query($conn,"INSERT into answer (quiz_question_id, answer_text, choices) values('$quiz_question_id','$ans4','D')")or die(mysqli_error());

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
					<script>
	jQuery(document).ready(function(){
		jQuery("#opt11").hide();
		jQuery("#opt12").hide();
		jQuery("#opt13").hide();

		jQuery("#qtype").change(function(){
			var x = jQuery(this).val();
			if(x == '1') {
				jQuery("#opt11").show();
				jQuery("#opt12").hide();
				jQuery("#opt13").hide();
			} else if(x == '2') {
				jQuery("#opt11").hide();
				jQuery("#opt12").show();
				jQuery("#opt13").hide();
			}
		});

	});
</script>
        </div>
		<?php include('script.php'); ?>
    </body>
</html>
