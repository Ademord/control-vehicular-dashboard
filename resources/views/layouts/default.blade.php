
<!DOCTYPE html>
<html lang="en">
  <head>
    @include('includes.head')
    <script src="https://code.jquery.com/jquery-1.11.1.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
  </head>

  <body>
    @include('includes.header')
    
    <div class="container">
      @yield('content')
    </div>

    @include('includes.footer')
  </body>
</html>
