<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="icon" href="{{ asset('fav.ico') }}">
  <title>Customer SignUp</title>
</head>


<body class="text-center">
  <div class="container" style="width: 300px; margin-top: 100px;">
    <form class="form-signup" method="post" action="customerregister" enctype="multipart/form-data">
      @csrf
      <h1 class="h3 mb-3 font-weight-normal">Customer Registration</h1>
      <label for="inputName" class="sr-only">Name</label>
      <input type="text" name="inputName" id="inputName" class="form-control" placeholder="Enter your Name" required autofocus>
      <br>
      <label for="inputEmail" class="sr-only">Email address</label>
      <input type="email" name="inputEmail" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
      <br>
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" name="inputPassword" id="inputPassword" class="form-control" placeholder="Password" required>
      <br>
      <p>Select a Profile Pic</p>
      <label for="inputImage" class="sr-only">Profile Pic</label>
      <input type="file" name="inputImage" id="inputImage" class="form-control" required>
      <br><br>
      <button class="btn btn-md btn-primary " type="submit">SignUp</button>
      <br><br>
      <p class="mt-5 mb-3 text-muted">&copy; 2020-2021</p>
    </form>
  </div>
</body>

</html>