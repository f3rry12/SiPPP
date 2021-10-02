<html lang="en">
<head>
 <title>admin - @yield('title')</title>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
 <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
 <script src="{{ asset('js/bootstrap.min.js') }}"></script>
 <style>
 body, html {
     height: 100%;
     margin: 0;
     background-position: center;
     background-repeat: no-repeat;
     background-size: cover;
     background-attachment: fixed;
 }
 </style>
 <body>
   <nav class="navbar navbar-expand-sm navbar-light fixed-top" style="background-color: #ffffff;">
  <a class="navbar-brand btn btn-primary btn-sm" href="{{ url('admin') }}"  >dashboard</a>
   <a class="navbar-brand btn btn-danger btn-sm" href="{{ url('logout') }}" >Logout</a>
 </nav>
 <div style="margin:80px;">
@yield('content')
</div>

 </body>
