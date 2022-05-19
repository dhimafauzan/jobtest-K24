<?php

namespace App\Http\Controllers\Credential;

use App\Http\Controllers\Controller;
use App\Http\Requests\Credential\CreateRequest;
use App\Http\Requests\Credential\UpdateRequest;
use App\Http\Requests\Credential\PendaftaranRequest;
use App\Models\Code;
use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DataTables;
use Session;
use Auth;

class CredentialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()) {
            $data = User::select('*');

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($a) {
                    return '<a href="' . route('users.edit', $a->id) . '" class="primary edit mr-1"><i class="fa fa-pencil mr-2"></i></a>
                            <a href="' . route('users.show', $a->id) . '" class="primary edit mr-1" ><i class="fa fa-eye mr-2"></i></a>
                            <a href="' . route('users.destroy', $a->id) . '" class="danger delete delete-data-table mr-1" ><i class="fa fa-trash mr-2"></i></a>
                            ';
                })
                ->make(true);
        }

        return view('page.credential.index');

    }

    public function indexJson()
    {
        $data = User::select('*')->get();

        return view('page.credential.show-json', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pilihan = Role::select('name', 'display_name')->pluck('display_name','name');
        $status = Code::where('code_group', 'STATUS')->pluck('code_nm', 'code_cd');

        return view('page.credential.create', compact('pilihan', 'status'));
    }

    public function regis()
    {
        $status = Code::where('code_group', 'STATUS')->pluck('code_nm', 'code_cd');
        return view('page.credential.regis', compact('status'));
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequest $request)
    {

        $data = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'jenis_kelamin' => $request->jenis_kelamin,
            'telepon' => $request->telepon,
            'nik' => $request->nik,
            'tgl_lahir' => $request->tgl_lahir,
            'password' => \Hash::make($request->password),

        ]);
        if($request->hasFile('foto')){
            $loc = date('Y-F');
            $path = $request->file('foto')->store('public/'.$loc);
            User::where('id', $data->id)->update(
                [
                    'foto' => str_replace("public/","",$path)
                ]
            );
        }

        $data->attachRole($request->role);
        if($data){
            Session::flash('keterangan', 'Data berhasil di simpan');
        }
        return redirect(route('users.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = User::with(['status'])->find($id);

//        return $data;

        return view('page.credential.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data  = User::find($id);
        $pilihan = Role::select('name', 'display_name')->pluck('display_name','name');
        $status = Code::where('code_group', 'STATUS')->pluck('code_nm', 'code_cd');

        return view('page.credential.edit', compact('data', 'pilihan', 'status'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        $data = User::where('id', $id)->update($request->except(
            [
                '_token',
                '_method',
                'role',
                'password',
                'password_confirmation',
                'proengsoft_jsvalidation'

            ]
        ));

        if($request->filled('password'))
        {
            $data = User::where('id', $id)->update(
                [
                    'password' => \Hash::make($request->password)
                ]
            );
        }
        if($request->hasFile('foto')){
        $loc = date('Y-F');
        $path = $request->file('foto')->store('public/'.$loc);
            User::where('id', $id)->update(
            [
                'foto' => $path
            ]
        );
    }


        \DB::table('role_user')->where('user_id', $id)->delete();
        $data = User::findOrFail($id);
        $data->attachRole($request->role);
        if($data)
        {
            Session::flash('keterangan', "Data berhasil diubah");
        }

        return redirect(route('users.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = User::destroy($id);

        return $data;
    }
}
