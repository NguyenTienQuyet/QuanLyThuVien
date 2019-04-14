$.ajax({
                    
        url: '/api/v1/books/'+'all?relations[]=authors&relations[]=genres&relations[]=publisher',
        type: 'get',
        dataType: 'json',
        success: function(data) {

            var output = "";
            var j, q = "";
            

            for(var i in data){
                var k = [];
                var p = [];
                var au = [];
                var ge = [];
                // var output = "";
                for(j in data[i].authors){
                    k.push(data[i].authors[j].id);
                    au.push(data[i].authors[j].name);
                }
                for(q in data[i].genres){
                    p.push(data[i].genres[q].id);
                    ge.push(data[i].genres[q].genreType);
                }
                var publisher = data[i].publisher.publisherName;
                // $.ajax({
                            
                //     url: '/api/v1/publishers/get?id='+data[i].publisher_id,
                //     type: 'get',
                //     dataType: 'json',
                //     success: function(data) {
                //         $('#publisher').val(data.publisherName);
                        
                        
                //     },
                //     error: function(){
                //         alert("Error get data publisher");
                //     }
                // });
                // publisher = $('#publisher').val();
                // alert(publisher);
                output = 
                        // "<div class='active-popular-carusel'>"
                            "<div class='single-popular-carusel'>"
                                +"<div class='thumb-wrap relative'>"
                                    +"<div class='thumb relative'>"
                                        +"<div class='overlay overlay-bg'></div>"  
                                        +"<img class='img-fluid' src='frontend/img/p1.jpg' alt=''>"
                                    +"</div>"
                                    +"<div class='meta d-flex justify-content-between'>"
                                        +"<p><span class='lnr lnr-users'></span> 355 <span class='lnr lnr-bubble'></span>35</p>"
                                        +"<h4>$150</h4>"
                                    +"</div>"                                  
                                +"</div>"
                                +"<div class='details'>"
                                    +"<a href='#'>"
                                        +"<h4>"
                                            +data[i].title
                                        +"</h4>"
                                    +"</a>"
                                    
                                        +"<p>"
                                            +"Author: "+"<a href='#'>"+au+"</a>"                                        
                                        +"</p>"
                                    
                                    
                                        +"<p>"
                                            +"Genre: "+"<a href='#'>"+ge+"</a>"                                       
                                        +"</p>"
                                    
                                    
                                        +"<p>"
                                            +"Publisher: "+"<a href='#'>"+publisher+"</a>"                                      
                                        +"</p>"
                                    
                                    
                                        +"<p>"
                                            +"Published Year: "+"<a href='#'>"+data[i].publishedYear+"</a>"                                     
                                        +"</p>"

                                +"</div>"
                            +"</div>";
                        // +"</div>";
                
                // $('#publisher').val("");
                $('#_list_book').append(output);

                
            }
            // $('#list_book').html(output);
            
        },

        error: function(err){
            console.log(mess);
        }
    });