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
				<div class="col s2 right">
					<form method="post" id="addRating">
				    <p class="range-field">
				      <input type="range" name="rating" id="rating" min="0" max="5" />
				    </p>
						<button class="btn waves-effect waves-light" type="submit" name="submitRating">Rate
						</button>
				  </form>
				</div>
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
			  $sql = "SELECT pictureid, owner,PictureData, Rating, Description FROM FinPicture WHERE pictureid = $picId";
			  $result = $conn->query($sql);

			  if ($result->num_rows > 0) {
			      // output data of each row
			      while($row = $result->fetch_assoc()) {
			        echo "<br> owner: ". $row["owner"]. "<br>";
			        echo '<img style="width:80%;" src="data:image/jpeg;base64,'.( $row['PictureData'] ).'"/>' ;
			        echo "<br> ". $row["Description"]. "<br>";
							echo "<a class='yellow right'>User rating: ".$row['Rating']."</a>";
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
			        echo "<br>". $row["Owner"]. "<br>";
			        echo $row["Content"];
							echo '</p></li>';
			      }
			  }
				if ($_SERVER["REQUEST_METHOD"] == "POST") {
					if(isset($_POST["submitComment"])){
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
					} else if(isset($_POST["submitRating"])){
						$rating = mysqli_real_escape_string($conn, $_POST['rating']);
						$owner = "User1"; //TODO THIS SHOULD BE THE OWNER OF THE RATING,NOT PICTURE.

						$sql = "SELECT Owner, Picture FROM FinUserRating WHERE `FinUserRating`.`Owner` = '$owner' AND `FinUserRating`.`Picture` = '$picId'";

					  $result = $conn->query($sql);
						$rowcount=mysqli_num_rows($result);
					  if ($rowcount > 0) {
							$query = "UPDATE `FinUserRating` SET `Rating` = '$rating' WHERE `FinUserRating`.`Owner` = '$owner' AND `FinUserRating`.`Picture` = '$picId'";
							if(mysqli_query($conn, $query)){
								$msg =  "you rated me.<p>";
							} else{
								echo "ERROR: Could not able to execute $query. " . mysqli_error($conn);
							}
						} else {
							debug_to_console("new entry");
							$query = "INSERT INTO `FinUserRating` (`Owner`, `Rating`, `Picture`) VALUES ('$owner', '$rating', '$picId')";
							if(mysqli_query($conn, $query)){
								$msg =  "you rated me.<p>";
							} else{
								echo "ERROR: Could not able to execute $query. " . mysqli_error($conn);
							}
						}
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
						<button class="btn waves-effect waves-light submit" type="submit" name="submitComment">Submit
							<i class="material-icons right">send</i>
						</button>
						<button class="btn waves-effect waves-light submit" type="reset" name="action">Reset
							<i class="material-icons right">clear</i>
						</button>
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
