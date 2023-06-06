<?php

namespace App\Http\Controllers;

use App\Models\Riwayat;
use Illuminate\Http\Request;


class RiwayatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //munculkan semua data dari tabel riwayat melalui model riwayat
        $riwayat = Riwayat::all();

        return response()->json($riwayat);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validasi = $request->validate([
            'no_kartu' => 'required',
            'provider' => 'required',
            'nominal' => 'required | numeric',
            'id_admin' => 'required |numeric',
        ]);
        $riwayats = Riwayat::create($validasi);
        return response()->json($riwayats);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
          //lihat berdasarkan id
          $riwayats = Riwayat::findOrFail($id);

          return response()->json($riwayats);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
          // Validasi data input
    $validasi = $request->validate([
        'no_kartu' => 'required',
        'provider' => 'required',
        'nominal' => 'required | numeric',
        'id_admin' => 'required |numeric',
    ]);

    // Temukan produk berdasarkan ID
    $riwayats = Riwayat::findOrFail($id);

    // Perbarui data produk
    $riwayats->no_kartu = $validasi['no_kartu'];
    $riwayats->provider = $validasi['provider'];
    $riwayats->nominal = $validasi['nominal'];
    $riwayats->id_admin = $validasi['id_admin'];
    $riwayats->save();

    return response()->json([
        'message' => 'Success',
        'data' => $riwayats
    ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
          //mengambil data by id
          $riwayats = Riwayat::findOrFail($id);
          $riwayats->delete();
  
          return response()->json([
              'Pesan' => 'berhasil di musnahkan',
              
          ]);
    }
}
