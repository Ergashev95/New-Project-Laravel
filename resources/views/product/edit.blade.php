@extends('layout.base')
@section('content')
    <h1>Product Update</h1>
<form action="{{route('product.update',['id' => $product->id])}}" method="post">
    @method('put')
    @include('product.form')
</form>

@endsection
