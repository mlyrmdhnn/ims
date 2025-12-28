@extends('layouts.mainLayout')

@section('content')
{{-- @dd($notifAdmin) --}}
<div id="app">
<x-nav-and-side :notifAdmin="$notifAdmin->count()"/>
<section class="is-title-bar">
    <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
      <ul>
        <li>Admin</li>
        <li>Inbox</li>
      </ul>
    </div>
  </section>

  <section class="section main-section">
    <div class="max-w-4xl mx-auto space-y-4">

        @forelse ($notifAdmin as $n)
            <div
                class="bg-white border border-gray-200 rounded-xl p-5
                       shadow-sm hover:shadow-md transition">

                {{-- HEADER --}}
                <div class="flex items-start justify-between">
                    <h2 class="text-base font-semibold text-gray-800">
                        {{ $n->title }}
                    </h2>

                    <span class="text-xs text-gray-400">
                        {{ $n->created_at->diffForHumans() }}
                    </span>
                </div>

                {{-- BODY --}}
                <p class="mt-2 text-sm text-gray-600 leading-relaxed">
                    {{ $n->desc }}
                </p>

                {{-- FOOTER --}}
                <div class="mt-4 flex justify-between items-center">
                    <span
                        class="inline-flex items-center px-2.5 py-1
                               text-xs font-medium rounded-full
                               bg-blue-100 text-blue-700">
                        Update
                    </span>

                    @if(!$n->isRead)
                        <span
                            class="text-xs font-medium text-red-600">
                            ● Unread
                        </span>
                    @endif
                </div>
                <br>
                <button
                    onclick="setRead({{ $n->id }})"
                    class="button green">
                    Mark as read
                </button>


            </div>
        @empty
            <div class="text-center text-gray-500 py-10">
                No notifications found.
            </div>
        @endforelse

    </div>
</section>

</div>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<script>
    axios.defaults.headers.common['X-CSRF-TOKEN'] =
        '{{ csrf_token() }}';

    function setRead(id) {
        axios.post(`/notification/read/${id}`)
            .then(() => {
                location.reload();
            })
            .catch(err => {
                console.error(err);
                alert('Failed to mark as read');
            });
    }
</script>

@endsection