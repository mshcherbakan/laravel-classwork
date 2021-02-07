@extends('base')

@section('title', 'Products list')

@section('content')
    <div class="row">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Category</th>
                <th scope="col">Price</th>
                <th scope="col">Image</th>
            </tr>
            </thead>
            <tbody>
            @forelse($products as $product)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $product->title }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->category->title }}</td>
                    <td>{{ $product->price }}</td>
                    <td>
                        <img style="width: 100px" src="{{ url('storage/products/') }}/{{ $product->img }}" alt="">
                    </td>
                </tr>
            @empty
                No products
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
