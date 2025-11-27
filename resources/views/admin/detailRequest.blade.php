@extends('layouts.mainLayout')

@section('content')
{{-- @dd($request) --}}
<div id="app">
    <x-nav-and-side />
    <section class="is-title-bar">
        <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
          <ul>
            <li>Admin</li>
            <li>Request</li>
          </ul>
        </div>
      </section>

     <x-nav-btn-link/>
      {{-- <button class="button-red">ok</button> --}}

      <section class="section main-section grid grid-cols-1 gap-4">
        <div class="card">
            <div class="card-content rounded-2xl bg-gray-600 text-gray-300">
                <div class="flex items-center">
                    From: {{ $request->sender->name }}
                </div>
              <div class="flex items-center justify-center mt-4">
                <div class="text-center">
                    <span class="md:text-2xl font-semibold">Title</span>
                    <p class="font-light">{{ $request->title }}</p>
                </div>
            </div>
            <div class="flex justify-center items-center mt-6">
                <div class="text-center">
                    <span class="md:text-2xl font-semibold">Description</span>
                    <p class="font-light">{{ $request->desc }}</p>
                </div>
            </div>
            <div class="mt-10 flex justify-between items-center">
                <div>Status : <span class="{{
                    $request->isAproved == 'pending' ? 'text-amber-500' :
                    ($request->isAproved == 'rejected' ? 'text-red-500' :
                    ($request->isAproved == 'approved' ? 'text-green-500' : ''))
                    }}">{{ $request->isAproved }}</span></div>
                <div>
                   @if ($request->isAproved == 'pending')
                    <form action="/request/decision" method="POST">
                        @csrf
                        <button name="status" value="approved" class="button green">Approved</button>
                        <button name="status" value="rejected" class="button red">Reject</button>
                        <input type="hidden" name="id" value="{{ $request->id }}">
                    </form>
                   @endif
                </div>
            </div>
          </div>
        </div>
      </section>


</div>
<style>
    .btn{
        background-color: #E3E3E3 ;
        padding: 5px;
        border-radius: 5px;
    }
    /* .bg-red{
        background-color: red ;
    } */
</style>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<script>
    function klik(id) {
        axios.post('/api/read/notification', { id: id })
        .then(res => {
            console.log('Berhasil update', res.data)
        })
        .catch(err => {
            console.error(err)
        })
    }
</script>
@endsection