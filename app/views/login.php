
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form by Colorlib</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="<?php echo BASE_URL . PUBLIC_DIR . ('/assets/fonts/material-icon/css/material-design-iconic-font.min.css'); ?>">

    <!-- Main css -->
    <link rel="stylesheet" href="<?php echo BASE_URL . PUBLIC_DIR . ('/assets/css/style.css'); ?>">
</head>
<body>

    <div class="main">

        <h1>Login</h1>
        <div class="container">
            <div class="sign-up-content">
                <form action="<?php echo site_url('emaillogin');?>" method="POST" class="signup-form">
    <h2 class="form-title">Login</h2>

    <div class="form-textbox">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" autocomplete="email">
    </div>

    <div class="form-textbox">
        <label for="password">Password</label>
        <input type="password" name="password" id="password" autocomplete="current-password">
    </div>

    <div class="form-textbox">
        <input type="submit" class="submit" value="Login" />
    </div>
</form>

                <p class="loginhere">
                    <a href="<?php echo site_url('register');?>" class="loginhere-link"> Create new account</a>
                </p>
            </div>
        </div>

    </div>

    <!-- JS -->
    <script src="<?php echo BASE_URL . PUBLIC_DIR . ('/assets/vendor/jquery/jquery.min.js'); ?>"></script>
    <script src="<?php echo BASE_URL . PUBLIC_DIR . ('/assets/js/main.js'); ?>"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>

<!-- 
<form action="<php echo site_url('br');?> " method="post">
        <div class="txt_field">
          <input type="text" name="email" required>
          <span></span>
          <label><i class="fas fa-user"></i>&nbsp;Email</label>
        </div>
        <div class="txt_field">
          <input type="password" name="password" required>
          <span></span>
          <label><i class="fas fa-lock"></i>&nbsp;Password</label>
        </div>
        <input type="submit" name="validate" value="Login">
        <div class="signup_link">
          Don't have an account yet? <a href="<php echo site_url('register') ?>">Register</a>
        </div>
      </form> -->