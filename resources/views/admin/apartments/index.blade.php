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
                        <td class="d-flex bg-white">
                            <a class="btn btn-primary me-2 fw-bold" href="{{route('admin.apartments.show', $apart->id)}}">Detail</a>
                            <a class="btn btn-warning me-2 fw-bold text-white" href="{{route('admin.apartments.edit', $apart->id)}}">Edit</a>

                            <form class="form_delete_apartment" action="{{route('admin.apartments.destroy', ['apartment' => $apart->id])}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger fw-bold">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>


        <div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Conferma eliminazione</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Confermi di voler eliminare l'elemento selezionato?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger me-5">Conferma eliminazione</button>
                </div>
                </div>
            </div>
        </div>

    </div>
@endsection
