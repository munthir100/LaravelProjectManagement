<!-- Layout config Js -->
<script src="{{asset('assets/js/layout.js')}}"></script>
<!-- Bootstrap Css -->

<!-- Icons Css -->
<link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
<!-- App Css-->
@if(app()->isLocale('ar'))
<link href="{{asset('assets/css/bootstrap-rtl.min.css')}}" rel="stylesheet" type="text/css" />

<link href="{{asset('assets/css/app-rtl.min.css')}}" rel="stylesheet" type="text/css" />
@else
<link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/css/app.min.css')}}" rel="stylesheet" type="text/css" />
@endif

<!-- custom Css-->
<link href="{{asset('assets/css/custom.min.css')}}" rel="stylesheet" type="text/css" />

<link href="{{asset('assets/css/custom.css')}}" rel="stylesheet" type="text/css" />

<link href="{{asset('assets/libs/sweetalert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css" />

<!-- Your HTML content -->
@if(session('success'))
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Swal.fire({
                title: '{{__('Successfull')}}',
                text: '{{ session('success') }}',
                icon: 'success',
                confirmButtonClass: 'btn btn-primary w-xs me-2 mt-2',
                cancelButtonClass: 'btn btn-danger w-xs mt-2',
                buttonsStyling: !1,
            });
        });
    </script>
@endif

<!-- Rest of your HTML content -->
