@extends('layouts.mainLayout')

@section('content')
<div id="app">
    <x-nav-and-side/>
    <section class="is-title-bar">
        <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
          <ul>
            <li>Admin</li>
            <li>Create Items</li>
          </ul>
        </div>
      </section>
      <section class="main main-section">
        <div>
                <form action="/item/create" method="POST">
                    @csrf
                    <div class="mt-1 mb-2 font-bold">Form 1</div>
                    <input type="text" class="input" name="items[]" placeholder="Item">
                    <div class="control mt-4 mb-4">
                        <div class="select">
                        <select name="warehouse[]">
                            @foreach ($warehouses as $warehouse)
                            <option value="{{ $warehouse->id }}">{{ $warehouse->warehouse_name }} | {{ $warehouse->location }}</option>
                            @endforeach
                        </select>
                        </div>
                    </div>
                    <input type="number" name="quantity[]" id="" class="input" placeholder="Quantity">

                    <div class="mt-4 mb-4">
                       <input type="text" name="transactionId[]" class="input" placeholder="No Transaction">
                    </div>

                    <div id="rows-container"></div>
                    <div class="mt-4">
                        <button type="submit" class="button green">Submit</button>
                    </div>
                    <div class="mt-4">Jumlah item:</div>
                    <input type="number" id="rowCount" min="1" value="1" class="input">

                   <div class="mt-4">
                    <button type="button" class="button blue" onclick="generateRows()">
                        Buat Form
                    </button>
                   </div>
                </form>
        </div>
      </section>
</div>
<script>
    function generateRows() {
        const count = document.getElementById('rowCount').value;
        const container = document.getElementById('rows-container');

        container.innerHTML = ""; // bersihkan dulu

        for (let i = 0; i < count; i++) {
            container.innerHTML += `
    <div class="mt-4 mb-2 font-bold">Form ${i+2}</div>
    <div class="mt-2">
        <input type="text" class="input" name="items[]" placeholder="Item">

        <div class="control mt-4 mb-4">
            <div class="select">
                <select name="warehouse[]">
                    @foreach ($warehouses as $warehouse)
                    <option value="{{ $warehouse->id }}">{{ $warehouse->warehouse_name }} | {{ $warehouse->location }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <input type="number" name="quantity[]" class="input" placeholder="Quantity">

                    <div class="mt-4 mb-4">
                       <input type="text" name="transactionId[]" class="input" placeholder="No Transaction">
                    </div>
    </div>
`;

        }
    }
    </script>

@endsection