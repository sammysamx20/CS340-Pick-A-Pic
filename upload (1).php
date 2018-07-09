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
	include 'connectvars.php';
	$msg = "Sign up for a new account!";


	$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	if (!$conn) {
		die('Could not connect: ' . mysql_error());
	}
	if ($_SERVER["REQUEST_METHOD"] == "POST") {

	function debug_to_console( $data ) {
    $output = $data;

    echo "<script>console.log( 'Debug Objects: " . $output . "' );</script>";
	}

// Escape user inputs for security
$description = mysqli_real_escape_string($conn, $_POST['description']);
$img = $_FILES['file']['tmp_name'];
$filename = $_FILES['file']['size'];//not used

$image_data=file_get_contents($img);
$encoded_image=base64_encode($image_data);


debug_to_console($encoded_image);
$var = "im a variable";
debug_to_console($var);

$picID = 147553188;
$owner = "User1";

$resultIn = mysqli_query($conn, $queryIn);
$query = "INSERT INTO `FinPicture` (`pictureID`, `Description`, `Rating`, `PictureData`, `Owner`) VALUES ('$picID', '$description', NULL, '$encoded_image', '$owner')";
if(mysqli_query($conn, $query)){
	$msg =  "Record added successfully.<p>";
} else{
	echo "ERROR: Could not able to execute $query. " . mysqli_error($conn);
}
}
// close connection
mysqli_close($conn);

?>
	<section>
    <h2> <?php echo $msg; ?> </h2>

		<form enctype="multipart/form-data" method="post">
		    Upload this file: <input type="file" name="file" />
		    <input type="submit" value="Submit File" />
		</form>

</body>
<a href="./users.php" style="font-size:30pt">See the growing community - - > </a>
<br>
<a href="./login.php" style="font-size:30pt">Log in to your account - - > </a>

</html>
