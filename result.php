<?php
  session_start();
 ?>
 <!doctype html>
 <html>
  	<head>
	  <meta charset="utf-8">
	  <title>Table of results</title>

	  <!-- call bootstrap -->
	  <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet">
	</head>
	<body style="padding:70px 0 140px 0">
	  <div style="padding-bottom:100px" class="container">
	  		<div class="col-md-12">
	  			<hr>
	  				<div> 
	  					<b> Responses of the questionnaire </b>
	  				</div>
	  			<hr>
	  		</div>
	  	</div> 
	  </div>

	  	<!-- CONTENT -->
	  <div class="container">
		<?php
		$errors = array(); // table of errors
		if(!array_key_exists('answer1', $_POST) || $_POST['answer1'] == '') { // We check if answer 1 is set
		    $errors ['answer1'] = "answer 1 is required";
		}
		if(!array_key_exists('answer2', $_POST) || $_POST['answer2'] == '') { // We check if answer 2 is set
		    $errors ['answer2'] = "answer 2 is required";
		}
		if(!array_key_exists('answer3', $_POST) || $_POST['answer3'] == '') { // We check if answer 3 is set
		    $errors ['answer3'] = "answer 3 is required";
		}
		if(!array_key_exists('email', $_POST) || $_POST['email'] == '' || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){ // We check if email is set
		    $errors ['email'] = "Email is required";
		}


		if(!empty($errors)){
		    $_SESSION['errors'] = $errors;
			// if array contains errors, user is redirected to answer.php
		    header('Location: answer.php');
		}
		else{
			//If there are no errors, survey is inserted in database
			//DATABASE
			$servername = "localhost";
			$username = "root"; //login by default in phpmyadmin
			$password = "";
			$dbname = "surveyproject"; //name of the database

			// Create connection to database
			$conn = mysqli_connect($servername, $username, $password, $dbname);

			// Check connection
			if (!$conn) {
			    die("Connection failed: " . mysqli_connect_error());
			}

			// Permit to insert string with special characters
			$email = mysqli_real_escape_string($conn,$_POST['email']);
			$question1 = mysqli_real_escape_string($conn,$_SESSION['inputs']['question1']);
			$answer1 = mysqli_real_escape_string($conn,$_POST['answer1']);
			$question2 = mysqli_real_escape_string($conn,$_SESSION['inputs']['question2']);
			$answer2 = mysqli_real_escape_string($conn,$_POST['answer2']);
			$question3 = mysqli_real_escape_string($conn,$_SESSION['inputs']['question3']);
			$answer3 = mysqli_real_escape_string($conn,$_POST['answer3']);

			$survey = array();
			$survey[0]['question'] = "$question1";
			$survey[0]['response'] = "$answer1";
			$survey[1]['question'] = "$question2";
			$survey[1]['response'] = "$answer2";
			$survey[2]['question'] = "$question3";
			$survey[2]['response'] = "$answer3";

			//Create the SQL request and insert in database
			foreach ($survey as $line) {
				$sql = "INSERT INTO `Questionnaire` (`email`, `question`, `answer`)
				VALUES ('$email','$line[question]','$line[response]')";

				if (mysqli_query($conn, $sql)) {
			    	echo "<script>console.info('New record created successfully')</script>"; //Notify in console the insert in database
				} 
				else {
			    	echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			    	echo "<br>";
				}
			}

			// Select results to show a table with responses
			$res = mysqli_query($conn, "SELECT * FROM Questionnaire");
			$rows = mysqli_fetch_all($res);

			echo "<div 'class=table-striped'>";
			echo "<table class ='table'>";
			echo "<tr><th> Email </th> <th> Questions </th> <th> Reponses </th></tr>";

			foreach ($rows as $line) {
				echo "<tr><td> $line[1]</td><td> $line[2]</td><td> $line[3]</td></tr>";
			}
			echo "</table>";
			echo "</div>";
			
			mysqli_close($conn);
		    
		}
		?>
		</div>
	</body>
</html>