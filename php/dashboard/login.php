<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - Free Bulma template</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <!-- Bulma Version 0.7.4-->
    <link rel="stylesheet" href="https://unpkg.com/bulma@0.7.4/css/bulma.min.css" />
    <link rel="stylesheet" type="text/css" href="../css/login.css">
</head>

<!-- ***** PHP ***** -->
<section>
  <?php
  session_start();

  // require_once '../global.php';

  // Get post variables
  if(isset($_POST['username']) && isset($_POST['password']))
  {

    $myusername=$_POST['username'];
    $mypassword=$_POST['password'];
    $myusername = stripslashes($myusername);
    $mypassword = stripslashes($mypassword);
    $myusername = htmlentities($myusername);
    $mypassword = htmlentities($mypassword);


    // Login
    $user_database = unserialize($_SESSION['usr_db']);

    $curr_user = $user_database->get_login_user($myusername, $mypassword);
    if ($curr_user){
      $url = '/dashboard/dashboard_index.php';
      header( "Location: $url" );
    }
  }
  // $_SESSION['usr_db'] = serialize($user_database);
  ?>
</section>
<!-- ***** END PHP ***** -->

<body>
  <section class="hero is-success is-fullheight">
    <div class="hero-body">
      <div class="container has-text-centered">
        <div class="column is-4 is-offset-4">
          <h3 class="title">Login</h3>
          <p class="subtitle">Please login to proceed.</p>
          <div class="box">
            <form method="post">
              <div class="field">
                <div class="control">
                  <input class="input is-large" type="text" placeholder="Your Username" autofocus="" name="username" value="username">
                </div>
              </div>

              <div class="field">
                <div class="control">
                  <input class="input is-large" type="password" placeholder="Your Password" name="password" value="password">
                </div>
              </div>
              <input type="submit" name="login" value="login" class="button is-block is-info is-large is-fullwidth"></input>
            </form>
          </div>
          <!-- <form method="post">
            <input type="text" name="username" value="username" />
            <input type="password" name="password" value="password" />
            <input type="submit" name="Submit" value="Submit" />
          </form> -->
          <p class="has-text-black">
            <a href="../">Sign Up</a> &nbsp;·&nbsp;
            <a href="../">Forgot Password</a> &nbsp;·&nbsp;
          </p>
        </div>
      </div>
    </div>
  </section>
  <script async type="text/javascript" src="../js/bulma.js"></script>
</body>

</html>
