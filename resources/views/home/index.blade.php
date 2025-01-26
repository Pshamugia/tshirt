@extends('layouts.app')

@section('title', 'Home')

@section('content')
<h1 class="mb-4">Our Products</h1>
<div class="row">
    @foreach ($products as $product)
    <div class="col-md-4 mb-4">
        <div class="card">
            <a href="{{ route('products.show', $product->id) }}">
                <img src="{{ asset('storage/' . $product->image1) }}" class="card-img-top" alt="{{ $product->title }}">
            </a>            <div class="card-body">
                <h5 class="card-title">{{ $product->title }}</h5>
                <p class="card-text">{{ $product->description }}</p>
                <p><strong>Price:</strong> ${{ $product->price }}</p>
                <form action="{{ route('cart.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <input type="number" name="quantity" value="1" min="1" class="form-control mb-2">
                    <button type="submit" class="btn btn-primary">Add to Cart</button>
                </form>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
