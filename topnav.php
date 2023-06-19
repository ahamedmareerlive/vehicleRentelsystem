
<?php
include_once "util/core.php";
function topNav($activeKey){

    $key = [
        'home'=> $activeKey=='home' ? 'active' :'',
        'about'=> $activeKey=='about' ? 'active' :'',
        'login'=> $activeKey=='login' ? 'active' :'',
        'register'=> $activeKey=='register' ? 'active' :'',
        'vehicle'=> $activeKey=='vehicle' ? 'active' :'',
        'contact'=> $activeKey=='contact' ? 'active' :'',
        'login'=> $activeKey=='login' ? 'active' :'',
        'register'=> $activeKey=='register' ? 'active' :'',
        'profile' => $activeKey=='profile' ? 'active' :'',
    ];

    $authNav = authNav(isLogin(), $key);
    
    echo "
    <nav class='navbar navbar-expand-lg navbar-dark bg-dark px-4 px-lg-5 py-3 py-lg-0'>
                <a href='' class='navbar-brand p-0'>
                    <h1 class='text-primary m-0'><i class='fas fa-car' style='margin-right: 20px;'></i>Colombo Taxi</h1>
                    <!-- <img src='img/logo.png' alt='Logo'> -->
                </a>
                <button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarCollapse'>
                    <span class='fa fa-bars'></span>
                </button>
                <div class='collapse navbar-collapse' id='navbarCollapse'>
                    <div class='navbar-nav ms-auto py-0 pe-4'>
                        <a href='/wordpress' class='nav-item nav-link {$key['home']}'>Home</a>
                        <a href='/wordpress/vehicle' class='nav-item nav-link {$key['vehicle']}'>Vehicle</a>
                        <a href='/wordpress/about' class='nav-item nav-link {$key['about']}'>About</a>
                        <a href='/wordpress/contact' class='nav-item nav-link {$key['contact']}'>Contact</a>
                        $authNav
                    </div>
                </div>
            </nav>
    ";

}

function heroHeader($title){
    echo "
    <div class='container-xxl py-5 bg-dark hero-header mb-5'>
        <div class='container text-center my-5 pt-5 pb-4'>
            <h1 class='display-3 text-white mb-3 animated slideInDown'>$title</h1>
        </div>
    </div>
    ";
}

function authNav($isAuth, $key){
    if($isAuth){
        return "
            <a href='/wordpress/profile' class='nav-item nav-link {$key['profile']}'>Profile</a>
            <a href='/wordpress/logout' class='nav-item nav-link'>Logout</a>
        ";
    }
    else{
        return "
            <a href='/wordpress/login' class='nav-item nav-link {$key['login']}'>Login</a>
            <a href='/wordpress/register' class='nav-item nav-link {$key['register']}'>Register</a>
        ";
    }
}

?>

