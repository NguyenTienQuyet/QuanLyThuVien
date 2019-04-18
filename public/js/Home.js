// $.ajax({
                    
//         url: '/api/v1/books/'+'all?relations[]=authors&relations[]=genres&relations[]=publisher',
//         type: 'get',
//         dataType: 'json',
//         success: function(data) {

//             var output = "";
//             var j, q = "";
            

//             for(var i in data){
//                 var k = [];
//                 var p = [];
//                 var au = [];
//                 var ge = [];
//                 // var output = "";
//                 for(j in data[i].authors){
//                     k.push(data[i].authors[j].id);
//                     au.push(data[i].authors[j].name);
//                 }
//                 for(q in data[i].genres){
//                     p.push(data[i].genres[q].id);
//                     ge.push(data[i].genres[q].genreType);
//                 }
//                 var publisher = data[i].publisher.publisherName;
                
//                 output = 
//                             "<div class='single-popular-carusel'>"
//                                 +"<div class='thumb-wrap relative'>"
//                                     +"<div class='thumb relative'>"
//                                         +"<div class='overlay overlay-bg'></div>"  
//                                         +"<img class='img-fluid' src='frontend/img/p1.jpg' alt=''>"
//                                     +"</div>"
//                                     +"<div class='meta d-flex justify-content-between'>"
//                                         +"<p><span class='lnr lnr-users'></span> 355 <span class='lnr lnr-bubble'></span>35</p>"
//                                         +"<h4>$150</h4>"
//                                     +"</div>"                                  
//                                 +"</div>"
//                                 +"<div class='details'>"
//                                     +"<a href='#'>"
//                                         +"<h4>"
//                                             +data[i].title
//                                         +"</h4>"
//                                     +"</a>"
                                    
//                                         +"<p>"
//                                             +"Author: "+"<a class='author'><b style='color: black;'>"+au+"</b></a>"                                        
//                                         +"</p>"
                                    
                                    
//                                         +"<p>"
//                                             +"Genre: "+"<b style='color: black;'>"+ge+"</b>"                                       
//                                         +"</p>"
                                    
                                    
//                                         +"<p>"
//                                             +"Publisher: "+"<a class='publisher_book' id="+data[i].publisher_id+" href='#'>"+publisher+"</a>"                                      
//                                         +"</p>"
                                    
                                    
//                                         +"<p>"
//                                             +"Published Year: "+"<b style='color: black;'>"+data[i].publishedYear+"</b>"                                     
//                                         +"</p>"

//                                 +"</div>"
//                             +"</div>";

//                 $('#_list_book').append(output);

//             }
//             $('.publisher_book').click(function(){
//                 var publisher_id = $(this).attr('id');
//                 var publisher = $(this).text();
//                 // alert(publisher_id);

//                 $.ajax({
                    
//                     url: '/api/v1/publishers/get/'+publisher_id+'?relations[]=books',
//                     type: 'get',
//                     dataType: 'json',
//                     success: function(data) {
//                         // console.log(data);
//                         var outputi = "";
//                         var ji, qi = "";
//                         var ki = [];
//                         var pi = [];
//                         var aui = [];
//                         var gei = [];

//                         for(var i in data.books){

//                             // console.log(data.books);
//                             // for(var x in data[i].books){
                                
//                                 // console.log(data.books[i].id);
//                                 $.ajax({
                    
//                                     url: '/api/v1/books/get?'+'id='+data.books[i].id+'&relations[]=authors&relations[]=genres&relations[]=publisher',
//                                     type: 'get',
//                                     dataType: 'json',
//                                     success: function(dataa) {

//                                         // VAN DE NAM O DAY??????????????????
//                                         for(var l in dataa){
                                            
//                                             // var output = "";
//                                             for(ji in dataa[l].authors){
//                                                 ki.push(dataa[l].authors[ji].id);
//                                                 aui.push(dataa[l].authors[ji].name);
//                                             }
//                                             for(qi in dataa[l].genres){
//                                                 pi.push(dataa[l].genres[qi].id);
//                                                 gei.push(dataa[l].genres[qi].genreType);
//                                             }
//                                             // var publisher = data[i].publisher.publisherName;
                                            
//                                             outputi += 
//                                                         "<div class='single-popular-carusel'>"
//                                                             +"<div class='thumb-wrap relative'>"
//                                                                 +"<div class='thumb relative'>"
//                                                                     +"<div class='overlay overlay-bg'></div>"  
//                                                                     +"<img class='img-fluid' src='frontend/img/p1.jpg' alt=''>"
//                                                                 +"</div>"
//                                                                 +"<div class='meta d-flex justify-content-between'>"
//                                                                     +"<p><span class='lnr lnr-users'></span> 355 <span class='lnr lnr-bubble'></span>35</p>"
//                                                                     +"<h4>$150</h4>"
//                                                                 +"</div>"                                  
//                                                             +"</div>"
//                                                             +"<div class='details'>"
//                                                                 +"<a href='#'>"
//                                                                     +"<h4>"
//                                                                         +dataa[l].title
//                                                                     +"</h4>"
//                                                                 +"</a>"
                                                                
//                                                                     +"<p>"
//                                                                         +"Author: "+"<b style='color: black;'>"+aui+"</b>"                                        
//                                                                     +"</p>"
                                                                
                                                                
//                                                                     +"<p>"
//                                                                         +"Genre: "+"<b style='color: black;'>"+gei+"</b>"                                       
//                                                                     +"</p>"
                                                                
                                                                
//                                                                     // +"<p>"
//                                                                     //     +"Publisher: "+"<a class='publisher_book' id="+data[i].publisher_id+" href='#'>"+publisher+"</a>"                                      
//                                                                     // +"</p>"
                                                                
                                                                
//                                                                     +"<p>"
//                                                                         +"Published Year: "+"<b style='color: black;'>"+dataa[l].publishedYear+"</b>"                                     
//                                                                     +"</p>"

//                                                             +"</div>"
//                                                         +"</div>";

                                            
//                                         }
//                                         $('#list_book').html(outputi);
                                        
//                                     },
//                                     error: function(err){
//                                         alert('error');
//                                     }


//                                 });
//                             // }
//                         }
//                     },
//                     error: function(err){
                        
//                     }
                            
//                 });
//             });
//         },

//         error: function(err){
//             console.log(mess);
//         }
// });



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
        success: function(){
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