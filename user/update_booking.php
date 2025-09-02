<?php
session_start();
include("../database.php");


// Check if ID is provided
if (!isset($_GET['id'])) {
    die("❌ Booking ID not provided!");
}
$id = intval($_GET['id']);
$stmt = $conn->prepare("SELECT * FROM booking WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$booking = $result->fetch_assoc();


if (!$booking) {
    die("❌ Booking not found!");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MusicBeat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a2d9d6c6c2.js" crossorigin="anonymous"></script>
</head>

<body class="bg-light">

    <div class="container mt-5">
        <div class="card shadow p-4">
            <h2 class="mb-4 text-success"><i class="fa-solid fa-pen-to-square"></i> Update Your Booking</h2>

            <form method="post" action="../request.php">
                <input type="hidden" name="id" value="<?php echo $booking['id']; ?>">

                <div class="mb-3">
                    <label class="form-label">Full Name</label>
                    <input type="text" name="name" class="form-control"
                        value="<?php echo htmlspecialchars($booking['name']); ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Email Address</label>
                    <input type="email" name="email" class="form-control"
                        value="<?php echo htmlspecialchars($booking['email']); ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Select Event</label>
                    <select class="form-select" name="event" required>
                        <option value="">Choose an event...</option>
                        <?php
                        $events = [
                            "Live Concerts",
                            "Acoustic Nights",
                            "DJ Nights / EDM Parties",
                            "Open Mic Nights",
                            "Tribute Shows",
                            "Charity & Fundraising Concerts",
                            "Classical & Instrumental Shows"
                        ];
                        foreach ($events as $event) {
                            $selected = ($booking['event'] == $event) ? "selected" : "";
                            echo "<option $selected>$event</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Booking Date</label>
                    <input type="date" name="date" class="form-control" value="<?php echo $booking['date']; ?>"
                        required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Booking Time</label>
                    <input type="time" name="time" class="form-control" value="<?php echo $booking['time']; ?>"
                        required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Mobile No</label>
                    <input type="text" name="num" class="form-control" value="<?php echo $booking['number']; ?>"
                        required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Number of Tickets</label>
                    <input type="number" name="tickets" class="form-control" min="1" max="10"
                        value="<?php echo $booking['tickets']; ?>" required>
                </div>

                <div class="text-center">
                    <button type="submit" name="booking_update" class="btn btn-success">
                        <i class="fa-solid fa-check"></i> Save Changes
                    </button>
                    <a href="dashboard.php" class="btn btn-secondary">
                        <i class="fa-solid fa-arrow-left"></i> Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>