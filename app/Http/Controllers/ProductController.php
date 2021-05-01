<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Categories;
use App\Models\Brands;



class ProductController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $barang = Products::all();
        return view('view_product', compact('user', 'barang'));
    }

    public function add_product(Request $req)
    {

        $barang = new Products;

        $barang->name = $req->get('name');
        $barang->brands_id = $req->get('brands_id');
        $barang->categories_id = $req->get('categories_id');
        $barang->harga = $req->get('harga');
        $barang->stok = $req->get('stok');

        if ($req->hasFile('photo')) {
            $extension = $req->file('photo')->extension();

            $filename = 'photo_barang_' . time() . '.' . $extension;

            $req->file('photo')->storeAs(
                'public/photo_barang',
                $filename
            );

            $barang->photo = $filename;
            $barang->save();

            $notification = array(
                'message' => 'Data Barang Berhasil Ditambahkan',
                'alert-type' => 'success'
            );

            
            return redirect()->route('admin.product')->with($notification);
        }
    }
}
