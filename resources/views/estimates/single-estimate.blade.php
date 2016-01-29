@extends('admin')
@section('content')

        <!-- /../.info-header -->
        @include('../info-header')

<div class="row">
    <div class="col-md-6">
        <p>Department: {{$department->name}}</p>
        <p><strong>Customer Details:</strong></p>
        <p>Customer Name: {{$customer->name}}</p>
        <p>Customer Address: {{$customer->address1}},{{$customer->address2}},{{$customer->city}}</p>
        <p>Tel: {{$customer->telephone}},Mobile: {{$customer->mobile}}</p>
        <p>Fax: {{$customer->fax}}</p>
        <p>Email: {{$customer->email}}</p>
    </div>
    <div class="col-md-6">
        <p>Date: {{$estimate->created_at}}</p>
        <p><strong>Vehicle Details:</strong></p>
        <p>Registration No: {{$vehicle->reg_no}}</p>
        <p>Make: {{$vehicle->make}}</p>
        <p>Model: {{$vehicle->model}}</p>
        <p>Chasis No: {{$vehicle->chasis_no}}</p>
        <p>Mileage In: {{$estimate->mileage_in}}</p>
    </div>
</div>

<hr>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Estimate Data
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="dataTable_wrapper">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-function">
                        <thead>
                        <tr>
                            <th>S. No</th>
                            <th>Description</th>
                            <th>Hrs</th>
                            <th>Rate</th>
                            <th class="text-center">Amount</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($estimate_details as $detail)
                            <tr class="odd gradeX">
                                <td>{{$detail->item_id}}</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
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