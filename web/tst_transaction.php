<!DOCTYPE html>
<html>
	<body>
		<form method="POST" action="/transaction/api/create">
			username   : <input type="text" name="username"> or phone number <input type="text" name="phone_number"><br>
			amount     : <input type="decimal" name="amount"><br>
			description: <input type="text" name="description" ><br>
			unit  		 : <input type="text" name="unit"><br>
			<input type="submit" value="create">
		</form>
	</body>
</html>
