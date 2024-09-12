@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create Hotel') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('hotels.store') }}">
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
                            <label for="city">{{ __('City') }}</label>
                            <select id="city" class="form-control @error('city') is-invalid @enderror" name="city" required>
                                <option value="">Select City</option>
                                @foreach($cities as $city)
                                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                                @endforeach
                            </select>
                            @error('city')
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
                            <label for="room_desc">{{ __('Room Description') }}</label>
                            <textarea id="room_desc" class="form-control" name="room_desc">{{ old('room_desc') }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="meal_desc">{{ __('Meal Description') }}</label>
                            <textarea id="meal_desc" class="form-control" name="meal_desc">{{ old('meal_desc') }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="location_desc">{{ __('Location Description') }}</label>
                            <textarea id="location_desc" class="form-control" name="location_desc">{{ old('location_desc') }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="beach_desc">{{ __('Beach Description') }}</label>
                            <textarea id="beach_desc" class="form-control" name="beach_desc">{{ old('beach_desc') }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="address">{{ __('Address') }}</label>
                            <input id="address" type="text" class="form-control" name="address" value="{{ old('address') }}">
                        </div>

                        <div class="form-group">
                            <label for="phone">{{ __('Phone') }}</label>
                            <input id="phone" type="text" class="form-control" name="phone" value="{{ old('phone') }}">
                        </div>

                        <div class="form-group">
                            <label for="email">{{ __('Email') }}</label>
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">
                        </div>

                        <div class="form-group">
                            <label for="rooms_desc">{{ __('Rooms Description') }}</label>
                            <textarea id="rooms_desc" class="form-control" name="rooms_desc">{{ old('rooms_desc') }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="free_count">{{ __('Free Count') }}</label>
                            <input id="free_count" type="number" class="form-control" name="free_count" value="{{ old('free_count') }}">
                        </div>

                        <div class="form-group">
                            <label for="features">{{ __('Features') }}</label>
                            <select id="features" class="form-control" name="features[]" multiple>
                                @foreach($features as $feature)
                                    <option value="{{ $feature->id }}">{{ $feature->name }}</option>
                                @endforeach
                            </select>
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
    $('#features').select2({
        placeholder: 'Select Features',
        allowClear: true,
        width: '100%'
    });
});

</script>