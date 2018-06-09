<?php
session_start();
if($_SESSION['Username'] == NULL){

header("location: logIn.php?user=");
}

 ?>
<!DOCTYPE html>
<?php
		$currentpage="List Users";
		include "pages.php";
?>
<html>
	<head>
		<title>List Users</title>
		<?php include 'css.php';?>
	</head>
<body>


<?php
// change the value of $dbuser and $dbpass to your username and password
	include 'connectvars.php';
	include 'header.php';

	$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	if (!$conn) {
		die('Could not connect: ' . mysql_error());
	}

// query to select all information from supplier table

$loggedUser = $_SESSION['Username'];

$query = "SELECT F.Followed, U.NumPics FROM FinFollow F, FinUser U WHERE Follower='$loggedUser' AND U.Username=F.Followed";

// Get results from query
	$result = mysqli_query($conn, $query);
	if (!$result) {
		die("Query to show fields from table failed");
	}
// get number of columns in table
	$fields_num = mysqli_num_fields($result);



	echo '<div class="row">';
		echo '<div class="col s12 m12">';
			echo '<div class="card grey lighten-1">';
				echo '<div class="card-content black-text">';
					echo "<h1>You are following:</h1>";
					echo "<table class='striped' id='t01' border='1'><tr>";
          for($i=0; $i<$fields_num; $i++) {
      						$field = mysqli_fetch_field($result);
        						echo "<td><b>$field->name</b></td>";
					// printing table headers
}
          if ($_SESSION['Username'] != NULL){

      //    echo "<td><b>Following</b></td>";
        }
					echo "</tr>\n";
        $na =  $_SESSION['Username'];
					while($row = mysqli_fetch_row($result)) {
						echo "<tr>";
						// $row is array... foreach( .. ) puts every element
						// of $row to $cell variable
						foreach($row as $cell)
							echo "<td>$cell</td>";

              if ($_SESSION['Username'] != NULL){


              echo "<form action='' method='POST'>";
          //    echo "<td><input name = 'follow' type='submit' value='Follow Me'/></td>";
              echo "</form>";




            }
            else{

            }

						echo "</tr>\n";
					}
          if (isset($_POST['follow'])) {
              // btnfollow

        $query = "INSERT INTO FinFollow (Follower,Followed) VALUES ('$na','$')  ";
      if(mysqli_query($conn, $query)){
        echo "<p>Record added successfully.</p>";
      } else{
        echo "ERROR: Could not able to execute $query. " . mysqli_error($conn);
      }
    }
				echo "</div>";
			echo "</div>";
		echo "</div>";
	echo "</div>";

	mysqli_free_result($result);
	mysqli_close($conn);
?>

</body>

</html>
