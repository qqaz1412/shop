
<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    include 'system/class.php';
    $Patiphan = new classwebshop;
    $web_config = $Patiphan->web_config();
    ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $web_config['title']; ?></title>
    <link rel="icon" type="image" href="<?php echo $web_config['logo']; ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Kanit&amp;display=swap">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript" src="assets/js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    </head>
<body>
    <?php
    require 'vendor/autoload.php';
    $router = new AltoRouter();
    include 'layouts/navbar.php';
    if(empty($_SESSION['id'])){
        //Pages/Account
        $router->map('GET','/',function(){
            include 'pages/account/login.php';
        });
        $router->map('GET','/login',function(){
            include 'pages/account/login.php';
        });
        $router->map('GET','/register',function(){
            include 'pages/account/register.php';
        });
    }else{
        //Pages
        $router->map('GET','/',function(){
            include 'pages/home.php';
        });
        $router->map('GET','/home',function(){
            include 'pages/home.php';
        });
        //Pages/Shop
        $router->map('GET','/shop',function(){
            include 'pages/shop/index.php';
        });
        //Pages/Topup
        // $router->map('GET','/giftvoucher',function(){
        //     include 'pages/topup/giftvoucher.php';
        // });
        $router->map('GET','/topup',function(){
            include 'pages/topup/index.php';
        });
        //Pages/Test
        $router->map('GET','/test',function(){
            include 'pages/test/index.php';
        });
        //Pages/history
        $router->map('GET','/history_shop',function(){
            include 'pages/history/shop.php';
        });
        //Pages/Account
        $router->map('GET','/changepassword',function(){
            include 'pages/account/changepassword.php';
        });
    }
    $match = $router->match();
    if( is_array($match) && is_callable( $match['target'] ) ) {
        call_user_func_array( $match['target'], $match['params'] ); 
    } else {
        if(empty($_SESSION['id'])){
            include 'pages/account/login.php';
        }else{
            include 'pages/home.php';
        }
    }
    ?>
    <br><br><br><br><br>
<div class="footer relative" style="background-color: #363636;">
    <footer class="text-black text-md-start">
        <div class="container p-5">
            <div class="row">
                <div class="col-md-4 col-12">
                    <h5 class="text-uppercase footer-brand">เพิ่มเติม</h5>
                    <p class="footer-desc text-black-50"><?php echo $web_config['textmoredetails']; ?></p>
                </div>
                <div class="col-lg-4"></div>
                <!--<div class="col-md-4 col-12 d-flex align-items-center flex-column w-100">
                    <p class="text-uppercase text-center">ติดตามข่าวสาร</p>
                    <iframe src="https://discord.com/widget?id=<?php echo $web_config['discord']; ?>&theme=dark" width="350" height="250" allowtransparency="true" frameborder="0" sandbox="allow-popups allow-popups-to-escape-sandbox allow-same-origin allow-scripts"></iframe>
                </div> -->
            </div>
        </div>
        <div class="text-center p-3 footer-website-bg footer-text text-white" style="background-color: #1B1B1B;">© 2021 Copyright
        <a class="footer-text text-white" href="/">PANUPONG</a>
        </div>
    </footer>
</div>
</body>
</html>