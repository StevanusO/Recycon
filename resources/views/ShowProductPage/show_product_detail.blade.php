@extends('website_template')
@section('web-title', 'Detail | ' . $item->name)

@section('website-content')
    <div class="card w-75 m-3">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="{{ asset($item->image) }}" class="img-fluid rounded-start" alt="{{ $item->name }}-img">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h2 class="card-title">{{ $item->name }}</h5>
                        <hr class="border border-dark border-2 opacity-100">
                        <h3 class="card-title">Category</h3>
                        <p class="card-text">{{ $item->category }}</p>
                        <hr class="border border-dark border-2 opacity-100">
                        <h3 class="card-title">Price</h3>
                        <p class="card-text">IDR.{{ $item->price }}</p>
                        <hr class="border border-dark border-2 opacity-100">
                        <h3 class="card-title">Description</h3>
                        <p class="card-text">{{ $item->description }}</p>
                        <hr class="border border-dark border-2 opacity-100">
                        @if (Auth::user() != null)
                            @if (Auth::user()->is_admin == false)
                                <a href="#" class="btn btn-warning">Add to Cart</a>
                            @endif
                        @else
                            <a href="{{ Route('display_login_form_view') }}" class="btn btn-warning text-dark fw-bold">Login
                                to Buy</a>
                        @endif
                </div>
            </div>
        </div>
    </div>
@endsection
