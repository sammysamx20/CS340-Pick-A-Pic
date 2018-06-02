<!DOCTYPE html>
<!-- Add Part Info to Table Part -->
<?php
		$currentpage="View image";
?>
<html>
	<head>
		<title>Image</title>
		<?php include 'css.php';?>

	</head>
<body>
<?php include 'header.php';?>

<div class="row">
  <div class="col s12" style="padding:20px;">
    <div class="card blue-grey darken-1">
      <div class="card-content white-text">
        <!--<span class="card-title">Pictures</span>-->

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
			        echo '<img style="width:80%;" src="data:image/jpeg;base64,'.( $row['PictureData'] ).'"/>' ;
			        echo "<br> ". $row["Description"]. "<br>";
			      }
			  } else {
			    echo "0 results";
			  }
			  echo "</div>";
				echo '<div class="card-action">';
				echo '<ul class="collection">';

				$picId = $_GET['pictureId'];
			  $sql = "SELECT commentID, pictureID, Content, Owner FROM FinComment WHERE pictureID = $picId";
			  $result = $conn->query($sql);

			  if ($result->num_rows > 0) {
			      // output data of each row
			      while($row = $result->fetch_assoc()) {
							$stringToHex = $row["Owner"];
							if (strlen($row["Owner"]) < 6){
								$stringToHex = "longerString";
							}
							$hex = '';
							for ($i=0; $i<strlen($row["Owner"]); $i++){
					        $ord = ord($row["Owner"][$i]);
					        $hexCode = dechex($ord);
					        $hex .= substr('0'.$hexCode, -2);
					    }
							$hex = substr($hex, -6);



							echo '<li class="collection-item avatar">';
      				echo '<i class="material-icons circle" style="background-color:#'.$hex.'">person_pin</i>';
      				echo '<p>';
			        echo "<br> owner: ". $row["Owner"]. "<br>";
			        echo $row["Content"];
							echo '</p></li>';
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
			<li class="collection-item">
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
			</li>
			</ul>
		</div>
	</div>
</div>
</div>


</body>
</html>
