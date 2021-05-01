<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Brands;
use PhpOffice\PhpSpreadsheet\Calculation\Brand;

class BrandsController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $merek = Brands::all();
        return view('view_brands', compact('user', 'merek'));
    }

    public function add_brand(Request $req)
    {
        $merek = new Brands;

        $merek->name = $req->get('name');
        $merek->description = $req->get('description');

        $merek->save();

        $notification = array(
            'message' => 'Data Brand Ditambahkan',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.merek')->with($notification);
    }

//proses ajax
public function getDataBrands($id)
{
    $merek = Brands::find($id);

    return response()->jsonp($merek);
}

public function update_Brands(Request $req)
{
    $merek = Brands::find($req->get('id'));

    $merek->name = $req->get('name');
    $merek->description = $req->get('description');

    $merek->save();

    $notification = array(
        'message' => 'Edit Data merek Sukses',
        'alert-type' => 'success'
    );

    return redirect()->route('admin.merek')->with($notification);
}

public function delete_Brands(Request $req)
{
    $merek = Brands::find($req->get('id'));

    $merek->delete();

    $notification = array(
        'message' => 'Hapus Data merek Sukses',
        'alert-type' => 'success'
    );
    return redirect()->route('admin.merek')->with($notification);
}

}
