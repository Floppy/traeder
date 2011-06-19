<!DOCTYPE html>
<html>
<head>
	<title>traeder.org - sign up</title>

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
			<form action="form.php" method="post">
				<div data-role="fieldcontain">
					<label for='signup_name'>Name</label> 
					<input type='text' id='signup_name' name='signup_name' />			
				</div>	
				
				<div data-role="fieldcontain">
					<label for='signup_address_1'>Adress line 1</label> 
					<input type='text' id='signup_address_1' name='signup_address_1' />			
				</div>	
			
				<div data-role="fieldcontain">
					<label for='signup_address_2'>Adress line 2</label> 
					<input type='text' id='signup_address_2' name='signup_address_2' />			
				</div>		
				
				<div data-role="fieldcontain">
					<label for='signup_address_3'>Adress line 3</label> 
					<input type='text' id='signup_address_3' name='signup_address_3' />			
				</div>		
	
				<div data-role="fieldcontain">
					<label for='signup_postcode'>Postcode</label> 
					<input type='text' id='signup_postcode' name='signup_postcode' />			
				</div>		
	
				<div data-role="fieldcontain">
					<label for='signup_password'>Password</label> 
					<input type='text' id='signup_password' name='signup_password' />			
				</div>						
				
				<input type='submit' id='signup_submit' name='signup_submit' value='Sign Up' />		
			</form>
			
			<p>Or <a href='login.html'>Log in</a></p>	
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

