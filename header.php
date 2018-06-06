<?php
session_start();


 ?>

	<nav>
    <div class="nav-wrapper">
			<a href='Home.php?user=' class="brand-logo hide-on-med-and-down">Pick-A-Pic - <em>Welcome <span> <?php echo htmlspecialchars($_SESSION['Username']);?></span>!</em></a>
	 			<ul id="nav-mobile" class="right">
				<li><a href='Home.php?user=' >Home</a></li>
				<li><a href='Signup.php?user=' >Sign up</a></li>
				<li><a href='listUsers.php?user='  >List Users</a></li>
				<li><a href='logIn.php?user=' >Log In</a></li>
				<li><a href='Search.php?user=' >Search</a></li>
				<li><a href='Upload.php?user=' >Upload</a></li>
				<li><a href='MyUploads.php?user=' >My Uploads</a></li>
				<li><a href="logout.php?user=">Log Out</a></li>
      </ul>
    </div>
  </nav>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="js/materialize.js"></script>
