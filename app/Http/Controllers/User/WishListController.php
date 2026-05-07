<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $wishlists = Wishlist::where('user_id', Auth::id())
        ->with('product.category')
        ->latest()
        ->get();

        $message = "Halo Admin Digital Stock, saya ingin memesan:\n\n";
        foreach ($wishlists as $index => $item) {
            $no = $index + 1;
            $message .= "{$no}. *{$item->product->name}*\n";
            if($item->note) $message .= "   _Catatan: {$item->note}_\n";
            $message .= "\n";
        }
        $waUrl = "https://wa.me/" . config('app.wa_number', '628123456789') . "?text=" . urlencode($message);

        return view('wishlist.index', [
            'wishlists' => $wishlists,
            'wishlistCount' => $wishlists->count(),
            'waUrl' => $waUrl
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Wishlist::firstOrCreate([
            'user_id' => Auth::id(),
            'product_id' => $request->product_id,
        ]);

        return redirect()->back()->with('success', 'Barang berhasil ditambahkan ke favorit!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $wishlist = Wishlist::where('user_id', Auth::id())->where('id', $id)->firstOrFail();
        $wishlist->delete();

        return redirect()->back()->with('error', 'Barang tidak ditemukan di favorit!');
    }

    public function updateNote(Request $request, string $id)
    {
        $request->validate(['note' => 'nullable|string|max:255']);

        $wishlist = Wishlist::where('user_id', Auth::id())->where('id', $id)->firstOrFail();
        $wishlist->update(['note' => $request->note]);

        return redirect()->back()->with('success', 'Catatan berhasil diperbarui!');
    }
}
