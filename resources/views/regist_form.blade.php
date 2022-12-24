@extends('website_template')
@section('web-title', 'Register Form')

@section('website-content')
    <div class="content-height justify-content-center align-items-center d-flex">
        <form action="{{ route('register_logic') }}" method="POST" class="w-50 p-4 rounded" enctype="multipart/form-data">
            @csrf

            {{-- code error dari dokumentasi laravel --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $message)
                            <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <h1 class="w-100 text-center">Register Form</h1>
            <div class="my-4">
                <div class="form-label">Full Name</div>
                <input name="Username" type="text" placeholder="Input your full name" class="form-control">
            </div>
            <div class="mb-4">
                <div class="form-label">Email</div>
                <input name="Email_Address" type="email" placeholder="Input your email" class="form-control">
            </div>
            <div class="mb-4">
                <div class="form-label">Password</div>
                <input name="Password" type="password" placeholder="Input your password" class="form-control">
            </div>
            <div class="mb-4">
                <div class="form-label">Confirm Password</div>
                <input name="Confirm_Password" type="password" placeholder="Input your password again" class="form-control">

                <div class="w-100 d-flex justify-content-end mt-4">
                    <button type="submit" class="w-25 btn btn-warning">Register Now</button>
                </div>
            </div>
        </form>
    </div>
@endsection
