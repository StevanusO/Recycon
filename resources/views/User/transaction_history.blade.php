@extends('website_template')

@section('web-title', 'My Transaction')
@section('website-content')

    {{-- $th --}}
    <div class="container">
        <div class="fs-3 mt-2 mb-2">
            My History Transaction
        </div>
        @if (count($th) < 1)
            <div class="fs-5 d-flex justify-content-center align-items-center" style="height: 90vh">
                Transaction History is empty! Let's go Shopping :)
            </div>
        @else
            @foreach ($th as $head)
                <div class="accordion accordion-flush">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-heading{{ $loop->index + 1 }}">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapse{{ $loop->index + 1 }}" aria-expanded="false"
                                aria-controls="flush-collapse{{ $loop->index + 1 }}">
                                {{ $head->created_at->toDateString() }}
                            </button>
                        </h2>
                        <div id="flush-collapse{{ $loop->index + 1 }}" class="accordion-collapse collapse"
                            aria-labelledby="flush-heading{{ $loop->index + 1 }}">
                            <div class="accordion-body">
                                <table class="table my-2 table-hover table-bordered text-center">
                                    <thead>
                                        <tr class="table-primary">
                                            <th scope="col">No</th>
                                            <th scope="col">Item Image</th>
                                            <th scope="col">Item Name</th>
                                            <th scope="col">Item Price</th>
                                            <th scope="col">Quantity</th>
                                            <th scope="col">Total Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <div style="visibility: hidden; display:none;">{{ $total = 0 }}</div>
                                        <div style="visibility: hidden; display:none;">{{ $count = 0 }}</div>
                                        @foreach ($head->transaction_has_detail as $data)
                                            <tr>
                                                {{-- No --}}
                                                <th scope="row">{{ $loop->index + 1 }}</th>
                                                <div style="visibility: hidden; display:none;">
                                                    {{ $count = $loop->index + 1 }}
                                                </div>

                                                {{-- Item image --}}
                                                <td><img src="{{ asset('storage/upload_images/' . $data->transaction_detail_has_item->image) }}"
                                                        alt="{{ $data->transaction_detail_has_item->name }}"
                                                        style="width: 100px; height:100px;">
                                                </td>

                                                {{-- Item Name --}}
                                                <td>{{ $data->transaction_detail_has_item->name }}</td>

                                                {{-- Item Price --}}
                                                <td>IDR.{{ $data->transaction_detail_has_item->price }}</td>

                                                {{-- Item Quantity --}}
                                                <td>{{ $data->qty }}</td>

                                                {{-- Total Price --}}
                                                <td>IDR.{{ $data->transaction_detail_has_item->price * $data->qty }}</td>
                                            </tr>
                                            <div style="visibility: hidden; display: none">
                                                {{ $total = $total + $data->transaction_detail_has_item->price * $data->qty }}
                                            </div>
                                        @endforeach
                                    </tbody>
                                    <div class="w-100">
                                        <caption class="fw-bold text-dark text-end pe-2"
                                            style="background-color: rgb(213, 223, 255)">
                                            Grand Total: IDR. {{ $total }}
                                        </caption>
                                    </div>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
@endsection
