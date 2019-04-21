$.ajax({

        url: '/api/v1/histories/'+'all?relations[]=users',
        type: 'get',
        dataType: 'json',
        success: function(data) {



            var output = "";
            
            for(var i = 0; i < data.length; i++){
                
                output +=   "<tr>"
                            +"<td class='text-center'>"+data[i].id+"</td>"
                            +"<td class='text-center'>"+data[i].book_copies_id+"</td>"
                            +"<td class='text-center'>"+data[i].user_id+"</td>"
                            +"<td class='text-center'>"
                                +"<a href='#' class='text-yellow' id="+data[i].id+" book_copies_id="+data[i].book_copies_id+" user_id="+data[i].user_id+" data-type='active-history' data-toggle='modal'>"
                                    +"<i class='ace-icon fa fa-eye bigger-130'></i>"
                                +"</a>"
                            +"</td>"
                            
                            +"<td class='text-center'>"
                                +"<a class='text-blue' href='#' id="+data[i].id+" data-type='rent-history' data-toggle='modal'>"
                                    "<i class='ace-icon fa fa-hourglass-1 bigger-130'></i>"
                                "</a>"

                            +"</td>"
                            +"<td class='text-center'>"
                                +"<a class='text-green' href='#'' id="+data[i].id+" data-type='return-history' data-toggle='modal'>"
                                    +"<i class='ace-icon fa fa-hourglass-end bigger-130'></i>"
                                +"</a>"

                            +"</td>"
                        +"</tr>";


            }
            $('#body_list_book').html(output);
            $('#addBook').click(function(){


                $('#title').val("");
                $('#author_select').val("");
                $('#genre_select').val("");
                $('#publisher_id').val("");
                $('#publishedYear').val("");
                $('#myModal-book').modal('show');

            });
            $('a[data-type=update-book]').on('click', function(){

                $('#edit_title').val("");
                $('#select_author').val('');
                $('#select_genre').val('');
                $('#edit_published_year').val("");
                $('#editModal-book').modal('show');


                var id = $(this).attr("id_edit_book");
                var edit_title = "";
                var edit_author_id = $(this).attr("author_id");
                var edit_genre_id = $(this).attr("genre_id");
                var edit_publisher_id = $(this).attr("publisher_id");
                var edit_published_year = $(this).attr("publishedYear");

                // var author = $(this).attr("author");
                // var genre = $(this).attr("genre");
                var author_array = [];
                var genre_array = [];

                author_array = edit_author_id.split(",");
                // author_array = author_array.split(",");

                genre_array = edit_genre_id.split(",");
                // genre_array = genre_array.split(",");
                // console.log(author_array);
                // console.log(genre_array);
                $.ajax({

                    url: '/api/v1/books/get?id='+id,
                    type: 'get',
                    dataType: 'json',
                    success: function(data) {
                        title = data.title;
                        $('#edit_title').val(title);
                        // alert(title);
                    },
                    error: function(){
                        alert("Error get data book");
                    }
                });
                // console.log(title);
                $.ajax({

                    url: '/api/v1/publishers/get?id='+edit_publisher_id,
                    type: 'get',
                    dataType: 'json',
                    success: function(data) {
                        edit_publisher_id = data.publisherName;
                        $('#edit_publisher_id').val(edit_publisher_id);
                    },
                    error: function(){
                        alert("Error get data publisher");
                    }
                });

                var nameAuthor = [];

                for(var a = 0; a < author_array.length; a++){
                    // alert(author_array[a]);
                    $.ajax({

                        url: '/api/v1/authors/get?id='+author_array[a],
                        type: 'get',
                        dataType: 'json',
                        success: function(data) {
                            nameAuthor.push(data.name);
                            $('#select_author').val(nameAuthor);

                        },
                        error: function(){
                            alert("Error get data author");
                        }
                    });
                }





                var genreType = [];

                for(var g = 0; g < genre_array.length; g++){
                    // alert(genre_array[g]);
                    $.ajax({

                        url: '/api/v1/genres/get?id='+genre_array[g],
                        type: 'get',
                        dataType: 'json',
                        success: function(data) {
                            genreType.push(data.genreType);
                            $('#select_genre').val(genreType);

                        },
                        error: function(){
                            alert("Error get data genre");
                        }
                    });
                }




                // $('#edit_title').val(title);

                $('#edit_published_year').val(edit_published_year);
                $('#editModal-book').modal('show');
                // console.log(nameAuthor);
                // console.log(genreType);
            });

            $('a[data-type=delete-book]').on('click', function(){

                var id = $(this).attr("id_delete_book");

                $('#book-delete').val(id);
                $('#deleteModal-book').modal('show');

            });

            $('a[data-type=import-book]').click(function(){

                $('#quantity_book').val("");

                var id = $(this).attr("id_edit_book");

                $('#import_book_id').val(id);
                
                $('#importModal-book').modal('show');

            });


            // alert('success');
        },
        error: function(err){
            alert(1);
        }
    });


$('a[data-type=active-book]').click(function(){
	var user_id = $(this).attr('user_id');

	$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }

    });

	$.ajax({
		url: '/api/v1/histories/activeHistories?userId='+user_id,
		type: 'get',
		dataType: 'json',
		success: function(data){
			$.ajax({
				url: '/api/v1/copies/'+'all',
				type: 'get',
				dataType: 'json',
				success: function(){

				},
				error: function(){
					
				}
			});
		},
		error: function(err){
			alert('Acitive histories fail');
		}
	});

});