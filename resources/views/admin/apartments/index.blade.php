@extends('layouts.app')


@section('content')
    <div class="container my-5">
        <a href="{{route('admin.apartments.create')}}" class="btn btn-primary mt-4 mb-4 fw-bold">Create a new Apartment</a>
        <h1 class="mb-5 text-primary fs-1">The list of my Bnb</h1>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Rooms</th>
                    <th scope="col">Beds</th>
                    <th scope="col">Bathrooms</th>
                    <th scope="col">Mq</th>
                    <th scope="col">Address</th>
                    <th scope="col">Lat</th>
                    <th scope="col">Lon</th>
                    <th scope="col">Url Photo</th>
                    <th scope="col">Services</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($apartments as $apart)
                    <tr>
                        <th scope="row">{{ $apart->id }}</th>
                        <td>{{ $apart->name }}</td>
                        <td>{{ $apart->rooms }}</td>
                        <td>{{ $apart->beds }}</td>
                        <td>{{ $apart->bathrooms }}</td>
                        <td>{{ $apart->mq }}</td>
                        <td>{{ $apart->address }}</td>
                        <td>{{ $apart->lat }}</td>
                        <td>{{ $apart->lon }}</td>
                        <td>{{ $apart->photo }}</td>
                        <td>
                            @foreach ($apart->services as $service)
                               <div class="mt-2">{{ $service->name }}</div>
                            @endforeach
                        </td>
                        <td class="d-flex">
                            <a class="btn btn-primary me-2 fw-bold" href="{{route('admin.apartments.show', $apart->id)}}">Detail</a>
                            <a class="btn btn-warning me-2 fw-bold" href="{{route('admin.apartments.edit', $apart->id)}}">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
