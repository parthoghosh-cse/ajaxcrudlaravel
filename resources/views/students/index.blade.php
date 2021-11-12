<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Development Area</title>
	<!-- ALL CSS FILES  -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/responsive.css">
</head>
<body>
	
	

	<div class="wrap-table ">
		<a id="student_add_btn" class="btn btn-sm btn-primary" href="#">Add New Student</a>
		<br>
		<br>
		<div class="card shadow">
			<div class="card-body">
				<h2>All Data</h2>
				<table class="table table-striped">
					<thead>
						<tr>
							<th>#</th>
							<th>Name</th>
							<th>Email</th>
							<th>Cell</th>
							<th>Photo</th>
							<th style="width:200px">Action</th>
						</tr>
					</thead>
					<tbody id="student_data">
					
					

					</tbody>
				</table>
			</div>
		</div>
	</div>
	

<div id="student_add_modal" class="modal fade">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h2>Add new student</h2>
				<button class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
			
				<div class="msg"></div>
				<form id="student_form" method="POST" entype="multipart/form-data" >
					@csrf
					<div class="form-group">
						<input name="name" class="form-control" type="text" placeholder="Name">
						
					</div>
					<div class="form-group">
						<input name="email" class="form-control" type="text" placeholder="Email">
					</div>

					<div class="form-group">
						<input name="cell" class="form-control" type="text" placeholder="Cell">
					</div>

					<div class="form-group">
						<input name="photo" class="form-control" type="file" placeholder="Photo">
					</div>

					<div class="form-group">
						<input class="btn btn-primary" type="submit" value="Add">
					</div>
				</form>

			</div>
		</div>
	</div>
</div>




<div id="student_show_modal" class="modal fade">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
		
			<div class="modal-body">
			
				<img style="max-width:300px" src="{{ URL::to('storage/student/d9a2ccc10c001a7565c948fb2ed21067.jpg')}}" alt="">
				<hr>
				<table class="table table-striped">
					<tr>
						<td>Name :</td>
						<td><span id="sname"></span></td>
					</tr>

					<tr>
						<td>Email:</td>
						<td><span id="semail"></span></td>
					</tr>

					<tr>
						<td>Cell :</td>
						<td><span id="scell"></span></td>
					</tr>

					
					
				</table>
			
			</div>
		</div>
	</div>
</div>





	<!-- JS FILES  -->
	<script src="assets/js/jquery-3.4.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<script src="assets/js/custom.js"></script>
</body>
</html>