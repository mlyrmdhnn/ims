<?php

namespace App\Http\Controllers;

use App\Models\Inventories;
use App\Models\warehouses;
use Illuminate\Http\Request;

class WarehousesController extends Controller
{

    public function page() {
        $warehouses = warehouses::latest()->paginate(6);
        return view('admin.warehouses', ['title' => 'IMS | Create Warehouses', 'warehouses' => $warehouses]);
    }

    public function createWarehouse(Request $request) {
        // dd($request);
        warehouses::create([
            'warehouse_name' => $request->warehouse,
            'location' => $request->location
        ]);

        return redirect()->back()->with('success', 'Warehouse berhasil ditambahkan');
    }

    public function delete($id) {
        $warehouses = warehouses::where('id', $id)->first();
        if(Inventories::where('warehouse_id', $id)->exists()) {
            return redirect()->back()->with('msg', 'Tidak bisa dihapus, Pastikan inventory sudah kosong terlebih dahulu');
        }
        if(!$warehouses) {
            return redirect()->back()->with('error', 'Warehouse tidak ditemukan');
        }
        $warehouses->delete();
        return redirect()->back()->with('success', 'Warehouse berhasil dihapus');
    }

    public function edit($id) {
        $warehouse = warehouses::where('id', $id)->first();
        return view('admin.warehouseUpdate', ['title' => 'IMS | Warehouse Edit', 'warehouse' => $warehouse]);
    }

    public function update(Request $request) {
        $warehouse = warehouses::where('id', $request->id)->first();
        $warehouse->update([
            'warehouse_name' => $request->warehouse,
            'location' => $request->location
        ]);

        return redirect('warehouses')->with('success', 'Warehouse berhasil di update');
    }

}
