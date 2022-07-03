<?php

if (isset($_POST['submitsc'])){
  if(!empty( $_POST['class_id']) && !empty( $_POST['class_code']) && !empty( $_POST['class_name']) && !empty( $_POST['class_description']) && !empty( $_POST['class_grade']) && !empty( $_POST['class_subject']) && !empty( $_POST['usersId'])  ){
      $class_id = $_POST['class_id'];
      $class_code = $_POST['class_code'];
      $class_name = $_POST['class_name'];
      $class_description = $_POST['class_description'];
      $class_grade = $_POST['class_grade'];
      $class_subject = $_POST['class_subject'];
      $usersId = $_POST['usersId'];

      $query = $sql = "INSERT INTO teacher_class_student (class_id, class_code, class_name, class_description, class_grade, class_subject, usersId) VALUES ('$class_id', '$class_code', '$class_name','$class_description','$class_grade','$class_subject','$usersId')";
      $query_run = mysqli_query($conn, $query);

      if ($query_run){
        // echo " Form submitted successfully";
        header('location:student_classes.php');

      }
      else{
        echo "form Not submitted";
      }
  }

  else {
    echo " all fields required";
  }
}


?>
