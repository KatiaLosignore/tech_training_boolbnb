@extends('layouts.home')

@section('content')

    <form method="POST" action="{{ route('admin.apartments.update' , ['apartment' => $apartment->id]) }}" enctype="multipart/form-data">

        @csrf
        @method('PUT')

        {{-- <div class="mb-3 mt-3">
            <label for="user_id" class="form-label fw-bold">Select User</label>
            <select class="form-select @error('user_id') is-invalid @enderror" name="user_id" id="user_id">
                <option @selected(old('user_id', $apartment->user_id)=='') value="">No User</option>
                @foreach ($users as $user)
                    <option @selected(old('user_id',  $apartment->user_id)==$user->id) value="{{$user->id}}">{{$user->name}} {{$user->surname}}</option>
                @endforeach
            </select>
            @error('user_id')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div> --}}
        <div class="mb-3 mt-4">
            <label for="name" class="form-label fw-bold">Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror " id="name" name="name" value="{{old('name', $apartment->name)}}">
            @error('name')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="rooms" class="form-label fw-bold">Rooms</label>
            <input type="number" class="form-control @error('rooms') is-invalid @enderror " min="1" max="20" id="rooms" name="rooms" value="{{old('rooms', $apartment->rooms)}}">
            @error('rooms')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="beds" class="form-label fw-bold">Beds</label>
            <input type="number" class="form-control @error('beds') is-invalid @enderror " min="1" max="20" id="beds" name="beds" value="{{old('beds', $apartment->beds)}}">
            @error('beds')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="bathrooms" class="form-label fw-bold">Bathrooms</label>
            <input type="number" class="form-control @error('bathrooms') is-invalid @enderror " min="1" max="20" id="bathrooms" name="bathrooms" value="{{old('bathrooms', $apartment->bathrooms)}}">
            @error('bathrooms')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="mq" class="form-label fw-bold">Mq</label>
            <input type="number" class="form-control @error('mq') is-invalid @enderror " min="1"  id="mq" name="mq" value="{{old('mq', $apartment->mq)}}">
            @error('mq')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="address" class="form-label fw-bold">Address</label>
            <input type="text" class="form-control @error('address') is-invalid @enderror " id="address" name="address" value="{{old('address', $apartment->address)}}">
            @error('address')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="lat" class="form-label fw-bold">Lat</label>
            <input type="text" class="form-control @error('lat') is-invalid @enderror "  id="lat" name="lat" value="{{old('lat', $apartment->lat)}}" placeholder="Inserisci la latitudine">
            @error('lat')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="lon" class="form-label fw-bold">Lon</label>
            <input type="text" class="form-control @error('lon') is-invalid @enderror " id="lon" name="lon" value="{{old('lon', $apartment->lon)}}" placeholder="Inserisci la longitudine">
            @error('lon')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="photo" class="form-label fw-bold">Select image</label>


            <div class="my-img-wrapper">
               @if(Str::startsWith($apartment->photo, 'https://'))
                    <img src="{{$apartment->photo }}" class="my-img-thumb" alt="url photo">
               @elseif ($apartment->photo)
                    <img class="img-thumbnail my-img-thumb" src="{{asset('storage/' . $apartment->photo)}}" alt="{{$apartment->name}}"/>
                    <div id="btn-delete" class="my-img-delete btn btn-danger">X</div>
                @endif
            </div>


            <input type="file" class="form-control @error('photo') is-invalid @enderror " id="photo" name="photo">

            @error('photo')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>

        <div class="mb-3"> <strong>Services:</strong> <br>
            @foreach($services as $service)
                @if ($errors->any())
                    <input id="tag_{{$service->id}}" @if (in_array($service->id , old('services', []))) checked @endif type="checkbox" name="services[]" value="{{$service->id}}">
                @else
                    <input id="tag_{{$service->id}}" @if ($apartment->services->contains($service->id)) checked @endif type="checkbox" name="services[]" value="{{$service->id}}">
                @endif

                <label for="tag_{{$service->id}}" class="form-label">{{$service->name}}</label>
                <br>
            @endforeach

            @error('services')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary mb-5 fw-bold">Save</button>

    </form>

    <button class="rounded-2 text-secondary py-2 px-2 mb-3">
        <a href="{{ route('admin.apartments.index') }}"  class="nav-link active" aria-current="page">
                <strong class="fs-6">Back</strong>
        </a>
    </button>

    <form id="form-delete" action="{{route('admin.apartments.deleteImage', ['id' => $apartment->id])}}" method="POST">
        @csrf
        @method('DELETE')

    </form>


@endsection
