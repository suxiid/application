@extends('admin')
@section('content')
        <div class="row">
            <div class="col-lg-2">
                <h3 class="page-header">Edit Item</h3>
            </div>
            <div class="col-lg-10">
            <a href="{{url('items')}}" type="button" class="page-header btn btn-primary">All Items</a>
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
                    
                        {!! Form::model($item, ['action' => ['ItemsController@update', $item->id], 'role' => 'form', 'method' => 'PATCH', 'class'=>'form-horizontal']) !!}
                             
                        <div class="form-group">
                            {!! Form::label('item-name', 'Item Name', ['class' => 'col-sm-2 control-label']) !!}
                            <div class="col-sm-10">
                            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Item Name']) !!} 
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('item-type', 'Type', ['class' => 'col-sm-2 control-label']) !!}
                            <div class="col-sm-10">
                            {!! Form::select('type', ['stock' => 'Stock Item', 'nonstock' => 'Non-Stock Item', 'service' => 'Service Item'], null, ['class' => 'form-control']); !!} 
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('item-cat', 'Category', ['class' => 'col-sm-2 control-label']) !!}
                            <div class="col-sm-10">
                            {!! Form::select('category_id', $catagories ,null , array('class' => 'form-control')) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('location', 'Location', ['class' => 'col-sm-2 control-label']) !!}
                            <div class="col-sm-10">
                            {!! Form::text('location', null, ['class' => 'form-control', 'placeholder' => 'Location']) !!} 
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('item-unit', 'Unit of Sale', ['class' => 'col-sm-2 control-label']) !!}
                            <div class="col-sm-10">
                            {!! Form::select('unit_of_sale', ['kg' => 'kg', 'units' => 'Units'], null, ['class' => 'form-control']); !!} 
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('quantity', 'Quantity', ['class' => 'col-sm-2 control-label']) !!}
                            <div class="col-sm-10">
                            {!! Form::text('quantity', null, ['class' => 'form-control', 'placeholder' => 'Quantity']) !!} 
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('sale-price', 'Sale Price', ['class' => 'col-sm-2 control-label']) !!}
                            <div class="col-sm-10">
                            {!! Form::text('sale_price', null, ['class' => 'form-control', 'placeholder' => 'Sale Price']) !!} 
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('po-level', 'pre-order Level', ['class' => 'col-sm-2 control-label']) !!}
                            <div class="col-sm-10">
                            {!! Form::text('pre_order_level', null, ['class' => 'form-control', 'placeholder' => 'pre-order Level']) !!} 
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('so-cost', 'Service Only Cost', ['class' => 'col-sm-2 control-label']) !!}
                            <div class="col-sm-10">
                            {!! Form::text('service_only_cost', null, ['class' => 'form-control', 'placeholder' => 'Service Only Cost']) !!} 
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-3">
                            {!! Form::submit('Save Item', ['class' => 'btn btn-primary']) !!} 
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