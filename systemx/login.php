<?php
session_start();
ob_start();
error_reporting(0);
header('Content-Type: text/html; charset=utf-8');
ini_set('error_reporting', E_ALL^E_NOTICE);
define("GUVENLIK",true);
include "../includes/config/config.php";
$adminsorgusu = $db->prepare("select * from yonetici where user_adi ='$_SESSION[admin_username]'");
$adminsorgusu->execute();
if ($adminsorgusu->rowCount()===1) {
    header("Location:index.php");
}
?><!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <title>Yönetici Giriş Sayfası</title>
    
    <!-- page css -->
    <link href="dist/css/pages/login-register-lock.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="dist/css/style.min.css" rel="stylesheet">
    <link href="dist/css/pages/progressbar-page.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>


<body class="horizontal-nav skin-megna card-no-border">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->

    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <section id="wrapper">
        <div class="login-register" style="background:url(support/images/bg.jpg); background-size:cover">
            <div class="form-group" style="text-align: center">
                <img src="../images/logo/panel_logo.png" alt="">
            </div>
            <div class="login-box card">
                <div class="card-body">


                    <form class="form-horizontal form-material" onSubmit="return girisyap(this)" id="logining"   name="form1"  action="javascript:void(0);" method="POST">



                        <br>
                        <h3 class="box-title m-b-20">Yönetim Paneli</h3>
                        <div class="form-group ">

                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text" style="border:0">
                                        <i class="fa fa-user"></i>
                                    </div>
                                </div>
                                <input type="text" class="form-control" name="user" placeholder="Kullanıcı Adı" required style="padding-left: 10px;">
                            </div>

                        </div>
                        <div class="form-group">

                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text" style="border:0">
                                        <i class="fa fa-key"></i>
                                    </div>
                                </div>
                                <input type="password" class="form-control" name="password" placeholder="Şifre" required style="padding-left: 10px;">
                            </div>

                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck1">
                                    <label class="custom-control-label" for="customCheck1">Beni Hatırla</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group text-center" style="margin-bottom: 0 !important;">
                            <div class="col-xs-12 p-b-20">
                                <button class="btn btn-block btn-lg btn-info " type="submit" name="girissene" value="" onClick="girisyap();">Giriş</button>
                            </div>
                        </div>


                    </form>


                </div>
                <div  id="sonuc"></div>
            </div>




        </div>

    </section>


    
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->


    <script src="../assets/node_modules/jquery/jquery-3.2.1.min.js"></script>

    <script src="../assets/js/custom.js"></script>

    <!-- Bootstrap tether Core JavaScript -->
    <script src="../assets/node_modules/popper/popper.min.js"></script>
    <script src="../assets/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>

    <!--Custom JavaScript -->

    
</body>

</html>