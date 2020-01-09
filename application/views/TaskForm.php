<!doctype html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport"
	content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
<!-- <link rel="stylesheet" -->
<!-- 	href="/CodeIgniterProject/application/views/css/bootstrap.min.css" /> -->

<link rel="stylesheet"
	href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
	integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
	crossorigin="anonymous">


<title>Task Form</title>
</head>
<body>
	<!-- main -->
	<div class="container">
		<div class="row py-5"></div>

		<div class="row">
			<div class="col-sm-1"></div>
			<div class="col-sm-10">
				<div class="row py-1">
					<!-- Button to Open the Modal -->
					<button type="button" class="btn btn-primary" data-toggle="modal"
						data-target="#myModal">Create Task</button>

					<!-- The Modal -->
					<div class="modal" id="myModal">
						<div class="modal-dialog">
							<div class="modal-content">

								<!-- Modal Header -->
								<div class="modal-header">
									<h4 class="modal-title">Create Task</h4>
									<button type="button" class="close" data-dismiss="modal">&times;</button>
								</div>

								<!-- Modal body -->
								<div class="modal-body">
									<form>
										<div class="d-inline-flex">
						
											</select> <select class="custom-select mx-1">
												<option selected>Task Type</option>
												<option value="Bank Transaction">Bank Transaction</option>
												<option value="Collection">Collection</option>
												<option value="Govt Transaction">Govt Transaction</option>
											</select>
											
											</select> <select class="custom-select mx-1">
												<option selected>Department</option>
												<option value="Accounting">Accounting</option>
												<option value="HR and Admin">HR and Admin</option>
												<option value="Payroll">Payroll</option>
											</select>
											
											<button class="btn btn-secondary flex-grow-1">NEW</button>

										</div>
										<div class="form-group">
											<label for="exampleInputPassword1">Password</label> <input
												type="password" class="form-control"
												id="exampleInputPassword1">
										</div>
										<div class="form-group form-check">
											<input type="checkbox" class="form-check-input"
												id="exampleCheck1"> <label class="form-check-label"
												for="exampleCheck1">Check me out</label>
										</div>
										<button type="submit" class="btn btn-primary">Create</button>
									</form>
								</div>



							</div>
						</div>
					</div>
				</div>
				<div class="row py-1">
					<table class="table">
						<thead class="thead-dark">
							<tr>
								<th scope="col">ID</th>
								<th scope="col">TYPE</th>
								<th scope="col">DEPARTMENT</th>
								<th scope="col">STATUS</th>
								<th scope="col">ACTION</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<th scope="row">1</th>
								<td>Mark</td>
								<td>Otto</td>
								<td>@mdo</td>
								<td>

									<form class="d-flex flex-column justify-content-center"
										action="/CodeIgniterProject/Task/action" method="post">


										<input class="btn btn-primary btn-sm my-1" type="submit"
											name="Update" value="Update" /> <input
											class="btn btn-primary btn-sm my-1" type="submit"
											name="Start" value="Start" /> <input
											class="btn btn-success btn-sm my-1" type="submit"
											name="Complete" value="Complete" />


									</form>
								</td>
							</tr>
							<tr>
								<th scope="row">2</th>
								<td>Jacob</td>
								<td>Thornton</td>
								<td>@fat</td>
							</tr>
							<tr>
								<th scope="row">3</th>
								<td>Larry</td>
								<td>the Bird</td>
								<td>@twitter</td>
							</tr>
							<tr>
								<th scope="row">3</th>
								<td>Larry</td>
								<td>the Bird</td>
								<td>@twitter</td>
							</tr>
						</tbody>
					</table>
				</div>








			</div>
			<div class="col-sm-1"></div>

		</div>
		<div class="row"></div>


	</div>
	<!-- 	<script src="/CodeIgniterProject/application/views/js/bootstrap.min.js" /></script> -->
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
		integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
		crossorigin="anonymous"></script>
	<script
		src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
		integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
		crossorigin="anonymous"></script>
	<script
		src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
		integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
		crossorigin="anonymous"></script>
</body>
</html>

