@extends('layouts.app')

@section('content')

    <section id="description" class="card">
        <div class="card-header">
            <h4 class="card-title">Edit Member</h4>
        </div>
        <div class="card-content">
            <div class="card-body">

                {!! Form::model($data,['route' => ['users.update', $data->id],'files' => true, 'method' => 'put', 'id' => 'form-task'])!!}
                <div class="form-body">
                    <div class="row">
                        <div class="col md-6">
                            <div class="form-group">
                                {!! Form::label('name', 'Name') !!}
                                {!! Form::text('name', null, ['id' => 'name', 'class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="col md-6">
                            <div class="form-group">
                                {!! Form::label('email', 'Email') !!}
                                {!! Form::email('email' ,null, ['id' => 'email', 'class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col md-6">
                            <div class="form-group">
                                {!! Form::label('nik', 'NIK') !!}
                                {!! Form::text('nik', null, ['id' => 'nik', 'class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="col md-6">
                            <div class="form-group">
                                {!! Form::label('telepon', 'Phone') !!}
                                {!! Form::text('telepon', null, ['id' => 'telepon', 'class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col md-6">
                            <div class="form-group">
                                {!! Form::label('tgl_lahir', 'Tanggal Lahir') !!}
                                {!! Form::date('tgl_lahir', null, ['id' => 'tgl_lahir', 'class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="col md-6">
                            <div class="form-group">
                                {!! Form::label('jenis_kelamin', 'Jenis Kelamin') !!}
                                {!! Form::select('jenis_kelamin', $status,null, ['id' => 'jenis_kelamin', 'class' => 'form-control', 'placeholder' => 'Choose One']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('role', 'Role') !!}
                                {!! Form::select('role', $pilihan,null, ['id' => 'role', 'class' => 'form-control' , 'placeholder' => 'Choose Role']) !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('foto', 'Foto Diri') !!}
                                <br>
                                <img id='img-foto' class="img-thumbnail" src="{{Storage::url($data->foto)}}"  style="width:100px;height:100px;" />
                                <br>
                                <br>
                                {!! Form::file('foto',null, ['id' => 'foto', 'class' => 'form-control' , 'placeholder' => 'Choose File']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col md-6">
                            <div class="form-group">
                                {!! Form::label('password', 'Password') !!}
                                {!! Form::password('password', ['id' => 'password', 'class' => 'form-control', 'placeholder' => 'Password']) !!}
                            </div>
                        </div>
                        <div class="col md-6">
                            <div class="form-group">
                                {!! Form::label('password_confirmation', 'Password Confirmation') !!}
                                {!! Form::password('password_confirmation', ['id' => 'password_confirmation', 'class' => 'form-control', 'placeholder' => 'Password Confirmation']) !!}
                            </div>
                        </div>
                    </div>

                </div>

                <div class="form-actions">
                    <a href="{{route('users.index')}}" class="btn btn-warning mr-1" onclick="return confirm('Apa anda yakin?')">
                        <i class="feather icon-corner-down-left"></i> Back
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-check-square-o"></i> Submit
                    </button>
                </div>
                {!! Form::close()  !!}
            </div>
        </div>
    </section>
@endsection

@push('js')
        {!! JsValidator::formRequest('App\Http\Requests\Credential\UpdateRequest') !!}
@endpush
