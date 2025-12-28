@extends('layouts.mainLayout')



@section('content')
<div id="app">
    <x-nav-and-side />
    <section class="is-title-bar">
      <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
        <ul>
          <li>Admin</li>
          <li>Dashboard</li>
        </ul>
      </div>
    </section>

    <section class="section main-section">

        <div class="grid gap-6 grid-cols-1 md:grid-cols-3 mb-6">
            <div class="card">
              <div class="card-content">
                <div class="flex items-center justify-between">
                  <div class="widget-label">
                    <h3>
                      Warehouse
                    </h3>
                    <h1>
                     {{ $warehouses->count() }}
                    </h1>
                  </div>
                  <span class="icon widget-icon text-green-500"><i class="mdi mdi-warehouse mdi-48px"></i></span>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-content">
                <div class="flex items-center justify-between">
                  <div class="widget-label">
                    <h3>
                      Inventory
                    </h3>
                    <h1>
                      {{ $inventories->count() }}
                    </h1>
                  </div>
                  <span class="icon widget-icon text-blue-500"><i class="mdi mdi-cube mdi-48px"></i></span>
                </div>
              </div>
            </div>

            <div class="card">
              <div class="card-content">
                <div class="flex items-center justify-between">
                  <div class="widget-label">
                    <h3>
                      Total Staff
                    </h3>
                    <h1>
                      {{ $staff->count() }}
                    </h1>
                  </div>
                  <span class="icon widget-icon text-red-500"><i class="mdi mdi-account mdi-48px"></i></span>
                </div>
              </div>
            </div>
          </div>

        <h2 style="
            font-size:18px;
            font-weight:600;
            margin-bottom:12px;
            color:#1f2937;
        ">
            Warehouse List
        </h2>

        <div style="overflow-x:auto; margin-bottom:40px;">
            <table style="
                width:100%;
                border-collapse:collapse;
                background:#ffffff;
                border-radius:8px;
                overflow:hidden;
            ">
                <thead>
                    <tr style="background:#f3f4f6;">
                        <th style="padding:12px; text-align:left; font-size:14px; color:#374151;">
                            Warehouse Name
                        </th>
                        <th style="padding:12px; text-align:left; font-size:14px; color:#374151;">
                            Location
                        </th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($warehouses as $w)
                        <tr style="border-top:1px solid #e5e7eb;">
                            <td style="padding:12px; font-size:14px; color:#111827;">
                                {{ $w->warehouse_name }}
                            </td>
                            <td style="padding:12px; font-size:14px; color:#4b5563;">
                                {{ $w->location }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- ================= PRODUCT TABLE ================= --}}
        <h2 style="
            font-size:18px;
            font-weight:600;
            margin-bottom:12px;
            color:#1f2937;
        ">
            Product Inventory
        </h2>

        <div style="overflow-x:auto;">
            <table style="
                width:100%;
                border-collapse:collapse;
                background:#ffffff;
                border-radius:8px;
                overflow:hidden;
            ">
                <thead>
                    <tr style="background:#f3f4f6;">
                        <th style="padding:12px; text-align:left; font-size:14px; color:#374151;">
                            Item Name
                        </th>
                        <th style="padding:12px; text-align:left; font-size:14px; color:#374151;">
                            SKU
                        </th>
                        <th style="padding:12px; text-align:right; font-size:14px; color:#374151;">
                            Quantity
                        </th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($inventories as $i)
                        <tr style="border-top:1px solid #e5e7eb;">
                            <td style="padding:12px; font-size:14px; color:#111827;">
                                {{ $i->item->item_name }}
                            </td>
                            <td style="padding:12px; font-size:13px; color:#6b7280;">
                                {{ $i->item->sku_product }}
                            </td>
                            <td style="
                                padding:12px;
                                font-size:14px;
                                font-weight:600;
                                color:#2563eb;
                                text-align:right;
                            ">
                                {{ $i->quantity }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </section>



    <!-- Scripts below are for demo only -->
    <script type="text/javascript" src="js/main.min.js?v=1628755089081"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
    <script type="text/javascript" src="js/chart.sample.min.js"></script>


    <script>
      !function(f,b,e,v,n,t,s)
      {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
        n.callMethod.apply(n,arguments):n.queue.push(arguments)};
        if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
        n.queue=[];t=b.createElement(e);t.async=!0;
        t.src=v;s=b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t,s)}(window, document,'script',
        'https://connect.facebook.net/en_US/fbevents.js');
      fbq('init', '658339141622648');
      fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=658339141622648&ev=PageView&noscript=1"/></noscript>

    <!-- Icons below are for demo only. Feel free to use any icon pack. Docs: https://bulma.io/documentation/elements/icon/ -->




</div>
@endsection