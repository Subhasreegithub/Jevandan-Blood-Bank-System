<?php
include('connection.php');
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Donor List</title>
    <link rel="stylesheet" type="text/css" href="css/s1.css">
    <style>
        td {
            width: 200px;
            height: 40px;
        }
        th {
            background-color: #f2f2f2;
        }
        table {
            border-collapse: collapse;
        }
        table, td, th {
            border: 1px solid gray;
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
                    <marquee behavior="" direction="">Donor List</marquee>
                </h1>
                <center>
                    <div id="form">
                        <table>
                            <tr>
                                <th>Name</th>
                                <th>Age</th>
                                <th>Gender</th>
                                <th>Blood Group</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Registration Date</th>
                            </tr>
                            <?php
                           $q = $db->query("SELECT * FROM donors");

                            while ($row = $q->fetch(PDO::FETCH_ASSOC)) {
                            ?>
                                <tr>
                                    <td><center><?= htmlspecialchars($row['name']); ?></center></td>
                                    <td><center><?= htmlspecialchars($row['age']); ?></center></td>
                                    <td><center><?= htmlspecialchars($row['gender']); ?></center></td>
                                    <td><center><?= htmlspecialchars($row['blood_group']); ?></center></td>
                                    <td><center><?= htmlspecialchars($row['phone']); ?></center></td>
                                    <td><center><?= htmlspecialchars($row['email']); ?></center></td>
                                    <td><center><?= htmlspecialchars($row['address']); ?></center></td>
                                    <td><center><?= htmlspecialchars($row['registration_date']); ?></center></td>
                                </tr>
                            <?php
                            }
                            ?>
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
