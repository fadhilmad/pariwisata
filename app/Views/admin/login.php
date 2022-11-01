<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin Login </title>
    <!-- HTML5 Shim and Respond.js IE10 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 10]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Mega Able Bootstrap admin template made using Bootstrap 4 and it has huge amount of ready made feature, UI components, pages which completely fulfills any dashboard needs." />
    <meta name="keywords" content="bootstrap, bootstrap admin template, admin theme, admin dashboard, dashboard template, admin template, responsive" />
    <meta name="author" content="codedthemes" />
    <!-- Favicon icon -->

    <link rel="icon" href="<?= base_url() ?>/bn/assets/images/favicon.ico" type="image/x-icon">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/bn/assets/css/bootstrap/css/bootstrap.min.css">
    <!-- waves.css -->
    <link rel="stylesheet" href="<?= base_url() ?>/bn/assets/pages/waves/css/waves.min.css" type="text/css" media="all">
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/bn/assets/icon/themify-icons/themify-icons.css">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/bn/assets/icon/icofont/css/icofont.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/bn/assets/icon/font-awesome/css/font-awesome.min.css">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/bn/assets/css/style.css">

    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/bn/assets/pages/notification/notification.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/bn/assets/css/animate.css/css/animate.css">
</head>

<body themebg-pattern="theme1">
    <section class="login-block">
        <!-- Container-fluid starts -->
        <div class="container">

            <div class="row">
                <div class="col-sm-12">
                    <!-- Authentication card start -->

                    <form class="md-float-material form-material" action="<?= base_url() ?>/user/process" method="post">
                        <div class="text-center">
                            <img src="<?= base_url() ?>/bn/assets/images/logo-new.png" alt="logo.png">
                        </div>
                        <?= csrf_field(); ?>
                        <div class="auth-box card">
                            <div class="card-block">
                                <div class="row m-b-20">
                                    <div class="col-md-12">
                                        <h3 class="text-center">Login Admin</h3>
                                    </div>
                                </div>
                                <div class="form-group form-primary">
                                    <input type="text" name="username" class="form-control" required>
                                    <span class="form-bar"></span>
                                    <label class="float-label">Username</label>
                                </div>
                                <div class="form-group form-primary">
                                    <input type="password" name="password" class="form-control" required>
                                    <span class="form-bar"></span>
                                    <label class="float-label">Password</label>
                                </div>
                                <div class="row m-t-30">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary btn-md btn-block waves-effect waves-light text-center m-b-20">Login</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <script type="text/javascript" src="<?= base_url() ?>/bn/assets/js/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>/bn/assets/js/jquery-ui/jquery-ui.min.js "></script>
    <script type="text/javascript" src="<?= base_url() ?>/bn/assets/js/popper.js/popper.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>/bn/assets/js/bootstrap/js/bootstrap.min.js "></script>
    <!-- waves js -->
    <script type="text/javascript" src="<?= base_url() ?>/bn/assets/js/bootstrap-growl.min.js"></script>
    <script src="<?= base_url() ?>/bn/assets/pages/waves/js/waves.min.js"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="<?= base_url() ?>/bn/assets/js/jquery-slimscroll/jquery.slimscroll.js "></script>
    <!-- modernizr js -->
    <script type="text/javascript" src="<?= base_url() ?>/bn/assets/js/SmoothScroll.js"></script>
    <script src="<?= base_url() ?>/bn/assets/js/jquery.mCustomScrollbar.concat.min.js "></script>
    <!-- i18next.min.js -->
    <script type="text/javascript" src="b<?= base_url() ?>/bn/ower_components/i18next/js/i18next.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>/bn/bower_components/i18next-xhr-backend/js/i18nextXHRBackend.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>/bn/bower_components/i18next-browser-languagedetector/js/i18nextBrowserLanguageDetector.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>/bn/bower_components/jquery-i18next/js/jquery-i18next.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>/bn/assets/js/common-pages.js"></script>
    <script type="text/javascript">
        <?php if (session()->getFlashdata("flash")) { ?>

            function notify() {
                $.growl({
                    message: ' <?= session()->getFlashdata("flash")['message'] ?>',
                }, {
                    element: 'body',
                    type: '<?= session()->getFlashdata("flash")['jenis'] ?>',
                    allow_dismiss: true,
                    placement: {
                        from: 'top',
                        align: 'center'
                    },
                    animate: {
                        enter: 'animated fadeInDown',
                        exit: 'animated fadeOutDown'
                    },
                    offset: {
                        x: 30,
                        y: 30
                    },
                    delay: 2500,
                    mouse_over: false,
                    icon_type: 'class',
                    template: '<div data-growl="container" class="alert" role="alert">' +
                        '<button type="button" class="close" data-growl="dismiss">' +
                        '<span aria-hidden="true">&times;</span>' +
                        '<span class="sr-only">Close</span>' +
                        '</button>' +
                        '<span data-growl="message"></span>' +
                        '<a href="#" data-growl="url"></a>' +
                        '</div>'
                });
            };
            notify();
        <?php } ?>
    </script>
</body>

</html>