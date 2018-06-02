<!DOCTYPE html>
<!-- Add Part Info to Table Part -->


<?php
		$currentpage="Sign Up";
		include "pages.php";

?>
<html>
	<head>
		<title>Sign Up</title>
		<?php include 'css.php';?>
		<script type = "text/javascript"  src = "verifyInput.js" > </script>
	</head>
<body>

<?php
	include "header.php";
	$msg = "Add new user to the database.";

// change the value of $dbuser and $dbpass to your Username and password
	include 'connectvars.php';

	function generateRandomSalt(){
		return base64_encode(mcrypt_create_iv(12, MCRYPT_DEV_URANDOM));
	}
	$salt = generateRandomSalt();
	$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	if (!$conn) {
		die('Could not connect: ' . mysql_error());
	}
	if ($_SERVER["REQUEST_METHOD"] == "POST") {

// Escape user inputs for security
		$Username = mysqli_real_escape_string($conn, $_POST['Username']);
		$firstName = mysqli_real_escape_string($conn, $_POST['firstName']);
		$lastName = mysqli_real_escape_string($conn, $_POST['lastName']);
		$email = mysqli_real_escape_string($conn, $_POST['email']);
		$password = mysqli_real_escape_string($conn, $_POST['password']);




// See if Username is already in the table
$queryIn = "SELECT * FROM FinUser where Username='$Username' ";
$resultIn = mysqli_query($conn, $queryIn);
if (mysqli_num_rows($resultIn)> 0) {
	$msg ="<h2>Can't Add to Table</h2> There is already a user with Username $Username<p>";
} else {

// attempt insert query

	$query = "INSERT INTO FinUser (Username, firstName, lastName, email, password) VALUES ('$Username', '$firstName', '$lastName', '$email', '$password')";
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
	<legend>User Info:</legend>
    <p>
        <label for="uName">Username:</label>
        <input type="text" min=1 max = 20 class="required" name="Username" id="Username" title="Username should be alphanumeric">
    </p>
    <p>
        <label for="fName">First Name:</label>
        <input type="text" min=1 max = 20 class="required" name="firstName" id="firstName">
    </p>

    <p>
        <label for="lsName">Last Name:</label>
        <input type="text" min=1 max = 20 class="required" name="lastName" id="lastName">
			</p>
			<p>
					<label for="emailAddr">Email:</label>
					<input type="text" min=1 max = 40 class="required" name="email" id="email">
				</p>
				<p>
						<label for="pw">Password:</label>
						<input type="text" min=1 max = 40 class="required" name="password" id="password"> (Must be at least 6 characters with at least 1 digit, 1 uppercase letter, and 1 lowercase letter)
					</p>

</fieldset>

      <p>
        <input type = "submit"  value = "Submit" />
        <input type = "reset"  value = "Clear Form" />
      </p>
</form>
</body>
</html>
