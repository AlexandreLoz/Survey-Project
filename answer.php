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
	  					<b> Responses of the questionnaire </b>
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
	  <?php if(array_key_exists('success',$_SESSION)): ?>

	  <div class="alert alert-success">
	  		The questionnaire has been successfully completed, now please answer the questions.
	  </div>
	  <div class="form-group">
	  		<b> Description : </b> <?php echo isset($_SESSION['inputs']['description'])? $_SESSION['inputs']['description'] : ''; ?>
	  </div>
	  <?php endif; ?>
		<form action="result.php" method="post">
	  		<div class="row">

				<div class="col-md-6">
	  				<div class="form-group">
	  					<label for="inputemail"> Please write your email * </label>
	  					<input required type="email" name="email" class="form-control" id="inputemail">
	  				</div><!--/*.form-group-->
	  			</div><!--/*.col-md-6-->

				<div class="col-md-6">
	  				<div class="form-group">
	  					<label for="inputanswer1"> <?php echo isset($_SESSION['inputs']['question1'])? $_SESSION['inputs']['question1'] : ''; ?> </label>
	  					<input required type="text" name="answer1" class="form-control" id="inputanswer1">
	  				</div><!--/*.form-group-->
	  			</div><!--/*.col-md-6-->

				<div class="col-md-6">
	  				<div class="form-group">
	  					<label for="inputanswer2"> <?php echo isset($_SESSION['inputs']['question2'])? $_SESSION['inputs']['question2'] : ''; ?></label>
	  					<input required type="text" name="answer2" class="form-control" id="inputanswer2">
	  				</div><!--/*.form-group-->
	  			</div><!--/*.col-md-6-->

	  			<div class="col-md-6">
	  				<div class="form-group">
	  					<label for="inputanswer3"> <?php echo isset($_SESSION['inputs']['question3'])? $_SESSION['inputs']['question3'] : ''; ?></label>
	  					<br> <input type="radio" name="answer3" id="inputanswer3" value="Yes"> Yes </br>
	  					<input type="radio" name="answer3" id="inputanswer3" value="No"> No
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