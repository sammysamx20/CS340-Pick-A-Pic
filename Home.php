<!DOCTYPE html>
<!-- Add Part Info to Table Part -->
<html>
	<head>
		<title>Home</title>
		<link rel="stylesheet" href="index.css">

	</head>
<body>




	<?php include 'header.php';?>
	<section>
    <h2> Pictures </h2>
<?php
    // Create connection
    include 'connectvars.php';
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT pictureid, owner,PictureData FROM FinPicture";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "pictureid: " . $row["pictureid"]. " - Owner: " . $row["owner"]. " - Picture: " . $row["PictureData"]."<br>";
        }
    } else {
        echo "0 results";
    }
    $conn->close();
    ?>
</body>
</html>
