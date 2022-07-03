<?php
include '../includes/dbh.inc.php';
include 'headerq.php';
include 'session.php';
$get_id = $_GET['id'];
?>

<body >
    <!--Quiz sidebar-->
    <a href="quiz_question.php<?php echo '?id='.$get_id; ?>" class="btn btn-success">Back</a>
    <div class="container" style="margin-top:150px">
      <div class="row">
        <div class="col-sm-3">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link text-secondary" id="details" href="#" onclick="divVisibility('Div1');">Quiz Details</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-secondary" id="questions" href="#" onclick="divVisibility('Div2');">Quiz Questions</a>
            </li>
          </ul>
        </div>
        <!--Quiz choice-->
        <div class="col-sm-9">
          <div class="container"  id="Div1">
            <div class="border rounded p-4 mb-4 bg-white">
              <h5>Quiz Details</h5>
              <hr>
              <form class="" action="index.html" method="post">
                <p>Quiz Title</p>
                <input class="form-control" type="text" name="" value="">
                <p class="mt-3">Instructions</p>
                <textarea class="form-control" name=""></textarea>
                <button type="button" name="button" class="btn btn-primary mt-3">Add Quiz</button>
              </form>
                    </div>
                  </div>




          <div class="container" id="" >
            <div class="border rounded p-4 mb-4 bg-white">
              <h5 >Questions</h5>
              <hr>


              <div class="mb-3">
                <select class="custom-select mb-3" id="qSelector" name="question_typee" required>
                  <option value="" disabled selected>Choose Question</option>
                  <?php
                  $query_question = mysqli_query($conn,"SELECT * from question_type")or die(mysqli_error());

                  while($query_question_row = mysqli_fetch_array($query_question))
                  {
                    echo $query_question_row['question_type']; }?>

                </select><?php var_dump($query_question); ?>
                <!--True or false-->
                <div class="mt-3 qDivSelect" id="1" style="display:none">
                  <form class="" action="index.html" method="post">
                    <p class="mt-2">Question</p>
                    <textarea class="form-control" name=""></textarea>

                    <div class="mt-3 form-check">
                      <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                      <label class="form-check-label" for="exampleRadios1">True
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                      <label class="form-check-label" for="exampleRadios2">False
                      </label>
                    </div>

                    <button type="button" name="button" class="btn btn-primary mt-3">Add Question</button>
                  </form>
                </div>
                <!--Multiple choice-->
                <div class="qDivSelect mt-3" id="2" style="display:none">
                  <form class="" action="index.html" method="post">
                    <p>Question</p>
                    <textarea class="form-control" name=""></textarea>
                    <p class="mt-2">Choices:</p>

                    <div class="form-check mb-2">
                      <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1">
                      <label class="form-check-label" for="exampleRadios1">
                        <input class="form-control" type="text" name="" value="">
                      </label>
                    </div>

                    <div class="form-check mb-2">
                      <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                      <label class="form-check-label" for="exampleRadios2">
                        <input class="form-control" type="text" name="" value="">
                      </label>
                    </div>

                    <div class="form-check mb-2">
                      <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios3" value="option3">
                      <label class="form-check-label" for="exampleRadios3">
                        <input class="form-control" type="text" name="" value="">
                      </label>
                    </div>

                    <div class="form-check mb-2">
                      <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios4" value="option4">
                      <label class="form-check-label" for="exampleRadios4">
                        <input class="form-control" type="text" name="" value="">
                      </label>
                    </div>

                    <button type="button" name="button" class="btn btn-primary mt-3">Add Question</button>
                  </form>
                </div>

              </div>
                    </div>
            </div>
            </div>
          </div>
      </div>
    <!--script-->
    <script>
       $(function() {
         $('#qSelector').change(function(){
             $('.qDivSelect').hide();
             $('#' + $(this).val()).show();
         });
     });


    </script>
    <?php include('script.php'); ?>
    </body>
</html>
