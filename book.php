<?php
session_start();
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_POST['user_id'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    
    $stmt = $conn->prepare("INSERT INTO bookings (user_id, date, time, name, email) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("issss", $user_id, $date, $time, $name, $email);
    
    if ($stmt->execute()) {
        // Simulate email confirmation
        echo "<script>alert('Booking confirmed! A confirmation email has been sent.');</script>";
    } else {
        echo "<script>alert('Error: Unable to book appointment.');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ScheduleSync - Book Appointment</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f7fa;
            margin: 0;
            padding: 0;
        }
        .booking-container {
            max-width: 800px;
            margin: 2rem auto;
            padding: 2rem;
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        h2 {
            text-align: center;
            color: #007bff;
        }
        .form-group {
            margin-bottom: 1rem;
        }
        label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: bold;
        }
        input, select {
            width: 100%;
            padding: 0.8rem;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1rem;
        }
        .btn {
            background-color: #007bff;
            color: white;
            padding: 0.8rem;
            border: none;
            border-radius: 5px;
            width: 100%;
            font-size: 1.1rem;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .btn:hover {
            background-color: #0056b3;
        }
        .calendar {
            margin-bottom: 2rem;
        }
        #calendar {
            width: 100%;
            height: 400px;
        }
        @media (max-width: 768px) {
            .booking-container {
                margin: 1rem;
                padding: 1rem;
            }
        }
    </style>
</head>
<body>
    <div class="booking-container">
        <h2>Book an Appointment</h2>
        <form method="POST" action="">
            <div class="form-group">
                <label for="user_id">Select User</label>
                <select id="user_id" name="user_id" required>
                    <option value="">Select a user</option>
                    <?php
                    $result = $conn->query("SELECT id, username FROM users");
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='{$row['id']}'>{$row['username']}</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="date">Date</label>
                <input type="date" id="date" name="date" required>
            </div>
            <div class="form-group">
                <label for="time">Time</label>
                <select id="time" name="time" required>
                    <option value="">Select a time</option>
                    <option value="09:00">9:00 AM</option>
                    <option value="10:00">10:00 AM</option>
                    <option value="11:00">11:00 AM</option>
                    <option value="12:00">12:00 PM</option>
                    <option value="13:00">1:00 PM</option>
                    <option value="14:00">2:00 PM</option>
                    <option value="15:00">3:00 PM</option>
                    <option value="16:00">4:00 PM</option>
                </select>
            </div>
            <div class="form-group">
                <label for="name">Your Name</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Your Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <button type="submit" class="btn">Book Appointment</button>
        </form>
        <div class="calendar">
            <h3>Available Dates</h3>
            <div id="calendar"></div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.css" rel="stylesheet">
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                events: [
                    <?php
                    $result = $conn->query("SELECT date, time FROM bookings");
                    while ($row = $result->fetch_assoc()) {
                        echo "{ title: 'Booked', start: '{$row['date']}T{$row['time']}' },";
                    }
                    ?>
                ]
            });
            calendar.render();
        });
        function redirectTo(page) {
            window.location.href = page;
        }
    </script>
</body>
</html>
