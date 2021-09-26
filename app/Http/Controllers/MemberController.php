<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\KodKawasan;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Member::paginate(10);

        //dd($data[0]->kodKawasan);
        // $kawasan = KodKawasan::all();
        return view('users.index',['members'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kod_kawasan = KodKawasan::all();
        return view('pages.tambah_ahli', compact('kod_kawasan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(['gambar'=>'required|image|mimes:jpg,png,jpg|max:2048',]);
        $imageName = $request->file('gambar')->getClientOriginalName();
        $path = $request->file('gambar')->storeAs('public/member-photo',$imageName);
        // dd($request);
        $member = new Member;

        $member->nama = $request->nama;
        $member->gambar = $imageName;
        $member->kod_kawasans_id = $request->kod_kawasan;
        $member->alamat = $request->alamat;
        $member->no_ic = $request->no_ic;
        $member->umur = $request->umur;
        $member->no_hp = $request->no_hp;
        $member->no_ahli_pas = $request->no_ahli_pas;
        $member->no_ahli_amal = $request->no_ahli_amal;
        $member->emel = $request->emel;
        $member->pekerjaan = $request->pekerjaan;
        $member->kemahiran = $request->kemahiran;
        $member->nama_waris = $request->nama_waris;
        $member->no_hp_waris = $request->no_hp_waris;
        $member->jawatan = $request->jawatan;
        $member->desc_jawatan = $request->desc_jawatan;
        $member->ahli_baru = $request->ahli_baru;
        $member->tahun_sertai = $request->tahun_sertai;
        $member->yuran_keahlian = $request->yuran_keahlian;
        $member->tarikh_disahkan = $request->tarikh_disahkan;

        

        $member->save();

        return redirect('/tambah_ahli')->with('status', 'Ahli telah ditambah.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Member::find($id);
        $kod_kawasan = KodKawasan::all();
        

        //dd($kod_kawasan);

        return view('pages.view_ahli',['members'=>$data],['kod_kawasan'=>$kod_kawasan]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Member::find($id);
        $kod_kawasan = KodKawasan::all();

        // dd($data);
        
        return view('pages.edit_ahli',['members'=>$data],['kod_kawasan'=>$kod_kawasan]);
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
        $member = Member::find($request->id);
        // dd($member);

        $request->validate(['gambar'=>'sometimes|image|mimes:jpg,png,jpg|max:2048',]);
        if($request->file('gambar')){
            $imageName = $request->file('gambar')->getClientOriginalName();
            $path = $request->file('gambar')->storeAs('public/member-photo',$imageName);
            $member->gambar = $imageName;
        }

        // dd($request);

        $member->nama = $request->nama;
        $member->alamat = $request->alamat;
        $member->no_ic = $request->no_ic;
        $member->umur = $request->umur;
        $member->no_hp = $request->no_hp;
        $member->kod_kawasans_id = $request->kod_kawasan;
        $member->no_ahli_pas = $request->no_ahli_pas;
        $member->no_ahli_amal = $request->no_ahli_amal;
        $member->emel = $request->emel;
        $member->pekerjaan = $request->pekerjaan;
        $member->kemahiran = $request->kemahiran;
        $member->nama_waris = $request->nama_waris;
        $member->no_hp_waris = $request->no_hp_waris;
        $member->jawatan = $request->jawatan;
        $member->desc_jawatan = $request->desc_jawatan;
        $member->ahli_baru = $request->ahli_baru;
        $member->tahun_sertai = $request->tahun_sertai;
        $member->yuran_keahlian = $request->yuran_keahlian;
        $member->tarikh_disahkan = $request->tarikh_disahkan;

        $member->save();

        return redirect('/member')->with('status', 'Ahli telah dikemaskini.');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Member::find($id);
        $data->delete();

        return redirect('/member');
    }

    // Search the specified resource from storage.
    public function search(Request $request)
    {
        $search = $request->input('search');

        //dd($search);

        if($search != ""){
            // $data = Member::whereHas('kodKawasan', function($q) use ($search){
            //     $q->where('kod_kawasan','like', '%'.$search.'%');
            // })->where(function ($query) use ($search){
            //     $query->where('nama', 'like', '%'.$search.'%')
            //     ->orWhere('no_hp', 'like', '%'.$search.'%')
            //     ->orWhere('no_ahli_pas', 'like', '%'.$search.'%');
            // })->paginate(10);

            $data = Member::whereHas('kodKawasan', function($q) use ($search){
                $q->where('kod_kawasan','like', '%'.$search.'%');
            })->orWhere(function ($query) use ($search){
                    $query->where('nama', 'like', '%'.$search.'%')
                    ->orWhere('no_hp', 'like', '%'.$search.'%')
                    ->orWhere('no_ahli_pas', 'like', '%'.$search.'%');
                })->paginate(10);
            $data->appends(['search' => $search]);
        }
        else{
            $data = Member::paginate(10);
        }

        return view('users.index',['members'=>$data]);
    }
}
