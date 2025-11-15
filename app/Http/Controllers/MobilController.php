<?php

namespace App\Http\Controllers;

use App\Models\KategoriMobil;
use App\Models\Mobil;
use App\Models\Motor;
use App\Models\Voucher;
use Illuminate\Http\Request;

class MobilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
     public function index(Request $request)
    {
        // search
   $query = Mobil::with('mobilKategori');

           // Jika user mengetik di kolom search
        if ($request->has('search') && $request->search != '') {
            $query->where(function ($q) use ($request) {
                $q->where('nama', 'like', '%' . $request->search . '%')
                  ->orWhere('tipe', 'like', '%' . $request->search . '%')
                  ->orWhere('harga_per_hari', 'like', '%' . $request->search . '%');
            });
        }

        // end search

        // kategori
  // 🚘 Jika user memilih kategori (bukan 'all')
    if ($request->has('category') && $request->category != 'all') {
        $query->whereHas('mobilKategori', function ($q) use ($request) {
            $q->where('nama', $request->category);
        });
    }

         // Jalankan query dan ambil data
$mobils = $query->paginate(3);



        // kategori mobil
        $kategoris = KategoriMobil::all();

        // Kirim data mobil ke view
        return view('mobil.list', compact('mobils','kategoris'));
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
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}