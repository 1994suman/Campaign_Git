<?php  
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With"); 
?>
<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html>

<head>
	<title>Admin Dashboard</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
	<link rel="stylesheet" href="Campain/Campain.css" />
<style>

</style>
</head>

<body>
	<header>
		<h1><span class="i">C</span><span class="b">a</span><span class="u">m</span><span class="y">p</span><span
				class="i">a</span><span class="i">i</span><span class="u">g</span><span class="u">n</span></h1>

<style type="text/css">

</style>
	</header>
	<img src="image\3.jpg" alt="Banner" />
	<main>
		<?php
			if(isset($_SESSION["myMessage"])){
			echo "<div class='success-msg'>
			<i class='fa fa-check'></i>
			".$_SESSION["myMessage"]."
			</div>";
			unset($_SESSION['myMessage']);
		}

		?>
<div class="page-header clearfix">
		<h1>Create Campaign</h1>
		<a href="index.php" class="btn btn-success pull-right">Logout</a>
		<a href="User _View_campain.php" class="btn btn-success pull-right">See your Campaign</a>
        
		</div>
		<p>You are logged in as <?php echo $_SESSION["username"]?>
		<div class="container" id = 'inputfields'>
	<form method="post" action="Campain_action.php">
	
			<label for="type">Choose campaign type:</label>
			<select id='type' name='type' >
            <option value="Social">Social Media Campaign</option>
				<option value='Business'>Blog Campaign</option>
				<option value='Business'>Campaign</option>
				<option value='Business'>ADS Campaign</option>
			  </select>
		<label for="qtext">Enter Campaign:</label>
			<input type="text" id="Campain" placeholder="Enter Your campaign" name="Campain" required>
			
		<p class="qmult" id="qmult" style="display: none;">
			<input type="text" id="option_title" placeholder="Enter Option" name="option_title[]"><br>
		</p>
		<div class="submit_answer" style="postion: relative;">
									<button type="Submit" class="button">Submit</button>
		</div>

	</form>
		</div>

		<h1>Create Business Campaign</h1>
		<br>
		<div class="container" id = 'inputfields'>
	<form method="post" action="Campain_action.php">
	
			<label for="type">Campaign type:</label>
			<select id='type' name='type' >
            <option value="business">Business Campaign</option>
			  </select>
		<label for="qtext">Enter your Business Campaign:</label>
			<input type="text" id="Campain" placeholder="Enter Your campaign" name="Campain" required>
			
		<p class="qmult" id="qmult" style="display: none;">
			<input type="text" id="option_title" placeholder="Enter Option" name="option_title[]"><br>
		</p>
		<div class="submit_answer" style="postion: relative;">
									<button type="Submit" class="button">Submit</button>
		</div>

	</form>
		</div>
				

		<footer>
			&copy; Campaign 2020
		</footer>
	</main>
<script type="text/javascript">
</script>
</body>
</html>