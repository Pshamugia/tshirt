@extends('layouts.app')

@section('title', 'Customize ' . $product->title)

@section('content')
<div class="container">
    <h3 class="mb-4">Customize Your {{ $product->title }}</h3>

    <div class="row">
        <div class="col-md-4">
            <form>
                <div class="mb-3">
                    <label for="custom_text" class="form-label">Add Custom Text</label>
                    <input type="text" id="custom_text" class="form-control" placeholder="Enter your text">
                </div>

                <div class="mb-3">
                    <label for="text_color" class="form-label">Text Color</label>
                    <input type="color" id="text_color" value="#000000" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="uploaded_image" class="form-label">Upload Your Image</label>
                    <input type="file" id="uploaded_image" class="form-control">
                </div>

                <button type="button" id="add_text_btn" class="btn btn-primary">Add Text</button>
            </form>
        </div>

        <div class="col-md-8">
            <div id="design-area" style="width: 400px; height: 500px; position: relative; border: 1px dashed #ccc;">
                <img src="{{ asset('storage/' . $product->image1) }}" alt="{{ $product->title }}" style="width: 100%; height: auto;">
            </div>
        </div>
    </div>
</div>
@endsection
