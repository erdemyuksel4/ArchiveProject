<html lang="en"><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="">

    <title>Öğrenci Takip</title>

    <!-- Bootstrap core CSS -->
    <link href="<?=base_url("css/bootstrap.min.css")?>" rel="stylesheet">
    <link href="<?=base_url("css/bootstrap-reset.css")?>" rel="stylesheet">
    <!--external css-->
    <link href="<?=base_url("css/font-awesome.css")?>" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="<?=base_url("css/style.css")?>" rel="stylesheet">
    <link href="<?=base_url("css/style-responsive.css")?>" rel="stylesheet">


</head>

<body class="login-body">

    <div class="container">
        <?php echo form_open(base_url("Account/SignIn"),"class='form-signin' id='formLogIn'")?>
        <h2 class="form-signin-heading">ÖĞRENCİ TAKİP</h2>
        <div class="login-wrap w-100">
            <div id="result" class="mx-auto text-center my-2"><?php echo @$_SESSION["Error"];unset($_SESSION["Error"])?></div>
            <input type="text" class="form-control" placeholder="Kullanıcı Adı / Email Adresi" autofocus="" name="email" id="email">
            <input type="password" class="form-control" placeholder="Şifre" name="password" id="pass">
            
            <button class="btn btn-lg btn-login btn-block"  id="submit">GİRİŞ YAP</button>
            <div class="registration">
                <a class="" href="registration.html">
                    Hesap Oluştur
                </a>
            </div>
            <label class="checkbox">
                <span class="pull-right">
                    <a data-toggle="modal" href="#myModal"> Şifreni mi Unuttun ?</a>

                </span>
            </label>
        </div>

            <!-- Modal -->
           <!--  <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Forgot Password ?</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Enter your e-mail address below to reset your password.</p>
                            <input type="text" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">

                        </div>
                        <div class="modal-footer">
                            <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                            <button class="btn btn-success" type="button">Submit</button>
                        </div>
                    </div>
                </div>
            </div> -->
            <!-- modal -->

        </form>

    </div>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="<?=base_url("js/jquery-3.5.1.min.js")?>"></script>
    <script src="<?=base_url("js/bootstrap.bundle.min.js")?>"></script>



</body>
</html>