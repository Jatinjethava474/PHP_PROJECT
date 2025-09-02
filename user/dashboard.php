<?php
session_start();
if (!isset($_SESSION['user'])) {
    echo "<script>alert('❌ Please login to access your dashboard.'); window.location.href='../login.php';</script>";
    exit();
}

include("../database.php");

if (isset($_SESSION["user"]["email"])) {
    $email = trim(strtolower($_SESSION["user"]["email"]));
    if (!$conn) {
        die("Database connection failed.");
    }

    $name = "User";
    $phone = "";
    $img = "user2.png";
    $bio = "Music Lover & Event Enthusiast";

    //Fetch from users
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($row = $result->fetch_assoc()) {
        $name = $row["name"] ?: $name;
        $email = $row["email"] ?: $email;
        $phone = $row["mobile_no"] ?: $phone;
        $img = $row["image"] ?: "user2.png";
        $bio = $row["bio"] ?: $bio;
    }

    // Fetch from booking
    $stmt = $conn->prepare("SELECT id,event, date, time, tickets, email FROM booking WHERE email = ?");
    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }

    $stmt->bind_param("s", $email);
    $stmt->execute();
    $resultBooking = $stmt->get_result();

    // if ($resultBooking->num_rows == 0) {
    //     echo "<script>alert('Please Book your Tickets And Enjoy.');</script>";
    // }
} else {
    echo "<script>alert('Please log in to view your profile.'); window.location.href='../login.php';</script>";
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>MusicBeat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <style>
        body {
            background: #f8f9fa;
        }

        .dashboard-card {
            max-width: 1500px;
            margin: 50px auto;
            border-radius: 20px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            padding: 30px;
            background: #fff;
        }

        .profile-pic {
            width: 150px;
            height: 150px;
            padding: 2px;
            object-fit: cover;
            border-radius: 50%;
            border: 4px solid #0d6efd;
            margin-bottom: 10px;
            margin-top: 20px;
        }

        .dashboard-section {
            margin-bottom: 30px;
        }

        h4 {
            margin-bottom: 20px;
            font-weight: bold;
            color: #000000a7;
        }

        :root {
            --card-bg: #ffffff;
            --text: #1f2937;
            --muted: #6b7280;
            --accent: #6366f1;
            --ring: #e5e7eb;
        }

        .dash-card {
            max-width: 720px;
            margin-bottom: 20px;
            background: var(--card-bg);
            border: 1px solid var(--ring);
            border-radius: 10px;
            overflow: hidden;
        }

        .dash-head {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 20px 24px 10px;
        }

        .dash-head h4 {
            margin: 0;
            font-size: 1.55rem;
            letter-spacing: .2px;
            color: var(--text);
        }

        .dash-badge {
            font-size: .75rem;
            padding: 4px 10px;
            border-radius: 999px;
        }

        .dash-hr {
            height: 1px;
            border: 0;
            margin: 10px 0 0;
        }

        .dash-body {
            padding: 18px 24px 24px;
            color: var(--text);
        }

        .dash-body p {
            margin: 0;
            line-height: 1.65;
            font-size: 1rem;
        }

        .dash-body strong {
            color: #111827;
        }

        .bio {
            display: flex;
            gap: 10px;
            align-items: flex-start;
            color: var(--muted);
        }

        .bio::before {
            content: "";
            flex: 0 0 6px;
            height: 6px;
            margin-top: .7em;
            border-radius: 999px;
            background: var(--accent);
        }

        .page-title {
            text-align: center;
            margin: 30px 0 20px;
            font-size: 1.8rem;
            font-weight: 600;
            color: #1f2937;
        }

        .card {
            border-radius: 16px;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.06);
        }

        table thead {
            background: #4f46e5;
            color: #fff;
        }

        table th,
        table td {
            vertical-align: middle;
            text-align: center;
        }

        .badge-status {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.85rem;
        }

        .badge-confirmed {
            background: rgba(34, 197, 94, 0.15);
            color: #22c55e;
        }

        .badge-pending {
            background: rgba(234, 179, 8, 0.15);
            color: #eab308;
        }

        .badge-cancelled {
            background: rgba(239, 68, 68, 0.15);
            color: #ef4444;
        }

        .main {
            position: relative;
            min-height: 70vh;
            padding-left: 10px;
        }

        .pos {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 95%;
            text-align: center;
            padding: 10px 0;
            background: #ff000092;
            margin-bottom: 10px;
        }

        /* Optional: dark mode */
        @media (prefers-color-scheme: dark) {
            :root {
                --card-bg: #0b1220;
                --text: #e5e7eb;
                --muted: #9ca3af;
                --ring: #1f2937;
                --accent: #8b5cf6;
            }

            .dash-card {
                box-shadow: 0 10px 25px rgba(0, 0, 0, .35);
            }

            .dash-body strong {
                color: #f3f4f6;
            }
        }
    </style>
</head>

