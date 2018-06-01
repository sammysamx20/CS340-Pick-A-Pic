<!DOCTYPE html>
<!-- Add Part Info to Table Part -->
<html>
	<head>
		<title>Sign up</title>
		<link rel="stylesheet" href="index.css">
		<script type = "text/javascript"  src = "verifyInput.js" > </script>
	</head>
<body>




<?php include 'header.php';?>
	<section>
    <h2> Signing up for an Account </h2>

<form method="post" id="addForm">
<fieldset>
	<legend>Sign Up for an Account!:</legend>
    <p>
        <label for="username">Username:</label>
        <input type="text"  class="required" name="username" id="username">
    </p>
    <p>
        <label for="firstName">First Name:</label>
        <input type="text" class="required" name="firstName" id="firstName">
    </p>
    <p>
        <label for="lastName">Last Name:</label>
        <input type="text" class="required" name="lastName" id="lastName">
    </p>
    <p>
        <label for="email">Email:</label>
        <input type="text" class="required" name="email" id="email">
    </p>
    <p>

        <label for="password">Password:</label>
        <input type="text" class="required" name="password" id="password">
        At least 6 characters, one uppercase letter, one lowercase letter, and one digit
    </p>
    <p>
        <label for="age">Age:</label>
        <input type="number" min=1 max = 99999 class="optional" name="age" id="age" title="age should be numeric">
</fieldset>

      <p>
        <input type = "submit"  value = "Submit" />
        <input type = "reset"  value = "Clear Form" />
      </p>
</form>
</body>
</html>
