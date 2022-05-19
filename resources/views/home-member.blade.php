@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Member</div>

                    <div class="card-body">
                        <div class="card-content">
                            <table class="table table-striped">
                                <tr>
                                    <td colspan="2" class="bg-blue-grey bg-lighten-3">Informasi Detail Member</td>
                                </tr>
                                <tr>
                                    <td width="20%">Nama</td>
                                    <td>: {{Auth::user()->name}}</td>
                                </tr>
                                <tr>
                                    <td width="20%">NIK</td>
                                    <td>: {{Auth::user()->nik}}</td>
                                </tr>
                                <tr>
                                    <td width="20%">Jenis Kelamin</td>
                                    <td>: {{Auth::user()->status->code_nm??''}}</td>
                                </tr>
                                <tr>
                                    <td width="20%">Email</td>
                                    <td>: {{Auth::user()->email}}</td>
                                </tr>
                                <tr>
                                    <td width="20%">No Hp</td>
                                    <td>: {{Auth::user()->telepon}}</td>
                                </tr>
                                <tr>
                                    <td width="20%">Tanggal lahir</td>
                                    <td>: {{Auth::user()->tgl_lahir}}</td>
                                </tr>
                                <tr>
                                    <td width="20%">Foto</td>
                                    <td>
                                        <br>
                                        <img id='foto' class="img-thumbnail" src="{{Storage::url(Auth::user()->foto)}}"  style="width:100px;height:100px;"/>
                                        <br>

                                    </td>
                                </tr>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
