<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BERU | ADMIN LOGIN</title>
    <link rel="stylesheet" href="{{asset('css/login.css')}}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

</head>
<body>
    
    <h1>Login</h1>
<form action="{{route('admin.do.login')}}" method="post">
    @csrf
  <div class="row">
    @if (session()->has('danger'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{session('danger')}}
        <input type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        
      </div>
    @endif
    @if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{session('success')}}
        <input type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        
      </div>
    @endif
    <label for="email">Username</label>
    <input type="text" name="username" value="{{old('username')}}" required>
  </div>
  <div class="row">
    <label for="password">Password</label>
    <input type="password" name="password">
  </div>
    <input type="checkbox" name="remember_me" id=""> Remember Me <br>
  <button type="submit">Login</button>
</form>
</body>
</html>