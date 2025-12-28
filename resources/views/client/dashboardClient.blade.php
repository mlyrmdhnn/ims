@extends('layouts.mainLayout')

@section('content')

<div id="app">
    <x-nav-and-side-client/>
    <section class="is-title-bar">
        <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
          <ul>
            <li>Client</li>
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
                    Low Stock items
                  </h3>
                  <h1>
                    {{ $lowStock }}
                  </h1>
                </div>
                <span class="icon widget-icon text-green-500"><i class="mdi mdi-alert-circle mdi-48px"></i></span>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-content">
              <div class="flex items-center justify-between">
                <div class="widget-label">
                  <h3>
                    Items Total
                  </h3>
                  <h1>
                    {{ $items->count() }}
                  </h1>
                </div>
                <span class="icon widget-icon text-blue-500"><i class="mdi mdi-package mdi-48px"></i></span>
              </div>
            </div>
          </div>

          <div class="card">
            <div class="card-content">
              <div class="flex items-center justify-between">
                <div class="widget-label">
                  <h3>
                    Total Request
                  </h3>
                  <h1>
                    {{ $request->count() }}
                  </h1>
                </div>
                <span class="icon widget-icon text-red-500"><i class="mdi mdi-form-select mdi-48px"></i></span>
              </div>
            </div>
          </div>
        </div>

      </section>

    </div>

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