@extends('admin.master')
@section('content')


    <!-- Main content -->

    <div class="breadcrumbs ace-save-state" id="breadcrumbs">
        <ul class="breadcrumb">
            <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="">Trang chủ</a>
            </li>


            <li class="active">Tác giả</li>

        </ul><!-- /.breadcrumb -->

    </div>


    <div class="box">
        <div class="box-header">
            <h3 class="box-title"><b>Danh sách tác giả</b></h3>
            <button class="btn btn-sm btn-success" data-toggle="modal" id="addAuthor" style="float: right;">
                <i class=" "></i>
                Thêm

            </button>
        </div>

        <!-- /.box-header -->
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">

                <thead>
                <tr>
                    <th class="text-center">ID</th>
                    <th class="text-center">Tên</th>

                    <th class="text-center">Sửa</th>
                    <th class="text-center">Xóa</th>
                </tr>
                </thead>
                <tbody id="body_list_author">
                    
                    @foreach($list as $author)

                        <tr>
                            <td class="text-center">{{$author->id}}</td>
                            <td class="text-center">{{$author->name}}</td>
                            <td class="text-center">
                                <a href="#" class="text-blue" id="<?php echo $author->id; ?>" name="{{$author->name}}" data-type="update-author" data-toggle="modal">
                                    <i class="ace-icon fa fa-pencil bigger-130"></i>
                                </a>
                            </td>
                            
                            <td class="text-center">
                                <a class="text-red" href="#" id="<?php echo $author->id; ?>" data-type="delete-author" data-toggle="modal">
                                    <i class="ace-icon fa fa-trash-o bigger-130"></i>
                                </a>

                            </td>
                        </tr>

                    @endforeach
                
                </tbody>

            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->

    <!-- /.content -->


    
<div class="modal fade" id="myModal-author" role="dialog">
    <div class="modal-dialog">

        <!-- <form id="form-author"> -->
            <!-- {{csrf_field()}} -->
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"> Thêm tác giả</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-12">
                            <!-- PAGE CONTENT BEGINS -->
                            <div class="col-sm-9" >
                                <div class="form-group" >
                                    <label class="col-sm-4 control-label no-padding-right" for="form-field-1" style="margin-top: 22px;">Tên:</label>

                                    <div class="col-sm-7">
                                        <input type="text" placeholder="Enter input data ..." class="form-control"  name="type-author" id="type-author" style="width: 350px; margin-top: 15px;"/>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>

                </div>  
                <br/>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Đóng</button>
                    <button class="btn btn-info" type="submit" id="add-author">
                        <i class="ace-icon fa fa-check bigger-110"></i>
                        Thêm
                    </button>
                </div>
            </div>
        <!-- </form> -->
    </div>
</div>

<div class="modal fade" id="editModal-author" role="dialog">
    <div class="modal-dialog">

        <!-- <form> -->
                    
            
            <!-- {{csrf_field()}} -->
            <!-- Modal content-->
            <div class="modal-content">
                <input type="hidden" name="_method" value="patch">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"> Sửa thông tin tác giả</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-12">
                           
                            <br>

                            <div class="col-sm-9">
                                <div class="form-group">
                                    <label class="col-sm-4 control-label no-padding-right" for="form-field-1" style="margin-top:  12px;">Tên: </label>

                                    <div class="col-sm-8">
                                        <input type="text" placeholder="Enter input data ..." class="form-control" name="author-type" id="author-type" style="width: 350px; margin-top: 5px;" />
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>

                </div>  
                <br/>
                <div class="modal-footer">
                    <input type="hidden" id="author-id" name="author-id" value="" />
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Đóng</button>
                    <button class="btn btn-info" type="submit" id="edit-author">
                        <i class="ace-icon fa fa-check bigger-110"></i>
                        Sửa
                    </button>
                </div>
            </div>
        <!-- </form> -->
    </div>
</div>

<div class="modal fade" id="deleteModal-author" role="dialog">
            <div class="modal-dialog">
                
                <div class="modal-content">
                    <!-- <form > -->
                        <input type="hidden" name="_method" value="delete">
                        <!-- {{csrf_field()}} -->
                    
                <!-- Modal content-->
                
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Xác nhận</h4>
                        </div>
                        <div class="modal-body">
                            
                            <span id="form_output"></span>
                            <div class="row">
                                <div class="col-xs-12">
                                    <!-- PAGE CONTENT BEGINS -->
                                    <h4>Bạn có chắc chắn muốn xóa không?</h4>

                                </div>
                            </div>

                        </div>  
                        
                        <div class="modal-footer">
                            <input type="hidden" id="author-delete" value="" />
                            <button class="btn btn-white btn-round pull-left" data-dismiss="modal">
                                <i class="ace-icon fa fa-times red2"></i>
                                No
                            </button>
                            <button class="btn btn-white btn-warning btn-bold" id="_delete-author">
                                <i class="ace-icon fa fa-trash-o bigger-120 orange"></i>
                                Yes
                            </button>
                            
                        </div>
                    <!-- </form> -->
                        
                    
                </div>
            </div>
</div>


@endsection






























