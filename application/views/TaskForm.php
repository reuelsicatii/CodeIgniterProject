<!doctype html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport"
	content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
<!-- <link rel="stylesheet" -->
<!-- 	href="/application/views/css/bootstrap.min.css" /> -->

<link rel="stylesheet"
	href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
	integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
	crossorigin="anonymous">

<link rel="stylesheet"
	href="<?php echo base_url("assets/css/TaskForm.css");?>">

<title>Task Form</title>
</head>
<body>
	<!-- main -->
	<div class="container">

		<div class="row py-5"></div>

		<div class="row d-flex">
			<?php
if (isset($transactionresult)) {
    if ($transactionresult == TRUE) {
        echo "<div id=\"transactionnotif\" class=\"alert alert-success flex-fill\"><strong>Successful!</strong> Well DONE, you did it.</div>";
    } else {
        echo "<div id=\"transactionnotif\" class=\"alert alert-danger flex-fill\"><strong>Unsuccessful!</strong> Unfortunate we are unable to made changes. Please contact ADMIN.</div>";
    }
}

?>
		</div>

		<div class="row d-flex">
			<div class="col-sm">
				<form class="d-flex flex-row-reverse"
					action="/Logout" method="post">
					<button type="submit" class="btn btn-primary">LOGOUT</button>
				</form>
				<div class="row py-1">
					<!-- Button to Open the Modal -->
					<button type="button" class="btn btn-primary" data-toggle="modal"
						data-target="#createTask">Create Task</button>


					<!-- The Modal:createTask -->
					<div class="modal" id="createTask">
						<div class="modal-dialog">
							<div class="modal-content">

								<!-- Modal Header -->
								<div class="modal-header">
									<h4 class="modal-title">Create Task</h4>
									<button type="button" class="close" data-dismiss="modal">&times;</button>
								</div>

								<!-- Modal body -->
								<div class="modal-body">
									<form action="/Task/create" method="post">
										<div class="form-group d-flex">

											<select class="custom-select mx-1 flex-fill" name="type">
												<option selected>Task Type</option>
												<option value="Bank Transaction">Bank Transaction</option>
												<option value="Collection">Collection</option>
												<option value="Govt Transaction">Govt Transaction</option>
												<option value="Cleaning">Cleaning</option>
												<option value="Grocery">Grocery</option>
												<option value="Supplies Replenishment">Supplies Replenishment</option>
												<option value="Meeting">Meeting</option>
											</select> <select class="custom-select mx-1 flex-fill"
												name="department">
												<option selected>Department</option>
												<option value="Accounting">Accounting</option>
												<option value="HR and Admin">HR and Admin</option>
												<option value="IT">IT</option>
												<option value="Payroll">Payroll</option>
												<option value="Executive">Executive</option>
												<option value="Production">Production</option>
											</select>

										</div>
										<div class="form-group my-1">
											<label for="status">Summary</label> <input type="text"
												class="form-control mb-1" placeholder="Summary xx of XX"
												name="summary"> <label for="status">Status</label> <input
												type="text" class="form-control mb-1" value="New" disabled>

											<label for="start">Start</label> <input type="text"
												class="form-control mb-1" value="YYYY-MM-DD HH:MM:SS"
												disabled> <label for="end">End</label> <input type="text"
												class="form-control mb-1" value="YYYY-MM-DD HH:MM:SS"
												disabled> <label for="elapsed">Elapsed(Hrs)</label> <input
												type="text" class="form-control mb-1" value="HH:MM:SS"
												disabled> <label for="commentforcreate">Remarks:</label>
											<textarea class="form-control mb-3" rows="5"
												id="createmodalformtextareacomment" name="remarks"></textarea>

										</div>

										<div class="d-flex flex-row-reverse">
											<button type="submit" class="btn btn-primary">Create</button>
										</div>


									</form>
								</div>
							</div>
						</div>
					</div>

					<!-- The Modal:updateTask -->
					<div class="modal" id="updateTask">
						<div class="modal-dialog">
							<div class="modal-content">

								<!-- Modal Header -->
								<div class="modal-header">
									<h4 class="modal-title">Update Task</h4>
									<button type="button" class="close" data-dismiss="modal">&times;</button>
								</div>

								<!-- Modal body -->
								<div class="modal-body">
									<form action="/Task/update" method="post">
										<div id="updatemodalformrow1"
											class="form-group d-inline-flex my-1">

											<select id="updatemodalformselecttype"
												class="custom-select mx-1" name="type">
												<option selected>Task Type</option>
												<option value="Bank Transaction">Bank Transaction</option>
												<option value="Collection">Collection</option>
												<option value="Govt Transaction">Govt Transaction</option>
											</select> <select id="updatemodalformselectdepartment"
												class="custom-select mx-1" name="department">
												<option selected>Department</option>
												<option value="Accounting">Accounting</option>
												<option value="HR and Admin">HR and Admin</option>
												<option value="Payroll">Payroll</option>
											</select> <input id="updatemodalforminputstatus"
												class="btn btn-primary btn-sm my-1" name="status"
												value="start" disabled />
										</div>
										<div id="updatemodalformrow2" class="form-group my-1">

											<input type="hidden" class="form-control" name="idtask"
												id="idtask" value=""> <label for="summaryforupdate">Summary</label>
											<input id="updatemodalforminputsummary" name="summary"
												type="text" class="form-control mb-1"
												placeholder="Summary 01 of XX"> <label for="startforupdate">Start</label>
											<input id="updatemodalforminputstart" name="start"
												type="text" class="form-control" value="9999-12-31 23:59:59"
												disabled> <label for="endforupdate">End</label> <input
												id="updatemodalforminputend" name="end" type="text"
												class="form-control" value="YYYY-MM-DD HH:MM:SS" disabled> <label
												for="elapsedforupdate">Elapsed</label> <input
												id="updatemodalforminputelapsed" name="elapsed" type="text"
												class="form-control" value="9999-12-31 23:59:59" disabled> <label
												for="commentforupdate">Remarks:</label>
											<textarea id="updatemodalformtextareacomment" name="remarks"
												class="form-control mb-2" rows="5"></textarea>
										</div>

										<div class="d-flex flex-row-reverse">
											<button type="submit" class="btn btn-primary">Update</button>
										</div>
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
								<th scope="col">SUMMARY</th>
								<th scope="col">TASK TYPE</th>
								<th scope="col">DEPARTMENT</th>
								<th scope="col">STARTED</th>
								<th scope="col">ELAPSED</th>
								<th scope="col">STATUS</th>
								<th scope="col">ACTION</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td class="text-white">1</td>
								<td class="text-white">Summary XX of XX</td>
								<td class="text-white">SampleData01</td>
								<td class="text-white">SampleData02</td>
								<td class="text-white">2020-01-13 11:41:43</td>
								<td class="text-white">09:41:43</td>
								<td class="text-white">COMPLETED</td>
								<td>

									<div class="d-flex flex-column justify-content-center">
										<button type="button" class="btn btn-info btn-sm my-1"
											id="updatetask" data-id="4" data-toggle="modal"
											data-target="#updateTask">Update</button>
									</div>


									<form class="d-flex flex-column justify-content-center"
										action="/Task/action" method="post">
										<input class="btn btn-primary btn-sm mb-1" type="submit"
											name="start" value="Start" /> <input
											class="btn btn-success btn-sm" type="submit" name="complete"
											value="Complete" />
									</form>

								</td>
							</tr>
							<?php foreach ($tasks as $task): ?> 
        					<tr id="<?= 'taskprofile_'.$task['id']?>">
								<td id="<?= 'taskid'?>" class="text-white"><?= $task['id'] ?></td>
								<td id="<?= 'summary'?>" class="text-white"><?= $task['summary'] ?></td>
								<td id="<?= 'type' ?>" class="text-white"><?= $task['type'] ?></td>
								<td id="<?= 'department' ?>" class="text-white"><?= $task['department'] ?></td>
								<td id="<?= 'start' ?>" class="text-white"><?= $task['start'] ?></td>
								<td id="<?= 'end' ?>" style="display: none;"><?= $task['end'] ?></td>
								<td id="<?= 'elapsed' ?>" class="text-white"><?= $task['elapsed']?></td>
								<td id="<?= 'status' ?>" class="text-white"><?= $task['status'] ?></td>
								<td id="<?= 'remarks' ?>" style="display: none;"><?= $task['remarks'] ?></td>
								<td>

									<div class="d-flex flex-column justify-content-center">
										<button type="button" class="btn btn-info btn-sm my-1"
											id="updatetask" data-id=<?= $task['id'] ?>
											data-toggle="modal" data-target="#updateTask">Update</button>
									</div>

									<form class="d-flex flex-column justify-content-center"
										action="/Task/action" method="post">
										<?php
        if ($task['status'] == 'NEW') {
            $actionValue = "Start";
        } else if ($task['status'] == 'IN PROGRESS') {
            $actionValue = "Complete";
        } else if ($task['status'] == 'COMPLETE') {
            $actionValue = "Complete";
        } else {}

        ?>
										<input type="hidden" class="form-control" name="idtask"
											id="idtask" value="<?=$task['id']?>"> <input
											class="btn btn-success btn-sm mb-1" type="submit"
											name="action" value="<?=$actionValue?>" />
									</form>

								</td>
							</tr>
        					<?php endforeach; ?>
							
							
						
						</tbody>
					</table>
				</div>








			</div>

		</div>
		<div class="row"></div>


	</div>
	<!-- 	<script src="/application/views/js/bootstrap.min.js" /></script> -->
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
	<script src="<?php echo base_url("assets/js/Task.js");?>"></script>
</body>
</html>

