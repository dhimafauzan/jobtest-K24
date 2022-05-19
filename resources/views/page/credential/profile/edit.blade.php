@extends('layouts.app')

@section('content')

    <section id="description" class="card">
        <div class="card-header">
            <h4 class="card-title">Edit Profile</h4>
        </div>
        <div class="card-content">
            <div class="card-body">

                {!! Form::model($data,['route' => ['profile.update', $data->id],'files' => true, 'method' => 'put', 'id' => 'form-task'])!!}
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
                    <a href="{{route('home')}}" class="btn btn-warning mr-1" onclick="return confirm('Apa anda yakin?')">
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
        {!! JsValidator::formRequest('App\Http\Requests\Credential\ProfileRequest') !!}
@endpush
