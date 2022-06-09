// customer registration script in ajax
$(document).ready(function () {
    $('#registerForm').on('submit', function (e) {
        e.preventDefault();
        const url = $(this).attr("action");

        var firstname = $("input[name='firstname']").val();
        var lastname = $("input[name='lastname']").val();
        var email = $("input[name='email']").val();
        var phone = $("input[name='phone']").val();
        var password = $("input[name='password']").val();
        var confirmpassword = $("input[name='passwordConfirmation']").val();
        var defaultaddress = $("input[name='address']").val();
        var data = {
            firstname: firstname,
            lastname: lastname,
            email: email,
            phone: phone,
            password: password,
            confirmpassword: passwordConfirmation,
            defaultaddress: address,
        }
        $.ajax({
            url: url,
            type: 'POST',
            dataType: 'JSON',
            data: data,
            success: function (data) {
                if (data.firstName_error) {
                    Command: toastr['error'](data.firstName_error)
                    $("input[name=firstname]").css('border', '1px solid red').focus();
                }
                if (data.lastName_error) {
                    Command: toastr['error'](data.lastName_error)
                    $("input[name=lastname]").css('border', '1px solid red').focus();
                }
                if (data.email_error) {
                    Command: toastr['error'](data.email_error)
                    $("input[name=email]").css('border', '1px solid red').focus();
                }
                if (data.phone_error) {
                    Command: toastr['error'](data.phone_error)
                    $("input[name=phone]").css('border', '1px solid red').focus();
                }
                if (data.password_error) {
                    Command: toastr['error'](data.password_error)
                    $("input[name=password]").css('border', '1px solid red').focus();
                }
                if (data.confirmpassword_error) {
                    Command: toastr['error'](data.confirmpassword_error)
                    $("input[name=passwordConfirmation]").css('border', '1px solid red').focus();
                }
                if (data.address_error) {
                    Command: toastr['error'](data.address_error)
                    $("input[name=address]").css('border', '1px solid red').focus();
                }

                if (data.response == 'success') {
                    (data.message == 'success')
                    Command: toastr['success']('Registration successful.')
                    setTimeout(function () {
                        window.location.reload();
                        window.location.href = 'Home';
                    }, 3000)
                }
                else {
                    (data.response == 'error')
                        (data.message == 'error');
                    Command: toastr['error']('Something went wrong |Please try again later.')
                    setTimeout(function () {
                        window.location.reload();
                    }, 3000)
                }
            }
        })
    })
})

// customer login script  
$(document).ready(function () {
    $("#loginForm").on('submit', function (e) {
        e.preventDefault()
        const email = $("#user_email").val()
        const password = $("#user_password").val()
        const data = {
            email: email,
            password: password
        }
        $.post(('auths/login_user'), data, function (response) {
            const data = JSON.parse(response)
            // Display success messages if there are any
            if (data.response == 'success') {
                $("#loginForm")[0].reset()
                $("#successMessage").text(data.message).css({
                    'display': 'block'
                })
                Command: toastr['success'](data.message)
                // Redirect to user to there Relevant page
                setTimeout(function () {
                    window.location.href = "Home"
                }, 3000)
                // Display errors if there are any
            } else if (data.response == 'error') {
                $("#errorMessage").text(data.message).css({
                    'display': 'block'
                }).fadeOut(5000)
                Command: toastr['error'](data.message)
                setTimeout(function () {
                }, 3000)
            }
        })
    })
})


// function getBrand(){
// 	$.ajax({
// 	type: 'GET,
// 	url: "all_brand.php',
// 	dataType: 'JSON',
// 	success: function (data) {
// 	// console.log(data);
// 	for (var i = 0; i < data.length; i++)
// 	{
// 	// var idi = data[i].id;
// 	%3D
// 	var br_id = data[i].id;
// 	var brandname = data[i].brand_name;
// 	var status - data[i].status;
// 	$('#brands ').append ('<li id='+br_id+' class="list-group-item list-group-item-action"><input br_id="'+ b
// 	%3D
// 	// $('#brands').append('<a href="#" bid= '+ id1 + ' class="list-group-item list-group-item-action">' +
// 	}
// 	},
// 	error: function (xhr, status, error) {
// 	alert(xhr.responseText);
// 	}
// 	});
