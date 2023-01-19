@extends('website_template')
@section('web-title', 'Update Qty | ' . $item->name)

@section('website-content')
    <div class="card w-75 m-3">
        <div class="container text-center fw-bold fs-4 mb-4">Update Quantity</div>
        <div class="row g-0">
            <div class="col-md-4">
                <img src="{{ asset('storage/upload_images/' . $item->image) }}" class="img-fluid rounded-start"
                    alt="{{ $item->name }}-img">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <input type="text" name="item_id" value="{{ $item->primary_id }}"
                        style="visibility: hidden; display: none">
                    <h2 class="card-title">{{ $item->name }}</h2>
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
                    <form action="{{ route('cart_logic') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="text" name="item_id" value="{{ $item->primary_id }}"
                            style="visibility: hidden; display: none;">
                        <div class="row g-3 align-items-center">
                            <div class="col-auto">
                                <label for="qty" class="col-form-label">Qty:</label>
                            </div>
                            <div class="col-auto">
                                <input type="number" value="{{ $cart_detail->qty }}" name="Qty" id="qty"
                                    class="form-control">
                            </div>
                            <div class="col-auto">
                                <button href="#" class="btn btn-warning fw-bold" type="submit">Update</button>
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
                </div>
            </div>
        </div>
    </div>
@endsection
