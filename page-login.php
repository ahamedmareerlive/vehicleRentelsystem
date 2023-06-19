<?php
/*
Template Name: Login Page
*/
?>

<?php include_once 'topnav.php'; ?>
<?php include_once 'Database/UnitOfWork.php'; ?>
<?php include_once 'util/core.php'; ?>
<?php startSession(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Login | Colombo Taxi Sri Lanka</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <?php include_once 'css.php'; ?>
    <style>
        .login-box {
  background-color: #fff;
  border-radius: 10px;
  padding: 30px;
  max-width: 500px;
  width: 90%;
  margin: 0 auto;
  animation-name: fade-in;
  animation-duration: 1s;
}
.login-box h2 {
  margin-top: 0;
  margin-bottom: 30px;
  text-align: center;
  color: #333;
}
.login-box input[type="text"],
.login-box input[type="password"] {
  width: 100%;
  padding: 10px;
  margin-bottom: 20px;
  border-radius: 5px;
  border: none;
  box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
}
.login-box input[type="submit"] {
  background-color: #ff5f6d;
  border: none;
  color: #fff;
  padding: 10px;
  border-radius: 5px;
  cursor: pointer;
  transition: background-color 0.3s ease-in-out;
}
.login-box input[type="submit"]:hover {
  background-color: #e53d59;
}
@keyframes fade-in {
  from {
    opacity: 0;
  }
  to {
    opacity: 1;
  }
}
@media only screen and (max-width: 768px) {
  .login-box {
    padding: 20px;
  }
  .login-box input[type="text"],
  .login-box input[type="password"] {
    padding: 8px;
  }
  .login-box input[type="submit"] {
    padding: 8px;
  }
}

    </style>

</head>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar & Hero Start -->
        <div class="container-xxl position-relative p-0">
            <?php
                topNav('login'); 
                heroHeader("Login");
            ?>
        </div>
        <!-- Navbar & Hero End -->


        <!-- Contact Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="login-box">
                    <form method="POST" id="login-form">
                        <label for="username">Username</label>
                        <input type="text" id="userName" name="userName"  />
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password"  />
                        <input type="submit" value="Login" name="login"/>
                    </form>
                </div>
            </div>
        </div>
        <!-- Contact End -->


        <!-- Footer Start -->
        <?php include_once 'footer.php'; ?>
        <!-- Footer End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <?php include_once 'js.php'; ?>
    <?php
    if(isset($_POST['login'])){
        unset($_POST['login']);
        $result = Uow::context()->User->LoginUser($_POST);
        $isLogin = !empty($result);
        
        if($isLogin){
            setSessionValue("user", $result[0]);
            setSessionValue("userType", $result[0]->userType);
            setSessionValue("isLogin", true);
            pageRedirect();
        }
        else{
            setSessionValue("isLogin", false);
            echo "<script> window.alert('User name or password wrong'); </script>";
        }

    }
  ?>


    <script type="text/javascript">
        window.onload=()=>{
            $("#login-form").validate({
                rules:{
                    userName : "required",
                    password : {required:true, minlength: 5},
                },
                messages:{
                    userName : "required*",
                    password : {
                        required: "required*",
                        minlength: "password least 5 characters long"
                    }
                },
                errorElement: "div"
            });
        };
    </script>

</body>

</html>