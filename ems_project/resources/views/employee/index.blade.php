<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>EMS</title>
	<meta name="_token" content="{{csrf_token()}}">
	<link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}" />
	<link rel="stylesheet" href="{{ URL::asset('css/sweetalert.css') }}" />
	<link rel="stylesheet" href="{{ URL::asset('css/style.css') }}" />
	<script type="text/javascript" src="{{ URL::asset('js/jquery.min.js') }}"></script>
	<script src="http://cdn.jsdelivr.net/jquery.validation/1.15.0/jquery.validate.min.js"></script>
	<script type="text/javascript" src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('js/sweetalert.min.js') }}"></script>

	<script type="text/javascript" src="{{ URL::asset('js/script.js') }}"></script>
</head>
<body>
	<div class="container">
		<div class="row">
			<h1>EMS</h1>
			<table class="table table-hover table-bordered">
				<thead>
			      <tr>
			      	<th>STT</th>
					<th>Tên nhân viên</th>
					<th>Ngày sinh</th>
					<th>Giới tính</th>
					<th>Email</th>
					<th>Hành động</th>
			      </tr>
			    </thead>
				<tr>
					
				</tr>
				<?php $counter = 1 ?>
				@foreach ($list_emp as $value)
					<tr id="row-{{$value->id}}" data-href="/info/{!! $value->id !!}" title="Click on each row to view details">
						<td>{!! $counter++ !!}</td>
						<td>{!! $value->employee_name !!}</td>
						<td>{!! $value->birthday !!}</td>
						<td>{!! $value->sex !!}</td>
						<td>{!! $value->email !!}</td>
						<td>
							<button type="button" id="show" onclick="window.location.href='/info/{{$value->id}}'" class="btn btn-info btn-sm">Xem</button>
							<button type="button" id="update" onclick="window.location.href='/edit/{{$value->id}}'" class="btn btn-warning btn-sm">Sửa</button>
							<button type="button" id="delete" onClick ="funDelete({{$value->id}})" class="btn btn-danger btn-sm">Xóa</button>
						</td>
					</tr>
				@endforeach
			</table>
		</div>
		<div class="row">
			<h1>Quá trình học tập</h1>
			<table class="table table-bordered">
				<tr>
					<td>STT</td>
					<td>Bằng cấp</td>
					<td>Năm</td>
					<td>Trường</td>
				</tr>
			</table>
		</div>
	</div>

	<script>
		function funDelete (id) {
			// window.location.href = 'delete/'+id;
			swal({   title: "Bạn có muốn xóa?",
			   text: "",   
			   type: "warning",   
			   showCancelButton: true,   
			   confirmButtonColor: "#DD6B55",   
			   confirmButtonText: "Có",   
			   cancelButtonText: "Không",   
			   closeOnConfirm: false,   
			   closeOnCancel: false 
			}, 
			   function(isConfirm){   
			   	if (isConfirm) {     
			   		$.ajaxSetup({
			                headers: {
			                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
			                }
			            });

						$.ajax({
						    url: 'delete/'+id,
						    type: 'DELETE',
						 
						    success: function(result) {
						    	// alert('success');
						    	$('#row-' + id).remove();
						    },
						    error: function(result){
						    	alert('error');
						    }
						});

			   		swal("Deleted!", "Xóa Thành công.", "success");
			   	} 
			   	else {
			   		swal("Cancelled", "Your imaginary file is safe :)", "error");
			   	}
			   });
			
		}
	</script>
</body>
</html>