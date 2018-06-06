<!DOCTYPE html>
<!-- Add Part Info to Table Part -->
<html>
	<head>
		<title>Home</title>
		<?php include 'css.php';?>

	</head>
<body>




	<?php include 'header.php';
   include 'connectvars.php';


  ?>
	<section>

    <h2> Search </h2>
    <form action = "Search.php" method = "post">
  <input name="srch-box" type="text" id="srch-box" size="45" onClick="this.value='';" onFocus="this.select()" onBlur="this.value=!this.value?'Enter search term;" value="">
  <input type="submit" value="Search" name="btnSubmit" id ="submit" />
</form>
</form>
		<div class="row">

			<?php
		    // Create connection


        if(isset($_POST['btnSubmit']) && isset($_POST['srch-box'])){

            $type = $_POST['srch-box'];

              $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
             // Check connection
             if ($conn->connect_error) {
                 die("Connection failed: " . $conn->connect_error);
             }

             $sql = "SELECT P.pictureid, P.owner, P.PictureData, P.Description FROM FinPicture P WHERE P.Description LIKE '%$type%'";
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
        }else{
          $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
         // Check connection
         if ($conn->connect_error) {
             die("Connection failed: " . $conn->connect_error);
         }

         $sql = "SELECT P.pictureid, P.owner, P.PictureData, P.Description FROM FinPicture P";
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
        }

    	?>
		</div>
</body>
<script>
$(document).ready(function(){
	$('.materialboxed').materialbox();

});
</script>
</html>
