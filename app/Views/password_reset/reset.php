<!DOCTYPE html>
<html>
<head>
    <title>Reset Password</title>
</head>
<body>
    <?php if (session()->getFlashdata('message')): ?>
        <p><?php echo session()->getFlashdata('message'); ?></p>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')): ?>
        <p><?php echo session()->getFlashdata('error'); ?></p>
    <?php endif; ?>

    <form action="<?php echo site_url('password-reset/update-password'); ?>" method="post">
        <input type="hidden" name="token" value="<?php echo $token; ?>">
        <label for="password">New Password:</label>
        <input type="password" name="password" id="password" required>
        <button type="submit">Update Password</button>
    </form>
</body>
</html>
