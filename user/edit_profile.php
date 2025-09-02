<?php
session_start();
include("../database.php");


// Check if ID is provided
if (!isset($_GET['email'])) {
    die("❌ Booking Email not provided!");
}

$email = trim(strtolower($_GET['email']));

$stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();
$users = $result->fetch_assoc();

if (!$users) {
    $users = [
        "name" => "",
        "email" => $email,
        "mobile_no" => "",
        "image" => "",
        "bio" => "Music Lover & Event Enthusiast"
    ];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MusicBeat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        body {
            background: #f8f9fa;
        }

        .edit-profile-card {
            max-width: 700px;
            margin: 50px auto;
            border-radius: 20px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            padding: 30px;
            background: #fff;
        }

        .profile-pic {
            width: 120px;
            height: 120px;
            object-fit: cover;
            border-radius: 50%;
            border: 4px solid #0d6efd;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="edit-profile-card">
            <h3 class="text-center mb-4"><i class="fa-solid fa-pen-to-square me-2"></i> Edit Profile</h3>
            <form action="../request.php" method="POST" enctype="multipart/form-data">

                <!-- Profile Picture -->
                <div class="text-center mb-4">

                    <?php
                    $defaultImg = "user_image/user2.png";
                    $img = !empty($users['image']) ? basename($users['image']) : "";

                    $checkPath = "user_image/" . $img;

                    if (!empty($img) && file_exists($checkPath)) {
                        $profilePic = $checkPath;
                    } else {
                        $profilePic = $defaultImg;
                    }
                    ?>

                    <img src="<?php echo $profilePic ?>" alt="User Photo" class="profile-pic">
                    <div class="mt-2">
                        <input type="file" name="profile_pic" class="form-control w-50 mx-auto">
                    </div>
                </div>

                <!-- Full Name -->
                <div class="mb-3">
                    <label class="form-label"><i class="fa-solid fa-user me-2"></i>Full Name</label>
                    <input type="text" class="form-control" name="name" placeholder="enter full name"
                        value="<?php echo htmlspecialchars($users['name']); ?>" required>
                </div>

                <!-- Email -->
                <div class="mb-3">
                    <label class="form-label"><i class="fa-solid fa-envelope me-2"></i>Email</label>
                    <input type="email" class="form-control" name="email" placeholder="enter email"
                        value="<?php echo htmlspecialchars($users['email']); ?>" readonly>
                </div>

                <!-- Phone -->
                <div class="mb-3">
                    <label class="form-label"><i class="fa-solid fa-phone me-2"></i>Phone</label>
                    <input type="text" class="form-control" name="mo" placeholder="+91 1234567890"
                        value="<?php echo htmlspecialchars($users['mobile_no']); ?>" required>
                </div>

                <!-- Bio -->
                <div class="mb-3">
                    <label class="form-label"><i class="fa-solid fa-info-circle me-2"></i>Bio</label>
                    <textarea class="form-control" name="bio" rows="3"><?php
                    echo htmlspecialchars($users['bio'] ?: 'Music Lover & Event Enthusiast'); ?></textarea>


                </div>

                <!-- Buttons -->
                <div class="d-flex justify-content-between">
                    <a href="dashboard.php" class="btn btn-secondary"><i class="fa-solid fa-arrow-left"></i> Cancel</a>

                    <button class="btn btn-success" name="save" onclick="return validateProfileForm(event)">Save
                        Changes</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function validateProfileForm(e) {
            const name = document.querySelector('[name="name"]').value.trim();
            const email = document.querySelector('[name="email"]').value.trim();
            const phone = document.querySelector('[name="mo"]').value.trim();
            const bio = document.querySelector('[name="bio"]').value.trim();

            if (name.length < 3) {
                alert("Full Name must be at least 3 characters.");
                e.preventDefault();
                document.querySelector('[name="name"]').focus();
                return false;
            }
            if (!/^\S+@\S+\.\S+$/.test(email)) {
                alert("Enter a valid email address.");
                e.preventDefault();
                document.querySelector('[name="email"]').focus();
                return false;
            }
            if (!/^\+?\d{10}$/.test(phone.replace(/\s/g, ''))) {
                alert("Enter a valid phone number in 10 digit.");
                e.preventDefault();
                document.querySelector('[name="mo"]').focus();
                return false;
            }
            if (bio.length < 5) {
                alert("Bio must be at least 5 characters.");
                e.preventDefault();
                document.querySelector('[name="bio"]').focus();
                return false;
            }
            return true;
        }
    </script>

</body>

</html>