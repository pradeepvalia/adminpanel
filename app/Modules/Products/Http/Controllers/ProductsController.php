<?php

namespace App\Modules\Products\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Products\Models\Products;
use App\Modules\Stores\Models\Stores;
use Illuminate\Http\Request;

class ProductsController extends Controller
{

    /**
     * Display the module welcome screen
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Products::all();

        return view("Products::index", compact('product'));
    }

    public function formdata()
    {
        $store = Stores::all();
        return view("Products::add", compact('store'));
    }


    public function getdata(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'price'=>'required | numeric',
            'upc'=>'required |min:12',
        ]);
        $product = new Products();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->upc = $request->upc;
        $product->save();
        return back()->with('success', ' successfully Added!');
        $data = Products::all();
    }


    public function edit($id)
    {

        $product = Products::find($id);
        $store = Stores::all();
        return view("Products::edit", compact('product','store'));
    }


    public function update(request $request, $id)

    {
        $request->validate([
            'name'=>'required',
            'price'=>'required | numeric',
            'upc'=>'required |min:12',
        ]);
        $product = Products::find($id);
        $product->name = $request->name;
        $product->price = $request->price;
        $product->upc = $request->upc;
        $product->update();
        return redirect('admin/product/list');
        $data = Products::all();
    }

    public function destroy($id)
    {
        Products::destroy($id);
        return redirect('admin/product/list');
    }
}
