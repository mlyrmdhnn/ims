<?php

namespace App\Http\Controllers;

use App\Models\Inventories;
use App\Models\User;
use App\Models\Items;
use App\Models\warehouses;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Inventory_units;
use App\Models\Transactions;

class ItemsController extends Controller
{
    public function page() {
        $warehouses = warehouses::get();
        return view('admin.createItemPage', ['title' => 'IMS | Create Item', 'warehouses' => $warehouses, ]);
    }

    public function createItem(Request $request)
    {

      function generateSkuProduct() {
        $skuProduct = '';
            do {
                $skuProduct = 'PDC-' .now()->format('Ymd') . '-' . Str::upper(Str::random(12));
            } while (Items::where('sku_product', $skuProduct)->exists());
        return $skuProduct;
        }

        $items = $request->items;
        $warehouses = $request->warehouse;
        $quantities = $request->quantity;
        $transactionId = $request->transactionId;

        for ($i = 0; $i < count($items); $i++) {

            $skuPdc = generateSkuProduct();

            $owner = Transactions::where('transaction_no', $transactionId[$i])
                         ->value('owner_transaction');

            // create item langsung dapat id
            $item = Items::create([
                'item_name' => $items[$i],
                'sku_product' => $skuPdc,
            ]);

            Inventory_units::factory()->count((int)$quantities[$i])->create([
                'warehouse_id' => $warehouses[$i],
                'item_id' => $item->id,
                'owner_id' => $owner
            ]);

            Inventories::create([
                'warehouse_id' => $warehouses[$i],
                'item_id' => $item->id,
                'quantity' => (int) $quantities[$i]
            ]);
        }

        return redirect()->back()->with('success', 'Items berhasil ditambahkan!');
    }
}
