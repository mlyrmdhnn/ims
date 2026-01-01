@extends('layouts.mainLayout')

@section('content')
<div id="app">
    <x-nav-and-side/>
    <section class="is-title-bar">
        <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
          <ul>
            <li>Admin</li>
            <li>All Staff</li>
          </ul>
        </div>
      </section>
      <section class="section main-section">
        <div class="mb-5">
            @if (session('success'))
            <p class="text-green-500">{{ session('success') }}</p>
            @endif
        </div>
        <div class="staff-grid">
            @foreach ($staff as $s)
                <div class="staff-card">
                    <h3 class="staff-name">{{ $s->name }}</h3>

                    <p class="staff-item">
                        <strong>Phone:</strong> {{ $s->phone }}
                    </p>

                    <p class="staff-item">
                        <strong>Warehouse:</strong> {{ $s->warehouse->warehouse_name }}
                    </p>

                    <p class="staff-item staff-date">
                        Work since: {{ $s->created_at->format('d M Y') }}
                    </p>
                    <p class="staff-item">
                        <a href="staff/delete/{{ $s->id }}" class="button red">Delete User</a>
                    </p>
                </div>
            @endforeach
        </div>

    </section>
</div>
<style>
    /* GRID CONTAINER */
    .staff-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 16px;
    }

    /* CARD */
    .staff-card {
        background: #ffffff;
        border: 1px solid #e5e7eb;
        border-radius: 12px;
        padding: 16px;
        box-shadow: 0 1px 3px rgba(0,0,0,0.08);
        transition: box-shadow 0.2s ease, transform 0.2s ease;
    }

    .staff-card:hover {
        box-shadow: 0 6px 16px rgba(0,0,0,0.12);
        transform: translateY(-2px);
    }

    /* TEXT */
    .staff-name {
        font-size: 16px;
        font-weight: 600;
        color: #111827;
        margin-bottom: 8px;
    }

    .staff-item {
        font-size: 14px;
        color: #374151;
        margin-bottom: 4px;
    }

    .staff-date {
        font-size: 12px;
        color: #6b7280;
        margin-top: 8px;
    }

    /* RESPONSIVE BREAKPOINT */
    @media (min-width: 768px) {
        .staff-grid {
            grid-template-columns: repeat(3, 1fr);
        }
    }
    </style>

@endsection