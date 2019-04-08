@extends('admin.master')
@section('content')

<script type="text/javascript" src="js/Author.js"></script>
    <!-- Main content -->

    <div class="breadcrumbs ace-save-state" id="breadcrumbs">
        <ul class="breadcrumb">
            <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="">Home</a>
            </li>


            <li class="active">Author</li>

        </ul><!-- /.breadcrumb -->

    </div>


    <div class="box">
        <div class="box-header">
            <h3 class="box-title"><b>List Author</b></h3>
            <button class="btn btn-sm btn-success" data-toggle="modal" id="addAuthor" style="float: right;">
                <i class=" "></i>
                Add

            </button>
        </div>

        <!-- /.box-header -->
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">

                <thead>
                <tr>
                    <th class="text-center">ID</th>
                    <th class="text-center">Name</th>

                    <th class="text-center">Edit</th>
                    <th class="text-center">Delete</th>
                </tr>
                </thead>
                <tbody id="body_list_author">

                
                </tbody>

            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->

    <!-- /.content -->


    
<div class="modal fade" id="myModal-author" role="dialog">
    <div class="modal-dialog">

        <form method="get" id="form-role">
            {{csrf_field()}}
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"> Add Author</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-12">
                            <!-- PAGE CONTENT BEGINS -->
                            <div class="col-sm-9" >
                                <div class="form-group" >
                                    <label class="col-sm-4 control-label no-padding-right" for="form-field-1" style="margin-top: 22px;">Name:</label>

                                    <div class="col-sm-7">
                                        <input type="text" placeholder="Enter input data ..." class="form-control"  name="type-role" id="type-role" style="width: 350px; margin-top: 15px;"/>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>

                </div>  
                <br/>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button class="btn btn-info" type="submit" id="add-role">
                        <i class="ace-icon fa fa-check bigger-110"></i>
                        Add
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="modal fade" id="editModal-author" role="dialog">
    <div class="modal-dialog">

        <form action="" method="get">
                    
            <input type="hidden" name="_method" value="patch">
            {{csrf_field()}}
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"> Edit Author</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-12">
                           
                            <br>

                            <div class="col-sm-9">
                                <div class="form-group">
                                    <label class="col-sm-4 control-label no-padding-right" for="form-field-1" style="margin-top:  12px;">Name: </label>

                                    <div class="col-sm-8">
                                        <input type="text" placeholder="Enter input data ..." class="form-control" name="role-type" id="role-type" style="width: 350px; margin-top: 5px;" />
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>

                </div>  
                <br/>
                <div class="modal-footer">
                    <input type="hidden" id="role-id" name="role-id" value="" />
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button class="btn btn-info" type="submit" id="edit-role">
                        <i class="ace-icon fa fa-check bigger-110"></i>
                        Edit
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="modal fade" id="deleteModal-author" role="dialog">
            <div class="modal-dialog">
                
                <div class="modal-content">
                    <form method="get" class="form-delete">
                        <input type="hidden" name="_method" value="delete">
                        {{csrf_field()}}
                    
                <!-- Modal content-->
                
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Confirm</h4>
                        </div>
                        <div class="modal-body">
                            
                            <span id="form_output"></span>
                            <div class="row">
                                <div class="col-xs-12">
                                    <!-- PAGE CONTENT BEGINS -->
                                    <h4>You may want to delete ?</h4>

                                </div>
                            </div>

                        </div>  
                        
                        <div class="modal-footer">
                            <input type="hidden" id="role-delete" value="" />
                            <button class="btn btn-white btn-round pull-left" data-dismiss="modal">
                                <i class="ace-icon fa fa-times red2"></i>
                                No
                            </button>
                            <button class="btn btn-white btn-warning btn-bold" id="_delete-role">
                                <i class="ace-icon fa fa-trash-o bigger-120 orange"></i>
                                Yes
                            </button>
                            
                        </div>
                    </form>
                        
                    
                </div>
            </div>
</div>

<!-- <script>
    jQuery(function($) {
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
                                            +"<a href='#' class='text-blue' data-toggle='modal' id_edit_author="+data[i].id+" name="+data[i].name+" data-type='update-author' >"
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
    });
</script> -->


@endsection





























