@extends('layouts.mainLayout')

@section('content')
<div id="app">
    <x-nav-and-side/>
    {{-- {{ $warehouse }} --}}
    <section class="is-title-bar">
        <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
          <ul>
            <li>Admin</li>
            <li>Edit Warehouse</li>
          </ul>
        </div>
      </section>
      <section class="main main-section">
        <form action="/warehouse/{{ $warehouse->id }}" method="POST">
            @csrf
            @method('PATCH')
            <div class="mt-4 mg-4">
                <input type="text" class="input" name="warehouse" placeholder="Warehouse name" value="{{ $warehouse->warehouse_name }}">
            </div>
            <div class="mt-4 mg-4">
                <input type="text" name="location" class="input" placeholder="Location" value="{{ $warehouse->location }}">
            </div>
            <div class="mt-4 mg-4">
                <button class="button green">Edit</button>
            </div>
        </form>
      </section>
</div>
@endsection