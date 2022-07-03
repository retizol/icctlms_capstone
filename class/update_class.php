<?php
include '../includes/dbh.inc.php';
include '../session.php';


$class_id=$_GET['updateclass_id'];
$sql="Select * from `create_class` where class_id=$class_id";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$class_name=$row['class_name'];
$class_description=$row['class_description'];
$class_grade=$row['class_grade'];
$class_subject=$row['class_subject'];


if(isset($_POST['submit'])){
    $class_name=$_POST['class_name'];
    $class_description=$_POST['class_description'];
    $class_grade=$_POST['class_grade'];
    $class_subject=$_POST['class_subject'];

    $sql="UPDATE `create_class` set class_id=$class_id,class_name='$class_name',class_description='$class_description',class_grade='$class_grade',class_subject='$class_subject' where class_id=$class_id";
    $result=mysqli_query($conn,$sql);
    if($result){
       echo "Updated successfully";
      header('location:teacher_classes.php');
    }else{
        die(mysqli_error($conn));
    }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>ICCT-OLMS </title>
  </head>
  <body>







  <form method="post">
    <div class="container my-5">




          <div class="form-group">
          <label>Class Name</label>
          <input type="text" class="form-control" name="class_name" placeholder="Name your Class" value=<?php echo $class_name;?>>
          </div>
          <div class="form-group">
          <label>Class Description</label>
          <input type="text" class="form-control" name="class_description" placeholder="Describe your class - Max. 260 characters" value=<?php echo $class_description;?>>
          </div>
          <div class="form-group">
            <label>Class Grade</label>
            <select class="form-control" name="class_grade" placeholder="Select a Grade" value=<?php echo $class_grade;?>>
              <option selected>Select a Grade</option>
              <option value="NONE">NONE</option>
              <option value="1ST YEAR">1ST YEAR</option>
              <option value="2ND YEAR">2ND YEAR</option>
              <option value="3RD YEAR">3RD YEAR</option>
              <option value="4TH YEAR">4TH YEAR</option>
              <option value="5TH YEAR">5TH YEAR</option>
              <option value="GRADE 11">GRADE 11</option>
              <option value="GRADE 12">GRADE 12</option>
            </select>
          </div>
          <div class="form-group">
            <label>Class Subject</label>
            <select class="form-control" name="class_subject" placeholder="Select Subject" value=<?php echo $class_subject;?>>
              <option selected>Select Subject</option>
              <option value="All">All</option>
              <option value="Computer Technology">Computer Technology</option>
              <option value="Creative Arts">Creative Arts</option>
              <option value="Health and PE">Health and PE</option>
              <option value="Language Arts">Language Arts</option>
              <option value="Language Arts">Mathematics</option>
              <option value="Professional Development">Professional Development</option>
              <option value="Science">Science</option>
              <option value="Social Studies">Social Studies</option>
              <option value="Special Education">Special Education</option>
              <option value="Vocational Studies">Vocational Studies</option>
              <option value="World Languages">World Languages</option>
            </select>
            </div>
          <button type="submit" class="btn btn-primary" name="submit">Update</button>
          <a href="teacher_classes.php"><button type="button"  class="btn btn-danger" data-dismiss="modal">Back</button> </a>
      </div>
  </form>
  </body>
</html>
