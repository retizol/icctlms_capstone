<?php
include '../includes/dbh.inc.php';
include 'session.php';

if (isset($_POST['upload'])){
$name=$_POST['title'];
$filedesc=$_POST['inst'];

$input_name = basename($_FILES['uploaded_file']['name']);

if ($input_name == ""){
				$id=$_POST['selector'];
				$N = count($id);
				for($i=0; $i < $N; $i++)
				{
						mysqli_query($conn,"INSERT INTO assignment (teacher_id, class_id,title,instruction,date_added) VALUES ('$usrid','$id[$i]','$name','$filedesc', NOW())");
						//mysqli_query($conn,"INSERT INTO notification (teacher_class_id,date_of_notification,link) VALUES ('$id[$i]',NOW(),'assignment_student.php')")or die(mysqli_error());
				 }
				 header('location: add_assignment.php?status=success');
}else{
			$rd2 = mt_rand(1000, 9999) . "_upl";
			$filename = basename($_FILES['uploaded_file']['name']);
			$ext = substr($filename, strrpos($filename, '.') + 1);
			$newname = "uploads/" . $rd2 . "_" . $filename;
			//$name_notification  = 'Add Assignment file name'." ".'<b>'.$name.'</b>';
			(move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $newname));
				$id=$_POST['selector'];
				$N = count($id);
				for($i=0; $i < $N; $i++)
				{
					mysqli_query($conn,"INSERT INTO assignment (teacher_id, class_id, title, instruction, floc, date_added) VALUES ('$usrid', '$id[$i]', '$name', '$filedesc', '$newname', NOW())");
					//mysqli_query($conn,"insert into notification (teacher_class_id,notification,date_of_notification,link) value('$id[$i]','$name_notification',NOW(),'assignment_student.php')")or die(mysqli_error());
				}
				header('location: add_assignment.php?status=success');
			}
}
