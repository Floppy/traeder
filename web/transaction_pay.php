<?php

	// just for now
	$loggedin = 1;
	
?><!DOCTYPE html>
<html>
<head>
	<title>traeder.org - transactions</title>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1">
	
	<link rel="stylesheet" href="/style/jquery.mobile.css" />
	<link rel="stylesheet" href="/style/style.css" />
	
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.5.min.js"></script>
	<script type="text/javascript" src="http://code.jquery.com/mobile/1.0a4.1/jquery.mobile-1.0a4.1.min.js"></script>
	<script type="text/javascript" src="script/script.js"></script>

	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="/apple-touch-icon-114x114-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="/apple-touch-icon-72x72-precomposed.png">
	<link rel="apple-touch-icon-precomposed" href="/apple-touch-icon-precomposed.png">

	<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">
</head> 

<body> 
	<div data-role="page" data-theme="traeder" id="jqm-home">
		<header>
			<img src="style/images/logo.small.png" alt="traeder.org logo">
		</header>

		<div data-role="content">
<?php if ($loggedin): ?>
			
			<form action="transactions/new" method="post">
				<div data-role="fieldcontain">
					<label for='new_transaction_amount'>Amount</label> 
					<input type='text' id='new_transaction_amount' name='new_transaction_amount'/>	
				</div>
				
				<input type='submit' id='transaction_submit' name='transaction_submit' value='Make payment' />			
			</form>
<?php else: // not logged in ?>
			<input type='submit' id='login_submit' name='login_submit' value='Log In' />			
<?php endif; ?>

		</div>

		<footer>
			<ul>
				<li><a id='help' href='help.php'>Help</a></li>
				<li><a id='profile' href='/accounts/profile'>Edit profile</a></li>
				<li><a id='logout' href='/accounts/logout'>Log out</a></li>
			</ul>		
		</footer>
	</div>
</body>
</html>

