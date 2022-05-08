<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8">
  <title>Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="icon" href="{{ asset('fav.ico') }}">
</head>

<body>

  <body class="text-center">
    <div class="container" style="width: 300px; margin-top: 100px;">
      <form class="form-signin" method="post" action="customersignin" enctype="multipart/form-data">
        @csrf
        <h1 class="h3 mb-3 font-weight-normal">Sign in</h1>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" name="inputEmail" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
        <br>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="inputPassword" id="inputPassword" class="form-control" placeholder="Password" required>
        <br><br>
        <button class="btn btn-md btn-primary " type="submit">Sign in</button>
        <br><br>
        <a href="/customersignup" style="cursor: pointer;">Don't have an account?</a>
        <p class="mt-5 mb-3 text-muted">&copy; 2020-2021</p>
      </form>
    </div>
  </body>


</html>