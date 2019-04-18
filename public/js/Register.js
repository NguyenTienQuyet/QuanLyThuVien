jQuery(function ($) {
    $('#register').on('click', function () {
        var name = $('#name_user').val();
        var email = $('#email_user').val();
        var password = $('#password_user').val();
        $.ajax({

            url: "http://127.0.0.1:8000/api/v1/users/register",
            type: 'post',
            dataType: "json",
            data: {

                name: name,
                email: email,
                password: password,
                c_password:password

            },
            success: function () {
                window.location.href="http://127.0.0.1:8000/homeAdmin"
                alert("success!");
            },
            error: function (err) {
                console.log(err);
                alert(err.toString());
            }
        });


    })
})
