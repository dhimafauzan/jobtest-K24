@extends('layouts.app')

@section('content')
    <section id="description" class="card">
        <div class="card-header">
            <h4 class="card-title">Detail Member</h4>
        </div>
        <div class="card-content">
            <table class="table table-striped">
                <tr>
                    <td colspan="2" class="bg-blue-grey bg-lighten-3">Informasi Detail Member</td>
                </tr>
                <tr>
                    <td width="20%">Nama</td>
                    <td>: {{$data->name}}</td>
                </tr>
                <tr>
                    <td width="20%">NIK</td>
                    <td>: {{$data->nik}}</td>
                </tr>
                <tr>
                    <td width="20%">Jenis Kelamin</td>
                    <td>: {{$data->status->code_nm??''}}</td>
                </tr>
                <tr>
                    <td width="20%">Email</td>
                    <td>: {{$data->email}}</td>
                </tr>
                <tr>
                    <td width="20%">No Hp</td>
                    <td>: {{$data->telepon}}</td>
                </tr>
                <tr>
                    <td width="20%">Tanggal lahir</td>
                    <td>: {{$data->tgl_lahir}}</td>
                </tr>
                <tr>
                    <td width="20%">Foto</td>
                    <td>
                        <br>
                        <img id="foto" class="img-thumbnail" src="{{Storage::url($data->foto)}}"  style="width:100px;height:100px;"/>
                        <br>

                    </td>
                </tr>

            </table>
        </div>
    </section>
@endsection


