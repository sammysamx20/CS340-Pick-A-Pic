<!DOCTYPE html>
<!-- Add Part Info to Table Part -->
<html>
	<head>
		<title>Log In</title>
		<link rel="stylesheet" href="index.css">

	</head>
<body>




	<?php include 'header.php';?>
	<section>
    <h2> Logging In </h2>

<form method="post" id="addForm">
<fieldset>
	<legend>Sign In!:</legend>
    <p>
        <label for="username">Username:</label>
        <input type="text"  class="required" name="username" id="username">
    </p>
  <p>
        <label for="password">Password:</label>
        <input type="text" class="required" name="password" id="password">
    </p>
</fieldset>

      <p>
        <input type = "submit"  value = "Submit" />
        <input type = "reset"  value = "Clear Form" />
      </p>
</form>
</body>
</html>
