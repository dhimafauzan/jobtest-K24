<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Http\Requests\Credential\PendaftaranRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Session;

class RegisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeRegis(PendaftaranRequest $request)
    {

        $data = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'jenis_kelamin' => $request->jenis_kelamin,
            'telepon' => $request->telepon,
            'nik' => $request->nik,
            'tgl_lahir' => $request->tgl_lahir,
            'password' => \Hash::make($request->password),

        ])->attachRole($request->role);
        if($request->hasFile('foto')){
            $loc = date('Y-F');
            $path = $request->file('foto')->store('public/'.$loc);
            User::where('id', $data->id)->update(
                [
                    'foto' => str_replace("public/","",$path)
                ]
            );
        }
//        $a = User::find($data->id);

//        $a->attachRole($request->role);
//
            Session::flash('keterangan', 'Data berhasil di simpan');

        return redirect(url('login'));
    }
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
