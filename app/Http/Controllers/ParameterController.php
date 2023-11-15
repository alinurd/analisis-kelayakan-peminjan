<?php

namespace App\Http\Controllers;

use App\Models\Parameter;
use Illuminate\Http\Request;

class ParameterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $response = $this->paramAll();
        $data = $response->getData(); // Mengakses objek koleksi dari respons JSON
        $kodeArray = collect($data)->pluck('kode')->toArray();

        
        $parameterModel = new Parameter();
        $data = $parameterModel->dataAll();
        $dataKode = $parameterModel->getKode('kode');

        // Tampilkan data, misalnya menggunakan dd
        dd($dataKode);


        // dd($kodeArray);

         
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
