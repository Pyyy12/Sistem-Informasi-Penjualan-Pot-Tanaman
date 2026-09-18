<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\PotSize;
use App\Models\SoilType;
use Illuminate\Http\Request;

class ProductCatalogController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::with(['potSize', 'soilType']);

        // Filter berdasarkan ukuran pot
        if ($request->filled('size')) {
            $query->whereHas('potSize', function ($q) use ($request) {
                $q->where('slug', $request->size);
            });
        }

        // Filter berdasarkan jenis tanah/media tanam
        if ($request->filled('soil')) {
            $query->whereHas('soilType', function ($q) use ($request) {
                $q->where('slug', $request->soil);
            });
        }

        // Search spesifik jenis tanaman khusus / nama pot
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('target_plant', 'like', "%{$search}%")
                  ->orWhere('material', 'like', "%{$search}%");
            });
        }

        $products = $query->latest()->paginate(9)->withQueryString();
        $potSizes = PotSize::withCount('products')->get();
        $soilTypes = SoilType::withCount('products')->get();

        return view('catalog.index', compact('products', 'potSizes', 'soilTypes'));
    }

    public function show(string $slug)
    {
        $product = Product::with(['potSize', 'soilType'])
            ->where('slug', $slug)
            ->firstOrFail();

        $relatedProducts = Product::where('id', '!=', $product->id)
            ->where(function ($q) use ($product) {
                $q->where('pot_size_id', $product->pot_size_id)
                  ->orWhere('soil_type_id', $product->soil_type_id);
            })
            ->take(3)
            ->get();

        return view('catalog.show', compact('product', 'relatedProducts'));
    }
}