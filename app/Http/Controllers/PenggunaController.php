<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use App\Models\User;

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::whereNotIn('id', [Auth::user()->id])
                        ->whereNotIn('email', ['haikal.ariff13@gmail.com'])->paginate(10);

        return view('pages.senarai_pengguna')->with(compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.daftar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $request->validate(['name'=>'required', 'string', 'max:255',
                            'email'=>'required', 'string', 'email', 'max:255', 'unique:users',
                            'password'=>'required', 'string', 'min:8', 'confirmed']);

                            $user = User::create([
                                'name' => $request['name'],
                                'email' => $request['email'],
                                'password' => Hash::make($request['password']),
                            ]);

                            return redirect('/daftar')->with('status', 'Pengguna telah ditambah.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = User::find($id);

        // dd($data);
        
        return view('pages.edit_pengguna',['users'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = User::find($request->id);

        $request->validate(['name'=>'required', 'string', 'max:255',
        'email'=>'required', 'string', 'email', 'max:255', 'unique:users',
        'password'=>'sometimes']);

        // dd($request);

        $user = User::find($request->id)->update([
            'name' => $request['name'],
            'email' => $request['email'],
        ]);
        return redirect('/senarai_pengguna')->with('status', 'Pengguna telah dikemaskini.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = User::find($id);
        $data->delete();

        return redirect('/senarai_pengguna');
    }
}
