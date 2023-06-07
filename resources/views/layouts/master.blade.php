<!DOCTYPE html>
<html lang="en">
<head>
    @if ( ( getenv( 'APP_ENV' ) == 'production' ) )
      <!-- Google Tag Manager -->
      @include('layouts.partials.head.gtm-head')
    @endif

    <!-- META -->
    @include('layouts.partials.head.meta')

    <title>@yield('title', config('app.name'))</title>

    <!-- Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,600' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Catamaran|Montserrat" rel="stylesheet">
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css' rel='stylesheet' type='text/css'>

    <!-- STYLES -->
    {{--
      <style id="critical">
        @section('critical-css')
        @show
      </style>
    --}}

    {{-- Loaded on every page --}}
    <link href="/css/sweetalert.css" rel="stylesheet">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    {{-- <link rel="stylesheet" href="/css/dist/mtz-main.min.css"> --}}
    {{-- <link href="/css/custom.css" rel="stylesheet" media="all"> --}}

    {{-- Default styles are included, include overwrite in child template if necessary --}}
    @section('specific-styles')
    <!-- Bootstrap -->
    {{-- <link href="css/bootstrap.min.css" rel="stylesheet"> --}}
    <link href="/css/custom-print.css" rel="stylesheet" media="print">
    @show

    <!-- SCRIPTS -->
    @include('layouts.partials.head.scripts')

    @section('specific-scripts')
    @show

    @if ( ( getenv( 'APP_ENV' ) == 'production' ) )
      @include('layouts.partials.head.production-scripts')
    @endif

    <!-- Global Spark Object -->
    <script>
        window.Spark = <?php echo json_encode(array_merge(
            Spark::scriptVariables(), []
        )); ?>;
    </script>
</head>
<body class="with-navbar">
    @if ( ( getenv( 'APP_ENV' ) == 'production' ) )
      <!-- Google Tag Manager (noscript) -->
      @include('layouts.partials.body.gtm-body')
    @endif

    <div id="spark-app" v-cloak>
        <!-- NAVIGATION -->
        @if (Auth::check())
          @include('spark::nav.user')
          {{-- @include('layouts.partials.navigation.user') --}}
        @else
            @include('spark::nav.guest')
        @endif

      <!-- MAIN CONTENT -->
      @yield('content')

      {{-- FOOTER CONTENT - Can have an overwrite in child template --}}
      @section('footer-main')
        @include('layouts.partials.footer.footer-markup-default')
      @show

      <!-- Application Level Modals -->
      @if (Auth::check())
          @include('spark::modals.notifications')
          @include('spark::modals.support')
          @include('spark::modals.session-expired')
      @endif
  </div>

  {{-- FOOTER GLOBAL SCRIPTS - Can have an overwrite if necessary --}}
  @section('footer-scripts')
    @include('layouts.partials.footer.footer-scripts')
  @show

  {{-- PAGE SPECIFIC SCRIPTS - USE OVERWRITE--}}
  @section('footer-scripts-specific')
  @show

</body>
</html>
