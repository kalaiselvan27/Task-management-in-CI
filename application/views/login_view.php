<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Sign in &middot; YIT Works</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="YIT Works for Your Networks!">
<meta name="author" content="">
<meta name="google-site-verification" content="DjMm8UiT998a3CCGXoTfvRfbkDC1rv7FhbLikYG7JI0" />

<!-- Le styles -->
<link rel="icon" type="image/png" href="assets/img/favicon.ico">
<link href="assets/css/bootstrap.css" rel="stylesheet">
<style type="text/css">
body {
	padding-top: 40px;
	padding-bottom: 40px;
	background-color: #f5f5f5;
}

.form-signin {
	max-width: 400px;
	padding: 19px 29px 29px;
	margin: 0 auto 20px;
	background-color: #fff;
	border: 1px solid #e5e5e5;
	-webkit-border-radius: 5px;
	-moz-border-radius: 5px;
		border-radius: 5px;
	-webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
	-moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
		box-shadow: 0 1px 2px rgba(0,0,0,.05);
}
.form-signin .form-signin-heading,
.form-signin .checkbox {
	margin-bottom: 10px;
}
.form-signin input[type="text"],
.form-signin input[type="password"] {
	font-size: 16px;
	height: auto;
	margin-bottom: 15px;
	padding: 7px 9px;
}

</style>
<link href="assets/css/bootstrap-responsive.css" rel="stylesheet">

<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
</head>
<body>
<div class="container">
<? $attributes = array('class' => 'form-signin'); ?>
<?php echo validation_errors(); ?>
<?php echo form_open('verifylogin', $attributes); ?>

	  <img src="assets/img/logosignin.png" alt="YIT Works"/>
        <h2 class="form-signin-heading">Please sign in</h2>

		<input type="text" class="input-block-level" placeholder="Username" name="username" id="username">
        <input type="password" class="input-block-level" placeholder="Password" name="password" id="password">
        <label class="checkbox">
          <input type="checkbox" value="remember-me"> Remember me
        </label>
        <button class="btn btn-large btn-primary" type="submit">Sign in</button>
</form>
</div> <!-- /container -->
</body>
</html>
