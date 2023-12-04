
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

        <h1>Sign up</h1>
        <div class="container">
            <div class="sign-up-content">
                <form action="<?php echo site_url('registeruser');?>" method="POST" class="signup-form">
                    <h2 class="form-title">Sign Up</h2>
                  

                    <div class="form-textbox">
                        <label for="fullname">Full name</label>
                        <input type="text" name="fullname" id="fullname" />
                    </div>

                    <div class="form-textbox">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" />
                    </div>

                    <div class="form-textbox">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" />
                    </div>


                    <div class="form-textbox">
                        <input type="submit" class="submit" value="Signup" />
                    </div>
                </form>

                <p class="loginhere">
                    Already have an account ?<a href="<?php echo site_url('login');?>" class="loginhere-link"> Log in</a>
                </p>
            </div>
        </div>

    </div>

    <!-- JS -->
    <script src="<?php echo BASE_URL . PUBLIC_DIR . ('/assets/vendor/jquery/jquery.min.js'); ?>"></script>
    <script src="<?php echo BASE_URL . PUBLIC_DIR . ('/assets/js/main.js'); ?>"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>