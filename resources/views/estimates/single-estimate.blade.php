@extends('admin')
@section('content')

<div class="row add-estimate-item-section">
    <div class="col-md-6">
        <p><strong>Department: </strong>{{$department->name}}</p>
        <p><strong><u>Customer Details:</u></strong></p>
        <p><strong>Name: </strong>{{$customer->name}}</p>
        <p><strong>Address: </strong>{{$customer->address1}},{{$customer->address2}},{{$customer->city}}</p>
        <p><strong>Tel: </strong>{{$customer->telephone}} <strong>Mobile: </strong>{{$customer->mobile}}</p>
        <p><strong>Fax: </strong>{{$customer->fax}}</p>
        <p><strong>Email: </strong>{{$customer->email}}</p>
    </div>
    <div class="col-md-6">
        <p><strong>Date: </strong>{{$estimate->created_at}}</p>
        <p><strong><u>Vehicle Details:</u></strong></p>
        <p><strong>Registration No: </strong>{{$vehicle->reg_no}}</p>
        <p><strong>Make: </strong>{{$vehicle->make}}</p>
        <p><strong>Model: </strong>{{$vehicle->model}}</p>
        <p><strong>Chasis No: </strong>{{$vehicle->chasis_no}}</p>
        <p><strong>Mileage In: </strong>{{$estimate->mileage_in}}</p>
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
                            <th>Units</th>
                            <th>Rate</th>
                            <th class="text-center">Amount</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i = 1; ?>
                        @foreach($estimate_details as $detail)
                            <tr class="odd gradeX">
                                <td>
                                    <?php echo $i; ?>
                                </td>
                                <td>{{$detail->item_description}}</td>
                                <td>{{$detail->units}}</td>
                                <td>{{$detail->rate}}</td>
                                <td>{{$detail->initial_amount}}</td>
                            </tr>
                            <?php $i++ ?>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection