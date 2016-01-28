@extends('admin')
@section('content')

    <div class="row">
        <div class="col-lg-2">
            <h3 class="page-header">Items</h3>
        </div>
        <div class="col-lg-10">
        <a href="{{url('estimates/create')}}" type="button" class="page-header btn btn-primary">New Estimate</a>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    All Estimate Data
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="dataTable_wrapper">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Customer</th>
                                    <th>Vehicle</th>
                                    <th>Department</th>
                                    <th>Net Amount</th>    
                                    <th>Date</th>
                                    <th>Created By</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($estimates as $estimate)
                                <tr class="odd gradeX">
                                    <td>{{$estimate->id}}</td>
                                    <td>
                                        @foreach($customers as $customer)
                                            @if($estimate->customer_id == $customer->id)
                                                {{$customer->name}}
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach($vehicles as $vehicle)
                                            @if($estimate->vehicle_id == $vehicle->id)
                                                {{$vehicle->reg_no}}
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach($departments as $department)
                                            @if($estimate->department == $department->id)
                                                {{$department->name}}
                                            @endif
                                        @endforeach
                                    </td>
                                    <td class="center">{{$estimate->net_amount}}</td>
                                    <td class="center">{{$estimate->created_at}}</td>
                                    <td class="center">
                                        @foreach($users as $user)
                                            @if($estimate->created_by == $user->id)
                                                {{$user->name}}
                                            @endif
                                        @endforeach
                                    </td>
                                    <td class="text-center actions"><a href="{{url('estimates/'.$estimate->id)}}" title="view"><i class="fa fa-newspaper-o"></i></a><a title="Edit" href="{{url('items/'.$estimate->id.'/edit')}}"><i class="fa fa-pencil-square-o"></i></a><a title="Delete" href="#"><i class="fa fa-trash-o fa-fw"></i></a></td>
                                </tr> 
                                @endforeach
                            </tbody>
                        </table>
                    </div>                   
                    
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->


@endsection