<?php
session_start();
if($_SESSION['Username'] == NULL){
  
header("location: logIn.php?user=");
}

 ?>
<!DOCTYPE html>
<!-- Add Part Info to Table Part -->
<html>
	<head>
		<title>	My Uploads</title>
		<?php include 'css.php';?>

	</head>
<body>




	<?php include 'header.php';?>

	<section>
    <h2> <?php
    echo htmlspecialchars($_SESSION['Username']);?>'s Pictures </h2>
		<div class="row">
			<?php
		    // Create connection
		    include 'connectvars.php';
		    $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
		    // Check connection
        $na = $_SESSION['Username'];
		    if ($conn->connect_error) {
		        die("Connection failed: " . $conn->connect_error);
		    }

		    $sql = "SELECT pictureid, owner,PictureData,Description FROM FinPicture WHERE owner = '$na'";
		    $result = $conn->query($sql);
		    if ($result->num_rows > 0) {
		        // output data of each row
		        while($row = $result->fetch_assoc()) {
							echo '<div class="col m4">';
		          //echo "owner: ". $row["owner"]. "<br>";
							//echo '<a href="image?pictureId='.( $row['pictureid'] ).'">';
		          echo '<img style="padding-top:20px; padding-bottom:20px;" id='.( $row['pictureid'] ).' class="materialboxed responsive-img" data-caption="'.( $row['Description'] ).'" width="300" src="data:image/jpeg;base64,'.( $row['PictureData'] ).'"/>';
							//echo '</a>';
							echo '</div>';
		        }
		    } else {
		        echo "0 results";
		    }
		    $conn->close();
    	?>
		</div>
</body>
<script>
$(document).ready(function(){
	$('.materialboxed').materialbox();

});
</script>
</html>
