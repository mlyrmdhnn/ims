@extends('layouts.mainLayout')



@section('content')
haloo
{{ session('user.name') }}
<br>
as
{{ session('user.username') }}
<form action="/logout" method="POST">
    @csrf
    <button type="submit" class="bg-red-500 text-white rounded p-1 cursor-pointer">Logout</button>
</form>
@endsection