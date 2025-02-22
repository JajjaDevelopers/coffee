<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-130582519-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-130582519-1');
    </script>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Twitter -->
    <meta name="twitter:site" content="@themepixels">
    <meta name="twitter:creator" content="@themepixels">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Azia">
    <meta name="twitter:description" content="Responsive Bootstrap 4 Dashboard Template">
    <meta name="twitter:image" content="http://themepixels.me/azia/img/azia-social.png">

    <!-- Facebook -->
    <meta property="og:url" content="http://themepixels.me/azia">
    <meta property="og:title" content="Azia">
    <meta property="og:description" content="Responsive Bootstrap 4 Dashboard Template">

    <meta property="og:image" content="http://themepixels.me/azia/img/azia-social.png">
    <meta property="og:image:secure_url" content="http://themepixels.me/azia/img/azia-social.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">

    <!-- Meta -->
    <meta name="description" content="Responsive Bootstrap 4 Dashboard Template">
    <meta name="author" content="ThemePixels">

    <link rel="icon" type="image/x-icon" href="<?= base_url('assets/img/nucafe_favicon.jpg') ?>">

    <title>Login</title>

    <!-- vendor css -->

    <link href="<?= base_url('dashboard/lib/fontawesome-free/css/all.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('dashboard/lib/ionicons/css/ionicons.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('dashboard/lib/typicons.font/typicons.css') ?>" rel="stylesheet">


    <!-- azia CSS -->
    <link rel="stylesheet" href="<?= base_url('dashboard/css/azia.css') ?>">

</head>
<style>
    input {
        border-radius: 2% !important;
    }
</style>

<body class="az-body">

    <div class="az-signin-wrapper" style="background-color:white;">
        <div class="az-card-signin" style="border:5px solid green; border-radius: 20px;">
            <!-- <h1 class="az-logo">az<span>i</span>a</h1> -->
            <div class="az-signin-header">
                <h2 style="color: green; text-align:center"><strong>NUCAFE GRADING LIMITED</strong></h2>
                <h5>Please sign in to continue</h5>
                <?php if (session()->getFlashdata('message')): ?>
                    <div class="alert alert-success">
                        <?php echo session()->getFlashdata('message'); ?>
                    </div>
                <?php endif; ?>

                <?php if (session()->getFlashdata('error')): ?>
                    <div class="alert alert-danger">
                        <?php echo session()->getFlashdata('error'); ?>
                    </div>
                <?php endif; ?>

                <?php if (session()->getFlashdata('msg')): ?>
                    <div class="alert alert-danger">
                        <?= session()->getFlashdata('msg') ?>
                    </div>
                <?php endif; ?>
                <?php if (session()->getFlashdata('error')) : ?>
                    <div class="alert alert-danger">
                        <?= session()->getFlashdata('error') ?>
                    </div>
                <?php endif; ?>
                <form id="loginform" method="post"
                    action=" <?= base_url() ?>">
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" placeholder="Enter your email" name="email" placeholder="Email" required>
                    </div><!-- form-group -->
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" placeholder="Enter your password" name="password" placeholder="Password" required>
                    </div><!-- form-group -->
                    <button type='submit' class="btn btn-az-primary btn-block" style="background-color: green; border-radius:5px">
                        Sign In
                    </button>
                </form>
            </div><!-- az-signin-header -->
            <div class="az-signin-footer">
                <p><a href="<?= base_url('password-reset/request') ?>">Forgot password?</a></p>
                <!-- <p>Don't have an account? <a href="page-signup.html">Create an Account</a></p> -->
            </div><!-- az-signin-footer -->
        </div><!-- az-card-signin -->
    </div><!-- az-signin-wrapper -->

    <script src="<?= base_url('dashboard/lib/jquery/jquery.min.js') ?>"></script>
    <script src="<?= base_url('dashboard/lib/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= base_url('dashboard/js/azia.js') ?>"></script>
    <script src="<?= base_url('dashboard/lib/ionicons/ionicons.js') ?>"></script>
    <script>
        $(function() {
            'use strict'

        });
    </script>
</body>

</html>