<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    @include('components.header')
  </head>
  <body>
    @include('components.navbar')
    <div class="container">
        <div class="p-4 mb-4 bg-light rounded-3 text-center">
            <div class="container-fluid py-5">
              <h1 class="display-5 fw-bold">Zarcony Task</h1>
              <p class="col-md-12 fs-4">List of products and brands</p>
            </div>
        </div>

        @if(session('success'))
            <div class="row">
                <div class="col-lg-12">
                    <div class="alert alert-success">
                    {{ session('success') }}
                    </div>
                </div>
            </div>
        @endif

        @yield('content')
    </div>
    @include('components.scripts')
  </body>
</html>
