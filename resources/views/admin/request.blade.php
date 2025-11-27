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

      <section class="section main-section grid grid-cols-1 gap-4">
        {{-- <div class="card">
            <div class="card-content rounded-2xl bg-gray-600 text-gray-300">
                <div class="flex items-center">
                    From:
                </div>
              <div class="flex items-center justify-center mt-4">
                <div class="text-center">
                    <span class="md:text-2xl font-semibold">Title</span>
                    <p class="font-light">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptas eos sint dolores explicabo quidem delectus asperiores minus maiores quisquam, exercitationem doloremque officia officiis a culpa earum consequuntur dolore debitis totam!</p>
                </div>
            </div>
            <div class="flex justify-center items-center mt-6">
                <div class="text-center">
                    <span class="md:text-2xl font-semibold">Description</span>
                    <p class="font-light">Lorem ipsum dolor sit amet consectetur adipisicing elit. Error quis, fuga saepe vero id aspernatur nisi veritatis distinctio labore ipsa suscipit facilis iusto, magni facere deserunt nam sunt deleniti aliquid.</p>
                </div>
            </div>
            <div class="mt-10 flex justify-between items-center">
                <div>Status : <span>Pending</span></div>
                <div>
                    <button class="button green">Approved</button>
                    <button class="button red">Reject</button>
                </div>
            </div>
          </div>
        </div>
        <div class="card">
            <div class="card-content rounded-2xl bg-gray-600 text-gray-300">
                <div class="flex items-center">
                    From:
                </div>
              <div class="flex items-center justify-center mt-4">
                <div class="text-center">
                    <span class="md:text-2xl font-semibold">Title</span>
                    <p class="font-light">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptas eos sint dolores explicabo quidem delectus asperiores minus maiores quisquam, exercitationem doloremque officia officiis a culpa earum consequuntur dolore debitis totam!</p>
                </div>
            </div>
            <div class="flex justify-center items-center mt-6">
                <div class="text-center">
                    <span class="md:text-2xl font-semibold">Description</span>
                    <p class="font-light">Lorem ipsum dolor sit amet consectetur adipisicing elit. Error quis, fuga saepe vero id aspernatur nisi veritatis distinctio labore ipsa suscipit facilis iusto, magni facere deserunt nam sunt deleniti aliquid.</p>
                </div>
            </div>
            <div class="mt-10 flex justify-between items-center">
                <div>Status : <span>Pending</span></div>
                <div>
                    <button class="button green">Approved</button>
                    <button class="button red">Reject</button>
                </div>
            </div>
          </div>
        </div> --}}
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
                <div class="flex items-center justify-between">
                  <div class="buttons">
                    <button type="button" class="button active">1</button>
                    <button type="button" class="button">2</button>
                    <button type="button" class="button">3</button>
                  </div>
                  <small>Page 1 of 3</small>
                </div>
              </div>
            </div>
          </div>
      </section>


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