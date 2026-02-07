<?php
require_once 'config.php';
require_once 'includes/functions.php';
require_once 'includes/Booking.php';

startSession();

$successMessage = '';
$errorMessage = '';

if (isset($_GET['success']) && isset($_GET['ref'])) {
    $successMessage = "Booking successful! Your reference number is: <strong>" . sanitize($_GET['ref']) . "</strong>";
}

if (isset($_GET['error'])) {
    $errorMessage = sanitize($_GET['error']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo SITE_NAME; ?> - Book Your Stay</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <header class="header">
        <div class="container">
            <h1 class="logo"><?php echo SITE_NAME; ?></h1>
            <nav>
                <a href="index.php">Home</a>
                <a href="verify.php">Verify Booking</a>
                <a href="admin/login.php">Admin</a>
            </nav>
        </div>
    </header>

    <main class="container">
        <section class="hero">
            <h2>Book Your Perfect Stay</h2>
            <p>Experience comfort and luxury at affordable prices</p>
        </section>

        <?php if ($successMessage): ?>
            <div class="alert alert-success"><?php echo $successMessage; ?></div>
        <?php endif; ?>

        <?php if ($errorMessage): ?>
            <div class="alert alert-error"><?php echo $errorMessage; ?></div>
        <?php endif; ?>

        <section class="booking-form">
            <h3>Reservation Form</h3>
            <form action="process_booking.php" method="POST" id="bookingForm">
                <input type="hidden" name="csrf_token" value="<?php echo generateCsrfToken(); ?>">

                <div class="form-group">
                    <label for="name">Full Name *</label>
                    <input type="text" id="name" name="name" required>
                </div>

                <div class="form-group">
                    <label for="email">Email Address *</label>
                    <input type="email" id="email" name="email" required>
                </div>

                <div class="form-group">
                    <label for="phone">Phone Number *</label>
                    <input type="tel" id="phone" name="phone" required>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="checkin">Check-in Date *</label>
                        <input type="date" id="checkin" name="checkin" required min="<?php echo date('Y-m-d'); ?>">
                    </div>

                    <div class="form-group">
                        <label for="checkout">Check-out Date *</label>
                        <input type="date" id="checkout" name="checkout" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="guests">Number of Guests *</label>
                        <select id="guests" name="guests" required>
                            <option value="">Select</option>
                            <option value="1">1 Guest</option>
                            <option value="2">2 Guests</option>
                            <option value="3">3 Guests</option>
                            <option value="4">4 Guests</option>
                            <option value="5">5+ Guests</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="room_type">Room Type *</label>
                        <select id="room_type" name="room_type" required>
                            <option value="">Select</option>
                            <option value="standard">Standard Room - $99/night</option>
                            <option value="deluxe">Deluxe Room - $149/night</option>
                            <option value="suite">Suite - $249/night</option>
                        </select>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary btn-block">Book Now</button>
            </form>
        </section>
    </main>

    <footer class="footer">
        <div class="container">
            <p>&copy; <?php echo date('Y'); ?> <?php echo SITE_NAME; ?>. All rights reserved.</p>
        </div>
    </footer>

    <script src="assets/js/main.js"></script>
</body>
</html>
