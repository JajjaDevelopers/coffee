<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request Password Reset</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <style>
        /* Center the form vertically and horizontally */
        .container {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }
        /* Form styling */
        .reset-form {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        /* Input field styling */
        .form-control {
            margin-bottom: 10px;
        }
        /* Button styling */
        .btn {
            width: 100%;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="reset-form">
            <h2 class="text-center">Reset Your Password</h2>
            <p class="text-center">Enter your email address below, and we'll send you a link to reset your password.</p>
            <form action="<?php echo site_url('password-reset/send-reset-link'); ?>" method="post">
                <input type="email" name="email" id="email" class="form-control" placeholder="Email Address" required>
                <button type="submit" class="btn btn-primary">Send Reset Link</button>
            </form>
            <?php if (session()->getFlashdata('message')): ?>
                <div class="alert alert-success mt-3">
                    <?php echo session()->getFlashdata('message'); ?>
                </div>
            <?php endif; ?>
            <?php if (session()->getFlashdata('error')): ?>
                <div class="alert alert-danger mt-3">
                    <?php echo session()->getFlashdata('error'); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom JS -->
    <script>
        // Custom JavaScript can be added here
    </script>
</body>

</html>
