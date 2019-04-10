
jQuery(function($) {

    $('#addBook').click(function(){

        $('#myModal-book').modal('show');
        $('#title').val("");
        $('#publisher_id').val("");
        $('#publishedYear').val("");
        
    });

    $('#dropdown_publisher li').click(function(){
        $('#publisher_id').val($(this).text());
        $('#edit_publisher_id').val($(this).text());
        
    });

    $('#dropdown_author li').click(function(){
        $('#author_id').val($(this).text());
        $('#edit_author_id').val($(this).text());
        
    });

    $('#dropdown_genre li').click(function(){
        $('#genre_id').val($(this).text());
        $('#edit_genre_id').val($(this).text());
        
    });

    $('#add-book').on('click', function(){

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }

        });
        
        var title = $('#title').val();

        var publisher_id = $('#publisher_id').val();
        var author_id = $('#author_id').val();
        var genre_id = $('#genre_id').val();
        var publishedYear = $('#publishedYear').val();
        // alert(data);
        
        $.ajax({
            
            url: "/api/v1/books/post",
            type: 'post',
            dataType: "json",
            data:{
                
                title: title,
                author_id: author_id,
                genre_id: genre_id,
                publisher_id: publisher_id,
                publishedYear: publishedYear
                
            },
            success: function () {
                alert("success!");
                $('#myModal-book').modal('hide');
                $.ajax({
                    
                    url: '/api/v1/books/'+'all',
                    type: 'get',
                    dataType: 'json',
                    success: function(data) {
                        var output = "";
                        for(var i = 0; i < data.length; i++){

                            output +=   "<tr>"
                                            +"<td class='text-center'>"+data[i].id+"</td>"
                                            +"<td class='text-center'>"+data[i].title+"</td>"
                                            +"<td class='text-center'>"+data[i].publisher_id+"</td>"
                                            +"<td class='text-center'>"+data[i].publishedYear+"</td>"
                                            +"<td class='text-center'>"
                                                +"<a href='#' class='text-blue' data-toggle='modal' id_edit_book="+data[i].id+" data-type='update-book' title="+data[i].title+" publisher_id="+data[i].publisher_id+" publishedYear="+data[i].publishedYear+">"
                                                    +"<i class='ace-icon fa fa-pencil bigger-130'></i>"
                                                +"</a>"
                                            +"</td>"
                                            +"<td class='text-center'>"
                                                +"<a href='#' class='text-red delete_book' id_delete_book="+data[i].id+" data-type='delete-book'>"
                                                    +"<i class='ace-icon fa fa-trash-o bigger-130'></i>"
                                                +"</a>"
                                            +"</td>"
                                            
                                        +"</tr>";

                        }
                        $('#body_list_book').html(output);
                        $('a[data-type=update-book]').on('click', function(){


                            var id = $(this).attr("id");
                            var edit_title = $(this).attr("title");
                            var edit_publisher_id = $(this).attr("publisher_id");
                            var edit_published_year = $(this).attr("publishedYear");

                            $.ajax({
                                        
                                url: '/api/v1/publishers/get/'+edit_publisher_id,
                                type: 'get',
                                dataType: 'json',
                                success: function(data) {
                                    edit_publisher_id = data.publisherName;
                                    $('#edit_publisher_id').val(edit_publisher_id);
                                },
                                error: function(){
                                    alert("Loi gi do");
                                }
                            });

                            $('#edit_title').val(edit_title);
                            
                            $('#edit_published_year').val(edit_published_year);
                            $('#editModal-book').modal('show');
                        });

                        $('a[data-type=delete-book]').on('click', function(){

                            var id = $(this).attr("id_delete_book");

                            $('#book-delete').val(id);
                            $('#deleteModal-book').modal('show');
                            
                        });


                        // alert('success');
                    },
                    error: function(err){
                        alert(1);
                    }
                });
            },
            error: function(mess){
                alert("error! Please, try again.");
                console.log(mess);
            }
        });
    });

    

    $('a[data-type=update-book]').on('click', function(){


        var id = $(this).attr("id");
        var edit_title = $(this).attr("title");
        var edit_publisher_id = $(this).attr("publisher_id");
        var edit_published_year = $(this).attr("publishedYear");

        $.ajax({
                    
            url: '/api/v1/publishers/get/'+edit_publisher_id,
            type: 'get',
            dataType: 'json',
            success: function(data) {
                edit_publisher_id = data.publisherName;
                $('#edit_publisher_id').val(edit_publisher_id);
            },
            error: function(){
                alert("Loi gi do");
            }
        });

        $('#edit_title').val(edit_title);
        
        $('#edit_published_year').val(edit_published_year);
        $('#editModal-book').modal('show');
    });

    $('#edit-book').on('click', function () {
        var id=$('#book-id').val();
        var data = $('#book-type').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }

        });

        $.ajax({
                
            url: '/api/v1/books/patch/'+id,
            type: 'patch',
            dataType: "json",
            data: {name: data, _method: "patch"},
            success: function () {
                alert('success!');
                $('#editModal-book').modal('hide');
                $.ajax({
                    
                    url: '/api/v1/books/'+'all',
                    type: 'get',
                    dataType: 'json',
                    success: function(data) {
                        var output = "";
                        for(var i = 0; i < data.length; i++){

                            output +=   "<tr>"
                                            +"<td class='text-center'>"+data[i].id+"</td>"
                                            +"<td class='text-center'>"+data[i].title+"</td>"
                                            +"<td class='text-center'>"+data[i].publisher_id+"</td>"
                                            +"<td class='text-center'>"+data[i].publishedYear+"</td>"
                                            +"<td class='text-center'>"
                                                +"<a href='#' class='text-blue' data-toggle='modal' id_edit_book="+data[i].id+" data-type='update-book' title="+data[i].title+" publisher_id="+data[i].publisher_id+" publishedYear="+data[i].publishedYear+">"
                                                    +"<i class='ace-icon fa fa-pencil bigger-130'></i>"
                                                +"</a>"
                                            +"</td>"
                                            +"<td class='text-center'>"
                                                +"<a href='#' class='text-red delete_book' id_delete_book="+data[i].id+" data-type='delete-book'>"
                                                    +"<i class='ace-icon fa fa-trash-o bigger-130'></i>"
                                                +"</a>"
                                            +"</td>"
                                            
                                        +"</tr>";

                        }
                        $('#body_list_book').html(output);
                        $('a[data-type=update-book]').on('click', function(){


                            var id = $(this).attr("id");
                            var edit_title = $(this).attr("title");
                            var edit_publisher_id = $(this).attr("publisher_id");
                            var edit_published_year = $(this).attr("publishedYear");

                            $.ajax({
                                        
                                url: '/api/v1/publishers/get/'+edit_publisher_id,
                                type: 'get',
                                dataType: 'json',
                                success: function(data) {
                                    edit_publisher_id = data.publisherName;
                                    $('#edit_publisher_id').val(edit_publisher_id);
                                },
                                error: function(){
                                    alert("Loi gi do");
                                }
                            });

                            $('#edit_title').val(edit_title);
                            
                            $('#edit_published_year').val(edit_published_year);
                            $('#editModal-book').modal('show');
                        });

                        $('a[data-type=delete-book]').on('click', function(){

                            var id = $(this).attr("id_delete_book");

                            $('#book-delete').val(id);
                            $('#deleteModal-book').modal('show');
                            
                        });


                        // alert('success');
                    },
                    error: function(err){
                        alert(1);
                    }
                });
            },
            error: function(mess){
                alert("error! Please, try again.");
                // alert(mess);
                $('#editModal-book').modal('hide');
                $.ajax({
                    
                    url: '/api/v1/books/'+'all',
                    type: 'get',
                    dataType: 'json',
                    success: function(data) {
                        var output = "";
                        for(var i = 0; i < data.length; i++){

                            output +=   "<tr>"
                                            +"<td class='text-center'>"+data[i].id+"</td>"
                                            +"<td class='text-center'>"+data[i].title+"</td>"
                                            +"<td class='text-center'>"+data[i].publisher_id+"</td>"
                                            +"<td class='text-center'>"+data[i].publishedYear+"</td>"
                                            +"<td class='text-center'>"
                                                +"<a href='#' class='text-blue' data-toggle='modal' id_edit_book="+data[i].id+" data-type='update-book' title="+data[i].title+" publisher_id="+data[i].publisher_id+" publishedYear="+data[i].publishedYear+">"
                                                    +"<i class='ace-icon fa fa-pencil bigger-130'></i>"
                                                +"</a>"
                                            +"</td>"
                                            +"<td class='text-center'>"
                                                +"<a href='#' class='text-red delete_book' id_delete_book="+data[i].id+" data-type='delete-book'>"
                                                    +"<i class='ace-icon fa fa-trash-o bigger-130'></i>"
                                                +"</a>"
                                            +"</td>"
                                            
                                        +"</tr>";

                        }
                        $('#body_list_book').html(output);
                        $('a[data-type=update-book]').on('click', function(){


                            var id = $(this).attr("id");
                            var edit_title = $(this).attr("title");
                            var edit_publisher_id = $(this).attr("publisher_id");
                            var edit_published_year = $(this).attr("publishedYear");

                            $.ajax({
                                        
                                url: '/api/v1/publishers/get/'+edit_publisher_id,
                                type: 'get',
                                dataType: 'json',
                                success: function(data) {
                                    edit_publisher_id = data.publisherName;
                                    $('#edit_publisher_id').val(edit_publisher_id);
                                },
                                error: function(){
                                    alert("Loi gi do");
                                }
                            });

                            $('#edit_title').val(edit_title);
                            
                            $('#edit_published_year').val(edit_published_year);
                            $('#editModal-book').modal('show');
                        });

                        $('a[data-type=delete-book]').on('click', function(){

                            var id = $(this).attr("id_delete_book");

                            $('#book-delete').val(id);
                            $('#deleteModal-book').modal('show');
                            
                        });


                        // alert('success');
                    },
                    error: function(err){
                        alert(1);
                    }
                });
            }
        });
    });


    $('a[data-type=delete-book]').on('click', function(){

        var id = $(this).attr("id");

        $('#book-delete').val(id);
        $('#deleteModal-book').modal('show');
        
    });

    $('#_delete-book').on('click', function(){

        var id = $('#book-delete').val();
        alert(id);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }

        });

        $.ajax({
                
                url: '/api/v1/books/delete/'+id,
                type: 'delete',
                data: {id: id, _method: "delete"},
            success: function () {
                alert('success!');
                $('#deleteModal-book').modal('hide');
                $.ajax({
                    
                    url: '/api/v1/books/'+'all',
                    type: 'get',
                    dataType: 'json',
                    success: function(data) {
                        var output = "";
                        for(var i = 0; i < data.length; i++){

                            output +=   "<tr>"
                                            +"<td class='text-center'>"+data[i].id+"</td>"
                                            +"<td class='text-center'>"+data[i].title+"</td>"
                                            +"<td class='text-center'>"+data[i].publisher_id+"</td>"
                                            +"<td class='text-center'>"+data[i].publishedYear+"</td>"
                                            +"<td class='text-center'>"
                                                +"<a href='#' class='text-blue' data-toggle='modal' id_edit_book="+data[i].id+" data-type='update-book' title="+data[i].title+" publisher_id="+data[i].publisher_id+" publishedYear="+data[i].publishedYear+">"
                                                    +"<i class='ace-icon fa fa-pencil bigger-130'></i>"
                                                +"</a>"
                                            +"</td>"
                                            +"<td class='text-center'>"
                                                +"<a href='#' class='text-red delete_book' id_delete_book="+data[i].id+" data-type='delete-book'>"
                                                    +"<i class='ace-icon fa fa-trash-o bigger-130'></i>"
                                                +"</a>"
                                            +"</td>"
                                            
                                        +"</tr>";

                        }
                        $('#body_list_book').html(output);
                        $('a[data-type=update-book]').on('click', function(){


                            var id = $(this).attr("id");
                            var edit_title = $(this).attr("title");
                            var edit_publisher_id = $(this).attr("publisher_id");
                            var edit_published_year = $(this).attr("publishedYear");

                            $.ajax({
                                        
                                url: '/api/v1/publishers/get/'+edit_publisher_id,
                                type: 'get',
                                dataType: 'json',
                                success: function(data) {
                                    edit_publisher_id = data.publisherName;
                                    $('#edit_publisher_id').val(edit_publisher_id);
                                },
                                error: function(){
                                    alert("Loi gi do");
                                }
                            });

                            $('#edit_title').val(edit_title);
                            
                            $('#edit_published_year').val(edit_published_year);
                            $('#editModal-book').modal('show');
                        });

                        $('a[data-type=delete-book]').on('click', function(){

                            var id = $(this).attr("id_delete_book");

                            $('#book-delete').val(id);
                            $('#deleteModal-book').modal('show');
                            
                        });


                        // alert('success');
                    },
                    error: function(err){
                        alert(1);
                    }
                });
            },
            error: function(mess){
                alert("error! Please, try again.");
                console.log(mess);
            }
        });
        
        
    });

});