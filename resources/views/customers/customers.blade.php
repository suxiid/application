@extends('admin')
@section('content')

    <div class="row">
        <div class="col-lg-2">
            <h3 class="page-header">Customers</h3>
        </div>
        <div class="col-lg-10">
            <a href="{{url('customers/create')}}" type="button" class="page-header btn btn-primary">New Customer</a>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    All Customer Data
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="dataTable_wrapper">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-function">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Contact</th>
                                <th>Vehicles</th>
                                <th class="text-center">Actions</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($customers as $customer)
                                <tr class="odd gradeX">
                                    <td>{{$customer->name}}</td>
                                    <td>{{$customer->address1}},&nbsp;{{$customer->address2}},&nbsp;{{$customer->city}}</td>
                                    <td>Tel. {{$customer->telephone}} Mobile. {{$customer->mobile}}</td>
                                    <td>
                                        @foreach($customer->vehicles as $vehicle)
                                            {{$vehicle->reg_no}},&nbsp;
                                        @endforeach
                                    </td>
                                    <td class="text-center actions"><a href="{{url('customers/'.$customer->id)}}" title="View"><i class="fa fa-male"></i></a><a href="{{url('customers/'.$customer->id.'/edit')}}" title="Edit"><i class="fa fa-pencil-square-o"></i></a></td>
                                </tr>
                            @endforeach
                            </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection