<?php
$theId = $_POST['theId'];

 //Get the information you want, and turn it into an array called $data

 header('Content-Type: application/json');
 echo json_encode($data);
 ?>
