@extends('admin')
@section('content')

    <div class="row">
        <div class="col-lg-2">
            <h3 class="page-header">Items</h3>
        </div>
        <div class="col-lg-10">
        <a href="{{url('items/create')}}" type="button" class="page-header btn btn-primary">New Item</a>
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
                        <table class="table table-striped table-bordered table-hover" id="dataTables-function">
                            <thead>
                                <tr>
                                    <th>Item Name</th>
                                    <th>Type</th>
                                    <th>Category</th>
                                    <th>Location</th>
                                    <th>Sale Price</th>
                                    <th>Service Only Cost</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($items as $item)
                                <tr class="odd gradeX">
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->type}}</td>
                                    <td>@if($item->category_id)
                                        @foreach($catagories as $catagory)
                                        @if($item->category_id == $catagory->id)
                                        {{$catagory->cat_name}}
                                        @endif
                                        @endforeach
                                        @endif
                                    </td>
                                    <td>{{$item->location}}</td>
                                    <td class="center">{{$item->sale_price}}</td>
                                    <td class="center">{{$item->service_only_cost}}</td>
                                    <td class="text-center"><a href="{{url('items/'.$item->id.'/edit')}}"><i class="fa fa-pencil fa-fw"></i></a>&nbsp;<a href="#"><i class="fa fa-trash-o fa-fw"></i></a></td>
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