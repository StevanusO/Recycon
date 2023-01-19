@extends('website_template')


@section('web-title', 'View Item')

@section('website-content')
    <div class="container">
        <table class="table my-2 table-hover table-bordered text-center">
            @if (count($items) < 1)
                <div class="text-center py-5 fs-3 fw-bold">No data</div>
            @else
                <thead>
                    <tr class="table-primary">
                        <th scope="col">No</th>
                        <th scope="col">Item ID</th>
                        <th scope="col">Item Image</th>
                        <th scope="col">Item Name</th>
                        <th scope="col">Item Description</th>
                        <th scope="col">Item Price</th>
                        <th scope="col">Item Category</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($items as $item)
                        <tr>
                            <th scope="row">{{ $loop->index + 1 }}</th>
                            <td>{{ $item->primary_id }}</td>
                            <td>{{ $item->image }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->description }}</td>
                            <td>{{ $item->price }}</td>
                            <td>{{ $item->category }}</td>
                            <td>
                                <div class="d-flex">

                                    <form action="{{ route('display_update_item_form', ['id' => $item->primary_id]) }}"
                                        method="GET">
                                        <button class="btn btn-warning text-black fw-bold" type="submit">Update</a>
                                    </form>
                                    <form action="{{ route('delete_item_logic', ['id' => $item->primary_id]) }}"
                                        method="POST">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger text-white fw-bold" type="submit">Delete</a>
                                    </form>
                                </div>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            @endif
        </table>
    </div>
@endsection
