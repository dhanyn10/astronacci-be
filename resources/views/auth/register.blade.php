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
                <div class="card-header">Register Form</div>
                <div class="card-body">
                    <form method="post">
                        {{ csrf_field() }}
                        <input type="text" class="form-control mb-3" name="name" placeholder="name" required/>
                        <input type="text" class="form-control mb-3" name="email" placeholder="email" required/>
                        <input type="password" class="form-control mb-3" name="password" placeholder="password" required/>
                        <input type="password" class="form-control mb-3" name="re-password" placeholder="retype password" required/>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-success mb-3">Submit</button>
                        </div>
                    </form>
                    <div class="d-grid mb-3">
                        <a class="btn btn-outline-danger" href="{{route('auth-google')}}">login with Google</a>
                    </div>
                    <div class="d-grid mb-3">
                        <a class="btn btn-outline-primary" href="{{route('auth-facebook')}}">login with Facebook</a>
                    </div>
                    already have account? <a href="{{route('auth-login')}}">login</a>
                </div>
            </div>
        </div>
    </div>
@endsection