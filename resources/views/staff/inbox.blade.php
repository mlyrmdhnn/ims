@extends('layouts.mainLayout')

@section('content')
<div id="app">
    <x-nav-and-side-staff/>
    <section class="is-title-bar">
        <div class="flex flex-col md:flex-row items-center justify-between">
            <ul>
                <li>Staff</li>
                <li>Inbox</li>
            </ul>
        </div>
    </section>
</div>
@endsection