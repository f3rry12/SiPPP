<html lang="en">

<head>
    <title>SiPPP</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <style>
        body {
  background-color:#fff;
  -webkit-font-smoothing: antialiased;
  font: normal 14px Roboto,arial,sans-serif;
}


 </style>

<body>
    <nav class="navbar navbar-expand-sm navbar-light fixed-top" style="background-color: #ffffff;">
        <a class="navbar-brand" href="/SiPPP/public/"><img src="img/logo.jpg" alt="Logo" style="width:40px;"></a>
    </nav>
        @if(\Session::has('alert'))
    <div class="alert alert-danger" style="margin:80px;">
        <div>{{Session::get('alert')}}</div>
    </div>
    @endif
    @if(\Session::has('alert-success'))
    <div class="alert alert-success" style="margin:80px;">
        <div>{{Session::get('alert-success')}}</div>
    </div>
    @endif
    <form action="{{ url('/loginPost') }}" method="post" style="margin:80px;">
{{ csrf_field() }}
    <div class="form-group"
        <label for="username">Username:</label>
        <input type="username" class="form-control" id="usrname" name="usrname">
    </div>
    <div class="form-group">
        <label for="Password">Password:</label>
        <input type="password" class="form-control" id="pass" name="pass"></input>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-md btn-primary">Login</button>
    </div>
    </form>
    </div>

</body>
