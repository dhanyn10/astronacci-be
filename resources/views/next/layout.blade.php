@extends('layout')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            @include('sidebar')
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    @yield('next-content')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection