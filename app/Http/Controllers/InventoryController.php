<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\InventoryCategory;
use App\Models\InventorySupplier;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InventoryController extends Controller
{
    public function index()
    {
        $inventories = Inventory::with('category', 'supplier')->get();
        $categories  = InventoryCategory::orderBy('name')->get();
        $suppliers = InventorySupplier::all();

        return view('pages.inventory', compact('categories', 'inventories', 'suppliers'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'name'            => 'required|string|max:255',
                'category_id'     => 'required|exists:inventory_categories,id',
                'quantity'        => 'required|integer|min:0',
                'unit'            => 'nullable|string|max:50',
                'purchase_date'   => 'required|date',
                'warranty_expiry' => 'nullable|date|after_or_equal:purchase_date',
                'supplier_id'     => 'required|exists:inventory_suppliers,id',
                'location'        => 'nullable|string|max:255',
            ],
            [
                'name.required'        => 'Item name is required.',
                'category_id.required' => 'Category is required.',
                'category_id.exists'   => 'Selected category is invalid.',
                'quantity.required'    => 'Quantity is required.',
                'quantity.min'         => 'Quantity must be at least 0.',
                'purchase_date.date'   => 'Purchase date must be a valid date.',
                'warranty_expiry.date' => 'Warranty expiry must be a valid date.',
                'warranty_expiry.after_or_equal' =>
                'Warranty expiry must be after or equal to the purchase date.',
                'supplier_id.exists' => 'Selected supplier is invalid.',
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
                'Updatelocation'        => 'nullable|string|max:255',
            ],
            [
                'inventoryId.required' => 'Inventory ID is required.',
                'inventoryId.exists'   => 'Inventory item not found.',
                'updateName.required' => 'Item name is required.',
                'updateQuantity.required' => 'Quantity is required.',
                'updateQuantity.min' => 'Quantity must be at least 0.',
                'updateWarranty_expiry.date' => 'Warranty expiry must be a valid date.',
            ]
        );

        $inventory = Inventory::findOrFail($validated['inventoryId']);

        $updateData = [
            'name'            => $validated['updateName'],
            'quantity'        => $validated['updateQuantity'],
            'unit'            => $validated['updateUnit'] ?? null,
            'warranty_expiry' => $validated['updateWarranty_expiry'] ?? null,
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

    public function exportPdf()
    {
        $inventories = Inventory::with('category', 'supplier')->get();

        // Load blade template
        $pdf = PDF::loadView('pdf-templates.inventory.pdf', compact('inventories'));

        // Download PDF
        return $pdf->download('inventory_list(' . date('d M Y H:i:s') . ').pdf');
    }
}
