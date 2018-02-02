<?php
  session_start();
 ?>
 <!doctype html>
 <html>
  	<head>
	  <meta charset="utf-8">
	  <title>Questionnaire</title>

	  <!-- call bootstrap -->
	  <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet">
	</head>

	<body style="padding:70px 0 140px 0">
	  <div style="padding-bottom:100px" class="container">
	  	 <div class="row">
	  		<div class="col-md-12">
	  			<hr>
	  				<div> 
	  					<b> Creation of the questionnaire </b>
	  				</div>
	  			<hr>
	  		</div>
	  	</div> 
	  </div>

	<!-- CONTENT -->
	  <div class="container">
	  <?php if(array_key_exists('errors',$_SESSION)): ?>
	  <div class="alert alert-danger">
	  	<?= implode('<br>', $_SESSION['errors']); ?>
	  </div>
	  <?php endif; ?>

		<form action="sampleform2.php" method="post">
	  		<div class="row">
				<div class="col-md-6">
	  				<div class="form-group">
	  					<label for="inputquestion1"> Question 1 * </label>
	  					<!-- If there are errors, inputs will be set with the last value -->
	  					<input required type="text" name="question1" class="form-control" id="inputquestion1" value="<?php echo isset($_SESSION['inputs']['question1'])? $_SESSION['inputs']['question1'] : ''; ?>">
	  				</div><!--/*.form-group-->
	  			</div><!--/*.col-md-6-->

				<div class="col-md-6">
	  				<div class="form-group">
	  					<label for="inputquestion2"> Question 2 * </label>
	  					<select name="question2" class="form-control" id="inputquestion2" value="<?php echo isset($_SESSION['inputs']['question2'])? $_SESSION['inputs']['question2'] : ''; ?>"> 
  							<option value="What's your name?">What's your name?</option>
  							<option value="How old are you?">How old are you?</option>
  							<option value="What are your hobbies?">What are your hobbies?</option>
						</select>
	  				</div><!--/*.form-group-->
	  			</div><!--/*.col-md-6-->

	  			<div class="col-md-6">
	  				<div class="form-group">
	  					<label for="inputquestion3"> Question 3 * </label>
	  					<select name="question3" class="form-control" id="inputquestion3" value="<?php echo isset($_SESSION['inputs']['question3'])? $_SESSION['inputs']['question3'] : ''; ?>">
  							<option value="Do you have pets?">Do you have pets?</option>
  							<option value="How old are you?">Are you a female?</option>
						</select>
	  				</div><!--/*.form-group-->
	  			</div><!--/*.col-md-6-->

				<div class="col-md-6">
		  			<div class="form-group">
		  				<label for="inputdescription">Description</label>
		  				<input id="inputdescription" name="description" class="form-control">
		  					<?php echo isset($_SESSION['inputs']['description'])? $_SESSION['inputs']['description'] : ''; ?>
		  				</input>
	  				</div><!--/*.form-group-->
	  			</div><!--/*.col-md-6-->

				<div class="col-md-12">
	  				<button type='submit' class='btn btn-primary'>Submit</button>
	  			</div><!--/*.col-md-12-->
			</div><!--/*.row-->
	  	</form>
	</div><!--/*.container-->
<!-- END CONTENT -->
	</body>
</html>

<?php
unset($_SESSION['inputs']); // Last results are unset for the next try
unset($_SESSION['success']);
unset($_SESSION['errors']);
?>