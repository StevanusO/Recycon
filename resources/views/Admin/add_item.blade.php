@extends('website_template')


@section('web-title', 'Add Item')
@section('website-content')
    <div class="container">
        <div class="m-3 px-3 rounded" style="background-color: rgb(194, 229, 255)">
            <form action="{{ route('add_item_logic') }}" method="POST"enctype="multipart/form-data" class="py-4">
                @csrf
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $message)
                                <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="fw-bold fs-4 py-2 mb-3">Add New Item
                </div>
                <div class="container">
                    <div class="d-flex gap-5">
                        <div class="mb-3">
                            <label for="item_id" class="fw-bold form-label">Item ID</label>
                            <input type="text" name="item_id" id="item_id" placeholder="Enter item ID"
                                class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="price" class="fw-bold form-label">Item Price</label>
                            <input type="number" name="item_price" id="price" placeholder="Enter item Price"
                                class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="cat" class="fw-bold form-label">Item Category</label>
                            <select name="item_category" id="cat" class="form-select">
                                <option value="#######" disabled selected>Choose One</option>
                                <option value="Recycle">Recycle</option>
                                <option value="Second">Second</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="name" class="fw-bold form-label">Item Name</label>
                        <input type="text" name="item_name" id="name" placeholder="Enter item name"
                            class="form-control">
                    </div>
                    <div class="mb-3" class="fw-bold">
                        <label for="desc" class="fw-bold form-label">Item Description</label>
                        <textarea name="item_description" id="desc" class="form-control" placeholder="Enter item Description"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="img" class="fw-bold form-label">Image File Upload</label>
                        <input type="file" name="image" id="img" placeholder="Upload Image" class="form-control">
                    </div>
                    <div class="mt-5 w-100 d-flex justify-content-end">
                        <button class="btn btn-warning fw-bold" type="submit">Add Item</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
