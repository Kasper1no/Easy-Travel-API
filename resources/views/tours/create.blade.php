@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Create Tour') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('tours.store') }}">
                        @csrf

                        <div class="form-group">
                            <label for="name">{{ __('Name') }}</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="description">{{ __('Description') }}</label>
                            <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description" required>{{ old('description') }}</textarea>
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="id_hotel">{{ __('Hotel') }}</label>
                            <select id="id_hotel" class="form-control @error('id_hotel') is-invalid @enderror" name="id_hotel" required>
                                <option value="">Select Hotel</option>
                                @foreach($hotels as $hotel)
                                    <option value="{{ $hotel->id }}">{{ $hotel->name }}</option>
                                @endforeach
                            </select>
                            @error('id_hotel')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="count_persons">{{ __('Capacity') }}</label>
                            <input id="count_persons" type="number" class="form-control @error('count_persons') is-invalid @enderror" name="count_persons" value="{{ old('count_persons') }}" required>
                            @error('count_persons')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="transport">{{ __('Transport') }}</label>
                            <select id="transport" class="form-control @error('transport') is-invalid @enderror" name="transport" required>
                                <option value="">Select Transport</option>
                                <option value="car">Flight</option>
                                <option value="bus">Bus</option>
                                <option value="train">Train</option>
                                <!-- Add more options as needed -->
                            </select>
                            @error('transport')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="price">{{ __('Price') }}</label>
                            <input id="price" type="number" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}" required>
                            @error('price')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="time_from">{{ __('From') }}</label>
                            <input id="time_from" type="date" class="form-control @error('time_from') is-invalid @enderror" name="time_from" required>
                            @error('time_from')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="time_to">{{ __('To') }}</label>
                            <input id="time_to" type="date" class="form-control @error('time_to') is-invalid @enderror" name="time_to" required>
                            @error('time_to')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="visa">{{ __('Visa') }}</label>
                            <select id="visa" class="form-control @error('visa') is-invalid @enderror" name="visa" required>
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                            @error('visa')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="insurance">{{ __('Insurance') }}</label>
                            <select id="insurance" class="form-control @error('insurance') is-invalid @enderror" name="insurance" required>
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                            @error('insurance')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="transfer">{{ __('Transfer') }}</label>
                            <select id="transfer" class="form-control @error('transfer') is-invalid @enderror" name="transfer" required>
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                            @error('transfer')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="img">{{ __('Image') }}</label>
                            <input id="img" type="file" class="form-control @error('img') is-invalid @enderror" name="img" required>
                            @error('img')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="images">{{ __('Additional Images') }}</label>
                            <select id="images" class="form-control @error('images') is-invalid @enderror" name="images[]" multiple>
                                @foreach($pictures as $picture)
                                    <option value="{{ $picture->id }}">{{ $picture->name }}</option>
                                @endforeach
                            </select>
                            @error('images')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">{{ __('Create') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

<script>
    $(document).ready(function() {
        $('#images').select2({
            placeholder: 'Select Additional Images',
            allowClear: true,
            width: '100%'
        });
    });

    $('#img').on('change', function() {
        dd(this);
    });
</script>