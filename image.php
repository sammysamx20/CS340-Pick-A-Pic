<?php
session_start();


 ?>
<!DOCTYPE html>
<!-- Add Part Info to Table Part -->
<?php
		$currentpage="View image";
?>
<?php
// Create connection
include 'connectvars.php';
$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
// Check connection
if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
}
$picId = $_GET['pictureId'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if(isset($_POST["submitComment"])){
    // Escape user inputs for security
    $comment = mysqli_real_escape_string($conn, $_POST['Comment']);
    $owner =  $_SESSION['Username']; //TODO
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
    $owner = $_SESSION['Username']; //TODO THIS SHOULD BE THE OWNER OF THE RATING,NOT PICTURE.

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
      $query = "INSERT INTO `FinUserRating` (`Owner`, `Rating`, `Picture`) VALUES ('$owner', '$rating', '$picId')";
      if(mysqli_query($conn, $query)){
        $msg =  "you rated me.<p>";
      } else{
        echo "ERROR: Could not able to execute $query. " . mysqli_error($conn);
      }
    }
  } else if (isset($_POST["submitTag"])){
    $tag = mysqli_real_escape_string($conn, $_POST['tagContent']);

    $resultIn = mysqli_query($conn, $queryIn);
    $query = "INSERT INTO `FinTagInstance` (`pictureID`, `tagName`) VALUES ('$picId', '$tag')";
    if(mysqli_query($conn, $query)){
      //$msg =  "Record added successfully.<p>";
    } else{
      echo "ERROR: Could not able to execute $query. " . mysqli_error($conn);
    }
  } else if (isset($_POST["submitFavourite"])){
    $picId = $_GET['pictureId'];
    $owner = $_SESSION['Username']; //TODO THIS SHOULD BE THE OWNER OF THE un/FAVOURITE,NOT PICTURE.
    $sql = "SELECT pictureID, userID FROM FinFavourite WHERE `FinFavourite`.`pictureID` = '$picId' AND `FinFavourite`.`userID` = '$owner'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {	//They are unfavouriting
      $resultIn = mysqli_query($conn, $queryIn);
      $query = "DELETE FROM `FinFavourite` WHERE `FinFavourite`.`userID` = '$owner' AND `FinFavourite`.`pictureID` = '$picId'";
      if(mysqli_query($conn, $query)){
        //$msg =  "Record added successfully.<p>";
      } else{
        echo "ERROR: Could not able to execute $query. " . mysqli_error($conn);
      }
    } else {	//They are favouriting
      $resultIn = mysqli_query($conn, $queryIn);
      $query = "INSERT INTO `FinFavourite` (`userID`, `pictureID`) VALUES ('$owner', '$picId')";
      if(mysqli_query($conn, $query)){
        //$msg =  "Record added successfully.<p>";
      } else{
        echo "ERROR: Could not able to execute $query. " . mysqli_error($conn);
      }
    }
  } else if (isset($_POST["submitCommentDeletion"])){
    $cid = mysqli_real_escape_string($conn, $_POST['commentId']);

    $resultIn = mysqli_query($conn, $queryIn);
    $query = "DELETE FROM `FinComment` WHERE `FinComment`.`commentID` = '$cid'";
    if(mysqli_query($conn, $query)){
      //$msg =  "Record added successfully.<p>";
    } else{
      echo "ERROR: Could not able to execute $query. " . mysqli_error($conn);
      }
  }
  header("Location: " . $_SERVER['REQUEST_URI']);
}

$conn->close();
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
			<form method="post">
				<button style="position:absolute; top:0px; left:0px; box-shadow:none;" class="btn-floating transparent" type="submit" name="submitFavourite">
					<?php
					// Create connection
				  include 'connectvars.php';
				  $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
				  // Check connection
				  if ($conn->connect_error) {
				      die("Connection failed: " . $conn->connect_error);
				  }
					$picId = $_GET['pictureId'];
					$owner =  $_SESSION['Username']; //TODO make this do logged in user.
					$sql = "SELECT pictureID, userID FROM FinFavourite WHERE `FinFavourite`.`pictureID` = '$picId' AND `FinFavourite`.`userID` = '$owner'";
				  $result = $conn->query($sql);
				  if ($result->num_rows > 0) {
						echo '<i class="material-icons">favorite</i>';
				  } else {
						echo '<i class="material-icons">favorite_border</i>';
					}
					?>

				</button>
			</form>
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
							echo '</p>';
							if($row["Owner"] == $_SESSION['Username']){
								echo '<form method="post">';
								echo '<input type="hidden" name="commentId" id="commentId" value="'.$row["commentID"].'">';
								echo '<button style="position:absolute; top:0px; right:0px; box-shadow:none;" class="btn-floating transparent" type="submit" name="submitCommentDeletion">';
								echo '<i class="material-icons black-text">close</i>';
							}
							echo '</li>';
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
			<h5>
			<?php

			  // Create connection
			  include 'connectvars.php';
			  $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
			  // Check connection
			  if ($conn->connect_error) {
			      die("Connection failed: " . $conn->connect_error);
			  }
				$picId = $_GET['pictureId'];
			  $sql = "SELECT pictureID, tagName FROM FinTagInstance WHERE pictureID = $picId";
			  $result = $conn->query($sql);
				$firstTag = true;
			  if ($result->num_rows > 0) {
			      // output data of each row
			      while($row = $result->fetch_assoc()) {
							if($firstTag == true){
								$firstTag = false;
							} else if ($firstTag == false){
								echo ", ";
							}
			        echo $row["tagName"];
			      }
			  }
				?>
			</h5>
			<div class="row">
		    <form method="post" id="addTag" class="col s6">
		      <div class="row">
		        <div class="input-field col s6">
		          <i class="material-icons prefix">control_point</i>
							<input name="tagContent" id="tagContent" type="text" data-length="30">
		          <label for="tagContent">Tag Name</label>
		        </div>
						<button type="submit" name="submitTag" style="margin-top:20px;" class="waves-effect waves-teal btn-flat">Add</button>
		      </div>
		    </form>
		  </div>
		</div>
	</div>
</div>
</div>


</body>
</html>
