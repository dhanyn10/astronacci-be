@extends('layout')
@section('content')
    <div class="row">
        <div class="col-md-4 offset-md-4">
            <div class="card">
                <div class="card-header">Login Form</div>
                <div class="card-body">
                    @isset($data)
                        {{$data}}
                    @endisset
                    <a class="btn btn-outline-danger" href="{{route('auth-google')}}">Google</a>
                </div>
            </div>
        </div>
    </div>
@endsection