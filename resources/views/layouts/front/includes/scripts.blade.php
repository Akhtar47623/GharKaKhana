      <script src="{{asset('web-assets/js/jquery-3.6.0.min.js')}}"></script>
      <script src="{{asset('web-assets/js/wow.js')}}"></script>
      <script src="{{asset('web-assets/slick/slick.js')}}"></script>
      <script src="{{asset('web-assets/slick/slick.min.js')}}"></script>
      <script src="{{asset('web-assets/js/jquery.slicknav.js')}}"></script>
      <script src="{{asset('web-assets/js/fancybox.js')}}"></script>
      <script src="{{asset('web-assets/js/font-awesome.js')}}"></script>
      <script src="{{asset('web-assets/js/bootstrap.js')}}"></script>
      <script src="{{asset('web-assets/js/font.js')}}"></script>
      <script src="{{asset('web-assets/js/custom.js')}}"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/cleave.js/1.6.0/cleave.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    
 <script>
  @if(Session::has('success'))

  toastr.options =
  {
    "closeButton": true,
    "debug": false,
    "newestOnTop": false,
    "progressBar": true,
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "6000",
    "extendedTimeOut": "6000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut",
  }
  toastr.success("{{ session('success') }}");
  @endif

  @if(Session::has('error2'))
  toastr.options =
  {
    "closeButton": true,
    "debug": false,
    "newestOnTop": false,
    "progressBar": true,
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "6000",
    "extendedTimeOut": "6000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
  }
  toastr.error("{{ session('error2') }}");
  @endif

  @if(Session::has('info'))
  toastr.options =
  {
    "closeButton": true,
    "debug": false,
    "newestOnTop": false,
    "progressBar": true,
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "6000",
    "extendedTimeOut": "6000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
  }
  toastr.info("{{ session('info') }}");
  @endif

  @if(Session::has('warning'))
  toastr.options =
  {
    "closeButton": true,
    "debug": false,
    "newestOnTop": false,
    "progressBar": true,
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "6000",
    "extendedTimeOut": "6000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
  }
  toastr.warning("{{ session('warning') }}");
  @endif
</script>
@push('js')