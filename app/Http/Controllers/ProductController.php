<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'price' => 'required|numeric',
        'quantity' => 'required|integer',
        'size' => 'required|string',
        'image1' => 'nullable|image|max:2048',
        'full_text' => 'nullable|string',
    ]);

    $product = new Product();
    $product->title = $request->title;
    $product->description = $request->description;
    $product->full_text = $request->input('full_text', 'Default text');

    $product->price = $request->price;
    $product->quantity = $request->quantity;
    $product->size = $request->size;

    // Handle images if uploaded
    if ($request->hasFile('image1')) {
        $product->image1 = $request->file('image1')->store('products', 'public');
    }
    if ($request->hasFile('image2')) {
        $product->image2 = $request->file('image2')->store('products', 'public');
    }
    if ($request->hasFile('image3')) {
        $product->image3 = $request->file('image3')->store('products', 'public');
    }
    if ($request->hasFile('image4')) {
        $product->image4 = $request->file('image4')->store('products', 'public');
    }

    $product->save();

    return redirect()->route('products.index')->with('success', 'Product created successfully!');
}


    public function show($id)
{
    $product = Product::findOrFail($id);
    return view('products.show', compact('product'));
}



public function customize($id)
{
    $product = Product::findOrFail($id);

    // Fetch pre-made images for selection
    $preMadeImages = [
        asset('images/design1.png'),
        asset('images/design2.png'),
        asset('images/design3.png'),
    ];

    return view('products.customize', compact('product', 'preMadeImages'));
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



}
