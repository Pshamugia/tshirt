document.addEventListener("DOMContentLoaded", function () {
    const canvas = new fabric.Canvas("tshirtCanvas");
    

    document.querySelectorAll(".clipart-img").forEach(img => {
        img.addEventListener("click", function () {
            let clipartUrl = this.getAttribute("data-image");

            fabric.Image.fromURL(clipartUrl, function (img) {
                // Ensure the image does not cover the entire t-shirt
                let maxWidth = canvas.width * 0.4;  // Max 40% of canvas width
                let maxHeight = canvas.height * 0.4; // Max 40% of canvas height

                // Scale the image proportionally
                let scaleFactor = Math.min(maxWidth / img.width, maxHeight / img.height);

                img.set({
                    left: canvas.width / 2 - (img.width * scaleFactor) / 2, // Center horizontally
                    top: canvas.height / 2 - (img.height * scaleFactor) / 2, // Center vertically
                    scaleX: scaleFactor,
                    scaleY: scaleFactor,
                    selectable: true // Allow resizing & moving
                });

                canvas.add(img);
                canvas.setActiveObject(img);
            });
        });
    });




    

    var clipartCategoryDropdown = document.getElementById("clipartCategory");
    var clipartImages = document.querySelectorAll(".clipart-img");

    clipartCategoryDropdown.addEventListener("change", function () {
        let selectedCategory = this.value;

        clipartImages.forEach(img => {
            if (selectedCategory === "all" || img.dataset.category === selectedCategory) {
                img.style.display = "block"; // Show matching cliparts
            } else {
                img.style.display = "none";  // Hide non-matching ones
            }
        });
    });


    var uploadSidebar = document.getElementById("uploadSidebar");
    var uploadButton = document.getElementById("toggleUploadSidebar");
    var closeUploadButton = document.getElementById("closeUploadSidebar");

    // Open Upload Sidebar
    uploadButton.addEventListener("click", function () {
        uploadSidebar.classList.add("open");
    });

    // Close Upload Sidebar
    closeUploadButton.addEventListener("click", function () {
        uploadSidebar.classList.remove("open");
    });


    /// Close Upload Sidebar (Fix: Prevent Refresh)
    closeUploadButton.addEventListener("click", function (event) {
        event.preventDefault(); // Prevents form submission
        uploadSidebar.classList.remove("open");
    });

     // Close Upload Sidebar when clicking anywhere outside of it
     document.addEventListener("click", function (event) {
        var isClickInside = uploadSidebar.contains(event.target) || uploadButton.contains(event.target);

        if (!isClickInside) {
            uploadSidebar.classList.remove("open");
        }
    });
    // Handle Image Upload Preview
    document.getElementById("uploaded_image").addEventListener("change", function (event) {
        var reader = new FileReader();
        reader.onload = function () {
            var img = document.createElement("img");
            img.src = reader.result;
            document.getElementById("imagePreviewContainer").innerHTML = "";
            document.getElementById("imagePreviewContainer").appendChild(img);
        };
        reader.readAsDataURL(event.target.files[0]);
    });


    
    // Get the product image source
    const imgElement = document.getElementById('product-image');

    // Set canvas dimensions based on parent container
    function resizeCanvas() {
        const designArea = document.getElementById('design-area');
        canvas.setWidth(designArea.clientWidth);
        canvas.setHeight(designArea.clientWidth * 1.25);  // Adjust aspect ratio as needed
    }

    resizeCanvas();  // Initial resize
    window.addEventListener('resize', resizeCanvas);  // Handle resizing dynamically

    // Load image with proportional scaling
    fabric.Image.fromURL(imgElement.src, function(img) {
        // Calculate scale ratio to fit the image proportionally within the canvas
        let scaleRatio = Math.min(canvas.width / img.width, canvas.height / img.height);

        img.set({
            left: canvas.width / 2,
            top: canvas.height / 2,
            originX: 'center',
            originY: 'center',
            scaleX: scaleRatio,
            scaleY: scaleRatio,
            selectable: false,
            hasControls: false
        });

        canvas.add(img);
        canvas.sendToBack(img);
    });

    // Initialize text objects
    let topTextObject = new fabric.Textbox("", {
        left: canvas.width / 2,
        top: 50,
        fontSize: 30,
        fill: "#000000",
        fontFamily: "Arial",
        originX: "center",
        hasControls: true
    });

    let bottomTextObject = new fabric.Textbox("", {
        left: canvas.width / 2,
        top: 400,
        fontSize: 30,
        fill: "#000000",
        fontFamily: "Arial",
        originX: "center",
        hasControls: true
    });

    canvas.add(topTextObject);
    canvas.add(bottomTextObject);

    let activeTextObject = null;

    // Handle text selection and update UI elements
    canvas.on('mouse:down', function (options) {
        if (options.target && (options.target === topTextObject || options.target === bottomTextObject)) {
            activeTextObject = options.target;
            console.log("Text clicked:", activeTextObject.text);
        }
    });
    
    
    

    // Handle text input changes
    document.getElementById("top_text").addEventListener("input", function () {
        topTextObject.set({ text: this.value });
        canvas.renderAll();
    });

    document.getElementById("bottom_text").addEventListener("input", function () {
        bottomTextObject.set({ text: this.value });
        canvas.renderAll();
    });


    canvas.on('object:selected', function (event) {
        let activeText = event.target;
        if (activeText && activeText.text.trim() === "") {
            console.log("Preventing text disappearance on selection");
            activeText.set("text", " ");
            canvas.renderAll();
        }
    });
    

    // Handle font change
    document.getElementById("font_family").addEventListener("change", function () {
        if (activeTextObject) {
            activeTextObject.set("fontFamily", this.value);
    
            if (activeTextObject.path) {
                applyCurvedTextEffect(activeTextObject);  // Reapply curve effect if active
            }
    
            canvas.renderAll();
        }
    });
    
     
    

    // Handle color change
    document.getElementById("text_color").addEventListener("input", function () {
        if (activeTextObject) {
            activeTextObject.set({ fill: this.value });
            canvas.renderAll();
        }
    });

    // Handle text style button clicks
     

    // Handle image upload
    document.getElementById("uploaded_image").addEventListener("change", function (e) {
        const reader = new FileReader();
        reader.onload = function (event) {
            fabric.Image.fromURL(event.target.result, function (img) {
                img.scaleToWidth(canvas.width * 0.4);
                img.scaleToHeight(canvas.height * 0.4);
                img.set({
                    left: canvas.width / 2 - (img.getScaledWidth() / 2),
                    top: canvas.height / 2 - (img.getScaledHeight() / 2),
                    hasControls: true,
                    borderColor: 'red',
                    cornerColor: 'red',
                    cornerSize: 10,
                });

                canvas.add(img);
                canvas.setActiveObject(img);
                canvas.renderAll();
            });
        };
        reader.readAsDataURL(e.target.files[0]);
    });


      // Delete selected object with delete key
      document.addEventListener("keydown", function (e) {
        if (e.key === "Delete" || e.key === "Backspace") {
            if (canvas.getActiveObject()) {
                canvas.remove(canvas.getActiveObject());
                canvas.renderAll();
            }
        }
    });

 
    
    // Function to apply curved text effect
     
    

    
    function adjustCurvedTextBoundingBox(textObj) {
        setTimeout(() => {
            textObj.setCoords();
            let boundingBox = textObj.getBoundingRect(true);
    
            // Calculate the new position to tightly surround the text
            let newLeft = boundingBox.left + boundingBox.width / 2 - textObj.width / 2;
            let newTop = boundingBox.top + boundingBox.height / 2 - textObj.height / 2;
    
            textObj.set({
                left: newLeft,
                top: newTop,
                originX: "center",
                originY: "center",
                padding: 10  // Add padding to ensure tight fit
            });
    
            textObj.setCoords();
            canvas.renderAll();
        }, 50);
    }
    
    function applyCurvedTextEffect(textObj) {
        if (!textObj || textObj.type !== "textbox") {
            alert("Please select a text object.");
            return;
        }
    
        let text = textObj.text || " ";
        let radius = 80;
        let spacing = Math.max(5, 150 / text.length);
    
        textObj.set("path", null);  // Clear existing path
    
        let path = new fabric.Path(`M 0,${radius} A ${radius},${radius / 1.5} 0 1,1 ${radius * 2},${radius}`, {
            fill: '',
            stroke: '',
            selectable: false,
            evented: false
        });
    
        textObj.set({
            path: path,
            pathSide: 'top',
            pathAlign: 'center',
            charSpacing: spacing * 10,
            originX: 'center',
            left: canvas.width / 2
        });
    
        console.log("Curved effect applied to:", textObj.text);
    
        canvas.renderAll();
    }
    
    
    
    
    

    
   

    
    document.querySelector(".text-effect-btn[data-effect='curved']").addEventListener("click", function () {
        let activeText = canvas.getActiveObject();
        if (activeText) {
            applyCurvedTextEffect(activeText);
        } else {
            alert("მონიშნე ტექსტი.");
        }
    });


    document.querySelectorAll(".text-style-btn").forEach(button => {
        button.addEventListener("click", function () {
            let activeText = canvas.getActiveObject();
            if (!activeText) {
                alert("მონიშნე ტექსტი!");
                return;
            }
    
            let style = this.getAttribute("data-style");
    
            switch (style) {
                case "bold":
                    activeText.set("fontWeight", activeText.fontWeight === "bold" ? "normal" : "bold");
                    break;
                case "italic":
                    activeText.set("fontStyle", activeText.fontStyle === "italic" ? "normal" : "italic");
                    break;
                case "underline":
                    activeText.set("underline", !activeText.underline);
                    break;
                case "shadow":
                    activeText.set("shadow", activeText.shadow ? "" : "2px 2px 5px rgba(0,0,0,0.3)");
                    break;
                case "curved":
                    applyCurvedTextEffect(activeText);
                    break;
                case "normal":
                    activeText.set({
                        fontWeight: "normal",
                        fontStyle: "normal",
                        underline: false,
                        shadow: "",
                        path: null  // Remove curved path if applied
                    });
                    break;
            }
    
            canvas.renderAll();
            updateTextContent(inputElementId, activeText);  // Reapply listener
        });
    });
    
    
    
    

    document.getElementById("font_size").addEventListener("input", function () {
        let activeText = canvas.getActiveObject();
        if (activeText) {
            let newSize = parseInt(this.value);
            if (!isNaN(newSize) && newSize > 10) {
                activeText.set({ fontSize: newSize });
                canvas.renderAll();
            }
        }
    });

    

    
    
    
    function initializeTextInputs() {
        document.getElementById("top_text").addEventListener("input", function () {
            let newText = this.value.trim();
        
            if (topTextObject) {
                if (newText === "") {
                    topTextObject.set("text", " ");  // Keep at least a space
                } else {
                    topTextObject.set("text", newText);
                }
        
                // Ensure text stays centered
                topTextObject.set({
                    originX: "center",
                    left: canvas.width / 2
                });
        
                if (topTextObject.path) {
                    applyCurvedTextEffect(topTextObject); // Reapply curve if needed
                }
        
                canvas.renderAll();
            }
        });
        
        
        document.getElementById("bottom_text").addEventListener("input", function () {
            let newText = this.value.trim();
        
            if (bottomTextObject) {
                if (newText === "") {
                    bottomTextObject.set("text", " ");
                } else {
                    bottomTextObject.set("text", newText);
                }
        
                bottomTextObject.set({
                    originX: "center",
                    left: canvas.width / 2
                });
        
                if (bottomTextObject.path) {
                    applyCurvedTextEffect(bottomTextObject);
                }
        
                canvas.renderAll();
            }
        });
        
        
    }
    
    // Call this function initially and after each style change
    initializeTextInputs();
    
    
    const colorButtons = document.querySelectorAll(".color-select-btn");
    const productImage = document.getElementById("product-image");

    colorButtons.forEach(button => {
        button.addEventListener("click", function () {
            let newImage = this.getAttribute("data-image");

            // Change the t-shirt preview
            productImage.src = newImage;
        });
    });

    document.querySelectorAll('.color-btn').forEach(button => {
        button.addEventListener('click', function () {
            let frontImage = this.getAttribute('data-front');
            document.getElementById('product-image').src = frontImage;
        });
    });
     
    
    function applyTextStyle(style) {
        let activeText = canvas.getActiveObject();
        if (!activeText) {
            alert("მონიშნე ტექსტი");
            return;
        }
    
        if (style === "bold") {
            activeText.set("fontWeight", activeText.fontWeight === "bold" ? "normal" : "bold");
        } else if (style === "italic") {
            activeText.set("fontStyle", activeText.fontStyle === "italic" ? "normal" : "italic");
        } else if (style === "underline") {
            activeText.set("underline", !activeText.underline);
        } else if (style === "shadow") {
            activeText.set("shadow", activeText.shadow ? null : "2px 2px 5px rgba(0,0,0,0.3)");
        } else if (style === "curved") {
            applyCurvedTextEffect(activeText);
        }
    
        canvas.renderAll();
        updateTextListeners(); // Ensure input updates work after applying styles
    }

    function updateTextContent(inputElementId, textObj) {
        const inputElement = document.getElementById(inputElementId);
    
        inputElement.addEventListener("input", function () {
            let newText = inputElement.value.trim();
    
            if (newText === "") {
                textObj.set("text", " ");  // Maintain an empty space to prevent disappearance
            } else {
                textObj.set("text", newText);
            }
    
            if (textObj.path) {
                applyCurvedTextEffect(textObj);  // Reapply the curve effect if it's set
            }
    
            canvas.renderAll();
        });
    }
    
    // Initialize text input listeners
    updateTextContent("top_text", topTextObject);
    updateTextContent("bottom_text", bottomTextObject);
    

     
    
    
    
    
        

    // Save design
    document.getElementById("saveDesign").addEventListener("click", function () {
        const designData = canvas.toDataURL({
            format: 'png',
            quality: 1
        });

        let hiddenInput = document.createElement("input");
        hiddenInput.setAttribute("type", "hidden");
        hiddenInput.setAttribute("name", "design_image");
        hiddenInput.setAttribute("value", designData);
        document.getElementById("customizationForm").appendChild(hiddenInput);

        document.getElementById("customizationForm").submit();
    });



     
    
    function fetchCliparts(category) {
        fetch(`/api/cliparts?category=${category}`)
            .then(response => response.json())
            .then(data => {
                let container = document.getElementById("clipartContainer");
                container.innerHTML = "";
                data.forEach(clipart => {
                    let img = document.createElement("img");
                    img.src = "/storage/" + clipart.image;
                    img.classList.add("clipart-item");
                    img.onclick = function () {
                        addClipartToCanvas(img.src);
                    };
                    container.appendChild(img);
                });
            });
    }



     
    
    function addClipartToCanvas(imageUrl) {
        fabric.Image.fromURL(imageUrl, function (img) {
            img.set({
                left: 100,
                top: 100,
                hasControls: true
            });
            canvas.add(img);
            canvas.renderAll();
        });
    }

    
});
