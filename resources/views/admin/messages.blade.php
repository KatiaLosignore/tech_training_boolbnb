@extends('layouts.app')


@section('content')
    <div class="p-3">
        <h1 class="mt-3 mb-5 fs-1 text-primary">My Messages</h1>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Lastname</th>
                    <th scope="col">Email</th>
                    <th scope="col">Text</th>
                    <th scope="col">Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($messages as $message)
                    <tr>
                        <th scope="row">{{ $message->id }}</th>
                        <td>{{ $message->name }}</td>
                        <td>{{ $message->lastname }}</td>
                        <td>{{ $message->email }}</td>
                        <td>{{ $message->text }}</td>
                        <td class="form-date">{{ $message->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
