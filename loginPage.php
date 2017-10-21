
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>

    <!-- Bootstrap core CSS -->
      <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">
  </head>

  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#">
          <h3>Super Striker</h3>
        </a>
    </nav>
    <div class="container">
      <div class="row">
        <div class="col-5">
          <form class="form-signin" action="/logic/login.php" method="post">
            <h2 class="form-signin-heading">Login</h2>
            <label for="username" class="sr-only">Username</label>
            <input type="text" id="username" class="form-control" placeholder="Username" name="username" required autofocus>
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" required>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
          </form>
        </div>
        <div class="col-5">
          <form class="form-signin" action="logic/register.php" method="post">
            <h2 class="form-signin-heading">Register</h2>
            <label for="newUsername" class="sr-only">Email address</label>
            <input type="text" id="newUsername" class="form-control" name="newUsername" placeholder="New Username" required autofocus>
            <label for="password" class="sr-only">Password</label>
            <input type="password" id="password" class="form-control" name="newPassword" placeholder="Password" required autofocus>
            <label for="passwordConfirm" class="sr-only">Password Confirm</label>
            <input type="password" id="passwordConfirm" class="form-control" name="newPassword2" placeholder="Confirm Password" required autofocus>
            <label for="dob" class="sr-only">DOB</label>
            <input type="date" id="dob" class="form-control" name="newDOB" placeholder="Date of Birth" required>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
            <h3> <?php echo $registermessage ?></h3>
          </form>
        </div>
      </div>


    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

  </body>
</html>
