<?php
include('../connection.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $camp_name = $_POST['campname'];
    $organizer = $_POST['organizer'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $location = $_POST['location'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];

    $sql = "INSERT INTO blood_camps (camp_name, organizer_name, camp_date, camp_time, camp_location, contact_phone, contact_email)
            VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $db->prepare($sql);
    $stmt->execute([$camp_name, $organizer, $date, $time, $location, $contact, $email]);

    echo "<script>alert('Camp registered successfully!');</script>";
}

?>


<!DOCTYPE html>
<html>
<head>
    <title>Blood Camp Registration</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #ffecec;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 50%;
            margin: 50px auto;
            background-color: white;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 0 15px rgba(0,0,0,0.2);
        }

        h2 {
            text-align: center;
            color: crimson;
            margin-bottom: 30px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #333;
        }

        input[type="text"],
        input[type="email"],
        input[type="date"],
        input[type="time"],
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #aaa;
            border-radius: 5px;
            margin-bottom: 20px;
            box-sizing: border-box;
        }

        textarea {
            resize: vertical;
        }

        input[type="submit"] {
            background-color: crimson;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
        }

        input[type="submit"]:hover {
            background-color: darkred;
        }

        @media (max-width: 768px) {
            .container {
                width: 90%;
                padding: 20px;
            }
        }
    </style>

</head>
<body>

<div class="container">
    <h2>Blood Camp Registration Form</h2>
    <form action="" method="post">

        <label for="campname">Camp Name:</label>
        <input type="text" id="campname" name="campname" required>

        <label for="organizer">Organizer Name:</label>
        <input type="text" id="organizer" name="organizer" required>

        <label for="date">Date of Camp:</label>
        <input type="date" id="date" name="date" required>

        <label for="time">Time:</label>
        <input type="time" id="time" name="time" required>

        <label for="location">Camp Location:</label>
        <textarea id="location" name="location" rows="3" required></textarea>

        <label for="contact">Contact Number:</label>
        <input type="text" id="contact" name="contact" required>

        <label for="email">Email Address:</label>
        <input type="email" id="email" name="email" required>

        <input type="submit" value="Register Camp">
    </form>
</div>
</body>
</html>
