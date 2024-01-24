@extends('layouts.app')


@section('content')

<form method="POST" action="{{ route('admin.apartments.store') }}" enctype="multipart/form-data">

    @csrf

    <div class="mb-3">
        <label for="user_id" class="form-label">Select User</label>
        <select class="form-select @error('user_id') is-invalid @enderror" name="user_id" id="user_id">
            <option @selected(old('user_id')=='') value="">No User</option>
            @foreach ($users as $user)
                <option @selected(old('user_id')==$user->id) value="{{$user->id}}">{{$user->name}} {{$user->surname}}</option>
            @endforeach
        </select>
        @error('user_id')
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror " id="name" name="name" value="{{old('name')}}">
        @error('name')
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="rooms" class="form-label">Rooms</label>
        <input type="number" class="form-control @error('rooms') is-invalid @enderror " min="1" max="20" id="rooms" name="rooms" value="{{old('rooms')}}">
        @error('rooms')
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="beds" class="form-label">Beds</label>
        <input type="number" class="form-control @error('beds') is-invalid @enderror " min="1" max="20" id="beds" name="beds" value="{{old('beds')}}">
        @error('beds')
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="bathrooms" class="form-label">Bathrooms</label>
        <input type="number" class="form-control @error('bathrooms') is-invalid @enderror " min="1" max="20" id="bathrooms" name="bathrooms" value="{{old('bathrooms')}}">
        @error('bathrooms')
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="mq" class="form-label">Mq</label>
        <input type="number" class="form-control @error('mq') is-invalid @enderror " min="1"  id="mq" name="mq" value="{{old('mq')}}">
        @error('mq')
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="address" class="form-label">Address</label>
        <input type="text" class="form-control @error('address') is-invalid @enderror " id="address" name="address" value="{{old('address')}}">
        @error('address')
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="lat" class="form-label">Lat</label>
        <input type="text" class="form-control @error('lat') is-invalid @enderror "  id="lat" name="lat" value="{{old('lat')}}" placeholder="Inserisci la latitudine">
        @error('lat')
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="lon" class="form-label">Lon</label>
        <input type="text" class="form-control @error('lon') is-invalid @enderror " id="lon" name="lon" value="{{old('lon')}}" placeholder="Inserisci la longitudine">
        @error('lon')
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="photo" class="form-label">Select image</label>

        <input type="file" class="form-control @error('photo') is-invalid @enderror " id="photo" name="photo">
        @error('photo')
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
    </div>

    <div class="mb-3">
        @foreach($services as $service)
            <input id="tag_{{$service->id}}" @if (in_array($service->id , old('services', []))) checked @endif type="checkbox" name="services[]" value="{{$service->id}}">
            <label for="tag_{{$service->id}}" class="form-label">{{$service->name}}</label>
            <br>
        @endforeach
        @error('services')
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Salva</button>

</form>

@endsection
