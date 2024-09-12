@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Cities') }}</div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Country</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cities as $city)
                                    <tr>
                                        <td>{{ $city->id }}</td>
                                        <td>{{ $city->name }}</td>
                                        <td>{{ $city->country->name }}</td>
                                        <td>
                                            <a href="{{ route('cities.edit', $city->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                            <form action="{{ route('cities.destroy', $city->id) }}" method="POST" style="display:inline;">
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
                    <a href="{{ route('cities.create') }}" class="btn btn-success">{{ __('Add City') }}</a>
                    <a href="{{ route('home') }}" class="btn btn-secondary">{{ __('Go back to Home') }}</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
