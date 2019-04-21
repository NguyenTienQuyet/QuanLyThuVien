
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

            if(data.Role.id == 1){
                window.location.href="http://127.0.0.1:8000/homePage";
            }
            else{
                window.location.href="http://127.0.0.1:8000/homeAdmin";
            }
            
            
            
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

$('.borrow').click(function(){
    var id = $('#book_id').val();
    // alert(id);
    $('#borrow_book_id').val(id);
    $('#myModal-borrow').modal('show');
});

$('#borrow_book').click(function(){
    var book_id = $('#borrow_book_id').val();
    // alert(book_id);
    var quantity = $('#quantity').val();
    // alert(quantity);
    var user_id = $('#borrow_user_id').val();
    // alert(user_id);
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
            books: {
                0:{
                book_id: book_id,
                quantity: quantity
                }
            }
        },
        success: function(data){
            alert('success');
            $('#myModal-borrow').modal('hide');
        },
        error: function(err){
            alert(err);
            console.log(err);
        }
    });

});

$('#_register_card').click(function(){

    var id = $(this).attr('data_id');
    // alert(id);
    $('#card_user_id').val(id);
    $('#card').modal('show');
});

$('#register_card').click(function(){
    var user_id = $('#card_user_id').val();
    // alert(user_id);

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url: '/api/v1/cards/post',
        type: 'post',
        dataType: 'json',
        data: {
            user_id: user_id,
            
        },
        success: function(data){
            alert('success');
            $('#card').modal('show');
            $('#_register_card').text("");
        },
        error: function(err){
            console.log(err);
            alert('Register card fail');
            $('#card').modal('show');
        }
    });

})