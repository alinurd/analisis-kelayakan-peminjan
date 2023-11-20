<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parameter extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'kode',
        'jenis',
        'status',
    ];
    public function dataAll()
    {
        return Parameter::all();
    }
    public function getKode($data)
    {
        $kodeArray = Parameter::pluck($data)->toArray();
        // dd($kodeArray);

        return $kodeArray;
    }
}

