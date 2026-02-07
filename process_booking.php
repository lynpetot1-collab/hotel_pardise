<?php
require_once 'config.php';
require_once 'includes/functions.php';
require_once 'includes/Booking.php';

startSession();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    redirect('index.php');
}

// Verify CSRF token
if (!verifyCsrfToken($_POST['csrf_token'] ?? '')) {
    redirect('index.php?error=Invalid request');
}

// Sanitize input
$data = [
    'name' => sanitize($_POST['name']),
    'email' => sanitize($_POST['email']),
    'phone' => sanitize($_POST['phone']),
    'checkin' => sanitize($_POST['checkin']),
    'checkout' => sanitize($_POST['checkout']),
    'guests' => sanitize($_POST['guests']),
    'room_type' => sanitize($_POST['room_type'])
];

// Validate email
if (!isValidEmail($data['email'])) {
    redirect('index.php?error=Invalid email address');
}

// Validate phone
if (!isValidPhone($data['phone'])) {
    redirect('index.php?error=Invalid phone number');
}

// Create booking instance
$booking = new Booking();

// Validate dates
$validation = $booking->validateDates($data['checkin'], $data['checkout']);
if ($validation !== true) {
    redirect('index.php?error=' . urlencode($validation));
}

// Create booking
try {
    $reference = $booking->create($data);
    
    if ($reference) {
        redirect('index.php?success=1&ref=' . $reference);
    } else {
        redirect('index.php?error=Booking failed. Please try again.');
    }
} catch (Exception $e) {
    redirect('index.php?error=An error occurred. Please try again later.');
}
