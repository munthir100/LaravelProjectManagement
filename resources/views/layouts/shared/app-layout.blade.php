@include("layouts.shared.includes.main")

<head>
    @yield('title')
    @include("layouts.shared.includes.head-css")
    @yield('styles')
</head>

<body>
    <div id="layout-wrapper">
        @include("layouts.shared.includes.menu")
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    @yield('page-title')
                    @yield('content')
                </div>
            </div>
            @include("layouts.shared.includes.footer")
        </div>
    </div>
    @include("layouts.shared.includes.vendor-scripts")
    <script src="{{asset('assets/js/app.js')}}"></script>
    @yield('scripts')
</body>