<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="en" class="ie6 ielt8"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="ie7 ielt8"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="ie8"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html lang="en"> <!--<![endif]-->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
    <title>Absensi SMKS Jambi Medan - Software Engineering</title>
    <link rel="stylesheet" href="{{ asset('login.scss') }}">
</head>
<body>
<div class="container">
  <section id="content">
    <form action="/proseslogin" method="POST">
        @csrf
      <h1>Login Form</h1>
      <div>
        <input type="text" placeholder="NIS" name="nis" required="" id="username" />
      </div>
      <div>
        <input type="password" placeholder="Password" name="password" required="" id="password" />
      </div>
      <div>
        <input type="submit" value="Log in" />
        <a href="#">Lost your password?</a>
        <a href="#">Register</a>
      </div>
    </form><!-- form -->
    
  </section><!-- content -->
</div><!-- container -->
</body>
</html>
</body>

</html>