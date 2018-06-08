<?php
session_start();

if($_SESSION['Username'] != NULL){

header("location: Home.php?user=");

}
 ?>
<!DOCTYPE html>
<!-- Add Part Info to Table Part -->
<html>
	<head>
		<title>Log In</title>
		<?php include 'css.php';?>

	</head>
<body>



	<?php

		$msg = "Logging In";

	// change the value of $dbuser and $dbpass to your Username and password
		include 'connectvars.php';

		$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
		if (!$conn) {
			die('Could not connect: ' . mysql_error());
		}
		if ($_SERVER["REQUEST_METHOD"] == "POST") {

	// Escape user inputs for security
			$Username = mysqli_real_escape_string($conn, $_POST['Username']);
	  $password = mysqli_real_escape_string($conn, $_POST['password']);



	// See if pid is already in the table
	$queryIn = "SELECT password FROM FinUser where Username='$Username' ";
	$resultIn = mysqli_query($conn, $queryIn);
	if ($row = mysqli_fetch_assoc($resultIn)){

	  $saltSql = "SELECT * FROM FinUser WHERE Username='$Username' AND password = '$password'";
	  $finalResult = mysqli_query($conn, $saltSql);
	  if($finalrow = mysqli_fetch_assoc($finalResult)){
	    echo "Success, you have logged in!";
			session_start();
	                             $_SESSION['Username'] = $Username;
                               

	}
	else{
	echo "Failed, please click the Log In tab and try again.";
}
		}
	else{
		echo "There is no $Username in our database";
	}

	}


	// close connection
	mysqli_close($conn);

	?>
	<?php include 'header.php';?>
	<section>
    <h2> Logging In </h2>

<form method="post" id="addForm">
<fieldset>
	<legend>Sign In!:</legend>
    <p>
        <label for="Username">Username:</label>
        <input type="text"  class="required" name="Username" id="Username">
    </p>
  <p>
        <label for="password">Password:</label>
        <input type="text" class="required" name="password" id="password">
    </p>
</fieldset>

      <p>
        <input type = "submit"  value = "Submit" />
        <input type = "reset"  value = "Clear Form" />
      </p>
</form>
</body>
</html>
