@php
    $total = $totalNotif->where('isAproved', 'pending')->count();
@endphp


<section class="is-hero-bar">
    <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
      <h1 class="title">
        Request
      </h1>
     <div class="flex justify-center items-center gap-4">
        <a href="/request">
            <button class="btn">All Request</button>
        </a>
        <a href="/request/pending">
            <button class="btn relative">Pending <span class="absolute -top-1 -right-1 text-red-500 text-[13px] px-1 py-[-1px] rounded-full">
                {{ $total > 9 ? '9+' : ($total > 0 ? $total : '') }}
            </span></button>
        </a>
        <a href="/request/rejected">
            <button class="btn">Rejected</button>
        </a>
        <a href="/request/approved">
            <button class="btn">Approved</button>
        </a>
     </div>

    </div>

  </section>