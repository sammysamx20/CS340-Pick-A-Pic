<?php
session_start();
if($_SESSION['Username'] == NULL){

header("location: logIn.php?user=");
}
 ?>
<!DOCTYPE html>
<!-- Add Part Info to Table Part -->
<?php
		$currentpage="Sign Up";
?>
<html>
	<head>
		<title>Upload</title>
		<?php include 'css.php';?>

	</head>
<body>

<?php
ini_set('post_max_size', '64M');
ini_set('upload_max_filesize', '64M');
// change the value of $dbuser and $dbpass to your username and password
	include 'connectvars.php';
  include 'header.php';

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
  if ($_FILES['file']['error'] !== UPLOAD_ERR_OK) {
   die("Upload failed with error code " . $_FILES['file']['error']);
}
  $info = getimagesize($img);
  if($info === false){

    echo "<script type='text/javascript'>";
    echo "alert('ERROR: Can't determine image type for file')";
    echo "</script>";
        header("Location: Upload.php?user=");
      die("Unable to determine image type of uploaded file");

  }
  if (($info[2] !== IMAGETYPE_GIF) && ($info[2] !== IMAGETYPE_JPEG) && ($info[2] !== IMAGETYPE_PNG)) {

    echo "<script type='text/javascript'>";
    echo "alert('ERROR: Not an image type!')";
    echo "</script>";
    die("Not a gif/jpeg/png");

  }
  if($_FILES['file']['size'] > 10000000){
    die('File uploaded exceeds maximum upload size.');
}
	debug_to_console($img);

  $image_data=file_get_contents($img);
  $encoded_image=base64_encode($image_data);

  $picID = rand(10,10000000);
  $owner = $_SESSION['Username'];

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
		<div class="row">
			<div class="col s12 m12">
				<div class="card  light-green lighten-5">
	        <div style="padding-top:20px; padding-left:20px;">
	          <p class="card-title">Upload an image</p>
	        </div>
					<form enctype="multipart/form-data" method="post">
						<div class="card-content">
							<a style="height: 100%;" class="waves-effect waves-light btn">
								<div class="file-field input-field">
									<div class="btn">
										<span>File</span>
										<input name="file" class="file" type="file">
									</div>
									<div class="file-path-wrapper">
										<input class="file-path validate" type="text" placeholder="Upload one or more files">
									</div>
								</div>
							</a>
							<p>
			          <label for="description">Description:</label>
			          <input type="text"  name="description" id="description">
			        </p>
		        </div>
						<div class="card-action">
							<button class="btn waves-effect waves-light submit" type="submit" name="action">Submit
						    <i class="material-icons right">send</i>
						  </button>
						</div>
					</form>
	      </div>

			</div>
		</div>

</body>

</html>
