@extends('layouts.app')

@section('title', 'Cart')

@section('content')
<h1 class="mb-4">Your Cart</h1>
@if ($cartItems->isEmpty())
    <p>Your cart is empty.</p>
@else
    <table class="table">
        <thead>
            <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cartItems as $item)
            <tr>
                <td>{{ $item->product->title }}</td>
                <td>{{ $item->quantity }}</td>
                <td>${{ $item->product->price }}</td>
                <td>${{ $item->total_price }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endif
@endsection
