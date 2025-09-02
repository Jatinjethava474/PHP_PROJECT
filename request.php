<?php

session_start();

include("./database.php");

if (isset($_POST["contact"])) {

    $username = $_POST['name'];
    $email = $_POST['email'];
    $sub = $_POST['subject'];
    $msg = $_POST['message'];

    // Use parameterized query for security
    $user = $conn->prepare("INSERT INTO `contact` (`name`, `email`, `subject`, `query`) VALUES (?, ?, ?, ?)");
    $user->bind_param("ssss", $username, $email, $sub, $msg);
    $result = $user->execute();

    if ($result) {
        echo "<script>alert('✅ submit we wil contact soon!'); window.location.href='http://localhost:8081/PHP/PROJECT_PHP/';</script>";
        exit();
    } else {
        $errorMsg = $user->error;
        echo "<script>alert('❌ Not submited: $errorMsg'); window.history.back();</script>";
        exit();
    }
} else if (isset($_POST["subscribe"])) {

    $tele_no = $_POST['number'];

    $user = $conn->prepare("INSERT INTO `telegram` (`mobile_no`) VALUES (?)");
    $user->bind_param("i", $tele_no);
    $result = $user->execute();

    if ($result) {
        echo "<script>alert('✅ submit we wil add your number soon!'); window.location.href='http://localhost:8081/PHP/PROJECT_PHP/';</script>";
        exit();
    } else {
        $errorMsg = $user->error;
        echo "<script>alert('❌ Not submited: $errorMsg'); window.history.back();</script>";
        exit();
    }
} else if (isset($_POST["book"])) {

    $username = $_POST['name'];
    $email = $_POST['email'];
    $event = $_POST['event'];
    $tickets = $_POST['tickets'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $number = $_POST['num'];

    // Use parameterized query for security
    $user = $conn->prepare("INSERT INTO `booking` (`name`, `email`, `event`, `tickets`, `date`,`time`, `number`) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $user->bind_param("sssssss", $username, $email, $event, $tickets, $date, $time, $number);
    $result = $user->execute();

    if ($result) {
        echo "<script>alert('✅ Booking confirmed!'); window.location.href='http://localhost:8081/PHP/PROJECT_PHP/';</script>";
        exit();
    } else {
        $errorMsg = $user->error;
        echo "<script>alert('❌ Not submited: $errorMsg'); window.history.back();</script>";
        exit();
    }
} elseif (isset($_POST["booking_update"])) {
    $id = $_POST['id'];
    $event = $_POST['name'];
    $event = $_POST['event'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $number = $_POST['num'];
    $tickets = $_POST['tickets'];

    // Use parameterized query for security
    $update = $conn->prepare("UPDATE booking SET name = ?,event = ?, tickets = ?, date = ?, time = ?, number = ? WHERE id = ?");
    $update->bind_param("ssissis", $name, $event, $tickets, $date, $time, $number, $id);
    $result = $update->execute();

    if ($result) {
        echo "<script>alert('✅ Booking Updated!'); window.location.href='http://localhost:8081/PHP/PROJECT_PHP/user/dashboard.php';</script>";
        exit();
    } else {
        $errorMsg = $update->error;
        echo "<script>alert('❌ Not submited: $errorMsg'); window.history.back();</script>";
        exit();
    }
} elseif (isset($_GET["id"])) {
    $id = intval($_GET['id']);

    $delete = $conn->prepare("DELETE FROM booking WHERE id = ?");
    $delete->bind_param("s", $id);
    $result = $delete->execute();

    if ($result) {
        echo "<script>alert('✅ Booking Deleted !'); window.location.href='http://localhost:8081/PHP/PROJECT_PHP/user/dashboard.php';</script>";
        exit();
    } else {
        $errorMsg = $update->error;
        echo "<script>alert('❌ Not submited: $errorMsg'); window.history.back();</script>";
        exit();
    }
} else if (isset($_POST["sign_up"])) {

    $username = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mo'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm-password'];

    if ($password !== $confirmPassword) {
        echo "<script>alert('❌ Passwords do not match!'); 
        window.history.back();</script>";
        return;
    }

    // Use parameterized query for security
    $user = $conn->prepare("INSERT INTO `users` (`name`, `email`,`mobile_no`, `password`) VALUES (?, ?, ?, ?)");
    $user->bind_param("ssss", $username, $email, $mobile, $password);
    $result = $user->execute();

    if ($result) {
        echo "<script>
            setTimeout(() => {
            alert('✅ Welcome, $username! Your account has been created.'); 
            window.location.href='http://localhost:8081/PHP/PROJECT_PHP/';
            }, 500);
        </script>";
        // Optionally, start session and store user info
        $_SESSION["user"]["email"] = $email;
        exit();
    } else {
        $errorMsg = $user->error;
        echo "<script>alert('❌ Not submited: $errorMsg'); window.history.back();</script>";
        exit();
    }
} else if (isset($_POST["save"])) {
    $profilePic = $_FILES['profile_pic']['name'];
    $targetDir = "user/user_image/";

    $username = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mo'];
    $bio = $_POST['bio'];

    if (!empty($profilePic)) {

        $targetFile = $targetDir . basename($profilePic);
        if (move_uploaded_file($_FILES['profile_pic']['tmp_name'], $targetFile)) {
            $profilePic = basename($profilePic);
        } else {
            $stmtOld = $conn->prepare("SELECT image FROM users WHERE email = ?");
            $stmtOld->bind_param("s", $email);
            $stmtOld->execute();
            $resultOld = $stmtOld->get_result();
            $rowOld = $resultOld->fetch_assoc();
            $profilePic = $rowOld['image'];
        }
    } else {
        $stmtOld = $conn->prepare("SELECT image FROM users WHERE email = ?");
        $stmtOld->bind_param("s", $email);
        $stmtOld->execute();
        $resultOld = $stmtOld->get_result();
        $rowOld = $resultOld->fetch_assoc();
        $profilePic = $rowOld['image'];
    }

    // Use parameterized query for security
    $user = $conn->prepare("UPDATE `users` SET image = ?, name = ?, mobile_no = ?, bio = ? WHERE email = ?");
    $user->bind_param("sssss", $profilePic, $username, $mobile, $bio, $email);
    $result = $user->execute();

    if ($result) {
        echo "<script>
            setTimeout(() => {
            alert('✅ Done, $username! Profile Edited.'); 
            window.location.href='http://localhost:8081/PHP/PROJECT_PHP/user/dashboard.php';
            }, 500);
        </script>";
        exit();
    } else {
        $errorMsg = $user->error;
        echo "<script>alert('❌ Not submited: $errorMsg'); window.history.back();</script>";
        exit();
    }
} else if (isset($_POST["login"])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    // Use parameterized query for security
    $user = $conn->prepare("SELECT * FROM `users` WHERE email = ? AND password = ?");
    $user->bind_param("ss", $email, $password);
    $user->execute();
    $result = $user->get_result();

    if ($result->num_rows > 0) {
        echo "<script>
            setTimeout(() => {
            alert('✅ Login successful! Welcome to musicBeat!');
            window.location.href = 'http://localhost:8081/PHP/PROJECT_PHP/';
            }, 500);
        </script>";
        // Optionally, start session and store user info
        $row = $result->fetch_assoc();
        $_SESSION["user"]["email"] = $row["email"];
        exit();
    } else {
        echo "<script>
        setTimeout(() => {
            alert('❌ Invalid email or password');
            window.history.back();;
        }, 500);
        </script>";
        exit();
    }
} else if (isset($_POST["reset_password"])) {
    $email = $_POST['email'];
    $newPassword = $_POST['new_password'];
    $confirmPassword = $_POST['confirm_password'];

    if ($newPassword !== $confirmPassword) {
        echo "<script>alert('❌ Passwords do not match!'); window.history.back();</script>";
        return;
    }

    // Get email from session or POST
    $email = isset($_SESSION['user']['email']) ? $_SESSION['user']['email'] : (isset($_POST['email']) ? $_POST['email'] : null);
    if (!$email) {
        echo "<script>alert('❌ Email not found.'); window.history.back();</script>";
        exit();
    }

    // Hash the new password for security
    // $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

    $user = $conn->prepare("UPDATE `users` SET password = ? WHERE email = '$email'");
    $user->bind_param("s", $newPassword);
    $result = $user->execute();

    if ($result) {
        echo "<script>
            setTimeout(() => {
            alert('✅ Password updated successfully!'); 
            window.location.href='http://localhost:8081/PHP/PROJECT_PHP/login.php';
            }, 500);
        </script>";
        exit();
    } else {
        $errorMsg = $user->error;
        echo "<script>alert('❌ Not submited: $errorMsg'); window.history.back();</script>";
        exit();
    }

} else if (isset($_GET["logout"])) {
    // PHP cannot use JS confirm directly. Show confirm dialog in JS, then redirect if confirmed.
    echo "<script>
        if (confirm('Are you sure you want to log out?')) {
            window.location.href='request.php?logout_confirmed=true';
        } else {
            alert('❌ Logout cancelled');
            window.history.back();
        }
    </script>";
    exit();
} else if (isset($_GET["logout_confirmed"])) {
    session_unset();
    session_destroy();
    header("Location: http://localhost:8081/PHP/PROJECT_PHP/index.php");
    exit();
} else {
    echo "<script>alert('❌ Invalid request'); window.history.back();</script>";
    exit();
}
?>