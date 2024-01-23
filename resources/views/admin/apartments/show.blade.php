@extends('layouts.app')


@section('content')

<div class="container mt-5">
    <h1 class="text-primary text-center mb-5 fw-bold">Detail Bnb</h1>
    <div class="card mb-3 rounded-3">
        <img src="{{ $apartment->photo}}" class="card-img-top" alt="logo">
        <div class="card-body">
          <h3 class="card-title fw-bold text-primary mb-4">Name: {{ $apartment->name }}</h3>
          <h5 class="fw-bold text-secondary">ID: {{ $apartment->id}}</h5>
          <h5 class="fw-bold text-secondary">Rooms: {{ $apartment->rooms}}</h5>
          <h5 class="fw-bold text-secondary">Beds: {{ $apartment->beds}}</h5>
          <h5 class="fw-bold text-secondary">Bathrooms: {{ $apartment->bathrooms}}</h5>
          <h5 class="fw-bold text-secondary">Mq: {{ $apartment->mq}}</h5>
          <h5 class="card-text fw-bold text-secondary">Address: {{ $apartment->address}}</h5>
          <h5 class="card-text fw-bold text-secondary">Lat: {{ $apartment->lat}}</h5>
          <h5 class="card-text fw-bold text-secondary">Lon: {{ $apartment->lon}}</h5>
          <button class="rounded-2 text-secondary py-2 px-4 mt-5">
            <a href="{{ route('admin.apartments.index') }}"  class="nav-link active" aria-current="page">
                    <strong class="fs-6">Back</strong>
            </a>
        </button>
        </div>
      </div>
    </div>

</div>
@endsection







