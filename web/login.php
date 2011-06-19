<html>
<head>
	<title>traeder.org - log in</title>

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
	<div data-role="page" data-theme="b" id="login">
		<div id='title'>
			<h1>Traeder - Log In</h1>
		</div>
		
		<div data-role="content">
	
				<form id='login_form'>
				
					<div data-role="fieldcontain">
						<lable for='login_username'>Username</label> 
						<input type='text' id='login_username' 	name='login_username'/>
					</div> 
					
					<div data-role="fieldcontain">
						<lable for='login_password'>Password</label> 
						<input type='text' id='login_password' 	name='login_password'/>			
					</div>
					
					<input type='button' id='login_submit' name='login_submit'  value='login' / > 

				</form>		
		
		</div>
	</div>
</body>
</html>

