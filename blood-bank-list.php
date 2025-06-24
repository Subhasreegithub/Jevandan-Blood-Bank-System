<?php
include('connection.php');
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Blood Bank List</title>
    <link rel="stylesheet" type="text/css" href="css/s1.css">
    <style>
        td, th {
            padding: 10px;
            text-align: center;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }
        th {
            background-color: #cc3300;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #ffe5d1;
        }
        tr:hover {
            background-color: #ffe0cc;
        }
        #form {
            background-color: #fff5ed;
            padding: 20px;
            margin: 20px auto;
            border-radius: 10px;
            width: 95%;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
    </style>
</head>

<body>
    <div id="full">
        <div id="inner_full">
            <div id="header">
                <h4><a href="admin-home.php" style="text-decoration: none; color: white;">Blood Bank Management System</a></h4>
            </div>
            <div id="body">
                <?php
                $un = $_SESSION['un'];
                if (!$un) {
                    header("Location:index.php");
                }
                ?>
                <h1>
                    <marquee behavior="" direction="">Blood Bank List</marquee>
                </h1>
                <center>
                    <div id="form">
                        <table border="1">
                            <tr>
                                <th>Blood Bank Name</th>
                                <th>Registration Number</th>
                                <th>Address</th>
                                <th>City</th>
                                <th>State</th>
                                <th>Manager</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>License Valid Till</th>
                            </tr>
                            <?php
                            $q = $db->query("SELECT * FROM blood_banks ORDER BY id DESC");
                            while ($r1 = $q->fetch(PDO::FETCH_OBJ)) {
                            ?>
                            <tr>
                                <td><?= htmlspecialchars($r1->bank_name); ?></td>
                                <td><?= htmlspecialchars($r1->reg_no); ?></td>
                                <td><?= htmlspecialchars($r1->address); ?></td>
                                <td><?= htmlspecialchars($r1->city); ?></td>
                                <td><?= htmlspecialchars($r1->state); ?></td>
                                <td><?= htmlspecialchars($r1->manager_name); ?></td>
                                <td><?= htmlspecialchars($r1->email); ?></td>
                                <td><?= htmlspecialchars($r1->phone); ?></td>
                                <td><?= htmlspecialchars($r1->license_validity); ?></td>
                            </tr>
                            <?php } ?>
                        </table>
                    </div>
                </center>
            </div>
            <div id="footer">
                <h4 align="center">Copyright @JEVANDAN</h4>
                <p align="center"><a href="logout.php"><font color="white">Logout</font></a></p>
            </div>
        </div>
    </div>
</body>
</html>





