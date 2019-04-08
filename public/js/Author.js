
jQuery(function($) {


    // $('#list_author').click(function(){
        // alert('List Author');

        $.ajax({
                    
                url: '/api/v1/authors/'+'all',
                type: 'get',
                dataType: 'json',
                success: function(data) {
                    var output = "";
                    for(var i = 0; i < data.length; i++){

                        output +=   "<tr>"
                                        +"<td class='text-center'>"+data[i].id+"</td>"
                                        +"<td class='text-center'>"+data[i].name+"</td>"
                                        
                                        +"<td class='text-center'>"
                                            +"<a href='' class='text-blue' data-toggle='modal' id_edit_author="+data[i].id+" data-type='update-author'>"
                                                +"<i class='ace-icon fa fa-pencil bigger-130'></i>"
                                            +"</a>"
                                        +"</td>"
                                        +"<td class='text-center'>"
                                            +"<a class='text-red' href='#' data-toggle='modal' id_delete_author="+data[i].id+" data-type='delete-author'>"
                                                +"<i class='ace-icon fa fa-trash-o bigger-130'></i>"
                                            +"</a>"
                                        +"</td>"
                                    +"</tr>";

                    }
                    $('#body_list_author').html(output);
                    // alert('success');
                },
                error: function(err){
                    alert(1);
                }
        });

    // });

    

	$('#addAuthor').click(function(){

        $('#myModal-author').modal('show');
        $('#form-author')[0].reset();
        
    });

    

	$('#add-author').on('click', function(){

		$.ajaxSetup({
	        headers: {
	            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	        }

        });
		
		var data = $('#type-author').val();
        // alert(data);
		
		$.ajax({
            type: 'post',
            url: "/api/v1/authors",
            dataType: "json",
            data: {
                0: {
                    type: data
                }
            },
            success: function () {
                alert("success!");
            },
            error: function(){
                alert("error! Please, try again.");
            }
        });
	});

    $('a[data-type=update-author]').click(function(){
        alert(1);
    });

    $('a[data-type=update-author]').on('click', function(){


    	var id = $(this).attr("id");
    	var name = $(this).attr("name");
    	// alert(type);

    	$('#author-name').val(name);
    	$('#author-id').val(id);
    	$('#editModal-author').modal('show');
    });

    $('#edit-author').on('click', function () {
        var id=$('#author-id').val();
        var data = $('#author-type').val();
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }

        });

        $.ajax({
                
                url: '/api/v1/authors/'+id,
                type: 'patch',
                data: {type: data, _method: "patch"},
            success: function () {
                alert("success!");
            },
            error: function(){
                alert("error! Please, try again.");
            }
        });
    });

    $('a[data-type=delete-author]').on('click', function(){

    	var id = $(this).attr("id");

        $('#author-delete').val(id);
		$('#deleteModal-author').modal('show');
		


    });
    $('#_delete-author').on('click', function(){

    	var id = $('#author-delete').val();
        // alert(id);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }

        });

        $.ajax({
                
                url: '/api/v1/authors/'+id,
                type: 'delete',
                data: {id: id, _method: "delete"},
            success: function () {
                alert("success!");
            },
            error: function(){
                alert("error! Please, try again.");
            }
        });
    	
		
	});

    $('#search_author').on('click', function(){

        $('#myModal-searchauthor').modal('show');
    });

    

        searchauthorFunction();
        function searchauthorFunction(query = ''){

            $.ajax({
                url: "{{route('listauthor/search')}}",
                method: "get",
                data: {query: query},
                dataType: 'json',
                success: function(data){
                    $('#bodyauthor').html(data.table_data)
                }
            });
        }

        $('#form_search_author #search').on('click', function(){
            var query = $('#data_search').val();
            alert(query);
            $.ajax({
                url: "{{route('listauthor/search')}}",
                method: "get",
                data: {query: query},
                dataType: 'json',
                success: function(data){
                    $('#bodyauthor').html(data.table_data);
                    console.log(data);
                    console.log(1);
                },
                error:function(err){
                    console.log(err);
                }
            });
        });

    $('#search-author #search').on('click', function(){

        var id = $('#data-search').val();
        // alert(id);

        // $.ajaxSetup({
        //     headers: {
        //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //     }

        // });

        $.ajax({
                
                url: '/api/v1/authors/'+id,
                type: 'get',
                // data: {id:id},
                dataType: 'json',
                success: function(data) {
                    
                    // var data = JSON.stringify(data);
                    // alert(data[0].type);
                    console.log(data);
                    var output = "";
                    for(var i = 0; i < data.length; i++){

                        output +=   "<tr>"
                                        +"<td>"+data[i].id+"</td>"
                                        +"<td>"+data[i].type+"</td>"
                                        +"<td class='center'>"
                                            +"<a href='#' class='green edit-author' id='<?php echo $author->id; ?>' data-type='{{$author->type}}' data-author='update-author' data-toggle='modal'>"
                                                +"<i class='ace-icon fa fa-pencil bigger-130'></i>"
                                            +"</a>"
                                        +"</td>"
                                        +"<td class='center'>"
                                            +"<a class='red' href='#' id='<?php echo $author->id; ?>' data-author='delete-author' data-toggle='modal'>"
                                                +"<i class='ace-icon fa fa-trash-o bigger-130'></i>"
                                            +"</a>"
                                        +"</td>"
                                    +"</tr>"

                        // $('#cellIDauthor').text(data[i].id);
                        // $('#cellTypeauthor').text(data[i].type);
                        // $('#cellEditauthor').html("<a href='#' class='green edit-author' id='<?php echo $author->id; ?>' data-type='{{$author->type}}' data-author='update-author' data-toggle='modal'>"
                        //                         + "<i class='ace-icon fa fa-pencil bigger-130'></i>"
                        //                     +"</a>");
                        // $('#cellDeleteauthor').html("<a class='red' href='#' id='<?php echo $author->id; ?>' data-author='delete-author' data-toggle='modal'>"
                        //                         +"<i class='ace-icon fa fa-trash-o bigger-130'></i>"
                        //                     +"</a>");
                    }
                    $('#bodyauthor').html(output);
                },
                error: function(err){
                    alert(1);
                }
        });
        
        
    });

    $('#sidebarauthor').on('click', function(){
        alert(1);
        
        
        
    });

});