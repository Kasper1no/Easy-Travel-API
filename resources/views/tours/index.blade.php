@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">{{ __('Tours') }}</div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Country</th>
                                    <th>City</th>
                                    <th>Hotel</th>
                                    <th>Persons</th>
                                    <th>Transport</th>
                                    <th>Price</th>
                                    <th>From</th>
                                    <th>To</th>
                                    <th>Visa</th>
                                    <th>Insurance</th>
                                    <th>Transfer</th>
                                    <th>Img</th>
                                    <th>Images</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($tours as $tour)
                                    <tr>
                                        <td>{{ $tour->id }}</td>
                                        <td>{{ $tour->name }}</td>
                                        <td>{{ $tour->description }}</td>
                                        <td>{{ $tour->country->name }}</td>
                                        <td>{{ $tour->city->name }}</td>
                                        <td>{{ $tour->hotel->name }}</td>
                                        <td>{{ $tour->count_persons }}</td>
                                        <td>{{ $tour->transport }}</td>
                                        <td>{{ $tour->price }} $</td>
                                        <td>{{ $tour->time_from }}</td>
                                        <td>{{ $tour->time_to }}</td>
                                        <td>{{ $tour->visa }}</td>
                                        <td>{{ $tour->insurance }}</td>
                                        <td>{{ $tour->transfer }}</td>
                                        <td>{{ $tour->img }}</td>
                                        <td>
                                            @foreach($tour->images as $image)
                                                <p>{{ $image->name }}</p>
                                            @endforeach
                                        </td>
                                        <td>
                                            <a href="{{ route('tours.edit', $tour->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                            <form action="{{ route('tours.destroy', $tour->id) }}" method="POST" style="display:inline;">
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
                    <a href="{{ route('tours.create') }}" class="btn btn-success">{{ __('Add Tour') }}</a>
                    <a href="{{ route('home') }}" class="btn btn-secondary">{{ __('Go back to Home') }}</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
