<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Responsive HTML Admin Dashboard client and company details">
    <meta name="author" content="Anil">
    <meta name="keywords"
        content="client and company details">

    <title>Client and company details</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <!-- End fonts -->

    <!-- core:css -->
    <link rel="stylesheet" href="{{ asset('admin/vendors/core/core.css') }}">
    <!-- endinject -->

    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('admin/vendors/flatpickr/flatpickr.min.css') }}">
    <!-- End plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('admin/vendors/datatables.net-bs5/dataTables.bootstrap5.css') }}">
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('admin/fonts/feather-font/css/iconfont.css') }}">
    <link rel="stylesheet"
        href="{{ asset('admin/vendors/flag-icon-css/css/flag-icon.min.css') }}">
    <!-- endinject -->
    <link rel="stylesheet" href="{{ asset('admin/vendors/easymde/easymde.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/vendors/dropify/dist/dropify.min.css') }}">
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('admin/css/demo2/style.css') }}">
    <!-- End layout styles -->
    <link rel="stylesheet" href="{{asset('admin/css/jquery.gritter.min.css')}}">
    {{-- <link rel="shortcut icon" href="{{ asset('admin/images/favicon.png') }}" /> --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    <div class="main-wrapper">

        <!-- partial:partials/_sidebar.html -->
        @include('partials.sidebar')

        <!-- partial -->

        <div class="page-wrapper">

            <!-- partial:partials/_navbar.html -->
            @include('partials.header')
            <!-- partial -->

            @yield('content')

            @include('partials.footer')

        </div>
    </div>

    <!-- core:js -->
    <script src="{{asset('admin/js/jquery-3.6.0.min.js')}}"></script>
    <script src="{{asset('admin/js/popper.min.js')}}"></script>
    <script src="{{asset('admin/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('admin/vendors/core/core.js') }}"></script>
    <script src="{{asset('admin/js/parsley.min.js')}}"></script>
    <!-- endinject -->

    <!-- Plugin js for this page -->
    <script src="{{ asset('admin/vendors/flatpickr/flatpickr.min.js') }}"></script>
    <script src="{{ asset('admin/vendors/apexcharts/apexcharts.min.js') }}"></script>
    <!-- End plugin js for this page -->
    <script src="{{asset('admin/vendors/datatables.net/jquery.dataTables.js')}}"></script>
    <script src="{{asset('admin/vendors/datatables.net-bs5/dataTables.bootstrap5.js')}}"></script>
      <!-- End plugin js for this page -->
    
      <!-- inject:js -->
    <script src="{{asset('admin/js/data-table.js')}}"></script>
    <!-- inject:js -->
    <script src="{{ asset('admin/vendors/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('admin/js/template.js') }}"></script>
    <!-- endinject -->

    <!-- Custom js for this page -->
    <script src="{{ asset('admin/js/dashboard-dark.js') }}"></script>
    <script src="{{asset('admin/js/jquery.popupoverlay.min.js')}}"></script>
    <script src="{{asset('admin/js/jquery.gritter.min.js')}}"></script>
    <script src="{{ asset('admin/js/validate.min.js') }}"></script>
    <script>
        var base_url = "{{ url('/') }}";
        var userid = "{{ Auth::user()->id }}";
    </script>
    <div class="custom-popup light width-100 dnone" id="lightCustomModal">
		<div class="padding-md">
			<h4 class="m-top-none">{{ __('This is alert message') }}</h4>
		</div>
		<div class="text-center">
			<a href="javascript:void(0);" class="btn btn-success lightCustomModal_close mr-10" onClick="onConfirm()">{{ __('Confirm') }}</a>
			<a href="javascript:void(0);" class="btn btn-danger lightCustomModal_close">{{ __('Cancel') }}</a>
		</div>
	</div>
    <a href="#lightCustomModal" class="btn btn-warning btn-small lightCustomModal_open dnone">{{ __('Edit') }}</a>
    <!-- End custom js for this page -->
    @stack('scripts')
</body>

</html>