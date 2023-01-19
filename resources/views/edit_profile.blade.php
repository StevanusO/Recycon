@extends('website_template')

@section('web-title', 'Edit Profile | ' . Auth::user()->username)

@section('website-content')
    <div class="container">
        <div class="m-3 px-3 rounded" style="background-color: rgb(194, 229, 255)">
            <form action="{{ route('edit_profile_logic') }}" method="POST"enctype="multipart/form-data" class="py-4">
                @csrf
                @method('patch')
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $message)
                                <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="fw-bold fs-4 py-2 mb-3">Edit Profile
                </div>
                <div class="container">
                    <div class="mb-3">
                        <label for="name" class="fw-bold form-label">New Username</label>
                        <input type="text" name="data_username" id="name" placeholder="Enter new name"
                            class="form-control" value="{{ Auth::user()->username }}">
                    </div>
                    <div class="mb-3" class="fw-bold">
                        <label for="email" class="fw-bold form-label">New Email</label>
                        <input name="data_email" id="email" class="form-control" type="text"
                            value="{{ Auth::user()->email }}">
                    </div>
                    <div class="mt-5 w-100 d-flex justify-content-end">
                        <button class="btn btn-warning fw-bold" type="submit">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
