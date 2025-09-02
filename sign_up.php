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
      justify-content: center;
      align-items: flex-start;
      /* keep content top on small screens */
      overflow-y: auto;
      /* allow scroll */
      position: relative;
      padding: 5vh 2vw;
    }

    /* Background animation */
    .bg-animation {
      position: fixed;
      width: 100%;
      height: 100%;
      overflow: hidden;
      z-index: 1;
      top: 0;
      left: 0;
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

    /* Floating notes */
    .music-note {
      position: absolute;
      font-size: 3vh;
      color: rgba(71, 85, 105, 0.2);
      animation: float 6s ease-in-out infinite;
    }

    .music-note:nth-child(4) {
      top: 20%;
      left: 10%;
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
        transform: translateY(-2vh) rotate(180deg);
        opacity: 0.5;
      }
    }

    /* Form container */
    .container {
      position: relative;
      z-index: 10;
      background: rgba(255, 255, 255, 0.98);
      backdrop-filter: blur(2vh);
      border-radius: 2vh;
      padding: 5vh 4vw;
      box-shadow: 0 2vh 4vh rgba(15, 23, 42, 0.08);
      width: 60vw;
      /* desktop look */
      max-width: 500px;
      /* fixed desktop size */
      min-width: 320px;
      border: 0.3vh solid rgba(226, 232, 240, 0.8);
      animation: slideUp 0.8s ease-out;
    }

    @keyframes slideUp {
      from {
        opacity: 0;
        transform: translateY(5vh);
      }

      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .logo {
      text-align: center;
      margin-bottom: 4vh;
    }

    .logo h1 {
      font-size: 5vh;
      background: linear-gradient(135deg, #475569 0%, #334155 100%);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      margin-bottom: 1vh;
      font-weight: bold;
    }

    .logo p {
      color: #64748b;
      font-size: 2vh;
    }

    #signupForm {
      width: 100%;
    }

    .form-group {
      margin-bottom: 3vh;
      position: relative;
    }

    .form-group label {
      display: block;
      margin-bottom: 1vh;
      color: #475569;
      font-weight: 500;
      font-size: 2vh;
    }

    .form-group input {
      width: 100%;
      padding: 1.5vh 2vw;
      border: 0.3vh solid #e2e8f0;
      border-radius: 1vh;
      font-size: 2vh;
      background: rgba(255, 255, 255, 0.9);
      color: #1e293b;
    }

    .form-group input:focus {
      outline: none;
      border-color: #64748b;
      box-shadow: 0 0 0 0.5vh rgba(100, 116, 139, 0.1);
    }

    .form-group input::placeholder {
      color: #94a3b8;
    }

    .password-toggle {
      position: absolute;
      right: 2vw;
      top: 70%;
      transform: translateY(-50%);
      cursor: pointer;
      color: #64748b;
      font-size: 2.5vh;
    }

    .signup-btn {
      width: 100%;
      padding: 2vh;
      background: linear-gradient(135deg, #475569 0%, #334155 100%);
      border: none;
      border-radius: 1vh;
      color: white;
      font-size: 2.3vh;
      font-weight: 600;
      cursor: pointer;
    }

    .signup-btn:hover {
      transform: translateY(-0.5vh);
      box-shadow: 0 1vh 2.5vh rgba(71, 85, 105, 0.2);
      background: linear-gradient(135deg, #334155 0%, #1e293b 100%);
    }

    .login-link {
      text-align: center;
      color: #64748b;
      font-size: 2vh;
      margin-top: 3vh;
    }

    .login-link a {
      color: #475569;
      font-weight: 600;
      text-decoration: none;
    }

    .login-link a:hover {
      text-decoration: underline;
      color: #334155;
    }

    /* Extra small screen adjustments */
    @media (max-width: 480px) {
      .container {
        width: 90vw;
        padding: 4vh 5vw;
      }

      .logo h1 {
        font-size: 4vh;
      }

      .signup-btn {
        font-size: 2vh;
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
      <p>Create your account and start the music journey</p>
    </div>

    <form id="signupForm" method="POST" action="request.php">
      <div class="form-group">
        <label for="name">Full Name</label>
        <input type="text" id="name" name="name" placeholder="Enter your full name" required>
      </div>

      <div class="form-group">
        <label for="email">Email Address</label>
        <input type="email" id="email" name="email" placeholder="Enter your email" required>
      </div>

      <div class="form-group">
        <label for="mo">Mobile Number</label>
        <input type="number" id="mo" name="mo" placeholder="Enter your mobile number in 10 digit" required>
      </div>

      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Create a password" required>
        <span class="password-toggle" onclick="togglePassword()">👁️</span>
      </div>

      <div class="form-group">
        <label for="confirm-password">Confirm Password</label>
        <input type="password" id="confirm-password" name="confirm-password" placeholder="Re-enter your password"
          required>
      </div>

      <button type="submit" name="sign_up" class="signup-btn">Sign Up</button>
    </form>

    <div class="login-link">
      Already have an account? <a href="./login.php">Sign in</a>
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

    document.getElementById('signupForm').addEventListener('submit', function (e) {
      const btn = document.querySelector('.signup-btn');
      btn.innerHTML = '✓ Creating Account...';
      btn.style.background = 'linear-gradient(135deg, #4CAF50 0%, #45a049 100%)';
    });
  </script>
</body>

</html>