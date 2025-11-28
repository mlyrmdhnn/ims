@extends('layouts.mainLayout')

@section('content')
{{-- @dd($request) --}}
<div id="app">
    {{-- @dd($requests) --}}
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

    <x-table :requests="$requests"/>

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