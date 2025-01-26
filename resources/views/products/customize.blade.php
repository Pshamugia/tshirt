@extends('layouts.app')

@section('title', 'Customize ' . $product->title)

@section('content')
<div class="container">
    <h3 class="mb-4">Customize Your {{ $product->title }}</h3>

    <div class="row">
        <div class="col-md-4">
            <form id="customizationForm" action="{{ route('products.customize.save', $product->id) }}" method="POST">
                @csrf


                <div class="mb-3">
                    <label for="uploaded_image" class="form-label">ატვირთე სასურველი სურათი</label>
                    <input type="file" id="uploaded_image" class="form-control">
                </div>



                <div class="mb-3">
                    <label for="top_text" class="form-label">ტექსტი</label>
                    <input type="text" id="top_text" class="form-control" placeholder="Enter top text">
                </div>
                
                <div class="mb-3">
                    <label for="bottom_text" class="form-label">ქვედა ტექსტი</label>
                    <input type="text" id="bottom_text" class="form-control" placeholder="Enter bottom text">
                </div>

                <div class="mb-3">
                <label for="text_color" class="form-label">Text Color</label>
                <input type="color" id="text_color" class="form-control" value="#000000">
            </div>

                <div class="mb-3">
                    <label class="form-label">Text Style</label>
    <div class="btn-group" role="group">
        <button type="button" class="btn btn-outline-dark text-style-btn" data-style="bold" title="Bold">
            <i class="fas fa-bold"></i>
        </button>
        <button type="button" class="btn btn-outline-dark text-style-btn" data-style="italic" title="Italic">
            <i class="fas fa-italic"></i>
        </button>
        <button type="button" class="btn btn-outline-dark text-style-btn" data-style="underline" title="Underline">
            <i class="fas fa-underline"></i>
        </button>
        <button type="button" class="btn btn-outline-dark text-effect-btn" data-effect="curved">
            <i class="fas fa-circle-notch"></i> <br> წრე
        </button>
        <button type="button" class="btn btn-outline-dark text-style-btn" data-style="normal" title="Reset">
            <i class="fas fa-undo"></i>
            
                </div>
            </div>  
                <div class="mb-3">
                    <label for="font_family" class="form-label">Font Family</label>
                    <select id="font_family" class="form-control">
                        <option value="Arial">Arial</option>
                        <option value="Alk-rounded" style="font-family: 'alk-rounded', sans-serif !important;"><al> Alk-rounded </al> </option>
                        <option value="PlaywriteIN" style="font-family: 'PlaywriteIN', sans-serif !important;">PlaywriteIN</option>
                        <option value="Lobster-Regular" style="font-family: 'Lobster-Regular', sans-serif !important;">Lobster-Regular</option>
                        <option value="Orbitron" style="font-family: 'Orbitron', sans-serif !important;">Orbitron</option>
                        <option value="EricaOne" style="font-family: 'EricaOne', sans-serif !important;">EricaOne</option>
                        <option value="GloriaHallelujah" style="font-family: 'GloriaHallelujah', sans-serif !important;">GloriaHallelujah</option>
                        <option value="Creepster" style="font-family: 'Creepster', sans-serif !important;">Creepster</option>
                        <option value="RubikBubbles" style="font-family: 'RubikBubbles', sans-serif !important;">RubikBubbles</option>
                        <option value="BerkshireSwash" style="font-family: 'BerkshireSwash', sans-serif !important;">BerkshireSwash</option>
                        <option value="Monoton" style="font-family: 'Monoton', sans-serif !important;">Monoton</option>
                        <option value="BlackOpsOne" style="font-family: 'BlackOpsOne', sans-serif !important;">BlackOpsOne</option>


                    
                    </select>
                </div>


                 
                
                
                <div class="mb-3">
                    <label for="font_size" class="form-label">Font Size</label>
                    <input type="number" id="font_size" class="form-control" value="30" min="10" max="100">
                </div>
                

              

                <button type="button" id="saveDesign" class="btn btn-primary mt-3">Save Design</button>
            </form>
        </div>
<style>
    .col-md-8 {
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: #f0f0f0;;
    height: 100vh;
}

#design-area {
    position: relative;
    width: 100%;
    max-width: 500px; /* Adjust max width to your preference */
    height: auto;
}

#tshirtCanvas {
    width: 100%;
    height: auto;
}

    </style>
        <div class="col-md-8 d-flex align-items-center justify-content-center" 
     style="background-color: #f0f0f0; height: 100vh; position: relative;">
    <div id="design-area" style="position: relative; width: 100%; max-width: 500px;">
        <img id="product-image" 
             src="{{ asset('storage/' . $product->image1) }}" 
             alt="{{ $product->title }}" 
             style="display: none;">
        <canvas id="tshirtCanvas"></canvas>
    </div>
</div>

    </div>
</div>
 
@endsection
