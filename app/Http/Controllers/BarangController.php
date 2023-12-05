<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('input_barang');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $kode_barang = $request->input('kode_barang');
        $nama_barang = $request->input('nama_barang');
        $jenis_varian = $request->input('jenis_varian');
        $qty = $request->input('qty');
        $harga_jual = $request->input('harga_jual');

        // Hitung total harga
        $total_harga = $qty * $harga_jual;

        // Hitung potongan harga
        $potongan_harga = 0;
        if ($total_harga >= 500000) {
            $potongan_harga = 0.5 * $total_harga; // Diskon 50%
        } elseif ($total_harga >= 200000) {
            $potongan_harga = 0.2 * $total_harga; // Diskon 20%
        } elseif ($total_harga >= 100000) {
            $potongan_harga = 0.1 * $total_harga; // Diskon 10%
        }

        // Hitung persentase potongan harga
        $persentase_potongan = ($potongan_harga / $total_harga) * 100;

        // Hitung harga yang harus dibayar
        $harga_bayar = $total_harga - $potongan_harga;

        // Simpan data ke database
        $barang = new Barang;
        $barang->kode_barang = $kode_barang;
        $barang->nama_barang = $nama_barang;
        $barang->jenis_varian = $jenis_varian;
        $barang->qty = $qty;
        $barang->harga_jual = $harga_jual;
        $barang->total_harga = $total_harga;
        $barang->potongan_harga = $potongan_harga;
        $barang->potongan_harga = $persentase_potongan;
        $barang->harga_bayar = $harga_bayar;
        $barang->save();

        $barangs = Barang::all();
            return view('hasil_barang', compact('barangs'));

        /*return view('hasil_barang', compact(
            'kode_barang',
            'nama_barang',
            'jenis_varian',
            'qty',
            'harga_jual',
            'total_harga',
            'potongan_harga',
            'persentase_potongan',
            'harga_bayar'
        ));*/
    }

    public function semuaBarang()
{
    $barangs = Barang::all();
    return view('semua-barang', compact('barangs'));
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $barangs = Barang::findOrFail($id);

        return view('edit_barang', compact('barangs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $barangs = Barang::findOrFail($id);

        $barangs->update($request->all());

        return redirect()->route('barang.index')->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}