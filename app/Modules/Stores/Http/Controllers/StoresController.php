<?php

namespace App\Modules\Stores\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Stores\Models\Stores;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StoresController extends Controller
{

    /**
     * Display the module welcome screen
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stores = Stores::all();
        return view("Stores::index", compact('stores'));
    }

    public function formdata()
    {
        return view("Stores::add");
    }

    public function getdata(Request $request)
    {
        $request->validate([
            'name' => 'required ',
            'address' => 'required',
            'country' => 'required',
            'state' => 'required',
            'city' => 'required',
        ]);

        $stores = new Stores();
        $stores->name = $request->name;
        $stores->address = $request->address;
        $stores->country = $request->country;
        $stores->state = $request->state;
        $stores->city = $request->city;
        $stores->save();
        return back()->with('success', ' successfully Added!');
        $data = Stores::all();
    }


    public function edit($id)
    {

        $stores = Stores::find($id);
        return view("Stores::edit", compact('stores'));
    }

    public function update(request $request, $id)
    {
        $request->validate([
            'name' => 'required ',
            'address' => 'required',
            'country' => 'required',
            'state' => 'required',
            'city' => 'required',
        ]);
        $stores = Stores::find($id);
        $stores->name = $request->name;
        $stores->address = $request->address;
        $stores->country = $request->country;
        $stores->state = $request->state;
        $stores->city = $request->city;
        $stores->update();
        return redirect('admin/stores/list');
        $data = Stores::all();
    }

    public function destroy($id)
    {
        Stores::destroy($id);
        return redirect('admin/stores/list');
    }
}
