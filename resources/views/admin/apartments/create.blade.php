@extends('layouts.home')


@section('content')

<form method="POST" action="{{ route('admin.apartments.store') }}" enctype="multipart/form-data">

    @csrf

    {{-- <div class="mb-3 mt-5">
        <label for="user_id" class="form-label fw-bold">Select User</label>
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
    </div> --}}
    <div class="mb-3 mt-4">
        <label for="name" class="form-label fw-bold">Name</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror " id="name" name="name" value="{{old('name')}}">
        @error('name')
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="rooms" class="form-label fw-bold">Rooms</label>
        <input type="number" class="form-control @error('rooms') is-invalid @enderror " min="1" max="20" id="rooms" name="rooms" value="{{old('rooms')}}">
        @error('rooms')
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="beds" class="form-label fw-bold">Beds</label>
        <input type="number" class="form-control @error('beds') is-invalid @enderror " min="1" max="20" id="beds" name="beds" value="{{old('beds')}}">
        @error('beds')
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="bathrooms" class="form-label fw-bold">Bathrooms</label>
        <input type="number" class="form-control @error('bathrooms') is-invalid @enderror " min="1" max="20" id="bathrooms" name="bathrooms" value="{{old('bathrooms')}}">
        @error('bathrooms')
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="mq" class="form-label fw-bold">Mq</label>
        <input type="number" class="form-control @error('mq') is-invalid @enderror " min="1" id="mq" name="mq" value="{{old('mq')}}">
        @error('mq')
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
    </div>

    <!-- Address -->
    <div class="mb-3">
        <label for="address" class="form-label fw-bold">Address</label>
        <input type="text" class="form-control @error('address') is-invalid @enderror " id="address" name="address" value="{{old('address')}}">
        @error('address')
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
        <ul id="locations" class="d-none list group"></ul>

        <!-- Latitude (hidden) -->
        <input type="hidden" class="form-control @error('lat') is-invalid @enderror " id="lat" name="lat" value="{{old('lat')}}">
        @error('lat')
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror

        <!-- Latitude (hidden) -->
        <input type="hidden" class="form-control @error('lon') is-invalid @enderror " id="lon" name="lon" value="{{old('lon')}}">
        @error('lon')
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror

    </div>
    <!-- Fine Address -->

    <div class="mb-3">
        <label for="photo" class="form-label fw-bold">Select image</label>

        <input type="file" class="form-control @error('photo') is-invalid @enderror " id="photo" name="photo">
        @error('photo')
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
    </div>

    <div class="mb-3"> <strong>Services:</strong> <br>
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

    <button type="submit" class="btn btn-primary mb-5 fw-bold">Save</button>


</form>

<button class="rounded-2 text-secondary py-2 px-2 mb-3">
    <a href="{{ route('admin.apartments.index') }}"  class="nav-link active" aria-current="page">
            <strong class="fs-6">Back</strong>
    </a>
</button>




<!-- importo la CDN di axios -->
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<script>
    const addressDOMElement = document.getElementById('address');
    const latitudeDOMElement = document.getElementById('lat');
    const longitudeDOMElement = document.getElementById('lon');
    const locationsDOMElement = document.getElementById('locations');
    let timer;

    addressDOMElement.addEventListener('keyup', (event) => {
        clearTimeout(timer);
        timer = setTimeout( () => {
            callApi();
        }, 500);
    });

    function callApi() {
        if(addressDOMElement.value.length >= 5) {
            const params = new URLSearchParams({
                location: address.value
            });
            const url = '/api/geodata?' + params.toString();
            axios.get(url).then( response => {
                console.log(response.data);
                createLocationsList(response.data);
            });
        }
    }

    function createLocationsList(locations) {
        locationsDOMElement.innerHTML = '';
        locationsDOMElement.classList.remove('d-none');

        locations.forEach( location => {
            const listItemDOMElement = document.createElement('li');
            listItemDOMElement.classList.add('list-group-item');
            listItemDOMElement.setAttribute('role', 'button');

            listItemDOMElement.innerText = location.address;

            listItemDOMElement.addEventListener('click', () => {
                latitudeDOMElement.value = location.position.lat;
                longitudeDOMElement.value = location.position.lon;
                addressDOMElement.value = location.address;
                locationsDOMElement.classList.add('d-none');
                locationsDOMElement.innerHTML = '';
            });

            locationsDOMElement.append(listItemDOMElement);
        });
    }

</script>
@endsection
