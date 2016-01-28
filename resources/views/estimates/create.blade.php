@extends('admin')
@section('content')
    <div class="row">
        <div class="col-lg-3">
            <h3 class="page-header">Add New Estimate</h3>
        </div>
        <div class="col-lg-9">
        <a href="{{url('customers/create')}}" type="button" class="page-header btn btn-primary">Create Customer</a>
        <a href="" data-toggle="modal" data-target="#addVehicleModel" type="button" class="page-header btn btn-primary">Add Vehicle</a>
        <a href="{{url('estimates')}}" type="button" class="page-header btn btn-primary">All Estimates</a>
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
                    
                    @if($errors->any())
                    <div class="form-group">
                        <div class="col-sm-12 alert alert-danger">                            
                            <ul>
                                @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>                            
                        </div>
                    </div>
                    @endif
                    
                    {!! Form::open(array('url' => url('estimates'), 'class'=>'form-horizontal')) !!}
                    <div class="row">
                        <div class="col-lg-7">
                        <div class="form-group">
                            {!! Form::label('customer', 'Customer', ['class' => 'col-sm-2 control-label']) !!}
                            <div class="col-sm-10">
                            {!! Form::select('customer_id', ['' => 'Select a customer'] + $customer_list ,null , array('class' => 'form-control', 'id' => 'customer', 'required')) !!}
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
                             {!! Form::label('mileage_in', 'Mileage In', ['class' => 'col-sm-2 control-label']) !!}
                             <div class="col-sm-10">
                                 {!! Form::text('mileage_in', null, ['class' => 'form-control', 'placeholder' => 'Mileage In']) !!}
                             </div>
                        </div>
                            
                        <div class="form-group">
                            {!! Form::label('department', 'Department', ['class' => 'col-sm-2 control-label']) !!}
                            <div class="col-sm-10">
                            {!! Form::select('department', $departments, null, array('class' => 'form-control')) !!}
                            </div>
                        </div>
                        </div>

                        
                        <div class="col-lg-5">
                            <h4 class="text-center">Quick add vehicle</h4>
                        <div class="form-group">                            
                            {!! Form::label('reg_no', 'Registration No', ['class' => 'col-sm-4 control-label']) !!}
                            <div class="col-sm-8">
                            {!! Form::text('reg_no', null, ['class' => 'form-control', 'placeholder' => 'ex: CCA-XXXX']) !!}
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
                                            <th class="text-center">Actions</th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                {!! Form::select('item_id[]', ['' => 'Select an item'] + $items, null, array('class' => 'form-control', 'required')) !!}
                                            </td>
                                            <td>
                                                {!! Form::text('item_description[]', null, ['class' => 'form-control', 'placeholder' => 'Not Required | Optional']) !!}
                                            </td>
                                            <td>
                                                {!! Form::text('units[]', null, ['class' => 'form-control', 'placeholder' => 'Add Units', 'required']) !!}
                                            </td>
                                            <td>
                                                {!! Form::text('rate[]', null, ['class' => 'form-control', 'placeholder' => 'Add Rate', 'required']) !!}
                                            </td>
                                            <td>
                                                {!! Form::text('amount[]', null, ['class' => 'form-control', 'placeholder' => 'Add Hrs and Rate', 'id' => 'amount']) !!}
                                            </td>
                                            <td class="text-center actions"><a id="delete-row" onclick="delTableRow($('#dynamic-tbl'));" href="#"><i class="fa fa-times"></i></a></td>
                                        </tr>
                                        
                                    </tbody>
                                </table>
                                <button class="btn btn-primary" type="button" onclick="addTableRow($('#dynamic-tbl'));">add row</button>
                                {!! Form::submit('Save Estimate', ['class' => 'btn btn-primary']) !!} 
                                {!! Form::reset('Reset Form', ['class' => 'btn btn-default']) !!} 
                            </div>
                        </div>
                    
                    {!! Form::close() !!}
                    
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
                    <div class="form-group">
                        {!! Form::label('customer', 'Customer', ['class' => 'col-sm-4 control-label']) !!}
                        <div class="col-sm-8">
                            {!! Form::select('customer_id', ['' => 'Select a customer'] + $customer_list ,null , array('class' => 'form-control', 'id' => 'customer')) !!}
                        </div>
                    </div>
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