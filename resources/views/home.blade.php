@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
            <div class="mt-3 d-flex justify-content-center">
                <div class="btn-group-vertical">
                    <a href="/countries" class="btn btn-primary btn-lg btn-block mb-2">{{ __('Countries') }}</a>
                    <a href="/cities" class="btn btn-primary btn-lg btn-block mb-2">{{ __('Cities') }}</a>
                    <a href="/hotels" class="btn btn-primary btn-lg btn-block mb-2">{{ __('Hotels') }}</a>
                    <a href="/tours" class="btn btn-primary btn-lg btn-block mb-2">{{ __('Tours') }}</a>
                    <a href="/orders" class="btn btn-primary btn-lg btn-block mb-2">{{ __('Orders') }}</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
