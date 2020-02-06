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
	href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

<link rel="stylesheet"
	href="<?php echo base_url("assets/css/datetimepicker.css");?>">

<link rel="stylesheet"
	href="<?php echo base_url("assets/css/ReportForm.css");?>">

<title>Report Form</title>
</head>
<body>

	<div class="container">



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

		<div class="row">
			<div class="col-sm">
				<div class="row d-flex flex-row-reverse py-5">
					<form action="/Logout" method="post">
						<button type="submit" class="btn btn-primary">LOGOUT</button>
					</form>
				</div>
				<div class="row py-1">
					<!-- Button to Open the Modal -->
					<div class="col-sm-2">
						<button type="button" class="btn btn-primary">Download</button>
					</div>
					<div class="col-sm-10 d-flex justify-content-end">
					<form class="form-inline" action="/Task/create" method="post">

							 
							<select class="custom-select mx-1" name="type">
								<option selected>Email Address</option>
								<?php foreach ($users as $user): ?>								
								<option value="<?= $user['email']?>"><?= $user['email']?></option>
								<?php endforeach; ?>
							</select> 
							<div class='input-group date mx-1' id='datetimepicker'>
                                <input type='text' class="form-control" />
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                        	</div>
							<button type="submit" class="btn btn-primary ml-1">Search</button>
	
					</form>
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
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>

	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

	<script src="<?php echo base_url("assets/js/datetimepicker.js");?>"></script>
	<script src="<?php echo base_url("assets/js/Report.js");?>"></script>
</body>
</html>

