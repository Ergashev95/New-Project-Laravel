@extends('layout.base')
@section('content')
<h1>Product</h1>
<a href="{{route('product.index')}}" class="btn btn-success">List</a>
<style>
    tr td img{
        width: 50px;
        height: 50px;
    }
</style>
<table class="table">
    <tr>
        <th>Name</th>
        <th>Price</th>
        <th>CategoryId</th>
    </tr>
        <tr>
            <td>{{ $product->name }}</td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->category_id }}</td>
            <td><img src="{{asset('storage/assets/images/'.$product->image)}}" alt="Bu yerda rasm boladi"></td>
        </tr>
</table>

@endsection
