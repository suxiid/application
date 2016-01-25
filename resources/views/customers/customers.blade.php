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
                                        @foreach($vehicles as $vehicle)
                                            @if($vehicle->customer_id == $customer->id)
                                                {{$vehicle->reg_no}},
                                            @endif
                                        @endforeach
                                    </td>
                                    <td class="text-center"><a href="{{url('customers/'.$customer->id)}}" title="View"><i class="fa fa-male"></i></a>&nbsp;&nbsp;<a href="" data-toggle="modal" data-target="#addVehicleModel" title="Add Vehicle">+<i class="fa fa-truck"></i></a>&nbsp;&nbsp;<a href="{{url('customers/'.$customer->id.'/edit')}}" title="Edit"><i class="fa fa-pencil fa-fw"></i></a>&nbsp;&nbsp;<a href="#" title="Delete"><i class="fa fa-trash-o fa-fw"></i></a></td>
                                </tr>
                            @endforeach
                            </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    <div class="modal fade" id="addVehicleModel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                {!! Form::open(array('url' => url('vehicles'), 'class'=>'form-horizontal')) !!}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myModalLabel">Add Vehicle</h4>
                </div>
                <div class="modal-body">
                    {!! Form::hidden('customer_id', $customer->id, ['id' => 'invisible_id']) !!}
                    <div class="form-group">
                        {!! Form::label('reg_no', 'Registration No', ['class' => 'col-sm-4 control-label']) !!}
                        <div class="col-sm-8">
                            {!! Form::text('reg_no', null, ['class' => 'form-control', 'required', 'placeholder' => 'ex: CAA-XXXX']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('make', 'Make', ['class' => 'col-sm-4 control-label']) !!}
                        <div class="col-sm-8">
                            {!! Form::text('make', null, ['class' => 'form-control', 'placeholder' => 'ex: TOYOTA PRIUS']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('model', 'Model', ['class' => 'col-sm-4 control-label']) !!}
                        <div class="col-sm-8">
                            {!! Form::text('model', null, ['class' => 'form-control', 'placeholder' => 'ex: 2015']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('chasis_no', 'Chasis No', ['class' => 'col-sm-4 control-label']) !!}
                        <div class="col-sm-8">
                            {!! Form::text('chasis_no', null, ['class' => 'form-control', 'placeholder' => 'Chasis No']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('next_service', 'Next Service', ['class' => 'col-sm-4 control-label']) !!}
                        <div class="col-sm-8">
                            {!! Form::text('next_service', null, ['class' => 'form-control', 'placeholder' => 'ex: 20000']) !!}
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    {!! Form::submit('Save Vehicle', ['class' => 'btn btn-primary']) !!}

                </div>
                {!! Form::close() !!}
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->



@endsection