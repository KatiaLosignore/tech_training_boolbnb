@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="fs-1 text-secondary my-4">
        {{ __('My BoolBnb') }}
    </h2>
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                {{-- <div class="card-header">{{ __('User Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div> --}}
            </div>

            <div class="fs-3 my-5 py-3 text-center">
                <button class="rounded-5 text-secondary py-2 px-4">
                    <a href="{{ route('admin.apartments.index') }}"  class="nav-link active" aria-current="page">
                            <strong>Click here to Login</strong>
                    </a>
                </button>
            </div>

            </div>
    </div>
</div>
@endsection
