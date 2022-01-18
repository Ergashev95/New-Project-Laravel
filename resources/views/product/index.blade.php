@extends('layouts.app')
@section('content')
<form action="{{route('product.index')}}" method="get">
    <input type="text" required name="name">
     <button type="submit" class="btn btn-success">Qidiruv</button>
</form>
    <h1>Product Index</h1>
    <a href="{{route('product.create')}}" class="btn btn-success">Add</a>
    <table class="table">
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Price</th>
            <th>CategoryId</th>
        </tr>
        @if(session()->has('mess'))
        <div class="alert alert-danger">
            <b>Muvaffaqiyatli   {{session()->get('mess')}} </b>
        </div>
        @endif
        @foreach ($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->upper_name }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->category->name }}</td>
                <td>
                    <a href="{{route('product.show',['id' => $product->id])}}" class="btn btn-warning">Show</a>
                    <a href="{{route('product.edit',['id' => $product->id])}}" class="btn btn-success">Edit</a>
                    <form onclick="return confirm('Ochirishni xohliszmi')" class="d-inline-block" action="{{route('product.delete',['id' => $product->id])}}" method="post">
                        @method('delete')
                        @csrf
                        <input type="submit" class="btn btn-danger" value="delete">
                    </form>



                    {{-- <a href="{{route('product.delete',['id' => $product->id])}}" class="btn btn-danger">Delete</a> --}}
                </td>
            </tr>

        @endforeach


    </table>
    <div class="paginate">
        {{$products->links()}}
    </div>
@endsection
