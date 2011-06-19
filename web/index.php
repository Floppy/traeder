<!DOCTYPE html>
<html>
<head>
	<title>traeder.org</title>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1">
	
	<link rel="stylesheet" href="/style/jquery.mobile.css" />
	<link rel="stylesheet" href="/style/style.css" />
	
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.5.min.js"></script>
	<script type="text/javascript" src="http://code.jquery.com/mobile/1.0a4.1/jquery.mobile-1.0a4.1.min.js"></script>
</head> 

<body> 
	<div data-role="page" data-theme="traeder" id="jqm-home">
		<header>
			<img src="style/images/logo.small.png" alt="traeder.org logo">
		</header>
		
		<div data-role="content">
			<a href="/transactions/new/" data-role="button" data-icon="plus" data-iconpos="top" >Make a new transaction</a> 
			<a href="/transaction/redeem" data-role="button" data-icon="arrow-d" data-iconpos="bottom">Recieve a transaction</a> 
			<a href='transaction/list/'>List previous transactions</a>
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