@extends('layouts.mainLayout')

@section('content')
<div id="app">
    <x-nav-and-side-client/>

    <section class="is-title-bar">
        <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
          <ul>
            <li>Client</li>
            <li>History</li>
            <li>Request</li>
          </ul>
        </div>
      </section>

      <x-table :requests="$requests"/>
</div>
@endsection