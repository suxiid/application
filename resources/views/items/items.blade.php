@extends('admin')
@section('content')

    <div class="row">
        <div class="col-lg-2">
            <h3 class="page-header">Items</h3>
        </div>
        <div class="col-lg-10">
        <a href="{{url('/new-item')}}" type="button" class="page-header btn btn-primary">New Item</a>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    All Item Data
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="dataTable_wrapper">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>Item Name</th>
                                    <th>Type</th>
                                    <th>Category</th>
                                    <th>Location</th>
                                    <th>Unit of Sale</th>
                                    <th>Quantity</th>
                                    <th>Sale Price</th>
                                    <th>Service Only Cost</th>
                                    <th>pre-order Level</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($items as $item)
                                <tr class="odd gradeX">
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->type}}</td>
                                    <td>{{$item->category_id}}</td>
                                    <td>{{$item->location}}</td>
                                    <td class="center">{{$item->unit_of_sale}}</td>
                                    <td class="center">{{$item->quantity}}</td>
                                    <td class="center">{{$item->sale_price}}</td>
                                    <td class="center">{{$item->service_only_cost}}</td>
                                    <td class="center">{{$item->pre_order_level}}</td>
                                    <td></td>
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