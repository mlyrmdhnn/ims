<?php

namespace App\Http\Controllers;

use App\Models\Inventories;
use App\Models\User;
use App\Models\Items;
use App\Models\warehouses;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Inventory_units;
use App\Models\Notifications;
use App\Models\Transactions;
use Illuminate\Support\Facades\Session;

class ItemsController extends Controller
{
    public function page() {
        $warehouses = warehouses::get();
        return view('admin.createItemPage', ['title' => 'IMS | Create Item', 'warehouses' => $warehouses, ]);
    }

    public function staffPage() {
        $warehouseId = Session::get('user.warehouse_id');
        $inventory = Inventories::with(['item', 'warehouse'])->where('warehouse_id', $warehouseId)->latest()->get();
        return view('staff.items', ['title' => 'IMS | Items', 'items' => $inventory]);
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

    public function update(Request $request, $id) {
        $uuid = '';
        do{
            $uuid = Str::uuid();
        } while (Notifications::where('uuid', $uuid)->exists());

        $notifId = '';
        do {
            $notifId = 'UPT-' . now()->format('Ymd') . '-' . Str::upper(Str::random(12));
        } while (Notifications::where('notification_id', $notifId)->exists());
        Notifications::create([
            'uuid' => $uuid,
            'notification_id' => $notifId,
            'isRead' => false,
            'from' => Session::get('user.id'),
            'to' => User::where('username', 'admin')->value('id'),
            'title' => 'Item Update',
            'desc' => Session::get('user.name') . ' has updated item, with product sku : '. $request->itemSku,
            'isAproved' => null,
            'message' => null
        ]);
        Inventories::where('id', $request->id)->update([
            'quantity' => $request->quantity
        ]);
        return back()->with('success', 'Item updated');
    }
}
