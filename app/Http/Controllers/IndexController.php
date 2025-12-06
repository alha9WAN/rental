<?php

namespace App\Http\Controllers;

use App\Models\Carpool;
use Illuminate\Http\Request;
use App\Models\Mobil;
use App\Models\Motor;
use App\Models\Voucher;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
$mobils = Mobil::with('mobilKategori')->latest()->take(4)->get();
$motors = Motor::with('kategoriMotor')->latest()->take(4)->get();
$vouchers = Voucher::with('kategoriVoucher')->latest()->take(4)->get();
$carrPools = Carpool::with('kategori')->latest()->take(4)->get();



 return view('index', compact('mobils', 'motors', 'vouchers','carrPools'));


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