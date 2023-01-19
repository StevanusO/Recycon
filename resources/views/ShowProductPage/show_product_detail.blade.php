@extends('website_template')
@section('web-title', 'Detail | ' . $items->name)

@section('website-content')
    <div class="card w-75 m-3">
        {{-- @foreach ($items as $data)
            <div>{{ $data->name }}</div>
        @endforeach --}}
        {{-- <div>{{ $items->name }}</div> --}}


        {{-- <div>{{ $items->id }}</div>
        <div>{{ $items->name }}</div> --}}
        <div class="row g-0">
            <div class="col-md-4">
                <img src="{{ asset('storage/upload_images/' . $items->image) }}" class="img-fluid rounded-start"
                    alt="{{ $items->name }}-img">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h2 class="card-title">{{ $items->name }}</h2>
                    <hr class="border border-dark border-2 opacity-100">
                    <h3 class="card-title">Category</h3>
                    <p class="card-text">{{ $items->category }}</p>
                    <hr class="border border-dark border-2 opacity-100">
                    <h3 class="card-title">Price</h3>
                    <p class="card-text">IDR.{{ $items->price }}</p>
                    <hr class="border border-dark border-2 opacity-100">
                    <h3 class="card-title">Description</h3>
                    <p class="card-text">{{ $items->description }}</p>
                    <hr class="border border-dark border-2 opacity-100">
                    @if (Auth::user() != null)
                        @if (Auth::user()->is_admin == false)
                            <form action="{{ route('cart_logic') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="text" name="item_id" value="{{ $items->primary_id }}"
                                    style="visibility: hidden; display: none;">
                                <div class="row g-3 align-items-center">
                                    <div class="col-auto">
                                        <label for="qty" class="col-form-label">Qty:</label>
                                    </div>
                                    <div class="col-auto">
                                        <input type="number" name="Qty" id="qty" class="form-control">
                                    </div>
                                    <div class="col-auto">
                                        <button href="#" class="btn btn-warning fw-bold" type="submit">Add to
                                            Cart</button>

                                    </div>
                                </div>
                            </form>
                            @if ($errors->any())
                                <div class="alert alert-danger mt-2">
                                    <ul>
                                        @foreach ($errors->all() as $message)
                                            <li>{{ $message }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
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
