<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Employee Infomation</title>
	<link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}" />
	<link rel="stylesheet" href="{{ URL::asset('css/style.css') }}" />
	<script type="text/javascript" src="{{ URL::asset('js/jquery.min.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
	<script src="http://cdn.jsdelivr.net/jquery.validation/1.15.0/jquery.validate.min.js"></script>
	<script type="text/javascript" src="{{ URL::asset('js/script.js') }}"></script>
</head>
<body>
	<div class="container">
		<div class="row">
			<h1>Thông tin nhân viên</h1>
			<table class="table table-bordered">
				<tr>
					<td>Mã nhân viên:</td>
					<td>{!! $employee->employee_id !!}</td>
				</tr>
				<tr>
					<td>Tên nhân viên:</td>
					<td>{!! $employee->employee_name !!}</td>
				</tr>
				<tr>
					<td>Ảnh</td>
					<td><img class="img-responsive" width="100" height="75" src="{{ url($employee->photo) }}" />
					</td>
				</tr>
				<tr>
					<td>Ngày sinh:</td>
					<td>{!! $employee->birthday !!}</td>
				</tr>
				<tr>
					<td>Giới tính:</td>
					<td>{!! $employee->sex !!}</td>
				</tr>
				<tr>
					<td>Địa chỉ thường trú:</td>
					<td>{!! $employee->address !!}</td>
				</tr>
				<tr>
					<td>Số điện thoại:</td>
					<td>{!! $employee->telephone !!}</td>
				</tr>
				<tr>
					<td>Email:</td>
					<td>{!! $employee->email !!}</td>
				</tr>
				<tr>
					<td>Quốc tịch:</td>
					<td>{!! $employee->nationality !!}</td>
				</tr>
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
</body>
</html>