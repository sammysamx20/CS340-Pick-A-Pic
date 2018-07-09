<!DOCTYPE html>
<!-- Add Part Info to Table Part -->
<?php
		$currentpage="Sign Up";
?>
<html>
	<head>
		<title>Sign Up</title>
		<!--<link rel="stylesheet" href="index.css">-->
		<!--<script type = "text/javascript"  src = "verifyInput.js" > </script>-->
	</head>
<body>



<?php
// change the value of $dbuser and $dbpass to your username and password
	include 'databasevars.php';
	$msg = "Sign up for a new account!";


	$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	if (!$conn) {
		die('Could not connect: ' . mysql_error());
	}
	if ($_SERVER["REQUEST_METHOD"] == "POST") {

	function debug_to_console( $data ) {
    $output = $data;
    if ( is_array( $output ) )
        $output = implode( ',', $output);

    echo "<script>console.log( 'Debug Objects: " . $output . "' );</script>";
	}

// Escape user inputs for security
		$username = mysqli_real_escape_string($conn, $_POST['username']);
		$firstname = mysqli_real_escape_string($conn, $_POST['firstName']);
		$lastname = mysqli_real_escape_string($conn, $_POST['lastName']);
		$email = mysqli_real_escape_string($conn, $_POST['email']);
		$password = mysqli_real_escape_string($conn, $_POST['password']);
		$age = mysqli_real_escape_string($conn, $_POST['age']);

// See if pid is already in the table
$queryIn = "SELECT * FROM Users where username='$username' ";
$resultIn = mysqli_query($conn, $queryIn);
	if (mysqli_num_rows($resultIn)> 0) {
		$msg ="<h2>Can't Add to Table</h2> There is already a user with username $username<p>";
	} else {
		$salt = uniqid(mt_rand(), true);
		$salt = substr($salt,0,20);
		debug_to_console($password . $salt);
		debug_to_console(hash("Ripemd128", $password . $salt));
		$hashedPassword = hash("Ripemd128", $password . $salt);
		$query = "INSERT INTO `Users` (`username`, `firstName`, `lastName`, `email`, `password`, `age`, `salt`) VALUES ('$username', '$firstname', '$lastname', '$email', '$hashedPassword', '$age','$salt')";
		if(mysqli_query($conn, $query)){
			$msg =  "Record added successfully.<p>";
		} else{
			echo "ERROR: Could not able to execute $query. " . mysqli_error($conn);
		}
	}
}
// close connection
mysqli_close($conn);

?>
	<section>
    <h2> <?php echo $msg; ?> </h2>

<form method="post" id="addForm">
<fieldset>
	<legend>SIGN UP TODAY:</legend>
    <p>
        <label for="username">User Name:</label>
        <input type="text" class="required" name="username" id="username">
    </p>
		<p>
        <label for="firstName">First Name:</label>
        <input type="text" class="required" name="firstName" id="firstName">
    </p>
		<p>
        <label for="lastName">Last Name:</label>
        <input type="text" class="required" name="lastName" id="lastName">
    </p>
		<p>
        <label for="email">Email:</label>
        <input type="email" class="required" name="email" id="email">
    </p>
		<p>
        <label for="password">Password:</label>
        <input type="password" class="required" name="password" id="password">
    </p>
		<p>
        <label for="age">Age:</label>
        <input type="number" min=1 max = 120 class="optional" name="age" id="age" title="age should be numeric">
    </p>
	</fieldset>

    <p>
      <input type = "submit"  value = "Submit" />
      <input type = "reset"  value = "Clear Form" />
    </p>
</form>
</body>
<a href="./users.php" style="font-size:30pt">See the growing community - - > </a>
<br>
<a href="./login.php" style="font-size:30pt">Log in to your account - - > </a>

</html>
