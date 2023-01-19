@extends('website_template')

@section('web-title', 'My Cart')
@section('website-content')
    <div class="container">
        <div class="fs-3 mt-2">
            My Cart
        </div>
        @if ($cart == null)
            <div class="fs-5 d-flex justify-content-center align-items-center" style="height: 90vh">
                Cart is empty! Let's go Shopping :)
            </div>
        @else
            @if (count($cart->cart_has_detail) < 1)
                <div class="fs-5 d-flex justify-content-center align-items-center" style="height: 90vh">
                    Cart is empty! Let's go Shopping :)
                </div>
            @else
                <table class="table my-2 table-hover table-bordered text-center">
                    <thead>
                        <tr class="table-primary">
                            <th scope="col">No</th>
                            <th scope="col">Item Image</th>
                            <th scope="col">Item Name</th>
                            <th scope="col">Item Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total Price</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <div style="visibility: hidden; display:none;">{{ $total = 0 }}</div>
                        <div style="visibility: hidden; display:none;">{{ $count = 0 }}</div>
                        @foreach ($cart->cart_has_detail as $item)
                            <tr>
                                {{-- No --}}
                                <th scope="row">{{ $loop->index + 1 }}</th>
                                <div style="visibility: hidden; display:none;">{{ $count = $loop->index + 1 }}</div>

                                {{-- Item image --}}
                                <td><img src="{{ asset('storage/upload_images/' . $item->cart_detail_belongs_item->image) }}"
                                        alt="{{ $item->cart_detail_belongs_item->name }}"
                                        style="width: 100px; height:100px;">
                                </td>

                                {{-- Item Name --}}
                                <td>{{ $item->cart_detail_belongs_item->name }}</td>

                                {{-- Item Price --}}
                                <td>IDR.{{ $item->cart_detail_belongs_item->price }}</td>

                                {{-- Item Quantity --}}
                                <td>{{ $item->qty }}</td>

                                {{-- Total Price --}}
                                <td>IDR.{{ $item->cart_detail_belongs_item->price * $item->qty }}</td>
                                <td>
                                    <div class="d-flex">

                                        <form
                                            action="{{ route('display_update_cart_item_form', ['id' => $item->item_id]) }}"
                                            method="GET">
                                            <button class="btn btn-warning text-black fw-bold" type="submit">Update</a>
                                        </form>
                                        <form
                                            action="{{ route('delete_item_cart_detail_logic', ['id' => $item->item_id]) }}"
                                            method="POST">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger text-white fw-bold" type="submit">Delete</a>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            <div style="visibility: hidden; display: none">
                                {{ $total = $total + $item->cart_detail_belongs_item->price * $item->qty }}
                            </div>
                        @endforeach
                    </tbody>
                    <caption class="fw-bold text-dark fs-5">
                        Grand Total: IDR. {{ $total }}
                    </caption>
                </table>
                <div class="container mb-5">
                    <p class="fs-3 fw-bold">Receiver</p>
                    <form action="{{ route('insert_transaction_history_logic') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="receiver_name" placeholder="Enter Receiver Name"
                                value="{{ Auth::user()->username }}" name="receiver_name">
                            <label for="receiver_name">Receiver Name</label>
                        </div>
                        <div class="form-floating">
                            <textarea class="form-control" id="receiver_address" rows="2" cols="2" name="receiver_address"></textarea>
                            <label for="receiver_address">Receiver Address</label>
                        </div>
                        <div>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $message)
                                            <li>{{ $message }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-warning mt-3 fw-bold">Checkout
                            ({{ $count }})</button>
                    </form>
                </div>
            @endif
        @endif
    </div>
@endsection
