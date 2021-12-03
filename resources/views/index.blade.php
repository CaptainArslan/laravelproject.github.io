<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Laravel Crud Form</title>

<!-- <link rel="stylesheet" href="../css/style.css"> -->
<link rel="stylesheet" href="{{asset('css/style.css')}}">
<link rel="stylesheet" href="{{asset('css/all.min.css')}}">
<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">


<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>




<script>
$(document).ready(function(){
	// Select/Deselect checkboxes
	var checkbox = $('table tbody input[type="checkbox"]');
	$("#selectAll").click(function(){
		if(this.checked){
			checkbox.each(function(){
				this.checked = true;                        
			});
		} else{
			checkbox.each(function(){
				this.checked = false;                        
			});
		} 
	});

	checkbox.click(function(){
		if(!this.checked){
			$("#selectAll").prop("checked", false);
		}
	});
});

</script>


</head>
<body>
@if (\Session::has('success'))
	<div class="container mt-3 message">
		<div class="alert alert-success alert-dismissible fade show" role="alert">
			<strong>{!! \Session::get('success') !!} </strong>
		</div>
	</div>
@endif

@if(\Session::has('fail'))
	<div class="container mt-3 message">
		<div class="alert alert-danger alert-dismissible fade show" role="alert">
		<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
			<strong>{!! \Session::get('fail') !!} </strong>
		</div>
	</div>
@endif
	<div class="container-xl">
	<div class="table-responsive">
		<form action="/delete_multiple" method="POST" onsubmit="return confirm('* Are you sure to Delete these records !')">
			@csrf
			<div class="table-wrapper">
				<div class="table-title">
					<div class="row">
						<div class="col-sm-6">
							<h2>Manage <b>Employees</b></h2>
						</div>
						<div class="col-sm-6">
							<a href="" class="btn btn-success" id="add_user" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Employee</span></a>
							<button type="submit" name="delete_selected" class="btn btn-danger" id="delete_multiple_user" data-toggle="modal" ><i class="material-icons" >&#xE15C;</i> <span>Delete Selected</span></button type="submit">						
						</div>
					</div>
				</div>
				<table class="table table-striped table-hover ">
					<thead >
						<tr>
							<th>
								<span class="custom-checkbox">
									<input type="checkbox" id="selectAll">
									<label for="selectAll"></label>
								</span>
							</th>
							<th>ID</th>
							<th>Name</th>
							<th>Email</th>
							<th>Address</th>
							<th>Phone</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						@if($user > 0)
							@php $sr = 1;@endphp
							@foreach($user as $db_users)
							<tr>
								<td>
									<span class="custom-checkbox">
										<input type="checkbox" name="options[]" id="{{$db_users->id}}" value="{{$db_users->id}}">
										<label for=""></label>
									</span>
								</td>
								<td>{{$sr}}</td>
								<!-- <td>{{$db_users->id}}</td> -->
								<td>{{$db_users->user_firstname}}</td>
								<td>{{$db_users->user_email}}</td>
								<td>{{$db_users->user_address}}</td>
								<td>{{$db_users->user_phone}}</td>
								<td>
									<a class="edit_user" id="{{$db_users->id}}" ><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
									<a href="/delete_user/{{$db_users->id}}" class="delete" onclick="return confirm('* Are you sure to delete this record ?'); " ><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
								</td>
							</tr>
							@php $sr++; @endphp
							@endforeach
						@else
							<tr>
								<td colspan="7" class="text-center font-weight-bold bg-light">No Record Found </td>
							</tr>
						@endif	
					</tbody>
				</table>
				<div class="clearfix">
					<div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
					<ul class="pagination">
						<li class="page-item disabled"><a href="#">Previous</a></li>
						<li class="page-item active"><a href="#" class="page-link">1</a></li>
						<li class="page-item"><a href="#" class="page-link">2</a></li>
						<li class="page-item "><a href="#" class="page-link">3</a></li>
						<li class="page-item"><a href="#" class="page-link">4</a></li>
						<li class="page-item"><a href="#" class="page-link">5</a></li>
						<li class="page-item"><a href="#" class="page-link">Next</a></li>
					</ul>
				</div>
			</div>
		</form>
	</div>        
</div>

<!-- Edit Modal HTML -->
<div id="addEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="/student" method="POST" name="form" id="form" onsubmit="return confirm('Are you sure to save this record')">
			@csrf
				<div class="modal-header">						
					<h4 class="modal-title">Add Employee</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
					<input type="hidden" name="id" id="id" class="form-control" value="" >
				<div class="modal-body">					
					<div class="form-group">
						<label>Name</label>
						<input type="text" name="username" id="username" class="form-control" value="">
						<span id="nameErr">@error('username'){{$message}}@enderror</span>
					</div>
					<div class="form-group">
						<label>Email</label>
						<input type="text" name="useremail" id="useremail" class="form-control" >
						<input type="hidden" name="useremail_hidden" id="useremail_hidden" class="form-control" >
						<span id="emailErr">@error('useremail'){{$message}}@enderror</span>
					</div>
					<div class="form-group">
						<label>Address</label>
						<input type="text" class="form-control" name="useraddress" id="useraddress" >
						<span id="addressErr">@error('useraddress'){{$message}}@enderror</span>
					</div>
					<div class="form-group">
						<label>Phone</label>
						<input type="text" name="userphone" id="userphone"  class="form-control">
						<span id="phoneErr">@error('userphone'){{$message}}@enderror</span>
					</div>					
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-light" data-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-success" name="submit" id="submit" value="Save">
				</div>
			</form>
		</div>
	</div>
</div>


<script>	
	$(".message").show("slow").delay(3000).fadeOut();

	//Add User
	$(document).ready(function() {
		$('#add_user').click(function() {
			$('#addEmployeeModal').modal('show');
			$('.modal-title').html('Add Employee');
			$('#submit').val('Save');

		});
	});

	//Jquery Method to get the data of the row form the table
	$(document).ready(function() {
		$('.edit_user').click(function() {
			var id = $(this).attr('id');
			$('#id').val(id);

			$.ajax({
				type: "GET",
				url: "/get_student/"+id,
				success: function (response) 
				{
					response = JSON.parse(response);
					$('#id').val(response[0].id);
					$('#username').val(response[0].user_firstname);
					$('#useremail').val(response[0].user_email);
					$('#useremail_hidden').val(response[0].user_email);
					$('#useraddress').val(response[0].user_address);
					$('#userphone').val(response[0].user_phone);
				}
			});
		});
		// Email Duplication bu ajax 
		$('#useremail').blur(function()
            {
                var email = $('#useremail').val();
                var email_hidden_check = $('#useremail_hidden').val();
                //to check the values of the variables
                // console.log(email_hidden_check);
                // console.log(email);
                if(email != email_hidden_check)
                {
                    $.ajax({
						type: "GET",
						url: "/get_emails/"+email,
						success: function (response) {
							console.log(response);
							if(response ==  "true" )
							{
								$('#emailErr').html("* Email Already Registered!");
                                $('#submit').attr('disabled', true);
							}
							else
							{
								$('#emailErr').html("");
                                $('#submit').attr('disabled',false);
							}
						}
					});
                }
            });

	//Delete Multiple user Check
	$('#delete_multiple_user').click(function() {
        if ($('input[type=checkbox]:checked').length == 0) {
            swal("* Please Select record to delete!");
            return false;
        }
    });



	});
</script>
<!-- <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script> -->
<script src="{{asset('js/jqueryformvaldator.js')}}"></script>
</body>
</html>