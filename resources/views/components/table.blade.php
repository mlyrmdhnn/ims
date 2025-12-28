<section class="section main-section grid grid-cols-1 gap-4">

  <form action="" method="GET" class="flex section main-section">
    <input
    type="text"
    placeholder="Search items..."
    name="search"
    class="w-full px-3 py-2 rounded-lg border border-gray-300 bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
  />
<button class="button green" type="submit">Search</button>
  </form>
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
                @foreach ($requests as $request)
                <tr class="border">
                    <td class="image-cell">
                    </td>
                    <td>{{ $request->sender->name }}</td>
                    <td>{{ $request->isAproved }}</td>
                    <td>
                      {{ $request->notification_id }}
                    </td>
                    <td data-label="Created">
                      <small class="text-gray-500" title="Oct 25, 2021">{{ $request->created_at }}</small>
                    </td>
                    <td class="actions-cell">
                    <a href="/request/detail/{{ $request->uuid }}">
                        <button class="button small green --jb-modal"  type="button">
                            <span class="icon"><i class="mdi mdi-eye"></i></span>
                          </button>
                    </a>
                    </td>
                  </tr>
                @endforeach

            </tbody>
          </table>
          <div class="table-pagination">
            {{ $requests->links() }}
          </div>
        </div>
      </div>
  </section>