<?php
include('connection.php');
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Recipient List</title>
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
            background-color: #008060;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #dbfff0;
        }

        tr:hover {
            background-color: #c6ffe8;
        }

        #form {
            background-color: #f0fff4;
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
                    <marquee behavior="" direction="">Recipient List</marquee>
                </h1>
                <center>
                    <div id="form">
                        <table border="1">
                            <tr>
                                <th>Full Name</th>
                                <th>Date of Birth</th>
                                <th>Gender</th>
                                <th>Blood Group</th>
                                <th>Hospital</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Registered On</th>
                            </tr>
                            <?php
                            $q = $db->query("SELECT * FROM recipients ORDER BY id DESC");
                            while ($r1 = $q->fetch(PDO::FETCH_OBJ)) {
                            ?>
                            <tr>
                                <td><?= htmlspecialchars($r1->name); ?></td>
                                <td><?= htmlspecialchars($r1->dob); ?></td>
                                <td><?= htmlspecialchars($r1->gender); ?></td>
                                <td><?= htmlspecialchars($r1->blood_group); ?></td>
                                <td><?= htmlspecialchars($r1->hospital); ?></td>
                                <td><?= htmlspecialchars($r1->phone); ?></td>
                                <td><?= htmlspecialchars($r1->email); ?></td>
                                <td><?= htmlspecialchars($r1->address); ?></td>
                                <td><?= htmlspecialchars($r1->registration_date); ?></td>
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
