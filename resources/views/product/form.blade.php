@csrf
{{-- {{ csrf_field() }} --}}
<label for="name">Name</label>
<input type="text" class="form-control" name="name" id="name" value="{{isset($product) ? $product->name : old('name')}}"> <br>
@error('name')
    <div class="alert alert-danger">{{$message}}</div>
@enderror
<label for="price">Price</label>
<input type="text" class="form-control" name="price" id="price" value="{{isset($product) ? $product->price : ''}}"> <br>
@error('price')
    <div class="alert alert-danger">{{$message}}</div>
@enderror
<label for="category_id">Category_id</label>

    <select class="form-control" name="category_id" id="category_id" >
        @foreach ($categories as $item)
         <option value="{{$item->id}}">{{$item->name}}</option>
        @endforeach

    </select>
    <br>
   <input type="file" class="form-control" name="image">
<input type="submit" class="btn btn-danger" value="Save">
