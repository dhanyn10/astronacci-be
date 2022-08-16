@extends('layout')
@section('content')
    <div class="row">
        <div class="col-md-4 offset-md-4">
            
            @if (flash()->message)
                <div class="alert alert-{{ flash()->class }} mb-3">
                    {{ flash()->message }}
                </div>
            @endif
            <div class="card">
                <div class="card-header">Login Form</div>
                <div class="card-body">
                    <form method="post">
                        {{ csrf_field() }}
                        <input type="text" name="email" placeholder="email" class="form-control mb-3" required/>
                        <input type="password" name="password" placeholder="password" class="form-control mb-3" required/>
                        <div class="d-grid mb-3">
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </form>
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