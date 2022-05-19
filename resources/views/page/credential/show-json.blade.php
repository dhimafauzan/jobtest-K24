@extends('layouts.app')

@section('content')
    <section id="description" class="card">
        <div class="card-header">
            <h4 class="card-title">List Member</h4>
        </div>
        <div class="card-content">
            <pre>
                <code>
                    {!! json_encode($data) !!}

                </code>
            </pre>
        </div>
    </section>
@endsection


