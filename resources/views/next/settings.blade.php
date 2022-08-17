@extends('next.layout')
@section('next-content')
    <h3>Choose Membership</h3>
    <div class="row">
        <div class="col-sm-4">
            @if ($type == 1)
            <div class="card border-secondary">
            @else
            <div class="card">
            @endif
                <div class="card-header">A</div>
                <div class="card-body">
                    <form method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="type" value="1">
                        <div class="d-grid">
                            <button type="submit" class="btn btn-secondary btn-sm">Choose</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            @if ($type == 2)
            <div class="card border-primary">
            @else
            <div class="card">
            @endif
                <div class="card-header">B</div>
                <div class="card-body">
                    <form method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="type" value="2">
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-sm">Choose</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            @if ($type == 3)
            <div class="card border-danger">
            @else
            <div class="card">
            @endif
                <div class="card-header">C</div>
                <div class="card-body">
                    <form method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="type" value="3">
                        <div class="d-grid">
                            <button type="submit" class="btn btn-danger btn-sm">Choose</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection