@extends('admin')
@section('content')

        <!-- /../.info-header -->
        @include('../info-header')

<div class="row">
    <div class="col-md-6">
        <p>Department: {{$department->name}}</p>
        <p>Customer Name: {{$customer->name}}</p>
        <p>Customer Address: {{$customer->address1}},{{$customer->address2}},{{$customer->city}}</p>
        <p>Tel: {{$customer->telephone}},Mobile: {{$customer->mobile}}, Fax: {{$customer->fax}}</p>
    </div>
    <div class="col-md-6">
        <p>Date: {{$estimate->created_at}}</p>
        <p>Customer Name: {{$customer->name}}</p>
        <p>Customer Name: {{$customer->address1}},{{$customer->address2}},{{$customer->city}}</p>
        <p>Tel: {{$customer->telephone}},Mobile: {{$customer->mobile}}, Fax: {{$customer->fax}}</p>
    </div>
</div>

@endsection