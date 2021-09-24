<?php 
require 'vendor/autoload.php';
require 'config.php';
require 'src/SlackNotifier.php';

if($_SERVER['REQUEST_METHOD'] === 'POST') {

	$error = false;
	$errmsg = '';

	try {

		$message = [
			'name' => $_POST['name'],
			'email' => $_POST['email'],
			'message' => $_POST['message'],
		];

		SlackNotifier::SendAlert($message);

	} catch (Exception $e) {
		//echo 'Error: ' . $e->getMessage();
		$error = true;
		$errmsg = $e->getMessage();
	}
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Slack Notifier Demo</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <style type="text/css">
    	html, body {
    		height: 100%;
    	}

    	body {
    		display: flex;
    		align-items: center;
    		padding-top: 40px;
    		padding-bottom: 40px;
    		background-color: #f5f5f5;
    	}

    	.form-contactus {
    		width: 100%;
    		max-width: 330px;
    		padding:  15px;
    		margin:  auto;
    	}
    </style>
  </head>
  <body class="text-center">
  	<main class="form-contactus">
		<?php if ($error): ?>
			<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<?=$errmsg?>
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
		<?php endif; ?>
	    <h1 class="h3 mb-3 fw-normal">Slack Notifier</h1>
		<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		  <div class="mb-3">
		    <!--<label for="name" class="form-label">Name</label>-->
		    <input id="name" name="name" placeholder="Your Name" type="text" required="required" class="form-control">
		  </div>
		  <div class="mb-3">
		    <!--<label for="email" class="form-label">Email</label>-->
		    <input id="email" name="email" placeholder="Email Address" type="text" required="required" class="form-control">
		  </div>
		  <div class="mb-3">
		    <!--<label for="message" class="form-label">Message</label>-->
		    <textarea id="message" name="message" placeholder="Message" cols="40" rows="5" required="required" class="form-control"></textarea>
		  </div> 
		  <div class="">
		    <button name="submit" type="submit" class="btn btn-primary">Submit</button>
		  </div>
		</form>
	</main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
  </body>
</html>
