@extends('layouts.app')

@section('content')
    <div id="description" class="card">
        <div class="card-header">
            <h4 class="card-title">List Member</h4>
            <div class="col md-3">
                <a href="{{route('users.create')}}" class="btn btn-primary float-right" >Create</a>
            </div>
        </div>
        <div class="card-content">
            <div class="card-body">
                @if(Session::has('keterangan'))
                    <div class="alert alert-success alert-dismissible mb-2" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        {{Session::get('keterangan')}}
                    </div>
                @endif
                <table class="table table-striped table-bordered dt-responsive" id="table1" width="100%">
                    <thead>
                    <th width="30px">No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Role</th>
                    <th width="140px">Action</th>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        const table1 =  $('#table1').DataTable({
            "processing": true,
            "serverSide": true,
            "responsive" :true,
            "ajax": window.location.href,
            "columns": [
                { data: 'DT_RowIndex', name: 'DT_RowIndex' , orderable: false, searchable: false, className: "text-right"},
                { data: "name"},
                { data: "email"},
                { data: "telepon", defaulContent: "-"},
                { data: "role", defaulContent: "-",orderable: false, searchable: false},
                { data: "action",  className: "text-center"},
            ]
        });
    </script>
@endpush

