<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Admin;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $admins = Admin::all();

        return response()->json($admins);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validasi = $request->validate([
            'nama' => 'required',
            'saldo' => 'required | nmeric',
        ]);
        $admins = Admin::create($validasi);
        return response()->json($admins);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
         //lihat berdasarkan id
         $admins = Admin::findOrFail($id);

         return response()->json($admins);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        // Validasi data input
    $validasi = $request->validate([
        'nama' => 'required',
        'saldo' => 'required|numeric',
        
    ]);

    // Temukan produk berdasarkan ID
    $admins = Admin::findOrFail($id);

    // Perbarui data produk
    $admins->nama = $validasi['nama'];
    $admins->saldo = $validasi['saldo'];
    
    $admins->save();

    return response()->json([
        'message' => 'Success',
        'data' => $admins
    ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        //mengambil data by id
        $admins = Admin::findOrFail($id);
        $admins->delete();

        return response()->json([
            'Pesan' => 'berhasil di musnahkan',
            
        ]);
    }
}