<body>
    <a href="../index.php">
        <div class="fixed-btn position-fixed p-3 rounded-circle overflow-hidden bg-primary shadow"
            style="z-index: 1030; bottom: 20px; right: 20px; cursor: pointer;">

            <div class="d-flex justify-content-center align-items-center">
                <i class="fa-solid fa-arrow-left fa-2x" style="color: #ffffff; font-size: 1.2rem;"></i>
            </div>
        </div>
    </a>
    <div class="container">
        <div class="dashboard-card">
            <div class="row dashboard-section">
                <div class="main col-md-3 border border-start-0">

                    <?php
                    $defaultImg = "user_image/user2.png";
                    $profileImg = !empty($img) ? basename($img) : $defaultImg;

                    $checkPath = "user_image/" . $profileImg;
                    if (!file_exists($checkPath) || empty($img)) {
                        $profileImg = $defaultImg;
                    }
                    ?>
                    <img src="user_image/<?php echo htmlspecialchars($profileImg); ?>" alt="Profile Picture"
                        class="profile-pic">


                    <h5 class="mt-2"><?php echo htmlspecialchars($name); ?></h5>
                    <br>
                    <p class="text-muted mb-2"><i class="fa-solid fa-envelope"></i>
                        <?php echo htmlspecialchars($email) ?></p>
                    <p class="text-muted"><i class="fa-solid fa-phone"></i>
                        <?php echo htmlspecialchars($phone) ?></p>


                    <a href="./edit_profile.php?email=<?php echo urlencode($email); ?>" class=" btn
                        btn-outline-primary btn-sm mt-2"><i class="fa-solid fa-pen-to-square"></i> Edit Profile</a>

                    <br>
                    <div class="dash_btn">
                        <a href="../request.php?logout" class="pos btn btn-danger mt-5"><i
                                class="fa-solid fa-sign-out-alt"></i>
                            Logout</a>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="dash-card">
                        <div class="dash-head">
                            <h4>Welcome to your Dashboard!</h4>
                        </div>
                        <hr class="dash-hr">
                        <div class="dash-body">
                            <p class="bio"><strong>Bio:</strong>
                                <?php echo htmlspecialchars($bio); ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title"><i class="fa-solid fa-ticket"></i> My Bookings</h5>
                                    <p class="card-text">View and manage your event bookings.</p>
                                    <button class="book_btn btn btn-primary btn-sm">View Bookings</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title"><i class="fa-solid fa-music"></i> Explore Events</h5>
                                    <p class="card-text">Find new music and events to join.</p>
                                    <a href="https://freefy.app/discover" class="btn btn-primary btn-sm">Browse
                                        Events</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>

                    <div class="container">
                        <h2 class="page-title">📅 My Bookings</h2>

                        <div class="booking card p-3">
                            <div class="table-responsive">
                                <table class="table table-hover align-middle">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Ticket No:</th>
                                            <th>Event Name</th>
                                            <th>Date</th>
                                            <th>Time</th>
                                            <th>Seats</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Example booking rows -->
                                        <?php
                                        $n = 1;
                                        if ($resultBooking->num_rows > 0) {
                                            while ($booking = $resultBooking->fetch_assoc()) { ?>
                                                <tr>
                                                    <td><?php echo $n++; ?></td>
                                                    <td><?php echo $booking["id"]; ?></td>
                                                    <td><?php echo $booking["event"]; ?></td>
                                                    <td><?php echo $booking["date"]; ?></td>
                                                    <td><?php echo $booking["time"]; ?></td>
                                                    <td><?php echo $booking["tickets"]; ?></td>
                                                    <td><span class="badge-status badge-confirmed">Confirmed</span></td>
                                                    <td class="d-flex flex-column gap-2 justify-content-center">
                                                        <a
                                                            href="./update_booking.php?id=<?php echo urlencode($booking['id']); ?>">
                                                            <button class="btn btn-sm btn-outline-primary">Update</button>
                                                        </a>
                                                        <a href="../request.php?id=<?php echo urlencode($booking['id']); ?>"
                                                            onclick="return confirm('Are you sure you want to delete this booking?');">
                                                            <button class="btn btn-sm btn-outline-danger"
                                                                name="booking_cencel">Cancel</button>
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                            <tr>
                                                <td colspan="8" class="text-center">
                                                    <p class="mt-2">“Keep the music going – reserve more events now.”</p>
                                                    <a href="../book.php">
                                                        <button class="btn btn-sm btn-outline-primary mb-2">Book
                                                            Now</button>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php } else { ?>
                                            <tr>
                                                <td colspan="8" class="text-center">
                                                    <p class="mt-2">“Limited Slots – Reserve Your Date”</p>
                                                    <a href="../book.php">
                                                        <button class="btn btn-sm btn-outline-primary mb-2">Book
                                                            Now</button>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php } ?>



                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {

            $(".booking").hide();

            $('.book_btn').click(function (e) {
                e.preventDefault();

                $(".booking").fadeIn(1000); // 600ms animation
            });

        });
    </script>
    <!-- jQuery CDN -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script> -->

</body>

</html>