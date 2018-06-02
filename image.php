<!DOCTYPE html>
<!-- Add Part Info to Table Part -->
<html>
	<head>
		<title>Image</title>
		<link rel="stylesheet" href="index.css">

	</head>
<body>

<?php include 'header.php';?>
	<section>
    <h2> Pictures </h2>
<?php
	function debug_to_console( $data ) {
		$output = $data;

		echo "<script>console.log( 'Debug Objects: " . $output . "' );</script>";
	}

  // Create connection
  include 'connectvars.php';
  $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }
	$picId = $_GET['pictureId'];
  $sql = "SELECT pictureid, owner,PictureData,Description FROM FinPicture WHERE pictureid = $picId";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        echo "<br> owner: ". $row["owner"]. "<br>";
        echo '<img src="data:image/jpeg;base64,'.( $row['PictureData'] ).'"/>' ;
        echo "<br> Description: ". $row["Description"]. "<br>";
      }
  } else {
    echo "0 results";
  }

	$picId = $_GET['pictureId'];
  $sql = "SELECT commentID, pictureID, Content, Owner FROM FinComment WHERE pictureID = $picId";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        echo "<br> owner: ". $row["Owner"]. "<br>";
          echo $row["Content"];
      }
  }
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		// Escape user inputs for security
		$comment = mysqli_real_escape_string($conn, $_POST['Comment']);
		$owner = "User1"; //TODO
		$comID = rand(10,10000000);

		$resultIn = mysqli_query($conn, $queryIn);
		$query = "INSERT INTO `FinComment` (`commentID`, `pictureID`, `Content`, `Owner`) VALUES ('$comID', '$picId', '$comment', '$owner')";
		if(mysqli_query($conn, $query)){
			//$msg =  "Record added successfully.<p>";
		} else{
			echo "ERROR: Could not able to execute $query. " . mysqli_error($conn);
		}
	}
  $conn->close();
?>

		<form method="post" id="addComment">
		<fieldset>
		  <p>
		    <label for="Comment">Add comment:</label>
		    <input type="text" class="required" name="Comment" id="Comment">
		  </p>
		</fieldset>
	    <p>
	      <input type = "submit"  value = "Submit" />
	      <input type = "reset"  value = "Clear Form" />
	    </p>
		</form>
</body>
</html>
