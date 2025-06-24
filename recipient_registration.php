<?php
include('../connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['fullname'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $blood_group = $_POST['bloodgroup'];
    $hospital = $_POST['hospital'];
    $phone = $_POST['contact'];
    $email = $_POST['email'];
    $address = $_POST['address'];

    $sql = "INSERT INTO recipients (name, dob, gender, blood_group, hospital, phone, email, address)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $db->prepare($sql);
    $stmt->execute([$name, $dob, $gender, $blood_group, $hospital, $phone, $email, $address]);

    echo "<script>alert('Recipient registered successfully!');</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Recipient Registration</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0fff4;
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
            color: #008060;
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
            background-color: #008060;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
        }

        input[type="submit"]:hover {
            background-color: #00664d;
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
    <h2>Recipient Registration Form</h2>
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

        <label for="bloodgroup">Required Blood Group:</label>
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

        <label for="hospital">Hospital/Clinic Name:</label>
        <input type="text" id="hospital" name="hospital" required>

        <label for="contact">Contact Number:</label>
        <input type="text" id="contact" name="contact" required>

        <label for="email">Email Address:</label>
        <input type="email" id="email" name="email" required>

        <label for="address">Current Address:</label>
        <textarea id="address" name="address" rows="3" required></textarea>

        <input type="submit" value="Register as Recipient">
    </form>
</div>

</body>
</html>
