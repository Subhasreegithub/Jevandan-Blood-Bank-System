<?php
include('../connection.php');
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Super Admin Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f2f2f2;
        }
        .login-container {
            max-width: 400px;
            margin: 80px auto;
            padding: 30px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
        }
        h2 {
            text-align: center;
            color: #d10000;
        }
        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border-radius: 6px;
            border: 1px solid #ccc;
        }
        input[type="submit"] {
            width: 100%;
            padding: 12px;
            background-color: #d10000;
            color: #fff;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #a30000;
        }
    </style>
</head>
<body>
<div class="login-container">
    <h2>Super Admin Login</h2>
    <form action="" method="post">
        <label>Username</label>
        <input type="text" name="san" required>
        <label>Password</label>
        <input type="password" name="saps" required>
        <input type="submit" name="sub" value="Login">
    </form>
    <?php
    if (isset($_POST['sub'])) {
        $san = $_POST['san'];
        $saps = $_POST['saps'];

        $q = $db->prepare("SELECT * FROM super_admin WHERE sname = ? AND spass = ?");
        $q->execute([$san, $saps]);
        $res = $q->fetchAll(PDO::FETCH_OBJ);

        if ($res) {
            $_SESSION['super_admin'] = $san;
            header("Location: super_dashboard.php");
        } else {
            echo "<p style='color:red; text-align:center;'>Invalid username or password</p>";
        }
    }
    ?>
</div>
</body>
</html>
