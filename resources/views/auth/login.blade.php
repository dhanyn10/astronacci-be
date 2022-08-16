@extends('layout')
@section('content')
    <div class="row">
        <div class="col-md-4 offset-md-4">
            <div class="card">
                <div class="card-header">Login Form</div>
                <div class="card-body">
                    <div class="d-grid mb-3">
                        <a class="btn btn-outline-danger" href="{{route('auth-google')}}">login with Google</a>
                    </div>
                    <div class="d-grid mb-3">
                        <a class="btn btn-outline-primary" href="{{route('auth-facebook')}}">login with Facebook</a>
                    </div>
                    dont have account? <a href="{{route('auth-register')}}">register</a>
                </div>
            </div>
        </div>
    </div>
@endsection