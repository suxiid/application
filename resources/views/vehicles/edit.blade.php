@extends('admin')
@section('content')
    <div class="row">
        <div class="col-lg-2">
            <h3 class="page-header">Edit Vehicle</h3>
        </div>
        <div class="col-lg-10">

        </div>
        <!-- /.col-lg-12 -->
    </div>

    <!-- /.row -->
    <div class="row">
        <div class="col-lg-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Vehicle Data Form
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">

                    @if($errors->any())
                        <div class="form-group">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-9 alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif

                        {!! Form::open(array('url' => url('vehicles'), 'class'=>'form-horizontal')) !!}

                            <div class="form-group">
                                {!! Form::label('reg_no', 'Registration No', ['class' => 'col-sm-4 control-label']) !!}
                                <div class="col-sm-8">
                                    {!! Form::text('reg_no', null, ['class' => 'form-control', 'required', 'placeholder' => 'ex: CAA-XXXX']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('make', 'Make', ['class' => 'col-sm-4 control-label']) !!}
                                <div class="col-sm-8">
                                    {!! Form::text('make', null, ['class' => 'form-control', 'placeholder' => 'ex: TOYOTA']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('model', 'Model', ['class' => 'col-sm-4 control-label']) !!}
                                <div class="col-sm-8">
                                    {!! Form::text('model', null, ['class' => 'form-control', 'placeholder' => 'ex: CROWN']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('year', 'Year', ['class' => 'col-sm-4 control-label']) !!}
                                <div class="col-sm-8">
                                    {!! Form::text('year', null, ['class' => 'form-control', 'placeholder' => 'ex: 2015']) !!}
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

                            {!! Form::submit('Save Vehicle', ['class' => 'btn btn-primary']) !!}

                        {!! Form::close() !!}

                </div>
            </div>
        </div>
        <div class="col-lg-4">

        </div>
    </div>


@endsection