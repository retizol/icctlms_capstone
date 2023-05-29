<?php ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
include '../includes/dbh.inc.php';
include 'headerq.php';
include 'session.php';
include 'navbarsession.php';
if ((!isset($usrcid)) || !($usrcid == '1' || $usrcid == '2')) {
  header('location: ../dashboard.php');
}
ob_start();
$get_id = $_GET['id'];

?>
<body>
  <div class="container bg-white p-4 border rounded">
      <a href="quiz_question.php<?php echo '?id='.$get_id; ?>" class="btn btn-success">Back</a>
      <form class="mt-3" method="post">
          <div class="">
            <h6 class="text-muted">Add Question</h6>
            <textarea class="form-control" name="question" id="ckeditor_full" ></textarea>
          </div>
        <!--Choices from sql <option value=""></option>-->
        <div class="">

          <div class="mt-3">
            <label class="text-muted">Question Type:</label>
            <select class="form-control w-50 mb-3" id="qSelect" name="question_type">
              <option value="" disabled selected>Choose Question</option>
              <option value="1">Multiple Choice</option>
              <option value="2">True or False</option>
							<!--?php
              if ($resultq = mysqli_query($conn,"SELECT * from question_type")) {
              while ($rowq = mysqli_fetch_assoc($resultq)) {
              echo '<option value="' . $rowq['question_type_id'] . '">' . $rowq['question_type'] . '</option>'; }
              mysqli_free_result($resultq);} ?-->
              <!--?php
              $query_question = "SELECT * FROM question_type";
              $stmtgo = $conn->prepare($query_question);
              $stmtgo->execute();
              $result = $stmtgo->get_result();
              while ($query_question_row = $result->fetch_assoc()) {
                echo '<option value="' . $query_question_row['question_type_id'] . '">' . $query_question_row['question_type'] . '</option>';
              }
              ?-->

            </select>
            <!--?php var_dump($conn); ?-->
            <div class="qDivSelect" id="1" style="display: none">
              <!--div class="form-check mb-2">
              <input class="form-check-input" name="answer" value="A" type="radio"><input class="form-control w-75" type="text" name="ans1" size="60"><br><br></div-->

              <div class="input-group mb-2">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <input type="radio" name="answer" value="A">
                  </div>
                </div>
                <input class="form-control" type="text" name="ans1" placeholder="A">
              </div>

              <div class="input-group mb-2">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <input type="radio" name="answer" value="B">
                  </div>
                </div>
                <input class="form-control" type="text" name="ans2" placeholder="B">
              </div>

              <div class="input-group mb-2">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <input type="radio" name="answer" value="C">
                  </div>
                </div>
                <input class="form-control" type="text" name="ans3" placeholder="C">
              </div>

              <div class="input-group mb-2">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <input type="radio" name="answer" value="D">
                  </div>
                </div>
                <input class="form-control" type="text" name="ans4" placeholder="D">
              </div>
            </div>


            <div class="qDivSelect form-check" id="2" style="display: none">
              <div class="custom-control custom-radio">
                <input type="radio" id="customRadio1" name="correct" value="True" class="custom-control-input">
                <label class="custom-control-label" for="customRadio1">True</label>
              </div>
              <div class="custom-control custom-radio">
                <input type="radio" id="customRadio2" name="correct" value="False" class="custom-control-input">
                <label class="custom-control-label" for="customRadio2">False</label>
              </div>
            </div>

          </div>
        </div>

          <div class="mt-3 mb-3">
            <label class="text-muted" for="pts">Points</label>
            <input class="form-control w-25" type="number" name="points" id="pts" min=1 max=5 required>
            <small>min of 1 max of 5 </small>
          </div>

        <button name="saveaq" type="submit" class="btn btn-info mt-2">Save</button>
      </form>
      <?php
      if (isset($_POST['saveaq'])){
        $question = $_POST['question'];
        $type = $_POST['question_type'];
        $answer = $_POST['answer'];
        $points = $_POST['points'];

        $ans1 = $_POST['ans1'];
        $ans2 = $_POST['ans2'];
        $ans3 = $_POST['ans3'];
        $ans4 = $_POST['ans4'];

        if ($type  == '2'){
          $tof = $_POST['correct'];
          mysqli_query($conn,"INSERT INTO quiz_question (quiz_id, question_text, date_added, answer, question_type_id, points) VALUES('$get_id','$question', NOW(),'$tof','$type','$points')")or die(mysqli_error());
        }else{

          mysqli_query($conn,"INSERT INTO quiz_question (quiz_id,question_text,date_added,answer,question_type_id,points) VALUES('$get_id','$question', NOW(),'$answer','$type','$points')")or die(mysqli_error());

          $query = mysqli_query($conn,"SELECT * FROM quiz_question ORDER BY quiz_question_id DESC LIMIT 1");
          $row = mysqli_fetch_array($query);
          $quiz_question_id = $row['quiz_question_id'];

          mysqli_query($conn,"INSERT INTO answer (quiz_question_id, answer_text, choices) VALUES('$quiz_question_id','$ans1','A')");
          mysqli_query($conn,"INSERT INTO answer (quiz_question_id,answer_text,choices) VALUES('$quiz_question_id','$ans2','B')");
          mysqli_query($conn,"INSERT INTO answer (quiz_question_id,answer_text,choices) VALUES('$quiz_question_id','$ans3','C')");
          mysqli_query($conn,"INSERT INTO answer (quiz_question_id,answer_text,choices) VALUES('$quiz_question_id','$ans4','D')");
        }
        header('Location: quiz_question.php?id=' . $get_id);
    }?>
  </div>
<?php include('script.php'); ?>
<script>
$(function() {
         $('#qSelect').change(function(){
             $('.qDivSelect').hide();
             $('#' + $(this).val()).show();
         });
     });
</script>
</body>
</html>
