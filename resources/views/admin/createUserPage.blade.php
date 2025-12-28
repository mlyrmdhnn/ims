@extends('layouts.mainLayout')

@section('content')
<div id="app" class="bg-neutral-100">
    <x-nav-and-side/>
    <section class="is-title-bar">
        <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
          <ul>
            <li>Admin</li>
            <li>Create User</li>
          </ul>
        </div>
      </section>
      <section class="section main-section">
        <div class="card">
          <header class="card-header">
            <p class="card-header-title">
              <span class="icon"><i class="mdi mdi-account-plus"></i></span>
              Create Staff
            </p>
          </header>
          <div class="px-6">
            @if (session('success'))
                <span class="text-green-500">{{ session('success') }}</span>
            @endif
            @error('username')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
          </div>
          <div class="card-content">
            <form action="/create/staff" method="POST">
                @csrf

                <input type="hidden" name="role" value="staff">

              <div class="field spaced">
                <label class="label">Username</label>
                <div class="control icons-left">
                  <input class="input" type="text" name="username" placeholder="username" required>
                  <span class="icon is-small left"><i class="mdi mdi-account"></i></span>
                </div>
              </div>

              <div class="field spaced">
                <label class="label">Name</label>
                <p class="control icons-left">
                    <input required class="input" type="text" name="name" placeholder="Name">
                    <span class="icon is-samll left"><i class="mdi mdi-tag"></i></span>
                </p>
              </div>

              <div class="field spaced">
                <label class="label">Phone</label>
                <p class="control icons-left">
                    <input required class="input" type="text" name="phone" placeholder="08xxxxxxxxx">
                    <span class="icon is-samll left"><i class="mdi mdi-phone"></i></span>
                </p>
              </div>

              <div class="field scaped">
                <label class="label">Warehouse</label>
                <div class="select">
                  <p class="control icons-left">
                    <select name="warehouse">
                        @foreach ($warehouses as $w)
                        <option value="{{ $w->id }}">{{ $w->warehouse_name }} | {{ $w->location }}</option>
                        @endforeach
                    </select>
                  </p>

                </div>
              </div>

              <div class="field spaced">
                <label class="label">Password</label>
                <p class="control icons-left">
                  <input class="input" type="password" name="password" placeholder="Password" required >
                  <span class="icon is-small left"><i class="mdi mdi-asterisk"></i></span>
                </p>
              </div>

              <hr>

              <div class="field grouped">
                <div class="control">
                  <button type="submit" class="button green">
                    Create
                  </button>
                </div>
              </div>

            </form>
          </div>
        </div>
      </section>
</div>
<style>
    .pl{
        background-color: red;
    }
</style>
@endsection