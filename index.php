<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ScheduleSync - Home</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f7fa;
            color: #333;
        }
        header {
            background: linear-gradient(90deg, #007bff, #0056b3);
            color: white;
            text-align: center;
            padding: 2rem;
        }
        header h1 {
            margin: 0;
            font-size: 2.5rem;
        }
        .container {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 1rem;
            text-align: center;
        }
        .btn {
            background-color: #007bff;
            color: white;
            padding: 1rem 2rem;
            border-radius: 5px;
            text-decoration: none;
            font-size: 1.2rem;
            transition: background-color 0.3s;
        }
        .btn:hover {
            background-color: #0056b3;
        }
        .features {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            margin-top: 2rem;
        }
        .feature-card {
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            width: 30%;
            padding: 1.5rem;
            margin: 1rem;
        }
        @media (max-width: 768px) {
            .feature-card {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <header>
        <h1>ScheduleSync</h1>
        <p>Your ultimate scheduling solution</p>
    </header>
    <div class="container">
        <h2>Effortless Scheduling for Everyone</h2>
        <p>Create your booking link, share it, and let others schedule meetings with you seamlessly.</p>
        <a href="#" onclick="redirectTo('signup.php')" class="btn">Get Started</a>
        <a href="#" onclick="redirectTo('login.php')" class="btn">Log In</a>
        <a href="#" onclick="redirectTo('book.php')" class="btn">Book a Meeting</a>
        <div class="features">
            <div class="feature-card">
                <h3>Easy Booking</h3>
                <p>Select time slots that work for you and book instantly.</p>
            </div>
            <div class="feature-card">
                <h3>Manage Meetings</h3>
                <p>View, reschedule, or cancel meetings from your dashboard.</p>
            </div>
            <div class="feature-card">
                <h3>Responsive Design</h3>
                <p>Works perfectly on desktop and mobile devices.</p>
            </div>
        </div>
    </div>
    <script>
        function redirectTo(page) {
            window.location.href = page;
        }
    </script>
</body>
</html>
