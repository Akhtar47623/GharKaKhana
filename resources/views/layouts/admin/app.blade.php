<!DOCTYPE html>
<html lang="en">
  <head>
    {{-- <div id="main-wrapper">
        @include('layouts.admin.templates.header')
    <div class="container">
        @include('layouts.admin.templates.sidebar')
        <div class="page-wrapper">
            @yield('content')
            @include('layouts.admin.templates.footer')
        </div>
    </div>
</div> --}}
    {{-- @include('layouts.admin.includes.scripts') --}}
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Skydash Admin</title>
    <!-- plugins:css -->
     <title>@yield('title') - {{ config('app.name') }}</title>
    @include('layouts.admin.includes.links')
    <!-- endinject -->
    <link rel="shortcut icon" href="assets/images/favicon.png" />
  </head>
  <body>
    <div class="container-scroller">
      <div class="row p-0 m-0 proBanner" id="proBanner">
        <div class="col-md-12 p-0 m-0">
          <div class="card-body card-body-padding px-3 d-flex align-items-center justify-content-between">
            <div>
              <div class="d-flex align-items-center justify-content-between">
                <p class="mb-0 font-weight-medium me-3 buy-now-text">Free 24/7 customer support, updates, and more with this template!</p>
                <a href="https://www.bootstrapdash.com/product/skydash-admin-template" target="_blank" class="btn me-2 buy-now-btn border-0">Buy Now</a>
              </div>
            </div>
            <div class="d-flex align-items-center justify-content-between">
              <a href="https://www.bootstrapdash.com/product/skydash-admin-template/"><i class="ti-home me-3 text-white"></i></a>
              <button id="bannerClose" class="btn border-0 p-0">
                <i class="ti-close text-white"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
      <!-- partial:partials/_navbar.html -->
      @include('layouts.admin.templates.navbar')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
      @include('layouts.admin.templates.sidebar')

        <!-- partial -->
        <div class="main-panel">

                 @yield('content')
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          @include('layouts.admin.templates.footer')
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    {{-- @include('layouts.admin.includes.scripts') --}}
    <!-- External CDNs (added first to avoid conflicts) -->


<script src="{{ asset('assets/vendors/js/vendor.bundle.base.js') }}"></script>
<script src="{{ asset('assets/vendors/chart.js/chart.umd.js') }}"></script>
<script src="{{ asset('assets/vendors/datatables.net/jquery.dataTables.js') }}"></script>
<script src="{{ asset('assets/vendors/datatables.net-bs5/dataTables.bootstrap5.js') }}"></script>
<script src="{{ asset('assets/js/dataTables.select.min.js') }}"></script>
<script src="{{ asset('assets/js/off-canvas.js') }}"></script>
<script src="{{ asset('assets/js/template.js') }}"></script>
<script src="{{ asset('assets/js/settings.js') }}"></script>
<script src="{{ asset('assets/js/todolist.js') }}"></script>
<script src="{{ asset('assets/js/jquery.cookie.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/dashboard.js') }}"></script>


<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-3gJwYp4tp0ZcEw23qN0upW2iT7wA4Wp2FZl6Kp3RxnE=" crossorigin="anonymous"></script>

<!-- Bootstrap 5 Bundle (includes Popper.js) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.3/js/bootstrap.bundle.min.js" integrity="sha512-yZB6gGuLOO4PKfX9VRNn0e1wKTLTT1sA9AOf7NQod1BLXM96KHQ3d+nUysx+v7GhX5s9WqOtMeR4rE+BSz5j4g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- DataTables core JS -->
<script src="https://cdn.datatables.net/2.3.1/js/dataTables.js"></script>

<!-- DataTables Bootstrap 5 integration -->
<script src="https://cdn.datatables.net/2.3.1/js/dataTables.bootstrap5.js"></script>
  </body>
</html>
