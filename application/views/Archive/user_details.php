<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<title>User Details</title>

<link href="/CodeIgniterProject/application/views/css/bootstrap.min.css"
	rel="stylesheet" type="text/css" media="all" />
</head>
<body>
	<div class="container">
		<div class="col-md-3"></div>
		<div class="col-md-6 d-flex flex-column justify-content-center">
			<h1>User Details</h1>

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
					<tr>
						<th scope="row">1</th>
						<td><?= $userArray['Username'] ?></td>
						<td><?= $userArray['Email'] ?></td>
						<td><?= $userArray['Password'] ?></td>
						<td><?= $userArray['ConfirmPassword'] ?></td>
					</tr>

					<!--One way of WRITING it-->
					<!--=============================================================================-->
					<?php

                        foreach ($userArrayArray as $userArray) {
                            echo "
            				    <tr>
            						<th scope=\"row\">1</th>
            						<td>" . $userArray['Username'] . "</td>
            						<td>" . $userArray['Email'] . "</td>
            						<td>" . $userArray['Password'] . "</td>
            						<td>" . $userArray['ConfirmPassword'] . "</td>
            					</tr>
                            ";
                        }
                     ?>				
				
					
					<!--Other way of WRITING it-->
					<!--=============================================================================-->
					<?php foreach ($userArrayArray as $userArray): ?> 
					<tr>
						<th scope="row">1</th>
						<td><?= $userArray['Username'] ?></td>
						<td><?= $userArray['Email'] ?></td>
						<td><?= $userArray['Password'] ?></td>
						<td><?= $userArray['ConfirmPassword'] ?></td>
					</tr>
					<?php endforeach; ?>					
					
					<?php foreach ($userArrayArrayfromDB as $userArray): ?> 
					<tr>
						<th scope="row">1</th>
						<td><?= $userArray['username'] ?></td>
						<td><?= $userArray['email'] ?></td>
						<td><?= $userArray['password_one'] ?></td>
						<td><?= $userArray['password_two'] ?></td>
					</tr>
					<?php endforeach; ?>
					
					<?php foreach ($userArrayArrayfromDBusingQueryBuilder as $userArray): ?> 
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
		<div class="col-md-3"></div>
	</div>
</body>
</html>

<?php
echo "<pre>";
print_r($userArray);
echo "</pre>";

echo "<pre>";
print_r($userArrayArray);
echo "</pre>";

echo "<pre>";
print_r($userArrayArrayfromDB);
echo "</pre>";

echo "<pre>";
print_r($userArrayArrayfromDBusingQueryBuilder);
echo "</pre>";

?>