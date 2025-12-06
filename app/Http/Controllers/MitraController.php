<?php

namespace App\Http\Controllers;

use App\Models\Mitra;
use Illuminate\Http\Request;

class MitraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('mitra.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
           $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'no_hp' => 'required|string|max:20',
            'email' => 'nullable|email',
            'nama_perusahaan' => 'nullable|string|max:255',
            'alamat' => 'required|string',
            'jenis_kendaraan' => 'required|string',
            'nama_kendaraan' => 'required|string|max:255',
            'harga_sewa' => 'nullable|numeric',
            'deskripsi' => 'nullable|string'
        ], [
'name.required' => 'The partner name field is required.',
'phone.required' => 'The phone number field is required.',
'email.email' => 'The email format is invalid.',
'address.required' => 'The address field is required.',
'vehicle_type.required' => 'Please select a vehicle type.',
'vehicle_name.required' => 'The vehicle name field is required.',
'rental_price.numeric' => 'The rental price must be a numeric value.',
        ]);

        Mitra::create($validated);

return redirect()->back()->with('success',
"Partner data has been successfully received. The LombokRentHub team will conduct further verification and contact you if necessary. The verification and approval process will be conducted directly by the LombokRentHub team in person before prospective partners are officially declared as members.");
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
