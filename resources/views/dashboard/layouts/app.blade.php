<!DOCTYPE html>
<html class="loading" lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-textdirection="{{ app() -> getLocale() === 'ar' ? 'rtl' : 'ltr'}}">


<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>Doudou Dashboard</title>
    <link href="{{asset('dashboard/font-awesome/css/all.css')}}" rel="stylesheet">

    <link rel="apple-touch-icon" href="{{asset('dashboard/images/ico/apple-icon-120.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('dashboard/images/ico/favicon.ico')}}">

    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@300;400;500&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('dashboard/css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('dashboard/'.getFolder().'/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('dashboard/vendors/css/vendors-rtl.min.css')}}">
    <link href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('dashboard/vendors/css/vendors-rtl.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('dashboard/vendors/css/extensions/shepherd-theme-default.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('dashboard/vendors/css/charts/apexcharts.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('dashboard/vendors/css/extensions/tether-theme-arrows.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('dashboard/vendors/css/extensions/tether.min.css')}}">
    <!-- END: Vendor CSS-->
    <!-- END: Vendor CSS-->
    <link rel="stylesheet" href="{{asset('front/css/jquery.fancybox.css')}}">
    <!-- BEGIN: Theme CSS-->
    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('dashboard/'.getFolder().'/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('dashboard/'.getFolder().'/bootstrap-extended.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('dashboard/'.getFolder().'/vendors/css/tables/datatable/datatables.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('dashboard/'.getFolder().'/colors.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('dashboard/'.getFolder().'/components.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('dashboard/'.getFolder().'/themes/semi-dark-layout.css')}}">
{{--    <script src="https://cdn.ckeditor.com/ckeditor5/35.2.0/classic/ckeditor.js"></script>--}}


    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('dashboard/'.getFolder().'/core/colors/palette-gradient.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('dashboard/'.getFolder().'/pages/card-analytics.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('dashboard/'.getFolder().'/plugins/tour/tour.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('dashboard/'.getFolder().'/core/menu/menu-types/vertical-menu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('dashboard/'.getFolder().'/pages/dashboard-analytics.css')}}">
    <!-- END: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('dashboard/vendors/css/file-uploaders/dropzone.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('dashboard/css/plugins/file-uploaders/dropzone.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('dashboard/vendors/css/extensions/datedropper.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('dashboard/vendors/css/extensions/timedropper.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('dashboard/'.getFolder().'/custom-rtl.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('dashboard/css/style-rtl.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('dashboard/css/doudou-dashboard.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />


{{--       <script src="https://cdn.ckeditor.com/4.20.0/standard/ckeditor.js"></script>--}}

    <script src="{{asset('dashboard/ckeditor/ckeditor.js')}}"></script>
{{--    <script src="https://cdn.ckeditor.com/4.4.5.1/standard-all/ckeditor.js"></script>--}}
{{--    <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/42.0.2/ckeditor5.css" />--}}


{{--  Hawam 3mk ayala w 3m 3yalkeed  --}}

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pannellum/2.5.6/pannellum.css"
          integrity="sha512-UoT/Ca6+2kRekuB1IDZgwtDt0ZUfsweWmyNhMqhG4hpnf7sFnhrLrO0zHJr2vFp7eZEvJ3FN58dhVx+YMJMt2A=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0/css/select2.min.css" />

    <!-- BEGIN: Custom CSS-->

@yield('style')
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

@if(\Illuminate\Support\Facades\Session::get('menu') == 'expanded')
    <body class="vertical-layout vertical-menu-modern 2-columns navbar-floating footer-static pace-done menu-expanded" data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">
    @else
        <body class="vertical-layout vertical-menu-modern 2-columns  navbar-floating footer-static   menu-collapsed" data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">
        @endif
    <!-- BEGIN: Header-->
    @include('dashboard.layouts.header')
    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
    @include('dashboard.layouts.menu')
    <!-- END: Main Menu-->

    <!-- BEGIN: Content -->


                <!-- Dashboard Analytics Start -->
                @yield('content')
                <!-- Dashboard Analytics end -->


    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>
    <!-- BEGIN: Footer-->


    @include('dashboard.layouts.footer')
    <!-- END: Footer-->


    <!-- BEGIN: Vendor JS-->


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>



        <script>
            $(document).ready(function() {
                $('#toggleMenu').on('click', function(e) {


                    e.preventDefault(); // Prevent default link behavior

                    let $icon = $(this).find('i.icon-disc');
                    let dataValue;

                    // Check if the icon has the class 'icon-disc'
                    if ($icon.length) {
                        dataValue = ''; // Set $data to 0
                    } else {
                        dataValue = 'expanded'; // Set $data to 'expanded'
                    }

                    // AJAX request to update session
                    $.ajax({
                        url: "{{ route('update.session') }}",
                        type: 'POST',
                        data: {
                            data: dataValue,
                            _token: '{{ csrf_token() }}' // Include CSRF token
                        },
                        success: function(response) {
                            $('#responseMessage').html('<div class="alert alert-success">' + response.message + '</div>');
                        },
                        error: function(xhr) {
                            $('#responseMessage').html('<div class="alert alert-danger">Error: ' + xhr.responseJSON.message + '</div>');
                        }
                    });
                });
            });
        </script>


    {{-- <script>
        $(document).ready(function() {
            // Check if the menu state is stored in Laravel session
            var isMenuOpen = '{{ session("isMenuOpen") }}';
            var currentClass = '{{ session("isMenuOpen") ? "icon-circle" : "icon-disc" }}';

            // Add the class to show the menu as open if necessary
            if (currentClass === 'icon-circle') {
                $('.collapse-toggle-icon').addClass(currentClass);
            }

            // Handle click event on the toggle icon
            $('.toggle-icon').click(function() {
                console.log('isMenuOpen:', isMenuOpen);
                console.log('currentClass:', currentClass);

                var icon = $(this);

                // Toggle the classes based on the current class
                if (currentClass === 'icon-disc') {
                    icon.addClass('icon-circle');
                    currentClass = 'icon-circle';
                    isMenuOpen = 'false'; // Update the menu state variable to false
                } else {
                    icon.removeClass('icon-circle');
                    currentClass = 'icon-disc';
                    isMenuOpen = 'true'; // Update the menu state variable to true
                }

                // Make the AJAX request to update the menu state
                $.ajax({
                    url: '{{ route("toggleMenuState") }}',
                    method: 'POST',
                    data: {
                        isMenuOpen: isMenuOpen
                    },
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        console.log('AJAX request succeeded');
                    },
                    error: function(xhr, status, error) {
                        console.log('AJAX request failed');
                        // Handle error if needed
                    }
                });
            });
        });
    </script> --}}

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        @if(\Illuminate\Support\Facades\Session::has('success'))

            toastr.options = {
            "closeButton": true,
            "progressBar": true,
            "positionClass": 'toast-bottom-right',

        };
        toastr.success("{{\Illuminate\Support\Facades\Session::get('success')}}");
        @endif
            @if(\Illuminate\Support\Facades\Session::has('error'))

            toastr.options = {
            "closeButton": true,
            "progressBar": true,
            "positionClass": 'toast-bottom-right',

        };
        toastr.error("{{\Illuminate\Support\Facades\Session::get('error')}}");
        @endif
            @if(\Illuminate\Support\Facades\Session::has('errors'))

            toastr.options = {
            "closeButton": true,
            "progressBar": true,
            "positionClass": 'toast-bottom-right',

        };
        @foreach ($errors->all() as $error)
        toastr.error("{{ $error }}");
        @endforeach
        @endif
    </script>
    <script
        src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ="
        crossorigin="anonymous"></script>

    <script src="{{asset('dashboard/vendors/js/vendors.min.js')}}"></script>
    @yield('scripts')
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{asset('dashboard/vendors/js/charts/apexcharts.min.js')}}"></script>
    <script src="{{asset('dashboard/vendors/js/extensions/tether.min.js')}}"></script>
    <script src="{{asset('dashboard/vendors/js/extensions/shepherd.min.js')}}"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{asset('dashboard/js/core/app-menu.js')}}"></script>
    <script src="{{asset('dashboard/js/core/app.js')}}"></script>
    <script src="{{asset('dashboard/js/scripts.js')}}"></script>

    <script src="{{asset('dashboard/js/scripts/components.js')}}"></script>


    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{asset('dashboard/js/scripts/pages/dashboard-analytics.js')}}"></script>
    <script src="{{asset('dashboard/vendors/js/extensions/dropzone.min.js')}}" type="text/javascript"></script>

    <script src="{{asset('dashboard/js/scripts/datatables/datatable.js')}}"></script>
    <script src="{{asset('dashboard/vendors/js/tables/datatable/datatables.min.js')}}"></script>
    <script src="{{asset('dashboard/ckeditor.js')}}"></script>

    <script src="{{asset('front/css/jquery.fancybox.js')}}"></script>
    <script src="{{asset('front/js/lightbox.js')}}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/pannellum/2.5.6/pannellum.js"
            integrity="sha512-EmZuy6vd0ns9wP+3l1hETKq/vNGELFRuLfazPnKKBbDpgZL0sZ7qyao5KgVbGJKOWlAFPNn6G9naB/8WnKN43Q=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- END: Page JS-->

{{--    <script>--}}
{{--        document.addEventListener('DOMContentLoaded', function() {--}}
{{--            const toggleButton = document.getElementById('toggle-menu-button');--}}

{{--            toggleButton.addEventListener('click', function() {--}}
{{--                fetch('{{ route('dashboard.toggle-menu') }}', {--}}
{{--                    method: 'POST',--}}
{{--                    headers: {--}}
{{--                        'Content-Type': 'application/json',--}}
{{--                        'X-CSRF-TOKEN': '{{ csrf_token() }}'--}}
{{--                    }--}}
{{--                })--}}
{{--                    .then(response => response.json())--}}
{{--                    .then(data => {--}}
{{--                        if (data.message === 'success') {--}}
{{--                            location.reload(); // Reload the page to update the menu class--}}
{{--                        }--}}
{{--                    })--}}
{{--                    .catch(error => console.error('Error:', error));--}}
{{--            });--}}
{{--        });--}}
{{--    </script>--}}






</body>
<!-- END: Body-->



</html>
