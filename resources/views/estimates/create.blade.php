@extends('admin')
@section('content')
    <div class="row">
        <div class="col-lg-2">
            <h3 class="page-header">Add New Estimate</h3>
        </div>
        <div class="col-lg-10">
        <a href="{{url('items')}}" type="button" class="page-header btn btn-primary">Create Customer</a>
        <a href="{{url('items')}}" type="button" class="page-header btn btn-primary">Add Vehicle</a>
        <a href="{{url('items')}}" type="button" class="page-header btn btn-primary">All Estimates</a>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Estimate Data Form
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    
                    {!! Form::open(array('url' => url('items'), 'class'=>'form-horizontal')) !!}
                    <div class="row">
                        <div class="col-lg-6">
                        <div class="form-group">
                            {!! Form::label('customer', 'Customer', ['class' => 'col-sm-2 control-label']) !!}
                            <div class="col-sm-10">
                            {!! Form::select('customer_id', $customer_list ,null , array('class' => 'form-control', 'id' => 'customer')) !!}
                            </div>
                        </div>
                    
                        <div class="form-group">
                            {!! Form::label('vehicle', 'Vehicle', ['class' => 'col-sm-2 control-label']) !!}
                            <div class="col-sm-10">
                                <select class="form-control" name="vehicle_id" id="vehicle">
                                    <option value=""></option>
                                </select>
                            </div>
                        </div>
                    
                        <div class="form-group">
                             {!! Form::label('mileage', 'Mileage In', ['class' => 'col-sm-2 control-label']) !!}
                             <div class="col-sm-10">
                                 {!! Form::text('mileage', null, ['class' => 'form-control', 'placeholder' => 'Mileage In']) !!}
                             </div>
                        </div>
                            
                        <div class="form-group">
                            {!! Form::label('department', 'Department', ['class' => 'col-sm-2 control-label']) !!}
                            <div class="col-sm-10">
                            {!! Form::select('department_id', $departments, null, array('class' => 'form-control')) !!}
                            </div>
                        </div>
                        </div>
                        
                        <div class="col-lg-6">
                            <h4 class="text-center">Quick add vehicle</h4>
                        <div class="form-group">                            
                            {!! Form::label('reg_no', 'Registration No', ['class' => 'col-sm-2 control-label']) !!}
                            <div class="col-sm-10">
                            {!! Form::text('reg_no', null, ['class' => 'form-control', 'placeholder' => 'Vehicle Registration Number']) !!}
                            </div>
                        </div>
                    
                        <div class="form-group">
                            {!! Form::label('make', 'Make', ['class' => 'col-sm-2 control-label']) !!}
                            <div class="col-sm-10">
                            {!! Form::text('make', null, ['class' => 'form-control', 'placeholder' => 'ex: TOYOTA PRIUS']) !!}
                            </div>
                        </div>
                    
                        <div class="form-group">
                            {!! Form::label('model', 'Model', ['class' => 'col-sm-2 control-label']) !!}
                            <div class="col-sm-10">
                            {!! Form::text('model', null, ['class' => 'form-control', 'placeholder' => 'ex: 2016']) !!}
                            </div>
                        </div>
                        </div>
                        </div>                    
                    
                        <div class="row add-estimate-item-section">
                            <div class="col-lg-12">
                                <table class="table table-bordered" id="dynamic-tbl">
                                    <thead>
                                            <th>Item</th>
                                            <th>Description</th>
                                            <th>Units</th>
                                            <th>Rate</th>
                                            <th>Amount</th>
                                            <th>Approved Amt</th>
                                            <th class="text-center">Actions</th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                {!! Form::select('item_id', $items, null, array('class' => 'form-control')) !!}
                                            </td>
                                            <td>
                                                {!! Form::text('item_description', null, ['class' => 'form-control', 'placeholder' => 'Not Required | Optional']) !!}
                                            </td>
                                            <td>
                                                {!! Form::text('units[]', null, ['class' => 'form-control', 'placeholder' => 'Add Units']) !!}
                                            </td>
                                            <td>
                                                {!! Form::text('rate[]', null, ['class' => 'form-control', 'placeholder' => 'Add Rate']) !!}
                                            </td>
                                            <td>
                                                {!! Form::text('amount', null, ['class' => 'form-control', 'placeholder' => 'Add Hrs and Rate', 'id' => 'amount']) !!}
                                            </td>
                                            <td>
                                                {!! Form::text('approved_rate', null, ['class' => 'form-control', 'placeholder' => 'Not Required']) !!}
                                            </td>
                                            <td class="text-center"><a id="delete-row" onclick="delTableRow($('#dynamic-tbl'));" href="#"><i class="fa fa-trash-o fa-fw"></i></a></td>
                                        </tr>
                                        
                                    </tbody>
                                </table>
                                <button class="btn btn-primary" type="button" onclick="addTableRow($('#dynamic-tbl'));">add row</button>
                            </div>
                        </div>
                    
                    {!! Form::close() !!}
                    
                </div>
            </div>
        </div>
    </div>


@endsection