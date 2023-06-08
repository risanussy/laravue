<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    // untuk ambil semua data 
    public function index(){
        $products = Product::all();

        return response()->json($products);
    }

    // Post data atau kirim data
    public function store(Request $request){
        // validasi
        $validatedData = $request->validate([
            'nama' => 'required',
            'harga' => 'required|numeric',
            'desc' => 'required',
        ]);

        $products = Product::create($validatedData);

        return response()->json($products);
    }

    // lihat berdasarkan id
    public function show($id){
        // mengambil data by id
        $products = Product::findOrFail($id);

        return response()->json($products);
    }

    public function destroy($id){
        // mengambil data by id
        $products = Product::findOrFail($id);

        $products->delete();

        return response()->json([
            'Pesan' => 'Berhasil Dihapus'
        ]);

    }

    public function update(Request $request, $id)
    {
        // Validasi input dari request
        $validatedData = $request->validate([
            'nama' => 'required',
            'harga' => 'required|numeric',
            'desc' => 'required',
        ]);

        // Cari produk berdasarkan ID
        $product = Product::findOrFail($id);

        // Update data produk
        $product->nama = $validatedData['nama'];
        $product->harga = $validatedData['harga'];
        $product->desc = $validatedData['desc'];
        $product->save();

        // Mengembalikan respons dengan data produk yang telah diupdate
        return response()->json([
            'message' => 'Produk berhasil diupdate',
            'data' => $product
        ]);
    }
}

