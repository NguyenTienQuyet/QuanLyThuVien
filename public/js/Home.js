
$('#sign_in').click(function(){

    var email = $('#email_login').val();
    var password = $('#password_login').val();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url: '/api/v1/users/login',
        type: 'post',
        dataType: 'json',
        data:{
            email: email,
            password: password
        },
        success: function(data){
            console.log(data);
            window.location.href="{{homeAdmin}}"
            alert("Success !");
        },
        error: function(){
            alert("Login fail !");
        }

    });
});

$('#register').click(function(){

    var name = $('#name_user').val();
    var email = $('#email_user').val();
    var password = $('#password_user').val();
    var re_password = $('#re_password_user').val();

    if(password == re_password){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: '/api/v1/users/register',
            type: 'post',
            dataType: 'json',
            data: {
                name: name,
                email: email,
                password: password
            },
            success: function(){
                alert('Success !');
            },
            error: function(){
                alert('Register fail !');
            }
        });
    }
    else{
        alert('Confirm password is fail');
    }

    
});