<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1">
	<title>Traeder</title>
	<link rel="stylesheet"  href="http://code.jquery.com/mobile/1.0a4.1/jquery.mobile-1.0a4.1.min.css" />
	<link rel="stylesheet" href="style/style.css" />
	
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.5.min.js"></script>
	<script type="text/javascript" src="http://code.jquery.com/mobile/1.0a4.1/jquery.mobile-1.0a4.1.min.js"></script>

	<script type="text/javascript" src="/script/script.js"></script>	

</head> 



<body> 
<div data-role="page" data-theme="b" id="jqm-home">
	<div id='title'>
		<h1>Traeder - Log In</h1>

	</div>
	
	<div data-role="content">

		<div data-role="fieldcontain">

			<form action="form.php" method="post">
				
				<div class='form_element'>
				
					<label for='signup_name'>Name</label> 
					<input type='text' id='signup_name' 	name='signup_name' />			
				
				</div>	
				
				<div class='form_element'>
				
					<label for='signup_address_1'>Adress line 1</label> 
					<input type='text' id='signup_address_1' name='signup_address_1' />			
				
				</div>	
			

				<div class='form_element'>
				
					<label for='signup_address_2'>Adress line 2</label> 
					<input type='text' id='signup_address_2' name='signup_address_2' />			
				
				</div>		
				
				<div class='form_element'>
				
					<label for='signup_address_3'>Adress line 3</label> 
					<input type='text' id='signup_address_3' name='signup_address_3' />			
				
				</div>		

				<div class='form_element'>
				
					<label for='signup_postcode'>Postcode</label> 
					<input type='text' id='signup_postcode' name='signup_postcode' />			
				
				</div>		

				<div class='form_element'>
				
					<label for='signup_password'>Password</label> 
					<input type='text' id='signup_password' name='signup_password' />			
				
				</div>						
				
			
				<input type='submit' id='signup_submit' 	name='signup_submit' value='Sign Up' />			
				
				<p>Or <a href='login.html'>Log in</a></p>	
				
			</form>
		
		</div>
	
	</div>
</div>
</body>
</html>

