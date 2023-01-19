@extends('website_template')
@section('web-title', 'Search|' . $temp)

@section('website-content')
    <div class="container">
        <div>
            <div class="my-2 rounded text-center py-3 fs-5 fw-bold">Search result: {{ $temp }}</div>
        </div>
        @if (count($items) < 1)
            <h4>No Products Available</h4>
        @else
            <div class="card-group d-flex gap-4 my-3">
                @foreach ($items as $item)
                    <div class="card rounded">
                        <img src="{{ asset('storage/upload_images/' . $item->image) }}" class="card-img-top rounded-top"
                            alt="{{ $item->name }}">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5>{{ $item->name }}</h5>
                                <h6>{{ $item->category }}</h6>
                            </div>
                            <p class="card-text">IDR. {{ $item->price }}</p>
                            <a class="btn btn-warning" href="{{ Route('item_detail_logic', ['id' => $item->primary_id]) }}">
                                Detail Product
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="pagination justify-content-center">
                {{ $items->links() }}
            </div>
        @endif
    </div>
@endsection
