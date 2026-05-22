<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('category')->paginate(10);
        return view('admin.products.index', [
            'products' => $products,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();

        return view('admin.products.create', [
            'categories' => $categories,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'unit_description' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'image' => 'required|image|max:2048',
        ], [
            'name.required' => 'Nama produk wajib diisi.',
            'category_id.required' => 'Kategori wajib dipilih.',
            'unit_description.required' => 'Deskripsi unit wajib diisi.',
            'price.required' => 'Harga produk wajib diisi.',
            'stock.required' => 'Stok produk wajib diisi.',
            'image.required' => 'Gambar produk wajib diunggah.',
            'image.image' => 'File yang diunggah harus berupa gambar.',
            'image.max' => 'Ukuran gambar tidak boleh lebih dari 2MB.',
        ]);

        $data = new Product();
        $data->name = $request->name;
        $data->category_id = $request->category_id;
        $data->unit_description = $request->unit_description;
        $data->price = $request->price;
        $data->stock = $request->stock;
        $data->is_visible = $request->has('is_visible') ? 1 : 0;
        $data->is_best_seller = $request->has('is_best_seller') ? 1 : 0;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('img/products/'), $imageName);
            $data->image = $imageName;
        }
        $data->save();

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        $product->load('category');
        return view('admin.products.show', [
            'product' => $product,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('admin.products.edit', [
            'product' => $product,
            'categories' => $categories,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'unit_description' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'image' => 'nullable|image|max:2048',
        ], [
            'name.required' => 'Nama produk wajib diisi.',
            'category_id.required' => 'Kategori wajib dipilih.',
            'unit_description.required' => 'Deskripsi unit wajib diisi.',
            'price.required' => 'Harga produk wajib diisi.',
            'stock.required' => 'Stok produk wajib diisi.',
            'image.image' => 'File yang diunggah harus berupa gambar.',
            'image.max' => 'Ukuran gambar tidak boleh lebih dari 2MB.',
        ]);

        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->unit_description = $request->unit_description;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->is_visible = $request->has('is_visible') ? 1 : 0;
        $product->is_best_seller = $request->has('is_best_seller') ? 1 : 0;
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($product->image) {
                $oldImagePath = public_path('img/products/' . $product->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('img/products/'), $imageName);
            $product->image = $imageName;
        }
        $product->save();

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        if ($product->image) {
            $imagePath = public_path('img/products/' . $product->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Barang berhasil dihapus.');
    }
}
