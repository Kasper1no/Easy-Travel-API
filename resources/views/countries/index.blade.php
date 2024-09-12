@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Countries') }}</div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($countries as $country)
                                    <tr>
                                        <td>{{ $country->id }}</td>
                                        <td>{{ $country->name }}</td>
                                        <td>
                                            <a href="{{ route('countries.edit', $country->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                            <form action="{{ route('countries.destroy', $country->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <a href="{{ route('countries.create') }}" class="btn btn-success">{{ __('Add Country') }}</a>
                    <a href="{{ route('home') }}" class="btn btn-secondary">{{ __('Go back to Home') }}</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
