<?php
	include_once 'headerindex.php';
	include_once 'navbarindex.php';
?>

<div style="padding-top: 110px;">
	<div class="container col-sm-3">
		<section>
		<h4>Sign up as a Student</h4>
		<form action="includes/signupstudent.inc.php" method="POST">
			<label for="first">Name</label>
			<input class="form-control" type="text" name="first" placeholder="First Name"><br>
			<input class="form-control" type="text" name="last" placeholder="Last Name"><br>
      <label for="email">E-mail</label>
			<input class="form-control" type="text" name="email" placeholder="e.g. icctacc@gmail.com">
			<br>
      <label for="uid">School ID no.</label>
			<input class="form-control" type="text" name="uid" placeholder="e.g. 20181234, CA202000123">
			<br>
      <label for="pwd">Password</label>
			<input class="form-control" type="password" name="pwd" placeholder="Password">
			<br>
			<input class="form-control" type="password" name="pwdrepeat" placeholder="Repeat Password">
			<br>
			<input type="hidden" name="CID" value="3"><br>
			<button class="btn btn-primary" type="submit" name="submit">Sign Up</button>
		</form>
		<?php

		//Getting query error from URL shown below the form
		if (isset($_GET['error'])) {
			if ($_GET['error'] == "emptyinput") {
				echo "<p>Fill in all fields!<p>";
				exit();
			}
			elseif ($_GET['error'] == "invaliduid") {
				echo "<p>You used invalid username!<p>";
				exit();
			}
			elseif ($_GET['error'] == "invalidEmail") {
				echo "<p>Choose a proper email!<p>";
				exit();
			}
			elseif ($_GET['error'] == "passwordsdontmatch") {
				echo "<p>Passwords doesn't match!<p>";
				exit();
			}
			elseif ($_GET['error'] == "stmtfailed") {
				echo "<p>Something went wrong, try again!<p>";
				exit();
			}
			elseif ($_GET['error'] == "usernametaken") {
				echo "<p>Username already taken!<p>";
				exit();
			}
			elseif ($_GET['error'] == "none") {
				echo "<p>You have signed up!<p>";
				exit();
			}
		}

	?>
		</section>

	</div>
</div>

<?php
	include_once 'footer2.php';

?>
