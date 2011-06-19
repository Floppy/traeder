<!DOCTYPE html>
<html>
<head>
	<title>traeder.org - transactions overview</title>

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
			<ul data-role="listview" data-inset="true" data-theme="c" data-dividertheme="b">
				<li data-role="list-divider">Previous transactions</li>
				<li><a><strong>Petrol</strong> in <strong>canterbury</strong>. Debit: 20 carbon points</a></li>
				<li><a><strong>Hotel Stay</strong> in <strong>Ashford</strong>. Debit: 10 carbon points</a></li>
			</ul>
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

