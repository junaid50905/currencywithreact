<script src="{{ asset('ui/backend') }}/assets/vendors/js/vendor.bundle.base.js"></script>
<script src="{{ asset('ui/backend') }}/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="{{ asset('ui/backend') }}/assets/vendors/chart.js/chart.umd.js"></script>
<script src="{{ asset('ui/backend') }}/assets/vendors/progressbar.js/progressbar.min.js"></script>
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="{{ asset('ui/backend') }}/assets/js/off-canvas.js"></script>
<script src="{{ asset('ui/backend') }}/assets/js/template.js"></script>
<script src="{{ asset('ui/backend') }}/assets/js/settings.js"></script>
<script src="{{ asset('ui/backend') }}/assets/js/hoverable-collapse.js"></script>
<script src="{{ asset('ui/backend') }}/assets/js/todolist.js"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="{{ asset('ui/backend') }}/assets/js/jquery.cookie.js" type="text/javascript"></script>
<script src="{{ asset('ui/backend') }}/assets/js/dashboard.js"></script>
<!-- <script src="assets/js/Chart.roundedBarCharts.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/js/all.min.js"
    integrity="sha512-6sSYJqDreZRZGkJ3b+YfdhB3MzmuP9R7X1QZ6g5aIXhRvR1Y/N/P47jmnkENm7YL3oqsmI6AK+V6AD99uWDnIw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };
</script>

<script>
    @if (session('success'))
        toastr.success("{{ session('success') }}");
    @endif

    @if ($errors->any())
        toastr.error("{{ $errors->first() }}");
    @endif
</script>

@yield('scripts')
