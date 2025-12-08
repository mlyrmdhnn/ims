@extends('layouts.mainLayout')

@section('content')
<div id="app">
    @if (session('user.role') == 'admin')
    <x-nav-and-side/>
    @elseif (session('user.role') == 'client')
    <x-nav-and-side-client/>
    @else

    @endif
    <section class="is-title-bar">
        <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
          <ul>
            <li>My</li>
            <li>Proffile</li>
          </ul>
        </div>
      </section>



        <section class="is-hero-bar">
            <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
              <h1 class="title">
                Profile
              </h1>
            </div>
          </section>
        <div>
            <form action="/change/proffile" method="POST" class="grid grid-cols-1 gap-6 lg:grid-cols-2 mb-6">
                @csrf
                <div class="card">
                    <div class="card-content">
                        <div class="field">
                          <label class="label">Username</label>
                          <div class="field-body">
                            <div class="field">
                              <div class="control">
                                <input type="text" value="{{ $user->username }}" class="input" disabled>
                                <input type="hidden" value="{{ $user->username }}" name="username">
                              </div>
                            </div>
                          </div>
                        </div>
                        <hr>
                        <div class="field">
                          <label class="label">Name</label>
                          <div class="field-body">
                            <div class="field">
                              <div class="control">
                                <input type="text" placeholder="Your Name" value="{{ $user->name }}" class="input" required="" name="name">
                              </div>
                            </div>
                          </div>
                        </div>
                        <hr>
                        <div class="field">
                          <div class="control">
                            <button type="submit" class="button green">
                              Save Change
                            </button>
                          </div>
                        </div>
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-content">
                      <div class="field">
                        <label class="label">Role</label>
                        <div class="control">
                          <input type="text" readonly="" value="{{ $user->role }}" class="input is-static">
                        </div>
                      </div>
                      <hr>
                      <div class="field">
                        <lbel class="label">Phone</lbel>
                        <div class="control">
                          <input type="text" placeholder="08xxxxxxxxxx" name="phone" value="{{ $user->phone }}" class="input is-static">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            </form>
            @if (session('success'))
                <div class="bg-green-200 text-green-500 section main-section">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('error'))
            <div class="bg-red-200 text-red-500 section main-section">
                {{ session('error') }}
            </div>
        @endif
        @error('currentPassword')
            <div class="bg-red-200 section main-section text-red-500">{{ $message }}</div>
        @enderror
        @error('newPassword')
            <div class="bg-red-200 section main-section text-red-500">{{ $message }}</div>
         @enderror
        </div>
        <section class="section main-section">
            <div class="mt-4">
                <form action="/change/password" method="POST">
                    @csrf
                    <div class="field">
                        <label class="label">Current Password</label>
                        <div class="control">
                          <input type="password" name="currentPassword" placeholder="******"  class="input is-static" required>
                        </div>
                      </div>
                      <div>
                        <label class="label">New Password</label>
                        <div class="control">
                          <input type="password" placeholder="******" name="newPassword" class="input is-static" required>
                        </div>
                      </div>
                      <div class="mt-4">
                        <button class="button green" type="submit">Save Changes</button>
                      </div>
                </form>
            </div>
        </section>
@endsection