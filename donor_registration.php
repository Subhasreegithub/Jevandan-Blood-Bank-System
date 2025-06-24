<?php
include('../connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['fullname'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $blood_group = $_POST['bloodgroup'];
    $phone = $_POST['contact'];
    $email = $_POST['email'];
    $address = $_POST['address'];

    // Calculate age from DOB
    $today = new DateTime();
    $birthDate = new DateTime($dob);
    $age = $today->diff($birthDate)->y;

    $sql = "INSERT INTO donors (name, age, gender, blood_group, phone, email, address) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $db->prepare($sql);
    $stmt->execute([$name, $age, $gender, $blood_group, $phone, $email, $address]);

    echo "<script>alert('Registration successful!');</script>";
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Donor Registration</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f9ff;
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
            color: #d10000;
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
        select,
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
            background-color: #d10000;
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
    <h2>Donor Registration Form</h2>
    <form method="post" action="">
    <label for="fullname">Full Name:</label>
        <input type="text" id="fullname" name="fullname" required>

        <label for="dob">Date of Birth:</label>
        <input type="date" id="dob" name="dob" required>

        <label for="gender">Gender:</label>
        <select id="gender" name="gender" required>
            <option value="">-- Select Gender --</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="Other">Other</option>
        </select>

        <label for="bloodgroup">Blood Group:</label>
        <select id="bloodgroup" name="bloodgroup" required>
            <option value="">-- Select Blood Group --</option>
            <option value="A+">A+</option>
            <option value="A-">A-</option>
            <option value="B+">B+</option>
            <option value="B-">B-</option>
            <option value="O+">O+</option>
            <option value="O-">O-</option>
            <option value="AB+">AB+</option>
            <option value="AB-">AB-</option>
        </select>

        <label for="contact">Contact Number:</label>
        <input type="text" id="contact" name="contact" required>

        <label for="email">Email Address:</label>
        <input type="email" id="email" name="email" required>

        <label for="address">Full Address:</label>
        <textarea id="address" name="address" rows="3" required></textarea>

        <input type="submit" value="Register as Donor">
    </form>
</div>

</body>
</html>
