<?php
include('connection.php');
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Stock Blood List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #fff5f5;
            margin: 0;
            padding: 0;
        }

        #header {
            background-color: #d10000;
            padding: 20px;
            text-align: center;
            color: white;
        }

        h1 {
            margin-top: 30px;
            color: #d10000;
        }

        table {
            width: 60%;
            margin: 30px auto;
            border-collapse: collapse;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th,
        td {
            padding: 15px;
            text-align: center;
            border-bottom: 1px solid #ccc;
            font-size: 16px;
        }

        th {
            background-color: #f8d7da;
            color: #721c24;
        }

        tr:hover {
            background-color: #ffecec;
        }

        #footer {
            background-color: #d10000;
            color: white;
            text-align: center;
            padding: 10px;
            margin-top: 60px;
        }

        a {
            color: white;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div id="full">
        <div id="inner_full">
            <div id="header">
                <h1><a href="admin-home.php" style="color: white">Blood Bank Management System</a></h1>
            </div>

            <div id="body">
                <?php
                if (!isset($_SESSION['un'])) {
                    header("Location:index.php");
                    exit();
                }
                ?>

                <h1 align="center">Stock Blood List</h1>

                <table>
                    <tr>
                        <th>Blood Group</th>
                        <th>Available Units</th>
                    </tr>

                    <?php
                    $blood_groups = ['O+', 'O-', 'A+', 'A-', 'B+', 'B-', 'AB+', 'AB-'];
                    foreach ($blood_groups as $bg) {
                        $stmt = $db->prepare("SELECT COUNT(*) AS count FROM donors WHERE blood_group = ?");
                        $stmt->execute([$bg]);
                        $row = $stmt->fetch(PDO::FETCH_ASSOC);
                        echo "<tr>
                                <td>{$bg}</td>
                                <td>{$row['count']}</td>
                              </tr>";
                    }
                    ?>
                </table>
            </div>

            <div id="footer">
                <p>&copy; JEVANDAN - All Rights Reserved | <a href="logout.php">Logout</a></p>
            </div>
        </div>
    </div>
</body>

</html>
