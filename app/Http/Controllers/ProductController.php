<?php

namespace App\Http\Controllers;

use App\Events\EventOne;
use App\Http\Requests\Product\StoreRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Console\Scheduling\Event;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index(Request $request)
    {
        // Product::onlyTrashed()->restore();
        $products = Product::with('category');
        // session()->forget('mess');
        if($request->name){
            $products = $products->where('name','like','%'.$request->name.'%');
        }
        $products = $products->active()->orderBy('name','desc')->paginate(50); // all(), first(), paginate()
        return view('product.index',['products' => $products]);
    }

    public function create()
    {
        $categories = Category::get();
        return view('product.create',compact('categories'));
    }

    public function store(StoreRequest $request)
    {
        $params = $request->validated();

       if( $request->hasFile('image')){
            $imageName = time().'.'.$request->image->extension();
            $request->image->storeAs('public/assets/images',$imageName);
            $params['image'] = $imageName;
       }
    //    dd($params);

       $product =  Product::create($params);
    //    session()->flash('mess','Bazaga qoshildi');
    session(['mess' => "Muvaffaqiyatli saqlandi"]);
    //    $new_product = $product->replicate()->fill([
    //        'name' => 'Gilos',
    //        'price' => 20000,
    //    ]);

    //    $new_product->save();
       $product->category;
    //    dd($product);
       event(new EventOne($product));
        // $params = $request->validate([
        //     'name' => 'required',
        //     'price' => 'required|numeric:max:6',
        //     'category_id' => 'nullable'

        // ]);

        // Product::create($params);

        return redirect()->route('product.index');
        // Product::create([
        //     'name' => $request->name,
        //     'price' => $request->price,
        //     'category_id' => $request->category_id,
        // ]);

    }

    public function show($id){
        $product = Product::where('id','=', $id)->first();
        return view('product.show',compact('product'));
    }

    public function edit($id){
        $product = Product::where('id','=', $id)->first();
        $categories = Category::get();
        return view('product.edit',compact('product','categories'));
    }
    public function update(Request $request,$id){
        $params = $request->validate([
            'name' => 'required',
            'price' => 'required|numeric:max:6',
            'category_id' => 'nullable'
        ]);
        $product = Product::where('id',$id)->first();
        $product->update($params);
        return redirect()->route('product.index');
    }

    public function delete($id){
        $product = Product::where('id',$id)->first();
        $product->forceDelete();
        session()->flash('mess','Bazagadan ochirildi');
        return redirect()->route('product.index');
    }



}
