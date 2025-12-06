<?php

namespace App\Http\Controllers;

use App\Models\KategoriVoucher;
use App\Models\Voucher;
use Illuminate\Http\Request;

class VoucherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Voucher::with('kategoriVoucher');
    if ($request->has('search') && $request->search != '') {
            $query->where(function ($q) use ($request) {
                $q->where('nama', 'like', '%' . $request->search . '%')
                  ->orWhere('diskon', 'like', '%' . $request->search . '%')
                   ->orWhere('alamat', 'like', '%' . $request->search . '%');

            });
        }


            if ($request->has('category') && $request->category != 'all') {
        $query->whereHas('kategoriVoucher', function ($q) use ($request) {
            $q->where('nama', $request->category);
        });
    }


    // cari berdasrkan region
      // ⭐ REGION FILTER —
    if ($request->has('region') && $request->region != '') {
        $query->where('alamat', 'like', '%' . $request->region . '%');
    }
    
    $vouchers = $query->paginate(12);
     $kategoris = KategoriVoucher::all();
        return view('voucher.list', compact('vouchers','kategoris'));
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
