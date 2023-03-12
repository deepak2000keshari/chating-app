 <?php include('css.php')?>
 <div class="container">
 <form action="javascript:void(0)" onsubmit="signup()">
            <div class="row align-items-center justify-content-center min-vh-100 gx-0">

                <div class="col-12 col-md-5 col-lg-4">
                    <div class="card card-shadow border-0">
                        <div class="card-body">
                            <div class="row g-6">
                                <div class="col-12">
                                    <div class="text-center">
                                        <h3 class="fw-bold mb-2">Sign Up</h3>
                                        <p>Follow the easy steps</p>
                                    </div>
                                </div>
                            
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="signup-name" placeholder="Name">
                                        <label for="signup-name">Name</label>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="email" class="form-control" id="signup-email" placeholder="Email">
                                        <label for="signup-email">Email</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="number" class="form-control" id="signup-phone" placeholder="phone">
                                        <label for="signup-phone">Phone</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="date" class="form-control" id="signup-date" placeholder="date">
                                        <label for="signup-date">DOB</label>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="password" class="form-control" id="signup-password" placeholder="Password">
                                        <label for="signup-password">Password</label>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <button class="btn btn-block btn-lg btn-primary w-100" type="submit">Create Account</button>
                                </div>
                           
                            </div>
                        </div>
                    </div>

                    <!-- Text -->
                    <div class="text-center mt-8">
                        <p>Already have an account? <a href="javascript:void()">Sign in</a></p>
                    </div>

                </div>
            </div> <!-- / .row -->
</form>
        </div>
<?php include('footer.php')?>