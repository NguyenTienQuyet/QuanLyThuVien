
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

$('#borrow').click(function(){
    var id = $('this').attr('book_id');
    alert(id);
    $('#borrow_book_id').val(id);
    $('#myModal-borrow').modal('show');
});

$('#borrow_book').click(function(){
    var book_id = $('borrow_book_id').val();
    alert(book_id);
    var quantity = $('#quantity').val();
    alert(quantity);
    var user_id = 

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url: '/api/v1/books/borrow',
        type: 'patch',
        dataType: 'json',
        data: {
            user_id: user_id,
            books: [
                book_id: book_id,
                quantity: quantity
            ]
        },
        success: function(){

        },
        error: function(){

        }
    });

})