<?php
	require_once(dirname(dirname(__FILE__)) . '/includes/MySQLHandler.php');	
	$sSuccessMsg = "<div class=\"alert-box\">  You are not logged in.  <a href=\"\" class=\"close\">&times;</a></div>";
	if(isset($_POST['submit'])) {
		$username=$_POST['username'];
		$pwd=md5($_POST['passwd']);
		$sql="SELECT name,password FROM users WHERE name='$username' LIMIT 1";
		$result=mysqli_query($con,$sql);
		$row=mysqli_fetch_row($result);
		$sSuccessMsg = (!empty($result)&&isset($row[1])&&$row[1]==$pwd?
		"<div class=\"alert-box success\">Succesfully logged in.<a href=\"\" class=\"close\">&times;</a></div>":
		"<div class=\"alert-box alert\">Wrong user name or password.<a href=\"\" class=\"close\">&times;</a></div>");
	}
?><!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>Bricks Login Form #6</title>
  <!-- Included CSS Files (Uncompressed) -->
  <!--
  <link rel="stylesheet" href="../stylesheets/foundation.css">
  -->
  <!-- Included CSS Files (Compressed) -->
  <link rel="stylesheet" href="../stylesheets/foundation.min.css">
  <link rel="stylesheet" href="../stylesheets/app.css">
  <script src="../javascripts/modernizr.foundation.js"></script>
</head>
<body>
<div class="row">
	<div class="four columns centered">
		<br/><br/><a href="../index.php"><img src="../images/bricks.jpg" alt="Main Bricks Page"/></a><br/><br/>
		<form method="POST" action="index.php" enctype="application/x-www-form-urlencoded">
			<fieldset>
				<legend>Login</legend>
				<p><?php echo $sSuccessMsg;?></p>
				<p>Username: <input type="text" name="username" id="username" size="25" required/></p>
				<p>Password: <input type="password" name="passwd" id="passwd" size="25" required/></p>
				<p><input type="submit" class="small button" name="submit" id="submit" value="Submit"/></p>
			</fieldset>
		</form>
	</div><br/><br/><br/>
	<center>
		<?php 
			if($showhint === true && isset($sql)) { 
				echo '<div class="eight columns centered"><div class="alert-box secondary">SQL Query: ';
				echo $sql; 
				echo '<a href="" class="close">&times;</a></div></div>';			
			} 
      			if($showhint === true) { 
				echo '<p>&nbsp;</p>';
        			echo '<div class="eight columns centered"><div class="alert-box secondary">Hint: ';
				echo 'Does our database allows to contain duplicate names of Users?'; 
				echo '<a href="" class="close">&times;</a></div></div>';			
			} 
      			if($showhint === true) { 
				echo '<p>&nbsp;</p>';
        			echo '<div class="eight columns centered"><div class="alert-box secondary">Hint: ';
				echo 'Does MD5 fit for password protection?'; 
				echo '<a href="" class="close">&times;</a></div></div>';			
			} 
		?>
	</center>
</div>
  
  <!-- Included JS Files (Uncompressed) -->
  <!--
  
  <script src="../javascripts/jquery.js"></script>
  
  <script src="../javascripts/jquery.foundation.mediaQueryToggle.js"></script>
  
  <script src="../javascripts/jquery.foundation.forms.js"></script>
  
  <script src="../javascripts/jquery.foundation.reveal.js"></script>
  
  <script src="../javascripts/jquery.foundation.orbit.js"></script>
  
  <script src="../javascripts/jquery.foundation.navigation.js"></script>
  
  <script src="../javascripts/jquery.foundation.buttons.js"></script>
  
  <script src="../javascripts/jquery.foundation.tabs.js"></script>
  
  <script src="../javascripts/jquery.foundation.tooltips.js"></script>
  
  <script src="../javascripts/jquery.foundation.accordion.js"></script>
  
  <script src="../javascripts/jquery.placeholder.js"></script>
  
  <script src="../javascripts/jquery.foundation.alerts.js"></script>
  
  <script src="../javascripts/jquery.foundation.topbar.js"></script>
  
  <script src="../javascripts/jquery.foundation.joyride.js"></script>
  
  <script src="../javascripts/jquery.foundation.clearing.js"></script>
  
  <script src="../javascripts/jquery.foundation.magellan.js"></script>
  
  -->
  
  <!-- Included JS Files (Compressed) -->
  <script src="../javascripts/jquery.js"></script>
  <script src="../javascripts/foundation.min.js"></script>
  
  <!-- Initialize JS Plugins -->
  <script src="../javascripts/app.js"></script>

  
  
</body>
</html>
