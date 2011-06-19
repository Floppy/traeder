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
	<script type="text/javascript" src="script/script.js"></script>
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="/apple-touch-icon-114x114-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="/apple-touch-icon-72x72-precomposed.png">
	<link rel="apple-touch-icon-precomposed" href="/apple-touch-icon-precomposed.png">
</head> 

<body> 
	<div data-role="page" data-theme="traeder" id="index">
		<header>
			<h1>Traeder</h1>
		</header>
		
		<div data-role="content">
			<a href="/transactions/new/" data-role="button" data-icon="plus" data-iconpos="top" >Make a new transaction</a> 
			<a href="/transaction/redeem" data-role="button" data-icon="arrow-d" data-iconpos="bottom">Recieve a transaction</a> 
			<a href='transaction/list/'>List previous transactions</a>

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
