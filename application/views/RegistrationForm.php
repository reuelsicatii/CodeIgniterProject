<!DOCTYPE html>
<html>
<head>
<title>Registration Form</title>
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
		<h1>Registration Form</h1>
		<div class="main-agileinfo">
			<div class="agileits-top">
			<?php if (isset($message)) {
			    echo "<CENTER><h3 style=\"color: white;\">Data inserted successfully. 
                    Click <a href=\"/CodeIgniterProject/\">here</a> to Login</h3></CENTER><br>";
			}			
			?>			
				<form action="/CodeIgniterProject/Registration/add_user"
					method="post">
					<input class="text" type="text" name="username"
						placeholder="Username" required=""> <input class="text email"
						type="email" name="email" placeholder="Email" required=""> <input
						class="text" type="password" name="password"
						placeholder="Password" required=""> <input class="text w3lpass"
						type="password" name="confirmpassword"
						placeholder="Confirm Password" required=""> <input type="submit"
						value="SIGNUP">
				</form>
				<p>
					Already have an Account? <a href="/CodeIgniterProject/"> Login Now!</a>
				</p>
			</div>
		</div>
	</div>
</body>
</html>