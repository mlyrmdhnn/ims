@extends('layouts.mainLayout')

@section('content')
<div id="app">
    <x-nav-and-side-client/>

    <section class="is-title-bar">
        <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
          <ul>
            <li>Client</li>
            <li>Notifications</li>
          </ul>
        </div>
      </section>

      <section class="section main-section grid grid-cols-1 gap-4">

        <input
        type="text"
        placeholder="Search items..."
        class="w-full px-3 py-2 rounded-lg border border-gray-300 bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
      />

        <div class="card has-table">
            <div class="card-content">
              <table>
                <thead>
                <tr>
                  <th class="image-cell"></th>
                  <th>Name</th>
                  <th>Status</th>
                  <th>Request ID</th>
                  <th>Requested At</th>
                  <th>Detail</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($notif as $n)
                    <tr class="border">
                        <td class="image-cell">
                        </td>
                        <td>{{ $n->sender->name }}</td>
                        <td>{{ $n->isAproved }}</td>
                        <td>
                          {{ $n->notification_id }}
                        </td>
                        <td data-label="Created">
                          <small class="text-gray-500" title="Oct 25, 2021">{{ $n->created_at }}</small>
                        </td>
                        <td class="actions-cell">
                        <a onClick="setRead({{ $n->id }})"
                            href="/request/detail/{{ $n->uuid }}">
                            <button class="button small green --jb-modal"  type="button">
                                <span class="icon"><i class="mdi mdi-eye"></i></span>
                              </button>
                        </a>
                        </td>
                        <td>
                            @if ($n->isRead == 0)
                            <div class="w-2 h-2 bg-red-500 rounded-full"></div>
                            @endif
                        </td>
                      </tr>
                    @endforeach

                </tbody>
              </table>
              <div class="table-pagination">
                {{-- <div class="flex items-center justify-between">
                  <div class="buttons">
                    <button type="button" class="button active">1</button>
                    <button type="button" class="button">2</button>
                    <button type="button" class="button">3</button>
                  </div>
                  <small>Page 1 of 3</small> --}}
                  {{ $notif->links() }}
                </div>
              </div>
            </div>
          </div>
      </section>
</div>


<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    // import axios from 'axios'
    const setRead = (id) => {
        // alert('kamu klik ' + id)
        axios.post(`/notification/read/${id}`, {
            id : id
        })
    }
</script>
@endsection