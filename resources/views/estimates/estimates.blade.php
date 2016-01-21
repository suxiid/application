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
                                    <th>Estimate ID</th>
                                    <th>Customer</th>
                                    <th>Reg. No</th>
                                    <th>Make</th>
                                    <th>Department</th>
                                    <th>Net Amount</th>    
                                    <th>Date</th>
                                    <th>Job Status</th>
                                    <th>Created By</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($estimates as $estimate)
                                <tr class="odd gradeX">
                                    <td>{{$estimate->id}}</td>
                                    <td>{{$estimate->customer}}</td>
                                    <td>{{$estimate->reg_no}}</td>
                                    <td>{{$estimate->location}}</td>
                                    <td class="center">{{$estimate->unit_of_sale}}</td>
                                    <td class="center">{{$estimate->quantity}}</td>
                                    <td class="center">{{$estimate->sale_price}}</td>
                                    <td class="center">{{$estimate->service_only_cost}}</td>
                                    <td class="center">{{$estimate->pre_order_level}}</td>
                                    <td><a href="{{url('items/'.$estimate->id.'/edit')}}"><i class="fa fa-pencil fa-fw"></i></a>&nbsp;<a href="#"><i class="fa fa-trash-o fa-fw"></i></a></td>
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