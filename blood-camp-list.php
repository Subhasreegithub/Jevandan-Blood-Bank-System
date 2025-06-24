<?php
include('connection.php');
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Blood Camp List</title>
    <link rel="stylesheet" type="text/css" href="css/s1.css">
    <style type="text/css">
    td {
        width: 200px;
        height: 40px;
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
                    <marquee behavior="" direction="">Blood Camp List</marquee>
                </h1>
                <center>
                    <div id="form">
                        <table border="1">
                           <tr>
                                <th>Camp Name</th>
                                <th>Organizer</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Location</th>
                                <th>Phone</th>
                                <th>Email</th>
                            </tr>

                           
                            <?php
                            $q = $db->query("SELECT * FROM blood_camps");
                            while ($r1 = $q->fetch(PDO::FETCH_OBJ)) {
                            ?>
                            <tr>
                                <td><center><?= $r1->camp_name; ?></center></td>
                                <td><center><?= $r1->organizer_name; ?></center></td>
                                <td><center><?= $r1->camp_date; ?></center></td>
                                <td><center><?= $r1->camp_time; ?></center></td>
                                <td><center><?= $r1->camp_location; ?></center></td>
                                <td><center><?= $r1->contact_phone; ?></center></td>
                                <td><center><?= $r1->contact_email; ?></center></td>
                            </tr>

                            <?php
                            }
                            ?>
                        </table>
                    </div>
                </center>
            </div>
            <div id="footer">
                <h4 align="center">Copyright@JEVANDAN</h4>
                <p align="center"><a href="logout.php"><font color="white">Logout</font></a></p>
            </div>
        </div>
    </div>
</body>

</html>

