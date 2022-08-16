@extends('layout')
@section('content')
    <div class="row">
        <div class="col-md-4 offset-md-4">
            <div class="card">
                <div class="card-header">Register Form</div>
                <div class="card-body">
                    <form method="post">
                        {{ csrf_field() }}
                        <input type="text" class="form-control mb-3" name="name" placeholder="name"/>
                        <input type="text" class="form-control mb-3" name="email" placeholder="email"/>
                        <input type="password" class="form-control mb-3" name="password" placeholder="password"/>
                        <input type="password" class="form-control mb-3" name="re-password" placeholder="password"/>
                    </form>
                    <div class="d-grid mb-3">
                        <a class="btn btn-outline-danger" href="{{route('auth-google')}}">login with Google</a>
                    </div>
                    <div class="d-grid mb-3">
                        <a class="btn btn-outline-primary" href="{{route('auth-facebook')}}">login with Facebook</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection