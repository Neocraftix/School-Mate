<?php

namespace App\Http\Controllers;

use App\Models\Furniture;
use App\Models\FurnitureSubCategory;
use App\Models\MainFurnitureCategory;
use Illuminate\Http\Request;

class FurnitureController extends Controller
{
    public function index()
    {
        $mainCategories = MainFurnitureCategory::all();
        $furnitures = Furniture::all();
        return view('pages.furniture-inventory', compact('mainCategories','furnitures'));
    }

    public function getSubCategories($mainCategoryId)
    {
        $subCategories = FurnitureSubCategory::where(
            'main_furniture_category_id',
            $mainCategoryId
        )->get();

        return response()->json($subCategories);
    }

    public function storeFurniture(Request $request)
    {

        // ✅ VALIDATION
        $validated = $request->validate(
            [
                'furnitureName' => 'required|string|min:3|max:255',
                'sub_category'  => 'required|exists:sub_furniture_categories,id',
                'quantity'      => 'required|integer|min:1',
                'location'      => 'required|string|min:2|max:255',
                'purchaseDate'  => 'required|date',
                'warranty'      => 'nullable|string|max:255',
                'supplier'      => 'nullable|string|max:255',
            ],
            [
                'furnitureName.required' => 'Furniture name is required.',
                'furnitureName.min'      => 'Furniture name must be at least 3 characters.',

                'sub_category.required'  => 'Please select a sub category.',
                'sub_category.exists'    => 'Selected sub category is invalid.',

                'quantity.required'      => 'Quantity is required.',
                'quantity.integer'       => 'Quantity must be a number.',
                'quantity.min'           => 'Quantity must be at least 1.',

                'location.required'      => 'Location is required.',
                'purchaseDate.required'  => 'Purchase date is required.',
                'purchaseDate.date'      => 'Invalid purchase date format.',
            ]
        );

        Furniture::create([
            'furniture_name'           => $validated['furnitureName'],
            'sub_furniture_category_id' => $validated['sub_category'],
            'quantity'                 => $validated['quantity'],
            'location'                 => $validated['location'],
            'purchase_date'            => $validated['purchaseDate'],
            'warranty'                 => $validated['warranty'] ?? null,
            'supplier'                 => $validated['supplier'] ?? null,
        ]);

        return redirect()
            ->back()
            ->with('success', 'Furniture added successfully.');
    }
}
