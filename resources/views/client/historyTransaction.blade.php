@extends('layouts.mainLayout')

@section('content')
<div id="app">
    <x-nav-and-side-client/>


    <section class="is-title-bar">
        <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
          <ul>
            <li>Client</li>
            <li>History</li>
            <li>Transaction</li>
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
                  <th>Title</th>
                  <th>Transaction No</th>
                  <th>Customer</th>
                  <th>Transaction At</th>
                  <th>Detail</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($requests as $request)
                    <tr class="border">
                        <td class="image-cell">
                        </td>
                        <td>{{ $request->transaction->title }}</td>
                        <td>{{ $request->transaction_no }}</td>
                        <td>
                          {{ $request->ownerTransaction->name }}
                        </td>
                        <td data-label="Created">
                          <small class="text-gray-500" title="Oct 25, 2021">{{ $request->created_at }}</small>
                        </td>
                        <td class="actions-cell">
                        <a href="detail/transaction/{{ $request->transaction_no }}">
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
                <div class="flex items-center justify-between">
                  {{-- <div class="buttons">
                    <button type="button" class="button active">1</button>
                    <button type="button" class="button">2</button>
                    <button type="button" class="button">3</button>
                  </div>
                  <small>Page 1 of 3</small> --}}
                  {{ $requests->links() }}
                </div>
              </div>
            </div>
          </div>
      </section>
</div>
@endsection