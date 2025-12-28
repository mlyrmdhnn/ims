@extends('layouts.mainLayout')

@section('content')
<div id="app">
    <x-nav-and-side-staff/>

    <section class="is-title-bar">
        <div class="flex flex-col md:flex-row items-center justify-between">
            <ul>
                <li>Staff</li>
                <li>Items</li>
            </ul>
        </div>
    </section>

    <section class="section main-section">
        {{-- <h1>halos</h1> --}}
        <div>
            @if (session('success'))
            <p class="text-green-500">{{ session('success') }}</p>
            @endif
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

            @foreach ($items as $i)
                <div
                    class="bg-white rounded-xl border border-gray-200
                           shadow-sm hover:shadow-md transition
                            h-full p-6">

                    {{-- HEADER --}}
                    <div class="mb-4">
                        <h3 class="text-lg font-semibold text-gray-800 leading-tight">
                            {{ $i->item->item_name }}
                        </h3>
                        <p class="text-xs text-gray-400 mt-1">
                            SKU: {{ $i->item->sku_product }}
                        </p>
                    </div>

                    {{-- BODY --}}
                    <div class="flex-1 space-y-3 text-sm text-gray-700">
                        <div class="flex justify-between">
                            <span class="text-gray-500">Warehouse</span>
                            <span class="font-medium text-gray-800">
                                {{ $i->warehouse->warehouse_name }}
                            </span>
                        </div>

                        <div class="flex justify-between">
                            <span class="text-gray-500">Location</span>
                            <span class="font-medium text-gray-800">
                                {{ $i->warehouse->location }}
                            </span>
                        </div>

                        <div class="flex justify-between">
                            <span class="text-gray-500">Quantity</span>
                            <span class="font-semibold text-blue-600">
                                {{ $i->quantity }}
                            </span>
                        </div>
                    </div>

                    {{-- FOOTER --}}
                    <div class="mt-6 flex justify-end border-t pt-4">
                        <button
                            onclick="openEditModal(
                                {{ $i->id }},
                                '{{ $i->item->item_name }}',
                                '{{ $i->item->sku_product }}',
                                {{ $i->quantity }}
                            )"
                            class="inline-flex items-center gap-2 px-4 py-2
                                text-sm font-medium text-white
                                bg-blue-600 rounded-lg
                                hover:bg-blue-700 active:scale-95 transition">
                            Edit
                        </button>

                    </div>

                </div>
            @endforeach

        </div>
    </section>

<!-- MODAL -->
<div id="editModal"
     class="fixed inset-0 z-50 hidden items-center justify-center bg-black/50">

    <div class="bg-white rounded-xl w-full max-w-md p-6 shadow-lg">
        <h2 class="text-lg font-semibold text-gray-800 mb-4">
            Edit Item
        </h2>

        <form method="POST" id="editForm">
            @csrf
            @method('PUT')

            <input type="hidden" name="id" id="itemId">

            <div class="space-y-4">

                <div>
                    <label class="text-sm text-gray-500">Product</label>
                    <input
                        name="itemName"
                        id="itemName"
                        type="text"
                        readonly
                        class="w-full mt-1 px-3 py-2
                               border rounded-lg bg-gray-100 text-gray-700">
                </div>

                <div>
                    <label class="text-sm text-gray-500">SKU</label>
                    <input
                    name="itemSku"
                        id="itemSku"
                        type="text"
                        readonly
                        class="w-full mt-1 px-3 py-2
                               border rounded-lg bg-gray-100 text-gray-700">
                </div>

                <div>
                    <label class="text-sm text-gray-500">Quantity</label>
                    <input
                        name="quantity"
                        id="itemQuantity"
                        type="number"
                        min="0"
                        class="w-full mt-1 px-3 py-2
                               border rounded-lg focus:ring focus:ring-blue-200">
                </div>

            </div>

            <div class="mt-6 flex justify-end gap-3">
                <button type="button"
                        onclick="closeEditModal()"
                        class="px-4 py-2 text-sm rounded-lg
                               border hover:bg-gray-100">
                    Cancel
                </button>

                <button type="submit"
                        class="px-4 py-2 text-sm text-white
                               bg-blue-600 rounded-lg hover:bg-blue-700">
                    Save
                </button>
            </div>
        </form>
    </div>
</div>




</div>
@endsection
<script>
    function openEditModal(id, name, sku, quantity) {
        document.getElementById('editModal').classList.remove('hidden');
        document.getElementById('editModal').classList.add('flex');

        document.getElementById('itemId').value = id;
        document.getElementById('itemName').value = name;
        document.getElementById('itemSku').value = sku;
        document.getElementById('itemQuantity').value = quantity;

        document.getElementById('editForm').action = `/items/${id}`;
    }

    function closeEditModal() {
        document.getElementById('editModal').classList.add('hidden');
        document.getElementById('editModal').classList.remove('flex');
    }
</script>
