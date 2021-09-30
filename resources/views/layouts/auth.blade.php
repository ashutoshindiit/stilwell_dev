<!DOCTYPE html>
<html class="no-js" lang="en">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="x-ua-compatible" content="ie=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="">
      <meta name="_token" content="{{ csrf_token() }}">
      <title>Stilwell</title>
      <!--   <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/favicon.png') }}"> -->
      <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
      <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
      <link href="{{ asset('assets/css/owl.theme.default.min.css') }}" rel="stylesheet" type="text/css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="{{ asset('assets/css/themify-icons.css') }}">
      <link href="{{ asset('assets/css/ionicons.min.css') }}" rel="stylesheet"/>
      <link href="{{ asset('assets/css/flag-icon.min.css') }}" rel="stylesheet"/>
      <link href="{{ asset('assets/css/flag-icon.min.css') }}" rel="stylesheet"/>
      <link href="{{ asset('assets/css/materialdesignicons.min.css') }}" rel="stylesheet"/>
      <link rel="stylesheet" href="{{ asset('assets/vendors/data-table/css/responsive.bootstrap.min.css') }}">
      <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&amp;display=swap" rel="stylesheet">
      <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
      <script type="text/javascript">
        var APP_URL = {!! json_encode(url('/')) !!}
      </script>
   </head>
   <body>
        <div class="preloader">
            <div class="main-loader">
                <span class="loader1"></span>
                <span class="loader2"></span>
                <span class="loader3"></span>
            </div>
        </div>

        <div id="page-container">

            @yield('content')
    
        </div>
        <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
        
        <script>
          setTimeout(function() {
          $('.preloader').addClass('loaded');
          $('body').removeClass('no-scroll-y');
        
          if ($('.preloader').hasClass('loaded')) {
             $('.preloader').delay(100).queue(function() {
              $(this).remove();
             });
          }
          },100);
        </script>

        @yield('scripts_extra')
        
    </body>
</html>
        