@extends('admin')
@section('content')
    <div class="row">
        <div class="col-lg-2">
            <h3 class="page-header">Add New Items</h3>
        </div>
        <div class="col-lg-10">
        <a href="{{url('/items')}}" type="button" class="page-header btn btn-primary">All Items</a>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    
    <div class="row">
        <div class="col-lg-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Item Data Form
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    
                    @if($errors->any())
                    <div class="form-group">
                        <div class="col-sm-2"></div>
                        <div class="col-sm-10 alert alert-danger">                            
                            <ul>
                                @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>                            
                        </div>
                    </div>
                    @endif
                    
                    {!! Form::open(array('url' => url('/new-item'), 'class'=>'form-horizontal')) !!}
                    
                    <div class="form-group">
                        {!! Form::label('item-name', 'Item Name', ['class' => 'col-sm-2 control-label']) !!}
                        <div class="col-sm-10">
                        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Item Name']) !!} 
                        </div>
                    </div>
                    
                    <div class="form-group">
                        {!! Form::label('item-type', 'Type', ['class' => 'col-sm-2 control-label']) !!}
                        <div class="col-sm-10">
                        {!! Form::select('item-type', ['' => 'Select an option', 'stock' => 'Stock Item', 'nonstock' => 'Non-Stock Item', 'service' => 'Service Item'], null, ['class' => 'form-control']); !!} 
                        </div>
                    </div>
                    
                    <div class="form-group">
                        {!! Form::label('item-cat', 'Category', ['class' => 'col-sm-2 control-label']) !!}
                        <div class="col-sm-10">
                        <select class="form-control" name="item-category">
                            <option value="">Select an option</option>
                            @foreach($catagories as $catagory)
                            <option value="{{$catagory->id}}">{{$catagory->cat_name}}</option>
                            @endforeach
                        </select>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        {!! Form::label('location', 'Location', ['class' => 'col-sm-2 control-label']) !!}
                        <div class="col-sm-10">
                        {!! Form::text('item-location', null, ['class' => 'form-control', 'placeholder' => 'Location']) !!} 
                        </div>
                    </div>
                    
                    <div class="form-group">
                        {!! Form::label('item-unit', 'Unit of Sale', ['class' => 'col-sm-2 control-label']) !!}
                        <div class="col-sm-10">
                        {!! Form::select('item-unit', ['' => 'Select an option', 'kg' => 'kg', 'units' => 'Units'], null, ['class' => 'form-control']); !!} 
                        </div>
                    </div>
                    
                    <div class="form-group">
                        {!! Form::label('quantity', 'Quantity', ['class' => 'col-sm-2 control-label']) !!}
                        <div class="col-sm-10">
                        {!! Form::text('item-quantity', null, ['class' => 'form-control', 'placeholder' => 'Quantity']) !!} 
                        </div>
                    </div>
                    
                    <div class="form-group">
                        {!! Form::label('sale-price', 'Sale Price', ['class' => 'col-sm-2 control-label']) !!}
                        <div class="col-sm-10">
                        {!! Form::text('sale-price', null, ['class' => 'form-control', 'placeholder' => 'Sale Price']) !!} 
                        </div>
                    </div>
                    
                    <div class="form-group">
                        {!! Form::label('po-level', 'pre-order Level', ['class' => 'col-sm-2 control-label']) !!}
                        <div class="col-sm-10">
                        {!! Form::text('po-level', null, ['class' => 'form-control', 'placeholder' => 'pre-order Level']) !!} 
                        </div>
                    </div>
                    
                    <div class="form-group">
                        {!! Form::label('so-cost', 'Service Only Cost', ['class' => 'col-sm-2 control-label']) !!}
                        <div class="col-sm-10">
                        {!! Form::text('so-cost', null, ['class' => 'form-control', 'placeholder' => 'Service Only Cost']) !!} 
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-3">
                        {!! Form::submit('Save Item', ['class' => 'btn btn-primary']) !!} 
                        {!! Form::reset('Reset Form', ['class' => 'btn btn-default']) !!} 
                        </div>
                    </div>
                    
                    {!! Form::close() !!}
                    
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            
        </div>
    </div>


@endsection