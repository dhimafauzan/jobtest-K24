
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>K-24</title>

    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="../../../../global_assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/bootstrap_limitless.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/layout.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/components.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/colors.min.css" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->

    <!-- Core JS files -->
    <script src="../../../../global_assets/js/main/jquery.min.js"></script>
    <script src="../../../../global_assets/js/main/bootstrap.bundle.min.js"></script>
    <script src="../../../../global_assets/js/plugins/loaders/blockui.min.js"></script>
    <!-- /core JS files -->

    <!-- Theme JS files -->
    <script src="../../../../global_assets/js/plugins/forms/validation/validate.min.js"></script>
    <script src="../../../../global_assets/js/plugins/forms/styling/uniform.min.js"></script>

    <script src="assets/js/app.js"></script>
    <script src="../../../../global_assets/js/demo_pages/login_validation.js"></script>
    <!-- /theme JS files -->

</head>

<body>

<!-- Page content -->
<div class="page-content login-cover">

    <!-- Main content -->
    <div class="content-wrapper" style="margin-top: 30px">

        <!-- Content area -->
        <div class="col-md-12  align-items-center justify-content-center">

            <!-- Login form -->
            {!! Form::open(['route' => 'pendaftaran.store','files' => true, 'id' => 'form-task'])!!}
                @csrf

                <div class="card mb-0 " style="padding: 20px">
                    <div class="form-body">
                        <h4 class="card-subtitle line-on-side text-muted text-center font-3 mx-2 my-1"><span>
                                            REGISTRASI MEMBER</span></h4>
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
                                    <input type="hidden" name="role" value="anggota">
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
                                    {!! Form::label('foto', 'Foto Diri') !!}
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
                        <a href="{{route('login')}}" class="btn btn-warning mr-1" onclick="return confirm('Apa anda yakin?')">
                            <i class="feather icon-corner-down-left"></i> Back
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-check-square-o"></i> Submit
                        </button>
                    </div>
                </div>

        {!! Form::close()  !!}
            <!-- /login form -->



        </div>
        <!-- /content area -->

    </div>
    <!-- /main content -->

</div>
<script src="{{asset('global_assets/js/plugins/forms/validation/validate.min.js')}}"></script>
<script src="{{asset('global_assets/js/plugins/forms/inputs/touchspin.min.js')}}"></script>
<script src="{{asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
<!-- /page content -->
{!! JsValidator::formRequest('App\Http\Requests\Credential\PendaftaranRequest') !!}

</body>
</html>
