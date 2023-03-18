     
     <!-- Scripts -->
       <script src="assets/js/vendor.js"></script>
       <script src="assets/js/template.js"></script>
       </body>

       <!-- Mirrored from offsetcode.com/themes/messenger/2.2.0/signup.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 10 Mar 2023 19:29:31 GMT -->

       </html>
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
       <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.all.min.js"></script>
       <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.css" rel="stylesheet">
       <script>
          function signup() {
            var signup_name = $('#signup-name').val();
            var signup_email = $('#signup-email').val();
            var signup_password = $('#signup-password').val();
            var signup_phone = $('#signup-phone').val();
            var signup_date = $('#signup-date').val();
            $.post("user.php", {
                    signup_name: signup_name,
                    signup_email: signup_email,
                    signup_password: signup_password,
                    signup_phone: signup_phone,
                    signup_date: signup_date
                },
                function(data, status) {
                    alert(data);
                    if(data=='Signup success')
                    {
                        window.location.href = 'signin.php';
                    } 
                });
          }

          function signin()
          {
            var signin_email = $('#signin-email').val();
            var signin_password = $('#signin-password').val();
            $.post("signinb.php", {
                    signin_email: signin_email,
                    signin_password: signin_password
                },
                function(data) {
                    alert(data); 
                    if(data=='success')
                    {
                        window.location.href = 'massage.php';
                    }                 
                });
          }
          $('#logout').click(function()
          {
            $.get("logout.php", {
                },
                function(data) {
                    if(data==1)
                    {
                        window.location.href = 'signin.php';
                    }
                });
          });
          
       </script>