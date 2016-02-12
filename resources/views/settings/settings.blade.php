@extends('admin')
@section('content')
<div class="row">

    <div class="col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-file-text-o fa-fw"></i> Departments
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="dataTable_wrapper">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-function">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th class="text-center">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($departments as $department)
                            <tr class="odd gradeX">
                                <td>{{$department->id}}</td>
                                <td>{{$department->name}}</td>
                                <td class="text-center actions">
                                    <a href=""><i class="fa fa-pencil-square-o"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel .chat-panel -->
    </div>

    <div class="col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-file-text-o fa-fw"></i> Purchase Orders Notifications Panel
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">



            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel .chat-panel -->
    </div>

</div>
@endsection