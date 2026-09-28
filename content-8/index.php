<?php
	require_once(dirname(dirname(__FILE__)) . '/includes/MySQLHandler.php');
	
	if(isset($_POST['withdrawn'])) {
		$sql = "UPDATE accounts SET coins = (SELECT coins-10.00 FROM accounts WHERE name = 'balance' AND idaccounts = 1) WHERE idaccounts = 1";
		$result=mysqli_query($con,$sql);
	}
	if(isset($_POST['restore'])) {
		$sql = "DELETE FROM accounts WHERE idaccounts=1";
		$result=mysqli_query($con,$sql);
		$sql = "INSERT INTO accounts (idaccounts, name, coins) VALUES (1, 'balance', '500.00')";
		$result=mysqli_query($con,$sql);
	}
	
	$sql_main = "SELECT idaccounts, name, coins FROM accounts WHERE idaccounts = 1";
	$result_main=mysqli_query($con,$sql_main);
?><!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <!-- Set the viewport width to device width for mobile -->
  <meta name="viewport" content="width=device-width">
  <title>Bricks Content Page #8</title>
  <!-- Included CSS Files (Uncompressed) -->
  <!--
  <link rel="stylesheet" href="../stylesheets/foundation.css">
  -->  
  <!-- Included CSS Files (Compressed) -->
  <link rel="stylesheet" href="../stylesheets/foundation.min.css">
  <link rel="stylesheet" href="../stylesheets/app.css">
  <script src="../javascripts/modernizr.foundation.js"></script>
  <!-- IE Fix for HTML5 Tags -->
  <!--[if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script>
  <![endif]-->
  <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
</head>
<body>
<div class="row">
	<div class="four columns centered">
		<br/><br/><a href="../index.php"><img src="../images/bricks.jpg" alt="Main Bricks Page"/></a>
		<form method="post" action="<?php echo $_SERVER["SCRIPT_NAME"]; ?>">
		<fieldset>
			<legend>Details</legend>
					<?php 
							if ($content = mysqli_fetch_array($result_main)) {
								echo '<br/>AID: <b>'. $content['idaccounts'].'</b><br/><br/>';
								echo 'Name: <b>'. $content['name'].'</b><br/><br/>';
								echo 'Coins: <b>'. $content['coins'].'</b><br/><br/>';
							} else if (!$result) {
								echo("Database query failed: " . mysqli_error($con));
								} else {		
								echo 'Error! Records does not exists';
							}
					?><br/>
				<p><input type="submit" name="withdrawn" class="button" value="To withdrawn 10 EUR" /></p>
				<p><input type="submit" name="restore" class="button" value="To defaults" /></p>
		</fieldset>
		</form><br/>
	</div><br/><br/><br/>
	<center>
		<?php 
			if($showhint === true && isset($sql)) { 
				echo '<div class="eight columns centered"><div class="alert-box secondary">SQL Query: ';
				echo $sql; 
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
