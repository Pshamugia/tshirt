<?php

namespace App\Http\Controllers;

 
use App\Models\ProductColor;
use App\Models\Clipart;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function create()
    {
        return view('admin.products.create');
    }
    
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products')); // Update path
    }
    

    public function edit($id)
{
    $product = Product::findOrFail($id);
    return view('admin.products.edit', compact('product'));
}


public function store(Request $request)
{
    $product = Product::create([
        'title' => $request->title,
        'description' => $request->description,
        'full_text' => $request->full_text,
        'size' => $request->size,
        'quantity' => $request->quantity,
        'price' => $request->price,
        'image1' => $request->file('image1')->store('products', 'public'),
        'image2' => $request->file('image2') ? $request->file('image2')->store('products', 'public') : null,
        'image3' => $request->file('image3') ? $request->file('image3')->store('products', 'public') : null,
        'image4' => $request->file('image4') ? $request->file('image4')->store('products', 'public') : null,
    ]);

    if ($request->has('colors')) {
        foreach ($request->colors as $color) {
            ProductColor::create([
                'product_id' => $product->id,
                'color_name' => $color['color_name'],
                'color_code' => $color['color_code'],
                'front_image' => $color['front_image']->store('colors', 'public'),
            ]);
        }
    }

    return redirect()->route('admin.products.index')->with('success', 'Product added successfully');
}



public function show($id)
{
    $product = Product::with('colors')->find($id);
    $cliparts = Clipart::all(); // Ensure you fetch cliparts
    $product->load('colors'); // ✅ Force load colors manually

    return view('products.show', compact('product', 'cliparts'));
}





public function customize($id)
{
    $product = Product::where('id', $id)->with('colors')->firstOrFail();
    $cliparts = Clipart::all();

    // 🔥 Convert to array to prevent Blade issues
    $productArray = $product->toArray();

    return view('products.customize', compact('productArray', 'cliparts', 'product'));
}













public function saveCustomization(Request $request, $id)
{
    $request->validate([
        'custom_text' => 'nullable|string|max:255',
        'text_color' => 'nullable|string',
        'uploaded_image' => 'nullable|image|max:2048',
        'pre_made_image' => 'nullable|string',
    ]);

    $customData = [
        'custom_text' => $request->custom_text,
        'text_color' => $request->text_color,
        'uploaded_image' => null,
        'pre_made_image' => $request->pre_made_image,
    ];

    if ($request->hasFile('uploaded_image')) {
        $customData['uploaded_image'] = $request->file('uploaded_image')->store('customizations', 'public');
    }

    session()->put('custom_data_' . $id, $customData);

    return back()->with('success', 'Your design has been saved!');
}


public function destroy($id)
{
    $product = Product::findOrFail($id);
    $product->delete();

    return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully');
}


}
