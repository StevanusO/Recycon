@extends('website_template')
@section('web-title', 'Login Form')
@section('website-content')
    <div class="content-height d-flex justify-content-center align-items-center">
        <form action="{{ route('login_logic') }}" class="w-50 p-4 rounded" method="POST" enctype="multipart/form-data">
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
            <h1 class="w-100 text-center">Login Form</h1>
            <div class="my-4">
                <div class="form-label">Email</div>
                <input name="email" type="email" placeholder="Input your email" class="form-control">
            </div>
            <div class="mb-4">
                <div class="form-label">Password</div>
                <input name="password" type="password" placeholder="Input your password" class="form-control">
            </div>
            <div class="mb-2 form-check">
                <input name="is_remember" id="is_remember" type="checkbox" class="form-check-input">
                <label class="form-check-label" for="is_remember">Remember Me</label>
            </div>
            <div class="w-100 d-flex justify-content-end mt-4">
                <button type="submit" class="w-25 btn btn-success">Login</button>
            </div>
        </form>
    </div>
@endsection
