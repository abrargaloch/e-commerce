$(document).ready(function () {
    $('#current_password').keyup(function (e) {
        var current_password = $(this).val();

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "post",
            url: "/update-password",
            data: {current_password:current_password},
            success: function (response) {
                if(response == 'true'){
                    $('#password-check').html("");
                    $('#password-check').text("Password matched");
                }else{
                    $('#password-check').html("");
                    $('#password-check').text("Password does not match");
                }
            },
            error: function (param) {

              }
        });
    });
});
