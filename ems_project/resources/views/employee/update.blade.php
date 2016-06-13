<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Employee Infomation Add</title>
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
			<h1 class="text-center">Chỉnh sửa thông tin nhân viên</h1>
			<div class="col-md-6 col-md-offset-3">
				<form id="add_form" method="POST" name="add" action="/store" enctype="multipart/form-data">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					
				
					<div class="form-group">
						<label for="">Mã nhân viên</label>
						<input type="text" class="form-control" id="employee_id" name="employee_id" placeholder="Nhập mã nhân viên" value="{{old('employee_id')}}">
						@if($errors->has('employee_id'))
							<p style="color:red;">{{$errors->first('employee_id')}}</p>
						@endif
					</div>
					<div class="form-group">
						<label for="">Tên nhân viên</label>
						<input type="text" class="form-control" id="employee_name" name="employee_name" placeholder="Nhập tên nhân viên" value="{{old('employee_name')}}">
						@if($errors->has('employee_name'))
							<p style="color:red;">{{$errors->first('employee_name')}}</p>
						@endif
					</div>
				
					<div class="form-group">
						<label for="">Ảnh</label>
						<input type="file" id="photo" name="photo">
					</div>

					<div class="form-group">
						<label for="">Ngày sinh</label>
						<input type="date" class="form-control" id="birthday" name="birthday">
					</div>

					<div class="form-group">
						<label for="">Giới tính</label><br >
						<input type="radio" name="sex" id="sex" value="1" checked="checked"> Nam
						<input type="radio" name="sex" id="sex" value="2"> Nữ
					</div>

					<div class="form-group">
						<label for="">Địa chỉ</label>
						<input type="text" class="form-control" id="address" name="address" placeholder="Nhập địa chỉ">
					</div>

					<div class="form-group">
						<label for="">Số điện thoại</label>
						<input type="text" class="form-control" id="telephone" name="telephone" placeholder="Nhập số điện thoại">
					</div>

					<div class="form-group">
						<label for="">Email</label>
						<input type="text" class="form-control" id="email" name="email" placeholder="Nhập email" value="{{old('email')}}">
						@if($errors->has('email'))
							<p style="color:red;">{{$errors->first('email')}}</p>
						@endif
					</div>

					<div class="form-group">
						<label for="">Quốc tịch</label>
						<input type="text" class="form-control" id="nationality" name="nationality" placeholder="Nhập quốc tịch">
					</div>
				
					<button type="submit" class="btn btn-primary">Thêm mới</button>
				</form>
			</div>
			
			
		</div>
	</div>
</body>
</html>