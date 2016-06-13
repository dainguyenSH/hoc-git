$(function(){
	// $('tr[data-href]').on("click", function() {
	//     document.location = $(this).data('href');
	// });

	 $.validator.addMethod(
        "employee_id_rule", 
        function(value, element) {
            return this.optional(element) || /^[a-zA-Z0-9]+$/i.test(value);
        }
    );

	$('#add_form').validate({
		rules: {
			employee_id: {
				required: true,
				employee_id_rule: true
			},
			employee_name: {
				required: true,
				maxlength: 25
			},
			email: {
				required: true,
				email: true
			}
		},

		messages: {
			employee_id: {
				required: "Yêu cầu nhập mã nhân viên",
				employee_id_rule: "Mã chỉ bao gồm số và chữ cái"
			},
			employee_name: {
				required: "Yêu cầu nhập tên",
				maxlength: "Được nhập tối đa 25 ký tự"
			},
			email: {
				required: "Yêu cầu nhập email",
				email: "Nhập đúng định dạng email"
			}
		},
		submitHandler: function(form) {
			console.log('dd');
		    form.submit();
		  }
	});

	
});
