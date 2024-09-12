@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">{{ __('Hotels') }}</div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>City</th>
                                    <th>Country</th>
                                    <th>Description</th>
                                    <th>Room Description</th>
                                    <th>Meal Description</th>
                                    <th>Location Description</th>
                                    <th>Beach Description</th>
                                    <th>Address</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Rooms Description</th>
                                    <th>Free Count</th>
                                    <th>Features</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($hotels as $hotel)
                                    <tr>
                                        <td>{{ $hotel->id }}</td>
                                        <td>{{ $hotel->name }}</td>
                                        <td>{{ $hotel->city->name }}</td>
                                        <td>{{ $hotel->country->name }}</td>
                                        <td>{{ $hotel->description }}</td>
                                        <td>{{ $hotel->room_desc }}</td>
                                        <td>{{ $hotel->meal_desc }}</td>
                                        <td>{{ $hotel->location_desc }}</td>
                                        <td>{{ $hotel->beach_desc }}</td>
                                        <td>{{ $hotel->address }}</td>
                                        <td>{{ $hotel->phone }}</td>
                                        <td>{{ $hotel->email }}</td>
                                        <td>{{ $hotel->rooms_desc }}</td>
                                        <td>{{ $hotel->free_count }}</td>
                                        <td>
                                            @foreach($hotel->features as $feature)
                                                <span class="badge badge-info" style="color:black">{{ $feature->name }}</span>
                                            @endforeach
                                        </td>
                                        <td>
                                            <a href="{{ route('hotels.edit', $hotel->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                            <form action="{{ route('hotels.destroy', $hotel->id) }}" method="POST" style="display:inline;">
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
                    <a href="{{ route('hotels.create') }}" class="btn btn-success">{{ __('Add Hotel') }}</a>
                    <a href="{{ route('home') }}" class="btn btn-secondary">{{ __('Go back to Home') }}</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
