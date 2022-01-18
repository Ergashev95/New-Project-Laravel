@extends('layout.base')
@section('content')

    <h1>Product Create</h1>
<form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
    @include('product.form')
</form>

@endsection
