<?php
/*
Template Name: Register Page
*/

?>

<?php include_once 'topnav.php'; ?>
<?php include_once 'Database/UnitOfWork.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Register | Colombo Taxi Sri Lanka</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <?php include_once 'css.php'; ?>

    <style>
 
 .container  .title{
     font-size: 25px;
     font-weight: 500; 
     position: relative;
 }
 .container .title::before{
     content: '';
     position: absolute;
     left: 0;
     bottom: 0;
     height: 3px;
     width: 30px;
     background: #000;
 }
 .container form .user_details{
     display: flex;
     flex-wrap: wrap;
     justify-content: space-between;
 }
 form .user_details .input_pox{
     margin-bottom: 15px;
     margin: 20px 0 12px 0;
     width: calc(100% / 2 - 20px);
 }
 .user_details .input_pox .datails{
     display: block;
     font-weight: 500;
     margin-bottom: 5px;
 }
 .user_details .input_pox input{
     height: 45px;
     width: 100%;
     outline: none;
     border-radius: 5px;
     border: 1px solid #ccc;
     padding-left: 15px;
     font-size: 16px;
     border-bottom-width: 2px;
     transition: all 0.3s ease;
 
 }
 .user_details .input_pox input:focus,
 .user_details .input_pox input:valid{
 border-color: #9b59b6;
 }
 form .gender_details .gender_title{
     font-size: 20px;
     font-weight: 500;
 }
 form .gender_details .category{
     display: flex;
     width: 80%;
     margin: 14px 0;
     justify-content: space-between;
 }
 .gender_details .category label{
 display: flex;
 }
 .gender_details .category .dot{
 height: 18px;
 width: 18px;
 background: #d9d9d9;
 border-radius: 50%;
 margin-right: 10px;
 border: 5px solid transparent;
 }
 #dot-1:checked ~ .category label .one,
 #dot-2:checked ~ .category label .two,
 #dot-3:checked ~ .category label .three{
 border-color: #d9d9d9;
 background-color: #9b59b6;
 }
 form input[type="radio"]{
     display: none;
 }
 form .button{
     height: 45px;
     margin: 45px 0;
 }
 form .button input{
     height: 100%;
     width: 100%;
     outline: none;
     color: #fff;
     border: none;
     font-size: 18px;
     font-weight: 500;
     border-radius: 5px;
     letter-spacing: 1px;
 
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
                topNav('register'); 
                heroHeader("Register");
            ?>
        </div>
        <!-- Navbar & Hero End -->


        <!-- Contact Start -->
        <div class="container-xxl py-5">
        <div class="container p-5">
                <div class="title">Registation</div>
                <form method="POST" id="register-form">
                    <div class="user_details">

                        <div class="input_pox">
                            <span class="datails">Username</span>
                            <input type="text" name="userName" id="userName" placeholder="enter your Username">
                        </div>

                        <div class="input_pox">
                            <span class="datails">Full Name</span>
                            <input type="text" name="fullName" id="fullName" placeholder="enter your full name">
                        </div>

                        <div class="input_pox">
                            <span class="datails">Password</span>
                            <input type="password" name="password" id="password" placeholder="enter your Password" >
                        </div>

                        <div class="input_pox">
                            <span class="datails">Confirm Password</span>
                            <input type="password" name="Cpassword" id="Cpassword" placeholder="enter your Password" >
                        </div>

                        <div class="input_pox">
                            <span class="datails">Phone Number</span>
                            <input type="number" name="contact" id="contact" placeholder="enter your Phone" >
                        </div>
                        <div class="input_pox">
                            <span class="datails">NIC Number</span>
                            <input type="number" name="nic" id="nic" placeholder="enter nic number">
                        </div>

                    </div>
                    <div class="gender_details">
                        <input type="radio" name="userType" id="dot-1" value="2" checked>
                        <input type="radio" name="userType" id="dot-2" value="3">
                        <span class="gender_title"> User Type</span>
                        <div class="category d-flex justify-content-start">
                            <label for="dot-1" style="margin-right: 20px;">
                                <span class="dot one"></span>
                                <span class="gender">Customer</span>
                            </label>
                            <label for="dot-2">
                                <span class="dot two"></span>
                                <span class="gender">Vehicle Owner</span>
                            </label>
                        </div>
                    </div>
                    <div class="button">
                        <input type="submit" name="register" value="Register" class="btn btn-primary">
                    </div>
                </form>
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
    if(isset($_POST['register'])){
        unset($_POST['register']);
        unset($_POST['Cpassword']);
        Uow::context()->User->AddUser($_POST);
        pageRedirect("login");
    }
  ?>


    <script type="text/javascript">
        window.onload=()=>{

            function toggleEye(className){
                const toggleBtn = $(className);
                const inputbox = $(toggleBtn.attr("toggle"));
                toggleBtn.click(()=>{
                    toggleBtn.toggleClass('fa-eye fa-eye-slash');
                    if (inputbox.attr("type") == "password") {
                        inputbox.attr("type", "text");
                    } else {
                        inputbox.attr("type", "password");
                    }
                });
            }

            $("#register-form").validate({
                rules:{
                    fullName: "required",
                    userName : "required",
                    password : {required:true, minlength: 5},
                    Cpassword : {required:true, minlength: 5, equalTo: "#password"},
                    nic : {required:true, minlength: 10, maxlength:12},
                    contact : {required:true, minlength: 10, maxlength:10}
                },
                messages:{
                    fullName : "required*",
                    userName : "required*",
                    password : {
                        required: "required*",
                        minlength: "password least 5 characters long"
                    },
                    Cpassword : {
                        required: "required*",
                        minlength: "password least 5 characters long",
                        equalTo: "Confirm password not matched"
                    },
                    nic : {
                        required: "required*",
                        minlength: "nic least 10 characters long",
                        maxlength: "nic maximum 12 characters"
                    },
                    contact : {
                        required: "required*",
                        minlength: "phone number must be 10 digits.",
                        maxlength: "phone number must be 10 digits."
                    }
                },
                errorElement: "div"
            });

            //toggleEye(".toggle-password");
            //toggleEye(".toggle-confirm-password");
        };
    </script>

</body>

</html>