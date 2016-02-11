@extends('admin')
@section('content')

    <div class="row">
        <div class="col-lg-2">
            <h3 class="page-header">Jobs</h3>
        </div>
        <div class="col-lg-10">
            <a href="{{url('estimates')}}" type="button" class="page-header btn btn-primary">Estimates</a>
            <a href="{{url('estimates/create')}}" type="button" class="page-header btn btn-primary">New Estimate</a>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-lg-12">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#all" aria-controls="all" role="tab" data-toggle="tab">All Jobs</a></li>
                <li role="presentation"><a href="#open" aria-controls="open" role="tab" data-toggle="tab">Open Jobs</a></li>
                <li role="presentation"><a href="#closed" aria-controls="closed" role="tab" data-toggle="tab">Closed Jobs</a></li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active" id="all">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            All Job Data
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-function">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Customer</th>
                                        <th>Vehicle</th>
                                        <th>Promised Date</th>
                                        <th>S.Advisor</th>
                                        <th>Status</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i = 1; ?>
                                    @foreach($jobs as $job)
                                        <tr class="odd gradeX">
                                            <td>
                                                <?php echo $i; ?>
                                            </td>
                                            <td>{{$job->cname}}</td>
                                            <td>{{$job->reg_no}}</td>
                                            <td>{{$job->promised_date}}</td>
                                            <td>{{$job->sname}}</td>
                                            <td>{{$job->status}}</td>
                                            <td class="text-center actions"><a href="{{url('jobs/'.$job->job_id)}}" title="view"><i class="fa fa-newspaper-o"></i></a><a href="{{url('items/')}}"><i class="fa fa-pencil-square-o"></i></a><a href="#"><i class="fa fa-trash-o fa-fw"></i></a></td>
                                        </tr>
                                        <?php $i++; ?>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <div role="tabpanel" class="tab-pane fade" id="open">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Open Jobs Data
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-function2">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Customer</th>
                                        <th>Vehicle</th>
                                        <th>Promised Date</th>
                                        <th>S.Advisor</th>
                                        <th>Status</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i = 1; ?>
                                    @foreach($jobs as $job)
                                        @if($job->status == "open")
                                        <tr class="odd gradeX">
                                            <td>
                                                <?php echo $i; ?>
                                            </td>
                                            <td>{{$job->cname}}</td>
                                            <td>{{$job->reg_no}}</td>
                                            <td>{{$job->promised_date}}</td>
                                            <td>{{$job->sname}}</td>
                                            <td>{{$job->status}}</td>
                                            <td class="text-center actions"><a href="{{url('jobs/'.$job->id)}}" title="view"><i class="fa fa-newspaper-o"></i></a><a href="{{url('items/')}}"><i class="fa fa-pencil-square-o"></i></a><a href="#"><i class="fa fa-trash-o fa-fw"></i></a></td>
                                        </tr>
                                        @endif
                                        <?php $i++; ?>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <div role="tabpanel" class="tab-pane fade" id="closed">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Open Jobs Data
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-function3">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Customer</th>
                                        <th>Vehicle</th>
                                        <th>Promised Date</th>
                                        <th>S.Advisor</th>
                                        <th>Status</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i = 1; ?>
                                    @foreach($jobs as $job)
                                        @if($job->status == "closed")
                                            <tr class="odd gradeX">
                                                <td>
                                                    <?php echo $i; ?>
                                                </td>
                                                <td>{{$job->cname}}</td>
                                                <td>{{$job->reg_no}}</td>
                                                <td>{{$job->promised_date}}</td>
                                                <td>{{$job->sname}}</td>
                                                <td>{{$job->status}}</td>
                                                <td class="text-center actions"><a href="{{url('jobs/'.$job->id)}}" title="view"><i class="fa fa-newspaper-o"></i></a><a href="{{url('items/')}}"><i class="fa fa-pencil-square-o"></i></a><a href="#"><i class="fa fa-trash-o fa-fw"></i></a></td>
                                            </tr>
                                        @endif
                                        <?php $i++ ?>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
            </div>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->










@endsection