@extends('website_template')

@section('web-title', 'Change Password | ' . Auth::user()->username)

@section('website-content')
    <div class="container">
        <div class="m-3 px-3 rounded" style="background-color: rgb(194, 229, 255)">
            <form action="{{ route('change_password_logic') }}" method="POST"enctype="multipart/form-data" class="py-4">
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
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif
                <div class="fw-bold fs-4 py-2 mb-3">Change Password
                </div>
                <div class="container">
                    <input type="number" style="visibility: hidden; display: none;" name="id"
                        value="{{ Auth::user()->id }}">
                    <div class="mb-3">
                        <label for="old" class="fw-bold form-label">Old Password</label>
                        <input type="password" name="old_password" id="old" placeholder="Enter Old Password"
                            class="form-control">
                    </div>
                    <div class="mb-3" class="fw-bold">
                        <label for="new" class="fw-bold form-label">New Password</label>
                        <input name="new_password" id="new" class="form-control" type="password"
                            placeholder="Enter New Password">
                    </div>
                    <div class="mb-3" class="fw-bold">
                        <label for="confirm" class="fw-bold form-label">Confirm Password</label>
                        <input name="confirm_password" id="confirm" class="form-control" type="password"
                            placeholder="Confirm New password">
                    </div>
                    <div class="mt-5 w-100 d-flex justify-content-end">
                        <button class="btn btn-warning fw-bold" type="submit">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
