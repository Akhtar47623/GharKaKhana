<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Ghar Ka Khana</title>
     <title>@yield('title') - {{ config('app.name') }}</title>
    @include('layouts.admin.includes.links')
    <link rel="shortcut icon" href="assets/images/favicon.png" />
  </head>
  <body>
    <div class="container-scroller">
      @include('layouts.admin.templates.navbar')
      <div class="container-fluid page-body-wrapper">
        @include('layouts.admin.templates.sidebar')
        <div class="main-panel">
            @yield('content')
          </div>
      </div>
    </div>
    @include('layouts.admin.includes.scripts')
    {!! Toastr::message() !!}
    @stack('js')
  </body>
</html>
