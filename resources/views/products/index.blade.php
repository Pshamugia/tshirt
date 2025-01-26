@extends('layouts.app')

@section('title', 'Manage Products')

@section('content')
<h1 class="mb-4">Manage Products</h1>
<a href="{{ route('products.create') }}" class="btn btn-success mb-4">Add Product</a>
<table class="table">
    <thead>
        <tr>
            <th>Title</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
        <tr>
            <td>{{ $product->title }}</td>
            <td>${{ $product->price }}</td>
            <td>{{ $product->quantity }}</td>
            <td>
                <a href="#" class="btn btn-primary btn-sm">Edit</a>
                <a href="#" class="btn btn-danger btn-sm">Delete</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
