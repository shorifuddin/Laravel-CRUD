<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Product::all();
        // $alldata = Product::all();
        // return view('backend.product.all',compact('alldata'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.product.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $request;
        $request->validate([
            'name' => 'required',
            'brand' => 'required',
            'price' => 'required',
        ]);

        Product::create($request->all());

        // $insert=Product::create([
        //     'name' => $request->name,
        //     'brand' => $request->brand,
        //     'price' => $request->price,
        //     'quantity' => $request->quantity,
        // ]);

        // if($insert)
        // {
        //     Session::flash('success','Value');
        //     return redirect()->route('product.index');
        // }
        // Session::flash('error','Value');
        // return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product )
    {

        return $product;
        // return view('backend.product.view',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('backend.product.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        // return $request;

        $product->update($request->all());

        // $product->name = $request->name;
        // $product->price = $request->price;
        // $product->brand = $request->brand;
        // $product->quantity = $request->quantity;
        // $product->update();

        // if($product->update())
        // {
        //     Session::flash('success','Value');
        //     return redirect()->route('product.index');
        // }
        // Session::flash('error','Value');
        // return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('product.index');
    }

     /**
     * search the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function search(Product $product)
    {

        return $product;
        // return view('backend.product.view',compact('product'));
    }
}
