<!DOCTYPE html>
<html>
<head>
<title>Login Form</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript">
	
	 addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); 
	 function hideURLbar(){ window.scrollTo(0,1); } 


</script>
<link
	href="/CodeIgniterProject/application/views/css/RegistrationForm.css"
	rel="stylesheet" type="text/css" media="all" />

<link
	href="//fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700,700i"
	rel="stylesheet" />
</head>
<body>
	<!-- main -->
	<div class="main-w3layouts wrapper">

		<h1>Login Form</h1>
		<div class="main-agileinfo">
			<div class="agileits-top">
		
				<form action="/CodeIgniterProject/Login/authentication"
					method="post">
					<input class="text" type="text" name="username" placeholder="Username" required=""> 
					<input class="text" type="password" name="password" placeholder="Password" required="">
					<input type="submit" value="LOGIN">
				</form>
				<?php                    
                    if (isset($error_message)) {                        
                        echo "<CENTER><h3 style=\"color: red;\">".$error_message."</h3></CENTER><br>";
                        }
                ?>	
			</div>
		</div>
	</div>
</body>
</html>