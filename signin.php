<?php include('css.php');
session_start();
if(isset($_SESSION['username'])){ header('Location: massage.php'); }
?>
<body class="bg-light">
<form action='javascript:void(0)' onsubmit="signin()">
<div class="container">
    <div class="row align-items-center justify-content-center min-vh-100 gx-0">
        <div class="col-12 col-md-5 col-lg-4">
            <div class="card card-shadow border-0">
                <div class="card-body">
                    <div class="row g-6">
                        <div class="col-12">
                            <div class="text-center">
                                <h3 class="fw-bold mb-2">Sign In</h3>
                                <p>Login to your account</p>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-floating">
                                <input type="email" class="form-control" id="signin-email" placeholder="Email">
                                <label for="signin-email">Email</label>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-floating">
                                <input type="password" class="form-control" id="signin-password" placeholder="Password">
                                <label for="signin-password">Password</label>
                            </div>
                        </div>

                        <div class="col-12">
                            <button class="btn btn-block btn-lg btn-primary w-100" type="submit">Sign In</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Text -->
            <div class="text-center mt-8">
                <p>Don't have an account yet? <a href="signup.php">Sign up</a></p>
                <p><a href="password-reset.html">Forgot Password?</a></p>
            </div>
        </div>
    </div> <!-- / .row -->
</div>
</form>
<?php include('footer.php')?>
