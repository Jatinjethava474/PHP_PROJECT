<?php
session_start();
if (!isset($_SESSION['user'])) {
    echo "<script>alert('❌ Please login to book your Tickets.'); window.location.href='./login.php';</script>";
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Your Event - MusicBeat</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="music.css" rel="stylesheet">
    <link href="./bootstrap.min.css" rel="stylesheet" />
    <style>
        body {
            background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 50%, #ffffff 100%);
            color: #333;
            min-height: 100vh;
        }

        .booking-form {
            background: rgba(255, 255, 255, 0.9);
            padding: 40px;
            border-radius: 20px;
            backdrop-filter: blur(15px);
            border: 2px solid rgba(0, 0, 0, 0.1);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
        }

        .form-control,
        .form-select {
            background: rgba(248, 249, 250, 0.8);
            color: #333;
            border: 1px solid rgba(0, 0, 0, 0.2);
            border-radius: 10px;
        }

        .form-control:focus,
        .form-select:focus {
            box-shadow: 0 0 0 0.25rem rgba(0, 0, 0, 0.1);
            border: 1px solid #333;
            background: rgba(248, 249, 250, 1);
        }

        .form-control::placeholder {
            color: rgba(0, 0, 0, 0.5);
        }

        .form-select option {
            background: #ffffff;
            color: #333;
        }

        .btn-primary {
            background: linear-gradient(45deg, #3051e3ff, #3e47efff);
            color: #fff;
            font-weight: bold;
            border: none;
            border-radius: 10px;
            padding: 12px 30px;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            color: #fff;
            box-shadow: 0 0 10px rgba(110, 110, 110, 1);
        }

        .form-label {
            font-weight: 600;
            margin-bottom: 8px;
            color: #333;
        }

        h1 {
            background: linear-gradient(45deg, #333333, #666666);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            font-weight: bold;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        h1 i {
            color: #333;
        }

        p {
            color: #666;
        }
        .pos{
            margin-right: 165px;
        }
    </style>
</head>

<body>

    <div class="fixed-btn position-fixed p-3 rounded-circle overflow-hidden bg-primary shadow"
        style="z-index: 1030; bottom: 20px; right: 20px; cursor: pointer;"
        onclick="window.scrollTo({ top: 0, behavior: 'smooth' })">

        <div class="d-flex justify-content-center align-items-center">
            <i class="fa-solid fa-arrow-up fa-2x" style="color: #ffffff; font-size: 1.2rem;"></i>
        </div>
    </div>

    <div class="container py-5">
        <h1 class="text-center mb-4"><i class="fa-solid fa-ticket"></i> Book Your Event</h1>
        <p class="text-center mb-5">Reserve your spot for concerts, music festivals, and exclusive artist events.</p>

        <div class="row justify-content-center">
            <div class="col-lg-6">
                <form method="post" action="request.php" class="booking-form">

                    <!-- Name -->
                    <div class="mb-3">
                        <label class="form-label">Full Name</label>
                        <input type="text" name="name" class="form-control text-dark" placeholder="Enter your full name"
                            required>
                    </div>

                    <!-- Email -->
                    <div class="mb-3">
                        <label class="form-label">Email Address</label>
                        <input type="email" name="email" class="form-control" placeholder="Enter your email" required>
                    </div>

                    <!-- Event Selection -->
                    <div class="mb-3">
                        <label class="form-label">Select Event</label>
                        <select class="form-select" name="event" required>
                            <option value="">Choose an event...</option>
                            <option>Live Concerts</option>
                            <option>Acoustic Nights</option>
                            <option>DJ Nights / EDM Parties</option>
                            <option>Open Mic Nights</option>
                            <option>Tribute Shows</option>
                            <option>Charity & Fundraising Concerts</option>
                            <option>Classical & Instrumental Shows</option>
                        </select>
                    </div>

                    <!-- Date -->
                    <div class="mb-3">
                        <label class="form-label">Booking Date</label>
                        <input type="date" name="date" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Booking Time</label>
                        <input type="time" name="time" class="form-control" required>
                    </div>


                    <!-- Payment Method -->
                    <!-- <div class="mb-3">
                        <label class="form-label">Payment Method</label>
                        <select class="form-select" name="payment" required>
                            <option value="">Select payment option</option>
                            <option>Credit/Debit Card</option>
                            <option>UPI</option>
                            <option>Net Banking</option>
                        </select>
                    </div> -->
                    <!-- contact -->
                    <div class="mb-3">
                        <label class="form-label">mobile_no</label>
                        <input type="text" name="num" class="form-control" min="1" max="10" required>
                    </div>

                    <!-- Number of Tickets -->
                    <div class="mb-3">
                        <label class="form-label">Number of Tickets</label>
                        <input type="number" name="tickets" class="form-control" min="1" max="10" value="1" required>
                    </div>

                    <!-- Submit -->
                    <div class="text-center">
                        <a href="./index.php" class="pos btn btn-primary btn-sm">⇚</a>
                        <button type="submit" name="book" class="btn btn-primary">
                            <i class="fa-solid fa-calendar-check"></i> Confirm Booking
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            $("#bookingForm").on("submit", function (e) {
                let mobile = $("input[name='num']").val();

                // Mobile check (must be 10 digits)
                if (!/^[0-9]{10}$/.test(mobile)) {
                    alert("📱 Please enter a valid 10-digit mobile number.");
                    e.preventDefault();
                    return;
                }
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>