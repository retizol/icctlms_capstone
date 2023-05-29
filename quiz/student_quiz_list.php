<div class="">

  <table cellpadding="0" cellspacing="0" border="0" class="table" id="">
      <thead>
				<tr>
          <th>Quiz Title</th>
          <th>Description</th>
          <!--th>Quiz Time</th-->
          <th></th>
        </tr>
      </thead>
      <tbody>
        <?php
        $query = mysqli_query($conn,"SELECT * FROM class_quiz
				LEFT JOIN quiz on class_quiz.quiz_id = quiz.quiz_id
				where teacher_class_id = '$get_id'  order by class_quiz_id ASC ")or die(mysqli_error());
				while($row = mysqli_fetch_array($query)){
				$id  = $row['class_quiz_id'];
				$quiz_id  = $row['quiz_id'];
				$quiz_time  = $row['quiz_time'];

				$query1 = mysqli_query($conn,"SELECT * from student_class_quiz where class_quiz_id = '$id' and student_id = '$usrid'")or die(mysqli_error());
				$row1 = mysqli_fetch_array($query1);
				//$grade = $row1['grade'] ?? null;
        if (empty($row1['grade'])){
        ?>
        <tr>
          <td><?php echo $row['quiz_title']; ?></td>
          <td><?php  echo $row['quiz_description']; ?></td>
          <!--td></?php  echo $row['quiz_time'] / 60; ?> mins</td-->
          <td width="150">
            <a class="card-link" data-placement="bottom" title="Take This Quiz" id="</?php echo $id; ?>Download" href="take_test.php<?php echo '?id='.$get_id ?>&<?php echo 'class_quiz_id='.$id; ?>&<?php echo 'test=ok' ?>&<?php echo 'quiz_id='.$quiz_id; ?>&<?php echo 'quiz_time='.$quiz_time; ?> ">Take This Quiz</a>

            <!--?php if ($grade == ""){ ?>
              <a  data-placement="bottom" title="Take This Quiz" id="</?php echo $id; ?>Download" href="take_test.php</?php echo '?id='.$get_id ?>&</?php echo 'class_quiz_id='.$id; ?>&</?php echo 'test=ok' ?>&</?php echo 'quiz_id='.$quiz_id; ?>&</?php echo 'quiz_time='.$quiz_time; ?> ">Take This Quiz</a>
            </?php }else{ ?>
              <b></?php echo $grade; ?></b-->
            <?php } ?>
          </td>
          <script type="text/javascript">
          $(document).ready(function(){
            $('#<?php echo $id; ?>Take This Quiz').tooltip('show');
            $('#<?php echo $id; ?>Take This Quiz').tooltip('hide');
          });
          </script>
      </tr>
    <?php } ?>
  </tbody>
</table>

</div>
