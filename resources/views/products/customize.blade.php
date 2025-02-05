@extends('layouts.app')

@section('title', 'Customize ' . $product->title)

@section('content')
<div class="container">
    <h3 class="mb-4">Customize Your {{ $product->title }}</h3>

    <div class="row">
        <div class="col-md-4" style="background-color: #ada0a0">
            <form id="customizationForm" action="{{ route('products.customize.save', $product->id) }}" method="POST">
                @csrf


             <!-- Upload Image Button -->
<button type="button" id="toggleUploadSidebar" class="upload-btn">
    <i class="fas fa-upload"></i> Upload Image
</button>

                <!-- Upload Sidebar -->
                <div id="uploadSidebar">
                    <div class="upload-header">
                        <button id="closeUploadSidebar" class="close-btn">&times;</button>
                        <h4>Upload Your Image</h4>
                    </div>
                    <input type="file" id="uploaded_image" class="form-control">
                    <div id="imagePreviewContainer"></div>
                </div>


               

            <!-- Clipart Button -->
<button id="toggleClipartSidebar" class="clipart-btn">
    <i class="fas fa-palette"></i> Cliparts
</button>
                
<div id="clipartSidebar">
    <div class="clipart-header">
        <button id="closeClipartSidebar" class="close-btn">&times;</button>
        <input type="text" id="searchCliparts" class="form-control" placeholder="🔍 კლიპარტების ძიება">
        <select id="clipartCategory">
            <option value="all">ყველა კატეგორია</option>
            <option value="sport">სპორტი</option>
            <option value="funny">სასაცილო</option>
            <option value="nature">ბუნება</option>
            <option value="animals">ცხოველები</option>
        </select>
    </div>
                    <div id="clipartContainer">
                        @foreach ($cliparts as $clipart)
                            <div class="clipart-item">
                                <img class="clipart-img" 
                                     data-category="{{ $clipart->category }}" 
                                     data-image="{{ asset('storage/' . $clipart->image) }}" 
                                     src="{{ asset('storage/' . $clipart->image) }}" 
                                     alt="Clipart">
                            </div>
                        @endforeach
                    </div>
                </div>
                
                


                <!-- Text Customization Section (Styled) -->
                <div class="customization-box">
 
                    <div class="mb-3">
                        <label for="top_text" class="form-label">Top Text</label>
                        <input type="text" id="top_text" class="form-control input-styled" placeholder="Enter top text">
                    </div>

                    <div class="mb-3">
                        <label for="bottom_text" class="form-label">Bottom Text</label>
                        <input type="text" id="bottom_text" class="form-control input-styled" placeholder="Enter bottom text">
                    </div>

                    <div class="mb-3">
                        <label for="text_color" class="form-label">Text Color</label>
                        <input type="color" id="text_color" class="color-picker">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Text Style</label>
                        <div class="btn-group text-style-group">
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
                                <i class="fas fa-undo"></i></div>
                    </div>

                    <div class="mb-3">
                        <label for="font_family" class="form-label">Font Family</label>
                        <select id="font_family" class="form-control input-styled">
                            <option value="Arial">Arial</option>
                            <option value="Lobster-Regular">Lobster-Regular</option>
                            <option value="Orbitron">Orbitron</option>
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
                        <input type="number" id="font_size" class="form-control input-styled" value="30" min="10" max="100">
                    </div>
                </div>

              

                <button type="submit" id="saveDesign" class="btn save-btn">Save Design</button>            </form>
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
        data-default-image="{{ asset('storage/' . $product->image1) }}"
        src="{{ asset('storage/' . $product->image1) }}"
        alt="{{ $product->title }}"
        style="display: none;">
   
   
   
   

             
        <canvas id="tshirtCanvas"></canvas> 
        
        

        @if (!empty($productArray['colors']) && count($productArray['colors']) > 0)
        <div class="color-selection">
            <p>აირჩიეთ ფერი:</p>
            <div class="colors" style="display: flex; gap: 10px;">
                @foreach ($productArray['colors'] as $color)
                    <button class="color-option" 
                        data-color="{{ $color['color_code'] }}" 
                        data-image="{{ asset('storage/' . $color['front_image']) }}"
                        style="background-color: {{ $color['color_code'] }}; width: 40px; height: 40px; border-radius: 50%; border: 2px solid #000;">
                    </button>
                @endforeach
            </div>
        </div>
    @endif
    


    


    

    
    
    

    
        
      

    </div>
</div>



    </div>
</div>

  
<script>
function changeTshirtColor(color, imageUrl) {
    document.getElementById("tshirtImage").src = imageUrl;
}


document.addEventListener("DOMContentLoaded", function () {
    console.log("JavaScript Loaded ✅");

    const colorButtons = document.querySelectorAll(".color-option");

    colorButtons.forEach(button => {
        console.log("Color button found:", button);

        button.addEventListener("click", function () {
            const colorCode = this.getAttribute("data-color");
            const imageUrl = this.getAttribute("data-image");

            console.log("Clicked Color Code:", colorCode);
            console.log("Clicked Image URL:", imageUrl);

            let tshirtImage = document.getElementById("product-image");

            if (tshirtImage && imageUrl) {
                tshirtImage.src = imageUrl;
                tshirtImage.style.display = "block"; // Ensure it's visible
                console.log("✅ T-shirt image updated:", imageUrl);
            } else {
                console.error("❌ T-shirt image not found or missing URL.");
            }
        });
    });
});



    let colorCircles = document.querySelectorAll(".color-circle");
    let tshirtImage = document.getElementById("tshirt-image");

    colorCircles.forEach(circle => {
        circle.addEventListener("click", function () {
            let newImage = this.getAttribute("data-image");

            // Update the t-shirt image instantly
            tshirtImage.src = newImage;

            // Remove selection from other circles
            document.querySelectorAll(".color-circle").forEach(c => {
                c.style.border = "2px solid transparent";
                c.querySelector(".checkmark").style.display = "none";
            });

            // Mark this one as selected
            this.style.border = "2px solid #000";
            this.querySelector(".checkmark").style.display = "block";
        });
    });


    
    </script>
    
    <style>
        .color-btn {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            border: 2px solid #000;
            margin: 5px;
            cursor: pointer;
        }
    </style>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        var clipartSidebar = document.getElementById("clipartSidebar");
        var toggleButton = document.getElementById("toggleClipartSidebar");
        var closeButton = document.getElementById("closeClipartSidebar");

        // Open Sidebar
        toggleButton.addEventListener("click", function (event) {
            event.preventDefault(); // Prevent default link behavior
            clipartSidebar.classList.add("open");
        });

        // Close Sidebar when clicking the close button
        closeButton.addEventListener("click", function () {
            clipartSidebar.classList.remove("open");
        });

        // Close Sidebar when clicking outside
        document.addEventListener("click", function (event) {
            if (!clipartSidebar.contains(event.target) && event.target !== toggleButton) {
                clipartSidebar.classList.remove("open");
            }
        });

        // Prevent sidebar from closing when clicking inside
        clipartSidebar.addEventListener("click", function (event) {
            event.stopPropagation();
        });
    });
</script>

@endsection
