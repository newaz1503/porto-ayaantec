<script src="{{  asset('backend_asset') }}/assets/node_modules/jquery/jquery-3.2.1.min.js"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="{{  asset('backend_asset') }}/assets/node_modules/popper/popper.min.js"></script>
<script src="{{  asset('backend_asset') }}/assets/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- slimscrollbar scrollbar JavaScript -->
<script src="{{  asset('backend_asset') }}/dist/js/perfect-scrollbar.jquery.min.js"></script>
<!--Wave Effects -->
<script src="{{  asset('backend_asset') }}/dist/js/waves.js"></script>
<!--Menu sidebar -->
<script src="{{  asset('backend_asset') }}/dist/js/sidebarmenu.js"></script>
<!--stickey kit -->
<script src="{{  asset('backend_asset') }}/assets/node_modules/sticky-kit-master/dist/sticky-kit.min.js"></script>
<script src="{{  asset('backend_asset') }}/assets/node_modules/sparkline/jquery.sparkline.min.js"></script>
<!--Custom JavaScript -->
<script src="{{  asset('backend_asset') }}/dist/js/custom.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.3.0/dist/sweetalert2.all.min.js"></script>
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
{!! Toastr::message() !!}
<script>
    $(function($) {
        $.fabrowser();
    });

</script>

<script>
    @foreach ($errors->all() as $error)
        toastr.error("{{$error}}")
    @endforeach
</script>
@yield('script')