

<?php
  include_once 'header.php';
  include_once 'navbarsession.php';

  echo '<div style= "margin-top: 110px"></div>';
$sql = "SELECT usersId, usersCID, usersFName, usersLName FROM users";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {

    echo "id: " . $row["usersId"]. " - role: " . $row["usersCID"]. " - Name: " . $row["usersFName"]. " " . $row["usersLName"]. "<br>";
  }
} else {
  echo "0 results";
}
mysqli_close($conn);

echo "<br> session id - " . session_id();
echo '<pre><br>';
var_dump($_SESSION);
echo '</pre>';


echo $_SESSION["userid"] . '<br>';
echo $_SESSION["useruid"] . "<br>";
echo $_SESSION["usercid"] . "<br>";
echo $_SESSION["userfname"] . "<br>";
echo $_SESSION["userlname"] . "<br>";
echo $_SESSION["useremail"] . "<br>";

echo $usrfname . "<br>";

function generateRandomString($length = 6) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

echo generateRandomString();

include_once 'footer2.php';
 ?>
