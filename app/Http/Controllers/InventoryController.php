<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\InventoryCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InventoryController extends Controller
{
    public function index()
    {
        $user = User::with('school')->find(Auth::id());

        $inventories = Inventory::with('category')->where('school_id', $user->school->id)->get();
        $categories  = InventoryCategory::orderBy('name')->get();

        return view('pages.inventory', compact('categories', 'inventories'));
    }

    public function store(Request $request)
    {

        $validated = $request->validate(
            [
                'name'            => 'required|string|max:255',
                'category_id'     => 'required|exists:inventory_categories,id',
                'quantity'        => 'required|integer|min:0',
                'unit'            => 'nullable|string|max:50',
                'purchase_date'   => 'nullable|date',
                'warranty_expiry' => 'nullable|date|after_or_equal:purchase_date',
                'supplier'        => 'nullable|string|max:255',
                'location'        => 'nullable|string|max:255',
            ],
            [
                'name.required' => 'Item name eka aniwarya deyak bro.',
                'name.max'      => 'Item name akuru 255ta wada wadi wenna bae.',

                'category_id.required' => 'Inventory category ekak select karanna oni.',
                'category_id.exists'   => 'Select karapu category eka valid nemei.',

                'quantity.required' => 'Quantity eka aniwarya.',
                'quantity.integer'  => 'Quantity eka integer value ekak wenna oni.',
                'quantity.min'      => 'Quantity eka 0ta wada adu wenna bae.',

                'purchase_date.date' => 'Purchase date eka hari format ekakata thiyanna.',
                'warranty_expiry.after_or_equal' =>
                'Warranty expiry date eka purchase date ekata passe hari eka wenna oni.',

                'unit.max' => 'Unit name eka akuru 50ta wada wadi wenna bae.',

                'supplier.max' => 'Supplier name eka akuru 255ta wada wadi wenna bae.',
                'location.max' => 'Location name eka akuru 255ta wada wadi wenna bae.',
            ]
        );
        $user = User::with('school')->find(Auth::id());

        $array = ['school_id' => $user->school->id];

        Inventory::create(array_merge($validated, $array));

        return redirect()->back()->with('success', 'Inventory item successfully added');
    }

    public function update(Request $request)
    {
        $validated = $request->validate(
            [
                'inventoryId'           => 'required|exists:inventories,id',
                'updateName'            => 'required|string|max:255',
                'updateQuantity'        => 'required|integer|min:0',
                'updateUnit'            => 'nullable|string|max:50',
                'updateWarranty_expiry' => 'nullable|date',
                'updateSupplier'        => 'nullable|string|max:255',
                'Updatelocation'        => 'nullable|string|max:255',
            ],
            [
                'inventoryId.required' => 'Inventory item eka hoyaganna bae.',
                'inventoryId.exists'   => 'Inventory item eka valid nemei.',

                'updateName.required'     => 'Item name eka aniwarya.',
                'updateQuantity.required' => 'Quantity eka aniwarya.',
                'updateQuantity.min'      => 'Quantity eka 0ta wada adu wenna bae.',

                'updateWarranty_expiry.date' =>
                'Warranty expiry date eka hari format ekakata thiyanna.',
            ]
        );

        $inventory = Inventory::findOrFail($validated['inventoryId']);

        $updateData = [
            'name'            => $validated['updateName'],
            'quantity'        => $validated['updateQuantity'],
            'unit'            => $validated['updateUnit'] ?? null,
            'warranty_expiry' => $validated['updateWarranty_expiry'] ?? null,
            'supplier'        => $validated['updateSupplier'] ?? null,
            'location'        => $validated['Updatelocation'] ?? null,
        ];

        $changedData = [];

        foreach ($updateData as $column => $newValue) {
            if ($inventory->$column != $newValue) {
                $changedData[$column] = $newValue;
            }
        }

        if (!empty($changedData)) {
            $inventory->update($changedData);

            return redirect()
                ->back()
                ->with('success', 'Inventory item updated successfully ✅');
        }

        return redirect()
            ->back()
            ->with('info', 'No changes detected. Nothing was updated.');
    }

    public function destroy($id)
    {
        $inventory = Inventory::findOrFail($id);
        $inventory->delete();

        return redirect()
            ->back()
            ->with('success', 'Inventory item deleted successfully');
    }
}
