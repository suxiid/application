@extends('admin')
@section('content')

    <div class="row">
        <div class="col-lg-3">
            <h3 class="page-header">System Settings</h3>
        </div><!-- /.col-lg-3 -->
        <div class="col-lg-9">

        </div>
        <!-- /.col-lg-3 -->
    </div>
    <!-- /.row -->

<div class="row">

    <div class="col-lg-3">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-file-text-o fa-fw"></i> Departments
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <a href="{{url('departments')}}" class="btn btn-primary btn-block">View Departments</a>
                <a href="{{url('departments/create')}}" class="btn btn-primary btn-block">Add Departments</a>
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel .chat-panel -->
    </div>

    <div class="col-lg-3">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-file-text-o fa-fw"></i> Item Categories
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <a href="{{url('item_categories')}}" class="btn btn-primary btn-block">View Categories</a>
                <a href="{{url('item_categories/create')}}" class="btn btn-primary btn-block">Add Categories</a>
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel .chat-panel -->
    </div>

    <div class="col-lg-3">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-file-text-o fa-fw"></i> Stakeholders
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <a href="{{url('stakeholders')}}" class="btn btn-primary btn-block">View Stakeholders</a>
                <a href="{{url('stakeholders/create')}}" class="btn btn-primary btn-block">Add Stakeholders</a>
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel .chat-panel -->
    </div>

    <div class="col-lg-3">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-file-text-o fa-fw"></i> Configuration
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