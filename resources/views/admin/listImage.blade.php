@extends('admin.master')
@section('content')

    <!-- Main content -->
        
        <div class="breadcrumbs ace-save-state" id="breadcrumbs">
            <ul class="breadcrumb">
                <li>
                    <i class="ace-icon fa fa-home home-icon"></i>
                    <a href="">Home</a>
                </li>

                
                <li class="active">Image</li>

            </ul><!-- /.breadcrumb -->

        </div>

        
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><b>List Image</b></h3>
                <button class="btn btn-sm btn-success" data-toggle="modal" id="addImage" style="float: right;">
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
                    <th class="text-center">URL</th>
                    <th class="text-center">Edit</th>
                    <th class="text-center">Delete</th>
                  </tr>
                </thead>
                <tbody>
            
                  <tr>
                    <td class="text-center">Trident</td>
                    <td class="text-center">Internet
                      Explorer 4.0
                    </td>
                    <td class="text-center">1</td>
                    
                    <td class="text-center">
                      <a href="#" class="text-blue edit-role" data-toggle="modal">
                        <i class="ace-icon fa fa-pencil bigger-130"></i>
                      </a>
                    </td>
                    <td class="text-center">
                      <a class="text-red" href="#" data-toggle="modal">
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



