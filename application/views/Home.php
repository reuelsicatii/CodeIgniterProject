<!DOCTYPE html>
<html>
<head>
<title>Home</title>
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

		<h1>Home</h1>
		<div class="main-agileinfo">
			<div class="agileits-top">
				<table class="table">
					<thead class="thead-dark">
						<tr>
							<th scope="col">#</th>
							<th scope="col">Username</th>
							<th scope="col">Email</th>
							<th scope="col">Password</th>
							<th scope="col">ConfirmPassword</th>
						</tr>
					</thead>
					<tbody>
						<!--One way of WRITING it-->
						<!--=============================================================================-->
    					<?php foreach ($userArrayArrayfromDB as $userArray): ?> 
    					<tr>
    						<th scope="row">1</th>
    						<td><?= $userArray['username'] ?></td>
    						<td><?= $userArray['email'] ?></td>
    						<td><?= $userArray['password_one'] ?></td>
    						<td><?= $userArray['password_two'] ?></td>
    					</tr>
    					<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</body>
</html>