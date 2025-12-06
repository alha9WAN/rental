<?php

namespace App\Http\Controllers;

use App\Models\KategoriMotor;
use App\Models\Motor;
use Illuminate\Http\Request;

class MotorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request,  $kategori = 'all')
    {
$query = Motor::with('kategoriMotor');

    if ($request->has('search') && $request->search != '') {
            $query->where(function ($q) use ($request) {
                $q->where('nama', 'like', '%' . $request->search . '%')
                  ->orWhere('tipe', 'like', '%' . $request->search . '%')
                  ->orWhere('harga_per_hari', 'like', '%' . $request->search . '%');
            });
        }



       $selectedCategory = $request->category ?? $kategori;

        if ($selectedCategory !== 'all') {
        $query->whereHas('kategoriMotor', function ($q) use ($selectedCategory) {
            $q->where('nama', $selectedCategory);
        });
    }




    $motors = $query->paginate(12);
     $kategoris = KategoriMotor::all();


        return view('motor.list', compact('motors','kategoris','selectedCategory'));
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
