@extends('admin.master')
@section('content')

    <!-- Main content -->
        
        <div class="breadcrumbs ace-save-state" id="breadcrumbs">
            <ul class="breadcrumb">
                <li>
                    <i class="ace-icon fa fa-home home-icon"></i>
                    <a href="">Home</a>
                </li>

                <li>
                    <a href="">Manage User</a>
                </li>
                <li class="active">List Role</li>

            </ul><!-- /.breadcrumb -->

        </div>

        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><b>List Role Data Table</b></h3>
                <button class="btn btn-sm btn-success" data-toggle="modal" id="addRole" style="float: right;">
                    <i class=" "></i>
                    Them moi
                      
                </button>
            </div>
            
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Role Type</th>
                    
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                </thead>
                <tbody>
            
                  <tr>
                    <td>Trident</td>
                    <td>Internet
                      Explorer 4.0
                    </td>
                    
                    <td class="center">
                      <a href="#" class="green edit-role" data-toggle="modal">
                        <i class="ace-icon fa fa-pencil bigger-130"></i>
                      </a>
                    </td>
                    <td class="center">
                      <a class="red" href="#" data-toggle="modal">
                        <i class="ace-icon fa fa-trash-o bigger-130"></i>
                      </a>
                    </td>
                  </tr>
                    
                </tbody>
                
              </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->

        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><b>List Role</b></h3>
                <button class="btn btn-sm btn-success" data-toggle="modal" id="addRole" style="float: right;">
                    <i class=" "></i>
                    Them moi
                      
                </button>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Role Type</th>
                    
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                </thead>
                <tbody>
            
                  <tr>
                    <td>Trident</td>
                    <td>Internet
                      Explorer 4.0
                    </td>
                    
                    <td class="center">
                      <a href="#" class="green edit-role" data-toggle="modal">
                        <i class="ace-icon fa fa-pencil bigger-130"></i>
                      </a>
                    </td>
                    <td class="center">
                      <a class="red" href="#" data-toggle="modal">
                        <i class="ace-icon fa fa-trash-o bigger-130"></i>
                      </a>
                    </td>
                  </tr>
                    
                </tbody>
                
              </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    
    <!-- /.content -->
@endsection



