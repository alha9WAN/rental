<?php

namespace App\Http\Controllers;

use App\Models\Carpool;
use App\Models\KategoriCarpool;
use Illuminate\Http\Request;

class CarpoolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
              // search
   $query = Carpool::with('kategori');

           // Jika user mengetik di kolom search
        if ($request->has('search') && $request->search != '') {
            $query->where(function ($q) use ($request) {
                $q->where('nama_rute', 'like', '%' . $request->search . '%')
                  ->orWhere('harga_per_kursi', 'like', '%' . $request->search . '%')
                  ->orWhere('jam_berangkat', 'like', '%' . $request->search . '%');
            });
        }

        // end search

        // kategori
    if ($request->has('category') && $request->category != 'all') {
        $query->whereHas('kategori', function ($q) use ($request) {
            $q->where('name', $request->category);
        });
    }

         // Jalankan query dan ambil data
$carPools = $query->paginate(3);



        $kategoris = KategoriCarpool::all();

        return view('carPoll.list', compact('carPools','kategoris'));

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