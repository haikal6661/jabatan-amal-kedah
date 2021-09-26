<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\KodKawasan;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $total_member = Member::all();
        $new_member = Member::orderBy('id','desc')->paginate(5);
        $total_kawasan = KodKawasan::all();

        return view('dashboard')->with(compact('total_member'))
        ->with(compact('new_member'))
        ->with(compact('total_kawasan')); 
    }

    // public function sum()
    // {
    //     $total = Member::where('id','<=',)
    // }
}
