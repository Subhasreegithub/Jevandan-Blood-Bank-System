<?php
include('../connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $bank_name = $_POST['bankname'];
    $reg_no = $_POST['license'];
    $manager_name = $_POST['manager'];
    $phone = $_POST['contact'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $pincode = $_POST['pincode'];

    // Auto license validity 5 years from today
    $license_validity = date('Y-m-d', strtotime('+5 years'));

    $sql = "INSERT INTO blood_banks (bank_name, reg_no, manager_name, phone, email, address, city, state, pincode, license_validity)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $db->prepare($sql);
    $stmt->execute([$bank_name, $reg_no, $manager_name, $phone, $email, $address, $city, $state, $pincode, $license_validity]);

    echo "<script>alert('Blood Bank Registered Successfully!');</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Blood Bank Registration</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #fff9f0;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 50%;
            margin: 50px auto;
            background-color: #fff;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 0 15px rgba(0,0,0,0.2);
        }

        h2 {
            text-align: center;
            color: #cc3300;
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
        input[type="tel"],
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
            background-color: #cc3300;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
        }

        input[type="submit"]:hover {
            background-color: #b32400;
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
    <h2>Blood Bank Registration</h2>
    <form method="post" action="">
        <label for="bankname">Blood Bank Name:</label>
        <input type="text" id="bankname" name="bankname" required>

        <label for="license">License Number:</label>
        <input type="text" id="license" name="license" required>

        <label for="manager">Manager Name:</label>
        <input type="text" id="manager" name="manager" required>

        <label for="contact">Contact Number:</label>
        <input type="tel" id="contact" name="contact" required>

        <label for="email">Email Address:</label>
        <input type="email" id="email" name="email" required>

        <label for="address">Full Address:</label>
        <textarea id="address" name="address" rows="3" required></textarea>

        <label for="city">City:</label>
        <input type="text" id="city" name="city" required>

        <label for="state">State:</label>
        <input type="text" id="state" name="state" required>

        <label for="pincode">Pincode:</label>
        <input type="text" id="pincode" name="pincode" required>

        <input type="submit" value="Register Blood Bank">
    </form>
</div>

</body>
</html>
