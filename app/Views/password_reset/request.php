<!DOCTYPE html>
<html>

<head>
    <title>Request Password Reset</title>
    <!-- vendor css -->

    <link href="<?= base_url('dashboard/lib/fontawesome-free/css/all.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('dashboard/lib/ionicons/css/ionicons.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('dashboard/lib/typicons.font/typicons.css') ?>" rel="stylesheet">


    <!-- azia CSS -->
    <link rel="stylesheet" href="<?= base_url('dashboard/css/azia.css') ?>">
</head>

<body>
    <?php if (session()->getFlashdata('message')): ?>
        <p><?php echo session()->getFlashdata('message'); ?></p>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')): ?>
        <p><?php echo session()->getFlashdata('error'); ?></p>
    <?php endif; ?>
    <div style="margin: 0 auto; width: 50%;">
    <form action="<?php echo site_url('password-reset/send-reset-link'); ?>" method="post">
        <div class="row">
            <div class="col-md-6">
                <label for="email">Email:</label>
                <input class="form-control" type="email" name="email" id="email" required>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <button class="btn btn-sm btn-light" type="submit">Send Reset Link</button>
            </div>
        </div>
    </form>
</div>

</body>

</html>
<script src="<?= base_url('dashboard/lib/jquery/jquery.min.js') ?>"></script>
<script src="<?= base_url('dashboard/lib/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<script src="<?= base_url('dashboard/js/azia.js') ?>"></script>