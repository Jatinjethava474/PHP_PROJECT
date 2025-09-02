<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MusicBeat</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            position: relative;
        }

        /* Animated background elements */
        .bg-animation {
            position: absolute;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: 1;
        }

        .wave {
            position: absolute;
            width: 200%;
            height: 200%;
            background: linear-gradient(45deg, rgba(203, 213, 225, 0.3) 0%, rgba(226, 232, 240, 0.1) 100%);
            animation: wave 20s infinite linear;
            border-radius: 50%;
        }

        .wave:nth-child(1) {
            top: -50%;
            left: -50%;
            animation-delay: 0s;
        }

        .wave:nth-child(2) {
            top: -30%;
            left: -30%;
            animation-delay: -5s;
            background: linear-gradient(45deg, rgba(241, 245, 249, 0.4) 0%, rgba(248, 250, 252, 0.2) 100%);
        }

        .wave:nth-child(3) {
            top: -70%;
            left: -70%;
            animation-delay: -10s;
            background: linear-gradient(45deg, rgba(226, 232, 240, 0.2) 0%, rgba(203, 213, 225, 0.1) 100%);
        }

        @keyframes wave {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        /* Floating music notes */
        .music-note {
            position: absolute;
            font-size: 24px;
            color: rgba(71, 85, 105, 0.2);
            animation: float 6s ease-in-out infinite;
        }

        .music-note:nth-child(4) {
            top: 20%;
            left: 10%;
            animation-delay: 0s;
        }

        .music-note:nth-child(5) {
            top: 60%;
            left: 85%;
            animation-delay: -2s;
        }

        .music-note:nth-child(6) {
            top: 80%;
            left: 20%;
            animation-delay: -4s;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0px) rotate(0deg);
                opacity: 0.2;
            }

            50% {
                transform: translateY(-20px) rotate(180deg);
                opacity: 0.5;
            }
        }

        .container {
            position: relative;
            z-index: 10;
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(20px);
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 25px 50px rgba(15, 23, 42, 0.08);
            width: 500px;
            height: 600px;
            max-width: 90vw;
            border: 1px solid rgba(226, 232, 240, 0.8);
            animation: slideUp 0.8s ease-out;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(50px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .logo {
            text-align: center;
            margin-bottom: 30px;
        }

        .logo h1 {
            font-size: 2.5em;
            background: linear-gradient(135deg, #475569 0%, #334155 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .logo p {
            color: #64748b;
            font-size: 0.9em;
            margin-bottom: 10px;
        }

        .form-group {
            margin-bottom: 25px;
            position: relative;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: #475569;
            font-weight: 500;
            font-size: 0.9em;
        }

        .form-group input {
            width: 100%;
            padding: 15px 20px;
            border: 2px solid #e2e8f0;
            border-radius: 10px;
            font-size: 1em;
            transition: all 0.3s ease;
            background: rgba(255, 255, 255, 0.9);
            color: #1e293b;
        }

        .form-group input:focus {
            outline: none;
            border-color: #64748b;
            box-shadow: 0 0 0 3px rgba(100, 116, 139, 0.1);
            transform: translateY(-2px);
        }

        .form-group input::placeholder {
            color: #94a3b8;
        }

        .password-toggle {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #64748b;
            user-select: none;
            margin-top: 12px;
        }

        .password-toggle:hover {
            color: #475569;
        }

        .form-options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            font-size: 0.9em;
        }

        .remember-me {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .remember-me input[type="checkbox"] {
            width: auto;
        }

        .forgot-password {
            color: #475569;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .forgot-password:hover {
            color: #334155;
            text-decoration: underline;
        }

        .login-btn {
            width: 100%;
            padding: 15px;
            background: linear-gradient(135deg, #475569 0%, #334155 100%);
            border: none;
            border-radius: 10px;
            color: white;
            font-size: 1.1em;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .login-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s;
        }

        .login-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(71, 85, 105, 0.2);
            background: linear-gradient(135deg, #334155 0%, #1e293b 100%);
        }

        .login-btn:hover::before {
            left: 100%;
        }

        .login-btn:active {
            transform: translateY(0);
        }

        .divider {
            text-align: center;
            margin: 20px 0;
            position: relative;
            color: #64748b;
        }

        .divider::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 0;
            right: 0;
            height: 1px;
            background: #e2e8f0;
        }

        .divider span {
            background: rgba(255, 255, 255, 0.98);
            padding: 0 20px;
            font-size: 0.9em;
        }

        .social-login {
            display: flex;
            gap: 15px;
            margin-bottom: 20px;
        }

        .social-btn {
            flex: 1;
            padding: 12px;
            border: 2px solid #e2e8f0;
            border-radius: 10px;
            background: rgba(255, 255, 255, 0.9);
            cursor: pointer;
            transition: all 0.3s ease;
            text-align: center;
            font-weight: 500;
            color: #475569;
        }

        .social-btn:hover {
            border-color: #cbd5e1;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(15, 23, 42, 0.08);
            background: rgba(248, 250, 252, 1);
        }

        .signup-link {
            text-align: center;
            color: #64748b;
            font-size: 0.9em;
        }

        .signup-link a {
            color: #475569;
            text-decoration: none;
            font-weight: 600;
        }

        .signup-link a:hover {
            text-decoration: underline;
            color: #334155;
        }

        /* Responsive design */
        @media (max-width: 480px) {
            .container {
                padding: 30px 20px;
                margin: 20px;
            }

            .logo h1 {
                font-size: 2em;
            }

            .social-login {
                flex-direction: column;
                gap: 10px;
            }
        }
    </style>
</head>

<body>
   
    <div class="bg-animation">
        <div class="wave"></div>
        <div class="wave"></div>
        <div class="wave"></div>
        <div class="music-note">♪</div>
        <div class="music-note">♫</div>
        <div class="music-note">♪</div>
    </div>

    <div class="container">
        <div class="logo">
            <h1>MusicBeat</h1>
            <p>Stream Music • Book Events • Live the Beat</p>
        </div>

        <form id="loginForm" method="POST" action="request.php">
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
                <span class="password-toggle" onclick="togglePassword()">👁️</span>
            </div>

            <div class="form-options">
                <label class="remember-me">
                    <input type="checkbox" name="remember"> Remember me
                </label>
                <a href="user/forgot_password.php" class="forgot-password">Forgot Password?</a>
            </div>

            <button type="submit" class="login-btn" name="login">Sign In</button>
        </form>

        <div class="divider">
            <span>or continue with</span>
        </div>

        <div class="social-login">
            <button class="social-btn" onclick="socialLogin('google')">🎵 Google</button>
            <button class="social-btn" onclick="socialLogin('spotify')">🎶 Spotify</button>
            <button class="social-btn" onclick="socialLogin('apple')">🍎 Apple</button>
        </div>

        <div class="signup-link">
            Don't have an account? <a href="./sign_up.php">Sign up</a>
        </div>
    </div>
    

    <script>
        function togglePassword() {
            const passwordField = document.getElementById('password');
            const toggleBtn = document.querySelector('.password-toggle');

            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                toggleBtn.textContent = '🙈';
            } else {
                passwordField.type = 'password';
                toggleBtn.textContent = '👁️';
            }
        }

        function socialLogin(provider) {
            // Add loading animation
            event.target.style.transform = 'scale(0.95)';
            event.target.style.opacity = '0.7';

            setTimeout(() => {
                event.target.style.transform = 'scale(1)';
                event.target.style.opacity = '1';
                alert(`Connecting to ${provider.charAt(0).toUpperCase() + provider.slice(1)}...`);
            }, 200);
        }

        document.getElementById('loginForm').addEventListener('submit', function () {

            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;

            const btn = document.querySelector('.login-btn');
            btn.innerHTML = '✓ Signing In...';
            btn.style.background = 'linear-gradient(135deg, #4CAF50 0%, #45a049 100%)';

        });
    </script>
</body>

</html>