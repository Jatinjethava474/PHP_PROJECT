<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>MusicBeat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        body { background: #f8f9fa; }
        .forgot-card { max-width: 400px; margin: 60px auto; border-radius: 20px; box-shadow: 0 5px 15px rgba(0,0,0,0.1); padding: 30px; background: #fff; }
    </style>
</head>
<body>
<div class="container">
    <div class="forgot-card">
        <h3 class="text-center mb-4"><i class="fa-solid fa-key me-2"></i> Forgot Password</h3>
        <form action="../request.php" method="POST">
            <div class="mb-3">
                <label class="form-label"><i class="fa-solid fa-envelope me-2"></i>Email</label>
                <input type="email" class="form-control" name="email" required placeholder="Enter your registered email">
            </div>
            <div class="mb-3">
                <label class="form-label"><i class="fa-solid fa-lock me-2"></i>New Password</label>
                <input type="password" class="form-control" name="new_password" required placeholder="Enter new password">
            </div>
            <div class="mb-3">
                <label class="form-label"><i class="fa-solid fa-lock me-2"></i>Confirm Password</label>
                <input type="password" class="form-control" name="confirm_password" required placeholder="Confirm new password">
            </div>
            <input type="submit" name="reset_password" class="btn btn-primary w-100" value="Reset Password">
        </form>
        <div class="mt-3 text-center">
            <a href="../login.php">Back to Login</a>
        </div>
    </div>
</div>
</body>
</html>
