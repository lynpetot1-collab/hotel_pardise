<?php
require_once 'config.php';
require_once 'includes/functions.php';
require_once 'includes/Booking.php';

startSession();

$booking = null;
$errorMessage = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $reference = sanitize($_POST['reference'] ?? '');
    
    if ($reference) {
        $bookingModel = new Booking();
        $booking = $bookingModel->getByReference($reference);
        
        if (!$booking) {
            $errorMessage = "No booking found with reference number: $reference";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Booking - <?php echo SITE_NAME; ?></title>
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
        <section class="verify-section">
            <h2>Verify Your Booking</h2>
            <p>Enter your reference number to check your booking status</p>

            <form method="POST" class="verify-form">
                <div class="form-group">
                    <label for="reference">Reference Number</label>
                    <input type="text" id="reference" name="reference" 
                           placeholder="e.g., BK20260207ABC123" required>
                </div>
                <button type="submit" class="btn btn-primary">Check Status</button>
            </form>

            <?php if ($errorMessage): ?>
                <div class="alert alert-error"><?php echo $errorMessage; ?></div>
            <?php endif; ?>

            <?php if ($booking): ?>
                <div class="booking-details">
                    <h3>Booking Details</h3>
                    <div class="detail-row">
                        <span class="label">Reference Number:</span>
                        <span class="value"><?php echo $booking['reference_number']; ?></span>
                    </div>
                    <div class="detail-row">
                        <span class="label">Name:</span>
                        <span class="value"><?php echo $booking['name']; ?></span>
                    </div>
                    <div class="detail-row">
                        <span class="label">Email:</span>
                        <span class="value"><?php echo $booking['email']; ?></span>
                    </div>
                    <div class="detail-row">
                        <span class="label">Phone:</span>
                        <span class="value"><?php echo $booking['phone']; ?></span>
                    </div>
                    <div class="detail-row">
                        <span class="label">Check-in:</span>
                        <span class="value"><?php echo formatDate($booking['checkin']); ?></span>
                    </div>
                    <div class="detail-row">
                        <span class="label">Check-out:</span>
                        <span class="value"><?php echo formatDate($booking['checkout']); ?></span>
                    </div>
                    <div class="detail-row">
                        <span class="label">Guests:</span>
                        <span class="value"><?php echo $booking['guests']; ?></span>
                    </div>
                    <div class="detail-row">
                        <span class="label">Room Type:</span>
                        <span class="value"><?php echo ucfirst($booking['room_type']); ?></span>
                    </div>
                    <div class="detail-row">
                        <span class="label">Status:</span>
                        <span class="value">
                            <span class="status-badge status-<?php echo $booking['status']; ?>">
                                <?php echo ucfirst($booking['status']); ?>
                            </span>
                        </span>
                    </div>
                    <div class="detail-row">
                        <span class="label">Booked On:</span>
                        <span class="value"><?php echo formatDate($booking['created_at']); ?></span>
                    </div>
                </div>
            <?php endif; ?>
        </section>
    </main>

    <footer class="footer">
        <div class="container">
            <p>&copy; <?php echo date('Y'); ?> <?php echo SITE_NAME; ?>. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
