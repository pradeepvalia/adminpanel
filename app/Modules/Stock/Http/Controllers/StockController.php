<?php

namespace App\Modules\Stock\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Products\Models\Products;
use App\Modules\Stock\Models\Stock;
use App\Modules\Stores\Models\Stores;
use Illuminate\Http\Request;

class StockController extends Controller
{

    /**
     * Display the module welcome screen
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stock = Stock::all();

        return view("Stock::index", compact('stock'));
    }

    public function formdata()
    {
        $store = Stores::all();
        $product = Products::all();
        return view("Stock::add", compact('store' ,'product'));
    }


    public function getdata(Request $request)
    {
        $request->validate([
            'store_id'=>'required',
            'product_id'=>'required',
            'stock'=>'required |numeric',
        ]);
        $product = new Stock();
        $product->store_id = $request->store_id;
        $product->product_id = $request->product_id;
        $product->stock = $request->stock;
        $product->save();
        return back()->with('success', ' successfully Added!');
        $data = Stock::all();
    }


    public function edit($id)
    {

        $stock = Stock::find($id);
        $store = Stores::all();
        $product = Products::all();
        return view("Stock::edit", compact('stock','product','store'));
    }


    public function update(request $request, $id)

    {
        $request->validate([
            'store_id'=>'required',
            'product_id'=>'required',
            'stock'=>'required |numeric',
        ]);
        $product = Stock::find($id);
        $product->store_id = $request->store_id;
        $product->product_id = $request->product_id;
        $product->stock = $request->stock;
        $product->update();
        return redirect('admin/stock/list');
        $data = Stock::all();
    }

    public function destroy($id)
    {
        Products::destroy($id);
        return redirect('admin/stock/list');
    }
}
