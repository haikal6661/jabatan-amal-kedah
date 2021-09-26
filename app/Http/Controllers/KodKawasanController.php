<?php

namespace App\Http\Controllers;

use App\Models\KodKawasan;
use Illuminate\Http\Request;

class KodKawasanController extends Controller
{
    public function index(){

        dd(123);
        $kod_kawasan = KodKawasan::all();

        //return view('/tambah_ahli')->compact($kod_kawasan);
    }
}
