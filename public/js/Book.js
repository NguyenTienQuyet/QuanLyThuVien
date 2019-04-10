
jQuery(function($) {

    $('#addBook').click(function(){

        $('#myModal-book').modal('show');
        $('#form-book')[0].reset();
        
    });

   

    $('#add-book').on('click', function(){

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }

        });
        
        var data = $('#type-book').val();
        // alert(data);
        
        $.ajax({
            
            url: "/api/v1/books/post",
            type: 'post',
            dataType: "json",
            data:{
                
                name: data
                
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
                                            +"<td class='text-center'>"+data[i].name+"</td>"
                                            
                                            +"<td class='text-center'>"
                                                +"<a href='#' class='text-blue' data-toggle='modal' id_edit_book="+data[i].id+" data-type='update-book' name="+data[i].name+">"
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


                            var id = $(this).attr("id_edit_book");
                            var name = $(this).attr("name");
                            // alert(name);

                            $('#book-type').val(name);
                            $('#book-id').val(id);
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
        var name = $(this).attr("name");
        // alert(name);

        $('#book-type').val(name);
        $('#book-id').val(id);
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
                                            +"<td class='text-center'>"+data[i].name+"</td>"
                                            
                                            +"<td class='text-center'>"
                                                +"<a href='#' class='text-blue' data-toggle='modal' id_edit_book="+data[i].id+" data-type='update-book' name="+data[i].name+">"
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


                            var id = $(this).attr("id_edit_book");
                            var name = $(this).attr("name");
                            // alert(name);

                            $('#book-type').val(name);
                            $('#book-id').val(id);
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
                                            +"<td class='text-center'>"+data[i].name+"</td>"
                                            
                                            +"<td class='text-center'>"
                                                +"<a href='#' class='text-blue' data-toggle='modal' id_edit_book="+data[i].id+" data-type='update-book' name="+data[i].name+">"
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


                            var id = $(this).attr("id_edit_book");
                            var name = $(this).attr("name");
                            // alert(name);

                            $('#book-type').val(name);
                            $('#book-id').val(id);
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
        // alert(id);

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
                                            +"<td class='text-center'>"+data[i].name+"</td>"
                                            
                                            +"<td class='text-center'>"
                                                +"<a href='#' class='text-blue' data-toggle='modal' id_edit_book="+data[i].id+" data-type='update-book' name="+data[i].name+">"
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


                            var id = $(this).attr("id_edit_book");
                            var name = $(this).attr("name");
                            // alert(name);

                            $('#book-type').val(name);
                            $('#book-id').val(id);
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