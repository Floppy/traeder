<?php

	// just for now
	$loggedin = 0;
	
?><!DOCTYPE html>
<html>
<head>
	<title>traeder.org</title>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1">
	
	<link rel="stylesheet" href="/style/jquery.mobile.css" />
	<link rel="stylesheet" href="/style/style.css" />
	
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.5.min.js"></script>
	<script type="text/javascript" src="http://code.jquery.com/mobile/1.0a4.1/jquery.mobile-1.0a4.1.min.js"></script>
	
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="/apple-touch-icon-114x114-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="/apple-touch-icon-72x72-precomposed.png">
	<link rel="apple-touch-icon-precomposed" href="/apple-touch-icon-precomposed.png">
</head> 

<body> 
	<div data-role="page" data-theme="traeder" id="jqm-home">
		<header>
			<img src="style/images/logo.small.png" alt="traeder.org logo">
		</header>
		
		<div data-role="content">
			<a href="/transaction_pay.php" data-role="button" data-icon="plus" data-iconpos="left" data-theme="d">Make a new transaction</a> 
			<a href="/transaction_receive.php" data-role="button" data-icon="arrow-d" data-iconpos="left" data-theme="d">Recieve a transaction</a>

<?php if ($loggedin): ?>
	<a href="/overview.php" data-role="button" data-icon="grid" data-iconpos="left" data-theme="e">Previous transactions</a>
<?php else: // not logged in ?>
			<a href="/login" data-role="button" data-icon="grid" data-iconpos="left" data-theme="e">Log in</a>
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