@extends('layouts.mainLayout')

@section('content')
<div id="app">
    <x-nav-and-side/>
    <section class="is-title-bar">
        <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
          <ul>
            <li>Admin</li>
            <li>Warehouses</li>
          </ul>
        </div>
      </section>
      <section class="main main-section">
        @if (session('success'))
        <div class="mb-4 mt-4">
            <p class="text-green-500">
                {{ session('success') }}
            </p>
        </div>
        @endif
        @if (session('msg'))
        <div class="mb-4 mt-4">
            <p class="text-amber-500">
                {{ session('msg') }}
            </p>
        </div>
        @endif
        @if (session('error'))
        <div class="mb-4 mt-4">
            <p class="text-red-500">
                {{ session('error') }}
            </p>
        </div>
        @endif
        <div class="grid gap-6 grid-cols-1 md:grid-cols-3 mb-6">
            @foreach ($warehouses as $warehouse)
            <div class="card merah">
                <div class="card-content">
                  <div class="flex items-center justify-between">
                    <div class="widget-label">
                      <h2>
                        {{ $warehouse->warehouse_name }}
                      </h2>
                      <h3>
                        {{ $warehouse->location }}
                      </h3>
                    </div>
                    <span class="icon widget-icon">
                        <div>
                            <h1 class="text-amber-500"><a href="/warehouse/{{ $warehouse->id }}/edit">Update</a></h1>
                            <h1 class="text-red-500"><a href="/warehouse/delete/{{ $warehouse->id }}">Delete</a></h1>
                        </div>
                    </span>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
          <div class="mt-2 mb-2">
            {{ $warehouses->links() }}
          </div>
          <div>
            <label class="text-2xl font-semibold">Create Warehouses</label>
            <div>
                <form action="/warehouse/create" method="POST">
                    @csrf
                    <div class="mt-4 mb-4">
                        <input required type="text" class="input" name="warehouse" placeholder="Warehouse Name">
                    </div>
                    <div class="mt-4 mb-4">
                        <input required type="text" class="input" name="location" placeholder="Warehouse Location">
                    </div>
                    <div>
                        <button type="submit" class="button green">Create</button>
                    </div>
                </form>
            </div>
          </div>
      </section>
</div>
<style>
    .merah {
        background-color: white;
        border: 2px solid black;
    }
</style>
@endsection